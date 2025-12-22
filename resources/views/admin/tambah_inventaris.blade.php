{{-- resources/views/admin/barang/create.blade.php --}}
<x-admin-layout title="Admin — Tambah Barang" page="Admin" pageTitle="Tambah Barang">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

        <div>
            <h1 class="text-xl font-semibold text-gray-900">Tambah Barang</h1>
            <p class="text-sm text-gray-600">Isi data barang inventaris baru.</p>
        </div>

        <div class="bg-white rounded-xl border border-gray-100 shadow-sm overflow-hidden">
            <form action="" method="POST" enctype="multipart/form-data"
                class="p-6 space-y-5">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nama Barang</label>
                        <input type="text" name="nama" required value="{{ old('nama') }}"
                            class="w-full rounded-xl border border-gray-200 px-4 py-2 text-sm
                                   focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-400"
                            placeholder="Contoh: Proyektor Epson">
                        @error('nama')
                            <p class="text-xs text-red-600 mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Kategori</label>
                        <input type="text" name="kategori" value="{{ old('kategori') }}"
                            class="w-full rounded-xl border border-gray-200 px-4 py-2 text-sm
                                   focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-400"
                            placeholder="Contoh: Elektronik">
                        @error('kategori')
                            <p class="text-xs text-red-600 mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Stok</label>
                        <input type="number" name="stok" min="0" required value="{{ old('stok', 0) }}"
                            class="w-full rounded-xl border border-gray-200 px-4 py-2 text-sm
                                   focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-400">
                        @error('stok')
                            <p class="text-xs text-red-600 mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                        <select name="status"
                            class="w-full rounded-xl border border-gray-200 px-4 py-2 text-sm
                                   focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-400">
                            @php $st = old('status', 'Tersedia'); @endphp
                            <option value="Tersedia" {{ $st === 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                            <option value="Perawatan" {{ $st === 'Perawatan' ? 'selected' : '' }}>Perawatan</option>
                            <option value="Habis" {{ $st === 'Habis' ? 'selected' : '' }}>Habis</option>
                        </select>
                        @error('status')
                            <p class="text-xs text-red-600 mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Foto Barang (opsional)</label>
                    <input id="foto" type="file" name="foto" accept="image/*"
                        class="w-full rounded-xl border border-gray-200 bg-white px-4 py-2 text-sm
                               file:mr-4 file:rounded-lg file:border-0 file:bg-gray-900 file:px-4 file:py-2 file:text-sm file:font-semibold file:text-white
                               hover:file:bg-gray-800
                               focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-400">
                    <p class="text-xs text-gray-500 mt-2">Format: JPG/PNG. Disarankan max 2MB.</p>

                    <div class="mt-3 hidden" id="previewWrap">
                        <img id="previewImg" class="h-28 w-full rounded-xl border border-gray-200 object-cover"
                            alt="Preview foto">
                    </div>
                    @error('foto')
                        <p class="text-xs text-red-600 mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi (opsional)</label>
                    <textarea name="deskripsi" rows="3"
                        class="w-full rounded-xl border border-gray-200 px-4 py-2 text-sm
                               focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-400"
                        placeholder="Catatan barang...">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <p class="text-xs text-red-600 mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-end gap-3">
                    <a href="{{ route('admin.kelola-inventaris') }}"
                        class="rounded-xl border border-gray-200 px-4 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-50">
                        Batal
                    </a>
                    <button type="submit"
                        class="rounded-xl bg-blue-600 px-5 py-2 text-sm font-semibold text-white hover:bg-blue-700">
                        Simpan
                    </button>
                </div>
            </form>
        </div>

    </div>

    <script>
        const input = document.getElementById('foto');
        const wrap = document.getElementById('previewWrap');
        const img = document.getElementById('previewImg');

        input?.addEventListener('change', (e) => {
            const file = e.target.files?.[0];
            if (!file) {
                wrap.classList.add('hidden');
                img.src = '';
                return;
            }
            img.src = URL.createObjectURL(file);
            wrap.classList.remove('hidden');
        });
    </script>
</x-admin-layout>
