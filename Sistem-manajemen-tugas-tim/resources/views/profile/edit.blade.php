<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center gap-2">
            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
            {{ __('Pengaturan Profil') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <div class="p-4 sm:p-8 bg-white shadow-sm sm:rounded-lg border border-gray-100">
                <div class="max-w-xl">
                    <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center gap-2">
                        <span class="bg-blue-100 text-blue-800 p-1 rounded">👤</span> Informasi Dasar
                    </h3>
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow-sm sm:rounded-lg border border-gray-100">
                <div class="max-w-xl">
                    <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center gap-2">
                        <span class="bg-yellow-100 text-yellow-800 p-1 rounded">🔑</span> Ganti Password
                    </h3>
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow-sm sm:rounded-lg border border-red-100">
                <div class="max-w-xl">
                    <h3 class="text-lg font-bold text-red-600 mb-4 flex items-center gap-2">
                        <span class="bg-red-100 text-red-800 p-1 rounded">⚠️</span> Hapus Akun
                    </h3>
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

        </div>
    </div>
</x-app-layout>