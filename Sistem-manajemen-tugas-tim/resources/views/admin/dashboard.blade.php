<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Admin Dashboard - Monitor Tugas') }}
            </h2>
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                + Tambah Tugas Baru
            </button>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <h3 class="text-lg font-bold mb-4">Daftar Semua Tugas Tim</h3>
                    
                    <div class="overflow-x-auto">
                        <table class="min-w-full table-auto border-collapse border border-gray-200">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="border border-gray-300 px-4 py-2 text-left">Judul Tugas</th>
                                    <th class="border border-gray-300 px-4 py-2 text-left">Ditugaskan Ke</th>
                                    <th class="border border-gray-300 px-4 py-2 text-center">Status</th>
                                    <th class="border border-gray-300 px-4 py-2 text-center">Deadline</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tasks as $task)
                                <tr class="hover:bg-gray-50">
                                    <td class="border border-gray-300 px-4 py-2">
                                        <div class="font-bold">{{ $task->title }}</div>
                                        <div class="text-xs text-gray-500">{{ Str::limit($task->description, 50) }}</div>
                                    </td>
                                    <td class="border border-gray-300 px-4 py-2">
                                        {{ $task->assignee->name ?? 'Belum ada' }}
                                    </td>
                                    <td class="border border-gray-300 px-4 py-2 text-center">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                            {{ $task->status === 'completed' ? 'bg-green-100 text-green-800' : 
                                               ($task->status === 'in_progress' ? 'bg-yellow-100 text-yellow-800' : 'bg-gray-100 text-gray-800') }}">
                                            {{ ucfirst(str_replace('_', ' ', $task->status)) }}
                                        </span>
                                    </td>
                                    <td class="border border-gray-300 px-4 py-2 text-center">
                                        {{ \Carbon\Carbon::parse($task->due_date)->format('d M Y') }}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>