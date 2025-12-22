{{-- resources/views/admin/barang/index.blade.php --}}
<x-admin-layout title="Admin — Inventaris/Barang" page="Admin" pageTitle="Inventaris/Barang">
    <div class="space-y-6">

        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-xl font-semibold text-gray-900">Inventaris / Barang</h1>
                <p class="text-sm text-gray-600">Kelola data barang inventaris (tambah, edit, hapus).</p>
            </div>

            <a href="{{ route('admin.tambah-inventaris') }}"
                class="inline-flex items-center justify-center rounded-xl bg-blue-600 px-4 py-2 text-sm font-semibold text-white hover:bg-blue-700">
                + Tambah Barang
            </a>
        </div>


        <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-4">
            <form method="GET" class="grid grid-cols-1 md:grid-cols-3 gap-3">
                <div class="md:col-span-2">
                    <input type="text" name="q" value="{{ request('q') }}"
                        placeholder="Cari Barang (contoh: Proyektor)...",
                        class="w-full rounded-xl border border-gray-200 bg-white px-4 py-2 text-sm
                               focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-400">
                </div>
                <button class="rounded-xl bg-gray-900 px-4 py-2 text-sm font-semibold text-white hover:bg-gray-800">
                    Cari
                </button>
            </form>
        </div>

        {{-- Alert (opsional) --}}
        @if (session('success'))
            <div class="rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-800">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-xl border border-gray-100 shadow-sm overflow-hidden">

            <div class="overflow-x-auto">
                <table class="min-w-full text-sm">
                    <thead class="bg-gray-50 text-gray-700">
                        <tr>
                            <th class="px-6 py-3 text-left font-semibold">No</th>
                            <th class="px-6 py-3 text-left font-semibold">Foto</th>
                            <th class="px-6 py-3 text-left font-semibold">Nama Barang</th>
                            <th class="px-6 py-3 text-left font-semibold">Kategori</th>
                            <th class="px-6 py-3 text-left font-semibold">Stok</th>
                            <th class="px-6 py-3 text-left font-semibold">Status</th>
                            <th class="px-6 py-3 text-left font-semibold">Aksi</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200">
                        @php
                            // Dummy (hapus kalau sudah pakai DB)
                            $barangs =
                                $barangs ??
                                collect([
                                    (object) [
                                        'id' => 1,
                                        'nama' => 'Proyektor Epson',
                                        'kategori' => 'Elektronik',
                                        'stok' => 3,
                                        'status' => 'Tersedia',
                                        'foto' => null,
                                    ],
                                    (object) [
                                        'id' => 2,
                                        'nama' => 'Kabel HDMI',
                                        'kategori' => 'Aksesoris',
                                        'stok' => 10,
                                        'status' => 'Tersedia',
                                        'foto' => null,
                                    ],
                                    (object) [
                                        'id' => 3,
                                        'nama' => 'Router WiFi',
                                        'kategori' => 'Jaringan',
                                        'stok' => 0,
                                        'status' => 'Habis',
                                        'foto' => null,
                                    ],
                                ]);

                            $badge = [
                                'Tersedia' => 'bg-green-50 text-green-700 ring-green-200',
                                'Perawatan' => 'bg-yellow-50 text-yellow-700 ring-yellow-200',
                                'Habis' => 'bg-red-50 text-red-700 ring-red-200',
                            ];
                        @endphp

                        @forelse ($barangs as $i => $barang)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4">{{ $i + 1 }}</td>

                                <td class="px-6 py-4">
                                    @if (!empty($barang->foto))
                                        <img src="{{ asset('storage/' . $barang->foto) }}"
                                            class="h-10 w-14 rounded-lg object-cover border border-gray-200"
                                            alt="Foto barang">
                                    @else
                                        <div
                                            class="h-10 w-14 rounded-lg bg-gray-100 border border-gray-200 grid place-items-center text-gray-400">
                                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2">
                                                <rect x="3" y="3" width="18" height="18" rx="2"></rect>
                                                <path d="M3 16l5-5 4 4 3-3 6 6"></path>
                                                <path d="M8 8h.01"></path>
                                            </svg>
                                        </div>
                                    @endif
                                </td>

                                <td class="px-6 py-4 font-medium text-gray-900">
                                    {{ $barang->nama }}
                                </td>

                                <td class="px-6 py-4">
                                    <span class="text-gray-700">{{ $barang->kategori ?? '-' }}</span>
                                </td>

                                <td class="px-6 py-4">
                                    <span class="font-semibold text-gray-900">{{ (int) $barang->stok }}</span>
                                </td>

                                <td class="px-6 py-4">
                                    @php
                                        $cls = $badge[$barang->status] ?? 'bg-gray-100 text-gray-700 ring-gray-200';
                                    @endphp
                                    <span
                                        class="inline-flex items-center rounded-full px-2.5 py-1 text-xs font-semibold ring-1 {{ $cls }}">
                                        {{ $barang->status ?? '—' }}
                                    </span>
                                </td>

                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-2">
                                        <a href="{{ route('admin.edit-inventaris', $barang->id) }}"
                                            class="inline-flex items-center justify-center rounded-lg border border-gray-200 px-3 py-1.5 text-xs font-semibold text-gray-700 hover:bg-gray-50">
                                            Edit
                                        </a>

                                        <form action="" method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus barang ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="inline-flex items-center justify-center rounded-lg bg-red-600 px-3 py-1.5 text-xs font-semibold text-white hover:bg-red-700">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-10 text-center text-gray-500">
                                    Belum ada data barang.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Pagination (kalau pakai paginate) --}}
            {{-- <div class="p-5 border-t border-gray-100">
                {{ $barangs->links() }}
            </div> --}}
        </div>

    </div>
</x-admin-layout>
