<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center gap-2">
            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
            {{ __('Cari & Gabung Kelompok') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="mb-6">
                <h3 class="text-2xl font-bold text-gray-800">Daftar Kelompok Tersedia</h3>
                <p class="text-gray-500">Gabung ke dalam kelompok untuk mulai berkolaborasi mengerjakan tugas.</p>
            </div>

            @if(session('success'))
                <div class="mb-6 p-4 bg-green-50 text-green-700 border-l-4 border-green-500 rounded-r shadow-sm flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    {{ session('success') }}
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($groups as $group)
                    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition duration-200 flex flex-col h-full">
                        <div class="p-6 flex-1">
                            <div class="flex justify-between items-start mb-4">
                                <div class="bg-blue-50 text-blue-700 p-3 rounded-lg">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                                </div>
                                <span class="bg-gray-100 text-gray-600 text-xs font-bold px-2 py-1 rounded-full">
                                    {{ $group->users_count }} Anggota
                                </span>
                            </div>
                            
                            <h4 class="text-xl font-bold text-gray-900 mb-2">{{ $group->name }}</h4>
                            <p class="text-gray-500 text-sm line-clamp-3">
                                {{ $group->description ?? 'Tidak ada deskripsi.' }}
                            </p>
                        </div>

                        <div class="p-6 bg-gray-50 border-t border-gray-100 mt-auto">
                            @if(in_array($group->id, $myGroupIds))
                                <div class="flex items-center justify-between">
                                    <span class="text-green-600 font-bold text-sm flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                        Terdaftar
                                    </span>
                                    <form action="{{ route('groups.leave', $group->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="text-red-500 hover:text-red-700 text-sm font-semibold underline">
                                            Keluar
                                        </button>
                                    </form>
                                </div>
                            @else
                                <form action="{{ route('groups.join', $group->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg shadow-sm transition transform active:scale-95">
                                        Gabung Kelompok
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-12">
                        <div class="inline-block p-4 rounded-full bg-gray-100 mb-4">
                            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                        </div>
                        <h3 class="text-lg font-medium text-gray-900">Belum ada kelompok</h3>
                        <p class="text-gray-500">Admin belum membuat kelompok apapun.</p>
                    </div>
                @endforelse
            </div>

        </div>
    </div>
</x-app-layout>