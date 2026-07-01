<?php

namespace App\Imports;

use App\Models\Transaction;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsFailures;

class TransactionImport implements 
    ToModel,
    WithHeadingRow,
    WithValidation,
    SkipsOnFailure
{
    use SkipsFailures;

    protected int $insertedCount = 0;

    public function model(array $row)
    {
        // ==== Invoice (auto generate jika kosong) ====
        $invoice = trim((string) ($row['invoice'] ?? ''));
        if ($invoice === '') {
            $invoice = 'INV-' . strtoupper(Str::random(8));
        }

        // ==== Barang ====
        $barangId   = $row['barang_id'] ?? null;
        $barangName = trim((string) ($row['barang_name'] ?? 'Barang Impor'));

        // ==== Harga & Qty ====
        $harga = (int) ($row['harga'] ?? 0);
        $qty   = (int) ($row['qty'] ?? 1);

        // ==== Total (auto hitung jika kosong) ====
        $total = (int) ($row['total'] ?? ($harga * $qty));

        $transaction = new Transaction([
            'user_email'     => trim((string) ($row['user_email'] ?? 'guest@example.com')),
            'barang_id'      => $barangId,
            'barang_name'    => $barangName,
            'harga'          => $harga,
            'qty'            => $qty,
            'total'          => $total,
            'payment_method' => trim((string) ($row['payment_method'] ?? 'Wallet')),
            'status'         => trim((string) ($row['status'] ?? 'Pending')),
            'invoice'        => $invoice,
        ]);

        $this->insertedCount++;

        return $transaction;
    }

    public function rules(): array
    {
        return [
            'user_email'  => ['required', 'email'],
            'barang_id'   => ['required', 'integer', 'exists:barangs,id'],
            'barang_name' => ['required', 'string'],
            'harga'       => ['required', 'numeric', 'min:0'],
            'qty'         => ['required', 'integer', 'min:1'],
            'total'       => ['nullable', 'numeric', 'min:0'],
            'payment_method' => ['nullable', 'string'],
            'status'      => ['nullable', 'string'],
            'invoice'     => ['nullable', 'string', 'unique:transactions,invoice'],
        ];
    }

    public function customValidationMessages(): array
    {
        return [
            'user_email.required' => 'Kolom user_email wajib diisi.',
            'user_email.email'    => 'Format email tidak valid.',
            'barang_id.required'  => 'barang_id wajib diisi.',
            'barang_id.exists'    => 'barang_id tidak ditemukan di database.',
            'barang_name.required'=> 'barang_name wajib diisi.',
            'harga.required'      => 'harga wajib diisi.',
            'qty.min'             => 'qty minimal 1.',
            'invoice.unique'      => 'Invoice sudah ada di database.',
        ];
    }

    public function getInsertedCount(): int
    {
        return $this->insertedCount;
    }
}