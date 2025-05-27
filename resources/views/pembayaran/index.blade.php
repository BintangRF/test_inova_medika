<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">Tagihan Pasien</h2>
    </x-slot>

    <div class="max-w-6xl py-8 mx-auto">
        @if (session('success'))
            <div class="p-4 mb-4 text-green-800 bg-green-100 border rounded">{{ session('success') }}</div>
        @endif

        <div class="overflow-hidden bg-white rounded-lg shadow">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2">Nama Pasien</th>
                        <th class="px-4 py-2">Tanggal Kunjungan</th>
                        <th class="px-4 py-2">Total</th>
                        <th class="px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transaksi_tindakans as $transaksi_tindakan)
                    <tr>
                        <td class="px-4 py-2">{{ $transaksi_tindakan->pasien->nama }}</td>
                        <td class="px-4 py-2">{{ $transaksi_tindakan->kunjungan->tanggal_kunjungan }}</td>
                        <td class="px-4 py-2">
                            @php
                                $totalTindakan = optional($transaksi_tindakan->tindakan)->sum('harga') ?? 0;
                                $totalObat = (optional($transaksi_tindakan->obat)->harga ?? 0) * ($transaksi_tindakan->jumlah_obat ?? 0);
                            @endphp
                            Rp{{ number_format($totalTindakan + $totalObat, 0, ',', '.') }}
                        </td>
                        <td class="px-4 py-2">
                            <form action="{{ route('pembayaran.update', $transaksi_tindakan->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                
                                <button type="submit" class="px-4 py-1 text-white bg-indigo-600 rounded hover:bg-indigo-700">
                                    Bayar
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @if ($transaksi_tindakans->isEmpty())
                    <tr>
                        <td colspan="4" class="py-4 text-center text-gray-500">Tidak ada tagihan.</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
