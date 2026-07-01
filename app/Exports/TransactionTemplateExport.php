<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

use App\Models\Barang;

class TransactionTemplateExport implements FromArray, WithHeadings, WithTitle
{
    public function array(): array
    {
        $barang = Barang::first();
        $barangId = $barang ? $barang->id : 1;
        $barangName = $barang ? $barang->nama : 'Nama Barang';
        $harga = $barang ? $barang->harga : 200000;

        return [[
            'user_email' => 'user@example.com',
            'barang_id' => $barangId,
            'barang_name' => $barangName,
            'harga' => $harga,
            'qty' => 1,
            'total' => $harga,
            'payment_method' => 'Wallet',
            'status' => 'Pending',
            'invoice' => 'INV-000001',
        ]];
    }

    public function headings(): array
    {
        return [
            'user_email',
            'barang_id',
            'barang_name',
            'harga',
            'qty',
            'total',
            'payment_method',
            'status',
            'invoice',
        ];
    }

    public function title(): string
    {
        return 'Template Transaksi';
    }
}
