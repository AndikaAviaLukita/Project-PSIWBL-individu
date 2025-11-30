<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Buat Tugas Baru</h2>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-8 shadow-lg sm:rounded-lg border border-gray-100">
                
                <form method="POST" action="{{ route('admin.tasks.store') }}">
                    @csrf

                    <div class="mb-6">
                        <x-input-label for="title" :value="__('Judul Tugas')" />
                        <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" required autofocus placeholder="Contoh: Perbaiki Bug Login" />
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>

                    <div class="mb-4 p-4 bg-blue-50 rounded-lg border border-blue-100">
                        <label class="block text-blue-800 font-bold mb-2 text-sm">🔍 Filter User Berdasarkan Kelompok</label>
                        <select id="group_filter" class="w-full border-blue-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 text-sm">
                            <option value="">-- Tampilkan Semua User --</option>
                            @foreach($groups as $group)
                                <option value="{{ $group->id }}">{{ $group->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-6">
                        <x-input-label for="assigned_to" :value="__('Tugaskan Kepada')" />
                        <select id="assigned_to" name="assigned_to" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                            <option value="" disabled selected>-- Pilih Anggota Tim --</option>
                            
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" data-groups="{{ $user->groups->pluck('id') }}">
                                    {{ $user->name }} 
                                    ({{ $user->groups->count() > 0 ? $user->groups->pluck('name')->join(', ') : 'Tanpa Kelompok' }})
                                </option>
                            @endforeach
                        </select>
                        <p id="user_count_info" class="text-xs text-gray-500 mt-1">Menampilkan semua user.</p>
                    </div>

                    <div class="mb-6">
                        <x-input-label for="description" :value="__('Deskripsi Detail')" />
                        <textarea id="description" name="description" rows="3" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                    </div>

                    <div class="mb-6">
                        <x-input-label for="due_date" :value="__('Batas Waktu (Deadline)')" />
                        <x-text-input id="due_date" class="block mt-1 w-full" type="date" name="due_date" required />
                    </div>

                    <div class="flex items-center gap-4">
                        <x-primary-button class="bg-blue-800 hover:bg-blue-700">{{ __('Simpan Tugas') }}</x-primary-button>
                        <a href="{{ route('admin.dashboard') }}" class="text-gray-600 hover:text-gray-900">Batal</a>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const groupFilter = document.getElementById('group_filter');
            const userSelect = document.getElementById('assigned_to');
            const userOptions = Array.from(userSelect.options); // Simpan semua opsi asli
            const infoText = document.getElementById('user_count_info');

            groupFilter.addEventListener('change', function() {
                const selectedGroupId = this.value;
                
                // Reset dropdown user
                userSelect.innerHTML = '<option value="" disabled selected>-- Pilih Anggota Tim --</option>';
                
                let visibleCount = 0;

                userOptions.forEach(option => {
                    // Skip opsi placeholder default
                    if (option.value === "") return;

                    const userGroups = JSON.parse(option.getAttribute('data-groups') || "[]");
                    
                    // Logika Filter:
                    // Jika tidak ada grup yg dipilih (Value ""), TAMPILKAN SEMUA.
                    // Jika ada grup dipilih, cek apakah ID grup ada di data user tersebut.
                    if (selectedGroupId === "" || userGroups.includes(parseInt(selectedGroupId))) {
                        userSelect.appendChild(option); // Masukkan kembali opsi ke dropdown
                        visibleCount++;
                    }
                });

                // Update teks info
                if (selectedGroupId === "") {
                    infoText.textContent = "Menampilkan semua user.";
                } else {
                    infoText.textContent = `Ditemukan ${visibleCount} anggota di kelompok ini.`;
                }
            });
        });
    </script>
</x-app-layout>