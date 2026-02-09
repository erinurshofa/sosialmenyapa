<?php
use miloschuman\highcharts\Highcharts;

$kecamatanData = array_column($rekap, 'kecamatan');
$seriesData = [];

$categories = array_keys($rekap[0] ?? []);
unset($categories[0]); // Hapus kolom 'kecamatan'

foreach ($categories as $category) {
    $seriesData[] = [
        'name' => str_replace('_', ' ', $category),
        'data' => array_map('intval', array_column($rekap, $category)),
    ];
}

echo Highcharts::widget([
    'scripts' => [
        'modules/exporting',
        'modules/export-data',
    ],
    'options' => [
        'chart' => [
            'type' => 'bar',
            'height' => 800, // Menambah tinggi grafik
        ],
        'title' => ['text' => 'Grafik Rekapitulasi Jenis PPKS'],
        'xAxis' => [
            'categories' => $kecamatanData,
            'title' => ['text' => 'Kecamatan']
        ],
        'yAxis' => [
            'min' => 0,
            'title' => ['text' => 'Jumlah PPKS']
        ],
        'tooltip' => ['shared' => true, 'useHTML' => true],
        'plotOptions' => [
            'bar' => ['dataLabels' => ['enabled' => true]]
        ],
        'series' => $seriesData,
        'exporting' => [
            'enabled' => true // Mengaktifkan fitur export
        ]
    ]
]);
?>
