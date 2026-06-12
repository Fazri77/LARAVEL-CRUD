<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kelola Produk | FigureVault</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;500;700;800&family=Archivo+Narrow:wght@700&family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />
    <style>
        .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
        .neobrutal-shadow { box-shadow: 6px 6px 0 rgba(0,0,0,1); }
        .neobrutal-press:active { transform: translate(6px,6px); box-shadow: none; }
        body { background: #f9f9f9; color: #1b1b1b; }
    </style>
</head>
<body class="min-h-screen font-sans pb-24">
<header class="bg-white border-b-4 border-black px-6 py-5 sticky top-0 z-50 neobrutal-shadow">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center gap-2 font-bold uppercase text-sm border-4 border-black bg-amber-300 px-4 py-3 neobrutal-shadow">
                <span class="material-symbols-outlined">arrow_back</span> Kembali
            </a>
            <h1 class="mt-4 text-3xl font-black uppercase">Kelola Produk</h1>
            <p class="mt-2 text-sm text-slate-600">Tambah, edit, atau hapus produk dari koleksi.</p>
        </div>
        <a href="{{ route('admin.barang.create') }}" class="inline-flex items-center gap-2 bg-amber-300 border-4 border-black py-3 px-5 uppercase text-sm font-bold neobrutal-shadow neobrutal-press">
            <span class="material-symbols-outlined">add</span> Produk Baru
        </a>
    </div>
</header>

<main class="max-w-7xl mx-auto px-6 py-10">
    <section class="bg-white border-4 border-black p-6 neobrutal-shadow">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="border-b-4 border-black bg-slate-100">
                        <th class="px-4 py-3 text-xs uppercase font-bold">Nama Produk</th>
                        <th class="px-4 py-3 text-xs uppercase font-bold">Harga</th>
                        <th class="px-4 py-3 text-xs uppercase font-bold">Stok</th>
                        <th class="px-4 py-3 text-xs uppercase font-bold">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($barang ?? [] as $item)
                        <tr class="border-b border-slate-300 hover:bg-slate-50">
                            <td class="px-4 py-4 font-bold">{{ $item->nama }}</td>
                            <td class="px-4 py-4">Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                            <td class="px-4 py-4">{{ $item->stok }}</td>
                            <td class="px-4 py-4 space-x-2">
                                <a href="{{ route('admin.barang.edit', $item->id) }}" class="inline-flex items-center gap-1 px-3 py-2 border-2 border-black bg-amber-300 text-xs font-bold uppercase neobrutal-shadow">Edit</a>
                                <form action="{{ route('admin.barang.destroy', $item->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Apakah Anda yakin?')" class="inline-flex items-center gap-1 px-3 py-2 border-2 border-black bg-red-500 text-white text-xs font-bold uppercase neobrutal-shadow">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-4 py-10 text-center text-slate-500">Belum ada produk.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>

    <div class="mt-6 flex justify-end">
        <a href="{{ route('logout') }}" class="inline-flex items-center gap-2 border-4 border-red-600 bg-red-500 text-white py-3 px-5 font-bold uppercase text-sm neobrutal-shadow">
            <span class="material-symbols-outlined">logout</span> Logout
        </a>
    </div>
</main>
</body>
</html>