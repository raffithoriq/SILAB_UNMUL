<x-user-layout title="User — Dashboard" page="User" pageTitle="Dashboard">

    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-900">Daftar Peminjaman (Ruangan & Barang)</h3>
            <p class="text-sm text-gray-600">Semua pengajuan peminjaman Anda dalam satu tabel.</p>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full text-sm">
                <thead class="bg-gray-50 text-gray-700">
                    <tr>
                        <th class="px-6 py-3 text-left font-semibold">No</th>
                        <th class="px-6 py-3 text-left font-semibold">Jenis</th>
                        <th class="px-6 py-3 text-left font-semibold">Nama</th>
                        <th class="px-6 py-3 text-left font-semibold">Tanggal</th>
                        <th class="px-6 py-3 text-left font-semibold">Waktu / Jumlah</th>
                        <th class="px-6 py-3 text-left font-semibold">Status</th>
                        <th class="px-6 py-3 text-left font-semibold">Detail</th>
                        <th class="px-6 py-3 text-left font-semibold">Aksi</th>
                    </tr>
                </thead>

                {{-- ...thead tetap --}}

                <tbody class="divide-y divide-gray-200">
                    @php
                        $items = [
                            [
                                'id' => 1,
                                'jenis' => 'Ruangan',
                                'nama' => 'Lab Komputer 1',
                                'tanggal' => '2025-12-23',
                                'info' => '10:00 - 12:00',
                                'status' => 'Menunggu',
                            ],
                            [
                                'id' => 2,
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

                    @forelse ($items as $i => $row)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4">{{ $i + 1 }}</td>

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

                            {{-- ✅ Kolom Aksi --}}
                            <td class="px-6 py-4">
                                @if ($row['status'] === 'Menunggu')
                                    <form action="#" method="POST"
                                        onsubmit="return confirm('Yakin ingin membatalkan pengajuan ini?');">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                            class="inline-flex items-center justify-center rounded-lg bg-red-600 px-3 py-2 text-xs font-semibold text-white hover:bg-red-700">
                                            Batalkan
                                        </button>
                                    </form>
                                @else
                                    <span class="text-gray-400">-</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="px-6 py-10 text-center text-gray-500">
                                Belum ada data peminjaman.
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>
    </div>

</x-user-layout>
