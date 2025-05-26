<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">Daftar Pasien & Kunjungan</h2>
    </x-slot>

    <div class="py-8 max-w-5xl mx-auto">
        <div class="mb-4">
            <a href="{{ route('pasien-kunjungan.create') }}" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition">
                Tambah Pendaftaran
            </a>
        </div>

        @if(session('success'))
            <div class="mb-6 p-4 bg-green-100 border border-green-200 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white shadow rounded-lg overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-2">No</th>
                        <th class="px-4 py-2">Nama</th>
                        <th class="px-4 py-2">NIK</th>
                        <th class="px-4 py-2">Jenis Kunjungan</th>
                        <th class="px-4 py-2">Tanggal</th>
                        <th class="px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 bg-white">
                    @forelse ($pasiens as $pasien)
                        <tr>
                            <td class="px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="px-4 py-2">{{ $pasien->nama }}</td>
                            <td class="px-4 py-2">{{ $pasien->nik }}</td>
                            <td class="px-4 py-2">{{ $pasien->kunjungan->first()?->jenis_kunjungan ?? '-' }}</td>
                            <td class="px-4 py-2">{{ $pasien->kunjungan->first()?->tanggal_kunjungan ?? '-' }}</td>
                            <td class="px-4 py-2 flex gap-2">
                                <a href="{{ route('transaksi-tindakan.create', $pasien->kunjungan->first()?->id) }}"
                                        class="px-3 py-1 bg-green-500 text-white rounded hover:bg-green-600">Proses</a>

                                <a href="{{ route('pasien-kunjungan.edit', $pasien->id) }}" class="px-3 py-1 bg-yellow-400 text-white rounded hover:bg-yellow-500">Edit</a>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="text-center py-4 text-gray-500">Belum ada data</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
