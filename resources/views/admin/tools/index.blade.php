<!DOCTYPE html>
<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Export & Import | FigureVault</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;500;700;800&family=Archivo+Narrow:wght@700&family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet" />
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
                        'display-lg-mobile': ['40px', {
                            lineHeight: '1.1',
                            fontWeight: '800'
                        }],
                        'headline-lg': ['32px', {
                            lineHeight: '1.2',
                            fontWeight: '700'
                        }],
                        'headline-md': ['24px', {
                            lineHeight: '1.2',
                            fontWeight: '700'
                        }],
                        'body-md': ['16px', {
                            lineHeight: '1.5',
                            fontWeight: '400'
                        }],
                        'label-bold': ['14px', {
                            lineHeight: '1',
                            fontWeight: '700'
                        }]
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
            box-shadow: 6px 6px 0px 0px rgba(0, 0, 0, 1);
        }

        .neobrutal-shadow-large {
            box-shadow: 8px 8px 0px 0px rgba(0, 0, 0, 1);
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
                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center gap-3 hover:opacity-70 transition-opacity">
                    <div
                        class="flex h-12 w-12 items-center justify-center bg-primary-container border-4 border-on-surface text-lg font-extrabold neobrutal-shadow">
                        F</div>
                    <div>
                        <p class="font-label-bold text-label-bold uppercase text-on-surface-variant">FigureVault</p>
                        <p class="text-headline-md font-bold text-on-surface">Admin Panel</p>
                    </div>
                </a>
            </div>
            <div class="flex items-center gap-4">
                <span class="font-label-bold text-label-bold text-on-surface">{{ session('admin_username') }}</span>
                <a href="{{ route('logout') }}"
                    class="px-4 py-2 bg-red-500 text-white border-2 border-red-700 font-label-bold text-label-bold uppercase neobrutal-shadow hover:bg-red-600 transition-colors">
                    Logout
                </a>
            </div>
        </div>
    </header>

    @include('admin.partials.navbar')

    <!-- Main Content -->
    <main class="max-w-6xl mx-auto px-4 py-8">
       <div id="export-notif"
     class="hidden mb-6 p-5 bg-emerald-100 border-4 border-emerald-700 text-emerald-900 rounded-lg neobrutal-shadow">
    Export berhasil di unduh! Periksa folder download Anda.
</div>

        <!-- Section Header -->
        <div class="mb-6">
            <h1 class="text-headline-lg font-bold text-on-surface uppercase">Export & Import Data</h1>
            <p class="mt-2 text-sm text-on-surface-variant">Backup koleksi atau import produk dari file Excel.</p>
        </div>
        <div class="grid gap-8 lg:grid-cols-2">
            <!-- Export Section -->

            <form action="{{ route('admin.reports.export') }}" method="GET" id="export-form">
                <section class="bg-white border-4 border-black p-8 neobrutal-shadow space-y-6">

                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-cyan-400 border-4 border-black flex items-center justify-center">
                            <span class="material-symbols-outlined text-2xl font-bold">file_download</span>
                        </div>
                        <h2 class="text-2xl font-black uppercase">Export Laporan</h2>
                    </div>

                    <p class="text-slate-600">
                        Generate laporan transaksi lengkap dalam format PDF atau Excel termasuk ringkasan dan detail transaksi.
                    </p>

                    {{-- Format Selector --}}
                    <div>
                        <label class="font-bold uppercase text-sm block mb-3">Format Export</label>
                        <div class="grid grid-cols-2 gap-3">
                            <label id="label-pdf"
                                class="format-option cursor-pointer border-4 border-black p-4 flex items-center gap-3 transition-all bg-cyan-400 neobrutal-shadow">
                                <input type="radio" name="format" value="pdf" checked class="hidden" />
                                <span class="material-symbols-outlined text-3xl">picture_as_pdf</span>
                                <div>
                                    <p class="font-black text-sm uppercase">PDF</p>
                                    <p class="text-xs text-slate-700">Laporan lengkap dengan tabel &amp; ringkasan</p>
                                </div>
                            </label>
                            <label id="label-excel"
                                class="format-option cursor-pointer border-4 border-black p-4 flex items-center gap-3 transition-all bg-slate-100 hover:bg-slate-200">
                                <input type="radio" name="format" value="excel" class="hidden" />
                                <span class="material-symbols-outlined text-3xl">table_view</span>
                                <div>
                                    <p class="font-black text-sm uppercase">Excel</p>
                                    <p class="text-xs text-slate-600">Spreadsheet siap olah data</p>
                                </div>
                            </label>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div>
                            <label class="font-bold uppercase text-sm block mb-2">Tanggal Mulai</label>
                            <input type="date" name="tanggal_mulai" required
                                class="w-full border-4 border-black p-3 bg-slate-50" />
                        </div>

                        <div>
                            <label class="font-bold uppercase text-sm block mb-2">Tanggal Akhir</label>
                            <input type="date" name="tanggal_akhir" required
                                class="w-full border-4 border-black p-3 bg-slate-50" />
                        </div>
                    </div>

                    <div class="bg-slate-100 border-4 border-black p-4 space-y-3">
                        <h3 class="font-bold uppercase text-sm">Opsi Laporan</h3>

                        <label class="flex items-center gap-3">
                            <input type="checkbox" name="opsi[]" value="gambar" checked
                                class="w-5 h-5 border-2 border-black" />
                            <span class="text-sm">Sertakan Gambar High-Res</span>
                        </label>

                        <label class="flex items-center gap-3">
                            <input type="checkbox" name="opsi[]" value="grafik" checked
                                class="w-5 h-5 border-2 border-black" />
                            <span class="text-sm">Grafik Riwayat Harga</span>
                        </label>

                        <label class="flex items-center gap-3">
                            <input type="checkbox" name="opsi[]" value="wishlist"
                                class="w-5 h-5 border-2 border-black" />
                            <span class="text-sm">Perbandingan Wishlist</span>
                        </label>
                    </div>

                    <button type="submit" id="export-btn"
                        class="w-full bg-cyan-400 border-4 border-black py-4 font-bold uppercase text-lg neobrutal-shadow flex items-center justify-center gap-2 hover:brightness-110 transition-all active:translate-x-1 active:translate-y-1 active:shadow-none">
                        <span class="material-symbols-outlined" id="export-icon">picture_as_pdf</span>
                        <span id="export-label">Download PDF</span>
                    </button>

                </section>
            </form>

            <!-- Import Section -->
            <form action="{{ route('admin.import.barang') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <section class="bg-white border-4 border-black p-8 neobrutal-shadow space-y-6">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-emerald-400 border-4 border-black flex items-center justify-center">
                            <span class="material-symbols-outlined text-2xl font-bold">upload_file</span>
                        </div>
                        <h2 class="text-2xl font-black uppercase">Import Data</h2>
                    </div>

                    <div class="border-4 border-dashed border-black bg-slate-100 p-8 text-center space-y-4 hover:bg-emerald-200 transition cursor-pointer"
                        id="drop-zone">
                        <span class="material-symbols-outlined text-6xl block">cloud_upload</span>
                        <div>
                            <p class="font-bold text-lg">Drag & Drop Excel</p>
                            <p class="text-sm text-slate-600">atau klik untuk browse file Anda</p>
                        </div>
                        <input type="file" name="file" accept=".xlsx" id="file-upload" class="hidden" required />
                    </div>

                    <button type="submit" class="w-full bg-emerald-400 border-4 border-black py-4 font-bold uppercase neobrutal-shadow">
                        Upload & Import
                    </button>

                    <div
                        class="bg-slate-100 border-4 border-black p-4 flex justify-between items-center hover:bg-black hover:text-white transition cursor-pointer">
                        <div>
                            <h3 class="font-bold uppercase text-sm">Butuh Template?</h3>
                            <p class="text-sm text-slate-600">Download template bulk import</p>
                        </div>
                        <span class="material-symbols-outlined">file_download</span>
                    </div>
                </section>
            </form>
            <iframe name="downloadFrame" class="hidden"></iframe>
    </main>

    <script>
        const dropZone = document.getElementById('drop-zone');
        const fileInput = document.getElementById('file-upload');

        dropZone.addEventListener('click', () => fileInput.click());

        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            dropZone.addEventListener(eventName, preventDefaults);
        });

        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }

        dropZone.addEventListener('dragenter', () => dropZone.classList.add('bg-emerald-400'));
        dropZone.addEventListener('dragleave', () => dropZone.classList.remove('bg-emerald-400'));
        dropZone.addEventListener('drop', () => dropZone.classList.remove('bg-emerald-400'));

        // ── Format selector toggle ──
        const formatRadios = document.querySelectorAll('input[name="format"]');
        const labelPdf = document.getElementById('label-pdf');
        const labelExcel = document.getElementById('label-excel');
        const exportBtn = document.getElementById('export-btn');
        const exportIcon = document.getElementById('export-icon');
        const exportLabel = document.getElementById('export-label');

        formatRadios.forEach(radio => {
            radio.addEventListener('change', function () {
                if (this.value === 'pdf') {
                    labelPdf.className = 'format-option cursor-pointer border-4 border-black p-4 flex items-center gap-3 transition-all bg-cyan-400 neobrutal-shadow';
                    labelExcel.className = 'format-option cursor-pointer border-4 border-black p-4 flex items-center gap-3 transition-all bg-slate-100 hover:bg-slate-200';
                    exportBtn.classList.remove('bg-emerald-400');
                    exportBtn.classList.add('bg-cyan-400');
                    exportIcon.textContent = 'picture_as_pdf';
                    exportLabel.textContent = 'Download PDF';
                } else {
                    labelExcel.className = 'format-option cursor-pointer border-4 border-black p-4 flex items-center gap-3 transition-all bg-emerald-400 neobrutal-shadow';
                    labelPdf.className = 'format-option cursor-pointer border-4 border-black p-4 flex items-center gap-3 transition-all bg-slate-100 hover:bg-slate-200';
                    exportBtn.classList.remove('bg-cyan-400');
                    exportBtn.classList.add('bg-emerald-400');
                    exportIcon.textContent = 'table_view';
                    exportLabel.textContent = 'Download Excel';
                }
            });
        });
        // ── Export notification ──
        document.getElementById('export-form').addEventListener('submit', function () {
    setTimeout(() => {
        document.getElementById('export-notif').classList.remove('hidden');
    }, 500);
});
    </script>
</body>

</html>
