{{-- resources/views/components/app-layout.blade.php --}}
@props([
    'title' => 'SILAB UNMUL',
])

<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100">


    {{-- Isi halaman akan masuk di sini --}}
    <main>
        {{ $slot }}
    </main>


</body>

</html>
