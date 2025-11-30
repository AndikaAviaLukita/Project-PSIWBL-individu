<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center gap-2">
            <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-8 text-gray-900">
                    
                    <div class="flex flex-col md:flex-row justify-between items-center mb-8 border-b pb-6 gap-4">
                        <div>
                            <h3 class="text-2xl font-bold text-gray-800">Manajemen Tugas Tim</h3>
                            <p class="text-gray-500 text-sm mt-1">Pantau dan kelola semua tugas anggota tim di sini.</p>
                        </div>
                        
                        <a href="{{ route('admin.tasks.create') }}" 
                           class="inline-flex items-center px-6 py-3 bg-blue-800 border border-transparent rounded-lg font-bold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150 shadow-lg transform hover:-translate-y-1">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                            BUAT TUGAS BARU
                        </a>
                    </div>

                    @if(session('success'))
                        <div class="mb-6 p-4 bg-green-50 text-green-700 border-l-4 border-green-500 rounded-r shadow-sm flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="overflow-x-auto rounded-lg border border-gray-200 shadow-sm">
                        <table class="w-full text-sm text-left text-gray-600">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                                <tr>
                                    <th scope="col" class="px-6 py-4 font-bold tracking-wider">Judul Tugas</th>
                                    <th scope="col" class="px-6 py-4 font-bold tracking-wider">Penerima</th>
                                    <th scope="col" class="px-6 py-4 font-bold tracking-wider text-center">Status</th>
                                    <th scope="col" class="px-6 py-4 font-bold tracking-wider text-center">Deadline</th>
                                    <th scope="col" class="px-6 py-4 font-bold tracking-wider text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @forelse($tasks as $task)
                                <tr class="bg-white hover:bg-blue-50 transition-colors duration-150">
                                    <td class="px-6 py-4 font-semibold text-gray-900">
                                        {{ $task->title }}
                                        <div class="text-xs text-gray-400 font-normal mt-1 truncate w-48" title="{{ $task->description }}">
                                            {{ $task->description }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <div class="h-8 w-8 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600 font-bold mr-2 text-xs">
                                                {{ substr($task->assignee->name ?? '?', 0, 1) }}
                                            </div>
                                            {{ $task->assignee->name ?? 'Belum ada' }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        @php
                                            $statusColors = [
                                                'pending' => 'bg-gray-100 text-gray-800 border-gray-300',
                                                'in_progress' => 'bg-yellow-100 text-yellow-800 border-yellow-300',
                                                'completed' => 'bg-green-100 text-green-800 border-green-300',
                                            ];
                                            $colorClass = $statusColors[$task->status] ?? 'bg-gray-100 text-gray-800';
                                        @endphp
                                        <span class="{{ $colorClass }} px-3 py-1 text-xs font-bold rounded-full border shadow-sm">
                                            {{ strtoupper(str_replace('_', ' ', $task->status)) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-center text-gray-500">
                                        {{ \Carbon\Carbon::parse($task->due_date)->format('d M Y') }}
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <div class="flex justify-center gap-2">
                                            <a href="{{ route('admin.tasks.edit', $task->id) }}" class="p-2 text-yellow-600 hover:bg-yellow-100 rounded-full transition" title="Edit">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                            </a>
                                            
                                            <form action="{{ route('admin.tasks.destroy', $task->id) }}" method="POST" onsubmit="return confirm('Yakin hapus tugas ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="p-2 text-red-600 hover:bg-red-100 rounded-full transition" title="Hapus">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-12 text-center text-gray-400 bg-gray-50">
                                        <div class="flex flex-col items-center">
                                            <svg class="w-12 h-12 mb-3 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                                            <p class="font-medium">Belum ada tugas.</p>
                                            <p class="text-sm">Klik tombol di atas untuk membuat tugas baru.</p>
                                        </div>
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