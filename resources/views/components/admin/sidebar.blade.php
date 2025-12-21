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
        <ul class="space-y-1">
            <li>
                <a href="{{ url('/admin') }}"
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
                    <svg class="h-5 w-5 text-gray-400" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2">
                        <path d="M3 3h18v18H3V3zM3 9h18M9 21V3" />
                    </svg>
                    <span class="text-sm font-medium">Tables</span>
                </a>
            </li>

            <li>
                <a href="{{ url('/admin/billing') }}"
                    class="flex items-center gap-3 px-3 py-2 rounded-lg text-gray-700 hover:bg-gray-100">
                    <svg class="h-5 w-5 text-gray-400" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2">
                        <path d="M7 2h10v20l-2-1-2 1-2-1-2 1-2-1-2 1V2z" />
                        <path d="M9 6h6M9 10h6M9 14h6" />
                    </svg>
                    <span class="text-sm font-medium">Billing</span>
                </a>
            </li>

            <li>
                <a href="{{ url('/admin/virtual-reality') }}"
                    class="flex items-center gap-3 px-3 py-2 rounded-lg text-gray-700 hover:bg-gray-100">
                    <svg class="h-5 w-5 text-gray-400" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2">
                        <path d="M12 2l8 4v12l-8 4-8-4V6l8-4z" />
                        <path d="M12 22V10" />
                        <path d="M20 6l-8 4-8-4" />
                    </svg>
                    <span class="text-sm font-medium">Virtual Reality</span>
                </a>
            </li>

            <li class="pt-4">
                <div class="px-3 text-xs font-semibold text-gray-400 uppercase tracking-wider">Account pages</div>
            </li>

            <li>
                <a href="{{ url('/admin/profile') }}"
                    class="flex items-center gap-3 px-3 py-2 rounded-lg text-gray-700 hover:bg-gray-100">
                    <svg class="h-5 w-5 text-gray-400" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2">
                        <path d="M20 21a8 8 0 0 0-16 0" />
                        <circle cx="12" cy="8" r="4" />
                    </svg>
                    <span class="text-sm font-medium">Profile</span>
                </a>
            </li>

            <li>
                <a href=""
                    class="flex items-center gap-3 px-3 py-2 rounded-lg text-gray-700 hover:bg-gray-100">
                    <svg class="h-5 w-5 text-gray-400" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2">
                        <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4" />
                        <path d="M10 17l5-5-5-5" />
                        <path d="M15 12H3" />
                    </svg>
                    <span class="text-sm font-medium">Sign In</span>
                </a>
            </li>

            <li>
                <a href=""
                    class="flex items-center gap-3 px-3 py-2 rounded-lg text-gray-700 hover:bg-gray-100">
                    <svg class="h-5 w-5 text-gray-400" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2">
                        <path d="M9 5h6" />
                        <path d="M9 9h6" />
                        <path d="M9 13h6" />
                        <path d="M7 3h10v18H7V3z" />
                    </svg>
                    <span class="text-sm font-medium">Sign Up</span>
                </a>
            </li>
        </ul>
    </nav>

    {{-- Slot tambahan (opsional) misal tombol/badge di bawah --}}
    {{ $slot ?? '' }}
</aside>
