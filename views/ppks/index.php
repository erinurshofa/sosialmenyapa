<?php
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use kartik\select2\Select2;
use app\models\Ppks;
use kartik\grid\Gridview;
use kartik\export\ExportMenu;
$this->title = 'Data PPKS (Pemerlu Pelayanan Kesejahteraan Sosial)';
$this->params['breadcrumbs'][] = $this->title;

$kecamatan=@Yii::$app->getRequest()->getQueryParam('kecamatan');
if (empty(@$kecamatan)) {
    $kecamatan=@Yii::$app->request->queryParams['PpksSearch']['kecamatan'];
}
$kelurahan=@Yii::$app->getRequest()->getQueryParam('kelurahan');
if (empty(@$kelurahan)) {
    $kelurahan=@Yii::$app->request->queryParams['PpksSearch']['kelurahan'];
}
$filterkecamatan=ArrayHelper::map(Ppks::find()->select('kecamatan')->distinct()->all(), 'kecamatan', 'kecamatan');
$filterkelurahan=ArrayHelper::map(Ppks::find()->select('kelurahan')->distinct()->all(), 'kelurahan', 'kelurahan');
if (!empty(@$kecamatan)) {
    $filterkelurahan=ArrayHelper::map(Ppks::find()->where(['kecamatan'=>@$kecamatan])->select('kelurahan')->distinct()->asArray()->all(), 'kelurahan', 'kelurahan');       
}
$filterjenisppksfix=ArrayHelper::map(Ppks::find()->select('jenis_ppks_fix')->distinct()->asArray()->all(), 'jenis_ppks_fix', 'jenis_ppks_fix'); 
$gridexport = [
    ['class' => 'kartik\grid\SerialColumn'],
    'nama',
    'nik',
    'jenis_kelamin',
    'alamat:ntext',
    'kecamatan',
    'kelurahan',
    'jenis_ppks_fix',
];

?>
<div class="box box-navy box-solid mt-2" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
    <div class="box-header bg-navy p-2">
        <i class="fa fa-fw fa-book"></i>
        <strong><?=$this->title?></strong>
    </div>
    <div class="box-body p-2">
    <?=Html::a('Input Data PPKS', ['inputdatappks' ], ['class' => 'btn bg-navy'])?>
    <?= ExportMenu::widget([
        'dataProvider' => $dataProvider,
        'columns' => $gridexport,
        'showPageSummary' => true,
        'exportConfig' => [
            ExportMenu::FORMAT_PDF => false, // Hilangkan PDF
            ExportMenu::FORMAT_EXCEL_X => false, // Hilangkan Excel 2007
        ],
    ]);?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'kartik\grid\SerialColumn'],

        // 'id',
        'nama',
        'nik',
        [
            'attribute' => 'jenis_kelamin',
            'filter' => Html::activeDropDownList(
                $searchModel,
                'jenis_kelamin',
                ['LAKI-LAKI' => 'LAKI-LAKI', 'PEREMPUAN' => 'PEREMPUAN'], // Pilihan dropdown
                ['class' => 'form-control', 'prompt' => 'Pilih Jenis Kelamin']
            ),
        ],
        'alamat:ntext',
        // 'rt',
        // 'rw',

        // Tambahkan filter Select2 untuk kecamatan
        [
            'attribute' => 'kecamatan',
            'filter' => Select2::widget([
                'model' => $searchModel,
                'attribute' => 'kecamatan',
                'data' => $filterkecamatan,
                'options' => ['placeholder' => 'Pilih Kecamatan'],
                'pluginOptions' => ['allowClear' => true],
            ]),
        ],

        // Tambahkan filter Select2 untuk kelurahan
        [
            'attribute' => 'kelurahan',
            'filter' => Select2::widget([
                'model' => $searchModel,
                'attribute' => 'kelurahan',
                'data' => $filterkelurahan,
                'options' => ['placeholder' => 'Pilih Kelurahan'],
                'pluginOptions' => ['allowClear' => true],
            ]),
        ],

        // 'tempat_lahir',
        // 'tanggal_lahir',
        [
            'attribute' => 'jenis_ppks_fix',
            'filter' => Select2::widget([
                'model' => $searchModel,
                'attribute' => 'jenis_ppks_fix',
                'data' => $filterjenisppksfix,
                'options' => ['placeholder' => 'Pilih Jenis PPKS'],
                'pluginOptions' => ['allowClear' => true],
            ]),
        ],
        // 'jenis_ppks_fix',
        // [
        //     'attribute'=>'updated_at',
        //     'label'=>'Aksi',
        //     'filter'=>'',
        //     'format' => 'raw',
        //     'value' => function ($model) {
        //         $action='';
        //         if(Yii::$app->user->identity->role == 'admin' || Yii::$app->user->identity->role == 'dinsos'){
        //             return '<div class="btn-group">
        //                 '.Html::a('<i class="fa fa-fw fa-check-square"></i>Detail', ['ppks/view', 'id' => $model->id], ['class' => 'btn btn-primary btn-xs']).'
        //                 '.Html::a('<i class="fa fa-fw fa-edit"></i>Edit', ['ppks/edit', 'id' => $model->id], ['class' => 'btn btn-warning btn-xs']).'
        //                 '.Html::a('<i class="fa fa-fw fa-trash"></i>Hapus', ['ppks/delete', 'id' => $model->id], ['class' => 'btn btn-danger btn-xs']).'
        //             </div>';  
        //         }else{
        //             return '<div class="btn-group">
        //                 '.Html::a('<i class="fa fa-fw fa-check-square"></i>Detail', ['ppks/view', 'id' => $model->id], ['class' => 'btn btn-primary btn-xs']).'
        //                 '.Html::a('<i class="fa fa-fw fa-edit"></i>Edit', ['ppks/edit', 'id' => $model->id], ['class' => 'btn btn-warning btn-xs']).'
        //             </div>';  
        //         }                                               
        //     },
        // ],
        [
            'attribute' => 'updated_at',
            'label' => 'Aksi',
            'filter' => '',
            'format' => 'raw',
            'value' => function ($model) {
                $buttons = '<div class="btn-group">
                    ' . Html::a('<i class="fa fa-fw fa-check-square"></i>Detail', ['ppks/view', 'id' => $model->id], ['class' => 'btn btn-primary btn-xs']) . '
                    ' . Html::a('<i class="fa fa-fw fa-edit"></i>Edit', ['ppks/edit', 'id' => $model->id], ['class' => 'btn btn-warning btn-xs']) . '
                ';
        
                if (Yii::$app->user->identity->role == 'admin' || Yii::$app->user->identity->role == 'dinsos') {
                    $buttons .= Html::a(
                        '<i class="fa fa-fw fa-trash"></i>Hapus',
                        ['ppks/delete', 'id' => $model->id],
                        [
                            'class' => 'btn btn-danger btn-xs',
                            'data-confirm' => 'Apakah Anda yakin ingin menghapus item ini?',
                            'data-method' => 'post', // Menghindari error 405
                        ]
                    );
                }
        
                $buttons .= '</div>';
                return $buttons;
            },
        ],
        
    ],
]); ?>
</div>
</div>