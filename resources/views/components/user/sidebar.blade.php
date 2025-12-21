{{-- resources/views/components/admin/sidebar.blade.php --}}
@props([
    'brand' => 'SILAB UNMUL',
    'subtitle' => 'Admin Panel',
])

<aside id="sidebar"
    class="fixed z-40 inset-y-0 left-0 w-72 bg-white border-r border-gray-200
         transform -translate-x-full lg:translate-x-0 transition-transform duration-200
         flex flex-col">

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
        <ul class="space-y-3">
            <li>
                <a href="{{ url('/user') }}"
                    class="flex items-center gap-3 px-3 py-2 rounded-lg text-gray-700 hover:bg-gray-100">
                    <svg class="h-5 w-5 text-gray-400" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2">
                        <path d="M3 13h8V3H3v10zM13 21h8V11h-8v10zM13 3h8v6h-8V3zM3 17h8v4H3v-4z" />
                    </svg>
                    <span class="text-sm font-medium">Dashboard</span>
                </a>
            </li>

            <li>
                <a href="{{ url('/admin/tables') }}"
                    class="flex items-center gap-3 px-3 py-2 rounded-lg text-gray-700 hover:bg-gray-100">
                    {{-- Calendar icon (Peminjaman Ruangan) --}}
                    <svg class="h-5 w-5 text-gray-400" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2">
                        <path d="M8 2v4M16 2v4" />
                        <rect x="3" y="4" width="18" height="18" rx="2" />
                        <path d="M3 10h18" />
                    </svg>
                    <span class="text-sm font-medium">Peminjaman Ruangan</span>
                </a>
            </li>

            <li>
                <a href="{{ url('/admin/virtual-reality') }}"
                    class="flex items-center gap-3 px-3 py-2 rounded-lg text-gray-700 hover:bg-gray-100">
                    {{-- Package/Box icon (Peminjaman Barang) --}}
                    <svg class="h-5 w-5 text-gray-400" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2">
                        <path d="M21 8l-9-5-9 5 9 5 9-5z" />
                        <path d="M3 8v8l9 5 9-5V8" />
                        <path d="M12 13v8" />
                    </svg>
                    <span class="text-sm font-medium">Peminjaman Barang</span>
                </a>
            </li>

            <li>
                <a href="{{ url('/admin/billing') }}"
                    class="flex items-center gap-3 px-3 py-2 rounded-lg text-gray-700 hover:bg-gray-100">
                    {{-- Clipboard/Checklist icon (Status Pengajuan) --}}
                    <svg class="h-5 w-5 text-gray-400" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2">
                        <path d="M9 5h6" />
                        <path d="M9 3h6a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2H9a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2z" />
                        <path d="M9 11l2 2 4-4" />
                        <path d="M9 17h6" />
                    </svg>
                    <span class="text-sm font-medium">Status Pengajuan</span>
                </a>
            </li>
        </ul>
    </nav>

    {{-- Slot tambahan (opsional) misal tombol/badge di bawah --}}
    {{ $slot ?? '' }}
</aside>
