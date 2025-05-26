<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">Proses Tindakan & Obat</h2>
    </x-slot>

    <div class="py-8 max-w-3xl mx-auto">
        <form method="POST" action="{{ route('transaksi-tindakan.store', $kunjungan->id) }}" class="space-y-6 bg-white p-6 rounded shadow">
            @csrf

            <h3 class="text-lg font-semibold">Pasien: {{ $kunjungan->pasien->nama }}</h3>
            <p class="text-sm text-gray-600">Tanggal Kunjungan: {{ $kunjungan->tanggal_kunjungan }}</p>

            <label class="block mt-4">Tindakan Medis</label>
            <select name="tindakan_id" class="w-full rounded border-gray-300" required>
                <option value="">-- Pilih Tindakan --</option>
                @foreach ($tindakans as $t)
                    <option value="{{ $t->id }}">{{ $t->nama }} (Rp{{ number_format($t->harga) }})</option>
                @endforeach
            </select>

            <label class="block mt-4">Obat yang Diresepkan</label>
            <select name="obat_id" class="w-full rounded border-gray-300">
                <option value="">-- Tidak Meresepkan --</option>
                @foreach ($obats as $o)
                    <option value="{{ $o->id }}">{{ $o->nama }} (Stok: {{ $o->stok }})</option>
                @endforeach
            </select>

            <label class="block mt-4">Keterangan</label>
            <textarea name="keterangan" class="w-full rounded border-gray-300"></textarea>

            <div class="flex justify-end mt-6">
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Simpan Transaksi
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
