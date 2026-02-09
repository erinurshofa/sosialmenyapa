<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;
use miloschuman\highcharts\HighchartsAsset;
use kartik\export\ExportMenu;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;
use app\models\DtksMaret2022Dtks;
use app\models\Kecamatan;
use app\models\Dokumen;
use kartik\grid\GridView;
 $dataProvider = new ArrayDataProvider([
        'allModels' => $usia['usia'],
    ]);
?>
      <div class="row">
        <div class="col-md-12">
          <div class="nav-tabs-custom box box-success box-solid">
            <ul class="nav nav-tabs pull-right">
              <li><a href="#tab_1-1" data-toggle="tab">PRESENTASE</a></li>
              <li><a href="#tab_2-2" data-toggle="tab">GRAFIK</a></li>
              <li class="active"><a href="#tab_3-2" data-toggle="tab">TABLE</a></li>
              <li class="pull-left header text-blue"><i class="fa fa-book text-red"></i> REKAPITULASI USIA


              </li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane" id="tab_1-1">
                 <?= $this->render('presentase/presentase_usia', [
				        'usia' => $usia,
				    ]) ?>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2-2">
                 <?= $this->render('grafik/grafik_usia', [
			        'usia' => $usia,
			    ]) ?>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane active" id="tab_3-2">
               <?php 
       //         $this->render('table/table_usia', [
			    //     'usia' => $usia,
       //        'dataProvider'=>$dataProvider,
       //        'gridColumns'=>$gridColumns,
			    // ]) 
          ?>

<?php
$gridColumns = [
    ['class' => 'kartik\grid\SerialColumn'],
           [
              'label'=>'KECAMATAN',
              'attribute'=>'kecamatan',
              'pageSummary'=>'Total',
              'format' => 'html',
              'value' => function ($model) {
                            $hasil=Html::a('<font color="green"><b>'.$model['kecamatan'].'</b></font>', Url::to(['rekapitulasibaru/usiaperkelurahan','kecamatan'=>$model['kecamatan']]));
                            if (empty($model['kecamatan'])) {
                              $hasil=Html::a('<font color="green"><b>NULL</b></font>', Url::to(['dtks-maret2022-dtks/index','kecamatan'=>'null'])); 
                            }
                            return $hasil;
                         },
            ],
            [
              'label'=>'usia0_5',
              'attribute'=>'usia0_5',
              'pageSummary'=>true,
              'pageSummary' => Html::a('<font color="red"><b>'.DtksMaret2022Dtks::find()->where("TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) BETWEEN 0 AND 5")->count().'</b></font>', Url::to(['dtks-maret2022-dtks/index', 'usia'=>'usia0_5'])),
              'format' => 'html',
              'value' => function ($model) {
                            $hasil=Html::a('<font color="red"><b>'.$model['usia0_5'].'</b></font>', Url::to(['dtks-maret2022-dtks/index','usia'=>'usia0_5','kecamatan'=>@$model['kecamatan']]));
                            if (empty($model['kecamatan'])) {
                              $hasil=Html::a('<font color="red"><b>'.$model['usia0_5'].'</b></font>', Url::to(['dtks-maret2022-dtks/index','usia'=>'usia0_5','kecamatan'=>'null'])); 
                            }
                            return $hasil;
                         },
            ],
            [
              'label'=>'usia6_12',
              'attribute'=>'usia6_12',
              'pageSummary'=>true,
              'pageSummary' => Html::a('<font color="green"><b>'.DtksMaret2022Dtks::find()->where("TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) BETWEEN 6 AND 12")->count().'</b></font>', Url::to(['dtks-maret2022-dtks/index', 'usia'=>'usia6_12'])),
              'format' => 'html',
              'value' => function ($model) {
                            $hasil=Html::a('<font color="green"><b>'.$model['usia6_12'].'</b></font>', Url::to(['dtks-maret2022-dtks/index','usia'=>'usia6_12','kecamatan'=>$model['kecamatan']]));
                            if (empty($model['kecamatan'])) {
                              $hasil=Html::a('<font color="green"><b>'.$model['usia6_12'].'</b></font>', Url::to(['dtks-maret2022-dtks/index','usia'=>'usia6_12','kecamatan'=>'null'])); 
                            }
                            return $hasil;
                         },
            ],
            [
              'label'=>'usia13_15',
              'attribute'=>'usia13_15',
              'pageSummary'=>true,
              'pageSummary' => Html::a('<font color="blue"><b>'.DtksMaret2022Dtks::find()->where("TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) BETWEEN 13 AND 15")->count().'</b></font>', Url::to(['dtks-maret2022-dtks/index', 'usia'=>'usia13_15'])),
              'format' => 'html',
              'value' => function ($model) {
                            $hasil=Html::a('<font color="blue"><b>'.$model['usia13_15'].'</b></font>', Url::to(['dtks-maret2022-dtks/index','usia'=>'usia13_15','kecamatan'=>$model['kecamatan']]));
                            if (empty($model['kecamatan'])) {
                              $hasil=Html::a('<font color="blue"><b>'.$model['usia13_15'].'</b></font>', Url::to(['dtks-maret2022-dtks/index','usia'=>'usia13_15','kecamatan'=>'null'])); 
                            }
                            return $hasil;
                         },
            ],
            [
              'label'=>'usia16_18',
              'attribute'=>'usia16_18',
              'pageSummary'=>true,
              'pageSummary' => Html::a('<font color="red"><b>'.DtksMaret2022Dtks::find()->where("TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) BETWEEN 16 AND 18")->count().'</b></font>', Url::to(['dtks-maret2022-dtks/index', 'usia'=>'usia16_18'])),
              'format' => 'html',
              'value' => function ($model) {
                            $hasil=Html::a('<font color="red"><b>'.$model['usia16_18'].'</b></font>', Url::to(['dtks-maret2022-dtks/index','usia'=>'usia16_18','kecamatan'=>$model['kecamatan']]));
                            if (empty($model['kecamatan'])) {
                              $hasil=Html::a('<font color="red"><b>'.$model['usia16_18'].'</b></font>', Url::to(['dtks-maret2022-dtks/index','usia'=>'usia16_18','kecamatan'=>'null'])); 
                            }
                            return $hasil;
                         },
            ],
             [
              'label'=>'usia19_25',
              'attribute'=>'usia19_25',
              'pageSummary'=>true,
              'pageSummary' => Html::a('<font color="orange"><b>'.DtksMaret2022Dtks::find()->where("TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) BETWEEN 19 AND 25")->count().'</b></font>', Url::to(['dtks-maret2022-dtks/index', 'usia'=>'usia19_25'])),
              'format' => 'html',
              'value' => function ($model) {
                            $hasil=Html::a('<font color="orange"><b>'.$model['usia19_25'].'</b></font>', Url::to(['dtks-maret2022-dtks/index','usia'=>'usia19_25','kecamatan'=>$model['kecamatan']]));
                            if (empty($model['kecamatan'])) {
                              $hasil=Html::a('<font color="orange"><b>'.$model['usia19_25'].'</b></font>', Url::to(['dtks-maret2022-dtks/index','usia'=>'usia19_25','kecamatan'=>'null'])); 
                            }
                            return $hasil;
                         },
            ],   
            [
              'label'=>'usia26_30',
              'attribute'=>'usia26_30',
              'pageSummary'=>true,
              'pageSummary' => Html::a('<font color="blue"><b>'.DtksMaret2022Dtks::find()->where("TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) BETWEEN 26 AND 30")->count().'</b></font>', Url::to(['dtks-maret2022-dtks/index','usia'=>'usia26_30'])),
              'format' => 'html',
              'value' => function ($model) {
                            $hasil=Html::a('<font color="blue"><b>'.$model['usia26_30'].'</b></font>', Url::to(['dtks-maret2022-dtks/index','usia'=>'usia26_30','kecamatan'=>$model['kecamatan']]));
                            if (empty($model['kecamatan'])) {
                              $hasil=Html::a('<font color="blue"><b>'.$model['usia26_30'].'</b></font>', Url::to(['dtks-maret2022-dtks/index','usia'=>'usia26_30','kecamatan'=>'null'])); 
                            }
                            return $hasil;
                         },
            ],
            [
              'label'=>'usia31_40',
              'attribute'=>'usia31_40',
              'pageSummary'=>true,
              'pageSummary' => Html::a('<font color="teal"><b>'.DtksMaret2022Dtks::find()->where("TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) BETWEEN 31 AND 40")->count().'</b></font>', Url::to(['dtks-maret2022-dtks/index', 'usia'=>'usia31_40'])),
              'format' => 'html',
              'value' => function ($model) {
                            $hasil=Html::a('<font color="teal"><b>'.$model['usia31_40'].'</b></font>', Url::to(['dtks-maret2022-dtks/index','usia'=>'usia31_40','kecamatan'=>$model['kecamatan']]));
                            if (empty($model['kecamatan'])) {
                              $hasil=Html::a('<font color="teal"><b>'.$model['usia31_40'].'</b></font>', Url::to(['dtks-maret2022-dtks/index','usia'=>'usia31_40','kecamatan'=>'null'])); 
                            }
                            return $hasil;
                         },
            ],
            [
              'label'=>'usia41_50',
              'attribute'=>'usia41_50',
              'pageSummary'=>true,
              'pageSummary' => Html::a('<font color="purple"><b>'.DtksMaret2022Dtks::find()->where("TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) BETWEEN 41 AND 50")->count().'</b></font>', Url::to(['dtks-maret2022-dtks/index', 'usia'=>'usia41_50'])),
              'format' => 'html',
              'value' => function ($model) {
                            $hasil=Html::a('<font color="purple"><b>'.$model['usia41_50'].'</b></font>', Url::to(['dtks-maret2022-dtks/index','usia'=>'usia41_50','kecamatan'=>$model['kecamatan']]));
                            if (empty($model['kecamatan'])) {
                              $hasil=Html::a('<font color="purple"><b>'.$model['usia41_50'].'</b></font>', Url::to(['dtks-maret2022-dtks/index','usia'=>'usia41_50','kecamatan'=>'null'])); 
                            }
                            return $hasil;
                         },
            ],
            [
              'label'=>'usia51_60',
              'attribute'=>'usia51_60',
              'pageSummary'=>true,
              'pageSummary' => Html::a('<font color="blue"><b>'.DtksMaret2022Dtks::find()->where("TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) BETWEEN 51 AND 60")->count().'</b></font>', Url::to(['dtks-maret2022-dtks/index', 'usia'=>'usia51_60'])),
              'format' => 'html',
              'value' => function ($model) {
                            $hasil=Html::a('<font color="blue"><b>'.$model['usia51_60'].'</b></font>', Url::to(['dtks-maret2022-dtks/index','usia'=>'usia51_60','kecamatan'=>$model['kecamatan']]));
                            if (empty($model['kecamatan'])) {
                              $hasil=Html::a('<font color="blue"><b>'.$model['usia51_60'].'</b></font>', Url::to(['dtks-maret2022-dtks/index','usia'=>'usia51_60','kecamatan'=>'null'])); 
                            }
                            return $hasil;
                         },
            ],
            [
              'label'=>'usia61_110',
              'attribute'=>'usia61_110',
              'pageSummary'=>true,
              'pageSummary' => Html::a('<font color="orange"><b>'.DtksMaret2022Dtks::find()->where("TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) BETWEEN 61 AND 110")->count().'</b></font>', Url::to(['dtks-maret2022-dtks/index', 'usia'=>'usia61_110'])),
              'format' => 'html',
              'value' => function ($model) {
                            $hasil=Html::a('<font color="orange"><b>'.$model['usia61_110'].'</b></font>', Url::to(['dtks-maret2022-dtks/index','usia'=>'usia61_110','kecamatan'=>$model['kecamatan']]));
                            if (empty($model['kecamatan'])) {
                              $hasil=Html::a('<font color="orange"><b>'.$model['usia61_110'].'</b></font>', Url::to(['dtks-maret2022-dtks/index','usia'=>'usia61_110','kecamatan'=>'null'])); 
                            }
                            return $hasil;
                         },
            ],
            [
              'label'=>'usialebih_110',
              'attribute'=>'usialebih_110',
              'pageSummary'=>true,
              'pageSummary' => Html::a('<font color="green"><b>'.DtksMaret2022Dtks::find()->where("TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) > 110")->count().'</b></font>', Url::to(['dtks-maret2022-dtks/index', 'usia'=>'usialebih_110'])),
              'format' => 'html',
              'value' => function ($model) {
                            $hasil=Html::a('<font color="green"><b>'.$model['usialebih_110'].'</b></font>', Url::to(['dtks-maret2022-dtks/index','usia'=>'usialebih_110','kecamatan'=>$model['kecamatan']]));
                            if (empty($model['kecamatan'])) {
                              $hasil=Html::a('<font color="green"><b>'.$model['usialebih_110'].'</b></font>', Url::to(['dtks-maret2022-dtks/index','usia'=>'usialebih_110','kecamatan'=>'null'])); 
                            }
                            return $hasil;
                         },
            ],       
    // ['class' => 'yii\grid\ActionColumn'],
];
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
