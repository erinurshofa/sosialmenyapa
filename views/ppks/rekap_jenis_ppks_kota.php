<?php
use kartik\grid\GridView;
use kartik\export\ExportMenu;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\data\ArrayDataProvider;
use app\models\Actions;
use app\models\Rekap;

$dataProvider = new ArrayDataProvider([
    'allModels' => $rekap['jenis_ppks_fix'],
    'pagination' => false,
]);
$kecamatan=@Yii::$app->request->queryParams['kecamatan'];
$kecamatan=strtoupper($kecamatan);
$this->title="REKAPITULASI JENIS PPKS KECAMATAN ".$kecamatan;
// Ambil daftar jenis_ppks_fix yang unik dari tabel ppks
$sql = "SELECT DISTINCT jenis_ppks_fix FROM ppks";
$jenisList = Actions::getQuery($sql);

$columns = [
    'kecamatan', // Kolom Kelurahan tetap ditampilkan
];
$columnsExport = [
    'kecamatan', // Kolom Kelurahan tetap ditampilkan
];

foreach ($jenisList as $jenis) {
    $alias = Rekap::formatString($jenis['jenis_ppks_fix']); // Gunakan fungsi formatString dari Rekap
    $columns[] = [
        'attribute' => $alias,
        'label' => $jenis['jenis_ppks_fix'], // Menampilkan label yang lebih rapi
        'format' => 'raw',
        'value' => function ($model) use ($jenis, $alias) {
            return Html::a($model[$alias] ?? 0, [
                'ppks/index',
                'kecamatan' => $model['kecamatan'],
                'jenis_ppks_fix' => $jenis['jenis_ppks_fix']
            ], ['target' => '_blank']);
        }
    ];
    $columnsExport[] = [
        'attribute' => $alias,
        'label' => $jenis['jenis_ppks_fix'], // Menampilkan label yang lebih rapi
    ];
}
?>
<div class="card shadow-sm border-0">
    <div class="card-header bg-navy text-white d-flex align-items-center">
        <i class="fa fa-book text-danger mr-2"></i> <span>REKAPITULASI JENIS PPKS KECAMATAN <?=$kecamatan?></span>
    </div>
    <div class="card-body">
        <ul class="nav nav-tabs" id="rekapTabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="table-tab" data-toggle="tab" href="#table" role="tab" aria-controls="table" aria-selected="true">TABLE</a>
            </li>
             <li class="nav-item">
                <a class="nav-link" id="grafik-tab" data-toggle="tab" href="#grafik" role="tab" aria-controls="grafik" aria-selected="false">GRAFIK</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="presentase-tab" data-toggle="tab" href="#presentase" role="tab" aria-controls="presentase" aria-selected="false">PRESENTASE</a>
            </li>
        </ul>

        <div class="tab-content mt-3" id="rekapTabContent">
            <div class="tab-pane fade show active" id="table" role="tabpanel" aria-labelledby="table-tab">

<?php

// Export Menu
echo ExportMenu::widget([
    'dataProvider' => $dataProvider,
    'columns' => $columnsExport,
    'filename' => 'Data_PPKS_'.$kecamatan,
    'showPageSummary' => true,
]);

// GridView
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => $columns,
    'toolbar' => [
        '{export}',
        '{toggleData}',
    ],
    'responsive' => true,
    'hover' => true,
    'export' => [
        'fontAwesome' => true
    ],
]);
?>
</div>

<div class="tab-pane fade" id="grafik" role="tabpanel" aria-labelledby="grafik-tab">
    <?= $this->render('grafik/grafik_jenis_ppks_kota', ['rekap' => $rekap['jenis_ppks_fix']]) ?>
</div>
<div class="tab-pane fade" id="presentase" role="tabpanel" aria-labelledby="presentase-tab">
    <?= $this->render('presentase/presentase_jenis_ppks_kota', ['rekap' => $rekap['jenis_ppks_fix']]) ?>
</div>

</div>
</div>
</div>
