<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">Tagihan Pasien</h2>
    </x-slot>

    <div class="py-8 max-w-6xl mx-auto">
        @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-800 border rounded">{{ session('success') }}</div>
        @endif

        <div class="bg-white shadow rounded-lg overflow-hidden">
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
                    @foreach($kunjungans as $kunjungan)
                    <tr>
                        <td class="px-4 py-2">{{ $kunjungan->pasien->nama }}</td>
                        <td class="px-4 py-2">{{ $kunjungan->kunjungan->tanggal_kunjungan }}</td>
                        <td class="px-4 py-2">
                            @php
                                $totalTindakan = $kunjungan->tindakan->sum('harga');
                                $totalObat = $kunjungan->obat->sum('harga');
                            @endphp
                            Rp{{ number_format($totalTindakan + $totalObat, 0, ',', '.') }}
                        </td>
                        <td class="px-4 py-2">
                            <form action="{{ route('pembayaran.bayar', $kunjungan->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="bg-indigo-600 text-white px-4 py-1 rounded hover:bg-indigo-700">
                                    Bayar
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @if ($kunjungans->isEmpty())
                    <tr>
                        <td colspan="4" class="text-center py-4 text-gray-500">Tidak ada tagihan.</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
