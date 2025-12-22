{{-- resources/views/components/admin/sidebar.blade.php --}}
@props([
    'brand' => 'SILAB UNMUL',
    'subtitle' => 'Admin Panel',
])

@php
    $baseItem = 'flex items-center gap-3 px-3 py-2 rounded-lg transition';
    $activeItem = 'bg-blue-50 text-blue-700 ring-1 ring-blue-200';
    $inactiveItem = 'text-gray-700 hover:bg-gray-100';

    $iconActive = 'text-blue-600';
    $iconInactive = 'text-gray-400';
@endphp

<aside id="sidebar"
    class="fixed z-40 inset-y-0 left-0 w-72 mt-3 ml-3 mb-3 flex flex-col bg-white border border-gray-200 rounded-lg shadow-lg
           transform -translate-x-full lg:translate-x-0 transition-transform duration-200">

    {{-- Brand --}}
    <div class="h-16 px-6 flex items-center justify-between border-b border-gray-100">
        <a href="{{ url('/') }}" class="flex items-center gap-3">
            <div class="h-9 w-9 rounded-lg bg-gray-900 text-white grid place-items-center">
                <svg viewBox="0 0 24 24" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20" />
                    <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z" />
                </svg>
            </div>

            <div class="leading-tight">
                <div class="text-sm font-semibold text-gray-900">{{ $brand }}</div>
                <div class="text-xs text-gray-500">{{ $subtitle }}</div>
            </div>
        </a>

        <button id="closeSidebar" class="lg:hidden p-2 rounded-md hover:bg-gray-100 text-gray-600">✕</button>
    </div>

    {{-- Menu --}}
    <nav class="px-4 py-4 flex-1 overflow-y-auto">
        <ul class="space-y-1">

            {{-- Dashboard --}}
            @php
                $isDashboard =
                    request()->is('admin') || request()->is('admin/dashboard') || request()->routeIs('admin.dashboard');
            @endphp
            <li>
                <a href="{{ url('/admin') }}"
                    class="{{ $baseItem }} {{ $isDashboard ? $activeItem : $inactiveItem }}">
                    <svg class="h-5 w-5 {{ $isDashboard ? $iconActive : $iconInactive }}" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M3 13h8V3H3v10z" />
                        <path d="M13 21h8V11h-8v10z" />
                        <path d="M13 3h8v6h-8V3z" />
                        <path d="M3 17h8v4H3v-4z" />
                    </svg>
                    <span class="text-sm font-medium">Dashboard</span>
                </a>
            </li>

            {{-- Ruangan --}}
            @php
                // Kalau pakai named route: admin.kelola-ruangan
                $isRuangan = request()->routeIs('admin.kelola-ruangan') || request()->is('admin/kelola-ruangan*');
            @endphp
            <li>
                <a href="{{ route('admin.kelola-ruangan') }}"
                    class="{{ $baseItem }} {{ $isRuangan ? $activeItem : $inactiveItem }}">
                    <svg class="h-5 w-5 {{ $isRuangan ? $iconActive : $iconInactive }}" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M3 21h18" />
                        <path d="M6 21V5a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v16" />
                        <path d="M9 7h.01M12 7h.01M15 7h.01" />
                        <path d="M9 11h.01M12 11h.01M15 11h.01" />
                        <path d="M9 15h.01M12 15h.01M15 15h.01" />
                    </svg>
                    <span class="text-sm font-medium">Ruangan</span>
                </a>
            </li>

            {{-- Inventaris/Barang --}}
            @php
                // sesuaikan path/route kamu (contoh: admin.barang)
                $isInventaris =
                    request()->is('admin/inventaris*') ||
                    request()->is('admin/barang*') ||
                    request()->routeIs('admin.inventaris');
            @endphp
            <li>
                <a href="{{ route('admin.kelola-inventaris') }}"
                    class="{{ $baseItem }} {{ $isInventaris ? $activeItem : $inactiveItem }}">
                    <svg class="h-5 w-5 {{ $isInventaris ? $iconActive : $iconInactive }}" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M21 8l-9-5-9 5 9 5 9-5z" />
                        <path d="M3 8v8l9 5 9-5V8" />
                        <path d="M12 13v8" />
                    </svg>
                    <span class="text-sm font-medium">Inventaris/Barang</span>
                </a>
            </li>

            {{-- Peminjaman Ruangan --}}
            @php
                $isPinjamRuangan =
                    request()->is('admin/peminjaman-ruangan*') || request()->routeIs('admin.peminjaman-ruangan');
            @endphp
            <li>
                <a href="{{ route('admin.peminjaman-ruangan') }}"
                    class="{{ $baseItem }} {{ $isPinjamRuangan ? $activeItem : $inactiveItem }}">
                    <svg class="h-5 w-5 {{ $isPinjamRuangan ? $iconActive : $iconInactive }}" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M8 2v4M16 2v4" />
                        <rect x="3" y="4" width="18" height="18" rx="2" />
                        <path d="M3 10h18" />
                        <path d="M8 14h.01M12 14h.01M16 14h.01" />
                    </svg>
                    <span class="text-sm font-medium">Peminjaman Ruangan</span>
                </a>
            </li>

            {{-- Peminjaman Barang --}}
            @php
                $isPinjamBarang =
                    request()->is('admin/peminjaman-barang*') || request()->routeIs('admin.peminjaman-barang');
            @endphp
            <li>
                <a href="{{ route('admin.peminjaman-barang') }}"
                    class="{{ $baseItem }} {{ $isPinjamBarang ? $activeItem : $inactiveItem }}">
                    <svg class="h-5 w-5 {{ $isPinjamBarang ? $iconActive : $iconInactive }}" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M9 5h6" />
                        <path d="M9 3h6a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2H9a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2z" />
                        <path d="M9 11h6" />
                        <path d="M9 15h6" />
                        <path d="M9 19h6" />
                    </svg>
                    <span class="text-sm font-medium">Peminjaman Barang</span>
                </a>
            </li>

        </ul>
    </nav>

    {{ $slot ?? '' }}
</aside>
