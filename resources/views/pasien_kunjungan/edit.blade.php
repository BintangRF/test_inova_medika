<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">Edit Data Pasien</h2>
    </x-slot>

    <div class="py-8 max-w-3xl mx-auto">
        <form method="POST" action="{{ route('pasien-kunjungan.update', $pasien->id) }}" class="space-y-6 bg-white p-6 rounded shadow">
            @csrf
            @method('PUT')

            <h3 class="text-lg font-semibold mb-2">Data Pasien</h3>

            <label>Nama</label>
            <input name="nama" value="{{ old('nama', $pasien->nama) }}" class="w-full rounded border-gray-300" required>

            <label class="block mt-4">NIK</label>
            <input name="nik" value="{{ old('nik', $pasien->nik) }}" class="w-full rounded border-gray-300" required>

            <label class="block mt-4">Alamat</label>
            <textarea name="alamat" class="w-full rounded border-gray-300" required>{{ old('alamat', $pasien->alamat) }}</textarea>

            <label class="block mt-4">No Telepon</label>
            <input name="no_telepon" value="{{ old('no_telepon', $pasien->no_telepon) }}" class="w-full rounded border-gray-300" required>

            <hr>

            <h3 class="text-lg font-semibold mb-2">Data Kunjungan</h3>

            <label>Tanggal Kunjungan</label>
            <input type="date" name="tanggal_kunjungan" value="{{ old('tanggal_kunjungan', $kunjungan->tanggal_kunjungan) }}" class="w-full rounded border-gray-300" required>

            <label class="block mt-4">Jenis Kunjungan</label>
            <select name="jenis_kunjungan" class="w-full rounded border-gray-300" required>
                @foreach (['umum', 'laboratorium', 'gigi', 'lainnya'] as $jenis)
                    <option value="{{ $jenis }}" {{ old('jenis_kunjungan', $kunjungan->jenis_kunjungan) == $jenis ? 'selected' : '' }}>
                        {{ ucfirst($jenis) }}
                    </option>
                @endforeach
            </select>

            <div class="flex justify-end space-x-2 mt-6">
                <a href="{{ route('pasien-kunjungan.index') }}" class="px-4 py-2 bg-gray-200 rounded">Batal</a>
                <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">Perbarui</button>
            </div>
        </form>
    </div>
</x-app-layout>
