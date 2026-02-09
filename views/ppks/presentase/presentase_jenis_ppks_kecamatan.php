<?php
use miloschuman\highcharts\Highcharts;

$totalData = array_sum(array_map(function ($item) {
    return array_sum(array_slice($item, 1)); // Ambil semua nilai kecuali kolom 'kelurahan'
}, $rekap));

$pieData = [];
$categories = array_keys($rekap[0] ?? []);
unset($categories[0]); // Hapus kolom 'kelurahan'

foreach ($categories as $category) {
    $totalCategory = array_sum(array_column($rekap, $category));
    if ($totalCategory > 0) {
        $pieData[] = [
            'name' => str_replace('_', ' ', $category),
            'y' => round(($totalCategory / $totalData) * 100, 2) // Konversi ke persen
        ];
    }
}

echo Highcharts::widget([
    'scripts' => [
        'modules/exporting',
        'modules/export-data',
    ],
    'options' => [
        'chart' => [
            'type' => 'pie',
            'height' => 600, // Sesuaikan tinggi grafik
        ],
        'title' => ['text' => 'Presentase Jenis PPKS'],
        'tooltip' => [
            'pointFormat' => '{series.name}: <b>{point.percentage:.2f}%</b>'
        ],
        'plotOptions' => [
            'pie' => [
                'allowPointSelect' => true,
                'cursor' => 'pointer',
                'dataLabels' => [
                    'enabled' => true,
                    'format' => '<b>{point.name}</b>: {point.percentage:.2f} %'
                ]
            ]
        ],
        'series' => [[
            'name' => 'Persentase',
            'colorByPoint' => true,
            'data' => $pieData
        ]],
        'exporting' => [
            'enabled' => true // Tambahkan fitur ekspor
        ]
    ]
]);
?>
