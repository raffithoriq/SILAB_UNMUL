{{-- resources/views/admin/ruangan/edit.blade.php --}}
<x-admin-layout title="Admin — Edit Ruangan" page="Admin" pageTitle="Edit Ruangan">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

        <div>
            <h1 class="text-xl font-semibold text-gray-900">Edit Ruangan</h1>
            <p class="text-sm text-gray-600">Perbarui data ruangan.</p>
        </div>

        <div class="bg-white rounded-xl border border-gray-100 shadow-sm overflow-hidden">
            <form action="" method="POST" enctype="multipart/form-data" class="p-6 space-y-5">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nama Ruangan</label>
                        <input type="text" name="nama" required value=""
                            class="w-full rounded-xl border border-gray-200 px-4 py-2 text-sm
                                   focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-400"
                            placeholder="Contoh: Lab Komputer 1">
                        @error('nama')
                            <p class="text-xs text-red-600 mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Kapasitas</label>
                        <input type="number" name="kapasitas" min="1" required value=""
                            class="w-full rounded-xl border border-gray-200 px-4 py-2 text-sm
                                   focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-400"
                            placeholder="Contoh: 30">
                        @error('kapasitas')
                            <p class="text-xs text-red-600 mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Lokasi</label>
                    <input type="text" name="lokasi" required value=""
                        class="w-full rounded-xl border border-gray-200 px-4 py-2 text-sm
                               focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-400"
                        placeholder="Contoh: Gedung Teknik • Lantai 2">
                    @error('lokasi')
                        <p class="text-xs text-red-600 mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                    <select name="status"
                        class="w-full rounded-xl border border-gray-200 px-4 py-2 text-sm
                               focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-400">
                        {{-- @php $status = old('status', $ruangan->status); @endphp --}}
                        {{-- <option value="Tersedia" {{ $status === 'Tersedia' ? 'selected' : '' }}>Tersedia</option> --}}
                        {{-- <option value="Perawatan" {{ $status === 'Perawatan' ? 'selected' : '' }}>Perawatan</option> --}}
                    </select>
                    @error('status')
                        <p class="text-xs text-red-600 mt-2">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Foto Ruangan --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Foto Ruangan</label>

                    {{-- Foto lama --}}
                    @if (!empty($ruangan->foto))
                        <div class="mb-3">
                            <p class="text-xs text-gray-500 mb-2">Foto saat ini:</p>
                            <img src="{{ asset('storage/' . $ruangan->foto) }}"
                                class="h-28 w-full rounded-xl border border-gray-200 object-cover" alt="Foto ruangan">
                        </div>
                    @endif

                    {{-- Upload baru --}}
                    <input id="foto" type="file" name="foto" accept="image/*"
                        class="w-full rounded-xl border border-gray-200 bg-white px-4 py-2 text-sm
                               file:mr-4 file:rounded-lg file:border-0 file:bg-gray-900 file:px-4 file:py-2 file:text-sm file:font-semibold file:text-white
                               hover:file:bg-gray-800
                               focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-400">
                    <p class="text-xs text-gray-500 mt-2">Kosongkan jika tidak ingin mengganti foto.</p>
                    @error('foto')
                        <p class="text-xs text-red-600 mt-2">{{ $message }}</p>
                    @enderror

                    {{-- Preview foto baru --}}
                    <div class="mt-3 hidden" id="previewWrap">
                        <p class="text-xs text-gray-500 mb-2">Preview foto baru:</p>
                        <img id="previewImg" class="h-28 w-full rounded-xl border border-gray-200 object-cover"
                            alt="Preview foto">
                    </div>
                </div>

                {{-- Fasilitas --}}
                <div>
                    <div class="flex items-center justify-between mb-2">
                        <label class="block text-sm font-medium text-gray-700">Fasilitas (opsional)</label>

                        <button type="button" id="addFacility"
                            class="inline-flex items-center gap-2 rounded-xl bg-gray-900 px-4 py-2 text-sm font-semibold text-white hover:bg-gray-800">
                            + Tambah Fasilitas
                        </button>
                    </div>

                    <p class="text-xs text-gray-500 mb-4">Edit fasilitas beserta jumlahnya.</p>

                    <div id="facilityList" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @php
                            // dukung old input kalau validasi gagal
                            $oldNama = old('fasilitas.nama');
                            $oldJumlah = old('fasilitas.jumlah');

                            // kalau tidak ada old, ambil dari relasi/field ruangan
                            // asumsi: $ruangan->fasilitas adalah collection of ['nama','jumlah']
                            $fasilitasRows = [];

                            if (is_array($oldNama) && is_array($oldJumlah)) {
                                foreach ($oldNama as $idx => $nm) {
                                    $fasilitasRows[] = [
                                        'nama' => $nm,
                                        'jumlah' => $oldJumlah[$idx] ?? 1,
                                    ];
                                }
                            } else {
                                $fasilitasRows = collect($ruangan->fasilitas ?? [])
                                    ->map(function ($f) {
                                        return [
                                            'nama' => data_get($f, 'nama'),
                                            'jumlah' => data_get($f, 'jumlah', 1),
                                        ];
                                    })
                                    ->toArray();
                            }
                        @endphp

                        @forelse ($fasilitasRows as $row)
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
                                            value="{{ $row['nama'] }}"
                                            class="w-full rounded-xl border border-gray-200 px-4 py-2 text-sm
                                                   focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-400">
                                    </div>

                                    <div>
                                        <label class="block text-xs font-medium text-gray-600 mb-1">Jumlah</label>
                                        <input type="number" name="fasilitas[jumlah][]" min="1"
                                            value="{{ $row['jumlah'] }}"
                                            class="w-full rounded-xl border border-gray-200 px-4 py-2 text-sm
                                                   focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-400">
                                    </div>
                                </div>
                            </div>
                        @empty
                            {{-- kalau belum ada fasilitas sama sekali, boleh tampilkan 1 card kosong --}}
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
                        @endforelse
                    </div>

                    @error('fasilitas')
                        <p class="text-xs text-red-600 mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-end gap-3">
                    <a href="{{ route('admin.kelola-ruangan') }}"
                        class="rounded-xl border border-gray-200 px-4 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-50">
                        Batal
                    </a>
                    <button type="submit"
                        class="rounded-xl bg-blue-600 px-5 py-2 text-sm font-semibold text-white hover:bg-blue-700">
                        Update
                    </button>
                </div>
            </form>
        </div>

    </div>

    <script>
        // preview foto baru
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

        // fasilitas dynamic
        const facilityList = document.getElementById('facilityList');
        const addBtn = document.getElementById('addFacility');

        function bindRemoveButtons(scope = document) {
            scope.querySelectorAll('.removeFacility').forEach(btn => {
                btn.addEventListener('click', () => {
                    const card = btn.closest('.facility-card');
                    card?.remove();
                });
            });
        }

        addBtn?.addEventListener('click', () => {
            const wrapper = document.createElement('div');
            wrapper.innerHTML = `
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
                            <input type="text" name="fasilitas[nama][]" placeholder="Contoh: WiFi"
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
            `.trim();

            facilityList?.appendChild(wrapper.firstElementChild);
            bindRemoveButtons(facilityList);
        });

        bindRemoveButtons();
    </script>
</x-admin-layout>
