<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add New Figure</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;500;700;800&family=Archivo+Narrow:wght@700&family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />
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
              unit: '4px',
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
        .neobrutalist-shadow {
            box-shadow: 6px 6px 0px 0px rgba(0,0,0,1);
        }
        .neobrutalist-shadow-hover:hover {
            box-shadow: 10px 10px 0px 0px rgba(0,0,0,1);
            transform: translate(-4px, -4px);
        }
        .neobrutalist-shadow-active:active {
            box-shadow: 0px 0px 0px 0px rgba(0,0,0,1);
            transform: translate(6px, 6px);
        }
    </style>
</head>
<body class="min-h-screen pb-24">
    <header class="bg-surface sticky top-0 z-50 flex justify-between items-center w-full px-margin-mobile py-unit h-20 border-b-4 border-on-surface shadow-[6px_6px_0px_0px_rgba(0,0,0,1)]">
    <div class="flex items-center gap-4">
        <a href="{{ session('user_type') === 'admin' ? route('admin.barang') : route('barang.index') }}" class="flex items-center justify-center p-2 border-2 border-on-surface neobrutalist-shadow bg-surface hover:translate-x-[4px] hover:translate-y-[4px] hover:shadow-none transition-all">
            <span class="material-symbols-outlined">arrow_back</span>
        </a>
        <h1 class="font-display-lg-mobile text-display-lg-mobile font-extrabold tracking-tighter text-on-surface">FigureVault</h1>
    </div>
    <div class="hidden md:flex gap-6 items-center">
        <button class="font-label-bold text-label-bold text-on-surface-variant hover:text-primary transition-colors">Dashboard</button>
        <button class="font-label-bold text-label-bold text-primary font-bold underline decoration-4 underline-offset-4">Add New</button>
    </div>
</header>
<main class="max-w-2xl mx-auto px-margin-mobile mt-12 mb-12">
    <section class="mb-8">
        <h2 class="font-headline-lg text-headline-lg-mobile mb-2">Add Data</h2>
        <p class="font-body-md text-body-md text-on-surface-variant">Add to Your Collection.</p>
    </section>
    <form action="{{ session('user_type') === 'admin' ? route('admin.barang.store') : route('barang.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf
        <div class="space-y-3">
            <label for="gambar" class="font-label-bold text-label-bold uppercase text-on-surface">Figure Photo</label>
            <div class="relative group cursor-pointer border-4 border-on-surface bg-surface-container-high h-64 flex flex-col items-center justify-center neobrutalist-shadow transition-all hover:bg-surface-variant">
                <div class="relative z-10 text-center p-6">
                    <span class="material-symbols-outlined text-5xl mb-4">add_a_photo</span>
                    <p id="gambar-name" class="text-center text-sm text-slate-600">No file chosen</p>
                    <p class="font-body-md text-xs mt-2">RAW, JPG, OR PNG (MAX 5MB)</p>
                </div>
                <input id="gambar" type="file" name="gambar" accept="image/*" required class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" />
            </div>
            @error('gambar')
                <p class="text-sm text-error">{{ $message }}</p>
            @enderror
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-gutter">
            <div class="flex flex-col gap-2">
                <label for="nama" class="font-label-bold text-label-bold uppercase text-on-surface">Figure Name</label>
                <input id="nama" name="nama" type="text" value="{{ old('nama') }}" placeholder="Furina Figure" class="border-4 border-on-surface p-4 font-body-md text-body-md focus:outline-none focus:bg-primary-container focus:shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] transition-all bg-white" required />
                @error('nama')<p class="text-sm text-error">{{ $message }}</p>@enderror
            </div>
            <div class="flex flex-col gap-2">
                <label for="harga" class="font-label-bold text-label-bold uppercase text-on-surface">Purchase Price ($)</label>
                <input id="harga" name="harga" type="number" value="{{ old('harga') }}" placeholder="0.00" class="border-4 border-on-surface p-4 font-body-md text-body-md focus:outline-none focus:bg-primary-container focus:shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] transition-all bg-white" required />
                @error('harga')<p class="text-sm text-error">{{ $message }}</p>@enderror
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-gutter">
            <div class="flex flex-col gap-2">
                <label for="stok" class="font-label-bold text-label-bold uppercase text-on-surface">Quantity</label>
                <input id="stok" name="stok" type="number" value="{{ old('stok', 1) }}" class="w-full border-4 border-on-surface p-4 font-body-md text-body-md focus:outline-none focus:bg-primary-container focus:shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] transition-all bg-white" required />
                @error('stok')<p class="text-sm text-error">{{ $message }}</p>@enderror
            </div>
        </div>
        <div class="flex flex-col gap-2">
            <label for="keterangan" class="font-label-bold text-label-bold uppercase text-on-surface">Description</label>
            <textarea id="keterangan" name="keterangan" rows="5" placeholder="Describe the figure details, manufacturer, and current display status..." class="border-4 border-on-surface p-4 font-body-md text-body-md focus:outline-none focus:bg-primary-container focus:shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] transition-all bg-white" required>{{ old('keterangan') }}</textarea>
            @error('keterangan')<p class="text-sm text-error">{{ $message }}</p>@enderror
        </div>
        <div class="pt-4 flex flex-col gap-4">
            <button type="submit" class="w-full bg-primary-container text-on-surface py-6 px-8 border-4 border-on-surface font-display-lg-mobile text-2xl font-extrabold uppercase tracking-tight neobrutalist-shadow neobrutalist-shadow-active neobrutalist-shadow-hover transition-all flex items-center justify-center gap-4">
                Save Figure
                <span class="material-symbols-outlined text-4xl">save</span>
            </button>
            <a href="{{ session('user_type') === 'admin' ? route('admin.barang') : route('barang.index') }}" class="text-center py-4 font-label-bold text-label-bold uppercase text-on-surface-variant hover:text-secondary hover:underline transition-all">
                Discard Changes and Return to Dashboard
            </a>
        </div>
    </form>
</main>
<nav class="md:hidden fixed bottom-0 left-0 w-full z-50 flex justify-around items-center bg-surface h-20 px-margin-mobile border-t-4 border-on-surface">
    <a class="flex flex-col items-center justify-center text-on-surface-variant py-1 px-4 hover:bg-surface-variant transition-colors" href="{{ session('user_type') === 'admin' ? route('admin.barang') : route('barang.index') }}">
        <span class="material-symbols-outlined">dashboard</span>
        <span class="font-label-bold text-label-bold">Home</span>
    </a>
    <a class="flex flex-col items-center justify-center text-on-surface-variant py-1 px-4 hover:bg-surface-variant transition-colors" href="#">
        <span class="material-symbols-outlined">folder_special</span>
        <span class="font-label-bold text-label-bold">Collection</span>
    </a>
    <a class="flex flex-col items-center justify-center bg-primary-container text-on-primary py-1 px-4 rounded-lg shadow-[4px_4px_0px_0px_rgba(0,0,0,1)]" href="#">
        <span class="material-symbols-outlined">add</span>
        <span class="font-label-bold text-label-bold">Add</span>
    </a>
    <a class="flex flex-col items-center justify-center text-on-surface-variant py-1 px-4 hover:bg-surface-variant transition-colors" href="#">
        <span class="material-symbols-outlined">person</span>
        <span class="font-label-bold text-label-bold">Profile</span>
    </a>
</nav>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const gambarInput = document.getElementById('gambar');
        const gambarName = document.getElementById('gambar-name');
        if (gambarInput && gambarName) {
            gambarInput.addEventListener('change', function () {
                gambarName.textContent = this.files.length ? this.files[0].name : 'No file chosen';
            });
        }
    });
</script>
</body>
</html>