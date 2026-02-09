<?php
use miloschuman\highcharts\Highcharts;

$kelurahanData = array_column($rekap, 'kelurahan');
$seriesData = [];

$categories = array_keys($rekap[0] ?? []);
unset($categories[0]); // Hapus kolom 'kecamatan'
unset($categories[1]); // Hapus kolom 'kelurahan'

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
            'categories' => $kelurahanData,
            'title' => ['text' => 'Kelurahan']
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
