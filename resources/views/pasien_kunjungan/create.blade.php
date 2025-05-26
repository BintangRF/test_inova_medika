<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">Pendaftaran Pasien</h2>
    </x-slot>

    <div class="py-8 max-w-3xl mx-auto">
        <form method="POST" action="{{ route('pasien-kunjungan.store') }}" class="space-y-6 bg-white p-6 rounded shadow">
            @csrf

            {{-- Data Pasien --}}
            <div>
                <h3 class="text-lg font-semibold mb-2">Data Pasien</h3>

                <label>Nama</label>
                <input name="nama" class="w-full rounded border-gray-300" required>

                <label class="block mt-4">NIK</label>
                <input name="nik" class="w-full rounded border-gray-300" required>

                <label class="block mt-4">Alamat</label>
                <textarea name="alamat" class="w-full rounded border-gray-300" required></textarea>

                <label class="block mt-4">No Telepon</label>
                <input name="no_telepon" class="w-full rounded border-gray-300" required>
            </div>

            <hr>

            {{-- Data Kunjungan --}}
            <div>
                <h3 class="text-lg font-semibold mb-2">Data Kunjungan</h3>

                <label>Tanggal Kunjungan</label>
                <input type="date" name="tanggal_kunjungan" class="w-full rounded border-gray-300" required>

                <label class="block mt-4">Jenis Kunjungan</label>
                <select name="jenis_kunjungan" class="w-full rounded border-gray-300" required>
                    <option value="umum">Periksa Umum</option>
                    <option value="laboratorium">Cek Laboratorium</option>
                    <option value="gigi">Dokter Gigi</option>
                    <option value="lainnya">Lainnya</option>
                </select>
            </div>

            {{-- Tombol Submit --}}
            <div class="flex justify-end space-x-2">
                <a href="#" class="px-4 py-2 bg-gray-200 rounded">Batal</a>
                <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">Simpan</button>
            </div>
        </form>
    </div>
</x-app-layout>
