<?php
use kartik\grid\GridView;
use kartik\export\ExportMenu;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\data\ArrayDataProvider;
use app\models\Actions;
use app\models\Rekap;

$dataProvider = new ArrayDataProvider([
    'allModels' => $rekap['full_ppks'],
    'pagination' => false,
]);

$kecamatan = strtoupper(@Yii::$app->request->queryParams['kecamatan']);
$this->title = "REKAPITULASI FULL PPKS";

$sql = "SELECT DISTINCT jenis_ppks_fix FROM ppks";
$jenisList = Actions::getQuery($sql);

$rowspan = [];
foreach ($rekap['full_ppks'] as $i => $row) {
    if (!isset($rowspan[$row['kecamatan']])) {
        $rowspan[$row['kecamatan']] = 0;
    }
    $rowspan[$row['kecamatan']]++;
}

$columns = [
    [
        'attribute' => 'kecamatan',
        'label' => 'Kecamatan',
        'format' => 'raw',
        'value' => function ($model, $key, $index) use ($rekap, $rowspan) {
            if ($model['kecamatan'] === 'TOTAL' && $model['kelurahan'] === 'SUBTOTAL') {
                return "TOTAL";
            } elseif ($index === 0 || $rekap['full_ppks'][$index - 1]['kecamatan'] !== $model['kecamatan']) {
                return Html::tag('td', $model['kecamatan'], ['rowspan' => $rowspan[$model['kecamatan']]-1, 'class' => 'align-middle']);
            }elseif($model['kelurahan']=='SUBTOTAL' && $model['kecamatan'] != 'TOTAL'){
                return $model['kecamatan'].' '.'SUBTOTAL';
            }
            return null;
        },
        'contentOptions' => function ($model) {
            $a=[];
            if($model['kelurahan'] === 'SUBTOTAL'){
                $a=['colspan' => 2];
            }else{
                $a=['class' => 'd-none'];
            }
            return $a;
        },
    ],
    [
        'attribute' => 'kelurahan',
        'label' => 'Kelurahan',
        'format' => 'raw',
        'value' => function ($model) {
            return $model['kelurahan'];
        },
        'contentOptions' => function ($model) {
            return ($model['kelurahan'] === 'SUBTOTAL') ? ['class' => 'd-none'] : [];
        },
    ],
];

foreach ($jenisList as $jenis) {
    $alias = Rekap::formatString($jenis['jenis_ppks_fix']);
    $columns[] = [
        'attribute' => $alias,
        'label' => $jenis['jenis_ppks_fix'],
        'format' => 'raw',
        'value' => function ($model) use ($jenis,$alias) {
            return Html::a($model[$alias] ?? 0, [
                'ppks/index',
                'kecamatan' => $model['kecamatan'],
                'kelurahan' => $model['kelurahan'],
                'jenis_ppks_fix' => $jenis['jenis_ppks_fix'],
            ], ['target' => '_blank']);
        },
    ];
}
?>

<div class="card shadow-sm border-0">
    <div class="card-header bg-navy text-white">
        <i class="fa fa-book text-danger mr-2"></i> REKAPITULASI JENIS PPKS KECAMATAN <?= $kecamatan ?>
    </div>
    <div class="card-body">
        <?= ExportMenu::widget([
            'dataProvider' => $dataProvider,
            'columns' => $columns,
            'filename' => 'Data_PPKS_' . $kecamatan,
        ]) ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => $columns,
            'toolbar' => ['{export}', '{toggleData}'],
            'responsive' => true,
            'hover' => true,
            'export' => ['fontAwesome' => true],
        ]) ?>
    </div>
</div>
