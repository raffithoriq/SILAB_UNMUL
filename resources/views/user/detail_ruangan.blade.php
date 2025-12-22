<x-user-layout title="Detail Ruangan" page="User" pageTitle="Detail Ruangan">
    @php
        // Native dummy (sementara)
        $ruangan = [
            'nama' => 'Lab Komputer 1',
            'lokasi' => 'Gedung Teknik • Lantai 2',
            'kapasitas' => 30,
        ];

        $fasilitas = [
            'Proyektor' => 2,
            'AC' => 3,
            'WiFi' => 1,
            'Lemari' => 1,
            'pc' => 15,
        ];

        $tanggal = request('tanggal', now()->toDateString());
    @endphp

    <div class="max-w-6xl mx-auto space-y-6">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            {{-- Info Ruangan --}}
            <div class="lg:col-span-1">
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="p-5 border-b border-gray-100">
                        <h2 class="text-lg font-semibold text-gray-900">{{ $ruangan['nama'] }}</h2>
                        <p class="text-sm text-gray-600">{{ $ruangan['lokasi'] }}</p>
                    </div>

                    <div class="p-5 space-y-3 text-sm">
                        <div class="flex items-center justify-between">
                            <span class="text-gray-500">Status</span>
                            <span
                                class="inline-flex items-center rounded-full bg-green-50 px-2.5 py-1 text-xs font-semibold text-green-700 ring-1 ring-green-200">
                                Tersedia
                            </span>
                        </div>

                        <div class="flex items-center justify-between">
                            <span class="text-gray-500">Foto Ruangan</span>
                            <a href="#" class=" text-blue-600 hover:underline">Lihat Foto</a>
                        </div>

                        <div class="flex items-center justify-between">
                            <span class="text-gray-500">Kapasitas</span>
                            <span class="font-semibold text-gray-900">{{ $ruangan['kapasitas'] }} Orang</span>
                        </div>

                        {{-- Fasilitas (native) --}}
                        <div class="flex items-start justify-between gap-4">
                            <span class="text-gray-500">Fasilitas</span>
                            <div class="text-right space-y-1">
                                @forelse ($fasilitas as $nama => $jumlah)
                                    <div class="font-semibold text-gray-900">
                                        {{ $jumlah }} {{ $nama }}
                                    </div>
                                @empty
                                    <div class="text-sm text-gray-500">-</div>
                                @endforelse
                            </div>
                        </div>

                        <div class="pt-4">
                            <div class="rounded-lg bg-blue-50 p-4 text-blue-800 text-sm">
                                <div class="font-semibold mb-1">Tips</div>
                                Pilih jam yang tidak bentrok. Pengajuan akan diverifikasi laboran.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Kalender + Form + Ketersediaan --}}
            <div class="lg:col-span-2 space-y-6">

                {{-- Form Peminjaman --}}
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="p-5 border-b border-gray-100">
                        <h2 class="text-lg font-semibold text-gray-900">Ajukan Peminjaman</h2>
                        <p class="text-sm text-gray-600">Pilih tanggal & jam, lalu klik ajukan.</p>
                    </div>

                    <form action="#" method="POST" class="p-5 space-y-5">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal</label>
                                <input type="date" name="tanggal" value="{{ $tanggal }}"
                                    class="w-full rounded-xl border border-gray-200 bg-white px-4 py-2 text-sm
                                           focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-400"
                                    required />
                                <p class="text-xs text-gray-500 mt-2">Pilih tanggal dari kalender.</p>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Keperluan</label>
                                <input type="text" name="keperluan"
                                    placeholder="Contoh: Praktikum / Rapat / Kegiatan"
                                    class="w-full rounded-xl border border-gray-200 bg-white px-4 py-2 text-sm
                                           focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-400"
                                    required />
                                <p class="text-xs text-gray-500 mt-2">Tuliskan tujuan peminjaman.</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Jam Mulai</label>
                                <input type="time" name="jam_mulai"
                                    class="w-full rounded-xl border border-gray-200 bg-white px-4 py-2 text-sm
                                           focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-400"
                                    required />
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Jam Selesai</label>
                                <input type="time" name="jam_selesai"
                                    class="w-full rounded-xl border border-gray-200 bg-white px-4 py-2 text-sm
                                           focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-400"
                                    required />
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Catatan (Opsional)</label>
                            <textarea name="catatan" rows="3" placeholder="Catatan tambahan untuk laboran..."
                                class="w-full rounded-xl border border-gray-200 bg-white px-4 py-2 text-sm
                                       focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-400"></textarea>
                        </div>

                        <div class="flex flex-col sm:flex-row gap-3 justify-end">
                            <a href="{{ route('user.pinjam-ruangan') }}"
                                class="inline-flex items-center justify-center rounded-xl border border-gray-200 px-4 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-50">
                                Kembali
                            </a>

                            <button type="submit"
                                class="inline-flex items-center justify-center rounded-xl bg-blue-600 px-5 py-2 text-sm font-semibold text-white hover:bg-blue-700">
                                Ajukan Peminjaman
                            </button>
                        </div>
                    </form>
                </div>

                {{-- Ketersediaan Ruangan --}}
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                    <div
                        class="p-5 border-b border-gray-100 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                        <div>
                            <h2 class="text-lg font-semibold text-gray-900">Ketersediaan Ruangan</h2>
                            <p class="text-sm text-gray-600">Pilih tanggal untuk melihat jadwal terpakai.</p>
                        </div>

                        <form method="GET" class="flex items-center gap-2">
                            <input type="date" name="tanggal" value="{{ $tanggal }}"
                                class="rounded-xl border border-gray-200 bg-white px-4 py-2 text-sm
                                       focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-400" />
                            <button type="submit"
                                class="rounded-xl bg-blue-600 px-4 py-2 text-sm font-semibold text-white hover:bg-blue-700">
                                Lihat
                            </button>
                        </form>
                    </div>

                    <div class="p-5">
                        {{-- Status ketersediaan --}}
                        <div class="mb-4">
                            @if (($jadwalTerpakai ?? collect())->count() > 0)
                                <span
                                    class="inline-flex items-center rounded-full bg-red-50 px-3 py-1 text-xs font-semibold text-red-700 ring-1 ring-red-200">
                                    Tidak sepenuhnya tersedia • Ada jadwal terpakai pada
                                    {{ \Carbon\Carbon::parse($tanggal)->translatedFormat('d F Y') }}
                                </span>
                            @else
                                <span
                                    class="inline-flex items-center rounded-full bg-green-50 px-3 py-1 text-xs font-semibold text-green-700 ring-1 ring-green-200">
                                    Tersedia • Tidak ada jadwal terpakai pada
                                    {{ \Carbon\Carbon::parse($tanggal)->translatedFormat('d F Y') }}
                                </span>
                            @endif
                        </div>

                        <div class="overflow-x-auto">
                            <table class="min-w-full text-sm">
                                <thead class="bg-gray-50 text-gray-700">
                                    <tr>
                                        <th class="px-4 py-3 text-left font-semibold">Jam</th>
                                        <th class="px-4 py-3 text-left font-semibold">Kegiatan</th>
                                        <th class="px-4 py-3 text-left font-semibold">Status</th>
                                    </tr>
                                </thead>

                                <tbody class="divide-y divide-gray-200">
                                    @forelse(($jadwalTerpakai ?? collect()) as $row)
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-4 py-3">
                                                {{ $row['jam_mulai'] }} - {{ $row['jam_selesai'] }}
                                            </td>
                                            <td class="px-4 py-3 font-medium text-gray-900">
                                                {{ $row['kegiatan'] }}
                                            </td>
                                            <td class="px-4 py-3">
                                                <span
                                                    class="inline-flex items-center rounded-full bg-red-50 px-2.5 py-1 text-xs font-semibold text-red-700 ring-1 ring-red-200">
                                                    Terpakai
                                                </span>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="px-4 py-4 text-sm text-gray-500">
                                                Tidak ada jadwal terpakai di tanggal ini.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <p class="mt-3 text-xs text-gray-500">
                            *Tabel ini nantinya diisi dari data peminjaman pada tanggal terpilih.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-user-layout>
