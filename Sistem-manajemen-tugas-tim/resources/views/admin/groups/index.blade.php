<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center gap-2">
            <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
            {{ __('Manajemen Kelompok') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-8 text-gray-900">
                    
                    <div class="flex justify-between items-center mb-6 border-b pb-4">
                        <div>
                            <h3 class="text-xl font-bold text-gray-800">Daftar Kelompok Tim</h3>
                            <p class="text-sm text-gray-500">Buat kelompok untuk memudahkan pembagian tugas.</p>
                        </div>
                        <a href="{{ route('admin.groups.create') }}" class="bg-blue-800 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded shadow-lg flex items-center gap-2">
                            <span>+ BUAT KELOMPOK</span>
                        </a>
                    </div>

                    @if(session('success'))
                        <div class="mb-6 p-4 bg-green-50 text-green-700 border-l-4 border-green-500 rounded-r shadow-sm">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="overflow-x-auto rounded-lg border border-gray-200">
                        <table class="w-full text-sm text-left text-gray-600">
                            <thead class="bg-gray-100 uppercase text-gray-700 font-bold">
                                <tr>
                                    <th class="px-6 py-4">Nama Kelompok</th>
                                    <th class="px-6 py-4">Deskripsi</th>
                                    <th class="px-6 py-4 text-center">Anggota</th>
                                    <th class="px-6 py-4 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @forelse($groups as $group)
                                <tr class="bg-white hover:bg-gray-50">
                                    <td class="px-6 py-4 font-bold text-gray-800">{{ $group->name }}</td>
                                    <td class="px-6 py-4">{{ $group->description ?? '-' }}</td>
                                    <td class="px-6 py-4 text-center">
                                        <span class="bg-blue-100 text-blue-800 py-1 px-3 rounded-full text-xs font-bold">
                                            {{ $group->users_count }} Orang
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-center flex justify-center gap-2">
                                        <a href="{{ route('admin.groups.edit', $group->id) }}" class="text-yellow-600 hover:text-yellow-800 font-bold border border-yellow-400 hover:bg-yellow-50 px-3 py-1 rounded transition">Edit</a>
                                        
                                        <form action="{{ route('admin.groups.destroy', $group->id) }}" method="POST" onsubmit="return confirm('Hapus kelompok ini? Anggota akan dikeluarkan otomatis.');">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800 font-bold border border-red-400 hover:bg-red-50 px-3 py-1 rounded transition">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-8 text-center text-gray-500">Belum ada kelompok yang dibuat.</td>
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