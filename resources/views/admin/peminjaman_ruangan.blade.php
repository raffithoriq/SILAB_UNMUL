{{-- resources/views/admin/peminjaman-ruangan/index.blade.php --}}
<x-admin-layout title="Admin — Peminjaman Ruangan" page="Admin" pageTitle="Peminjaman Ruangan">

    <div class="space-y-6">

        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-xl font-semibold text-gray-900">Peminjaman Ruangan</h1>
                <p class="text-sm text-gray-600">Kelola pengajuan peminjaman ruangan (setujui / tolak).</p>
            </div>

            {{-- Filter status (opsional, GET) --}}
            <form method="GET" class="flex items-center gap-2">
                <select name="status"
                    class="rounded-xl border border-gray-200 bg-white px-4 py-2 text-sm
                           focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-400">
                    @php $st = request('status', ''); @endphp
                    <option value="" {{ $st === '' ? 'selected' : '' }}>Semua Status</option>
                    <option value="Menunggu" {{ $st === 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
                    <option value="Disetujui" {{ $st === 'Disetujui' ? 'selected' : '' }}>Disetujui</option>
                    <option value="Ditolak" {{ $st === 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                </select>

                <button type="submit"
                    class="rounded-xl bg-gray-900 px-4 py-2 text-sm font-semibold text-white hover:bg-gray-800">
                    Terapkan
                </button>
            </form>
        </div>

        {{-- Alert --}}
        @if (session('success'))
            <div class="rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-800">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-800">
                {{ session('error') }}
            </div>
        @endif

        <div class="bg-white rounded-xl border border-gray-100 shadow-sm overflow-hidden">

            <div
                class="p-5 border-b border-gray-100 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <h2 class="text-lg font-semibold text-gray-900">Daftar Peminjaman</h2>
                    <p class="text-sm text-gray-600">Semua pengajuan peminjaman ruangan.</p>
                </div>

                {{-- Search (opsional) --}}
                <form method="GET" class="w-full sm:w-96">
                    <div class="relative">
                        <input type="text" name="q" value="{{ request('q') }}"
                            placeholder="Cari ruangan / peminjam / tujuan..."
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

            <div class="bg-white rounded-xl border border-gray-100 shadow-sm overflow-hidden">
                @php
                    $items =
                        $items ??
                        collect([
                            (object) [
                                'id' => 101,
                                'ruangan' => 'Lab Komputer 1',
                                'peminjam' => 'Achmad Roffi Thoriq',
                                'tanggal' => '2025-12-23',
                                'jam_mulai' => '10:00',
                                'jam_selesai' => '12:00',
                                'tujuan' => 'Praktikum',
                                'status' => 'Menunggu',
                            ],
                            (object) [
                                'id' => 102,
                                'ruangan' => 'Lab Jaringan',
                                'peminjam' => 'Nadia Putri',
                                'tanggal' => '2025-12-24',
                                'jam_mulai' => '13:00',
                                'jam_selesai' => '15:00',
                                'tujuan' => 'Rapat internal divisi lab',
                                'status' => 'Disetujui',
                            ],
                            (object) [
                                'id' => 103,
                                'ruangan' => 'Lab Multimedia',
                                'peminjam' => 'Rizky',
                                'tanggal' => '2025-12-25',
                                'jam_mulai' => '08:00',
                                'jam_selesai' => '09:30',
                                'tujuan' => 'Kegiatan',
                                'status' => 'Ditolak',
                            ],
                        ]);

                    $badge = [
                        'Menunggu' => 'bg-yellow-50 text-yellow-700 ring-yellow-200',
                        'Disetujui' => 'bg-green-50 text-green-700 ring-green-200',
                        'Ditolak' => 'bg-red-50 text-red-700 ring-red-200',
                    ];

                    $btnBase =
                        'inline-flex h-8 items-center justify-center rounded-lg px-3 text-xs font-semibold focus:outline-none focus:ring-2';

                    $btnGreen = $btnBase . ' bg-green-600 text-white hover:bg-green-700 focus:ring-green-600/30';
                    $btnRed = $btnBase . ' bg-red-600 text-white hover:bg-red-700 focus:ring-red-600/30';
                    $btnOutline =
                        $btnBase .
                        ' border border-gray-200 bg-white text-gray-700 hover:bg-gray-50 focus:ring-gray-900/10';
                @endphp

                <table class="w-full table-fixed text-sm">
                    <thead class="bg-gray-50 text-gray-700">
                        <tr>
                            <th class="w-10 px-4 py-3 text-left font-semibold">No</th>
                            <th class="w-36 px-4 py-3 text-left font-semibold">Ruangan</th>
                            <th class="w-44 px-4 py-3 text-left font-semibold">Peminjam</th>
                            <th class="w-32 px-4 py-3 text-left font-semibold">Tanggal</th>
                            <th class="w-32 px-4 py-3 text-left font-semibold">Jam</th>
                            <th class="px-4 py-3 text-left font-semibold">Tujuan</th>
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
                                        <div class="truncate font-medium text-gray-900">{{ $row->ruangan }}</div>
                                        <div class="truncate text-xs text-gray-500">ID: #{{ $row->id }}</div>
                                    </div>
                                </td>

                                <td class="px-4 py-4 align-middle">
                                    <div class="min-w-0">
                                        <div class="truncate font-medium text-gray-900">{{ $row->peminjam }}</div>
                                        <div class="truncate text-xs text-gray-500">Mahasiswa</div>
                                    </div>
                                </td>

                                <td class="px-4 py-4 align-middle text-gray-700 whitespace-nowrap">
                                    {{ \Carbon\Carbon::parse($row->tanggal)->translatedFormat('d M Y') }}
                                </td>

                                <td class="px-4 py-4 align-middle text-gray-700 whitespace-nowrap">
                                    {{ $row->jam_mulai }} - {{ $row->jam_selesai }}
                                </td>

                                <td class="px-4 py-4 align-middle">
                                    <div class="truncate text-gray-800" title="{{ $row->tujuan }}">
                                        {{ $row->tujuan }}
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
                                            <form action="#" method="POST"
                                                onsubmit="return confirm('Setujui peminjaman ini?')">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="{{ $btnGreen }}">Setujui</button>
                                            </form>

                                            <form action="#" method="POST"
                                                onsubmit="return confirm('Tolak peminjaman ini?')">
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
                                    Belum ada pengajuan peminjaman ruangan.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>


            {{-- Pagination (kalau pakai paginate) --}}
            {{-- <div class="p-5 border-t border-gray-100">
                {{ $items->links() }}
            </div> --}}
        </div>

    </div>

</x-admin-layout>
