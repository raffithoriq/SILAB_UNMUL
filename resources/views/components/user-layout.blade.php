{{-- resources/views/components/user-layout.blade.php --}}
@props([
    'title' => 'Dashboard — SILAB UNMUL',
    'page' => 'Pages',
    'pageTitle' => 'Template',
])

<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ $title }}</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;900&display=swap" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 font-[Inter]">
    <div class="min-h-screen flex">

        {{-- Overlay mobile --}}
        <div id="overlay" class="fixed inset-0 bg-black/40 z-30 hidden lg:hidden"></div>

        {{-- Sidebar --}}
        <x-user.sidebar brand="E-Lab" subtitle="Dashboard user" />

        {{-- Main navbar --}}
        <div class="flex-1 lg:ml-72">
            <x-user.navbar :page="$page" :pageTitle="$pageTitle" />

            <main class="p-4 sm:p-6">
                {{ $slot }}
                <x-user.footer />
            </main>
        </div>

    </div>

    {{-- Fixed Settings Panel --}}
    {{-- <x-user.settings-panel title="UI Settings" subtitle="Customize the appearance of the user panel" /> --}}

    <script>
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');
        const openSidebar = document.getElementById('openSidebar');
        const closeSidebar = document.getElementById('closeSidebar');

        function showSidebar() {
            sidebar.classList.remove('-translate-x-full');
            overlay.classList.remove('hidden');
        }

        function hideSidebar() {
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
        }

        openSidebar?.addEventListener('click', showSidebar);
        closeSidebar?.addEventListener('click', hideSidebar);
        overlay?.addEventListener('click', hideSidebar);

        const settingsPanel = document.getElementById('settingsPanel');
        const settingsOverlay = document.getElementById('settingsOverlay');
        const openSettings = document.getElementById('openSettings');
        const closeSettings = document.getElementById('closeSettings');

        function showSettings() {
            settingsPanel.classList.remove('translate-x-full');
            settingsOverlay.classList.remove('hidden');
        }

        function hideSettings() {
            settingsPanel.classList.add('translate-x-full');
            settingsOverlay.classList.add('hidden');
        }

        openSettings?.addEventListener('click', showSettings);
        document.getElementById('openSettingsInline')?.addEventListener('click', showSettings);
        closeSettings?.addEventListener('click', hideSettings);
        settingsOverlay?.addEventListener('click', hideSettings);
    </script>
</body>

</html>
