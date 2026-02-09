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
    'kelurahan', // Kolom Kelurahan tetap ditampilkan
];
$columnsExport = [
    'kelurahan', // Kolom Kelurahan tetap ditampilkan
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
                'kelurahan' => $model['kelurahan'],
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
// Konfigurasi kolom untuk export
// $exportColumns = [
//     // 'kecamatan',
//     'kelurahan',
//     [
//         'attribute' => 'penyandang_disabilitas_non_terlantar',
//         'label' => 'Penyandang Disabilitas (Non Terlantar)',
//     ],
//     [
//         'attribute' => 'warga_miskin',
//         'label' => 'Warga Miskin',
//     ],
//     [
//         'attribute' => 'warga_miskin_tbc',
//         'label' => 'Warga Miskin (TBC)',
//     ],
//     [
//         'attribute' => 'penyandang_disabilitas_terlantar',
//         'label' => 'Penyandang Disabilitas (Terlantar)',
//     ],
//     // Tambahkan semua kolom lainnya sesuai kebutuhan...
// ];

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
    // [
    //     // 'kecamatan',
    //     'kelurahan',
    //     [
    //         'attribute' => 'penyandang_disabilitas_non_terlantar',
    //         'label' => 'Penyandang Disabilitas (Non Terlantar)',
    //         'format' => 'raw',
    //         'value' => function ($model) {
    //             return Html::a($model['penyandang_disabilitas_non_terlantar'], [
    //                 'ppks/index',
    //                 'kecamatan' => $model['kecamatan'],
    //                 'kelurahan' => $model['kelurahan'],
    //                 'jenis_ppks_fix' => 'PENYANDANG DISABILITAS (NON TERLANTAR)'
    //             ], ['target' => '_blank']);
    //         }
    //     ],
    //     [
    //         'attribute' => 'warga_miskin',
    //         'label' => 'Warga Miskin',
    //         'format' => 'raw',
    //         'value' => function ($model) {
    //             return Html::a($model['warga_miskin'], [
    //                 'ppks/index',
    //                 'kecamatan' => $model['kecamatan'],
    //                 'kelurahan' => $model['kelurahan'],
    //                 'jenis_ppks_fix' => 'WARGA MISKIN'
    //             ], ['target' => '_blank']);
    //         }
    //     ],
    //     [
    //         'attribute' => 'warga_miskin_tbc',
    //         'label' => 'Warga Miskin (TBC)',
    //         'format' => 'raw',
    //         'value' => function ($model) {
    //             return Html::a($model['warga_miskin_tbc'], [
    //                 'ppks/index',
    //                 'kecamatan' => $model['kecamatan'],
    //                 'kelurahan' => $model['kelurahan'],
    //                 'jenis_ppks_fix' => 'WARGA MISKIN (TBC)'
    //             ], ['target' => '_blank']);
    //         }
    //     ],
    //     [
    //         'attribute' => 'penyandang_disabilitas_terlantar',
    //         'label' => 'Penyandang Disabilitas (Terlantar)',
    //         'format' => 'raw',
    //         'value' => function ($model) {
    //             return Html::a($model['penyandang_disabilitas_terlantar'], [
    //                 'ppks/index',
    //                 'kecamatan' => $model['kecamatan'],
    //                 'kelurahan' => $model['kelurahan'],
    //                 'jenis_ppks_fix' => 'PENYANDANG DISABILITAS (TERLANTAR)'
    //             ], ['target' => '_blank']);
    //         }
    //     ],
    //     // Tambahkan kolom lainnya sesuai kebutuhan...
    // ],
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
    <?=$this->render('grafik/grafik_jenis_ppks_kecamatan', ['rekap' => $rekap['jenis_ppks_fix']]) ?>
</div>
<div class="tab-pane fade" id="presentase" role="tabpanel" aria-labelledby="presentase-tab">
    <?=$this->render('presentase/presentase_jenis_ppks_kecamatan', ['rekap' => $rekap['jenis_ppks_fix']]) ?>
</div>

</div>
</div>
</div>
