<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\export\ExportMenu;
use app\models\Roles;
use app\models\Kecamatan;
use app\models\Kelurahan;
use yii\helpers\ArrayHelper;

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;


$gridexport = [
    ['class' => 'kartik\grid\SerialColumn'],
    'username',
        'nama_lengkap',
        [
            'label'=>'Role',
            'attribute'=>'role_id',
            'value'=>function($model){
                return @Roles::findOne($model->role_id)->name;
            }
        ],
        [
            'label'=>'Kecamatan',
            'attribute'=>'kecamatan_id',
            'value'=>function($model){
                return @Kecamatan::findOne($model->kecamatan_id)->nama;
            }
        ],
        // 'kecamatan_id',
        [
            'label'=>'Kelurahan',
            'attribute'=>'kelurahan_id',
            'value'=>function($model){
                return @Kelurahan::findOne($model->kelurahan_id)->nama;
            }
        ],
        // 'kecamatan_id',
        // 'kelurahan_id',
];
$filterroles=ArrayHelper::map(Roles::find()->select(['id','name'])->all(), 'id', 'name');
$filterkecamatan=ArrayHelper::map(Kecamatan::find()->select(['id_lama','nama'])->all(), 'id_lama', 'nama');
$filterkelurahan=ArrayHelper::map(Kelurahan::find()->select(['kelurahan_id','nama'])->all(), 'kelurahan_id', 'nama');
// if (!empty(@$kecamatan)) {
//     $filterkelurahan=ArrayHelper::map(Kelurahan::find()->where(['kecamatan'=>@$kecamatan])->select('kelurahan')->asArray()->all(), 'kelurahan', 'kelurahan');       
// }
?>
<div class="box box-navy box-solid" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
    <div class="box-header bg-navy p-2">
        <i class="fa fa-fw fa-book"></i>
        <strong><?=$this->title?></strong>
    </div>
    <div class="box-body p-2">
    <p><?= Html::a('Tambah Pengguna', ['create'], ['class' => 'btn bg-navy']) ?></p>
    <?= ExportMenu::widget([
        'dataProvider' => $dataProvider,
        'columns' => $gridexport,
        'showPageSummary' => true,
        'exportConfig' => [
            ExportMenu::FORMAT_PDF => false, // Hilangkan PDF
            ExportMenu::FORMAT_EXCEL_X => false, // Hilangkan Excel 2007
        ],
    ])?>
<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'kartik\grid\SerialColumn'],
        'username',
        'nama_lengkap',
        [
            'label'=>'Role',
            'attribute'=>'role_id',
            'filter'=>$filterroles,
            'value'=>function($model){
                return @Roles::findOne($model->role_id)->name;
            }
        ],
        // 'role',
        [
            'label'=>'Kecamatan',
            'attribute'=>'kecamatan_id',
            'filter'=>$filterkecamatan,
            'value'=>function($model){
                return @Kecamatan::find()->where(['id_lama'=>$model->kecamatan_id])->one()->nama;
            }
        ],
        // 'kecamatan_id',
        [
            'label'=>'Kelurahan',
            'attribute'=>'kelurahan_id',
            'filter'=>$filterkelurahan,
            'value'=>function($model){
                return @Kelurahan::find()->where(['kelurahan_id'=>$model->kelurahan_id])->one()->nama;
            }
        ],
        // 'kelurahan_id',
        [
            'attribute'=>'updated_at',
            'label'=>'Aksi',
            'filter'=>'',
            'format' => 'raw',
            'value' => function ($model) {
                if(Yii::$app->user->identity->role == 'admin' || Yii::$app->user->identity->role == 'dinsos'){
                    return '<div class="btn-group">
                        '.Html::a('<i class="fa fa-fw fa-check-square"></i>Detail', ['users/view', 'id' => $model->id], ['class' => 'btn btn-primary btn-xs']).'
                        '.Html::a('<i class="fa fa-fw fa-edit"></i>Edit', ['users/edit-profile', 'id' => $model->id], ['class' => 'btn btn-warning btn-xs']).'
                        '.Html::a('<i class="fa fa-fw fa-trash"></i>Hapus', ['users/delete', 'id' => $model->id], ['class' => 'btn btn-danger btn-xs']).'
                    </div>';  
                }                                             
            },
        ],
        // ['class' => 'yii\kartik\ActionColumn'],
    ],
]); ?>
    </div>
</div>

