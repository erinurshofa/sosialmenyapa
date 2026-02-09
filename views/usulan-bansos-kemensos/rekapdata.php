<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\export\ExportMenu;
use app\models\UsulanBansosKemensos;
use app\models\Account;
use app\models\ActionsHelper;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsulanBansosKemensosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Usulan Bansos Kemensos';
$this->params['breadcrumbs'][] = $this->title;
ini_set('precision', '16');
ini_set('memory_limit',-1);
set_time_limit(500);
$filterkecamatan=ArrayHelper::map(UsulanBansosKemensos::find()->select('kecamatan')->distinct()->asArray()->all(), 'kecamatan', 'kecamatan');
$filterkelurahan=ArrayHelper::map(UsulanBansosKemensos::find()->select('kelurahan')->distinct()->asArray()->all(), 'KELURAHAN', 'kelurahan');
$filterkecamatanpenginput=ArrayHelper::map(UsulanBansosKemensos::find()->select('nama_kecamatan')->distinct()->asArray()->all(), 'nama_kecamatan', 'nama_kecamatan');
?>
<div class="usulan-bansos-kemensos-index">
<div class="mitem-index">
<div class="row">
  <div class="col-md-12">
    <div class="box box-success box-solid">
    <div class="box-header bg-green">
    <strong><?= Html::encode($this->title) ?></strong>
    </div>
      <div class="box-body">
<?php
$gridColumns = [
['class' => 'kartik\grid\SerialColumn'],
            // 'id',
            'nik',
            'program_bansos',
            'no_kk',
            'nama',
            'tempat_lahir',
            'tanggal_lahir',
            'ibu_kandung',
            'jenis_kelamin',
            'jenis_pekerjaan',
            'status_kawin',
            'alamat',
            'rt',
            'rw',
            'provinsi',
            'kabupaten',
            [
                'attribute'=>'kecamatan',
                'label'=>'KECAMATAN',
                'filter'=>$filterkecamatan,
            ],
            [
                'attribute'=>'kelurahan',
                'label'=>'KELURAHAN',
                'filter'=>$filterkelurahan,
            ],
            [
                'label'=>'Petugas Input',
                'attribute'=>'username',
            ],
            [
                'label'=>'Nama OPD',
                'attribute'=>'username',
                'filter'=>'',
                'value'=>function($model){
                    return Account::find()->where(['username'=>$model->username])->one()->nama_opd;
                },
            ],
            [
                                    'attribute'=>'kecamatan_yg_menyetujui',
                                    'label'=>'status verifikasi kecamatan',
                                    'filter'=>['disetujui'=>'disetujui','ditolak'=>'ditolak','belum verifikasi'=>'belum verifikasi'],
                                    'format' => 'raw',
                                    'value' => function ($model) {
                                        switch ($model->kecamatan_yg_menyetujui) {
                                            case 'disetujui':
                                                return 'disetujui';
                                                break;
                                            case 'ditolak':
                                                return 'ditolak';
                                                break;
                                            default:
                                                return 'belum verifikasi';
                                                break;
                                        }
                                    },
                                        
                                ],
            'kode_kecamatan',
            [
                'label'=>'Kecamatan Petugas',
                'attribute'=>'nama_kecamatan',
                'filter'=>$filterkecamatanpenginput,
                'value'=>function($model){
                    return $model->kecamatan->Nama;
                },
            ],
            'created',
            'updated',
            [
                'attribute'=>'tanggal_lahir',
                'label'=>'Opsi',
                'filter'=>'',
                'format' => 'raw',
                'value' => function ($model) {
                    return '<div class="btn-group">
                        '.Html::a('<i class="fa fa-fw fa-search"></i>Detail', ['usulan-bansos-kemensos/view', 'id' => $model->id], ['class' => 'btn btn-info btn-xs']).'
                        '.Html::a('<i class="fa fa-fw fa-cog"></i>Setujui', ['usulan-bansos-kemensos/setujui', 'id' => $model->id], ['class' => 'btn btn-success btn-xs']).'
                        '.Html::a('<i class="fa fa-fw fa-trash"></i>Tolak', ['usulan-bansos-kemensos/tolak', 'id' => $model->id], [
                            'class' => 'btn btn-danger btn-xs',
                            // 'data-confirm' => 'Anda yakin ingin menolak data ini?',
                            // 'data-method'=>'post',
                            ]).'
                    </div>';
                                                
                                                      
                },
            ],
];
$gridColumns2 = [
['class' => 'kartik\grid\SerialColumn'],
            'id',
            [
                'label'=>'NIK',
                'attribute'=>'nik',
                'format' => 'html',
                'value'=>function($model) { return '\''.$model->nik; }
            ],
            'program_bansos',
            [
                'label'=>'NO KK',
                'attribute'=>'no_kk',
                'format' => 'html',
                'value'=>function($model) { return '\''.$model->no_kk; }
            ],
            'nama',
            'tempat_lahir',
            'tanggal_lahir',
            'ibu_kandung',
            'jenis_kelamin',
            'jenis_pekerjaan',
            'status_kawin',
            'alamat',
            'rt',
            'rw',
            'provinsi',
            'kabupaten',
            'kecamatan',
            'kelurahan',
            'username',
            'kecamatan_yg_menyetujui',
            'kode_kecamatan',
            'nama_kecamatan',
            'created',
            'updated',
            
];
?>
 
<?php
if (@Yii::$app->user->identity->role=='admin') {
    echo ExportMenu::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => $gridColumns2,
    'filename'=>'Data Usulan Bansos Kemensos',
    'exportConfig' => [
    //diserver belum diinstall xml
    ExportMenu::FORMAT_EXCEL_X => false
]
]);
   
}
?>
 </p>
<?php
echo GridView::widget([
    'dataProvider'=> $dataProvider,
    'filterModel' => $searchModel,
    'columns' => $gridColumns,
    'responsive'=>true,
    'hover'=>true,
]);
    ?> 
</div>
</div>
</div>
</div>
</div>


</div>
