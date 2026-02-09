<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\export\ExportMenu;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;
use miloschuman\highcharts\HighchartsAsset;
use app\models\Bdtart;
use app\models\Kecamatan;
use app\models\Dokumen;
use app\models\Bdtrt;
 $dataProvider = new ArrayDataProvider([
        'allModels' => $sumber_air_minum['sumber_air_minum'],
    ]);
?>
      <div class="row">
        <div class="col-md-12">
          <div class="nav-tabs-custom box box-success box-solid">
            <ul class="nav nav-tabs pull-right">
              <li><a href="#tab_1-1" data-toggle="tab">PRESENTASE</a></li>
              <li><a href="#tab_2-2" data-toggle="tab">GRAFIK</a></li>
              <li class="active"><a href="#tab_3-2" data-toggle="tab">TABLE</a></li>
              <li class="pull-left header text-blue"><i class="fa fa-book text-red"></i> REKAPITULASI SUMBER AIR MINUM</li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane" id="tab_1-1">
                 <?= $this->render('presentase/presentase_sumber_air_minum', [
				        'sumber_air_minum' => $sumber_air_minum,
				    ]) ?>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2-2">
                 <?= $this->render('grafik/grafik_sumber_air_minum', [
			        'sumber_air_minum' => $sumber_air_minum,
			    ]) ?>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane active" id="tab_3-2">
               <?php 
       //         $this->render('table/table_sumber_air_minum', [
			    //     'sumber_air_minum' => $sumber_air_minum,
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
            [
              'label'=>'Merk',
              'attribute'=>'merk',
              'hAlign' => 'right',
              'pageSummary' => true,
              'pageSummary' => Html::a('<font color="blue"><b>'.Bdtrt::find()->where("sumber_airminum = 'Air kemasan bermerk'")->count().'</b></font>', ['bdtrt/listbdtrt', ['sumber_air_minum'=>'merk',]] ),
              'format' => 'html',
              'value' => function ($model) {
                            $hasil=Html::a('<font color="orange"><b>'.$model['merk'].'</b></font>', ['bdtrt/listbdtrt',['sumber_air_minum'=>'merk','kodekecamatan'=>$model['KDKEC']]] , []);
                            return $hasil;
                             // return $model['merk'];
                         },
            ],
             [
              'label'=>'Isi Ulang',
              'attribute'=>'isiulang',
              'hAlign' => 'right',
              'pageSummary' => true,
              'pageSummary' => Html::a('<font color="blue"><b>'.Bdtrt::find()->where("sumber_airminum = 'Air isi ulang'")->count().'</b></font>', ['bdtrt/listbdtrt', ['sumber_air_minum'=>'isiulang',]] ),
              'format' => 'raw',
              'value' => function ($model) {
                            $hasil=Html::a('<font color="orange"><b>'.$model['isiulang'].'</b></font>', ['bdtrt/listbdtrt',['sumber_air_minum'=>'isiulang','kodekecamatan'=>$model['KDKEC']]] , []);
                            return $hasil;
                            // return $model['isiulang'];
                         },
            ],
            [
              'label'=>'Meteran',
              'attribute'=>'meteran',
              'hAlign' => 'right',
              'format'=>'decimal',
              'pageSummary' => true,
              'pageSummary' => Html::a('<font color="blue"><b>'.Bdtrt::find()->where("sumber_airminum = 'Leding meteran'")->count().'</b></font>', ['bdtrt/listbdtrt', ['sumber_air_minum'=>'meteran',]] ),
              'format' => 'html',
              'value' => function ($model) {
                            $hasil=Html::a('<font color="orange"><b>'.$model['meteran'].'</b></font>', ['bdtrt/listbdtrt',['sumber_air_minum'=>'meteran','kodekecamatan'=>$model['KDKEC']]] , []);
                            return $hasil;
                          // return $model['meteran'];
                         },
            ],
            [
              'label'=>'Eceran',
              'attribute'=>'eceran',
              'hAlign' => 'right',
              'pageSummary' => true,
              'pageSummary' => Html::a('<font color="blue"><b>'.Bdtrt::find()->where("sumber_airminum = 'Leding eceran'")->count().'</b></font>', ['bdtrt/listbdtrt', ['sumber_air_minum'=>'eceran',]] ),
              'format' => 'html',
              'value' => function ($model) {
                            $hasil=Html::a('<font color="orange"><b>'.$model['eceran'].'</b></font>', ['bdtrt/listbdtrt',['sumber_air_minum'=>'eceran','kodekecamatan'=>$model['KDKEC']]] , []);
                            return $hasil;
                            // return $model['eceran'];
                         },
            ],
            [
              'label'=>'Pompa',
              'attribute'=>'pompa',
              'hAlign' => 'right',
              'pageSummary' => true,
              'pageSummary' => Html::a('<font color="blue"><b>'.Bdtrt::find()->where("sumber_airminum = 'Sumur bor/pompa'")->count().'</b></font>', ['bdtrt/listbdtrt', ['sumber_air_minum'=>'pompa',]] ),
              'format' => 'html',
              'value' => function ($model) {
                            $hasil=Html::a('<font color="orange"><b>'.$model['pompa'].'</b></font>', ['bdtrt/listbdtrt',['sumber_air_minum'=>'pompa','kodekecamatan'=>$model['KDKEC']]] , []);
                            return $hasil;
                            // return $model['pompa'];
                         },
            ],
            [
              'label'=>'Sterlindung',
              'attribute'=>'sterlindung',
              'hAlign' => 'right',
              'pageSummary' => true,
              'pageSummary' => Html::a('<font color="blue"><b>'.Bdtrt::find()->where("sumber_airminum = 'Sumur terlindung'")->count().'</b></font>', ['bdtrt/listbdtrt', ['sumber_air_minum'=>'sterlindung',]] ),
              'format' => 'html',
              'value' => function ($model) {
                            $hasil=Html::a('<font color="orange"><b>'.$model['sterlindung'].'</b></font>', ['bdtrt/listbdtrt',['sumber_air_minum'=>'sterlindung','kodekecamatan'=>$model['KDKEC']]] , []);
                            return $hasil;
                            // return $model['sterlindung'];
                         },
            ],
            [
              'label'=>'Stakterlindung',
              'attribute'=>'stakerlindung',
              'hAlign' => 'right',
              'pageSummary' => true,
              'pageSummary' => Html::a('<font color="blue"><b>'.Bdtrt::find()->where("sumber_airminum = 'Sumur tak terlindung'")->count().'</b></font>', ['bdtrt/listbdtrt', ['sumber_air_minum'=>'stakterlindung',]] ),
              'format' => 'html',
              'value' => function ($model) {
                            $hasil=Html::a('<font color="orange"><b>'.$model['stakterlindung'].'</b></font>', ['bdtrt/listbdtrt',['sumber_air_minum'=>'stakterlindung','kodekecamatan'=>$model['KDKEC']]] , []);
                            return $hasil;
                            // return $model['stakterlindung'];
                         },
            ],
            [
              'label'=>'Mtterlindung',
              'attribute'=>'mtterlindung',
              'hAlign' => 'right',
              'pageSummary' => true,
              'pageSummary' => Html::a('<font color="blue"><b>'.Bdtrt::find()->where("sumber_airminum = 'Mata air terlindung'")->count().'</b></font>', ['bdtrt/listbdtrt', ['sumber_air_minum'=>'mtterlindung',]] ),
              'format' => 'html',
              'value' => function ($model) {
                            $hasil=Html::a('<font color="orange"><b>'.$model['mtterlindung'].'</b></font>', ['bdtrt/listbdtrt',['sumber_air_minum'=>'mtterlindung','kodekecamatan'=>$model['KDKEC']]] , []);
                            return $hasil;
                            // return $model['mtterlindung'];
                         },
            ],
            [
              'label'=>'Mttakterlindung',
              'attribute'=>'mttakterlindung',
              'hAlign' => 'right',
              'pageSummary' => true,
              'pageSummary' => Html::a('<font color="blue"><b>'.Bdtrt::find()->where("sumber_airminum = 'Mata air tak terlindung'")->count().'</b></font>', ['bdtrt/listbdtrt', ['sumber_air_minum'=>'mttakterlindung',]] ),
              'format' => 'html',
              'value' => function ($model) {
                            $hasil=Html::a('<font color="orange"><b>'.$model['mttakterlindung'].'</b></font>', ['bdtrt/listbdtrt',['sumber_air_minum'=>'mttakterlindung','kodekecamatan'=>$model['KDKEC']]] , []);
                            return $hasil;
                            // return $model['mttakterlindung'];
                         },
            ],
            [
              'label'=>'Sungai',
              'attribute'=>'sungai',
              'hAlign' => 'right',
              'pageSummary' => true,
              'pageSummary' => Html::a('<font color="blue"><b>'.Bdtrt::find()->where("sumber_airminum = 'Air sungai/danau/waduk'")->count().'</b></font>', ['bdtrt/listbdtrt', ['sumber_air_minum'=>'sungai',]] ),
              'format' => 'html',
              'value' => function ($model) {
                            $hasil=Html::a('<font color="orange"><b>'.$model['sungai'].'</b></font>', ['bdtrt/listbdtrt',['sumber_air_minum'=>'sungai','kodekecamatan'=>$model['KDKEC']]] , []);
                            return $hasil;
                            // return $model['sungai'];
                         },
            ],
            [
              'label'=>'Hujan',
              'attribute'=>'hujan',
              'hAlign' => 'right',
              'pageSummary' => true,
              'pageSummary' => Html::a('<font color="blue"><b>'.Bdtrt::find()->where("sumber_airminum = 'Air hujan'")->count().'</b></font>', ['bdtrt/listbdtrt', ['sumber_air_minum'=>'hujan',]] ),
              'format' => 'html',
              'value' => function ($model) {
                            $hasil=Html::a('<font color="orange"><b>'.$model['hujan'].'</b></font>', ['bdtrt/listbdtrt',['sumber_air_minum'=>'hujan','kodekecamatan'=>$model['KDKEC']]] , []);
                            return $hasil;
                            // return $model['hujan'];
                         },
            ],
            [
              'label'=>'Lainnya',
              'attribute'=>'lainnya',
              'hAlign' => 'right',
              'pageSummary' => true,
              'pageSummary' => Html::a('<font color="blue"><b>'.Bdtrt::find()->where("sumber_airminum = 'Lainnya'")->count().'</b></font>', ['bdtrt/listbdtrt', ['sumber_air_minum'=>'lainnya',]] ),
              'format' => 'html',
              'value' => function ($model) {
                            $hasil=Html::a('<font color="orange"><b>'.$model['lainnya'].'</b></font>', ['bdtrt/listbdtrt',['sumber_air_minum'=>'lainnya','kodekecamatan'=>$model['KDKEC']]] , []);
                            return $hasil;
                            // return $model['lainnya'];
                         },
            ],
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
