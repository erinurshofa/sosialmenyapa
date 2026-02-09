<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\export\ExportMenu;
use app\models\UsulanBansosKemensos2022;
use app\models\Account;
use app\models\ActionsHelper2022;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $searchModel app\models\UsulanBansosKemensos2022Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Usulan Bansos Kemensos';
$this->params['breadcrumbs'][] = $this->title;
ini_set('precision', '16');
ini_set('memory_limit',-1);
set_time_limit(500);
// $filterkecamatan=ArrayHelper::map(UsulanBansosKemensos2022::find()->select('kecamatan')->distinct()->asArray()->all(), 'kecamatan', 'kecamatan');
// $filterkelurahan=ArrayHelper::map(UsulanBansosKemensos2022::find()->select('kelurahan')->distinct()->asArray()->all(), 'kelurahan', 'kelurahan');
$filterkecamatanpenginput=ArrayHelper::map(UsulanBansosKemensos2022::find()->select('nama_kecamatan')->distinct()->asArray()->all(), 'nama_kecamatan', 'nama_kecamatan');
$roleadmin = array("admin","pfm");
$roleverifikasi = array("kelurahan","kecamatan");
$filterkecamatan='';
$filterkelurahan='';
$kecamatancari=@Yii::$app->request->queryParams['UsulanBansosKemensos2022Search']['kecamatan'];
// (!empty(@$kecamatancari)?@Yii::$app->request->queryParams['UsulanBansosKemensos2022Search']['kecamatan']:'';
$action='';
if (Yii::$app->user->identity->role=='kecamatan') {
    $account=@Account::find()->where(["username"=>@Yii::$app->user->identity->username])->one();
    $kodekecamatan=$account->kode_kecamatan;
    $namakecamatan=@Kecamatan::find()->where(["KodeKecamatan"=>@$kodekecamatan])->one()->Nama;
    $filterkecamatan=ArrayHelper::map(UsulanBansosKemensos2022::find()->where(['kecamatan'=>$namakecamatan])->select('kecamatan')->distinct()->asArray()->all(), 'kecamatan', 'kecamatan');
    $filterkelurahan=ArrayHelper::map(UsulanBansosKemensos2022::find()->where(['kecamatan'=>$namakecamatan])->select('kelurahan')->distinct()->asArray()->all(), 'kelurahan', 'kelurahan');
    $action=[
                'attribute'=>'updated',
                'label'=>'Opsi',
                'filter'=>'',
                'format' => 'raw',
                'value' => function ($model) {
                    return '<div class="btn-group">
                        '.Html::a('<i class="fa fa-fw fa-search"></i>Detail', ['usulan-bansos-kemensos2022/view', 'id' => $model->id], ['class' => 'btn btn-info btn-xs']).'
                        '.Html::a('<i class="fa fa-fw fa-upload"></i>Validasi', ['usulan-bansos-kemensos2022/validasikecamatan', 'id' => $model->id], ['class' => 'btn btn-primary btn-xs']).'
                        '.Html::a('<i class="fa fa-fw fa-upload"></i>Batal Validasi', ['usulan-bansos-kemensos2022/batalvalidasikecamatan', 'id' => $model->id], ['class' => 'btn btn-danger btn-xs']).'
                    </div>';                                                     
                },
            ];
}
if (Yii::$app->user->identity->role=='kelurahan') {
    $account=@Account::find()->where(["username"=>@Yii::$app->user->identity->username])->one();
    $kodekecamatan=$account->kode_kecamatan;
    $kodekelurahan=$account->kode_kelurahan;
    $namakecamatan=@Kecamatan::find()->where(["KodeKecamatan"=>@$kodekecamatan])->one()->Nama;
    $kelurahan=@Actions::getKelurahan($kodekecamatan,$kodekelurahan)["Nama"];
    $filterkecamatan=ArrayHelper::map(UsulanBansosKemensos2022::find()->where(['kecamatan'=>$namakecamatan])->select('kecamatan')->distinct()->asArray()->all(), 'kecamatan', 'kecamatan');
    $filterkelurahan=ArrayHelper::map(UsulanBansosKemensos2022::find()->where(['kelurahan'=>$kelurahan])->select('kelurahan')->distinct()->asArray()->all(), 'kelurahan', 'kelurahan');
    $action=[
                'attribute'=>'updated',
                'label'=>'Opsi',
                'filter'=>'',
                'format' => 'raw',
                'value' => function ($model) {
                    return '<div class="btn-group">
                        '.Html::a('<i class="fa fa-fw fa-search"></i>Detail', ['usulan-bansos-kemensos2022/view', 'id' => $model->id], ['class' => 'btn btn-info btn-xs']).'
                    </div>';                                                     
                },
            ];
}
if(in_array(strtolower(Yii::$app->user->identity->role), $roleadmin)){
    $filterkecamatan=ArrayHelper::map(UsulanBansosKemensos2022::find()->select('kecamatan')->distinct()->asArray()->all(), 'kecamatan', 'kecamatan');
    $filterkelurahan=ArrayHelper::map(UsulanBansosKemensos2022::find()->select('kelurahan')->distinct()->asArray()->all(), 'kelurahan', 'kelurahan');
    if (!empty(@$kecamatancari)) {
        $filterkelurahan=ArrayHelper::map(UsulanBansosKemensos2022::find()->where(['kecamatan'=>@$kecamatancari])->select('kelurahan')->distinct()->asArray()->all(), 'kelurahan', 'kelurahan');    
    }
    $action=[
                'attribute'=>'updated',
                'label'=>'Opsi',
                'filter'=>'',
                'format' => 'raw',
                'value' => function ($model) {
                    return '<div class="btn-group">
                                '.Html::a('<i class="fa fa-fw fa-search"></i>Detail', ['usulan-bansos-kemensos2022/view', 'id' => $model->id], ['class' => 'btn btn-info btn-xs']).'
                                '.Html::a('<i class="fa fa-fw fa-cog"></i>Finalisasi', ['usulan-bansos-kemensos2022/finalisasi', 'id' => $model->id], ['class' => 'btn btn-success btn-xs']).'
                                '.Html::a('<i class="fa fa-fw fa-cog"></i>Edit', ['usulan-bansos-kemensos2022/update', 'id' => $model->id], ['class' => 'btn btn-warning btn-xs']).'
                                '.Html::a('<i class="fa fa-fw fa-trash"></i>Hapus', ['usulan-bansos-kemensos2022/delete', 'id' => $model->id], [
                                            'class' => 'btn btn-danger btn-xs',
                                            'data-confirm' => 'Anda yakin ingin menghapus item ini?',
                                            'data-method'=>'post',
                                    ]).'
                        </div>';
                    },
            ];

}
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
            'disabilitas',
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
            'validasi_kecamatan',
            'kode_kecamatan',
            'nama_kecamatan',
            'finalisasi',
            'created',
            'updated',

];
$gridColumnsVerifikasi = [
            ['class' => 'kartik\grid\SerialColumn'],
            'id',
            'nik',
            'program_bansos',
            'disabilitas',
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
                                    'attribute'=>'validasi_kecamatan',
                                    'label'=>'status verifikasi kecamatan',
                                    'filter'=>['validasi'=>'validasi','batal validasi'=>'batal validasi','belum validasi'=>'belum validasi'],
                                    'format' => 'raw',
                                    'value' => function ($model) {
                                        switch ($model->validasi_kecamatan) {
                                            case 'validasi':
                                                return 'validasi';
                                                break;
                                            case 'batal validasi':
                                                return 'batal validasi';
                                                break;
                                            default:
                                                return 'belum validasi';
                                                break;
                                        }
                                    },
                                        
                                ],
            'kode_kecamatan',
            [
                'label'=>'Kecamatan Petugas',
                'attribute'=>'nama_kecamatan',
                'filter'=>$filterkecamatanpenginput,
                // 'value'=>function($model){
                //     return @$model->nama_kecamatan;
                // },
            ],
            'created',
            'updated',
            $action,
            // [
            //     'attribute'=>'tanggal_lahir',
            //     'label'=>'Opsi',
            //     'filter'=>'',
            //     'format' => 'raw',
            //     'value' => function ($model) {
            //         return '<div class="btn-group">
            //             '.Html::a('<i class="fa fa-fw fa-search"></i>Detail', ['usulan-bansos-kemensos2022/view', 'id' => $model->id], ['class' => 'btn btn-info btn-xs']).'
            //             '.Html::a('<i class="fa fa-fw fa-cog"></i>Validasi', ['usulan-bansos-kemensos2022/validasikecamatan', 'id' => $model->id], ['class' => 'btn btn-success btn-xs']).'
            //             '.Html::a('<i class="fa fa-fw fa-trash"></i>Batal', ['usulan-bansos-kemensos2022/batalvalidasikecamatan', 'id' => $model->id], [
            //                 'class' => 'btn btn-danger btn-xs',
            //                 // 'data-confirm' => 'Anda yakin ingin menolak data ini?',
            //                 // 'data-method'=>'post',
            //                 ]).'
            //         </div>';
                                                
                                                      
            //     },
            // ],
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
                $isi= ActionsHelper2022::cekInputUsulanBansosKemensosBukaatauTutup();
    
                if ($isi=="buka") {
                    $isi="tutup";
                } else{
                    $isi="buka";
                }
                
                
              ?>
              <?= Html::a(strtoupper($isi).' Inputan Usulan Bansos Kemensos', ['bukatutupusulanbansoskemensos', 'isi' => $isi ], ['class' => 'btn bg-navy']) ?>
      <!--   <div class="table-responsive"> -->
  <?php
$gridColumns = [
            ['class' => 'kartik\grid\SerialColumn'],
            // 'id',
            'nik',
            'program_bansos',
            'disabilitas',
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
                                    'attribute'=>'validasi_kecamatan',
                                    'label'=>'Validasi Kecamatan',
                                    'filter'=>['validasi'=>'validasi','batal validasi'=>'batal validasi','belum validasi'=>'belum validasi'],
                                    'format' => 'raw',
                                    'value' => function ($model) {
                                        switch ($model->validasi_kecamatan) {
                                            case 'validasi':
                                                return 'validasi';
                                                break;
                                            case 'batal validasi':
                                                return 'batal validasi';
                                                break;
                                            default:
                                                return 'belum validasi';
                                                break;
                                        }
                                    },
                                        
                                ],
            'kode_kecamatan',
            [
                'label'=>'Kecamatan Petugas',
                'attribute'=>'nama_kecamatan',
                'filter'=>$filterkecamatanpenginput,
                // 'value'=>function($model){
                //     return @$model->kecamatan->Nama;
                // },
            ],
            $action,
            // [
            //     'attribute'=>'tanggal_lahir',
            //     'label'=>'Opsi',
            //     'filter'=>'',
            //     'format' => 'raw',
            //     'value' => function ($model) {
            //                     return '<div class="btn-group">
            //                         '.Html::a('<i class="fa fa-fw fa-search"></i>Detail', ['usulan-bansos-kemensos2022/view', 'id' => $model->id], ['class' => 'btn btn-info btn-xs']).'
            //                         '.Html::a('<i class="fa fa-fw fa-cog"></i>Edit', ['usulan-bansos-kemensos2022/update', 'id' => $model->id], ['class' => 'btn btn-warning btn-xs']).'
            //                         '.Html::a('<i class="fa fa-fw fa-trash"></i>Hapus', ['usulan-bansos-kemensos2022/delete', 'id' => $model->id], [
            //                                     'class' => 'btn btn-danger btn-xs',
            //                                     'data-confirm' => 'Anda yakin ingin menghapus item ini?',
            //                                     'data-method'=>'post',
            //                             ]).'
            //                 </div>';             
            //                 },
            // ],
];

?>
<?php
echo ExportMenu::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => $gridColumnsExportData,
    'filename'=>'data_usulan_bansos_kemensos_februari_2022',
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
  <!-- </div> -->
<?php endif ?>
  

<?php
 $role = array("kelurahan","kecamatan");
?>


<?php if (in_array(strtolower(Yii::$app->user->identity->role), $role)): ?>
        <!-- <div class="table-responsive"> -->
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
<!-- </div> -->
<?php endif ?>
                

                </div>
        </div>
    </div>
</div>

</div>
