<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\RedirectResponse;

class TransactionController extends Controller
{
    public function create(): View
    {
        $barang = Barang::orderBy('nama')->get();
        return view('transaction.create', compact('barang'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'barang_id' => ['required', 'exists:barangs,id'],
            'qty' => ['required', 'integer', 'min:1'],
            'payment_method' => ['required', 'string'],
        ]);

        $barang = Barang::findOrFail($request->barang_id);
        $total = $barang->harga * $request->qty;

        Transaction::create([
            'user_email' => session('user_email') ?? 'guest@example.com',
            'barang_id' => $barang->id,
            'barang_name' => $barang->nama,
            'harga' => $barang->harga,
            'qty' => $request->qty,
            'total' => $total,
            'payment_method' => $request->payment_method,
            'status' => 'Pending',
            'invoice' => 'INV-' . strtoupper(substr(uniqid(), 0, 8)),
        ]);

        return redirect()->route('transactions.history')->with('success', 'Transaksi berhasil dibuat.');
    }

    public function history(): View
    {
        $transactions = Transaction::where('user_email', session('user_email') ?? 'guest@example.com')
            ->latest()
            ->paginate(8);

        $summary = [
            'orders' => $transactions->total(),
            'spend' => Transaction::where('user_email', session('user_email') ?? 'guest@example.com')->sum('total'),
            'active' => Transaction::where('user_email', session('user_email') ?? 'guest@example.com')->where('status', 'Pending')->count(),
        ];

        return view('transaction.history', compact('transactions', 'summary'));
    }

    public function show(string $id): View
    {
        $transaction = Transaction::findOrFail($id);
        return view('transaction.show', compact('transaction'));
    }

    public function report(): View
    {
        $transactions = Transaction::where('user_email', session('user_email') ?? 'guest@example.com')
            ->latest()
            ->take(8)
            ->get();

        $totals = Transaction::where('user_email', session('user_email') ?? 'guest@example.com')
            ->selectRaw('count(*) as count, sum(total) as revenue, sum(qty) as items')
            ->first();

        $statusBreakdown = Transaction::where('user_email', session('user_email') ?? 'guest@example.com')
            ->selectRaw('status, count(*) as count, sum(total) as revenue')
            ->groupBy('status')
            ->get();

        return view('transaction.report', compact('transactions', 'totals', 'statusBreakdown'));
    }
}
