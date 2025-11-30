<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Buat Kelompok Baru</h2>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-8 shadow-lg sm:rounded-lg border border-gray-100">
                
                <form method="POST" action="{{ route('admin.groups.store') }}">
                    @csrf
                    <div class="mb-6">
                        <label class="block text-gray-700 font-bold mb-2">Nama Kelompok</label>
                        <input type="text" name="name" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Contoh: Tim IT Support" required>
                    </div>

                    <div class="mb-6">
                        <label class="block text-gray-700 font-bold mb-2">Deskripsi (Opsional)</label>
                        <textarea name="description" rows="3" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Deskripsi singkat kelompok..."></textarea>
                    </div>

                    <div class="flex justify-end gap-4">
                        <a href="{{ route('admin.groups.index') }}" class="text-gray-500 hover:text-gray-700 py-2 px-4">Batal</a>
                        <button type="submit" class="bg-blue-800 text-white font-bold py-2 px-6 rounded-lg hover:bg-blue-700 shadow-md">Simpan Kelompok</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>