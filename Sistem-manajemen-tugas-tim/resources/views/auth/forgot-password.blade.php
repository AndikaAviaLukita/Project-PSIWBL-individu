<x-guest-layout>
    <div class="flex flex-col items-center mb-6">
        <div class="bg-yellow-500 text-white p-3 rounded-xl shadow-lg mb-3">
            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path></svg>
        </div>
        <h2 class="text-2xl font-bold text-gray-800">Lupa Password?</h2>
        <p class="text-gray-500 text-sm text-center">Jangan khawatir. Masukkan email Anda dan kami akan mengirimkan link reset password.</p>
    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div>
            <x-input-label for="email" :value="__('Email Terdaftar')" />
            <x-text-input id="email" class="block mt-1 w-full p-2.5 border border-gray-300 rounded-lg focus:ring-yellow-500 focus:border-yellow-500" type="email" name="email" :value="old('email')" required autofocus placeholder="nama@email.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-6 flex-col gap-3">
            <x-primary-button class="w-full justify-center bg-yellow-600 hover:bg-yellow-700 py-3 text-base font-bold shadow-md">
                {{ __('Kirim Link Reset Password') }}
            </x-primary-button>
            
            <a href="{{ route('login') }}" class="text-sm text-gray-600 hover:text-gray-900 underline">
                Kembali ke halaman login
            </a>
        </div>
    </form>
</x-guest-layout>