{{-- resources/views/dashboard/admin.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        Dashboard Petugas
    </x-slot>

    <div class="py-4">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <h1 class="mb-6 text-xl font-bold">Selamat datang, Petugas!</h1>

            {{-- Grid Card Buttons --}}
            <div class="grid grid-cols-2 gap-6 sm:grid-cols-2 lg:grid-cols-4">
                {{-- Card Button --}}
                <a href="{{ route('pasien-kunjungan.index') }}" class="p-6 transition bg-white border border-gray-200 shadow rounded-xl hover:shadow-md hover:bg-blue-50">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-lg font-semibold text-gray-700">Kunjungan Pasien</span>
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 5l7 7-7 7" />
                        </svg>
                    </div>
                    <p class="text-sm text-gray-500">Kelola data kunjungan pasien secara lengkap</p>
                </a>

                <a href="{{ route('transaksi-tindakan.index') }}" class="p-6 transition bg-white border border-gray-200 shadow rounded-xl hover:shadow-md hover:bg-blue-50">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-lg font-semibold text-gray-700">Data Tindakan Pasien</span>
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 5l7 7-7 7" />
                        </svg>
                    </div>
                    <p class="text-sm text-gray-500">Lihat data tindakan pasien secara lengkap</p>
                </a>


            </div>
        </div>
    </div>
</x-app-layout>
