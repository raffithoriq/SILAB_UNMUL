<x-user-layout title="User — Dashboard" page="User" pageTitle="Dashboard">

    {{-- Header / Welcome --}}
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Dashboard</h1>
        <p class="text-sm text-gray-600">
            Selamat datang! Cek ringkasan peminjaman dan aktivitas terbaru kamu di sini.
        </p>
    </div>

    {{-- Summary Cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
        {{-- Total --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Total Pengajuan</p>
                    <p class="text-2xl font-bold text-gray-900">12</p>
                </div>
                <div class="h-10 w-10 rounded-lg bg-blue-50 grid place-items-center">
                    <svg class="h-5 w-5 text-blue-600" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2">
                        <path d="M7 2h10v20l-2-1-2 1-2-1-2 1-2-1-2 1V2z" />
                        <path d="M9 6h6M9 10h6M9 14h6" />
                    </svg>
                </div>
            </div>
        </div>

        {{-- Menunggu --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Menunggu</p>
                    <p class="text-2xl font-bold text-gray-900">3</p>
                </div>
                <div class="h-10 w-10 rounded-lg bg-yellow-50 grid place-items-center">
                    <svg class="h-5 w-5 text-yellow-700" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2">
                        <circle cx="12" cy="12" r="9" />
                        <path d="M12 7v5l3 2" />
                    </svg>
                </div>
            </div>
        </div>

        {{-- Disetujui --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Disetujui</p>
                    <p class="text-2xl font-bold text-gray-900">7</p>
                </div>
                <div class="h-10 w-10 rounded-lg bg-green-50 grid place-items-center">
                    <svg class="h-5 w-5 text-green-700" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2">
                        <path d="M20 6 9 17l-5-5" />
                    </svg>
                </div>
            </div>
        </div>

        {{-- Ditolak --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Ditolak</p>
                    <p class="text-2xl font-bold text-gray-900">2</p>
                </div>
                <div class="h-10 w-10 rounded-lg bg-red-50 grid place-items-center">
                    <svg class="h-5 w-5 text-red-700" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2">
                        <path d="M18 6 6 18" />
                        <path d="M6 6l12 12" />
                    </svg>
                </div>
            </div>
        </div>
    </div>

    {{-- Quick Actions + Info --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 mb-6">
        {{-- Quick Actions --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5 lg:col-span-2">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-semibold text-gray-900">Aksi Cepat</h2>
                <span class="text-xs text-gray-500">Buat pengajuan baru</span>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <a href="{{ route('user.pinjam-ruangan') }}"
                    class="group rounded-xl border border-gray-200 p-4 hover:border-blue-300 hover:bg-blue-50/40 transition">
                    <div class="flex items-center gap-3">
                        <div
                            class="h-10 w-10 rounded-lg bg-blue-50 grid place-items-center group-hover:bg-blue-100 transition">
                            <svg class="h-5 w-5 text-blue-600" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2">
                                <path d="M8 2v4M16 2v4" />
                                <rect x="3" y="4" width="18" height="18" rx="2" />
                                <path d="M3 10h18" />
                            </svg>
                        </div>
                        <div>
                            <div class="font-semibold text-gray-900">Pinjam Ruangan</div>
                            <div class="text-sm text-gray-600">Ajukan jadwal peminjaman ruangan</div>
                        </div>
                    </div>
                </a>

                <a href="{{ route('user.pinjam-barang') }}"
                    class="group rounded-xl border border-gray-200 p-4 hover:border-purple-300 hover:bg-purple-50/40 transition">
                    <div class="flex items-center gap-3">
                        <div
                            class="h-10 w-10 rounded-lg bg-purple-50 grid place-items-center group-hover:bg-purple-100 transition">
                            <svg class="h-5 w-5 text-purple-600" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2">
                                <path d="M21 8l-9-5-9 5 9 5 9-5z" />
                                <path d="M3 8v8l9 5 9-5V8" />
                                <path d="M12 13v8" />
                            </svg>
                        </div>
                        <div>
                            <div class="font-semibold text-gray-900">Pinjam Barang</div>
                            <div class="text-sm text-gray-600">Ajukan peminjaman barang inventaris</div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        {{-- Info / Tips --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5">
            <h2 class="text-lg font-semibold text-gray-900 mb-2">Info</h2>
            <ul class="text-sm text-gray-600 space-y-2">
                <li class="flex gap-2">
                    <span class="mt-1 h-2 w-2 rounded-full bg-blue-600"></span>
                    Pastikan jadwal tidak bentrok sebelum mengajukan.
                </li>
                <li class="flex gap-2">
                    <span class="mt-1 h-2 w-2 rounded-full bg-green-600"></span>
                    Pengajuan disetujui akan muncul di “Aktivitas Terbaru”.
                </li>
                <li class="flex gap-2">
                    <span class="mt-1 h-2 w-2 rounded-full bg-yellow-500"></span>
                    Status “Menunggu” berarti masih proses verifikasi laboran.
                </li>
            </ul>
        </div>
    </div>

    {{-- Recent Activity Table --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between">
            <div>
                <h2 class="text-lg font-semibold text-gray-900">Aktivitas Terbaru</h2>
                <p class="text-sm text-gray-600">Peminjaman ruangan dan barang terbaru kamu.</p>
            </div>
            <a href="#" class="text-sm font-semibold text-blue-600 hover:text-blue-800">Lihat semua</a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full text-sm">
                <thead class="bg-gray-50 text-gray-700">
                    <tr>
                        <th class="px-6 py-3 text-left font-semibold">Jenis</th>
                        <th class="px-6 py-3 text-left font-semibold">Nama</th>
                        <th class="px-6 py-3 text-left font-semibold">Tanggal</th>
                        <th class="px-6 py-3 text-left font-semibold">Info</th>
                        <th class="px-6 py-3 text-left font-semibold">Status</th>
                        <th class="px-6 py-3 text-left font-semibold">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">
                    {{-- Dummy data --}}
                    @php
                        $items = [
                            [
                                'jenis' => 'Ruangan',
                                'nama' => 'Lab Komputer 1',
                                'tanggal' => '2025-12-23',
                                'info' => '10:00 - 12:00',
                                'status' => 'Menunggu',
                            ],
                            [
                                'jenis' => 'Barang',
                                'nama' => 'Proyektor Epson',
                                'tanggal' => '2025-12-23',
                                'info' => 'Jumlah: 1',
                                'status' => 'Disetujui',
                            ],
                        ];

                        $badge = [
                            'Menunggu' => 'bg-yellow-50 text-yellow-700 ring-yellow-200',
                            'Disetujui' => 'bg-green-50 text-green-700 ring-green-200',
                            'Ditolak' => 'bg-red-50 text-red-700 ring-red-200',
                            'Selesai' => 'bg-gray-100 text-gray-700 ring-gray-200',
                        ];
                    @endphp

                    @forelse ($items as $row)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4">
                                <span
                                    class="inline-flex items-center rounded-full px-2.5 py-1 text-xs font-semibold ring-1
                                    {{ $row['jenis'] === 'Ruangan' ? 'bg-blue-50 text-blue-700 ring-blue-200' : 'bg-purple-50 text-purple-700 ring-purple-200' }}">
                                    {{ $row['jenis'] }}
                                </span>
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900">{{ $row['nama'] }}</td>
                            <td class="px-6 py-4">{{ $row['tanggal'] }}</td>
                            <td class="px-6 py-4">{{ $row['info'] }}</td>
                            <td class="px-6 py-4">
                                @php $cls = $badge[$row['status']] ?? 'bg-gray-100 text-gray-700 ring-gray-200'; @endphp
                                <span
                                    class="inline-flex items-center rounded-full px-2.5 py-1 text-xs font-semibold ring-1 {{ $cls }}">
                                    {{ $row['status'] }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <a href="#" class="text-blue-600 hover:text-blue-800 font-medium">Detail</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-10 text-center text-gray-500">
                                Belum ada aktivitas peminjaman.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</x-user-layout>
