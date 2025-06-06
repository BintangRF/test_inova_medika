<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tambah tindakan Baru</h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-xl mx-auto bg-white rounded-xl shadow-md p-6 space-y-6">
            <h3 class="text-lg font-semibold text-gray-700 border-b pb-2">Form tindakan</h3>

            <form action="{{ route('tindakan.update', $tindakan->id)}}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                    <input type="text" name="nama" id="nama" value="{{ old('nama', $tindakan->nama) }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                               focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                        placeholder="Masukkan nama tindakan" required>
                    @error('nama')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="Keterangan" class="block text-sm font-medium text-gray-700">Keterangan</label>
                    <textarea name="keterangan" id="keterangan"
                         class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                               focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                        placeholder="Masukkan keterangan" required>{{ old('keterangan', $tindakan->keterangan) }}</textarea>
                    @error('keterangan')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="harga" class="block text-sm font-medium text-gray-700">harga</label>
                    <input type="number" name="harga" id="harga" value="{{ old('harga', $tindakan->harga) }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                               focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                        placeholder="Masukkan harga" required>
                    @error('harga')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end space-x-2 pt-4 border-t">
                    <a href="{{ route('tindakan.index') }}"
                       class="inline-flex items-center px-4 py-2 bg-gray-100 border border-gray-300 rounded-md
                              text-sm text-gray-700 hover:bg-gray-200 transition">
                       Batal
                    </a>
                    <button type="submit"
                            class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md
                                   font-semibold text-sm text-white hover:bg-indigo-700 transition">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
