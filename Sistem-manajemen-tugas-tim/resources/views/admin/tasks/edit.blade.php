<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Tugas</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                
                <form method="POST" action="{{ route('admin.tasks.update', $task->id) }}">
                    @csrf
                    @method('PUT') <div class="mb-4">
                        <label class="block text-gray-700">Judul Tugas</label>
                        <input type="text" name="title" value="{{ $task->title }}" class="w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700">Deskripsi</label>
                        <textarea name="description" class="w-full border-gray-300 rounded-md shadow-sm">{{ $task->description }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700">Tugaskan Kepada</label>
                        <select name="assigned_to" class="w-full border-gray-300 rounded-md shadow-sm">
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ $task->assigned_to == $user->id ? 'selected' : '' }}>
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700">Deadline</label>
                        <input type="date" name="due_date" value="{{ $task->due_date }}" class="w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>

                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan Perubahan</button>
                    <a href="{{ route('admin.dashboard') }}" class="ml-4 text-gray-600">Batal</a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>