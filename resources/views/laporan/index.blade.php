<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold text-gray-800">Laporan Klinik</h2>
    </x-slot>

    <div class="py-8 max-w-6xl mx-auto space-y-10">
        {{-- Kunjungan per Bulan --}}
        <div class="bg-white p-6 shadow rounded">
            <h3 class="font-semibold text-lg mb-4">📅 Kunjungan Pasien per Bulan</h3>
            <canvas id="kunjunganChart"></canvas>
        </div>

        {{-- Tindakan Terbanyak --}}
        <div class="bg-white p-6 shadow rounded">
            <h3 class="font-semibold text-lg mb-4">💉 5 Tindakan Terbanyak</h3>
            <canvas id="tindakanChart"></canvas>
        </div>

        {{-- Obat Terbanyak --}}
        <div class="bg-white p-6 shadow rounded">
            <h3 class="font-semibold text-lg mb-4">💊 5 Obat Paling Sering Diresepkan</h3>
            <canvas id="obatChart"></canvas>
        </div>
    </div>

    {{-- Chart.js CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Data dari controller
        const kunjunganLabels = @json($kunjunganPerBulan->pluck('bulan'));
        const kunjunganData = @json($kunjunganPerBulan->pluck('jumlah'));

        const tindakanLabels = @json($tindakanTerbanyak->pluck('nama'));
        const tindakanData = @json($tindakanTerbanyak->pluck('jumlah'));

        const obatLabels = @json($obatTerbanyak->pluck('nama'));
        const obatData = @json($obatTerbanyak->pluck('jumlah'));

        // Chart: Kunjungan per Bulan
        new Chart(document.getElementById('kunjunganChart'), {
            type: 'line',
            data: {
                labels: kunjunganLabels,
                datasets: [{
                    label: 'Jumlah Kunjungan',
                    data: kunjunganData,
                    borderColor: 'rgb(75, 192, 192)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    tension: 0.4
                }]
            },
        });

        // Chart: Tindakan Terbanyak
        new Chart(document.getElementById('tindakanChart'), {
            type: 'bar',
            data: {
                labels: tindakanLabels,
                datasets: [{
                    label: 'Frekuensi',
                    data: tindakanData,
                    backgroundColor: 'rgba(54, 162, 235, 0.7)',
                    borderColor: 'rgb(54, 162, 235)',
                    borderWidth: 1
                }]
            },
        });

        // Chart: Obat Terbanyak
        new Chart(document.getElementById('obatChart'), {
            type: 'bar',
            data: {
                labels: obatLabels,
                datasets: [{
                    label: 'Frekuensi',
                    data: obatData,
                    backgroundColor: 'rgba(255, 99, 132, 0.7)',
                    borderColor: 'rgb(255, 99, 132)',
                    borderWidth: 1
                }]
            },
        });
    </script>
</x-app-layout>
