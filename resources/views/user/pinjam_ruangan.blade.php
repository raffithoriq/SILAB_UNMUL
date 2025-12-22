<x-user-layout title="User — Dashboard" page="User" pageTitle="Dashboard">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        @for ($i = 1; $i <= 6; $i++)
            <a href="{{ route('user.detail-ruangan', ['id' => $i]) }}"
               class="block bg-white p-6 rounded-lg shadow-md hover:shadow-lg hover:-translate-y-0.5 transition">
                <h3 class="text-lg font-semibold text-gray-900 mb-2">
                    Peminjaman Ruangan #{{ $i }}
                </h3>
                <p class="text-sm text-gray-600">
                    Ini adalah halaman peminjaman ruangan.
                </p>
                <div class="mt-4 text-sm font-semibold text-blue-600">
                    Lihat detail →
                </div>
            </a>
        @endfor
    </div>
</x-user-layout>
