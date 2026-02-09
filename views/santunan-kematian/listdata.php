<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\grid\GridView;
use kartik\export\ExportMenu;
use yii\data\ArrayDataProvider;
use app\models\Users;
use app\models\SantunanKematian;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\models\SejahteraKeluarga2025 */

$this->title = 'Data Santunan Kematian';
$this->params['breadcrumbs'][] = ['label' => 'Santunan Kematian', 'url' => ['listdata']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
// $pre=null;
// if($status=='Selesai'){$pre='selesai';}
// if($status=='Tidak Bisa Intervensi'){$pre='tidak_bisa_intervensi';}
// if($status=='Sedang Proses'){$pre='proses';}
// if($status=='Belum'){$pre='belum';}
// if($status=='Belum Assessment'){$pre='belum_assessment';}
// if($status=='Sudah Assessment'){$pre='sudah_assessment';}

// $dataProvider = new ArrayDataProvider([
//   'allModels' => $model,
// ]);
$action=[
  'attribute'=>'updated',
  'label'=>'Aksi',
  'filter'=>'',
  'format' => 'raw',
  'value' => function ($model) {
    // return '<div class="btn-group">
    //         <a href="javascript:void(0);" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#modalview'.$model->id.'" class="btn btn-success btn-xs"><i class="fa fa-fw fa-search"></i>View</a>
    //         <a href="javascript:void(0);" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#modalverifikasi'.$model->id.'" class="btn btn-danger btn-xs"><i class="fa fa-fw fa-edit"></i>Verifikasi</a>
    //   </div>';               
    //   return '<div class="btn-group">
    //       '.Html::a('<i class="fas fa-fw fa-search"></i>View', ['SantunanKematian/view', 'id' => $model->id], ['class' => 'btn btn-success btn-xs']).'
    //       '.Html::a('<i class="fas fa-fw fa-check-square"></i>Detail', ['SantunanKematian/detail', 'idp3ke' => $model->id], ['class' => 'btn btn-primary btn-xs']).'
    //       '.Html::a('<i class="fas fa-fw fa-file-pdf-o"></i>Pdf V2', ['SantunanKematian/pdf-new', 'idp3ke' => $model->id], ['class' => 'btn btn-danger btn-xs','target' => '_blank']).'
    //     '.Html::a('<i class="fas fa-fw fa-edit"></i>Edit', ['SantunanKematian/edit',  'id' => $model->id, 'kategori' => 'individu'], ['class' => 'btn btn-warning btn-xs']).'
    //   </div>';      
    return '<div class="btn-group">' .
    '<a href="javascript:void(0);" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#modalview' . $model->id . '" class="btn btn-success btn-xs">
        <i class="fa fa-fw fa-search"></i> View
    </a>' .
    (Yii::$app->user->identity->role == 'kelurahan' ? 
    '<a href="javascript:void(0);" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#modalverifikasi' . $model->id . '" class="btn btn-warning btn-xs">
        <i class="fa fa-fw fa-edit"></i> Verifikasi
    </a>' : '') .
    (Yii::$app->user->identity->role == 'kecamatan' ? 
    '<a href="javascript:void(0);" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#modalvalidasi' . $model->id . '" class="btn btn-primary btn-xs">
        <i class="fa fa-fw fa-check"></i> Validasi
    </a>' : '') .
    (Yii::$app->user->identity->role == 'dinsos' ? 
    '<a href="javascript:void(0);" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#modalapproved' . $model->id . '" class="btn btn-danger btn-xs">
        <i class="fa fa-fw fa-thumbs-up"></i> Approved
    </a>' : '') .
'</div>';                                             
  },
];
$export = [
  ['class' => 'kartik\grid\SerialColumn'],
          'id',
          'nama',
          'nik',
          'alamat',
          'rt',
          'rw',
          'kecamatan_nama',
          'kelurahan_nama',
          'status_verifikasi',    
          'status_validasi', 
          'status_approval',
          'approved', 
          'tanggal_verifikasi', 
          'keterangan_verifikasi', 
          'diverifikasi', 
];
$grid = [
  ['class' => 'kartik\grid\SerialColumn'],
          'id',
          'nama',
          'nik',
          'alamat',
          'rt',
          'rw',
        [
            'label' => 'Dokumen',
            'format' => 'raw',
            'value' => function ($model) {
                $dokumen = [
                    'foto_ktp' => 'Foto Ktp',
                    'foto_kk' => 'Foto Kk',
                    'foto_ktp_pemohon' => 'Foto Ktp Pemohon',
                    'foto_kk_pemohon' => 'Foto Kk Pemohon',
                    'foto_sk_kematian' => 'Foto Sk Kematian',
                    'foto_sk_ahli_waris' => 'Foto Sk Ahli Waris',
                    'foto_id_dtks' => 'Foto Id Dtks',
                ];
                $links = [];
                foreach ($dokumen as $field => $label) {
                    if (!empty($model->$field)) {
                        $url = Yii::getAlias('@web') . '/uploads/santunan_kematian/' . ltrim($model->$field, '/');
                        $links[] = Html::a(
                            '<span class="badge badge-warning" style="font-size:12px;"><i class="fa fa-eye"></i> ' . $label . '</span>',
                            $url,
                            ['target' => '_blank', 'style' => 'margin-right:5px;']
                        );
                    }
                }
                return !empty($links) ? implode(' ', $links) : '<span class="text-danger">Tidak ada file</span>';
            }
        ],
        $action,
          'kecamatan_nama',
          'kelurahan_nama', 
          [
            'attribute' => 'status_verifikasi',
            'format' => 'raw',
            'value' => function ($model) {
                $colors = [
                    'Belum' => 'secondary',
                    'Sedang Proses' => 'warning',
                    'Sudah' => 'success',
                    'Ditolak' => 'danger'
                ];
                $status = $model->status_verifikasi ?? 'Unknown';
                $color = $colors[$status] ?? 'dark';
    
                return Html::tag('span', $status, ['class' => "badge badge-$color"]);
            },
        ],
          [
            'attribute' => 'status_validasi',
            'format' => 'raw',
            'value' => function ($model) {
                $colors = [
                    'Belum' => 'secondary',
                    'Sedang Proses' => 'warning',
                    'Sudah' => 'success',
                    'Ditolak' => 'danger'
                ];
                $status = $model->status_validasi ?? 'Unknown';
                $color = $colors[$status] ?? 'dark';
    
                return Html::tag('span', $status, ['class' => "badge badge-$color"]);
            },
        ],
        [
            'attribute' => 'approved',
            'format' => 'raw',
            'value' => function ($model) {
                $colors = [
                    'Belum' => 'secondary',
                     'Sedang Proses' => 'warning',
                    'Sudah' => 'success',
                    'Ditolak' => 'danger'
                ];
                $status = $model->approved ?? 'Unknown';
                $color = $colors[$status] ?? 'dark';
    
                return Html::tag('span', $status, ['class' => "badge badge-$color"]);
            },
        ],
          // 'tanggal_verifikasi', 
          // 'keterangan_verifikasi', 
          // 'diverifikasi', 
          [
            'label'=>'Diverifikasi oleh',
            'attribute'=>'diverifikasi',
            'value' => function ($model) {
                $nama=@Users::find()->where(['username'=>$model->diverifikasi])->one()->nama_lengkap;
                return $nama;
            },
          ],
           [
            'label'=>'Divalidasi oleh',
            'attribute'=>'divalidasi',
            'value' => function ($model) {
                $nama=@Users::find()->where(['username'=>$model->divalidasi])->one()->nama_lengkap;
                return $nama;
            },
          ],
          [
            'label'=>'Diapprove oleh',
            'attribute'=>'approved_by',
            'value' => function ($model) {
                $nama=@Users::find()->where(['username'=>$model->approved_by])->one()->nama_lengkap;
                return $nama;
            },
          ],
        //   'dibuat', 
          [
            'label'=>'Di input oleh',
            'attribute'=>'dibuat',
            'value' => function ($model) {
                $nama=@Users::find()->where(['username'=>$model->dibuat])->one()->nama_lengkap;
                return $nama;
            },
          ],

          

];

?>
<div class="box box-navy box-solid" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
    <div class="box-header bg-navy p-2">
        <i class="fa fa-fw fa-book"></i>
        <strong><?=$this->title?></strong>
    </div>
    <div class="box-body p-2">


    <?php $form = ActiveForm::begin([
            'method' => 'get',
            'action' => ['santunan-kematian/listdata'],
        ]); ?>
 <div class="row">
  <div class="col-md-2">       

    <?php
                        echo ExportMenu::widget([
                            'dataProvider' => $dataProvider,
                            // 'filterModel' => $searchModelKeluarga,
                            'columns' => $export,
                            'filename'=>'data_SantunanKematian',
                        ]);?>


</div>     
        
            <div class="col-md-3 text-right">
                <?= Html::textInput('search', Yii::$app->request->get('search'), [
                    'class' => 'form-control',
                    'placeholder' => 'Cari data (Nama, NIK, Alamat, dll, kecuali status)',
                ]) ?>
            </div>
            <div class="col-md-2 text-right">
                <?= Html::dropDownList('status_verifikasi', Yii::$app->request->get('status_verifikasi'), [
                    '' => 'Status Verifikasi',
                    'Belum' => 'Belum',
                    'Sedang Proses' => 'Sedang Proses',
                    'Sudah' => 'Sudah',
                ], ['class' => 'form-control']) ?>
            </div>
            <div class="col-md-2 text-right">
                <?= Html::dropDownList('status_validasi', Yii::$app->request->get('status_validasi'), [
                    '' => 'Status Validasi',
                    'Belum' => 'Belum',
                    'Sudah' => 'Sudah',
                    'Ditolak' => 'Ditolak',
                ], ['class' => 'form-control']) ?>
            </div>
            <div class="col-md-3 text-right">
                <?= Html::submitButton('Cari', ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Reset', ['santunan-kematian/listdata'], ['class' => 'btn btn-default']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>
        <?php
                        echo GridView::widget([
                            'dataProvider'=> $dataProvider,
                            // 'filterModel' => $searchModelKeluarga,
                            'columns' => $grid,
                            'toolbar'=>[
                                '{toggleData}'
                            ],
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
</div>

<?php
 $data=$dataProvider->getModels();
foreach ($data as $key => $value) { ?>
<div class="modal fade" id="modalview<?=$value->id?>" data-argument="<?=$value->id?>" role="dialog">
    <div class="modal-dialog modal-lg">    
        <div class="modal-content">
            <?= $this->render('_view', [
                'model' => new SantunanKematian(),
                'id' => @$value->id,
            ]) ?>
        </div>
    </div>
 </div>
 <div class="modal fade" id="modalverifikasi<?=$value->id?>" data-argument="<?=$value->id?>" role="dialog">
    <div class="modal-dialog modal-md">    
        <div class="modal-content">
            <?= $this->render('_formverifikasi', [
                'model' => new SantunanKematian(),
                'id' => @$value->id,
            ]) ?>
        </div>
    </div>
 </div>
 <div class="modal fade" id="modalvalidasi<?=$value->id?>" data-argument="<?=$value->id?>" role="dialog">
    <div class="modal-dialog modal-md">    
        <div class="modal-content">
            <?= $this->render('_formvalidasi', [
                'model' => new SantunanKematian(),
                'id' => @$value->id,
            ]) ?>
        </div>
    </div>
 </div>
 <div class="modal fade" id="modalapproved<?=$value->id?>" data-argument="<?=$value->id?>" role="dialog">
    <div class="modal-dialog modal-md">    
        <div class="modal-content">
            <?= $this->render('_formapproved', [
                'model' => new SantunanKematian(),
                'id' => @$value->id,
            ]) ?>
        </div>
    </div>
 </div>
<?php
 }
 ?>