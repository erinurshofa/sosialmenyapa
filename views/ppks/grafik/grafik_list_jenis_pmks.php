<?php
use yii\helpers\Json;
use app\models\JenisPmks;

$categories = [];
$values = [];

foreach ($rekap as $model) {
    $jenisPmks = JenisPmks::find()->where(['kode' => $model['kode']])->one();
    if ($jenisPmks) {
        $categories[] = $jenisPmks->nama;
        $values[] = (int) $model['jumlah'];
    }
}

// Load Chart.js & Plugin Datalabels
$this->registerJsFile('https://cdn.jsdelivr.net/npm/chart.js', ['depends' => [\yii\web\JqueryAsset::class]]);
$this->registerJsFile('https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels', ['depends' => [\yii\web\JqueryAsset::class]]);

$this->registerJs("
Chart.register(ChartDataLabels);

const ctx = document.getElementById('chartCanvas').getContext('2d');
const chart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: " . Json::encode($categories) . ",
        // datasets: [{
        //     label: 'Jumlah',
        //     data: " . Json::encode($values) . ",
        //     backgroundColor: 'rgba(54, 162, 235, 0.6)',
        //     borderColor: 'rgba(54, 162, 235, 1)',
        //     borderWidth: 1
        // }]
        datasets: [{
            data: " . Json::encode($values) . ",
            backgroundColor: [
                'rgba(255, 99, 132, 0.6)',
                'rgba(54, 162, 235, 0.6)',
                'rgba(255, 206, 86, 0.6)',
                'rgba(75, 192, 192, 0.6)',
                'rgba(153, 102, 255, 0.6)',
                'rgba(255, 159, 64, 0.6)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        indexAxis: 'y',
        responsive: true,
        maintainAspectRatio: true,
        plugins: {
            legend: { display: true },
            tooltip: {
                backgroundColor: '#333',
                titleColor: '#fff',
                bodyColor: '#fff'
            },
            datalabels: {
                anchor: 'end',
                align: 'right',
                color: '#000',
                font: { weight: 'bold', size: 14 },
                formatter: (value) => value
            }
        },
    },
    plugins: [ChartDataLabels] 
});

// Fungsi untuk export chart ke PNG
document.getElementById('exportChart').addEventListener('click', function() {
    let canvas = document.getElementById('chartCanvas');
    let image = canvas.toDataURL('image/png').replace('image/png', 'image/octet-stream');

    let link = document.createElement('a');
    link.href = image;
    link.download = 'chart.png';
    link.click();
});
");
?>

<!-- Canvas Chart -->
<canvas id="chartCanvas" width="400" height="400"></canvas>

<!-- Tombol Export -->
<button id="exportChart" class="btn btn-primary mt-3">Export Chart</button>
