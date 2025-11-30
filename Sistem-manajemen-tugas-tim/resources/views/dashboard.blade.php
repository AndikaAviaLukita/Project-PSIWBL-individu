<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Tugas Saya') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <h3 class="text-lg font-bold mb-4 text-gray-800">Daftar Tugas Anda</h3>

                    @if(session('success'))
                        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded border border-green-400">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="overflow-x-auto">
                        <table class="min-w-full border border-gray-200">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b">Judul</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b">Deskripsi</th>
                                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider border-b">Deadline</th>
                                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider border-b">Status Saat Ini</th>
                                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider border-b">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($tasks as $task)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-gray-900 font-medium">{{ $task->title }}</td>
                                    <td class="px-6 py-4 text-gray-600 text-sm">{{ Str::limit($task->description, 50) }}</td>
                                    <td class="px-6 py-4 text-center text-sm text-gray-600">{{ $task->due_date }}</td>
                                    
                                    <td class="px-6 py-4 text-center">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                            {{ $task->status === 'completed' ? 'bg-green-100 text-green-800' : 
                                               ($task->status === 'in_progress' ? 'bg-yellow-100 text-yellow-800' : 'bg-gray-100 text-gray-800') }}">
                                            {{ str_replace('_', ' ', strtoupper($task->status)) }}
                                        </span>
                                    </td>

                                    <td class="px-6 py-4 text-center">
                                        <form action="{{ route('tasks.update-status', $task->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <select name="status" onchange="this.form.submit()" 
                                                class="text-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                                <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                <option value="in_progress" {{ $task->status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                                                <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                            </select>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                                        Anda belum memiliki tugas yang diberikan.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>