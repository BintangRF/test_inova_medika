<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">Daftar Transaksi Tindakan</h2>
    </x-slot>

    <div class="py-8 mx-auto max-w-7xl">
        <div class="overflow-x-auto bg-white rounded-lg shadow">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-xs font-medium text-left text-gray-500 uppercase">No</th>
                        <th class="px-4 py-3 text-xs font-medium text-left text-gray-500 uppercase">Pasien</th>
                        <th class="px-4 py-3 text-xs font-medium text-left text-gray-500 uppercase">Tanggal Kunjungan</th>
                        <th class="px-4 py-3 text-xs font-medium text-left text-gray-500 uppercase">Tindakan</th>
                        <th class="px-4 py-3 text-xs font-medium text-left text-gray-500 uppercase">Obat</th>
                        <th class="px-4 py-3 text-xs font-medium text-left text-gray-500 uppercase">Jumlah Obat</th>
                        <th class="px-4 py-3 text-xs font-medium text-left text-gray-500 uppercase">Keterangan</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($transaksiTindakans as $item)
                        <tr>
                            <td class="px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="px-4 py-2">{{ $item->kunjungan->pasien->nama ?? '-' }}</td>
                            <td class="px-4 py-2">{{ $item->kunjungan->tanggal_kunjungan ?? '-' }}</td>
                            <td class="px-4 py-2">{{ $item->tindakan->nama ?? '-' }}</td>
                            <td class="px-4 py-2">{{ $item->obat->nama ?? '-' }}</td>
                            <td class="px-4 py-2">{{ $item->jumlah_obat ?? '-' }}</td>
                            <td class="px-4 py-2">{{ $item->keterangan ?? '-' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-4 py-3 text-center text-gray-500">Belum ada transaksi tindakan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
