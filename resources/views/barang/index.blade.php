<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>FigureVault Marketplace</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;500;700;800&family=Archivo+Narrow:wght@700&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <style>
        .material-symbols-outlined{font-variation-settings:'FILL' 0,'wght' 400,'GRAD' 0,'opsz' 24}
        .neobrutalism-shadow{box-shadow:6px 6px 0 rgba(0,0,0,1)}
        .neobrutalism-shadow-lg{box-shadow:10px 10px 0 rgba(0,0,0,1)}
        .active-press:active{transform:translate(6px,6px);box-shadow:none}
        body{background-color:#f9f9f9}
    </style>
</head>
<body class="font-body-md text-on-background selection:bg-primary-container">
<header class="bg-white border-b-4 border-on-surface shadow-[6px_6px_0_rgba(0,0,0,1)] sticky top-0 z-50">
    <nav class="flex justify-between items-center max-w-7xl mx-auto px-6 py-4">
        <div class="flex items-center gap-8">
            <span class="font-extrabold text-2xl">FigureVault</span>
            <div class="hidden md:flex gap-6">
                <a href="{{ route('transactions.history') }}" class="font-bold uppercase">Riwayat Transaksi</a>
            </div>
        </div>
        <div class="flex items-center gap-4">
            <button class="material-symbols-outlined p-2 border-2 bg-white neobrutalism-shadow">search</button>
            <button class="material-symbols-outlined p-2 border-2 bg-white neobrutalism-shadow">filter_list</button>
            <a href="{{ route('transactions.create') }}" class="relative inline-flex items-center justify-center p-3 border-4 bg-primary-container text-on-primary-container neobrutalism-shadow active-press">
                <span class="material-symbols-outlined">shopping_cart</span>
                <span class="absolute -top-2 -right-2 bg-secondary text-on-secondary text-xs font-bold rounded-full h-5 w-5 flex items-center justify-center">{{ session('cart_count', 0) }}</span>
            </a>
            <a href="{{ route('logout') }}" class="inline-flex items-center gap-2 px-4 py-2 border-2 border-red-600 bg-red-500 text-white font-bold uppercase text-sm neobrutalism-shadow">
                <span class="material-symbols-outlined">logout</span> Logout
            </a>
        </div>
    </nav>
</header>
<main class="max-w-7xl mx-auto px-6 py-12">
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

    <header class="mb-12">
        <h1 class="text-4xl font-extrabold uppercase">Live Marketplace</h1>
        <p class="text-lg text-slate-600 mt-2">Authentic PVC & Resin figures from verified collectors. Every box checked, every seal verified.</p>
    </header>

    <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
        @forelse($barang as $item)
            <article class="bg-white border-4 border-black neobrutalism-shadow flex flex-col">
                <a href="{{ route('barang.show', $item->id) }}" class="relative h-64 overflow-hidden border-b-4 border-black block">
                    <img src="{{ asset('/storage/barang/'.$item->gambar) }}" alt="{{ $item->nama }}" class="h-full w-full object-cover"/>
                    <div class="absolute top-4 left-4 bg-pink-500 text-white px-3 py-1 text-xs font-bold">RARE</div>
                    <div class="absolute bottom-4 right-4 bg-white text-black px-3 py-1 text-xs font-bold">QTY: {{ $item->stok }}</div>
                </a>
                <div class="p-6 flex-1 flex flex-col">
                    <div class="mb-4">
                        <p class="text-xs uppercase text-slate-500">{{ $item->vendor ?? 'Unknown' }}</p>
                        <h3 class="text-xl font-extrabold mt-1">{{ $item->nama }}</h3>
                    </div>
                    <div class="mt-auto">
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-2xl font-black">Rp {{ number_format($item->harga,0,',','.') }}</span>
                        </div>
                        <form action="{{ route('transactions.create') }}" method="GET">
                            <button type="submit" class="w-full bg-amber-300 text-black py-3 font-bold uppercase border-4 border-black neobrutalism-shadow active-press flex items-center justify-center gap-2">
                                <span class="material-symbols-outlined">shopping_bag</span> Add to Cart
                            </button>
                        </form>
                    </div>
                </div>
            </article>
        @empty
            <div class="col-span-full bg-white border-4 border-black p-10 text-center neobrutalism-shadow">
                <p class="font-bold">Belum ada produk.</p>
                <p class="text-slate-600 mt-2">Tambahkan produk baru untuk mulai mengisi koleksi.</p>
            </div>
        @endforelse
    </section>

    <section class="mt-20 grid grid-cols-1 md:grid-cols-12 gap-8 items-center">
        <div class="md:col-span-7">
            <div class="border-4 border-black neobrutalism-shadow-lg overflow-hidden h-[420px]"><img src="/img/figure-hamburger.jpeg" alt="featured" class="w-full h-full object-cover"/></div>
        </div>
        <div class="md:col-span-5 space-y-6">
            <div class="bg-white border-4 border-black p-6 neobrutalism-shadow">
                <div class="material-symbols-outlined text-4xl">verified</div>
                <h3 class="font-bold text-xl mt-3">Verified Authenticity</h3>
                <p class="text-slate-600 mt-2">Every figure in our marketplace undergoes a 12-point authentication process by our experts. No fakes, no replicas.</p>
            </div>
            <div class="bg-emerald-200 border-4 border-black p-6 neobrutalism-shadow">
                <div class="material-symbols-outlined text-4xl">local_shipping</div>
                <h3 class="font-bold text-xl mt-3">Safe Transit</h3>
                <p class="text-slate-600 mt-2">Double-boxed shipping with professional grade bubble wrap and corner protectors. Arrival in mint condition guaranteed.</p>
            </div>
        </div>
    </section>
</main>
</body>
</html>