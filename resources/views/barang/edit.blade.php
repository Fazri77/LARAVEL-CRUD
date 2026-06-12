<!DOCTYPE html>
<html class="light" lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Edit Figure</title>
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
        .neobrutal-card-hover:hover {
            transform: translate(-2px, -2px);
            box-shadow: 10px 10px 0px 0px rgba(0, 0, 0, 1);
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
        <button class="material-symbols-outlined text-on-surface-variant hover:translate-x-[4px] hover:translate-y-[4px] transition-all">search</button>
        <button class="material-symbols-outlined text-on-surface-variant hover:translate-x-[4px] hover:translate-y-[4px] transition-all">filter_list</button>
    </div>
</header>
<main class="max-w-4xl mx-auto px-margin-mobile py-10 md:py-16">
    <div class="mb-10">
        <h2 class="font-headline-lg-mobile text-display-lg-mobile md:font-headline-lg md:text-headline-lg mb-2">Edit Figure</h2>
        <p class="text-on-surface-variant">Update the details of your collectible item in the vault.</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-12 gap-gutter">
        <div class="md:col-span-4">
            <div class="bg-white border-4 border-on-surface neobrutal-shadow-lg aspect-square relative overflow-hidden group">
                <img src="{{ asset('/storage/barang/'.$barang->gambar) }}" alt="{{ $barang->nama }}" class="w-full h-full object-cover" />
                <label for="gambar" class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity flex cursor-pointer items-center justify-center">
                    <span class="bg-primary text-on-primary border-2 border-on-surface font-label-bold text-label-bold px-4 py-2 neobrutal-shadow flex items-center gap-2">
                        <span class="material-symbols-outlined">photo_camera</span>
                        Change Photo
                    </span>
                </label>
            </div>
            <p id="edit-gambar-name" class="text-center text-sm text-slate-600 mt-3">No file chosen</p>
            <div class="mt-6 flex flex-col gap-2">
                <span class="font-label-bold text-label-bold uppercase text-on-surface-variant">Quick Stats</span
                <div class="bg-surface-container-high border-2 border-on-surface p-4 flex flex-col gap-3">
                    <div class="flex justify-between">
                        <span class="font-label-bold text-label-bold">Added:</span>
                        <span>{{ $barang->created_at ? $barang->created_at->format('M d, Y') : 'Unknown' }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="font-label-bold text-label-bold">Stock:</span>
                        <span class="font-bold">{{ $barang->stok }}</span>
                    </div>
                </div>
            </div>
        </div>
        <form action="{{ session('user_type') === 'admin' ? route('admin.barang.update', $barang->id) : route('barang.update', $barang->id) }}" method="POST" enctype="multipart/form-data" class="md:col-span-8 flex flex-col gap-8">
            @csrf
            @method('PUT')
            <div class="flex flex-col gap-2">
                <label for="nama" class="font-label-bold text-label-bold uppercase tracking-wider">Figure Name</label>
                <input id="nama" name="nama" type="text" value="{{ old('nama', $barang->nama) }}" class="w-full h-14 px-4 bg-white border-4 border-on-surface font-body-lg text-body-lg focus:outline-none focus:bg-primary-container focus:shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] transition-all" required />
                @error('nama')<p class="text-sm text-error">{{ $message }}</p>@enderror
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-gutter">
                <div class="flex flex-col gap-2">
                    <label for="harga" class="font-label-bold text-label-bold uppercase tracking-wider">Price ($)</label>
                    <input id="harga" name="harga" type="number" step="0.01" value="{{ old('harga', $barang->harga) }}" class="w-full h-14 px-4 bg-white border-4 border-on-surface font-body-lg text-body-lg focus:outline-none focus:bg-primary-container focus:shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] transition-all" required />
                    @error('harga')<p class="text-sm text-error">{{ $message }}</p>@enderror
                </div>
                <div class="flex flex-col gap-2">
                    <label for="stok" class="font-label-bold text-label-bold uppercase tracking-wider">Quantity</label>
                    <input id="stok" name="stok" type="number" value="{{ old('stok', $barang->stok) }}" class="w-full h-14 px-4 bg-white border-4 border-on-surface font-body-lg text-body-lg focus:outline-none focus:bg-primary-container focus:shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] transition-all" required />
                    @error('stok')<p class="text-sm text-error">{{ $message }}</p>@enderror
                </div>
            </div>
            <div class="flex flex-col gap-2">
                <label for="gambar" class="font-label-bold text-label-bold uppercase tracking-wider">Change Photo</label>
                <div class="relative border-4 border-on-surface bg-surface-container-high h-48 flex items-center justify-center neobrutal-shadow-lg">
                    <span class="text-on-surface-variant">Click here to choose a new file</span>
                    <input id="gambar" name="gambar" type="file" accept="image/*" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" />
                </div>
                <p id="edit-gambar-name" class="text-center text-sm text-slate-600">No file chosen</p>
                @error('gambar')<p class="text-sm text-error">{{ $message }}</p>@enderror
            </div>
            <div class="flex flex-col gap-2">
                <label for="keterangan" class="font-label-bold text-label-bold uppercase tracking-wider">Description</label>
                <textarea id="keterangan" name="keterangan" rows="5" class="w-full p-4 bg-white border-4 border-on-surface font-body-md text-body-md focus:outline-none focus:bg-primary-container focus:shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] transition-all" required>{{ old('keterangan', $barang->keterangan) }}</textarea>
                @error('keterangan')<p class="text-sm text-error">{{ $message }}</p>@enderror
            </div>
            <div class="flex flex-col sm:flex-row gap-6 mt-4">
                <button type="submit" class="flex-1 h-16 bg-primary-container text-on-primary border-4 border-on-surface font-headline-md text-headline-md neobrutal-shadow neobrutal-button-active hover:-translate-y-0.5 transition-all flex items-center justify-center gap-3">
                    <span class="material-symbols-outlined">save</span>
                    Update Figure
                </button>
            </div>
        </form>
        <div class="sm:w-1/3 md:col-span-8 sm:col-start-6">
            <form action="{{ session('user_type') === 'admin' ? route('admin.barang.destroy', $barang->id) : route('barang.destroy', $barang->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus item ini?');" class="w-full h-16 bg-secondary text-on-secondary border-4 border-on-surface font-headline-md text-headline-md neobrutal-shadow neobrutal-button-active hover:-translate-y-0.5 transition-all flex items-center justify-center gap-3">
                    <span class="material-symbols-outlined">delete</span>
                    Delete
                </button>
            </form>
        </div>
    </div>
</main>
<div class="h-24"></div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const gambarInput = document.getElementById('gambar');
        const gambarName = document.getElementById('edit-gambar-name');
        if (gambarInput && gambarName) {
            gambarInput.addEventListener('change', function () {
                gambarName.textContent = this.files.length ? this.files[0].name : 'No file chosen';
            });
        }
    });
</script>
</body>
</html>