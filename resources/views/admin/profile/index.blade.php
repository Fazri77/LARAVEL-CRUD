<!DOCTYPE html>
<html class="light" lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Profile | FigureVault</title>
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
    <main class="max-w-2xl mx-auto px-4 py-8">
        <!-- Section Header -->
        <div class="mb-6">
            <h1 class="text-headline-lg font-bold text-on-surface uppercase">Admin Profile</h1>
            <p class="mt-2 text-sm text-on-surface-variant">Kelola informasi profil admin Anda.</p>
        </div>
        <div class="bg-white border-4 border-black p-8 neobrutal-shadow space-y-6">
        <div>
            <label class="font-bold uppercase text-sm block mb-2">Username Admin</label>
            <input type="text" value="{{ session('admin_username') }}" disabled class="w-full border-4 border-black p-3 bg-slate-100" />
            <p class="text-xs text-slate-600 mt-1">Username tidak dapat diubah.</p>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="font-bold uppercase text-sm block mb-2">Status</label>
                <div class="border-4 border-black p-3 bg-emerald-100 font-bold">Aktif</div>
            </div>
            <div>
                <label class="font-bold uppercase text-sm block mb-2">Tipe Akun</label>
                <div class="border-4 border-black p-3 bg-slate-100 font-bold">Administrator</div>
            </div>
        </div>

        <div class="bg-slate-100 border-4 border-black p-4 rounded">
            <p class="text-sm text-slate-700"><strong>Informasi:</strong> Sebagai admin, Anda memiliki akses penuh untuk mengelola produk, melihat laporan, dan mengatur data sistem.</p>
        </div>

        <div class="flex justify-between items-center flex-wrap gap-3">
            <a href="{{ route('admin.tools') }}" class="inline-flex items-center gap-2 border-4 border-black bg-cyan-400 text-black py-3 px-5 font-bold uppercase text-sm neobrutal-shadow hover:bg-cyan-500 transition-colors">
                <span class="material-symbols-outlined">database</span> Export & Import Data
            </a>
        </div>
    </div>
</main>
</body>
</html>