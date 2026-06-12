<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $barang->nama }} - FigureVault</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;500;700;800&family=Archivo+Narrow:wght@700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "on-error": "#ffffff",
                        "surface-container-lowest": "#ffffff",
                        "tertiary-fixed": "#6bff8f",
                        "surface-container-low": "#f3f3f3",
                        "primary-container": "#fde047",
                        "surface-variant": "#e2e2e2",
                        "secondary-container": "#e4006c",
                        "on-surface": "#1b1b1b",
                        "surface-tint": "#6d5e00",
                        "primary": "#6d5e00",
                        "tertiary-fixed-dim": "#4ae176",
                        "outline": "#7d7761",
                        "secondary-fixed-dim": "#ffb1c3",
                        "surface-container": "#eeeeee",
                        "tertiary-container": "#68fc8d",
                        "inverse-primary": "#e2c62d",
                        "on-primary-fixed": "#211b00",
                        "on-tertiary-fixed-variant": "#005321",
                        "on-surface-variant": "#4b4734",
                        "on-primary-container": "#726300",
                        "surface-container-high": "#e8e8e8",
                        "on-primary-fixed-variant": "#524600",
                        "tertiary": "#006e2f",
                        "secondary": "#b60055",
                        "primary-fixed-dim": "#e2c62d",
                        "on-tertiary-fixed": "#002109",
                        "on-secondary-fixed": "#3f0019",
                        "surface": "#f9f9f9",
                        "on-primary": "#ffffff",
                        "on-secondary-container": "#fffbff",
                        "error-container": "#ffdad6",
                        "background": "#f9f9f9",
                        "outline-variant": "#cec6ad",
                        "on-tertiary-container": "#007331",
                        "on-secondary-fixed-variant": "#8f0041",
                        "on-background": "#1b1b1b",
                        "surface-bright": "#f9f9f9",
                        "on-error-container": "#93000a",
                        "error": "#ba1a1a",
                        "primary-fixed": "#ffe24c",
                        "inverse-on-surface": "#f1f1f1",
                        "on-tertiary": "#ffffff",
                        "secondary-fixed": "#ffd9e0",
                        "on-secondary": "#ffffff",
                        "surface-container-highest": "#e2e2e2",
                        "inverse-surface": "#303030",
                        "surface-dim": "#dadada"
                    },
                    borderRadius: {
                        DEFAULT: '0.25rem',
                        lg: '0.5rem',
                        xl: '0.75rem',
                        full: '9999px'
                    },
                    spacing: {
                        'margin-mobile': '16px',
                        'stroke-weight': '4px',
                        'shadow-offset': '6px',
                        'unit': '4px',
                        'margin-desktop': '48px',
                        gutter: '24px'
                    },
                    fontFamily: {
                        'display-lg': ['Lexend'],
                        'label-bold': ['Archivo Narrow'],
                        'body-lg': ['Lexend'],
                        'display-lg-mobile': ['Lexend'],
                        'headline-lg': ['Lexend'],
                        'headline-md': ['Lexend'],
                        'body-md': ['Lexend']
                    },
                    fontSize: {
                        'display-lg': ['64px', { lineHeight: '1.1', letterSpacing: '-0.02em', fontWeight: '800' }],
                        'label-bold': ['14px', { lineHeight: '1', fontWeight: '700' }],
                        'body-lg': ['18px', { lineHeight: '1.5', fontWeight: '500' }],
                        'display-lg-mobile': ['40px', { lineHeight: '1.1', fontWeight: '800' }],
                        'headline-lg': ['32px', { lineHeight: '1.2', fontWeight: '700' }],
                        'headline-md': ['24px', { lineHeight: '1.2', fontWeight: '700' }],
                        'body-md': ['16px', { lineHeight: '1.5', fontWeight: '400' }]
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
        body {
            background-color: #f9f9f9;
            color: #1b1b1b;
        }
        .neobrutal-shadow {
            box-shadow: 6px 6px 0px 0px rgba(0,0,0,1);
        }
        .neobrutal-shadow-lg {
            box-shadow: 8px 8px 0px 0px rgba(0,0,0,1);
        }
        .neobrutal-button-active:active {
            transform: translate(6px, 6px);
            box-shadow: 0px 0px 0px 0px rgba(0, 0, 0, 1);
        }
    </style>
</head>
<body class="bg-background text-on-background min-h-screen font-body-md text-body-md">
<header class="bg-surface border-b-4 border-on-surface shadow-[6px_6px_0px_0px_rgba(0,0,0,1)] flex justify-between items-center w-full px-margin-mobile py-unit h-20 sticky top-0 z-50">
    <div class="flex items-center gap-4">
        <a href="{{ session('user_type') === 'admin' ? route('admin.barang') : route('barang.index') }}" class="flex items-center justify-center p-2 border-2 border-on-surface neobrutal-shadow bg-surface hover:translate-x-[4px] hover:translate-y-[4px] hover:shadow-none transition-all">
            <span class="material-symbols-outlined">arrow_back</span>
        </a>
        <h1 class="font-display-lg-mobile text-display-lg-mobile font-extrabold tracking-tighter text-on-surface">FigureVault</h1>
    </div>
    <div class="flex items-center gap-4">
        <a href="{{ session('user_type') === 'admin' ? route('admin.barang.edit', $barang->id) : route('barang.edit', $barang->id) }}" class="rounded-sm bg-amber-300 px-6 py-2 font-bold text-slate-900 border-heavy border-slate-900 neobrutal-shadow transition-all">
            <span class="material-symbols-outlined inline">edit</span> Edit
        </a>
    </div>
</header>

<main class="max-w-5xl mx-auto px-margin-mobile py-10 md:py-16">
    <div class="grid grid-cols-1 md:grid-cols-12 gap-gutter">
        <div class="md:col-span-6">
            <div class="bg-white border-4 border-on-surface neobrutal-shadow-lg aspect-square overflow-hidden">
                <img src="{{ asset('/storage/barang/'.$barang->gambar) }}" alt="{{ $barang->nama }}" class="w-full h-full object-cover" />
            </div>
            <div class="mt-6 flex flex-col gap-2">
                <span class="font-label-bold text-label-bold uppercase text-on-surface-variant">Product Info</span>
                <div class="bg-surface-container-high border-2 border-on-surface p-4 flex flex-col gap-3">
                    <div class="flex justify-between">
                        <span class="font-label-bold text-label-bold">Added:</span>
                        <span>{{ $barang->created_at ? $barang->created_at->format('M d, Y') : 'Unknown' }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="font-label-bold text-label-bold">Stock:</span>
                        <span class="font-bold text-emerald-600">{{ $barang->stok }} pcs</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="md:col-span-6 flex flex-col gap-8">
            <div>
                <h1 class="font-headline-lg text-headline-lg-mobile md:font-display-lg md:text-display-lg mb-4">{{ $barang->nama }}</h1>
                <div class="text-4xl font-black text-on-surface mb-6">Rp {{ number_format($barang->harga,0,',','.') }}</div>
            </div>

            <div class="flex flex-col gap-2">
                <label class="font-label-bold text-label-bold uppercase tracking-wider text-on-surface">Description</label>
                <div class="bg-white p-6 border-4 border-on-surface neobrutal-shadow">
                    <p class="font-body-md text-body-md leading-relaxed text-on-surface">{!! $barang->keterangan !!}</p>
                </div>
            </div>

            <div class="flex flex-col sm:flex-row gap-4">
                <a href="{{ session('user_type') === 'admin' ? route('admin.barang.edit', $barang->id) : route('barang.edit', $barang->id) }}" class="flex-1 h-16 bg-primary-container text-on-primary border-4 border-on-surface font-headline-md text-headline-md neobrutal-shadow neobrutal-button-active hover:-translate-y-0.5 transition-all flex items-center justify-center gap-3">
                    <span class="material-symbols-outlined">edit</span>
                    Edit Figure
                </a>
                <a href="{{ session('user_type') === 'admin' ? route('admin.barang') : route('barang.index') }}" class="flex-1 h-16 bg-surface-container text-on-surface border-4 border-on-surface font-headline-md text-headline-md neobrutal-shadow neobrutal-button-active hover:-translate-y-0.5 transition-all flex items-center justify-center gap-3">
                    <span class="material-symbols-outlined">arrow_back</span>
                    Back to Home
                </a>
            </div>
        </div>
    </div>
</main>

<div class="h-24"></div>
</body>
</html>