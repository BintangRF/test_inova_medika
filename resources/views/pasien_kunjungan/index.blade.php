<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">Daftar Pasien & Kunjungan</h2>
    </x-slot>

    <div class="max-w-5xl py-8 mx-auto">

        @if(auth()->user()->role !== 'dokter')
            <div class="mb-4">
            <a href="{{ route('pasien-kunjungan.create') }}" class="px-4 py-2 text-white transition bg-indigo-600 rounded hover:bg-indigo-700">
                Tambah Pendaftaran
            </a>
        </div>
        @endif

        @if(session('success'))
            <div class="p-4 mb-6 text-green-800 bg-green-100 border border-green-200 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto bg-white rounded-lg shadow">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-2">No</th>
                        <th class="px-4 py-2">Nama</th>
                        <th class="px-4 py-2">NIK</th>
                        <th class="px-4 py-2">Jenis Kunjungan</th>
                        <th class="px-4 py-2">Tanggal</th>
                        @if(auth()->user()->role !== 'petugas')
                            <th class="px-4 py-2">Aksi</th>
                        @endif
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    @forelse ($pasiens as $pasien)
                        <tr>
                            <td class="px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="px-4 py-2">{{ $pasien->nama }}</td>
                            <td class="px-4 py-2">{{ $pasien->nik }}</td>
                            <td class="px-4 py-2">{{ $pasien->kunjungan->first()?->jenis_kunjungan ?? '-' }}</td>
                            <td class="px-4 py-2">{{ $pasien->kunjungan->first()?->tanggal_kunjungan ?? '-' }}</td>
                            @if(auth()->user()->role !== 'petugas')
                            <td class="flex gap-2 px-4 py-2">
                                <a href="{{ route('kunjungan.transaksi-tindakan.create', $pasien->kunjungan->first()?->id) }}"
                                        class="px-3 py-1 text-white bg-green-500 rounded hover:bg-green-600">Proses</a>

                                {{-- <a href="{{ route('pasien-kunjungan.edit', $pasien->id) }}" class="px-3 py-1 text-white bg-yellow-400 rounded hover:bg-yellow-500">Edit</a> --}}
                            </td>
                            @endif                           
                        </tr>
                    @empty
                        <tr><td colspan="6" class="py-4 text-center text-gray-500">Belum ada data</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
