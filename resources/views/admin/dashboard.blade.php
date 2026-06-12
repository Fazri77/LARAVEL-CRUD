<!DOCTYPE html>
<html class="light" lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FigureVault | Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;500;700;800&family=Archivo+Narrow:wght@700&family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />
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
                        'display-lg-mobile': ['40px', { lineHeight: '1.1', fontWeight: '800' }],
                        'headline-lg': ['32px', { lineHeight: '1.2', fontWeight: '700' }],
                        'headline-md': ['24px', { lineHeight: '1.2', fontWeight: '700' }],
                        'body-md': ['16px', { lineHeight: '1.5', fontWeight: '400' }],
                        'label-bold': ['14px', { lineHeight: '1', fontWeight: '700' }]
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
            box-shadow: 6px 6px 0px 0px rgba(0,0,0,1);
        }
        .neobrutal-shadow-large {
            box-shadow: 8px 8px 0px 0px rgba(0,0,0,1);
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
                <div class="flex h-12 w-12 items-center justify-center bg-primary-container border-4 border-on-surface text-lg font-extrabold neobrutal-shadow">F</div>
                <div>
                    <p class="font-label-bold text-label-bold uppercase text-on-surface-variant">FigureVault</p>
                    <p class="text-headline-md font-bold text-on-surface">Admin Panel</p>
                </div>
            </div>
            <div class="flex items-center gap-4">
                <span class="font-label-bold text-label-bold text-on-surface">{{ session('admin_username') }}</span>
                <a href="{{ route('logout') }}" class="px-4 py-2 bg-red-500 text-white border-2 border-red-700 font-label-bold text-label-bold uppercase neobrutal-shadow hover:bg-red-600 transition-colors">
                    Logout
                </a>
            </div>
        </div>
    </header>

    @include('admin.partials.navbar')

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 py-8">
        @if (session('success'))
            <div class="mb-6 p-4 bg-emerald-100 border-4 border-emerald-600 text-emerald-900 rounded-lg neobrutal-shadow">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="mb-6 p-4 bg-red-100 border-4 border-red-600 text-red-900 rounded-lg neobrutal-shadow">
                {{ session('error') }}
            </div>
        @endif

        <!-- Stats Section -->
        <section class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
            <div class="bg-white border-4 border-on-surface p-6 neobrutal-shadow">
                <p class="font-label-bold text-label-bold uppercase text-on-surface-variant mb-2">Total Produk</p>
                <p class="text-headline-lg font-bold text-on-surface">{{ $stats['total_barang'] }}</p>
            </div>
            <div class="bg-white border-4 border-on-surface p-6 neobrutal-shadow">
                <p class="font-label-bold text-label-bold uppercase text-on-surface-variant mb-2">Total Stok</p>
                <p class="text-headline-lg font-bold text-on-surface">{{ $stats['total_stock'] }}</p>
            </div>
            <div class="bg-white border-4 border-on-surface p-6 neobrutal-shadow">
                <p class="font-label-bold text-label-bold uppercase text-on-surface-variant mb-2">Total Transaksi</p>
                <p class="text-headline-lg font-bold text-on-surface">{{ $stats['total_transactions'] }}</p>
            </div>
        </section>

        <!-- Actions Section -->
        <section class="mb-10">
            <div class="flex gap-4 flex-wrap">
                <a href="{{ route('admin.barang.create') }}" class="px-6 py-3 bg-green-400 text-on-surface border-4 border-on-surface font-label-bold text-label-bold uppercase neobrutal-shadow hover:bg-green-500 transition-colors">
                    <span class="material-symbols-outlined mr-2 align-middle">add</span>Tambah Produk
                </a>
            </div>
        </section>

        <!-- Recent Products Section -->
        <section class="bg-white border-4 border-on-surface neobrutal-shadow-large">
            <div class="px-6 py-4 border-b-4 border-on-surface bg-primary-container">
                <h2 class="font-headline-md text-headline-md text-on-primary-container">Produk Terbaru</h2>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b-2 border-on-surface">
                            <th class="px-6 py-4 text-left font-label-bold text-label-bold uppercase text-on-surface-variant">Nama Produk</th>
                            <th class="px-6 py-4 text-left font-label-bold text-label-bold uppercase text-on-surface-variant">Harga</th>
                            <th class="px-6 py-4 text-left font-label-bold text-label-bold uppercase text-on-surface-variant">Stok</th>
                            <th class="px-6 py-4 text-left font-label-bold text-label-bold uppercase text-on-surface-variant">Ditambahkan</th>
                            <th class="px-6 py-4 text-left font-label-bold text-label-bold uppercase text-on-surface-variant">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($recentBarang as $item)
                            <tr class="border-b-2 border-surface-variant hover:bg-surface-variant transition-colors">
                                <td class="px-6 py-4 font-body-md">{{ $item->nama }}</td>
                                <td class="px-6 py-4 font-body-md">Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                                <td class="px-6 py-4 font-body-md">
                                    <span class="px-3 py-1 bg-primary-container text-on-primary-container border-2 border-on-surface font-label-bold text-label-bold">{{ $item->stok }}</span>
                                </td>
                                <td class="px-6 py-4 font-body-md text-on-surface-variant">{{ $item->created_at->format('d M Y') }}</td>
                                <td class="px-6 py-4 flex gap-2">
                                    <a href="{{ route('admin.barang.edit', $item->id) }}" class="px-3 py-1 bg-blue-400 text-white border-2 border-blue-700 font-label-bold text-label-bold uppercase text-xs hover:bg-blue-500 transition-colors">
                                        Edit
                                    </a>
                                    <form method="POST" action="{{ route('admin.barang.destroy', $item->id) }}" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-3 py-1 bg-red-500 text-white border-2 border-red-700 font-label-bold text-label-bold uppercase text-xs hover:bg-red-600 transition-colors" onclick="return confirm('Yakin hapus produk ini?')">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-8 text-center text-on-surface-variant font-body-md">Belum ada produk</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>
    </main>
</body>
</html>