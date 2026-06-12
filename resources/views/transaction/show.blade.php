<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Detail Transaksi | FigureVault</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;500;700;800&family=Archivo+Narrow:wght@700&family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet" />
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }

        .neobrutal-shadow {
            box-shadow: 6px 6px 0 rgba(0, 0, 0, 1);
        }

        .neobrutal-press:active {
            transform: translate(6px, 6px);
            box-shadow: none;
        }

        body {
            background: #f9f9f9;
            color: #1b1b1b;
        }
    </style>
</head>

<body class="min-h-screen font-sans">
    <header class="bg-white border-b-4 border-black px-6 py-5 sticky top-0 z-50 neobrutal-shadow">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <a href="{{ route('transactions.history') }}"
                    class="inline-flex items-center gap-2 font-bold uppercase text-sm border-4 border-black bg-amber-300 px-4 py-3 neobrutal-shadow neobrutal-press">
                    <span class="material-symbols-outlined">arrow_back</span> Kembali ke Riwayat
                </a>
                <h1 class="mt-4 text-3xl font-black uppercase tracking-tight">Detail Transaksi</h1>
                <p class="mt-2 text-sm text-slate-600">Nomor invoice {{ $transaction->invoice }}, lihat semua detail
                    pembayaran dan status.</p>
            </div>
            <div class="flex flex-col gap-3">
                <div class="grid grid-cols-2 gap-3">
                    <div class="border-4 border-black bg-white p-4 neobrutal-shadow">
                        <p class="text-xs uppercase tracking-[0.35em] text-slate-500">Status</p>
                        <p class="mt-3 text-3xl font-black">{{ $transaction->status }}</p>
                    </div>
                    <div class="border-4 border-black bg-white p-4 neobrutal-shadow">
                        <p class="text-xs uppercase tracking-[0.35em] text-slate-500">Total</p>
                        <p class="mt-3 text-3xl font-black">Rp {{ number_format($transaction->total, 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main class="max-w-5xl mx-auto px-6 py-10 grid gap-8 lg:grid-cols-[1fr_0.8fr]">
        <section class="space-y-6">
            <div class="bg-white border-4 border-black p-8 neobrutal-shadow">
                <h2 class="font-bold uppercase tracking-[0.35em] mb-4">Rincian Pesanan</h2>
                <div class="grid gap-4">
                    <div class="grid grid-cols-2 gap-4">
                        <span class="font-bold">Invoice</span>
                        <span>{{ $transaction->invoice }}</span>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <span class="font-bold">Item</span>
                        <span>{{ $transaction->barang_name }}</span>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <span class="font-bold">Harga Satuan</span>
                        <span>Rp {{ number_format($transaction->harga, 0, ',', '.') }}</span>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <span class="font-bold">Jumlah</span>
                        <span>{{ $transaction->qty }}</span>
                    </div>
                    <div class="grid grid-cols-2 gap-4 border-t border-slate-300 pt-4">
                        <span class="font-bold">Total Pembayaran</span>
                        <span class="text-2xl font-black">Rp {{ number_format($transaction->total, 0, ',', '.') }}</span>
                    </div>
                </div>
            </div>

            <div class="bg-white border-4 border-black p-8 neobrutal-shadow">
                <h2 class="font-bold uppercase tracking-[0.35em] mb-4">Pembayaran & Pengirim</h2>
                <div class="grid gap-4">
                    <div class="grid grid-cols-2 gap-4">
                        <span class="font-bold">Metode Pembayaran</span>
                        <span>{{ $transaction->payment_method }}</span>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <span class="font-bold">Email User</span>
                        <span>{{ $transaction->user_email }}</span>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <span class="font-bold">Tanggal Pesan</span>
                        <span>{{ $transaction->created_at->format('d M Y H:i') }}</span>
                    </div>
                </div>
            </div>
        </section>

        <aside class="space-y-6">
            <div class="bg-black text-white border-4 border-black p-8 neobrutal-shadow">
                <h3 class="font-bold uppercase tracking-[0.35em] mb-4">Status Transaksi</h3>
                <p class="text-sm leading-relaxed">Pesanan Anda sedang diproses dan akan diperbarui apabila pembayaran
                    diterima.</p>
                <div class="mt-6 grid gap-4">
                    <div class="bg-slate-900 p-4 border-2 border-white">
                        <p class="text-xs uppercase tracking-[0.35em] text-slate-400">Invoice</p>
                        <p class="mt-2 font-bold">{{ $transaction->invoice }}</p>
                    </div>
                    <div class="bg-slate-900 p-4 border-2 border-white">
                        <p class="text-xs uppercase tracking-[0.35em] text-slate-400">Pesanan</p>
                        <p class="mt-2 font-bold">{{ $transaction->barang_name }}</p>
                    </div>
                </div>
            </div>
        </aside>
    </main>
</body>

</html>
