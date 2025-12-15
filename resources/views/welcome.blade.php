<x-app-layout title="SILAB UNMUL — Sistem Peminjaman Laboratorium Digital">

    <x-header />
    {{-- Hero --}}
    <section class="py-20 px-4">
        <div class="container mx-auto text-center">
            <h1 class="text-4xl md:text-6xl font-bold text-gray-900 mb-6">
                Sistem Peminjaman
                <span class="text-blue-600 block">Laboratorium Digital</span>
            </h1>

            <p class="text-xl text-gray-600 mb-8 max-w-2xl mx-auto">
                Kelola peminjaman ruang laboratorium dengan mudah dan efisien. Sistem terintegrasi untuk mahasiswa,
                laboran,
                dan administrasi.
            </p>

            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href=""
                    class="inline-flex items-center justify-center rounded-md bg-blue-600 px-8 py-3 text-white text-lg font-medium hover:bg-blue-700 transition">
                    Mulai Sekarang
                    {{-- ArrowRight icon --}}
                    <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 w-5 h-5" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2">
                        <path d="M5 12h14" />
                        <path d="m12 5 7 7-7 7" />
                    </svg>
                </a>

                {{-- <a href=""
                    class="inline-flex items-center justify-center rounded-md border border-gray-300 bg-transparent px-8 py-3 text-gray-900 text-lg font-medium hover:bg-white/60 transition">
                    Masuk ke Akun
                </a> --}}
            </div>
        </div>
    </section>

    {{-- Features --}}
    <section id="features" class="py-16 px-4 bg-white">
        <div class="container mx-auto">
            <h2 class="text-3xl font-bold text-center text-gray-900 mb-12">Fitur Unggulan</h2>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                {{-- Card 1 --}}
                <div class="rounded-xl border bg-white p-6 text-center shadow-sm">
                    <div class="mb-4 flex justify-center">
                        {{-- Calendar icon --}}
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-blue-600" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M8 2v4" />
                            <path d="M16 2v4" />
                            <rect x="3" y="4" width="18" height="18" rx="2" />
                            <path d="M3 10h18" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900">Jadwal Real-time</h3>
                    <p class="mt-2 text-sm text-gray-600">
                        Lihat ketersediaan ruang laboratorium secara real-time dan pilih waktu yang sesuai.
                    </p>
                </div>

                {{-- Card 2 --}}
                <div class="rounded-xl border bg-white p-6 text-center shadow-sm">
                    <div class="mb-4 flex justify-center">
                        {{-- Clock icon --}}
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-green-600" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="10" />
                            <path d="M12 6v6l4 2" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900">Proses Cepat</h3>
                    <p class="mt-2 text-sm text-gray-600">
                        Ajukan peminjaman hanya dalam beberapa menit dengan form yang mudah digunakan.
                    </p>
                </div>

                {{-- Card 3 --}}
                <div class="rounded-xl border bg-white p-6 text-center shadow-sm">
                    <div class="mb-4 flex justify-center">
                        {{-- Users icon --}}
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-purple-600" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                            <circle cx="9" cy="7" r="4" />
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
                            <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900">Multi-User</h3>
                    <p class="mt-2 text-sm text-gray-600">
                        Sistem terintegrasi untuk mahasiswa, laboran, dan staff administrasi.
                    </p>
                </div>

                {{-- Card 4 --}}
                <div class="rounded-xl border bg-white p-6 text-center shadow-sm">
                    <div class="mb-4 flex justify-center">
                        {{-- Shield icon --}}
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-orange-600" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900">Aman & Terpercaya</h3>
                    <p class="mt-2 text-sm text-gray-600">
                        Data peminjaman tersimpan aman dengan sistem tracking yang lengkap.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- How it Works --}}
    <section id="how-it-works" class="py-16 px-4 bg-gray-50">
        <div class="container mx-auto">
            <h2 class="text-3xl font-bold text-center text-gray-900 mb-12">Cara Kerja</h2>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="text-center">
                    <div
                        class="w-16 h-16 bg-blue-600 text-white rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-4">
                        1</div>
                    <h3 class="text-xl font-semibold mb-3">Isi Form Peminjaman</h3>
                    <p class="text-gray-600">Lengkapi data diri, pilih ruangan, tanggal, dan tujuan peminjaman
                        laboratorium.</p>
                </div>

                <div class="text-center">
                    <div
                        class="w-16 h-16 bg-green-600 text-white rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-4">
                        2</div>
                    <h3 class="text-xl font-semibold mb-3">Verifikasi Laboran</h3>
                    <p class="text-gray-600">Laboran akan mengecek jadwal dan menyetujui peminjaman jika ruangan
                        tersedia.</p>
                </div>

                <div class="text-center">
                    <div
                        class="w-16 h-16 bg-purple-600 text-white rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-4">
                        3</div>
                    <h3 class="text-xl font-semibold mb-3">Ambil Surat & Gunakan</h3>
                    <p class="text-gray-600">Ambil surat peminjaman yang sudah disetujui dan gunakan laboratorium
                        sesuai jadwal.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="py-16 px-4 bg-blue-600 text-white">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold mb-4">Siap Memulai Peminjaman Laboratorium?</h2>
            <p class="text-xl mb-8 opacity-90">
                Bergabunglah dengan sistem E-Lab dan nikmati kemudahan peminjaman laboratorium.
            </p>

            <a href=""
                class="inline-flex items-center justify-center rounded-md bg-white px-8 py-3 text-blue-700 text-lg font-semibold hover:bg-white/90 transition">
                Mulai Sekarang
                <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 w-5 h-5" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2">
                    <path d="M5 12h14" />
                    <path d="m12 5 7 7-7 7" />
                </svg>
            </a>
        </div>
    </section>

      <x-footer />
</x-app-layout>
