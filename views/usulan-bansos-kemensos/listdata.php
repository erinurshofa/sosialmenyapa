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
$filterkelurahan=ArrayHelper::map(UsulanBansosKemensos::find()->select('kelurahan')->distinct()->asArray()->all(), 'kelurahan', 'kelurahan');
$filterkecamatanpenginput=ArrayHelper::map(UsulanBansosKemensos::find()->select('nama_kecamatan')->distinct()->asArray()->all(), 'nama_kecamatan', 'nama_kecamatan');

$gridColumnsExportData = [
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
$gridColumnsVerifikasi = [
            ['class' => 'kartik\grid\SerialColumn'],
            'id',
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
                    return @$model->kecamatan->Nama;
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
?>
<div class="usulan_bansos_kemensos-index">

<div class="row">
    <div class="col-md-12">
        <div class="box box-success box-solid">
            <div class="box-header bg-green">
                <i class="fa fa-fw fa-book"></i>
                <strong><?= Html::encode($this->title) ?></strong>
            </div>
                <div class="box-body">

<?php
 $roleadmin = array("admin","pfm");
?>
<?php if (in_array(strtolower(Yii::$app->user->identity->role), $roleadmin)): ?>

              <?= Html::a('Input Usulan Bansos Kemensos', ['inputusulanbansoskemensos'], ['class' => 'btn btn-success']) ?>
              <?php 
                $isi= ActionsHelper::cekInputUsulanBansosKemensosBukaatauTutup();
    
                if ($isi=="buka") {
                    $isi="tutup";
                } else{
                    $isi="buka";
                }
                
                
              ?>
              <?= Html::a(strtoupper($isi).' Inputan Usulan Bansos Kemensos', ['bukatutupusulanbansoskemensos', 'isi' => $isi ], ['class' => 'btn bg-navy']) ?>
        <div class="table-responsive">
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
                    return @$model->kecamatan->Nama;
                },
            ],
                                [
                                    'attribute'=>'tanggal_lahir',
                                    'label'=>'Opsi',
                                    'filter'=>'',
                                    'format' => 'raw',
                                    'value' => function ($model) {
                                                    return '<div class="btn-group">
                                                      '.Html::a('<i class="fa fa-fw fa-search"></i>Detail', ['usulan-bansos-kemensos/view', 'id' => $model->id], ['class' => 'btn btn-info btn-xs']).'
                                                      '.Html::a('<i class="fa fa-fw fa-cog"></i>Edit', ['usulan-bansos-kemensos/update', 'id' => $model->id], ['class' => 'btn btn-warning btn-xs']).'
                                                      '.Html::a('<i class="fa fa-fw fa-trash"></i>Hapus', ['usulan-bansos-kemensos/delete', 'id' => $model->id], [
                                                                  'class' => 'btn btn-danger btn-xs',
                                                                  'data-confirm' => 'Anda yakin ingin menghapus item ini?',
                                                                  'data-method'=>'post',
                                                          ]).'
                                              </div>';
                                                
                                                      
                                              },
                                  ],
];

?>
<?php
echo ExportMenu::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => $gridColumnsExportData,
    'filename'=>'data_usulan_bansos_kemensos',
]);?>
<?php
echo GridView::widget([
    'dataProvider'=> $dataProvider,
    'filterModel' => $searchModel,
    'columns' => $gridColumns,
    'responsive'=>true,
    'hover'=>true,
    'pager' => [
        'options'=>['class'=>'pagination'],   // set clas name used in ui list of pagination
        'prevPageLabel' => 'Previous',   // Set the label for the "previous" page button
        'nextPageLabel' => 'Next',   // Set the label for the "next" page button
        'firstPageLabel'=>'First',   // Set the label for the "first" page button
        'lastPageLabel'=>'Last',    // Set the label for the "last" page button
        'nextPageCssClass'=>'next',    // Set CSS class for the "next" page button
        'prevPageCssClass'=>'prev',    // Set CSS class for the "previous" page button
        'firstPageCssClass'=>'first',    // Set CSS class for the "first" page button
        'lastPageCssClass'=>'last',    // Set CSS class for the "last" page button
        'maxButtonCount'=>10,    // Set maximum number of page buttons that can be displayed
        ],
]);
    ?> 
  </div>
<?php endif ?>
  

<?php
 $role = array("kelurahan","kecamatan");
?>


<?php if (in_array(strtolower(Yii::$app->user->identity->role), $role)): ?>
        <div class="table-responsive">
        <?php
echo ExportMenu::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => $gridColumnsExportData,
    'filename'=>'data_usulan_bansos_kemensos_'.Yii::$app->user->identity->nama_lengkap,
]);?>
<?php
echo GridView::widget([
    'dataProvider'=> $dataProvider,
    'filterModel' => $searchModel,
    'columns' => $gridColumnsVerifikasi,
    'responsive'=>true,
    'hover'=>true,
    'pager' => [
        'options'=>['class'=>'pagination'],   // set clas name used in ui list of pagination
        'prevPageLabel' => 'Previous',   // Set the label for the "previous" page button
        'nextPageLabel' => 'Next',   // Set the label for the "next" page button
        'firstPageLabel'=>'First',   // Set the label for the "first" page button
        'lastPageLabel'=>'Last',    // Set the label for the "last" page button
        'nextPageCssClass'=>'next',    // Set CSS class for the "next" page button
        'prevPageCssClass'=>'prev',    // Set CSS class for the "previous" page button
        'firstPageCssClass'=>'first',    // Set CSS class for the "first" page button
        'lastPageCssClass'=>'last',    // Set CSS class for the "last" page button
        'maxButtonCount'=>10,    // Set maximum number of page buttons that can be displayed
        ],
]);
    ?>
</div>
<?php endif ?>
                

                </div>
        </div>
    </div>
</div>

</div>
