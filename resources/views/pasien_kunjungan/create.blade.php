<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">Pendaftaran Pasien</h2>
    </x-slot>

    <div class="max-w-3xl py-8 mx-auto">
        <form method="POST" action="{{ route('pasien-kunjungan.store') }}" class="p-6 space-y-6 bg-white rounded shadow">
            @csrf

            {{-- Data Pasien --}}
            <div>
                <h3 class="mb-2 text-lg font-semibold">Data Pasien</h3>

                <label>Nama</label>
                <input name="nama" class="w-full border-gray-300 rounded" required>

                <label class="block mt-4">NIK</label>
                <input name="nik" class="w-full border-gray-300 rounded" required>

                <label class="block mt-4">Alamat</label>
                <textarea name="alamat" class="w-full border-gray-300 rounded" required></textarea>

                <label class="block mt-4">No Telepon</label>
                <input name="no_telepon" class="w-full border-gray-300 rounded" required>
            </div>

            <hr>

            {{-- Data Kunjungan --}}
            <div>
                <h3 class="mb-2 text-lg font-semibold">Data Kunjungan</h3>

                <label>Tanggal Kunjungan</label>
                <input type="date" name="tanggal_kunjungan" class="w-full border-gray-300 rounded" required>

                <label class="block mt-4">Jenis Kunjungan</label>
                <select name="jenis_kunjungan" class="w-full border-gray-300 rounded" required>
                    <option value="umum">Periksa Umum</option>
                    <option value="laboratorium">Cek Laboratorium</option>
                    <option value="gigi">Dokter Gigi</option>
                    <option value="lainnya">Lainnya</option>
                </select>
            </div>

            {{-- Tombol Submit --}}
            <div class="flex justify-end space-x-2">
                <a href="{{ route('pasien-kunjungan.index') }}" class="px-4 py-2 bg-gray-200 rounded">Batal</a>
                <button type="submit" class="px-4 py-2 text-white bg-indigo-600 rounded hover:bg-indigo-700">Simpan</button>
            </div>
        </form>
    </div>
</x-app-layout>
