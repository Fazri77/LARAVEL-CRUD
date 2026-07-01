<!DOCTYPE html>
<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Laporan Sistem | FigureVault</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;500;700;800&family=Archivo+Narrow:wght@700&family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet" />
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#6d5e00",
                        "primary-container": "#fde047",
                        "on-primary": "#ffffff",
                        "on-primary-container": "#211b00",
                        "surface": "#f9f9f9",
                        "on-surface": "#1b1b1b",
                        "on-surface-variant": "#4b4734",
                        "surface-variant": "#e2e2e2",
                        "outline": "#7d7761",
                        "error": "#ba1a1a",
                        "error-container": "#ffdad6",
                    },
                    fontSize: {
                        'display-lg-mobile': ['40px', {
                            lineHeight: '1.1',
                            fontWeight: '800'
                        }],
                        'headline-lg': ['32px', {
                            lineHeight: '1.2',
                            fontWeight: '700'
                        }],
                        'headline-md': ['24px', {
                            lineHeight: '1.2',
                            fontWeight: '700'
                        }],
                        'body-md': ['16px', {
                            lineHeight: '1.5',
                            fontWeight: '400'
                        }],
                        'label-bold': ['14px', {
                            lineHeight: '1',
                            fontWeight: '700'
                        }]
                    }
                }
            }
        }
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            display: inline-block;
            vertical-align: middle;
        }

        .neobrutal-shadow {
            box-shadow: 6px 6px 0px 0px rgba(0, 0, 0, 1);
        }

        .neobrutal-shadow-large {
            box-shadow: 8px 8px 0px 0px rgba(0, 0, 0, 1);
        }

        .bg-pattern {
            background-color: #f9f9f9;
            background-image: radial-gradient(#1b1b1b 1px, transparent 1px);
            background-size: 32px 32px;
        }
    </style>
</head>

<body class="bg-surface text-on-surface font-body-md text-body-md bg-pattern min-h-screen pb-28">
    <!-- Header -->
    <header class="border-b-4 border-on-surface bg-surface">
        <div class="max-w-7xl mx-auto px-4 py-4 md:py-6 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center gap-3 hover:opacity-70 transition-opacity">
                    <div
                        class="flex h-12 w-12 items-center justify-center bg-primary-container border-4 border-on-surface text-lg font-extrabold neobrutal-shadow">
                        F</div>
                    <div>
                        <p class="font-label-bold text-label-bold uppercase text-on-surface-variant">FigureVault</p>
                        <p class="text-headline-md font-bold text-on-surface">Admin Panel</p>
                    </div>
                </a>
            </div>
            <div class="flex items-center gap-4">
                <span class="font-label-bold text-label-bold text-on-surface">{{ session('admin_username') }}</span>
                <a href="{{ route('logout') }}"
                    class="px-4 py-2 bg-red-500 text-white border-2 border-red-700 font-label-bold text-label-bold uppercase neobrutal-shadow hover:bg-red-600 transition-colors">
                    Logout
                </a>
            </div>
        </div>
    </header>

    @include('admin.partials.navbar')

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 py-8">
        @if (session('success'))
            <div class="alert-notification mb-6 p-4 bg-emerald-100 border-4 border-emerald-600 text-emerald-900 rounded-lg neobrutal-shadow">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert-notification mb-6 p-4 bg-red-100 border-4 border-red-600 text-red-900 rounded-lg neobrutal-shadow">
                {{ session('error') }}
            </div>
        @endif

        <!-- Section Header -->
        <div class="mb-8">
            <h1 class="text-headline-lg font-bold text-on-surface uppercase">Laporan Sistem</h1>
            <p class="mt-2 text-sm text-on-surface-variant">Ringkasan lengkap transaksi dan kinerja penjualan seluruh
                platform.</p>
        </div>
        <section class="grid gap-6 lg:grid-cols-4">
            <div class="bg-slate-900 text-white border-4 border-black p-6 neobrutal-shadow">
                <p class="text-xs uppercase tracking-[0.35em] text-slate-400">Total Transaksi</p>
                <p class="mt-4 text-4xl font-black">{{ $totals->count ?? 0 }}</p>
            </div>
            <div class="bg-white border-4 border-black p-6 neobrutal-shadow">
                <p class="text-xs uppercase tracking-[0.35em] text-slate-500">Total Revenue</p>
                <p class="mt-4 text-4xl font-black">Rp {{ number_format($totals->revenue ?? 0, 0, ',', '.') }}</p>
            </div>
            <div class="bg-white border-4 border-black p-6 neobrutal-shadow">
                <p class="text-xs uppercase tracking-[0.35em] text-slate-500">Item Terjual</p>
                <p class="mt-4 text-4xl font-black">{{ $totals->items ?? 0 }}</p>
            </div>
            <div class="bg-white border-4 border-black p-6 neobrutal-shadow">
                <p class="text-xs uppercase tracking-[0.35em] text-slate-500">Transaksi Pending</p>
                <p class="mt-4 text-4xl font-black">{{ $totals->pending ?? 0 }}</p>
            </div>
        </section>

        <section class="grid gap-6 lg:grid-cols-[2fr_1fr]">
            <div class="bg-white border-4 border-black p-6 neobrutal-shadow">
                <h2 class="font-bold uppercase tracking-[0.35em] mb-4">Transaksi Terbaru</h2>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="border-b-2 border-black">
                                <th class="text-left py-2 px-3 font-bold">Invoice</th>
                                <th class="text-left py-2 px-3 font-bold">User</th>
                                <th class="text-left py-2 px-3 font-bold">Item</th>
                                <th class="text-left py-2 px-3 font-bold">Total</th>
                                <th class="text-left py-2 px-3 font-bold">Status</th>
                                <th class="text-left py-2 px-3 font-bold">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($transactions as $transaction)
                                <tr class="border-b border-slate-300">
                                    <td class="py-2 px-3 font-bold">{{ $transaction->invoice }}</td>
                                    <td class="py-2 px-3">{{ $transaction->user_email }}</td>
                                    <td class="py-2 px-3">{{ $transaction->barang_name }}</td>
                                    <td class="py-2 px-3">Rp {{ number_format($transaction->total, 0, ',', '.') }}</td>
                                    <td class="py-2 px-3"><span
                                            class="px-2 py-1 border-2 border-black text-xs font-bold {{ $transaction->status === 'Pending' ? 'bg-yellow-200' : 'bg-emerald-200' }}">{{ $transaction->status }}</span>
                                    </td>
                                    <td class="py-2 px-3">
                                        @if ($transaction->status === 'Pending')
                                            <form action="{{ route('admin.transactions.confirm', $transaction->id) }}" method="POST" class="inline">
                                                @csrf
                                                <button type="submit" class="px-3 py-1 bg-emerald-400 text-on-surface border-2 border-black font-bold text-xs uppercase neobrutal-shadow hover:bg-emerald-500 transition-colors">
                                                    Konfirmasi
                                                </button>
                                            </form>
                                        @else
                                            <span class="text-slate-400 text-xs font-bold uppercase">-</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="py-4 px-3 text-center text-slate-500">Belum ada transaksi.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <aside class="space-y-4">
                <div class="bg-white border-4 border-black p-6 neobrutal-shadow">
                    <h3 class="font-bold uppercase tracking-[0.35em] mb-4">Status Breakdown</h3>
                    <div class="space-y-3">
                        @foreach ($statusBreakdown as $status)
                            <div
                                class="flex justify-between items-center gap-2 border-t border-slate-200 pt-2 first:pt-0 text-sm">
                                <span class="font-bold">{{ $status->status }}</span>
                                <span>{{ $status->count }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="bg-black text-white border-4 border-black p-6 neobrutal-shadow">
                    <h3 class="font-bold uppercase tracking-[0.35em] mb-2 text-sm">Sistem</h3>
                    <p class="text-xs leading-relaxed">Laporan real-time untuk monitoring performa penjualan dan
                        transaksi platform.</p>
                </div>
            </aside>
        </section>
    </main>
</body>

</html>
