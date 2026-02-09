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
        'allModels' => $jenis_kloset['jenis_kloset'],
    ]);
?>
      <div class="row">
        <div class="col-md-12">
          <div class="nav-tabs-custom box box-success box-solid">
            <ul class="nav nav-tabs pull-right">
              <li><a href="#tab_1-1" data-toggle="tab">PRESENTASE</a></li>
              <li><a href="#tab_2-2" data-toggle="tab">GRAFIK</a></li>
              <li class="active"><a href="#tab_3-2" data-toggle="tab">TABLE</a></li>
              <li class="pull-left header text-blue"><i class="fa fa-book text-red"></i> REKAPITULASI JENIS KLOSET</li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane" id="tab_1-1">
                 <?= $this->render('presentase/presentase_jenis_kloset', [
				        'jenis_kloset' => $jenis_kloset,
				    ]) ?>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2-2">
                 <?= $this->render('grafik/grafik_jenis_kloset', [
			        'jenis_kloset' => $jenis_kloset,
			    ]) ?>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane active" id="tab_3-2">
               <?php 
       //         $this->render('table/table_jenis_kloset', [
			    //     'jenis_kloset' => $jenis_kloset,
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
              'label'=>'Leher Angsa',
              'attribute'=>'leherangsa',
              'hAlign' => 'right',
              'pageSummary' => true,
              'pageSummary' => Html::a('<font color="blue"><b>'.Bdtrt::find()->where("kloset = 'Leher angsa'")->count().'</b></font>', ['bdtrt/listbdtrt', ['jenis_kloset'=>'leherangsa',]] ),
              'format' => 'html',
              'value' => function ($model) {
                            $hasil=Html::a('<font color="orange"><b>'.$model['leherangsa'].'</b></font>', ['bdtrt/listbdtrt',['jenis_kloset'=>'leherangsa','kodekecamatan'=>$model['KDKEC']]] , []);
                            return $hasil;
                             // return $model['leherangsa'];
                         },
            ],
             [
              'label'=>'Plengsengan',
              'attribute'=>'plengsengan',
              'hAlign' => 'right',
              'pageSummary' => true,
              'pageSummary' => Html::a('<font color="blue"><b>'.Bdtrt::find()->where("kloset = 'Plengsengan'")->count().'</b></font>', ['bdtrt/listbdtrt', ['jenis_kloset'=>'plengsengan',]] ),
              'format' => 'raw',
              'value' => function ($model) {
                            $hasil=Html::a('<font color="orange"><b>'.$model['plengsengan'].'</b></font>', ['bdtrt/listbdtrt',['jenis_kloset'=>'plengsengan','kodekecamatan'=>$model['KDKEC']]] , []);
                            return $hasil;
                            // return $model['plengsengan'];
                         },
            ],
            [
              'label'=>'Cemplung',
              'attribute'=>'cemplung',
              'hAlign' => 'right',
              'format'=>'decimal',
              'pageSummary' => true,
              'pageSummary' => Html::a('<font color="blue"><b>'.Bdtrt::find()->where("kloset = 'Cemplung/cubluk'")->count().'</b></font>', ['bdtrt/listbdtrt', ['jenis_kloset'=>'cemplung',]] ),
              'format' => 'html',
              'value' => function ($model) {
                            $hasil=Html::a('<font color="orange"><b>'.$model['cemplung'].'</b></font>', ['bdtrt/listbdtrt',['jenis_kloset'=>'cemplung','kodekecamatan'=>$model['KDKEC']]] , []);
                            return $hasil;
                          // return $model['cemplung'];
                         },
            ],
            [
              'label'=>'Tidak Pakai',
              'attribute'=>'tidakpakai',
              'hAlign' => 'right',
              'pageSummary' => true,
              'pageSummary' => Html::a('<font color="blue"><b>'.Bdtrt::find()->where("kloset = 'Tidak pakai'")->count().'</b></font>', ['bdtrt/listbdtrt', ['jenis_kloset'=>'tidakpakai',]] ),
              'format' => 'html',
              'value' => function ($model) {
                            $hasil=Html::a('<font color="orange"><b>'.$model['tidakpakai'].'</b></font>', ['bdtrt/listbdtrt',['jenis_kloset'=>'tidakpakai','kodekecamatan'=>$model['KDKEC']]] , []);
                            return $hasil;
                            // return $model['tidakpakai'];
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
