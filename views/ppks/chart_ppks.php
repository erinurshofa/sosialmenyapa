<?php
use miloschuman\highcharts\Highcharts;
use yii\helpers\Url;
use yii\web\JsExpression;

$this->title = 'Statistik PPKS';

$data = json_encode($rekap['full_ppks']); // Pastikan $chartData berisi data dari query
$this->registerJsFile('https://code.highcharts.com/highcharts.js', ['depends' => \yii\web\JqueryAsset::class]);
echo '<pre>';print_r($data);exit;
$script = <<<JS
Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Statistik PPKS per Kecamatan dan Kelurahan'
    },
    xAxis: {
        categories: $data.categories,
        title: {
            text: 'Kecamatan - Kelurahan'
        },
        labels: {
            rotation: -45
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah PPKS'
        }
    },
    tooltip: {
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            stacking: 'normal',
            dataLabels: {
                enabled: true
            }
        }
    },
    series: $data.series
});
JS;

$this->registerJs(new JsExpression($script));
?>

<div class="site-index">
    <div class="jumbotron text-center">
        <h1>Dashboard PPKS</h1>
    </div>
    <div class="body-content">
        <div id="container"></div>
    </div>
</div>
