<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Transaction;
use Illuminate\View\View;

class AdminController extends Controller
{
    /**
     * Show admin dashboard
     */
    public function dashboard(): View
    {
        $stats = [
            'total_barang' => Barang::count(),
            'total_transactions' => Transaction::count(),
            'total_stock' => Barang::sum('stok'),
            'revenue' => Transaction::sum('total'),
        ];
        
        $recentBarang = Barang::latest()->take(5)->get();
        
        // 1. Top 5 produk terlaris
        $topProducts = Transaction::selectRaw('barang_name, sum(qty) as total_qty')
            ->groupBy('barang_name')
            ->orderByDesc('total_qty')
            ->take(5)
            ->get();
            
        // 2. Stok barang (Top 5 terbanyak)
        $barangStock = Barang::select('nama', 'stok')
            ->orderByDesc('stok')
            ->take(5)
            ->get();
            
        // 3. Jumlah transaksi per status
        $transactionsByStatus = Transaction::selectRaw('status, count(*) as count')
            ->groupBy('status')
            ->get();
        
        return view('admin.dashboard', [
            'stats' => $stats,
            'recentBarang' => $recentBarang,
            'topProducts' => $topProducts,
            'barangStock' => $barangStock,
            'transactionsByStatus' => $transactionsByStatus,
        ]);
    }

    /**
     * Show all barang in admin panel
     */
    public function barangList(): View
    {
        $barang = Barang::paginate(10);
        return view('admin.barang', ['barang' => $barang]);
    }

    /**
     * Show admin reports
     */
    public function reports(): View
    {
        $totals = Transaction::selectRaw('count(*) as count, sum(total) as revenue, sum(qty) as items, sum(case when status = "Pending" then 1 else 0 end) as pending')
            ->first();

        $transactions = Transaction::latest()->take(10)->get();

        $statusBreakdown = Transaction::selectRaw('status, count(*) as count')
            ->groupBy('status')
            ->get();

        return view('admin.reports.index', [
            'totals' => $totals,
            'transactions' => $transactions,
            'statusBreakdown' => $statusBreakdown,
        ]);
    }

    /**
     * Confirm transaction status to Selesai
     */
    public function confirmTransaction(int $id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->status = 'Selesai';
        $transaction->save();

        return back()->with('success', 'Transaksi ' . $transaction->invoice . ' berhasil dikonfirmasi menjadi Selesai.');
    }
}
