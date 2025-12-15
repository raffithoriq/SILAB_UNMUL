{{-- resources/views/auth/login.blade.php --}}
<x-app-layout title="Masuk — SILAB UNMUL">
    <div class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100 flex items-center justify-center p-4">
        <div class="w-full max-w-md">

            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-gray-900 mb-2">SILAB UNMUL</h1>
                <p class="text-gray-600">Sistem Informasi Laboratorium UNMUL</p>
            </div>

            {{-- Card --}}
            <div class="rounded-xl  bg-white shadow-sm">
                <div class="p-6 text-center ">
                    <h2 class="text-2xl font-semibold text-gray-900">Masuk ke Akun</h2>
                    <p class="text-sm text-gray-600 mt-1">Masukkan email dan password untuk mengakses dashboard</p>
                </div>

                <div class="p-6">
                    {{-- Alert Errors --}}
                    @if ($errors->any())
                        <div class="mb-4 rounded-lg border border-red-200 bg-red-50 p-4 text-sm text-red-700">
                            <div class="font-semibold mb-1">Login gagal</div>
                            <ul class="list-disc pl-5 space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session('status'))
                        <div class="mb-4 rounded-lg border border-green-200 bg-green-50 p-4 text-sm text-green-700">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="" class="space-y-6">
                        @csrf

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                            <input type="email" name="email" value="{{ old('email') }}"
                                placeholder="Masukkan email Anda"
                                class="w-full rounded-md border border-gray-300 px-4 py-3 text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                required autofocus />
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                            <input type="password" name="password" placeholder="Masukkan password Anda"
                                class="w-full rounded-md border border-gray-300 px-4 py-3 text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                required />
                        </div>

                        <div class="flex items-center justify-between">
                            <label class="flex items-center">
                                <input type="checkbox" name="remember"
                                    class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"
                                    {{ old('remember') ? 'checked' : '' }} />
                                <span class="ml-2 text-sm text-gray-600">Ingat saya</span>
                            </label>

                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}"
                                    class="text-sm text-blue-600 hover:text-blue-500">
                                    Lupa password?
                                </a>
                            @endif
                        </div>

                        <button type="submit"
                            class="w-full inline-flex items-center justify-center rounded-md bg-blue-600 px-4 py-3 text-white text-base font-semibold hover:bg-blue-700 transition disabled:opacity-60 disabled:cursor-not-allowed">
                            Masuk
                        </button>
                    </form>

                    <div class="mt-6 text-center">
                        <p class="text-sm text-gray-600">
                            Belum punya akun?
                            <a href="" class="text-blue-600 hover:text-blue-500 font-medium">
                                Daftar sekarang
                            </a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="mt-6 text-center">
                <a href="{{ url('/') }}" class="text-sm text-gray-500 hover:text-gray-700">
                    ← Kembali ke beranda
                </a>
            </div>

        </div>
    </div>
</x-app-layout>
