<?php
use yii\helpers\Json;

$categories = array_keys($rekap);
$values = array_values($rekap);

$this->registerJsFile('https://cdn.jsdelivr.net/npm/chart.js', ['depends' => [\yii\web\JqueryAsset::class]]);
$this->registerJsFile('https://cdn.jsdelivr.net/npm/chartjs-plugin-zoom', ['depends' => [\yii\web\JqueryAsset::class]]);

$colors = [];
$borderColors = [];
$baseColors = [
    'rgba(255, 99, 132, 0.6)', 'rgba(54, 162, 235, 0.6)', 'rgba(255, 206, 86, 0.6)',
    'rgba(75, 192, 192, 0.6)', 'rgba(153, 102, 255, 0.6)', 'rgba(255, 159, 64, 0.6)'
];
$borderBaseColors = [
    'rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)',
    'rgba(75, 192, 192, 1)', 'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)'
];

for ($i = 0; $i < count($categories); $i++) {
    $colors[] = $baseColors[$i % count($baseColors)];
    $borderColors[] = $borderBaseColors[$i % count($borderBaseColors)];
}
$datasets = [
    [
        'label' => 'Jumlah',
        'data' => $values,
        'backgroundColor' => $colors,
        'borderColor' => $borderColors,
        'borderWidth' => 1,
    ]
];

$this->registerJs("
const ctx = document.getElementById('chartCanvas').getContext('2d');
const chart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: " . Json::encode($categories) . ",
        datasets: " . Json::encode($datasets) . "
    },
    options: {
        indexAxis: 'y', // Mengubah chart menjadi horizontal
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: { display: false }, // Sembunyikan legend untuk menghindari kepadatan
            tooltip: {
                backgroundColor: '#333',
                titleColor: '#fff',
                bodyColor: '#fff'
            },
            zoom: {
                pan: { enabled: true, mode: 'y' }, // Hanya geser vertikal agar tetap rapi
                zoom: { enabled: true, mode: 'y' }
            }
        },
        scales: {
            x: {
                title: {
                    display: true,
                    text: 'Jumlah',
                    color: '#333',
                    font: { size: 14 }
                },
                ticks: {
                    color: '#333',
                    font: { size: 12 }
                }
            },
            y: {
                title: {
                    display: true,
                    text: 'Kategori',
                    color: '#333',
                    font: { size: 14 }
                },
                ticks: {
                    color: '#333',
                    font: { size: 12 },
                    autoSkip: false, // Menampilkan semua kategori
                }
            }
        }
    }
});
");

?>

<canvas id="chartCanvas" width="400" height="1200"></canvas>
