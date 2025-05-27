<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">Proses Tindakan & Obat</h2>
    </x-slot>

    <div class="max-w-3xl py-8 mx-auto">
        <form method="POST" action="{{ route('kunjungan.transaksi-tindakan.store', $kunjungan->id) }}" class="p-6 space-y-6 bg-white rounded shadow">
            @csrf

            <h3 class="text-lg font-semibold">Pasien: {{ $kunjungan->pasien->nama ?? '-' }}</h3>
            <p class="text-sm text-gray-600">Tanggal Kunjungan: {{ $kunjungan->tanggal_kunjungan }}</p>

            <label class="block mt-4">Tindakan Medis</label>
            <select name="tindakan_id" class="w-full border-gray-300 rounded" required>
                <option value="">-- Pilih Tindakan --</option>
                @foreach ($tindakans as $t)
                    <option value="{{ $t->id }}">{{ $t->nama }} (Rp{{ number_format($t->harga) }})</option>
                @endforeach
            </select>

            <label class="block mt-4">Obat yang Diresepkan</label>
            <select name="obat_id" id="obat_id" class="w-full border-gray-300 rounded">
                <option value="">-- Tidak Meresepkan --</option>
                @foreach ($obats as $o)
                    <option value="{{ $o->id }}">{{ $o->nama }} (Stok: {{ $o->stok }})</option>
                @endforeach
            </select>

            <div id="jumlah-obat-group" class="hidden">
                <label class="block mt-4">Jumlah Obat</label>
                <input type="number" name="jumlah_obat" min="0" value="0" class="w-full border-gray-300 rounded" />
            </div>

            <label class="block mt-4">Keterangan</label>
            <textarea name="keterangan" class="w-full border-gray-300 rounded"></textarea>

            <div class="flex justify-end mt-6 space-x-2">
                <a href="{{ route('pasien-kunjungan.index') }}" class="px-4 py-2 bg-gray-200 rounded">Batal</a>
                <button type="submit" class="px-4 py-2 text-white bg-indigo-600 rounded hover:bg-indigo-700">
                    Simpan Transaksi
                </button>
            </div>
        </form>
    </div>
</x-app-layout>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const obatSelect = document.getElementById('obat_id');
    const jumlahObatGroup = document.getElementById('jumlah-obat-group');

    function toggleJumlahObat() {
        if (obatSelect.value) {
            jumlahObatGroup.classList.remove('hidden');
        } else {
            jumlahObatGroup.classList.add('hidden');
        }
    }

    obatSelect.addEventListener('change', toggleJumlahObat);
    toggleJumlahObat();
});
</script>