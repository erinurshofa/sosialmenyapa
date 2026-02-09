<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\export\ExportMenu;
use app\models\UsulanDtksKemensos;
use app\models\Account;
use app\models\ActionsHelper;
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
// $filterkelurahan=ArrayHelper::map(UsulanDtksKemensos::find()->select('kelurahan')->distinct()->asArray()->all(), 'KELURAHAN', 'kelurahan');
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
?>
<div class="usulan-dtks-kemensos-index">
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
                //     return $model->kecamatan->Nama;
                // },
            ],
            'created',
            'updated',
            [
                'attribute'=>'finalisasi',
                'label'=>'Finalisasi Dinas Sosial',
                'filter'=>['finalisasi'=>'finalisasi','batal finalisasi'=>'batal finalisasi','belum finalisasi'=>'belum finalisasi'],
                'format' => 'raw',
                'value' => function ($model) {
                    switch ($model->finalisasi) {
                        case 'finalisasi':
                            return 'finalisasi';
                            break;
                        case 'batal finalisasi':
                            return 'batal finalisasi';
                            break;
                        default:
                            return 'belum finalisasi';
                            break;
                    }
                },
            ],
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
$gridColumns2 = [
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
?>
 
<?php
if (in_array(strtolower(Yii::$app->user->identity->role), $roleadmin)) {
    echo ExportMenu::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => $gridColumns2,
    'filename'=>'Data Usulan Dtks Kemensos',
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
