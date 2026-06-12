<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Exports\LaporanExport;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

class LaporanController extends Controller
{
    public function export(Request $request)
    {
         $request->validate([
            'tanggal_mulai' => ['required', 'date'],
            'tanggal_akhir' => ['required', 'date', 'after_or_equal:tanggal_mulai'],
            'format' => ['required', 'in:pdf,excel'],
        ]);

        $mulai = $request->tanggal_mulai;
        $akhir = $request->tanggal_akhir;
        $opsi  = $request->opsi ?? [];
        $format = $request->format ?? 'pdf';

        // Query transaction data within the date range
        $transactions = Transaction::whereBetween('created_at', [
            $mulai . ' 00:00:00',
            $akhir . ' 23:59:59',
        ])->orderBy('created_at', 'desc')->get();

        // Calculate summary statistics
        $summary = (object) [
            'total_transaksi' => $transactions->count(),
            'total_revenue'   => $transactions->sum('total'),
            'total_items'     => $transactions->sum('qty'),
            'total_pending'   => $transactions->where('status', 'Pending')->count(),
            'total_completed' => $transactions->where('status', 'Completed')->count(),
        ];

        // Status breakdown
        $statusBreakdown = $transactions->groupBy('status')->map(function ($group) {
            return $group->count();
        });

        // Top selling items
        $topItems = $transactions->groupBy('barang_name')->map(function ($group, $name) {
            return (object) [
                'name'     => $name,
                'qty_sold' => $group->sum('qty'),
                'revenue'  => $group->sum('total'),
            ];
        })->sortByDesc('qty_sold')->take(5)->values();

        if ($format === 'excel') {
            $filename = 'laporan-transaksi-' . $mulai . '-sd-' . $akhir . '.xlsx';
            return Excel::download(new LaporanExport($mulai, $akhir), $filename);
        }

        // PDF Export
        $data = [
            'mulai'           => $mulai,
            'akhir'           => $akhir,
            'opsi'            => $opsi,
            'transactions'    => $transactions,
            'summary'         => $summary,
            'statusBreakdown' => $statusBreakdown,
            'topItems'        => $topItems,
        ];

        $pdf = Pdf::loadView('admin.reports.pdf', $data)
                  ->setPaper('A4', 'portrait');

        $filename = 'laporan-transaksi-' . $mulai . '-sd-' . $akhir . '.pdf';
        return $pdf->download($filename);
    }
}
