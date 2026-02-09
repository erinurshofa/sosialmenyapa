<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;
use kartik\grid\GridView;
use kartik\export\ExportMenu;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;
use miloschuman\highcharts\HighchartsAsset;
use app\models\DtksMaret2022Dtks;
use app\models\Kecamatan;
use app\models\Account;
use app\models\Actions;
use app\models\Dokumen;

 $dataProvider = new ArrayDataProvider([
        'allModels' => $lansiaperkelurahan['lansiaperkelurahan'],
    ]);
$kecamatan=@Yii::$app->getRequest()->getQueryParam('kecamatan');
?>
      <div class="row">
        <div class="col-md-12">
          <div class="nav-tabs-custom box box-success box-solid">
            <ul class="nav nav-tabs pull-right">
              <li><a href="#tab_1-1" data-toggle="tab">PRESENTASE</a></li>
              <li><a href="#tab_2-2" data-toggle="tab">GRAFIK</a></li>
              <li class="active"><a href="#tab_3-2" data-toggle="tab">TABLE</a></li>
              <li class="pull-left header text-blue"><i class="fa fa-book text-red"></i> REKAPITULASI LANSIA PER KELURAHAN kelurahan <?=$kecamatan?></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane" id="tab_1-1">
                 <?= $this->render('presentase/presentase_lansiaperkelurahan', [
				        'lansiaperkelurahan' => $lansiaperkelurahan,
				    ]) ?>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2-2">
                 <?= $this->render('grafik/grafik_lansiaperkelurahan', [
			        'lansiaperkelurahan' => $lansiaperkelurahan,
			    ]) ?>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane active" id="tab_3-2">
               <?php 
       //         $this->render('table/table_lansia', [
			    //     'lansia' => $lansia,
			    // ]) 

$gridColumns = [
    ['class' => 'kartik\grid\SerialColumn'],
            [
              'label'=>'KELURAHAN',
              'attribute'=>'kelurahan',
              'pageSummary'=>'Total',
              'format' => 'html',
              'value' => function ($model) {
                            
                            return $model['kelurahan'];
                         },
            ],
             [
              'label'=>'Lansia Laki-Laki dan Perempuan',
              'attribute'=>'semua',
              'hAlign' => 'right',
              'pageSummary' => true,
              'pageSummary' => Html::a('<font color="orange"><b>'.DtksMaret2022Dtks::find()->where("TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) >= 60")->count().'</b></font>', Url::to(['dtks-maret2022-dtks/index', 'lansia'=>'semua'])),
              // 'pageSummaryOptions' => ['class' =>'text-red'],
              'format' => 'raw',
              'value' => function ($model) {
                          $hasil=Html::a('<font color="orange"><b>'.$model['semua'].'</b></font>', Url::to(['dtks-maret2022-dtks/index','lansia'=>'semua','kelurahan'=>$model['kelurahan']]));
                          if (empty($model['kelurahan'])) {
                              $hasil=Html::a('<font color="orange"><b>'.$model['semua'].'</b></font>', Url::to(['dtks-maret2022-dtks/index','lansia'=>'semua','kecamatan'=>$model['kecamatan'],'kelurahan'=>'null'])); 
                            }
                          return $hasil;
                         },
            ],
            [
              'label'=>'Lansia Laki-Laki',
              'attribute'=>'lansiapria',
              'hAlign' => 'right',
              'format'=>'decimal',
              'pageSummary' => true,
              'pageSummary' => Html::a('<font color="red"><b>'.DtksMaret2022Dtks::find()->where("TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) >= 60 and jenis_kelamin = 'Laki-laki'")->count().'</b></font>', Url::to(['dtks-maret2022-dtks/index', 'lansia'=>'lansiapria'])),
              'format' => 'html',
              'value' => function ($model) {
                         $hasil=Html::a('<font color="red"><b>'.$model['lansiapria'].'</b></font>', Url::to(['dtks-maret2022-dtks/index','lansia'=>'lansiapria','kelurahan'=>$model['kelurahan']]));
                          if (empty($model['kelurahan'])) {
                              $hasil=Html::a('<font color="red"><b>'.$model['lansiapria'].'</b></font>', Url::to(['dtks-maret2022-dtks/index','lansia'=>'lansiapria','kecamatan'=>$model['kecamatan'],'kelurahan'=>'null'])); 
                            }
                          return $hasil;
                         },
            ],
            [
              'label'=>'Lansia Perempuan',
              'attribute'=>'lansiaperempuan',
              'hAlign' => 'right',
              'pageSummary' => true,
              'pageSummary' => Html::a('<font color="blue"><b>'.DtksMaret2022Dtks::find()->where("TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) >= 60 and jenis_kelamin = 'Perempuan'")->count().'</b></font>', Url::to(['dtks-maret2022-dtks/index', 'lansia'=>'lansiaperempuan'])),
              'format' => 'html',
              'value' => function ($model) {
                            $hasil=Html::a('<font color="blue"><b>'.$model['lansiaperempuan'].'</b></font>', Url::to(['dtks-maret2022-dtks/index','lansia'=>'lansiaperempuan','kelurahan'=>$model['kelurahan']]));
                            if (empty($model['kelurahan'])) {
                              $hasil=Html::a('<font color="blue"><b>'.$model['lansiaperempuan'].'</b></font>', Url::to(['dtks-maret2022-dtks/index','lansia'=>'lansiaperempuan','kecamatan'=>$model['kecamatan'],'kelurahan'=>'null'])); 
                            }
                            return $hasil;
                         },
            ],
];
if (@Yii::$app->user->identity->role='kelurahan') {
  $gridColumns = [
    ['class' => 'kartik\grid\SerialColumn'],
            [
              'label'=>'KELURAHAN',
              'attribute'=>'kelurahan',
              'pageSummary'=>'Total',
              'format' => 'html',
              'value' => function ($model) {
                            
                            return $model['kelurahan'];
                         },
            ],
             [
              'label'=>'Lansia Laki-Laki dan Perempuan',
              'attribute'=>'semua',
              'hAlign' => 'right',
              'pageSummary' => true,
              'pageSummary' => DtksMaret2022Dtks::find()->where("TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) >= 60")->count(),
              'format' => 'raw',
              'value' => function ($model) {
                          $account=@Account::find()->where(["username"=>@Yii::$app->user->identity->username])->one();
                          $kodekecamatan=$account['kode_kecamatan'];
                          $kodekelurahan=$account['kode_kelurahan'];
                          $kecamatan=@Kecamatan::find()->where(["KodeKecamatan"=>@$kodekecamatan])->one()->Nama;
                          $kelurahan=@Actions::getKelurahan($kodekecamatan,$kodekelurahan)["Nama"];
                          $hasil="";
                          if (empty($model['kelurahan'])) {
                            $hasil=Html::a('<font color="orange"><b>'.$model['semua'].'</b></font>', Url::to(['dtks-maret2022-dtks/index','lansia'=>'semua','kecamatan'=>@$model['kecamatan'],'kelurahan'=>'null'])); 
                          }else if($model['kelurahan']==strtoupper($kelurahan)){
                            $hasil=Html::a('<font color="orange"><b>'.$model['semua'].'</b></font>', Url::to(['dtks-maret2022-dtks/index','lansia'=>'semua','kelurahan'=>@$model['kelurahan']]));
                          }else{
                            $hasil=$model['semua'];  
                          }
                          // $hasil=Html::a('<font color="orange"><b>'.$model['semua'].'</b></font>', Url::to(['dtks-maret2022-dtks/index','lansia'=>'semua','kelurahan'=>$model['kelurahan']]));
                          // if (empty($model['kelurahan'])) {
                          //     $hasil=Html::a('<font color="orange"><b>'.$model['semua'].'</b></font>', Url::to(['dtks-maret2022-dtks/index','lansia'=>'semua','kecamatan'=>$model['kecamatan'],'kelurahan'=>'null'])); 
                          //   }
                          return $hasil;
                         },
            ],
            [
              'label'=>'Lansia Laki-Laki',
              'attribute'=>'lansiapria',
              'hAlign' => 'right',
              'format'=>'decimal',
              'pageSummary' => true,
              'pageSummary' => DtksMaret2022Dtks::find()->where("TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) >= 60 and jenis_kelamin = 'Laki-laki'")->count(),
              'format' => 'html',
              'value' => function ($model) {
                         $account=@Account::find()->where(["username"=>@Yii::$app->user->identity->username])->one();
                                $kodekecamatan=$account['kode_kecamatan'];
                                $kodekelurahan=$account['kode_kelurahan'];
                                $kecamatan=@Kecamatan::find()->where(["KodeKecamatan"=>@$kodekecamatan])->one()->Nama;
                                $kelurahan=@Actions::getKelurahan($kodekecamatan,$kodekelurahan)["Nama"];
                                $hasil="";
                                if (empty($model['kelurahan'])) {
                                  $hasil=Html::a('<font color="red"><b>'.$model['lansiapria'].'</b></font>', Url::to(['dtks-maret2022-dtks/index','lansia'=>'lansiapria','kecamatan'=>@$model['kecamatan'],'kelurahan'=>'null'])); 
                                }else if($model['kelurahan']==strtoupper($kelurahan)){
                                  $hasil=Html::a('<font color="red"><b>'.$model['lansiapria'].'</b></font>', Url::to(['dtks-maret2022-dtks/index','lansia'=>'lansiapria','kelurahan'=>@$model['kelurahan']]));
                                }else{
                                  $hasil=$model['lansiapria'];  
                                }
                         // $hasil=Html::a('<font color="red"><b>'.$model['lansiapria'].'</b></font>', Url::to(['dtks-maret2022-dtks/index','lansia'=>'lansiapria','kelurahan'=>$model['kelurahan']]));
                         //  if (empty($model['kelurahan'])) {
                         //      $hasil=Html::a('<font color="red"><b>'.$model['lansiapria'].'</b></font>', Url::to(['dtks-maret2022-dtks/index','lansia'=>'lansiapria','kecamatan'=>$model['kecamatan'],'kelurahan'=>'null'])); 
                         //    }
                          return $hasil;
                         },
            ],
            [
              'label'=>'Lansia Perempuan',
              'attribute'=>'lansiaperempuan',
              'hAlign' => 'right',
              'pageSummary' => true,
              'pageSummary' => DtksMaret2022Dtks::find()->where("TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) >= 60 and jenis_kelamin = 'Perempuan'")->count(),
              'format' => 'html',
              'value' => function ($model) {
                            $account=@Account::find()->where(["username"=>@Yii::$app->user->identity->username])->one();
                                $kodekecamatan=$account['kode_kecamatan'];
                                $kodekelurahan=$account['kode_kelurahan'];
                                $kecamatan=@Kecamatan::find()->where(["KodeKecamatan"=>@$kodekecamatan])->one()->Nama;
                                $kelurahan=@Actions::getKelurahan($kodekecamatan,$kodekelurahan)["Nama"];
                                $hasil="";
                                if (empty($model['kelurahan'])) {
                                  $hasil=Html::a('<font color="blue"><b>'.$model['lansiaperempuan'].'</b></font>', Url::to(['dtks-maret2022-dtks/index','lansia'=>'lansiaperempuan','kecamatan'=>@$model['kecamatan'],'kelurahan'=>'null'])); 
                                }else if($model['kelurahan']==strtoupper($kelurahan)){
                                  $hasil=Html::a('<font color="blue"><b>'.$model['lansiaperempuan'].'</b></font>', Url::to(['dtks-maret2022-dtks/index','lansia'=>'lansiaperempuan','kelurahan'=>@$model['kelurahan']]));
                                }else{
                                  $hasil=$model['lansiaperempuan'];  
                                }
                            // $hasil=Html::a('<font color="blue"><b>'.$model['lansiaperempuan'].'</b></font>', Url::to(['dtks-maret2022-dtks/index','lansia'=>'lansiaperempuan','kelurahan'=>$model['kelurahan']]));
                            // if (empty($model['kelurahan'])) {
                            //   $hasil=Html::a('<font color="blue"><b>'.$model['lansiaperempuan'].'</b></font>', Url::to(['dtks-maret2022-dtks/index','lansia'=>'lansiaperempuan','kecamatan'=>$model['kecamatan'],'kelurahan'=>'null'])); 
                            // }
                            return $hasil;
                         },
            ],
];
}
if (null!==Dokumen::find()->where(['username'=>@Yii::$app->user->identity->username])->andWhere(['status'=>'diterima'])->one()) {
  echo ExportMenu::widget([
    'dataProvider' => $dataProvider,
    'columns' => $gridColumns,
    'showPageSummary' => true,
]);
}
if (null==Dokumen::find()->where(['username'=>@Yii::$app->user->identity->username])->andWhere(['status'=>'diterima'])->one()) {
    echo 'Download CSV Belum diperbolehkan karena belum upload permohonan yang terkonfirmasi';
  }
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
<?=$this->registerJsFile('https://highcharts.github.io/export-csv/export-csv.js', ['depends' => HighchartsAsset::className()])?>
