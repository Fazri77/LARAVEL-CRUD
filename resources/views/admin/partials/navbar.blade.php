<div class="border-t-4 border-on-surface bg-surface fixed bottom-0 left-0 right-0 z-50 shadow-[0_-4px_10px_rgba(0,0,0,0.05)]">
    <div class="max-w-7xl mx-auto px-4 py-3">
        <nav class="flex items-center justify-center gap-4 md:gap-10">
            <!-- Dashboard Menu Item -->
            @php
                $isDashboardActive = request()->routeIs('admin.dashboard');
            @endphp
            <a href="{{ route('admin.dashboard') }}"
                class="flex flex-col items-center justify-center transition-all duration-150 {{ $isDashboardActive ? 'bg-primary-container text-on-surface border-2 border-on-surface rounded-lg px-6 py-2 neobrutal-shadow' : 'text-on-surface-variant hover:text-on-surface px-6 py-2 hover:bg-surface-variant/50 rounded-lg' }}">
                <span class="material-symbols-outlined text-2xl mb-1">dashboard</span>
                <span class="text-xs font-label-bold tracking-wider">Dashboard</span>
            </a>

            <!-- Kelola Produk Menu Item -->
            @php
                $isBarangActive = request()->routeIs('admin.barang*') || request()->routeIs('admin.products*');
            @endphp
            <a href="{{ route('admin.barang') }}"
                class="flex flex-col items-center justify-center transition-all duration-150 {{ $isBarangActive ? 'bg-primary-container text-on-surface border-2 border-on-surface rounded-lg px-6 py-2 neobrutal-shadow' : 'text-on-surface-variant hover:text-on-surface px-6 py-2 hover:bg-surface-variant/50 rounded-lg' }}">
                <span class="material-symbols-outlined text-2xl mb-1">inventory_2</span>
                <span class="text-xs font-label-bold tracking-wider">Kelola Produk</span>
            </a>

            <!-- Laporan Menu Item -->
            @php
                $isReportsActive = request()->routeIs('admin.reports*');
            @endphp
            <a href="{{ route('admin.reports') }}"
                class="flex flex-col items-center justify-center transition-all duration-150 {{ $isReportsActive ? 'bg-primary-container text-on-surface border-2 border-on-surface rounded-lg px-6 py-2 neobrutal-shadow' : 'text-on-surface-variant hover:text-on-surface px-6 py-2 hover:bg-surface-variant/50 rounded-lg' }}">
                <span class="material-symbols-outlined text-2xl mb-1">analytics</span>
                <span class="text-xs font-label-bold tracking-wider">Laporan</span>
            </a>

            <!-- Profil Menu Item -->
            @php
                $isProfileActive = request()->routeIs('admin.profile*') || request()->routeIs('admin.tools*');
            @endphp
            <a href="{{ route('admin.profile') }}"
                class="flex flex-col items-center justify-center transition-all duration-150 {{ $isProfileActive ? 'bg-primary-container text-on-surface border-2 border-on-surface rounded-lg px-6 py-2 neobrutal-shadow' : 'text-on-surface-variant hover:text-on-surface px-6 py-2 hover:bg-surface-variant/50 rounded-lg' }}">
                <span class="material-symbols-outlined text-2xl mb-1">person</span>
                <span class="text-xs font-label-bold tracking-wider">Profil</span>
            </a>
        </nav>
    </div>
</div>

<script src="{{ asset('js/neobrutal-helpers.js') }}"></script>
