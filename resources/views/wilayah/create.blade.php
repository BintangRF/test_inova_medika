<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tambah Wilayah Baru</h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-xl mx-auto bg-white rounded-xl shadow-md p-6 space-y-6">
            <h3 class="text-lg font-semibold text-gray-700 border-b pb-2">Form Wilayah</h3>

            <form action="{{ route('wilayah.store') }}" method="POST" class="space-y-4">
                @csrf

                {{-- Input Nama Wilayah --}}
                <div>
                    <label for="nama" class="block text-sm font-medium text-gray-700">Nama Wilayah</label>
                    <input type="text" name="nama" id="nama" value="{{ old('nama') }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                        placeholder="Masukkan nama wilayah" required>
                    @error('nama')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Tombol Aksi --}}
                <div class="flex justify-end space-x-2 pt-4 border-t">
                    <a href="{{ route('wilayah.index') }}"
                        class="inline-flex items-center px-4 py-2 bg-gray-100 border border-gray-300 rounded-md text-sm text-gray-700 hover:bg-gray-200 transition">
                        Batal
                    </a>
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-sm text-white hover:bg-indigo-700 transition">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
