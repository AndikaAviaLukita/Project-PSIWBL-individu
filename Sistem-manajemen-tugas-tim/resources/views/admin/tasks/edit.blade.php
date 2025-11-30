<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Tugas</h2>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-8 shadow-lg sm:rounded-lg border border-gray-100">
                
                <form method="POST" action="{{ route('admin.tasks.update', $task->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-6">
                        <label class="block text-gray-700 font-bold mb-2">Judul Tugas</label>
                        <input type="text" name="title" value="{{ $task->title }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                    </div>

                    <div class="mb-4 p-4 bg-yellow-50 rounded-lg border border-yellow-100">
                        <label class="block text-yellow-800 font-bold mb-2 text-sm">🔍 Filter User (Bantu Cari)</label>
                        <select id="group_filter" class="w-full border-yellow-300 rounded-lg shadow-sm text-sm">
                            <option value="">-- Tampilkan Semua User --</option>
                            @foreach($groups as $group)
                                <option value="{{ $group->id }}">{{ $group->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-6">
                        <label class="block text-gray-700 font-bold mb-2">Tugaskan Kepada</label>
                        <select id="assigned_to" name="assigned_to" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" 
                                        data-groups="{{ $user->groups->pluck('id') }}"
                                        {{ $task->assigned_to == $user->id ? 'selected' : '' }}>
                                    {{ $user->name }} 
                                    ({{ $user->groups->count() > 0 ? $user->groups->pluck('name')->join(', ') : 'Tanpa Kelompok' }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-6">
                        <label class="block text-gray-700 font-bold mb-2">Deskripsi</label>
                        <textarea name="description" rows="3" class="w-full border-gray-300 rounded-lg shadow-sm">{{ $task->description }}</textarea>
                    </div>

                    <div class="mb-6">
                        <label class="block text-gray-700 font-bold mb-2">Deadline</label>
                        <input type="date" name="due_date" value="{{ $task->due_date }}" class="w-full border-gray-300 rounded-lg shadow-sm" required>
                    </div>

                    <div class="flex items-center gap-4">
                        <button type="submit" class="bg-blue-800 text-white font-bold py-2 px-6 rounded-lg hover:bg-blue-700">Simpan Perubahan</button>
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
            // Simpan opsi dan status 'selected' asli
            const userOptions = Array.from(userSelect.options);
            const originalSelectedValue = userSelect.value; 

            groupFilter.addEventListener('change', function() {
                const selectedGroupId = this.value;
                
                // Kosongkan
                userSelect.innerHTML = '';
                
                userOptions.forEach(option => {
                    const userGroups = JSON.parse(option.getAttribute('data-groups') || "[]");
                    const isSelected = (option.value == originalSelectedValue); // Pertahankan seleksi asli jika user tsb masih muncul

                    if (selectedGroupId === "" || userGroups.includes(parseInt(selectedGroupId))) {
                        userSelect.appendChild(option);
                    }
                });

                // Jika list jadi kosong, beri opsi fallback
                if (userSelect.options.length === 0) {
                    const noOpt = document.createElement('option');
                    noOpt.text = "-- Tidak ada anggota di kelompok ini --";
                    userSelect.add(noOpt);
                }
            });
        });
    </script>
</x-app-layout>