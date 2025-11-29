<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <div class="flex flex-row justify-between items-center mb-6 border-b pb-4">
                        <h3 class="text-xl font-bold text-gray-800">Daftar Tugas Tim</h3>
                        
                        <a href="{{ route('admin.tasks.create') }}" 
                           class="inline-flex items-center px-4 py-2 bg-blue-800 border border-transparent rounded-md font-bold text-xs text-black uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 shadow-lg">
                            + TAMBAH TUGAS BARU
                        </a>
                    </div>
                    @if(session('success'))
                        <div class="mb-4 p-4 bg-green-100 text-green-700 border border-green-400 rounded">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="overflow-x-auto relative">
                        <table class="w-full text-sm text-left text-gray-500 border border-gray-200">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                                <tr>
                                    <th scope="col" class="px-6 py-3 border-b">Judul</th>
                                    <th scope="col" class="px-6 py-3 border-b">Penerima</th>
                                    <th scope="col" class="px-6 py-3 border-b text-center">Status</th>
                                    <th scope="col" class="px-6 py-3 border-b text-center">Deadline</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($tasks as $task)
                                <tr class="bg-white border-b hover:bg-gray-50">
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{ $task->title }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $task->assignee->name ?? '-' }}
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded border border-blue-400">
                                            {{ $task->status }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        {{ $task->due_date }}
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-4 text-center text-gray-500 font-bold">
                                        BELUM ADA TUGAS. SILAKAN KLIK TOMBOL DI KANAN ATAS.
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