{{-- resources/views/components/admin/settings-panel.blade.php --}}
@props([
    'title' => 'Configurator',
    'subtitle' => 'Atur tampilan dashboard.',
])

{{-- Floating button --}}
<button id="openSettings"
    class="fixed bottom-6 right-6 z-50 rounded-full bg-white border border-gray-200 shadow-lg p-3 hover:bg-gray-50">
    <svg class="h-5 w-5 text-gray-700" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <path d="M12 15.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
        <path
            d="M19.4 15a7.8 7.8 0 0 0 .1-2l2-1.2-2-3.4-2.3.6a7.3 7.3 0 0 0-1.7-1l-.3-2.4H9l-.3 2.4a7.3 7.3 0 0 0-1.7 1l-2.3-.6-2 3.4 2 1.2a7.8 7.8 0 0 0 .1 2l-2 1.2 2 3.4 2.3-.6c.5.4 1.1.7 1.7 1L9 22h6l.3-2.4c.6-.3 1.2-.6 1.7-1l2.3.6 2-3.4-2-1.2z" />
    </svg>
</button>

{{-- Overlay --}}
<div id="settingsOverlay" class="fixed inset-0 bg-black/40 z-50 hidden"></div>

{{-- Panel --}}
<aside id="settingsPanel"
    class="fixed top-0 right-0 h-full w-full sm:w-[420px] bg-white z-50 shadow-2xl
         transform translate-x-full transition-transform duration-200">
    <div class="p-5 border-b border-gray-200 flex items-start justify-between">
        <div>
            <div class="text-lg font-semibold text-gray-900">{{ $title }}</div>
            <div class="text-sm text-gray-500">{{ $subtitle }}</div>
        </div>
        <button id="closeSettings" class="p-2 rounded-lg hover:bg-gray-100">✕</button>
    </div>

    <div class="p-5 space-y-6">
        <div>
            <div class="text-sm font-semibold text-gray-900 mb-2">Sidebar Colors</div>
            <div class="flex gap-2">
                <button class="h-8 w-8 rounded-full bg-blue-600"></button>
                <button class="h-8 w-8 rounded-full bg-gray-900"></button>
                <button class="h-8 w-8 rounded-full bg-emerald-600"></button>
                <button class="h-8 w-8 rounded-full bg-amber-500"></button>
                <button class="h-8 w-8 rounded-full bg-rose-600"></button>
            </div>
        </div>

        <div>
            <div class="text-sm font-semibold text-gray-900 mb-2">Sidenav Type</div>
            <div class="flex gap-2">
                <button class="px-4 py-2 rounded-lg bg-gray-900 text-white text-sm font-semibold">Dark</button>
                <button class="px-4 py-2 rounded-lg border border-gray-200 text-sm font-semibold">Transparent</button>
                <button class="px-4 py-2 rounded-lg border border-gray-200 text-sm font-semibold">White</button>
            </div>
        </div>

        <div class="flex items-center justify-between">
            <div>
                <div class="text-sm font-semibold text-gray-900">Navbar Fixed</div>
                <div class="text-xs text-gray-500">Aktifkan sticky navbar</div>
            </div>
            <label class="inline-flex items-center cursor-pointer">
                <input type="checkbox" class="sr-only peer">
                <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-checked:bg-gray-900 relative transition">
                    <div
                        class="absolute top-0.5 left-0.5 h-5 w-5 bg-white rounded-full transition peer-checked:translate-x-5">
                    </div>
                </div>
            </label>
        </div>

        <div class="flex items-center justify-between">
            <div>
                <div class="text-sm font-semibold text-gray-900">Light / Dark</div>
                <div class="text-xs text-gray-500">Mode gelap (demo)</div>
            </div>
            <label class="inline-flex items-center cursor-pointer">
                <input type="checkbox" class="sr-only peer">
                <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-checked:bg-gray-900 relative transition">
                    <div
                        class="absolute top-0.5 left-0.5 h-5 w-5 bg-white rounded-full transition peer-checked:translate-x-5">
                    </div>
                </div>
            </label>
        </div>

        <div class="pt-3 space-y-2">
            <a href="#"
                class="w-full inline-flex justify-center rounded-lg bg-sky-600 text-white px-4 py-2 font-semibold text-sm hover:bg-sky-700">
                Free Download
            </a>
            <a href="#"
                class="w-full inline-flex justify-center rounded-lg border border-gray-200 px-4 py-2 font-semibold text-sm hover:bg-gray-50">
                View Documentation
            </a>
        </div>
    </div>
</aside>
