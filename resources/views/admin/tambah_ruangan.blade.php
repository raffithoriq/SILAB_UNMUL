<x-admin-layout title="Admin — Tambah Ruangan" page="Admin" pageTitle="Tambah Ruangan">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

        <div>
            <h1 class="text-xl font-semibold text-gray-900">Tambah Ruangan</h1>
            <p class="text-sm text-gray-600">Isi data ruangan baru.</p>
        </div>

        <div class="bg-white rounded-xl border border-gray-100 shadow-sm overflow-hidden">
            <form action="" method="POST" enctype="multipart/form-data" class="p-6 space-y-5">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nama Ruangan</label>
                        <input type="text" name="nama" required
                            class="w-full rounded-xl border border-gray-200 px-4 py-2 text-sm
                                   focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-400"
                            placeholder="Contoh: Lab Komputer 1">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Kapasitas</label>
                        <input type="number" name="kapasitas" min="1" required
                            class="w-full rounded-xl border border-gray-200 px-4 py-2 text-sm
                                   focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-400"
                            placeholder="Contoh: 30">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Lokasi</label>
                    <input type="text" name="lokasi" required
                        class="w-full rounded-xl border border-gray-200 px-4 py-2 text-sm
                               focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-400"
                        placeholder="Contoh: Gedung Teknik • Lantai 2">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                    <select name="status"
                        class="w-full rounded-xl border border-gray-200 px-4 py-2 text-sm
                                   focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-400">
                        <option value="Tersedia">Tersedia</option>
                        <option value="Perawatan">Perawatan</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Foto Ruangan</label>
                    <input id="foto" type="file" name="foto" accept="image/*"
                        class="w-full rounded-xl border border-gray-200 bg-white px-4 py-2 text-sm
                                   file:mr-4 file:rounded-lg file:border-0 file:bg-gray-900 file:px-4 file:py-2 file:text-sm file:font-semibold file:text-white
                                   hover:file:bg-gray-800
                                   focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-400">
                    <p class="text-xs text-gray-500 mt-2">Format: JPG/PNG. Disarankan max 2MB.</p>

                    {{-- Preview (opsional) --}}
                    <div class="mt-3 hidden" id="previewWrap">
                        <img id="previewImg" class="h-28 w-full rounded-xl border border-gray-200 object-cover"
                            alt="Preview foto">
                    </div>
                </div>

                {{-- Fasilitas (dynamic cards) --}}
                <div>
                    <div class="flex items-center justify-between mb-2">
                        <label class="block text-sm font-medium text-gray-700">Fasilitas (opsional)</label>

                        <button type="button" id="addFacility"
                            class="inline-flex items-center gap-2 rounded-xl bg-gray-900 px-4 py-2 text-sm font-semibold text-white hover:bg-gray-800">
                            + Tambah Fasilitas
                        </button>
                    </div>

                    <p class="text-xs text-gray-500 mb-4">Tambah beberapa fasilitas (misal: Proyektor, AC, WiFi) beserta
                        jumlahnya.</p>

                    <div id="facilityList" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        {{-- Card default 1 (boleh dihapus kalau tidak mau default) --}}
                        <div class="facility-card rounded-xl border border-gray-200 bg-white p-4">
                            <div class="flex items-start justify-between gap-3 mb-3">
                                <div>
                                    <div class="text-sm font-semibold text-gray-900">Fasilitas</div>
                                    <div class="text-xs text-gray-500">Isi nama & jumlah</div>
                                </div>

                            <button type="button"
                                class="removeFacility rounded-lg bg-red-600 px-3 py-1.5 text-xs font-semibold text-white hover:bg-red-700">
                                Hapus
                            </button>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                <div>
                                    <label class="block text-xs font-medium text-gray-600 mb-1">Nama</label>
                                    <input type="text" name="fasilitas[nama][]" placeholder="Contoh: Proyektor"
                                        class="w-full rounded-xl border border-gray-200 px-4 py-2 text-sm
                               focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-400">
                                </div>

                                <div>
                                    <label class="block text-xs font-medium text-gray-600 mb-1">Jumlah</label>
                                    <input type="number" name="fasilitas[jumlah][]" min="1" value="1"
                                        class="w-full rounded-xl border border-gray-200 px-4 py-2 text-sm
                               focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-400">
                                </div>
                            </div>
                        </div>
                    </div>

                    <p class="text-xs text-gray-500 mt-3">
                        Tips: Kalau fasilitas kosong, biarkan saja — nanti tidak disimpan.
                    </p>
                </div>

                {{-- Template Card (disembunyikan) --}}
                <template id="facilityTemplate">
                    <div class="facility-card rounded-xl border border-gray-200 bg-white p-4">
                        <div class="flex items-start justify-between gap-3 mb-3">
                            <div>
                                <div class="text-sm font-semibold text-gray-900">Fasilitas</div>
                                <div class="text-xs text-gray-500">Isi nama & jumlah</div>
                            </div>
                            <button type="button"
                                class="removeFacility rounded-lg bg-red-600 px-3 py-1.5 text-xs font-semibold text-white hover:bg-red-700">
                                Hapus
                            </button>

                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            <div>
                                <label class="block text-xs font-medium text-gray-600 mb-1">Nama</label>
                                <input type="text" name="fasilitas[nama][]" placeholder="Contoh: AC"
                                    class="w-full rounded-xl border border-gray-200 px-4 py-2 text-sm
                           focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-400">
                            </div>

                            <div>
                                <label class="block text-xs font-medium text-gray-600 mb-1">Jumlah</label>
                                <input type="number" name="fasilitas[jumlah][]" min="1" value="1"
                                    class="w-full rounded-xl border border-gray-200 px-4 py-2 text-sm
                           focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-400">
                            </div>
                        </div>
                    </div>
                </template>


                <div class="flex items-center justify-end gap-3">
                    <a href="{{ route('admin.kelola-ruangan') }}"
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

    {{-- JS preview (native, opsional) --}}
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


        const facilityList = document.getElementById('facilityList');
        const addBtn = document.getElementById('addFacility');
        const tpl = document.getElementById('facilityTemplate');

        function bindRemoveButtons(scope = document) {
            scope.querySelectorAll('.removeFacility').forEach(btn => {
                btn.addEventListener('click', () => {
                    const card = btn.closest('.facility-card');
                    card?.remove();
                });
            });
        }

        addBtn?.addEventListener('click', () => {
            const node = tpl.content.cloneNode(true);
            facilityList.appendChild(node);
            bindRemoveButtons(facilityList);
        });

        // bind untuk card default
        bindRemoveButtons();
    </script>
</x-admin-layout>
