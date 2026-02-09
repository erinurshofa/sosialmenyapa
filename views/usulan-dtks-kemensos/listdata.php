<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\export\ExportMenu;
use app\models\UsulanDtksKemensos;
use app\models\Kecamatan;
use app\models\Actions;
use app\models\Account;
use app\models\ActionsHelper2023;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $searchModel app\models\UsulanDtksKemensosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Usulan Dtks Kemensos';
$this->params['breadcrumbs'][] = $this->title;
ini_set('precision', '16');
ini_set('memory_limit',-1);
set_time_limit(500);
// $filterkecamatan=ArrayHelper::map(UsulanDtksKemensos::find()->select('kecamatan')->distinct()->asArray()->all(), 'kecamatan', 'kecamatan');
// $filterkelurahan=ArrayHelper::map(UsulanDtksKemensos::find()->select('kelurahan')->distinct()->asArray()->all(), 'kelurahan', 'kelurahan');
$filterkecamatanpenginput=ArrayHelper::map(UsulanDtksKemensos::find()->select('nama_kecamatan')->distinct()->asArray()->all(), 'nama_kecamatan', 'nama_kecamatan');
$roleadmin = array("superadmin","admin","pfm");
$roleverifikasi = array("kelurahan","kecamatan");
$filterkecamatan='';
$filterkelurahan='';
$kecamatancari=@Yii::$app->request->queryParams['UsulanDtksKemensosSearch']['kecamatan'];
// (!empty(@$kecamatancari)?@Yii::$app->request->queryParams['UsulanDtksKemensosSearch']['kecamatan']:'';
$action='';
if (Yii::$app->user->identity->role=='kecamatan') {
    $account=@Account::find()->where(["username"=>@Yii::$app->user->identity->username])->one();
    $kodekecamatan=$account->kode_kecamatan;
    $namakecamatan=@Kecamatan::find()->where(["KodeKecamatan"=>@$kodekecamatan])->one()->Nama;
    $filterkecamatan=ArrayHelper::map(UsulanDtksKemensos::find()->where(['kecamatan'=>$namakecamatan])->select('kecamatan')->distinct()->asArray()->all(), 'kecamatan', 'kecamatan');
    $filterkelurahan=ArrayHelper::map(UsulanDtksKemensos::find()->where(['kecamatan'=>$namakecamatan])->select('kelurahan')->distinct()->asArray()->all(), 'kelurahan', 'kelurahan');
    $action=[
                'attribute'=>'updated',
                'label'=>'Opsi',
                'filter'=>'',
                'format' => 'raw',
                'value' => function ($model) {
                    return '<div class="btn-group">
                        '.Html::a('<i class="fa fa-fw fa-search"></i>Detail', ['usulan-dtks-kemensos/view', 'id' => $model->id], ['class' => 'btn btn-info btn-xs']).'
                        '.Html::a('<i class="fa fa-fw fa-upload"></i>Validasi', ['usulan-dtks-kemensos/validasikecamatan', 'id' => $model->id], ['class' => 'btn btn-primary btn-xs']).'
                        '.Html::a('<i class="fa fa-fw fa-upload"></i>Batal Validasi', ['usulan-dtks-kemensos/batalvalidasikecamatan', 'id' => $model->id], ['class' => 'btn btn-danger btn-xs']).'
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
    $filterkecamatan=ArrayHelper::map(UsulanDtksKemensos::find()->where(['kecamatan'=>$namakecamatan])->select('kecamatan')->distinct()->asArray()->all(), 'kecamatan', 'kecamatan');
    $filterkelurahan=ArrayHelper::map(UsulanDtksKemensos::find()->where(['kelurahan'=>$kelurahan])->select('kelurahan')->distinct()->asArray()->all(), 'kelurahan', 'kelurahan');
    $action=[
                'attribute'=>'updated',
                'label'=>'Opsi',
                'filter'=>'',
                'format' => 'raw',
                'value' => function ($model) {
                    return '<div class="btn-group">
                        '.Html::a('<i class="fa fa-fw fa-search"></i>Detail', ['usulan-dtks-kemensos/view', 'id' => $model->id], ['class' => 'btn btn-info btn-xs']).'
                    </div>';                                                     
                },
            ];
}
if(in_array(strtolower(Yii::$app->user->identity->role), $roleadmin)){
    $filterkecamatan=ArrayHelper::map(UsulanDtksKemensos::find()->select('kecamatan')->distinct()->asArray()->all(), 'kecamatan', 'kecamatan');
    $filterkelurahan=ArrayHelper::map(UsulanDtksKemensos::find()->select('kelurahan')->distinct()->asArray()->all(), 'kelurahan', 'kelurahan');
    if (!empty(@$kecamatancari)) {
        $filterkelurahan=ArrayHelper::map(UsulanDtksKemensos::find()->where(['kecamatan'=>@$kecamatancari])->select('kelurahan')->distinct()->asArray()->all(), 'kelurahan', 'kelurahan');    
    }
    $action=[
                'attribute'=>'updated',
                'label'=>'Opsi',
                'filter'=>'',
                'format' => 'raw',
                'value' => function ($model) {
                    return '<div class="btn-group">
                                '.Html::a('<i class="fa fa-fw fa-search"></i>Detail', ['usulan-dtks-kemensos/view', 'id' => $model->id], ['class' => 'btn btn-info btn-xs']).'
                                '.Html::a('<i class="fa fa-fw fa-cog"></i>Finalisasi', ['usulan-dtks-kemensos/finalisasi', 'id' => $model->id], ['class' => 'btn btn-success btn-xs']).'
                                '.Html::a('<i class="fa fa-fw fa-cog"></i>Edit', ['usulan-dtks-kemensos/update', 'id' => $model->id], ['class' => 'btn btn-warning btn-xs']).'
                                '.Html::a('<i class="fa fa-fw fa-trash"></i>Hapus', ['usulan-dtks-kemensos/delete', 'id' => $model->id], [
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
            // 'program_bansos',
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
            'hubungan_keluarga',
            'alamat',
            'rt',
            'rw',
            'provinsi',
            'kabupaten',
            'kecamatan',
            'kelurahan',
            'non_bansos',
            'status_non_bansos',
            'alasan_non_bansos',
            'pkh',
            'status_pkh',
            'alasan_pkh',
            'bsp',
            'status_bsp',
            'alasan_bsp',
            'pbi',
            'status_pbi',
            'alasan_pbi',
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
            // 'id',
            'nik',
            [
                'attribute'=>'ktp',
                'format' => 'raw',
                'value' => function ($model) {
                             return Html::a($model->ktp_name, ['usulan-dtks-kemensos/image','id'=>$model->id,'type'=>$model->ktp_type,'name'=>$model->ktp_name,'isi'=>'ktp'], ['class'=>'label btn-danger'],['target'=>"_blank"]);
                           },
            ],
            [
                'attribute'=>'foto_rumah',
                'format' => 'html',
                'value' => function ($model) {
                             return Html::a($model->foto_rumah_name, ['usulan-dtks-kemensos/image','id'=>$model->id,'type'=>$model->foto_rumah_type,'name'=>$model->foto_rumah_name,'isi'=>'foto_rumah'], ['class'=>'label btn-warning','target'=>"_blank"]);
                           },
            ],
            [
                'attribute'=>'berita_acara_muskel',
                'format' => 'html',
                'value' => function ($model) {
                             return Html::a($model->berita_acara_muskel_name, ['usulan-dtks-kemensos/image','id'=>$model->id,'type'=>$model->berita_acara_muskel_type,'name'=>$model->berita_acara_muskel_name,'isi'=>'berita_acara_muskel'], ['class'=>'label btn-success','target'=>"_blank"]);
                           },
            ],
            // 'program_bansos',
            'disabilitas',
            'no_kk',
            'nama',
            'tempat_lahir',
            'tanggal_lahir',
            'ibu_kandung',
            'jenis_kelamin',
            'jenis_pekerjaan',
            'status_kawin',
            'hubungan_keluarga',
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
            'non_bansos',
            'status_non_bansos',
            'alasan_non_bansos',
            'pkh',
            'status_pkh',
            'alasan_pkh',
            'bsp',
            'status_bsp',
            'alasan_bsp',
            'pbi',
            'status_pbi',
            'alasan_pbi',
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
            //             '.Html::a('<i class="fa fa-fw fa-search"></i>Detail', ['usulan-dtks-kemensos/view', 'id' => $model->id], ['class' => 'btn btn-info btn-xs']).'
            //             '.Html::a('<i class="fa fa-fw fa-cog"></i>Validasi', ['usulan-dtks-kemensos/validasikecamatan', 'id' => $model->id], ['class' => 'btn btn-success btn-xs']).'
            //             '.Html::a('<i class="fa fa-fw fa-trash"></i>Batal', ['usulan-dtks-kemensos/batalvalidasikecamatan', 'id' => $model->id], [
            //                 'class' => 'btn btn-danger btn-xs',
            //                 // 'data-confirm' => 'Anda yakin ingin menolak data ini?',
            //                 // 'data-method'=>'post',
            //                 ]).'
            //         </div>';
                                                
                                                      
            //     },
            // ],
];
?>
<div class="usulan-dtks-kemensos-index">

<div class="row">
    <div class="col-md-12">
        <div class="box box-success box-solid">
            <div class="box-header bg-green">
                <i class="fa fa-fw fa-book"></i>
                <strong><?= Html::encode($this->title) ?></strong>
            </div>
                <div class="box-body">

<?php
 //$roleadmin = array("admin","pfm");
?>
<?php if (in_array(strtolower(Yii::$app->user->identity->role), $roleadmin)): ?>

              <?= Html::a('Input Usulan Dtks Kemensos', ['inputusulandtkskemensos'], ['class' => 'btn btn-success']) ?>
              <?php 
                $isi= ActionsHelper2023::cekInputUsulanDtksKemensosBukaatauTutup();
    
                if ($isi=="buka") {
                    $isi="tutup";
                } else{
                    $isi="buka";
                }
                
                
              ?>
              <?= Html::a(strtoupper($isi).' Inputan Usulan Dtks Kemensos', ['bukatutupusulandtkskemensos', 'isi' => $isi ], ['class' => 'btn bg-navy']) ?>
      <!--   <div class="table-responsive"> -->
  <?php
$gridColumns = [
            ['class' => 'kartik\grid\SerialColumn'],
            // 'id',
            'nik',
            [
                'attribute'=>'ktp',
                'format' => 'raw',
                'value' => function ($model) {
                             return Html::a($model->ktp_name, ['usulan-dtks-kemensos/image','id'=>$model->id,'type'=>$model->ktp_type,'name'=>$model->ktp_name,'isi'=>'ktp'], ['class'=>'label btn-danger'],['target'=>"_blank"]);
                           },
            ],
            [
                'attribute'=>'foto_rumah',
                'format' => 'html',
                'value' => function ($model) {
                             return Html::a($model->foto_rumah_name, ['usulan-dtks-kemensos/image','id'=>$model->id,'type'=>$model->foto_rumah_type,'name'=>$model->foto_rumah_name,'isi'=>'foto_rumah'], ['class'=>'label btn-warning','target'=>"_blank"]);
                           },
            ],
            [
                'attribute'=>'berita_acara_muskel',
                'format' => 'html',
                'value' => function ($model) {
                             return Html::a($model->berita_acara_muskel_name, ['usulan-dtks-kemensos/image','id'=>$model->id,'type'=>$model->berita_acara_muskel_type,'name'=>$model->berita_acara_muskel_name,'isi'=>'berita_acara_muskel'], ['class'=>'label btn-success','target'=>"_blank"]);
                           },
            ],
            // 'program_bansos',
            'disabilitas',
            'no_kk',
            'nama',
            'tempat_lahir',
            'tanggal_lahir',
            'ibu_kandung',
            'jenis_kelamin',
            'jenis_pekerjaan',
            'status_kawin',
            'hubungan_keluarga',
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
            'non_bansos',
            'status_non_bansos',
            'alasan_non_bansos',
            'pkh',
            'status_pkh',
            'alasan_pkh',
            'bsp',
            'status_bsp',
            'alasan_bsp',
            'pbi',
            'status_pbi',
            'alasan_pbi',
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
            //                         '.Html::a('<i class="fa fa-fw fa-search"></i>Detail', ['usulan-dtks-kemensos/view', 'id' => $model->id], ['class' => 'btn btn-info btn-xs']).'
            //                         '.Html::a('<i class="fa fa-fw fa-cog"></i>Edit', ['usulan-dtks-kemensos/update', 'id' => $model->id], ['class' => 'btn btn-warning btn-xs']).'
            //                         '.Html::a('<i class="fa fa-fw fa-trash"></i>Hapus', ['usulan-dtks-kemensos/delete', 'id' => $model->id], [
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
    'filename'=>'data_usulan_dtks_kemensos',
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
    'filename'=>'data_usulan_dtks_kemensos_'.Yii::$app->user->identity->nama_lengkap,
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
