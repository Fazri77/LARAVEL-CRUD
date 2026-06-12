<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\BarangImport;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    public function barang(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);

        Excel::import(new BarangImport, $request->file('file'));

        return back()->with('success', 'Data barang berhasil di-import');
    }
}
