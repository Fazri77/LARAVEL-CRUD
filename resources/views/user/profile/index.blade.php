<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>User Profile | FigureVault</title>
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
            <a href="{{ route('barang.index') }}" class="inline-flex items-center gap-2 font-bold uppercase text-sm border-4 border-black bg-amber-300 px-4 py-3 neobrutal-shadow">
                <span class="material-symbols-outlined">arrow_back</span> Kembali ke Home
            </a>
            <h1 class="mt-4 text-3xl font-black uppercase">User Profile</h1>
            <p class="mt-2 text-sm text-slate-600">Kelola informasi profil dan preferensi Anda.</p>
        </div>
    </div>
</header>

<main class="max-w-2xl mx-auto px-6 py-10">
    <div class="bg-white border-4 border-black p-8 neobrutal-shadow space-y-6">
        <div>
            <label class="font-bold uppercase text-sm block mb-2">Email</label>
            <input type="email" value="{{ session('user_email') }}" disabled class="w-full border-4 border-black p-3 bg-slate-100" />
            <p class="text-xs text-slate-600 mt-1">Email Anda yang terdaftar di sistem.</p>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="font-bold uppercase text-sm block mb-2">Status</label>
                <div class="border-4 border-black p-3 bg-emerald-100 font-bold">Aktif</div>
            </div>
            <div>
                <label class="font-bold uppercase text-sm block mb-2">Tipe Akun</label>
                <div class="border-4 border-black p-3 bg-slate-100 font-bold">User</div>
            </div>
        </div>

        <div class="bg-slate-100 border-4 border-black p-4">
            <p class="text-sm text-slate-700"><strong>Informasi:</strong> Sebagai user, Anda dapat membuat transaksi, melihat riwayat pesanan, dan laporan pembelian pribadi Anda.</p>
        </div>

        <div class="flex justify-end gap-3">
            <a href="{{ route('logout') }}" class="inline-flex items-center gap-2 border-4 border-red-600 bg-red-500 text-white py-3 px-5 font-bold uppercase text-sm neobrutal-shadow">
                <span class="material-symbols-outlined">logout</span> Logout
            </a>
        </div>
    </div>
</main>
</body>
</html>