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
        'allModels' => $kepemilikan_rumah['kepemilikan_rumah'],
    ]);
?>
      <div class="row">
        <div class="col-md-12">
          <div class="nav-tabs-custom box box-success box-solid">
            <ul class="nav nav-tabs pull-right">
              <li><a href="#tab_1-1" data-toggle="tab">PRESENTASE</a></li>
              <li><a href="#tab_2-2" data-toggle="tab">GRAFIK</a></li>
              <li class="active"><a href="#tab_3-2" data-toggle="tab">TABLE</a></li>
              <li class="pull-left header text-blue"><i class="fa fa-book text-red"></i> REKAPITULASI KEPEMILIKAN RUMAH</li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane" id="tab_1-1">
                 <?= $this->render('presentase/presentase_kepemilikan_rumah', [
				        'kepemilikan_rumah' => $kepemilikan_rumah,
				    ]) ?>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2-2">
                 <?= $this->render('grafik/grafik_kepemilikan_rumah', [
			        'kepemilikan_rumah' => $kepemilikan_rumah,
			    ]) ?>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane active" id="tab_3-2">
               <?php 
       //         $this->render('table/table_kepemilikan_rumah', [
			    //     'kepemilikan_rumah' => $kepemilikan_rumah,
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
              'label'=>'Milik Sendiri',
              'attribute'=>'miliksendiri',
              'hAlign' => 'right',
              'pageSummary' => true,
              'pageSummary' => Html::a('<font color="blue"><b>'.Bdtrt::find()->where("sta_bangunan = 'Milik sendiri'")->count().'</b></font>', ['bdtrt/listbdtrt', ['kepemilikan_rumah'=>'miliksendiri',]] ),
              'format' => 'html',
              'value' => function ($model) {
                $hasil=Html::a('<font color="orange"><b>'.$model['miliksendiri'].'</b></font>', ['bdtrt/listbdtrt',['kepemilikan_rumah'=>'miliksendiri','kodekecamatan'=>$model['KDKEC']]] , []);
                            return $hasil;
                             // return $model['miliksendiri'];
                         },
            ],
             [
              'label'=>'Kontrak',
              'attribute'=>'kontrak',
              'hAlign' => 'right',
              'pageSummary' => true,
              'pageSummary' => Html::a('<font color="blue"><b>'.Bdtrt::find()->where("sta_bangunan = 'Kontrak/sewa'")->count().'</b></font>', ['bdtrt/listbdtrt', ['kepemilikan_rumah'=>'kontrak',]] ),
              'format' => 'raw',
              'value' => function ($model) {
                          $hasil=Html::a('<font color="orange"><b>'.$model['kontrak'].'</b></font>', ['bdtrt/listbdtrt',['kepemilikan_rumah'=>'kontrak','kodekecamatan'=>$model['KDKEC']]] , []);
                            return $hasil;
                            // return $model['kontrak'];
                         },
            ],
            [
              'label'=>'Bebas',
              'attribute'=>'bebas',
              'hAlign' => 'right',
              'format'=>'decimal',
              'pageSummary' => true,
              'pageSummary' => Html::a('<font color="blue"><b>'.Bdtrt::find()->where("sta_bangunan = 'Bebas sewa'")->count().'</b></font>', ['bdtrt/listbdtrt', ['kepemilikan_rumah'=>'bebas',]] ),
              'format' => 'html',
              'value' => function ($model) {
                          $hasil=Html::a('<font color="orange"><b>'.$model['bebas'].'</b></font>', ['bdtrt/listbdtrt',['kepemilikan_rumah'=>'bebas','kodekecamatan'=>$model['KDKEC']]] , []);
                            return $hasil;
                          // return $model['bebas'];
                         },
            ],
            [
              'label'=>'Dinas',
              'attribute'=>'dinas',
              'hAlign' => 'right',
              'pageSummary' => true,
              'pageSummary' => Html::a('<font color="blue"><b>'.Bdtrt::find()->where("sta_bangunan = 'Dinas'")->count().'</b></font>', ['bdtrt/listbdtrt', ['kepemilikan_rumah'=>'dinas',]] ),
              'format' => 'html',
              'value' => function ($model) {
                            $hasil=Html::a('<font color="orange"><b>'.$model['dinas'].'</b></font>', ['bdtrt/listbdtrt',['kepemilikan_rumah'=>'dinas','kodekecamatan'=>$model['KDKEC']]] , []);
                            return $hasil;
                            // return $model['dinas'];
                         },
            ],
            [
              'label'=>'Lainnya',
              'attribute'=>'lainnya',
              'hAlign' => 'right',
              'pageSummary' => true,
              'pageSummary' => Html::a('<font color="blue"><b>'.Bdtrt::find()->where("sta_bangunan = 'Lainnya'")->count().'</b></font>', ['bdtrt/listbdtrt', ['kepemilikan_rumah'=>'lainnya',]] ),
              'format' => 'html',
              'value' => function ($model) {
                            $hasil=Html::a('<font color="orange"><b>'.$model['lainnya'].'</b></font>', ['bdtrt/listbdtrt',['kepemilikan_rumah'=>'lainnya','kodekecamatan'=>$model['KDKEC']]] , []);
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
