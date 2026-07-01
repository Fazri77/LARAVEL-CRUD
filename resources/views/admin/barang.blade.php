<!DOCTYPE html>
<html class="light" lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FigureVault | Kelola Produk</title>
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
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 hover:opacity-70 transition-opacity">
                    <div class="flex h-12 w-12 items-center justify-center bg-primary-container border-4 border-on-surface text-lg font-extrabold neobrutal-shadow">F</div>
                    <div>
                        <p class="font-label-bold text-label-bold uppercase text-on-surface-variant">FigureVault</p>
                        <p class="text-headline-md font-bold text-on-surface">Admin Panel</p>
                    </div>
                </a>
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
            <div class="mb-6 p-5 bg-emerald-100 border-4 border-emerald-700 text-emerald-900 rounded-lg neobrutal-shadow">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="mb-6 p-5 bg-red-100 border-4 border-red-700 text-red-900 rounded-lg neobrutal-shadow">
                {{ session('error') }}
            </div>
        @endif

        <!-- Breadcrumb -->
        <div class="mb-6 flex items-center gap-2">
            <a href="{{ route('admin.dashboard') }}" class="font-label-bold text-label-bold text-on-surface-variant hover:text-on-surface">Dashboard</a>
            <span class="text-on-surface-variant">/</span>
            <span class="font-label-bold text-label-bold text-on-surface">Kelola Produk</span>
        </div>

        <!-- Section Header -->
            <div class="flex items-center justify-between gap-4 mb-6 flex-wrap">
            <h1 class="text-headline-lg font-bold text-on-surface">Daftar Produk</h1>
            <a href="{{ route('admin.barang.create') }}" class="px-6 py-3 bg-green-400 text-on-surface border-4 border-on-surface font-label-bold text-label-bold uppercase neobrutal-shadow hover:bg-green-500 transition-colors inline-flex items-center gap-2">
                <span class="material-symbols-outlined">add</span>Tambah Produk
            </a>
        </div>

        <!-- Products Table -->
        <div class="bg-white border-4 border-on-surface neobrutal-shadow-large overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-primary-container border-b-4 border-on-surface">
                            <th class="px-6 py-4 text-left font-label-bold text-label-bold uppercase text-on-primary-container">Gambar</th>
                            <th class="px-6 py-4 text-left font-label-bold text-label-bold uppercase text-on-primary-container">Nama Produk</th>
                            <th class="px-6 py-4 text-left font-label-bold text-label-bold uppercase text-on-primary-container">Harga</th>
                            <th class="px-6 py-4 text-left font-label-bold text-label-bold uppercase text-on-primary-container">Stok</th>
                            <th class="px-6 py-4 text-left font-label-bold text-label-bold uppercase text-on-primary-container">Ditambahkan</th>
                            <th class="px-6 py-4 text-left font-label-bold text-label-bold uppercase text-on-primary-container">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($barang as $item)
                            <tr class="border-b-2 border-surface-variant hover:bg-surface-variant transition-colors">
                                <td class="px-6 py-4">
                                    @if ($item->gambar)
                                        <img src="{{ asset('storage/barang/' . $item->gambar) }}" alt="{{ $item->nama }}" class="w-12 h-12 object-cover border-2 border-on-surface">
                                    @else
                                        <div class="w-12 h-12 bg-surface-variant border-2 border-on-surface flex items-center justify-center">
                                            <span class="material-symbols-outlined text-on-surface-variant">image_not_supported</span>
                                        </div>
                                    @endif
                                </td>
                                <td class="px-6 py-4 font-body-md font-bold text-on-surface">{{ $item->nama }}</td>
                                <td class="px-6 py-4 font-body-md">Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                                <td class="px-6 py-4 font-body-md">
                                    <span class="px-3 py-1 bg-primary-container text-on-primary-container border-2 border-on-surface font-label-bold text-label-bold inline-block">{{ $item->stok }}</span>
                                </td>
                                <td class="px-6 py-4 font-body-md text-on-surface-variant">{{ $item->created_at->format('d M Y') }}</td>
                                <td class="px-6 py-4 flex gap-2">
                                    <a href="{{ route('admin.barang.show', $item->id) }}" class="px-3 py-1 bg-blue-400 text-white border-2 border-blue-700 font-label-bold text-label-bold uppercase text-xs hover:bg-blue-500 transition-colors inline-flex items-center gap-1">
                                        <span class="material-symbols-outlined text-sm">visibility</span>Lihat
                                    </a>
                                    <a href="{{ route('admin.barang.edit', $item->id) }}" class="px-3 py-1 bg-amber-400 text-on-primary-container border-2 border-amber-700 font-label-bold text-label-bold uppercase text-xs hover:bg-amber-500 transition-colors inline-flex items-center gap-1">
                                        <span class="material-symbols-outlined text-sm">edit</span>Edit
                                    </a>
                                    <form method="POST" action="{{ route('admin.barang.destroy', $item->id) }}" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-3 py-1 bg-red-500 text-white border-2 border-red-700 font-label-bold text-label-bold uppercase text-xs hover:bg-red-600 transition-colors inline-flex items-center gap-1" onclick="return confirm('Yakin hapus produk ini?')">
                                            <span class="material-symbols-outlined text-sm">delete</span>Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-12 text-center">
                                    <div class="flex flex-col items-center gap-4">
                                        <span class="material-symbols-outlined text-6xl text-on-surface-variant">box</span>
                                        <p class="font-body-md text-on-surface-variant">Belum ada produk</p>
                                        <a href="{{ route('admin.barang.create') }}" class="px-4 py-2 bg-primary-container text-on-primary-container border-4 border-on-surface font-label-bold text-label-bold uppercase neobrutal-shadow hover:bg-yellow-400 transition-colors">
                                            Buat Produk Pertama
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if ($barang->hasPages())
                <div class="px-6 py-4 border-t-2 border-surface-variant flex items-center justify-between">
                    <div>
                        <p class="font-label-bold text-label-bold text-on-surface-variant">
                            Menampilkan {{ $barang->firstItem() }} sampai {{ $barang->lastItem() }} dari {{ $barang->total() }} produk
                        </p>
                    </div>
                    <div class="flex gap-2">
                        @if ($barang->onFirstPage())
                            <button disabled class="px-3 py-2 bg-surface-variant text-on-surface-variant border-2 border-on-surface font-label-bold text-label-bold uppercase text-xs cursor-not-allowed">
                                ← Sebelumnya
                            </button>
                        @else
                            <a href="{{ $barang->previousPageUrl() }}" class="px-3 py-2 bg-primary-container text-on-primary-container border-2 border-on-surface font-label-bold text-label-bold uppercase text-xs hover:bg-yellow-400 transition-colors">
                                ← Sebelumnya
                            </a>
                        @endif

                        @if ($barang->hasMorePages())
                            <a href="{{ $barang->nextPageUrl() }}" class="px-3 py-2 bg-primary-container text-on-primary-container border-2 border-on-surface font-label-bold text-label-bold uppercase text-xs hover:bg-yellow-400 transition-colors">
                                Berikutnya →
                            </a>
                        @else
                            <button disabled class="px-3 py-2 bg-surface-variant text-on-surface-variant border-2 border-on-surface font-label-bold text-label-bold uppercase text-xs cursor-not-allowed">
                                Berikutnya →
                            </button>
                        @endif
                    </div>
                </div>
            @endif
        </div>
    </main>
    <script src="{{ asset('js/neobrutal-helpers.js') }}"></script>
</body>
</html>