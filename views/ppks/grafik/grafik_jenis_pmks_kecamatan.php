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
            'height' => 900, // Meninggikan grafik agar lebih jelas
        ],
        'title' => ['text' => 'Grafik Rekapitulasi Jenis PPKS per Kecamatan'],
        'xAxis' => [
            'categories' => $kecamatanData,
            'title' => ['text' => 'Kecamatan'],
            'labels' => [
                'rotation' => -45, // Miringkan label agar tidak bertumpuk
                'style' => [
                    'fontSize' => '12px',
                    'fontFamily' => 'Verdana, sans-serif'
                ]
            ]
        ],
        'yAxis' => [
            'min' => 0,
            'title' => ['text' => 'Jumlah PPKS'],
        ],
        'tooltip' => ['shared' => true, 'useHTML' => true],
        'plotOptions' => [
            'bar' => ['dataLabels' => ['enabled' => true]]
        ],
        'legend' => [
            'layout' => 'vertical',
            'align' => 'right',
            'verticalAlign' => 'middle',
            'itemMarginTop' => 5,
            'itemMarginBottom' => 5,
        ],
        'series' => $seriesData,
        'exporting' => [
            'enabled' => true // Tambahkan fitur ekspor
        ]
    ]
]);
?>
