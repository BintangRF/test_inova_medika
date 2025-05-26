{{-- resources/views/dashboard/admin.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        Dashboard Admin
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-xl font-bold mb-6">Selamat datang, Admin!</h1>

            {{-- Grid Card Buttons --}}
            <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                {{-- Card Button --}}
                <a href="{{ route('wilayah.index') }}" class="bg-white border border-gray-200 rounded-xl p-6 shadow hover:shadow-md hover:bg-blue-50 transition">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-lg font-semibold text-gray-700">Wilayah</span>
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 5l7 7-7 7" />
                        </svg>
                    </div>
                    <p class="text-sm text-gray-500">Kelola data wilayah secara lengkap</p>
                </a>

                <a href="{{ route('user.index') }}" class="bg-white border border-gray-200 rounded-xl p-6 shadow hover:shadow-md hover:bg-blue-50 transition">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-lg font-semibold text-gray-700">User</span>
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 5l7 7-7 7" />
                        </svg>
                    </div>
                    <p class="text-sm text-gray-500">Kelola data user secara lengkap</p>
                </a>

                <a href="{{ route('pegawai.index') }}" class="bg-white border border-gray-200 rounded-xl p-6 shadow hover:shadow-md hover:bg-blue-50 transition">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-lg font-semibold text-gray-700">Pegawai</span>
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 5l7 7-7 7" />
                        </svg>
                    </div>
                    <p class="text-sm text-gray-500">Kelola data pegawai secara lengkap</p>
                </a>

                <a href="{{ route('tindakan.index') }}" class="bg-white border border-gray-200 rounded-xl p-6 shadow hover:shadow-md hover:bg-blue-50 transition">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-lg font-semibold text-gray-700">Tindakan</span>
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 5l7 7-7 7" />
                        </svg>
                    </div>
                    <p class="text-sm text-gray-500">Kelola data tindakan secara lengkap</p>
                </a>

                <a href="{{ route('obat.index') }}" class="bg-white border border-gray-200 rounded-xl p-6 shadow hover:shadow-md hover:bg-blue-50 transition">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-lg font-semibold text-gray-700">Obat</span>
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 5l7 7-7 7" />
                        </svg>
                    </div>
                    <p class="text-sm text-gray-500">Kelola data obat secara lengkap</p>
                </a>

                <a href="{{ route('laporan.index') }}" class="bg-white border border-gray-200 rounded-xl p-6 shadow hover:shadow-md hover:bg-blue-50 transition">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-lg font-semibold text-gray-700">Laporan</span>
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 5l7 7-7 7" />
                        </svg>
                    </div>
                    <p class="text-sm text-gray-500">Lihat data laporan secara lengkap</p>
                </a>

            </div>
        </div>
    </div>
</x-app-layout>
