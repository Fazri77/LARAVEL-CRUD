<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Riwayat Transaksi | FigureVault</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;500;700;800&family=Archivo+Narrow:wght@700&family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />
    <style>
        .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
        .neobrutal-shadow { box-shadow: 6px 6px 0 rgba(0,0,0,1); }
        .neobrutal-press:active { transform: translate(6px,6px); box-shadow: none; }
        body { background: #f9f9f9; color: #1b1b1b; }
    </style>
</head>
<body class="min-h-screen font-sans">
<header class="bg-white border-b-4 border-black px-6 py-5 sticky top-0 z-50 neobrutal-shadow">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h1 class="text-3xl font-black uppercase tracking-tight">Riwayat Transaksi</h1>
            <p class="mt-2 text-sm text-slate-600">Lihat semua pesanan Anda dan detail transaksi pribadi.</p>
        </div>
        <div class="flex flex-wrap gap-3">
            <a href="{{ route('transactions.create') }}" class="inline-flex items-center gap-2 bg-amber-300 border-4 border-black py-3 px-5 uppercase text-sm font-bold neobrutal-shadow neobrutal-press">
                <span class="material-symbols-outlined">add_shopping_cart</span> Transaksi Baru
            </a>
        </div>
    </div>
</header>
<main class="max-w-7xl mx-auto px-6 py-10 space-y-8">
    @if (session('success'))
        <div class="bg-emerald-100 border-4 border-emerald-700 text-emerald-900 p-5 rounded-lg neobrutal-shadow">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="bg-red-100 border-4 border-red-700 text-red-900 p-5 rounded-lg neobrutal-shadow">
            {{ session('error') }}
        </div>
    @endif

    <section class="grid gap-6 lg:grid-cols-3">
        <div class="bg-white border-4 border-black p-6 neobrutal-shadow">
            <p class="text-xs uppercase tracking-[0.35em] text-slate-500">Total Pesanan</p>
            <p class="mt-4 text-4xl font-black">{{ $summary['orders'] }}</p>
        </div>
        <div class="bg-white border-4 border-black p-6 neobrutal-shadow">
            <p class="text-xs uppercase tracking-[0.35em] text-slate-500">Total Pengeluaran</p>
            <p class="mt-4 text-4xl font-black">Rp {{ number_format($summary['spend'],0,',','.') }}</p>
        </div>
        <div class="bg-white border-4 border-black p-6 neobrutal-shadow">
            <p class="text-xs uppercase tracking-[0.35em] text-slate-500">Menunggu</p>
            <p class="mt-4 text-4xl font-black">{{ $summary['active'] }}</p>
        </div>
    </section>

    <section class="bg-white border-4 border-black p-6 neobrutal-shadow">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-xl font-bold uppercase tracking-[0.35em]">Daftar Transaksi</h2>
                <p class="text-sm text-slate-600 mt-1">Urutkan berdasarkan transaksi terbaru.</p>
            </div>
            <span class="text-sm uppercase tracking-[0.35em] text-slate-500">{{ $transactions->total() }} entri</span>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b-4 border-black bg-slate-100">
                        <th class="px-4 py-3 text-xs uppercase tracking-[0.35em]">Invoice</th>
                        <th class="px-4 py-3 text-xs uppercase tracking-[0.35em]">Item</th>
                        <th class="px-4 py-3 text-xs uppercase tracking-[0.35em]">Qty</th>
                        <th class="px-4 py-3 text-xs uppercase tracking-[0.35em]">Total</th>
                        <th class="px-4 py-3 text-xs uppercase tracking-[0.35em]">Status</th>
                        <th class="px-4 py-3 text-xs uppercase tracking-[0.35em]">Tanggal</th>
                        <th class="px-4 py-3 text-xs uppercase tracking-[0.35em]">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($transactions as $transaction)
                        <tr class="border-b border-slate-300 hover:bg-slate-50 transition">
                            <td class="px-4 py-4 font-bold">{{ $transaction->invoice }}</td>
                            <td class="px-4 py-4">{{ $transaction->barang_name }}</td>
                            <td class="px-4 py-4">{{ $transaction->qty }}</td>
                            <td class="px-4 py-4">Rp {{ number_format($transaction->total,0,',','.') }}</td>
                            <td class="px-4 py-4 uppercase text-sm">
                                <span class="inline-flex items-center gap-2 px-3 py-1 border-2 border-black {{ $transaction->status === 'Pending' ? 'bg-yellow-200' : 'bg-emerald-200' }}">
                                    {{ $transaction->status }}
                                </span>
                            </td>
                            <td class="px-4 py-4">{{ $transaction->created_at->format('d M Y') }}</td>
                            <td class="px-4 py-4">
                                <a href="{{ route('transactions.show', $transaction->id) }}" class="inline-flex items-center gap-2 px-3 py-2 border-4 border-black bg-slate-900 text-white uppercase text-xs font-bold neobrutal-shadow">Detail</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-4 py-10 text-center text-slate-500">Belum ada transaksi.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-6">{{ $transactions->links() }}</div>
    </section>
</main>
</body>
</html>