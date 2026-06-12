<!DOCTYPE html>
<html class="light" lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FigureVault | Login</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;500;700;800&family=Archivo+Narrow:wght@700&family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "secondary-fixed-dim": "#ffb1c3",
                        "on-error-container": "#93000a",
                        "inverse-surface": "#303030",
                        "surface-dim": "#dadada",
                        "secondary": "#b60055",
                        "on-primary": "#ffffff",
                        "on-primary-fixed-variant": "#524600",
                        "surface-container-lowest": "#ffffff",
                        "inverse-primary": "#e2c62d",
                        "tertiary-container": "#68fc8d",
                        "error": "#ba1a1a",
                        "outline": "#7d7761",
                        "surface-container-highest": "#e2e2e2",
                        "on-tertiary-fixed-variant": "#005321",
                        "surface": "#f9f9f9",
                        "surface-container-low": "#f3f3f3",
                        "on-primary-fixed": "#211b00",
                        "error-container": "#ffdad6",
                        "on-primary-container": "#726300",
                        "outline-variant": "#cec6ad",
                        "background": "#f9f9f9",
                        "secondary-container": "#e4006c",
                        "on-error": "#ffffff",
                        "surface-variant": "#e2e2e2",
                        "surface-container-high": "#e8e8e8",
                        "on-surface-variant": "#4b4734",
                        "primary": "#6d5e00",
                        "surface-bright": "#f9f9f9",
                        "tertiary-fixed": "#6bff8f",
                        "primary-container": "#fde047",
                        "inverse-on-surface": "#f1f1f1",
                        "surface-tint": "#6d5e00",
                        "on-surface": "#1b1b1b",
                        "on-secondary-fixed": "#3f0019",
                        "surface-container": "#eeeeee",
                        "on-tertiary-fixed": "#002109",
                        "tertiary": "#006e2f",
                        "on-secondary": "#ffffff",
                        "on-secondary-fixed-variant": "#8f0041",
                        "primary-fixed": "#ffe24c",
                        "on-background": "#1b1b1b",
                        "on-secondary-container": "#fffbff",
                        "secondary-fixed": "#ffd9e0",
                        "primary-fixed-dim": "#e2c62d",
                        "on-tertiary-container": "#007331",
                        "on-tertiary": "#ffffff",
                        "tertiary-fixed-dim": "#4ae176"
                    },
                    borderRadius: {
                        DEFAULT: '0.25rem',
                        lg: '0.5rem',
                        xl: '0.75rem',
                        full: '9999px'
                    },
                    spacing: {
                        'shadow-offset': '6px',
                        gutter: '24px',
                        'stroke-weight': '4px',
                        'margin-mobile': '16px',
                        unit: '4px',
                        'margin-desktop': '48px'
                    },
                    fontFamily: {
                        'display-lg': ['Lexend'],
                        'headline-lg': ['Lexend'],
                        'headline-md': ['Lexend'],
                        'display-lg-mobile': ['Lexend'],
                        'body-md': ['Lexend'],
                        'body-lg': ['Lexend'],
                        'label-bold': ['Archivo Narrow']
                    },
                    fontSize: {
                        'display-lg': ['64px', { lineHeight: '1.1', letterSpacing: '-0.02em', fontWeight: '800' }],
                        'headline-lg': ['32px', { lineHeight: '1.2', fontWeight: '700' }],
                        'headline-md': ['24px', { lineHeight: '1.2', fontWeight: '700' }],
                        'display-lg-mobile': ['40px', { lineHeight: '1.1', fontWeight: '800' }],
                        'body-md': ['16px', { lineHeight: '1.5', fontWeight: '400' }],
                        'body-lg': ['18px', { lineHeight: '1.5', fontWeight: '500' }],
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
        .neobrutal-shadow-active {
            box-shadow: 0px 0px 0px 0px rgba(0,0,0,1);
            transform: translate(6px, 6px);
        }
        .neobrutal-shadow-large-active {
            box-shadow: 0px 0px 0px 0px rgba(0,0,0,1);
            transform: translate(8px, 8px);
        }
        .bg-pattern {
            background-color: #f9f9f9;
            background-image: radial-gradient(#1b1b1b 1px, transparent 1px);
            background-size: 32px 32px;
        }
        input:focus {
            outline: none;
            background-color: #fffde7;
            box-shadow: 4px 4px 0px 0px rgba(0,0,0,1);
        }
    </style>
</head>
<body class="bg-background text-on-background font-body-md text-body-md overflow-x-hidden min-h-screen bg-pattern flex items-center justify-center p-4">
    <main class="w-full max-w-lg">
        <header class="mb-12 text-center">
            <h1 class="font-display-lg-mobile text-display-lg-mobile md:font-display-lg md:text-display-lg uppercase tracking-tighter text-on-surface bg-primary-container inline-block px-6 py-2 border-4 border-on-surface neobrutal-shadow mb-4">
                FigureVault
            </h1>
            <p class="font-headline-md text-headline-md block text-on-surface-variant bg-surface px-4 py-1 border-2 border-on-surface inline-block">
                SECURE COLLECTOR ACCESS
            </p>
        </header>

        <div class="bg-surface border-4 border-on-surface neobrutal-shadow-large p-8 md:p-12 relative overflow-hidden">
            <div class="flex border-4 border-on-surface mb-8 bg-on-surface overflow-hidden">
                <button type="button" class="flex-1 py-4 font-label-bold text-label-bold uppercase transition-all bg-primary-container text-on-primary-container border-r-4 border-on-surface" id="user-tab" onclick="switchTab('user')">
                    User Access
                </button>
                <button type="button" class="flex-1 py-4 font-label-bold text-label-bold uppercase transition-all bg-surface text-on-surface-variant" id="admin-tab" onclick="switchTab('admin')">
                    Admin Portal
                </button>
            </div>

            @if (session('success'))
                <div class="mb-4 p-4 bg-emerald-100 border-4 border-emerald-600 text-emerald-900 rounded-lg">
                    <p class="font-label-bold text-label-bold">{{ session('success') }}</p>
                </div>
            @endif
            @if (session('error'))
                <div class="mb-4 p-4 bg-red-100 border-4 border-red-600 text-red-900 rounded-lg">
                    <p class="font-label-bold text-label-bold">{{ session('error') }}</p>
                </div>
            @endif
            @if ($errors->any())
                <div class="mb-4 p-4 bg-error-container border-4 border-error">
                    <p class="font-label-bold text-label-bold text-error">{{ $errors->first() }}</p>
                </div>
            @endif

            <!-- User Login Form -->
            <form action="{{ route('login.submit') }}" method="POST" class="space-y-8 hidden" id="user-form">
                @csrf
                <input type="hidden" name="user_type" value="user">

                <div class="space-y-4">
                    <div>
                        <label class="block font-label-bold text-label-bold uppercase mb-2 text-on-surface">Email User</label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 material-symbols-outlined text-on-surface">email</span>
                            <input name="email" type="email" class="w-full pl-12 pr-4 py-4 border-4 border-on-surface bg-surface font-headline-md text-headline-md placeholder:text-surface-variant transition-all" placeholder="user@example.com" required />
                        </div>
                    </div>

                    <div>
                        <label class="block font-label-bold text-label-bold uppercase mb-2 text-on-surface">Kata Sandi</label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 material-symbols-outlined text-on-surface">lock</span>
                            <input name="password" type="password" class="w-full pl-12 pr-4 py-4 border-4 border-on-surface bg-surface font-headline-md text-headline-md placeholder:text-surface-variant transition-all" placeholder="••••••••" required />
                        </div>
                    </div>

                    <div class="rounded-2xl border-2 border-surface-container-low p-4 bg-surface-container-lowest text-sm text-slate-700">
                        <p class="font-label-bold mb-2">Contoh login:</p>
                        <p>Email: <strong>user@example.com</strong></p>
                        <p>Password: <strong>password</strong></p>
                    </div>
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full bg-primary-container text-on-primary-container border-4 border-on-surface py-6 font-display-lg-mobile text-display-lg-mobile uppercase tracking-tight neobrutal-shadow-large hover:-translate-x-0.5 hover:-translate-y-0.5 hover:shadow-[10px_10px_0px_0px_rgba(0,0,0,1)] active:translate-x-2 active:translate-y-2 active:shadow-none transition-all duration-75">
                        User Login
                    </button>
                </div>
            </form>

            <!-- Admin Login Form (Hidden by default) -->
            <form action="{{ route('login.submit') }}" method="POST" class="space-y-8 hidden" id="admin-form">
                @csrf
                <input type="hidden" name="user_type" value="admin">

                <div>
                    <label class="block font-label-bold text-label-bold uppercase mb-2 text-on-surface">Admin Username</label>
                    <div class="relative">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 material-symbols-outlined text-on-surface">admin_panel_settings</span>
                        <input name="admin_username" type="text" class="w-full pl-12 pr-4 py-4 border-4 border-on-surface bg-surface font-headline-md text-headline-md placeholder:text-surface-variant transition-all" placeholder="ADMIN_ID" required />
                    </div>
                </div>

                <div>
                    <label class="block font-label-bold text-label-bold uppercase mb-2 text-on-surface">Admin Key (Password)</label>
                    <div class="relative">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 material-symbols-outlined text-on-surface">vpn_key</span>
                        <input name="admin_password" type="password" class="w-full pl-12 pr-4 py-4 border-4 border-on-surface bg-surface font-headline-md text-headline-md placeholder:text-surface-variant transition-all" placeholder="••••••••" required />
                    </div>
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full bg-primary-container text-on-primary-container border-4 border-on-surface py-6 font-display-lg-mobile text-display-lg-mobile uppercase tracking-tight neobrutal-shadow-large hover:-translate-x-0.5 hover:-translate-y-0.5 hover:shadow-[10px_10px_0px_0px_rgba(0,0,0,1)] active:translate-x-2 active:translate-y-2 active:shadow-none transition-all duration-75">
                        Admin Access
                    </button>
                </div>

                <div class="flex justify-center">
                    <a class="font-label-bold text-label-bold text-secondary uppercase border-b-2 border-secondary hover:bg-secondary-fixed-dim transition-colors" href="#">Forgot Admin Key?</a>
                </div>
            </form>

            <div class="absolute -bottom-6 -right-6 w-24 h-24 bg-tertiary-fixed border-4 border-on-surface rotate-12 -z-10 opacity-50"></div>
        </div>

        <aside class="mt-12 flex justify-center gap-4 flex-wrap">
            <div class="bg-secondary-container text-on-secondary-container border-2 border-on-surface px-4 py-2 font-label-bold text-label-bold uppercase neobrutal-shadow">
                Ver: 1.0.0
            </div>
            <div class="bg-tertiary-container text-on-tertiary-container border-2 border-on-surface px-4 py-2 font-label-bold text-label-bold uppercase neobrutal-shadow">
                Encrypted Vault
            </div>
        </aside>
    </main>

    <div class="fixed top-12 left-12 hidden lg:block w-48 h-48 border-4 border-on-surface neobrutal-shadow rotate-3 pointer-events-none">
        <img src="{{ asset('img/figure-gi.jpeg') }}"
     alt="Logo"
     class="w-full h-full object-contain">
    </div>

    <div class="fixed bottom-12 right-12 hidden lg:block w-64 h-32 border-4 border-on-surface neobrutal-shadow -rotate-6 pointer-events-none p-4 bg-surface flex flex-col justify-end">
        <p class="font-display-lg-mobile text-headline-md uppercase leading-none">Global Rarity</p>
        <div class="h-4 bg-on-surface w-full mt-2 relative">
            <div class="absolute inset-y-0 left-0 bg-primary-container w-3/4"></div>
        </div>
    </div>

    <script>
        function switchTab(type) {
            const userTab = document.getElementById('user-tab');
            const adminTab = document.getElementById('admin-tab');
            const userForm = document.getElementById('user-form');
            const adminForm = document.getElementById('admin-form');

            if (type === 'user') {
                userTab.classList.remove('bg-surface', 'text-on-surface-variant');
                userTab.classList.add('bg-primary-container', 'text-on-primary-container');
                adminTab.classList.remove('bg-primary-container', 'text-on-primary-container');
                adminTab.classList.add('bg-surface', 'text-on-surface-variant');
                userForm.classList.remove('hidden');
                adminForm.classList.add('hidden');
            } else {
                adminTab.classList.remove('bg-surface', 'text-on-surface-variant');
                adminTab.classList.add('bg-primary-container', 'text-on-primary-container');
                userTab.classList.remove('bg-primary-container', 'text-on-primary-container');
                userTab.classList.add('bg-surface', 'text-on-surface-variant');
                adminForm.classList.remove('hidden');
                userForm.classList.add('hidden');
            }
        }

        const submitBtns = document.querySelectorAll('button[type="submit"]');
        submitBtns.forEach(btn => {
            btn.addEventListener('mousedown', () => {
                btn.classList.remove('neobrutal-shadow-large');
                btn.classList.add('neobrutal-shadow-large-active');
            });
            btn.addEventListener('mouseup', () => {
                btn.classList.add('neobrutal-shadow-large');
                btn.classList.remove('neobrutal-shadow-large-active');
            });
            btn.addEventListener('mouseleave', () => {
                btn.classList.add('neobrutal-shadow-large');
                btn.classList.remove('neobrutal-shadow-large-active');
            });
        });

        // Tampilkan tab user secara default saat halaman dimuat
        switchTab('user');
    </script>
</body>
</html>