<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;
use kartik\grid\GridView;
use kartik\export\ExportMenu;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;
use yii\web\JqueryAsset;
JqueryAsset::register($this);

 $dataProvider = new ArrayDataProvider([
        'allModels' => $rekap['ppks_jenis_pmks_perkecamatan'],
    ]);
use miloschuman\highcharts\HighchartsAsset;
$kecamatan=@Yii::$app->getRequest()->getQueryParam('kecamatan');
?>
      <div class="row">
        <div class="col-md-12">
          <div class="nav-tabs-custom box box-success box-solid">
            <ul class="nav nav-tabs pull-right">
              <li><a href="#tab_1-1" data-toggle="tab">PRESENTASE</a></li>
              <li><a href="#tab_2-2" data-toggle="tab">GRAFIK</a></li>
              <li class="active"><a href="#tab_3-2" data-toggle="tab">TABLE</a></li>
              <li class="pull-left header text-blue"><i class="fa fa-book text-red"></i> REKAPITULASI KK PER KELURAHAN KECAMATAN <?=$kecamatan?></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane" id="tab_1-1">
                 <?php 
            //      $this->render('presentase/presentase_jenis_pmks_kecamatan', [
				    //     'rekap' => $rekap,
				    // ]) ?>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2-2">
                 <?php 
          //        $this->render('grafik/grafik_jenis_pmks_kecamatan', [
			    //     'rekap' => $rekap,
			    // ]) ?>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane active" id="tab_3-2">
               <?php 
       //         $this->render('table/table_kk', [
			    //     'kkperkelurahan' => $kkperkelurahan,
			    // ]) 
          ?>

<?php
$gridColumns = [
    ['class' => 'kartik\grid\SerialColumn'],
            [
              'label'=>'Kecamatan',
              'attribute'=>'kecamatan',
              'pageSummary' => 'TOTAL',
              'format' => 'html',
              'value' => function ($model) {
                             return $model['kecamatan'];
                         },
            ],
            // [
            //   'label'=>'Jumlah KK',
            //   'attribute'=>'kk',
            //   'hAlign' => 'right',
            //   'format'=>'decimal',
            //    'pageSummary' => Html::a('<font color="blue"><b>'.DtksMaret2022Dtks::find()->where(['kecamatan'=>$kecamatan])->groupBy('nokk')->count().'</b></font>', Url::to(['dtks-maret2022-dtks/index','kk'=>'ada','kecamatan'=>$kecamatan])),
            //   'format' => 'html',
            //   'value' => function ($model) {
            //                 $hasil=Html::a('<font color="blue"><b>'.$model['kk'].'</b></font>', Url::to(['dtks-maret2022-dtks/index','kk'=>'ada','kelurahan'=>@$model['kelurahan']]));
            //                 if (empty($model['kelurahan'])) {
            //                   $hasil=Html::a('<font color="blue"><b>'.$model['kk'].'</b></font>', Url::to(['dtks-maret2022-dtks/index','kk'=>'ada','kecamatan'=>@$model['kecamatan'],'kelurahan'=>'null'])); 
            //                 }
            //                 return $hasil;
            //              },
            // ],
];
// if (@Yii::$app->user->identity->role='kelurahan') {
//   $gridColumns = [
//     ['class' => 'kartik\grid\SerialColumn'],
//             [
//               'label'=>'Kelurahan',
//               'attribute'=>'kelurahan',
//               'pageSummary' => 'TOTAL',
//               'format' => 'html',
//               'value' => function ($model) {
//                              return $model['kelurahan'];
//                          },
//             ],
//             // [
//             //   'label'=>'Jumlah KK',
//             //   'attribute'=>'kk',
//             //   'hAlign' => 'right',
//             //   'format'=>'decimal',
//             //    'pageSummary' => DtksMaret2022Dtks::find()->where(['kecamatan'=>$kecamatan])->groupBy('nokk')->count(),
//             //   'format' => 'html',
//             //   'value' => function ($model) {
//             //                     $account=@Account::find()->where(["username"=>@Yii::$app->user->identity->username])->one();
//             //                     $kodekecamatan=$account['kode_kecamatan'];
//             //                     $kodekelurahan=$account['kode_kelurahan'];
//             //                     $kecamatan=@Kecamatan::find()->where(["KodeKecamatan"=>@$kodekecamatan])->one()->Nama;
//             //                     $kelurahan=@Actions::getKelurahan($kodekecamatan,$kodekelurahan)["Nama"];
//             //                     $hasil="";
//             //                     if (empty($model['kelurahan'])) {
//             //                       $hasil=Html::a('<font color="blue"><b>'.$model['kk'].'</b></font>', Url::to(['dtks-maret2022-dtks/index','kk'=>'ada','kecamatan'=>@$model['kecamatan'],'kelurahan'=>'null'])); 
//             //                     }else if($model['kelurahan']==strtoupper($kelurahan)){
//             //                       $hasil=Html::a('<font color="blue"><b>'.$model['kk'].'</b></font>', Url::to(['dtks-maret2022-dtks/index','kk'=>'ada','kelurahan'=>@$model['kelurahan']]));
//             //                     }else{
//             //                       $hasil=$model['kk'];  
//             //                     }
//             //                 return $hasil;
//             //              },
//             // ],
// ];
// }
// if (null!==Dokumen::find()->where(['username'=>@Yii::$app->user->identity->username])->andWhere(['status'=>'diterima'])->one()) {
  echo ExportMenu::widget([
    'dataProvider' => $dataProvider,
    'columns' => $gridColumns,
    'showPageSummary' => true,

]);
// }
// if (null==Dokumen::find()->where(['username'=>@Yii::$app->user->identity->username])->andWhere(['status'=>'diterima'])->one()) {
  //   echo 'Download CSV Belum diperbolehkan karena belum upload permohonan yang terkonfirmasi';
  // }
echo GridView::widget([
    'dataProvider'=> $dataProvider,
    'columns' => $gridColumns,
    'responsive'=>true,
    'hover'=>true,
    'showPageSummary' => true,
]);
?>

              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
<?php //$this->registerJsFile('https://highcharts.github.io/export-csv/export-csv.js', ['depends' => HighchartsAsset::className()])?>
