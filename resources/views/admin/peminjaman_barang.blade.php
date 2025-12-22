<x-admin-layout title="Admin — Peminjaman Barang" page="Admin" pageTitle="Peminjaman Barang">

    <div class="space-y-6">

        {{-- Header --}}
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-xl font-semibold text-gray-900">Peminjaman Inventaris/Barang</h1>
                <p class="text-sm text-gray-600">Kelola pengajuan peminjaman barang dari pengguna.</p>
            </div>

            {{-- (Opsional) Filter cepat --}}
            <form method="GET" class="flex items-center gap-2">
                <select name="status"
                    class="h-9 rounded-lg border border-gray-200 bg-white px-3 text-sm focus:outline-none focus:ring-2 focus:ring-blue-600/20">
                    <option value="">Semua Status</option>
                    <option value="Menunggu" @selected(request('status') === 'Menunggu')>Menunggu</option>
                    <option value="Disetujui" @selected(request('status') === 'Disetujui')>Disetujui</option>
                    <option value="Ditolak" @selected(request('status') === 'Ditolak')>Ditolak</option>
                    <option value="Selesai" @selected(request('status') === 'Selesai')>Selesai</option>
                </select>

                <button type="submit"
                    class="h-9 rounded-lg bg-gray-900 px-4 text-sm font-semibold text-white hover:bg-gray-800">
                    Filter
                </button>
            </form>
        </div>

        {{-- Table Card --}}
        <div class="bg-white rounded-xl border border-gray-100 shadow-sm overflow-hidden">

            <div
                class="p-5 border-b border-gray-100 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <h2 class="text-lg font-semibold text-gray-900">Daftar Peminjaman</h2>
                    <p class="text-sm text-gray-600">Semua pengajuan peminjaman barang.</p>
                </div>

                {{-- Search (opsional) --}}
                <form method="GET" class="w-full sm:w-96">
                    <div class="relative">
                        <input type="text" name="q" value="{{ request('q') }}"
                            placeholder="Cari barang / peminjam / keperluan..."
                            class="w-full rounded-xl border border-gray-200 bg-white px-4 py-2 pl-10 text-sm
                                   focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-400">
                        <div class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">
                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2">
                                <circle cx="11" cy="11" r="7"></circle>
                                <path d="M21 21l-4.3-4.3"></path>
                            </svg>
                        </div>
                    </div>
                </form>
            </div>

            @php
                // Dummy data (hapus kalau sudah pakai DB)
                $items =
                    $items ??
                    collect([
                        (object) [
                            'id' => 201,
                            'barang' => 'Proyektor Epson EB-X51',
                            'kode' => 'INV-PRJ-001',
                            'peminjam' => 'Achmad Roffi Thoriq',
                            'tanggal' => '2025-12-23',
                            'jumlah' => 1,
                            'keperluan' => 'Presentasi praktikum',
                            'status' => 'Menunggu',
                        ],
                        (object) [
                            'id' => 202,
                            'barang' => 'Kamera DSLR Canon',
                            'kode' => 'INV-CAM-003',
                            'peminjam' => 'Nadia Putri',
                            'tanggal' => '2025-12-24',
                            'jumlah' => 1,
                            'keperluan' => 'Dokumentasi kegiatan',
                            'status' => 'Disetujui',
                        ],
                        (object) [
                            'id' => 203,
                            'barang' => 'Laptop Lenovo ThinkPad',
                            'kode' => 'INV-LPT-010',
                            'peminjam' => 'Rizky',
                            'tanggal' => '2025-12-25',
                            'jumlah' => 2,
                            'keperluan' => 'Workshop',
                            'status' => 'Ditolak',
                        ],
                    ]);

                // Filter dummy (kalau pakai DB, lakukan di query)
                if (request('status')) {
                    $items = $items->where('status', request('status'))->values();
                }

                $badge = [
                    'Menunggu' => 'bg-yellow-50 text-yellow-700 ring-yellow-200',
                    'Disetujui' => 'bg-green-50 text-green-700 ring-green-200',
                    'Ditolak' => 'bg-red-50 text-red-700 ring-red-200',
                    'Selesai' => 'bg-gray-100 text-gray-700 ring-gray-200',
                ];

                $btnBase =
                    'inline-flex h-8 items-center justify-center rounded-lg px-3 text-xs font-semibold focus:outline-none focus:ring-2';
                $btnGreen = $btnBase . ' bg-green-600 text-white hover:bg-green-700 focus:ring-green-600/30';
                $btnRed = $btnBase . ' bg-red-600 text-white hover:bg-red-700 focus:ring-red-600/30';
                $btnOutline =
                    $btnBase . ' border border-gray-200 bg-white text-gray-700 hover:bg-gray-50 focus:ring-gray-900/10';
            @endphp

            <table class="w-full table-fixed text-sm">
                <thead class="bg-gray-50 text-gray-700">
                    <tr>
                        <th class="w-10 px-4 py-3 text-left font-semibold">No</th>
                        <th class="w-52 px-4 py-3 text-left font-semibold">Barang</th>
                        <th class="w-36 px-4 py-3 text-left font-semibold">Peminjam</th>
                        <th class="w-32 px-4 py-3 text-left font-semibold">Tanggal</th>
                        <th class="w-20 px-4 py-3 text-left font-semibold">Jumlah</th>
                        <th class="px-4 py-3 text-left font-semibold">Keperluan</th>
                        <th class="w-28 px-4 py-3 text-left font-semibold">Status</th>
                        <th class="w-24 px-4 py-3 text-left font-semibold">Detail</th>
                        <th class="w-44 px-4 py-3 text-left font-semibold">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">
                    @forelse ($items as $i => $row)
                        @php $cls = $badge[$row->status] ?? 'bg-gray-100 text-gray-700 ring-gray-200'; @endphp

                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-4 align-middle text-gray-700">{{ $i + 1 }}</td>

                            <td class="px-4 py-4 align-middle">
                                <div class="min-w-0">
                                    <div class="truncate font-medium text-gray-900" title="{{ $row->barang }}">
                                        {{ $row->barang }}
                                    </div>
                                    <div class="truncate text-xs text-gray-500">Kode: {{ $row->kode }} • ID:
                                        #{{ $row->id }}</div>
                                </div>
                            </td>

                            <td class="px-4 py-4 align-middle">
                                <div class="min-w-0">
                                    <div class="truncate font-medium text-gray-900" title="{{ $row->peminjam }}">
                                        {{ $row->peminjam }}
                                    </div>
                                    <div class="truncate text-xs text-gray-500">User</div>
                                </div>
                            </td>

                            <td class="px-4 py-4 align-middle text-gray-700 whitespace-nowrap">
                                {{ \Carbon\Carbon::parse($row->tanggal)->translatedFormat('d M Y') }}
                            </td>

                            <td class="px-4 py-4 align-middle text-gray-700 whitespace-nowrap">
                                {{ $row->jumlah }}
                            </td>

                            <td class="px-4 py-4 align-middle">
                                <div class="truncate text-gray-800" title="{{ $row->keperluan }}">
                                    {{ $row->keperluan }}
                                </div>
                            </td>

                            <td class="px-4 py-4 align-middle">
                                <span
                                    class="inline-flex items-center rounded-full px-2.5 py-1 text-xs font-semibold ring-1 {{ $cls }}">
                                    {{ $row->status }}
                                </span>
                            </td>

                            <td class="px-4 py-4 align-middle">
                                <a href="#" class="{{ $btnOutline }}">Detail</a>
                            </td>

                            <td class="px-4 py-4 align-middle">
                                <div class="flex items-center gap-2">
                                    @if ($row->status === 'Menunggu')
                                        {{-- Setujui --}}
                                        <form action="#" method="POST"
                                            onsubmit="return confirm('Setujui peminjaman barang ini?')">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="{{ $btnGreen }}">Setujui</button>
                                        </form>

                                        {{-- Tolak --}}
                                        <form action="#" method="POST"
                                            onsubmit="return confirm('Tolak peminjaman barang ini?')">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="{{ $btnRed }}">Tolak</button>
                                        </form>
                                    @else
                                        <span
                                            class="inline-flex h-8 items-center rounded-lg bg-gray-50 px-3 text-xs font-semibold text-gray-600 ring-1 ring-gray-200">
                                            Tidak ada aksi
                                        </span>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="px-4 py-10 text-center text-gray-500">
                                Belum ada pengajuan peminjaman barang.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</x-admin-layout>
