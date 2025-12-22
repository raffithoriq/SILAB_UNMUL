<x-admin-layout title="Admin — Ruangan" page="Admin" pageTitle="Ruangan">
    <div class="space-y-6">

        {{-- Header --}}
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-xl font-semibold text-gray-900">Data Ruangan</h1>
                <p class="text-sm text-gray-600">Kelola ruangan: tambah, edit, dan hapus.</p>
            </div>

            <a href="{{ route('admin.tambah-ruangan') }}"
               class="inline-flex items-center justify-center rounded-xl bg-blue-600 px-4 py-2 text-sm font-semibold text-white hover:bg-blue-700">
                + Tambah Ruangan
            </a>
        </div>

        {{-- Search + Filter (opsional) --}}
        <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-4">
            <form method="GET" class="grid grid-cols-1 md:grid-cols-3 gap-3">
                <div class="md:col-span-2">
                    <input type="text" name="q" value="{{ request('q') }}"
                        placeholder="Cari ruangan (contoh: Lab Komputer)..."
                        class="w-full rounded-xl border border-gray-200 bg-white px-4 py-2 text-sm
                               focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-400">
                </div>
                <button class="rounded-xl bg-gray-900 px-4 py-2 text-sm font-semibold text-white hover:bg-gray-800">
                    Cari
                </button>
            </form>
        </div>

        {{-- Table --}}
        <div class="bg-white rounded-xl border border-gray-100 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm">
                    <thead class="bg-gray-50 text-gray-700">
                        <tr>
                            <th class="px-6 py-3 text-left font-semibold">No</th>
                            <th class="px-6 py-3 text-left font-semibold">Nama Ruangan</th>
                            <th class="px-6 py-3 text-left font-semibold">Lokasi</th>
                            <th class="px-6 py-3 text-left font-semibold">Kapasitas</th>
                            <th class="px-6 py-3 text-left font-semibold">Status</th>
                            <th class="px-6 py-3 text-left font-semibold">Aksi</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200">

                        {{-- Dummy data (gantikan jadi $rooms dari DB) --}}
                        @php
                            $rooms = [
                                ['id'=>1,'nama'=>'Lab Komputer 1','lokasi'=>'Gedung Teknik • Lantai 2','kapasitas'=>30,'status'=>'Tersedia'],
                                ['id'=>2,'nama'=>'Lab Jaringan','lokasi'=>'Gedung Teknik • Lantai 1','kapasitas'=>25,'status'=>'Perawatan'],
                                ['id'=>3,'nama'=>'Ruang Rapat','lokasi'=>'Gedung Teknik • Lantai 3','kapasitas'=>15,'status'=>'Tersedia'],
                            ];
                        @endphp

                        @forelse($rooms as $i => $r)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4">{{ $i + 1 }}</td>
                                <td class="px-6 py-4 font-medium text-gray-900">{{ $r['nama'] }}</td>
                                <td class="px-6 py-4 text-gray-600">{{ $r['lokasi'] }}</td>
                                <td class="px-6 py-4">{{ $r['kapasitas'] }} orang</td>
                                <td class="px-6 py-4">
                                    @if($r['status'] === 'Tersedia')
                                        <span class="inline-flex items-center rounded-full bg-green-50 px-2.5 py-1 text-xs font-semibold text-green-700 ring-1 ring-green-200">
                                            Tersedia
                                        </span>
                                    @else
                                        <span class="inline-flex items-center rounded-full bg-yellow-50 px-2.5 py-1 text-xs font-semibold text-yellow-700 ring-1 ring-yellow-200">
                                            Perawatan
                                        </span>
                                    @endif
                                </td>

                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-2">
                                        {{-- Edit --}}
                                        <a href="{{ route('admin.edit-ruangan') }}"
                                           class="inline-flex items-center rounded-lg border border-gray-200 px-3 py-1.5 text-xs font-semibold text-gray-700 hover:bg-gray-50">
                                            Edit
                                        </a>

                                        {{-- Hapus --}}
                                        <form action="" method="POST"
                                              onsubmit="return confirm('Yakin ingin menghapus ruangan ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="inline-flex items-center rounded-lg bg-red-600 px-3 py-1.5 text-xs font-semibold text-white hover:bg-red-700">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-10 text-center text-gray-500">
                                    Belum ada data ruangan.
                                </td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>

    </div>
</x-admin-layout>
