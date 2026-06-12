<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Laporan Transaksi | FigureVault</title>
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
            <h1 class="text-3xl font-black uppercase tracking-tight">Laporan Transaksi</h1>
            <p class="mt-2 text-sm text-slate-600">Ringkasan kinerja pembelian Anda dengan metrik penting dan laporan terbaru.</p>
        </div>
        <div class="flex flex-wrap gap-3">
            <a href="{{ route('transactions.history') }}" class="inline-flex items-center gap-2 border-4 border-black bg-amber-300 py-3 px-5 uppercase text-sm font-bold neobrutal-shadow neobrutal-press">
                <span class="material-symbols-outlined">history</span> Lihat Riwayat
            </a>
            <a href="{{ route('logout') }}" class="inline-flex items-center gap-2 border-4 border-red-600 bg-red-500 text-white py-3 px-5 uppercase text-sm font-bold neobrutal-shadow">
                <span class="material-symbols-outlined">logout</span> Logout
            </a>
        </div>
    </div>
</header>
<main class="max-w-7xl mx-auto px-6 py-10 space-y-8">
    <section class="grid gap-6 lg:grid-cols-3">
        <div class="bg-slate-900 text-white border-4 border-black p-6 neobrutal-shadow">
            <p class="text-xs uppercase tracking-[0.35em] text-slate-400">Total Transaksi</p>
            <p class="mt-4 text-4xl font-black">{{ $totals->count ?? 0 }}</p>
        </div>
        <div class="bg-white border-4 border-black p-6 neobrutal-shadow">
            <p class="text-xs uppercase tracking-[0.35em] text-slate-500">Pendapatan</p>
            <p class="mt-4 text-4xl font-black">Rp {{ number_format($totals->revenue ?? 0,0,',','.') }}</p>
        </div>
        <div class="bg-white border-4 border-black p-6 neobrutal-shadow">
            <p class="text-xs uppercase tracking-[0.35em] text-slate-500">Item Terbeli</p>
            <p class="mt-4 text-4xl font-black">{{ $totals->items ?? 0 }}</p>
        </div>
    </section>

    <section class="grid gap-6 lg:grid-cols-[2fr_1fr]">
        <div class="bg-white border-4 border-black p-6 neobrutal-shadow">
            <h2 class="font-bold uppercase tracking-[0.35em] mb-4">Transaksi Terbaru</h2>
            <div class="space-y-4">
                @forelse ($transactions as $transaction)
                    <div class="border-4 border-black p-4">
                        <div class="flex justify-between items-center gap-4">
                            <div>
                                <p class="font-bold">{{ $transaction->barang_name }}</p>
                                <p class="text-sm text-slate-500">{{ $transaction->invoice }}</p>
                            </div>
                            <span class="text-sm uppercase tracking-[0.35em]">Rp {{ number_format($transaction->total,0,',','.') }}</span>
                        </div>
                        <div class="mt-3 flex justify-between text-sm text-slate-600">
                            <span>{{ $transaction->qty }} pcs</span>
                            <span>{{ $transaction->created_at->format('d M Y') }}</span>
                        </div>
                    </div>
                @empty
                    <div class="border-4 border-black p-4 text-center text-slate-500">Belum ada data transaksi.</div>
                @endforelse
            </div>
        </div>
        <aside class="space-y-4">
            <div class="bg-white border-4 border-black p-6 neobrutal-shadow">
                <h3 class="font-bold uppercase tracking-[0.35em] mb-4">Status Breakdown</h3>
                <div class="space-y-3">
                    @foreach ($statusBreakdown as $status)
                        <div class="flex justify-between items-center gap-4 border-t border-slate-200 pt-3 first:pt-0">
                            <span class="font-bold">{{ $status->status }}</span>
                            <span class="text-sm text-slate-600">{{ $status->count }} transaksi</span>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="bg-black text-white border-4 border-black p-6 neobrutal-shadow">
                <h3 class="font-bold uppercase tracking-[0.35em] mb-4">Wawasan</h3>
                <p class="text-sm leading-relaxed">Laporan ini menampilkan ringkasan pembelian Anda. Gunakan laporan untuk melihat kecenderungan pesanan dan total pengeluaran saat ini.</p>
            </div>
        </aside>
    </section>
</main>
</body>
</html>