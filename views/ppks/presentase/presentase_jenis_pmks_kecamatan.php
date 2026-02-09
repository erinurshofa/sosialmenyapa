<?php
use miloschuman\highcharts\Highcharts;

// Menghitung total keseluruhan untuk setiap kategori
$totalPerKategori = [];
foreach ($rekap as $data) {
    foreach ($data as $key => $value) {
        if ($key !== 'kecamatan') {
            $totalPerKategori[$key] = ($totalPerKategori[$key] ?? 0) + $value;
        }
    }
}

// Hitung persentase dan jumlah per kecamatan
$persentaseData = [];
foreach ($rekap as $data) {
    $kecamatan = $data['kecamatan'];
    $dataPerKecamatan = [];

    foreach ($totalPerKategori as $kategori => $total) {
        $jumlah = $data[$kategori] ?? 0;
        $persentase = ($total > 0) ? ($jumlah / $total) * 100 : 0;

        $dataPerKecamatan[] = [
            'y' => round($persentase, 2),
            'jumlah' => $jumlah, // Simpan jumlah untuk tooltip
        ];
    }

    $persentaseData[] = [
        'name' => $kecamatan,
        'data' => $dataPerKecamatan
    ];
}

$categories = array_keys($totalPerKategori);

// Data untuk Pie Chart
$pieData = [];
foreach ($totalPerKategori as $kategori => $total) {
    $pieData[] = [
        'name' => str_replace('_', ' ', $kategori),
        'y' => $total,
    ];
}

// Grafik Bar Chart (Persentase per Kecamatan)
echo Highcharts::widget([
    'scripts' => [
        'modules/exporting',
        'modules/export-data',
    ],
    'options' => [
        'chart' => [
            'type' => 'column',
            'height' => 800, // Tinggi grafik
        ],
        'title' => ['text' => 'Persentase & Jumlah Jenis PPKS per Kecamatan'],
        'xAxis' => [
            'categories' => array_map(fn($cat) => str_replace('_', ' ', $cat), $categories),
            'title' => ['text' => 'Jenis PPKS'],
            'labels' => [
                'rotation' => -45,
                'style' => ['fontSize' => '12px', 'fontFamily' => 'Verdana, sans-serif']
            ]
        ],
        'yAxis' => [
            'min' => 0,
            'max' => 100,
            'title' => ['text' => 'Persentase (%)'],
        ],
        'tooltip' => [
            'formatter' => new \yii\web\JsExpression("
                function() {
                    return '<b>' + this.series.name + '</b><br>' +
                        'Persentase: <b>' + this.point.y.toFixed(2) + '%</b><br>' +
                        'Jumlah: <b>' + this.point.jumlah + '</b>';
                }
            "),
            'shared' => true,
            'useHTML' => true,
        ],
        'plotOptions' => [
            'column' => [
                'stacking' => 'percent',
                'dataLabels' => [
                    'enabled' => true,
                    'formatter' => new \yii\web\JsExpression("
                        function() {
                            return this.y.toFixed(1) + '% (' + this.point.jumlah + ')';
                        }
                    "),
                    'style' => ['fontSize' => '10px'],
                ],
            ]
        ],
        'series' => $persentaseData,
        'exporting' => ['enabled' => true] // Aktifkan fitur ekspor
    ]
]);

// Grafik Pie Chart (Distribusi Total Jenis PPKS)
echo Highcharts::widget([
    'scripts' => [
        'modules/exporting',
        'modules/export-data',
    ],
    'options' => [
        'chart' => [
            'type' => 'pie',
            'height' => 500, // Tinggi Pie Chart
        ],
        'title' => ['text' => 'Distribusi Total Jenis PPKS'],
        'tooltip' => [
            'pointFormat' => '{series.name}: <b>{point.y}</b> ({point.percentage:.1f}%)'
        ],
        'plotOptions' => [
            'pie' => [
                'allowPointSelect' => true,
                'cursor' => 'pointer',
                'dataLabels' => [
                    'enabled' => true,
                    'format' => '<b>{point.name}</b>: {point.y} ({point.percentage:.1f}%)',
                ],
                'showInLegend' => true
            ]
        ],
        'series' => [[
            'name' => 'Jumlah PPKS',
            'colorByPoint' => true,
            'data' => $pieData
        ]],
        'exporting' => ['enabled' => true] // Aktifkan fitur ekspor
    ]
]);
?>
