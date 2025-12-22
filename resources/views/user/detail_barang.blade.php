<x-user-layout title="Detail Barang" page="User" pageTitle="Detail Barang">
    @php
        // Native dummy (sementara)
        $barang = [
            'nama' => 'Kamera DSLR Canon',
            'kode' => 'BRG-DSLR-001',
            'kategori' => 'Multimedia',
            'lokasi' => 'LEB Teknik • Gudang A',
            'stok' => 5,
            'kondisi' => 'Baik',
        ];
    @endphp

    <div class="max-w-6xl mx-auto space-y-6">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            {{-- Info Barang --}}
            <div class="lg:col-span-1">
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="p-5 border-b border-gray-100">
                        <h2 class="text-lg font-semibold text-gray-900">{{ $barang['nama'] }}</h2>
                        <p class="text-sm text-gray-600">Kode: <span
                                class="font-medium text-gray-800">{{ $barang['kode'] }}</span></p>
                    </div>

                    <div class="p-5 space-y-3 text-sm">
                        <div class="flex items-center justify-between">
                            <span class="text-gray-500">Kategori</span>
                            <span class="font-semibold text-gray-900">{{ $barang['kategori'] }}</span>
                        </div>

                        <div class="flex items-center justify-between">
                            <span class="text-gray-500">Lokasi</span>
                            <span class="font-semibold text-gray-900">{{ $barang['lokasi'] }}</span>
                        </div>

                        <div class="flex items-center justify-between">
                            <span class="text-gray-500">Kondisi</span>
                            <span
                                class="inline-flex items-center rounded-full bg-emerald-50 px-2.5 py-1 text-xs font-semibold text-emerald-700 ring-1 ring-emerald-200">
                                {{ $barang['kondisi'] }}
                            </span>
                        </div>

                        <div class="flex items-center justify-between">
                            <span class="text-gray-500">Stok Tersedia</span>
                            <span class="font-semibold text-gray-900">{{ $barang['stok'] }} Unit</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-gray-500">Foto Barang</span>
                            <a href="#" class=" text-blue-600 hover:underline">Lihat Foto</a>
                        </div>


                        <div class="pt-4">
                            <div class="rounded-lg bg-blue-50 p-4 text-blue-800 text-sm">
                                <div class="font-semibold mb-1">Catatan</div>
                                Pastikan jumlah pinjam tidak melebihi stok. Pengajuan akan diverifikasi laboran.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Form Peminjaman Barang --}}
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="p-5 border-b border-gray-100">
                        <h2 class="text-lg font-semibold text-gray-900">Form Peminjaman Barang</h2>
                        <p class="text-sm text-gray-600">Lengkapi data di bawah untuk mengajukan peminjaman.</p>
                    </div>

                    <form action="#" method="POST" class="p-5 space-y-5">
                        @csrf

                        {{-- Jumlah + Tanggal --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Jumlah Pinjam</label>
                                <input type="number" name="jumlah" min="1" max="{{ $barang['stok'] }}"
                                    placeholder="Contoh: 1"
                                    class="w-full rounded-xl border border-gray-200 bg-white px-4 py-2 text-sm
                                           focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-400"
                                    required />
                                <p class="text-xs text-gray-500 mt-2">Maksimal {{ $barang['stok'] }} unit.</p>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Keperluan</label>
                                <input type="text" name="keperluan"
                                    placeholder="Contoh: Dokumentasi kegiatan / Praktikum"
                                    class="w-full rounded-xl border border-gray-200 bg-white px-4 py-2 text-sm
                                           focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-400"
                                    required />
                            </div>
                        </div>

                        {{-- Tanggal kembali + Keperluan --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal Pinjam</label>
                                <input type="date" name="tanggal_pinjam" value="{{ now()->toDateString() }}"
                                    class="w-full rounded-xl border border-gray-200 bg-white px-4 py-2 text-sm
                                           focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-400"
                                    required />
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal Kembali</label>
                                <input type="date" name="tanggal_kembali"
                                    class="w-full rounded-xl border border-gray-200 bg-white px-4 py-2 text-sm
                                           focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-400"
                                    required />
                                <p class="text-xs text-gray-500 mt-2">Isi perkiraan tanggal pengembalian.</p>
                            </div>


                        </div>

                        {{-- Catatan --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Catatan (Opsional)</label>
                            <textarea name="catatan" rows="3" placeholder="Catatan tambahan untuk laboran..."
                                class="w-full rounded-xl border border-gray-200 bg-white px-4 py-2 text-sm
                                       focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-400"></textarea>
                        </div>

                        {{-- Checkbox persetujuan --}}
                        <div class="flex items-start gap-3">
                            <input id="agree" type="checkbox"
                                class="mt-1 h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-600"
                                required />
                            <label for="agree" class="text-sm text-gray-600">
                                Saya bersedia menjaga barang, mengembalikan tepat waktu, dan bertanggung jawab jika
                                terjadi kerusakan.
                            </label>
                        </div>

                        {{-- Buttons --}}
                        <div class="flex flex-col sm:flex-row gap-3 justify-end">
                            <a href="{{ route('user.pinjam-barang') ?? url('/user/pinjam-barang') }}"
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

                {{-- Info kecil (opsional) --}}
                <div class="rounded-xl border border-gray-100 bg-white p-5 text-sm text-gray-600">
                    <span class="font-semibold text-gray-900">Info:</span>
                    Setelah kamu mengajukan, status akan masuk ke menu <b>Status Pengajuan</b> untuk menunggu
                    verifikasi.
                </div>
            </div>

        </div>
    </div>
</x-user-layout>
