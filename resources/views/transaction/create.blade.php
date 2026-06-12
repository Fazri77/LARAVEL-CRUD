<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Transaksi Baru | FigureVault</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;500;700;800&family=Archivo+Narrow:wght@700&family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />
    <style>
        .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
        .neobrutal-shadow { box-shadow: 6px 6px 0 rgba(0,0,0,1); }
        .neobrutal-shift:hover { transform: translate(-2px,-2px); }
        .neobrutal-press:active { transform: translate(6px,6px); box-shadow: none; }
        body { background: #f9f9f9; color: #1b1b1b; }
    </style>
</head>
<body class="min-h-screen font-sans">
<header class="bg-white border-b-4 border-black px-6 py-5 sticky top-0 z-50 neobrutal-shadow">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <a href="{{ route('barang.index') }}" class="inline-flex items-center gap-2 font-bold uppercase text-sm border-4 border-black bg-amber-300 px-4 py-3 neobrutal-shadow neobrutal-shift">
                <span class="material-symbols-outlined">arrow_back</span> Kembali ke Home
            </a>
            <h1 class="mt-4 text-3xl font-black uppercase tracking-tight">Buat Transaksi</h1>
            <p class="mt-2 text-sm text-slate-600 max-w-2xl">Pilih item, tentukan jumlah, lalu buat pesanan baru untuk koleksi Anda.</p>
        </div>
        <div class="flex flex-col gap-3">
            <div class="grid grid-cols-2 gap-3">
                <div class="border-4 border-black bg-white p-4 neobrutal-shadow">
                    <p class="text-xs uppercase tracking-[0.35em] text-slate-500">Total Pesanan</p>
                    <p class="mt-3 text-3xl font-bold">0</p>
                </div>
                <div class="border-4 border-black bg-white p-4 neobrutal-shadow">
                    <p class="text-xs uppercase tracking-[0.35em] text-slate-500">Status</p>
                    <p class="mt-3 text-3xl font-bold text-slate-800">Pending</p>
                </div>
            </div>
        </div>
    </div>
</header>
<main class="max-w-6xl mx-auto px-6 py-10 grid gap-8 lg:grid-cols-[1.5fr_1fr]">
    <section class="space-y-8">
        <div class="bg-white border-4 border-black p-8 neobrutal-shadow">
            <h2 class="font-bold uppercase tracking-[0.35em] text-slate-700 mb-4">Form Transaksi</h2>
            <form action="{{ route('transactions.store') }}" method="POST" class="space-y-6">
                @csrf
                <div class="space-y-2">
                    <label class="font-bold uppercase text-sm">Pilih Figur</label>
                    <select name="barang_id" class="w-full border-4 border-black p-4 bg-slate-50" required>
                        <option value="">Pilih koleksi</option>
                        @foreach($barang as $item)
                            <option value="{{ $item->id }}" data-price="{{ $item->harga }}">{{ $item->nama }} — Rp {{ number_format($item->harga,0,',','.') }}</option>
                        @endforeach
                    </select>
                    @error('barang_id')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="font-bold uppercase text-sm">Jumlah</label>
                        <input type="number" name="qty" id="qty" value="1" min="1" class="w-full border-4 border-black p-4 bg-slate-50" required />
                        @error('qty')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>
                    <div class="space-y-2">
                        <label class="font-bold uppercase text-sm">Metode Pembayaran</label>
                        <select name="payment_method" class="w-full border-4 border-black p-4 bg-slate-50" required>
                            <option value="Wallet">Wallet</option>
                            <option value="Transfer">Transfer Bank</option>
                            <option value="Credit Card">Credit Card</option>
                        </select>
                    </div>
                </div>
                <div class="space-y-2">
                    <label class="font-bold uppercase text-sm">Catatan</label>
                    <textarea class="w-full border-4 border-black p-4 bg-slate-50" rows="4" placeholder="Kosongkan untuk informasi otomatis"></textarea>
                </div>
                <button type="submit" class="w-full bg-amber-300 text-black border-4 border-black py-5 font-extrabold uppercase tracking-[0.35em] neobrutal-shadow neobrutal-press">
                    Buat Transaksi
                </button>
            </form>
        </div>
    </section>

    <aside class="space-y-6">
        <div class="bg-black text-white border-4 border-black p-8 neobrutal-shadow">
            <h3 class="font-bold uppercase tracking-[0.35em] mb-4">Ringkasan Pesanan</h3>
            <div class="space-y-4">
                <div class="flex justify-between">
                    <span class="text-sm uppercase text-slate-300">Figure</span>
                    <span id="summary-name" class="font-bold">Belum dipilih</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-sm uppercase text-slate-300">Harga Per Unit</span>
                    <span id="summary-price" class="font-bold">Rp 0</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-sm uppercase text-slate-300">Jumlah</span>
                    <span id="summary-qty" class="font-bold">1</span>
                </div>
                <div class="flex justify-between border-t border-slate-500 pt-4">
                    <span class="text-sm uppercase text-slate-300">Total</span>
                    <span id="summary-total" class="text-2xl font-black text-amber-300">Rp 0</span>
                </div>
            </div>
        </div>

        <div class="bg-white border-4 border-black p-8 neobrutal-shadow">
            <h3 class="font-bold uppercase tracking-[0.35em] mb-4">Info Transaksi</h3>
            <ul class="space-y-4 text-sm">
                <li class="flex justify-between"><span>Status</span><span class="font-bold">Pending</span></li>
                <li class="flex justify-between"><span>Pesanan</span><span class="font-bold">Simpan langsung</span></li>
                <li class="flex justify-between"><span>Dukungan</span><span class="font-bold">24/7</span></li>
            </ul>
        </div>
    </aside>
</main>
<script>
    const barangSelect = document.querySelector('select[name="barang_id"]');
    const qtyInput = document.getElementById('qty');
    const summaryName = document.getElementById('summary-name');
    const summaryPrice = document.getElementById('summary-price');
    const summaryQty = document.getElementById('summary-qty');
    const summaryTotal = document.getElementById('summary-total');

    function updateSummary() {
        const selected = barangSelect.selectedOptions[0];
        const price = selected ? parseInt(selected.dataset.price || '0', 10) : 0;
        const qty = parseInt(qtyInput.value || '1', 10);
        summaryName.textContent = selected ? selected.textContent.split(' — ')[0] : 'Belum dipilih';
        summaryPrice.textContent = 'Rp ' + price.toLocaleString('id-ID');
        summaryQty.textContent = qty;
        summaryTotal.textContent = 'Rp ' + (price * qty).toLocaleString('id-ID');
    }

    barangSelect.addEventListener('change', updateSummary);
    qtyInput.addEventListener('input', updateSummary);
    updateSummary();
</script>
</body>
</html>