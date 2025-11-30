<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'TeamSync') }}</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased bg-gray-50 text-black/50">
        <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
            
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
                    <div class="flex lg:justify-center lg:col-start-2">
                        <div class="flex items-center gap-2 font-bold text-2xl text-gray-800">
                            <div class="bg-blue-600 text-white p-2 rounded-lg shadow-lg">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                            </div>
                            TeamSync
                        </div>
                    </div>
                    
                    <nav class="-mx-3 flex flex-1 justify-end">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] font-bold">
                                Log in
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]">
                                    Register
                                </a>
                            @endif
                        @endauth
                    </nav>
                </header>

                <main class="mt-6 text-center">
                    <h1 class="text-5xl font-extrabold text-gray-900 tracking-tight mb-4">
                        Kelola Tugas Tim <br><span class="text-blue-600">Tanpa Ribet.</span>
                    </h1>
                    <p class="text-lg text-gray-600 mb-8 max-w-2xl mx-auto">
                        Sistem manajemen tugas sederhana untuk meningkatkan produktivitas tim Anda. 
                        Buat tugas, tetapkan ke anggota, dan pantau progres secara real-time.
                    </p>

                    <div class="flex justify-center gap-4">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-full shadow-lg transition transform hover:scale-105">
                                Akses Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-full shadow-lg transition transform hover:scale-105">
                                Mulai Sekarang
                            </a>
                            <a href="{{ route('register') }}" class="bg-white hover:bg-gray-100 text-blue-600 font-bold py-3 px-8 rounded-full shadow-lg border border-gray-200 transition">
                                Daftar Akun
                            </a>
                        @endauth
                    </div>

                    <div class="mt-12 grid grid-cols-1 md:grid-cols-3 gap-6 opacity-80">
                        <div class="p-6 bg-white rounded-xl shadow-sm border border-gray-100">
                            <div class="text-3xl mb-2">🚀</div>
                            <h3 class="font-bold">Cepat</h3>
                            <p class="text-sm">Setup instan, langsung kerja.</p>
                        </div>
                        <div class="p-6 bg-white rounded-xl shadow-sm border border-gray-100">
                            <div class="text-3xl mb-2">🎯</div>
                            <h3 class="font-bold">Fokus</h3>
                            <p class="text-sm">Antarmuka bersih tanpa gangguan.</p>
                        </div>
                        <div class="p-6 bg-white rounded-xl shadow-sm border border-gray-100">
                            <div class="text-3xl mb-2">🔒</div>
                            <h3 class="font-bold">Aman</h3>
                            <p class="text-sm">Akses berbasis role (Admin/User).</p>
                        </div>
                    </div>
                </main>

                <footer class="py-16 text-center text-sm text-black/70">
                    &copy; {{ date('Y') }} TeamSync Project. Built with Laravel 12 & Tailwind.
                </footer>
            </div>
        </div>
    </body>
</html>