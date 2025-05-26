<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">Data Pegawai Klinik</h2>
    </x-slot>

    <div class="py-8 max-w-4xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <a href="{{ route('pegawai.create') }}" 
               class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition">
               Tambah Pegawai Baru
            </a>
        </div>

        @if(session('success'))
            <div class="mb-6 p-4 bg-green-100 border border-green-200 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white shadow rounded-lg overflow-x-scroll">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jabatan</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No Telepon</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($pegawais as $pegawai)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $pegawai->nama }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $pegawai->jabatan }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $pegawai->email }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $pegawai->no_telepon ?? '-' }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex space-x-2">
                                <a href="{{ route('pegawai.edit', $pegawai->id) }}" 
                                   class="px-3 py-1 bg-yellow-400 text-white rounded hover:bg-yellow-500 transition">
                                   Edit
                                </a>
                                <form action="{{ route('pegawai.destroy', $pegawai->id) }}" method="POST" 
                                      onsubmit="return confirm('Hapus pegawai ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 transition">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-4 text-center text-gray-500">Tidak ada data pegawai</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
