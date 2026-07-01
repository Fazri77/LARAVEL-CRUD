<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\TransactionImport;
use App\Exports\TransactionTemplateExport;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    public function barang(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);

        try {
            $import = new TransactionImport;
            Excel::import($import, $request->file('file'));

            $insertedCount = $import->getInsertedCount();
            $failures = $import->failures();

            if ($failures->isNotEmpty()) {
                $errorMessages = [];
                foreach ($failures as $failure) {
                    $row = $failure->row();
                    $errors = implode(', ', $failure->errors());
                    $errorMessages[] = "Baris {$row}: {$errors}";
                }

                if ($insertedCount > 0) {
                    return back()->with('success', 'Import selesai sebagian. ' . $insertedCount . ' transaksi ditambahkan ke laporan.')
                                 ->withErrors($errorMessages);
                } else {
                    return back()->with('error', 'Import gagal karena kesalahan validasi.')->withErrors($errorMessages);
                }
            }

            return back()->with('success', 'Import selesai. ' . $insertedCount . ' transaksi ditambahkan ke laporan.');
        } catch (\Throwable $e) {
            return back()->with('error', 'Import gagal: ' . $e->getMessage());
        }
    }

    public function template()
    {
        return Excel::download(new TransactionTemplateExport, 'template-transaksi.xlsx');
    }
}
