{{-- resources/views/components/admin/navbar.blade.php --}}
@props([
    'page' => 'Pages',
    'pageTitle' => 'Template',
    'showSearch' => true,
])

<header
    {{ $attributes->merge(['class' => 'sticky top-0 z-20 bg-gray-100/80 backdrop-blur border-b border-gray-200']) }}>
    <div class="px-4 sm:px-6 py-4 flex items-center gap-3">
        {{-- Mobile open sidebar --}}
        <button id="openSidebar" class="lg:hidden p-2 rounded-lg bg-white border border-gray-200 hover:bg-gray-50">
            <span class="sr-only">Open sidebar</span>
            <div class="space-y-1">
                <div class="h-0.5 w-5 bg-gray-700"></div>
                <div class="h-0.5 w-5 bg-gray-700"></div>
                <div class="h-0.5 w-5 bg-gray-700"></div>
            </div>
        </button>

        {{-- Breadcrumb / title --}}
        <div class="flex-1">
            <div class="text-xs text-gray-500">
                <span class="hover:text-gray-700">{{ $page }}</span>
                <span class="mx-2">/</span>
                <span class="text-gray-700 font-medium">{{ $pageTitle }}</span>
            </div>
            <div class="text-sm font-semibold text-gray-900">{{ $pageTitle }}</div>
        </div>

        {{-- Search --}}
        @if ($showSearch)
            <div class="hidden md:block w-80">
                <div class="relative">
                    <input type="text" placeholder="Type here..."
                        class="w-full rounded-xl border border-gray-200 bg-white px-4 py-2 pl-10 text-sm
                   focus:outline-none focus:ring-2 focus:ring-gray-900/10">
                    <div class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="11" cy="11" r="7"></circle>
                            <path d="M21 21l-4.3-4.3"></path>
                        </svg>
                    </div>
                </div>
            </div>
        @endif

        {{-- Right actions --}}
        <div class="flex items-center gap-2">
            <div class="relative">
                {{-- Profile Button --}}
                <button id="profileBtn" type="button"
                    class="flex items-center gap-2 p-2 rounded-lg hover:bg-gray-200/60 text-gray-700"
                    aria-haspopup="true" aria-expanded="false">

                    {{-- Avatar --}}
                    <div
                        class="h-8 w-8 rounded-full bg-gray-900 text-white grid place-items-center text-xs font-semibold">
                        {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}
                    </div>

                    {{-- Name (optional, hidden on small) --}}
                    <span class="hidden md:block text-sm font-semibold text-gray-800">
                        {{ auth()->user()->name ?? 'User' }}
                    </span>

                    {{-- Chevron --}}
                    <svg class="h-4 w-4 text-gray-500" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2">
                        <path d="m6 9 6 6 6-6" />
                    </svg>
                </button>

                {{-- Dropdown --}}
                <div id="profileDropdown"
                    class="absolute right-0 mt-2 w-56 bg-white border border-gray-200 rounded-xl shadow-lg hidden z-50">

                    <div class="px-4 py-3 border-b border-gray-100">
                        <div class="text-sm font-semibold text-gray-900">{{ auth()->user()->name ?? 'User' }}</div>
                        <div class="text-xs text-gray-500">{{ auth()->user()->email ?? '-' }}</div>
                    </div>

                    <div class="py-2">
                        <a href="{{ url('/admin/profile') }}"
                            class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                            <svg class="h-4 w-4 text-gray-400" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2">
                                <path d="M20 21a8 8 0 0 0-16 0"></path>
                                <circle cx="12" cy="8" r="4"></circle>
                            </svg>
                            Profile
                        </a>

                        <div class="my-1 border-t border-gray-100"></div>

                        {{-- Logout (POST + CSRF) --}}
                        <form method="POST" action="}">
                            @csrf
                            <button type="submit"
                                class="w-full flex items-center gap-2 px-4 py-2 text-sm text-red-600 hover:bg-red-50">
                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2">
                                    <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4" />
                                    <path d="M10 17l5-5-5-5" />
                                    <path d="M15 12H3" />
                                </svg>
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>


            {{-- Slot untuk tombol tambahan (opsional) --}}
            {{ $slot }}
        </div>
    </div>

    <script>
        const profileBtn = document.getElementById('profileBtn');
        const profileDropdown = document.getElementById('profileDropdown');

        function toggleProfileDropdown() {
            profileDropdown.classList.toggle('hidden');
        }

        function closeProfileDropdown() {
            profileDropdown.classList.add('hidden');
        }

        profileBtn?.addEventListener('click', (e) => {
            e.stopPropagation();
            toggleProfileDropdown();
        });

        document.addEventListener('click', () => closeProfileDropdown());

        profileDropdown?.addEventListener('click', (e) => {
            // biar klik di dalam dropdown gak nutup sebelum aksi
            e.stopPropagation();
        });

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') closeProfileDropdown();
        });
    </script>

</header>
