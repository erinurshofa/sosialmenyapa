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
        'allModels' => $kondisi_atap['kondisi_atap'],
    ]);
?>
      <div class="row">
        <div class="col-md-12">
          <div class="nav-tabs-custom box box-success box-solid">
            <ul class="nav nav-tabs pull-right">
              <li><a href="#tab_1-1" data-toggle="tab">PRESENTASE</a></li>
              <li><a href="#tab_2-2" data-toggle="tab">GRAFIK</a></li>
              <li class="active"><a href="#tab_3-2" data-toggle="tab">TABLE</a></li>
              <li class="pull-left header text-blue"><i class="fa fa-book text-red"></i> REKAPITULASI KONDISI ATAP</li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane" id="tab_1-1">
                 <?= $this->render('presentase/presentase_kondisi_atap', [
				        'kondisi_atap' => $kondisi_atap,
				    ]) ?>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2-2">
                 <?= $this->render('grafik/grafik_kondisi_atap', [
			        'kondisi_atap' => $kondisi_atap,
			    ]) ?>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane active" id="tab_3-2">
               <?php 
       //         $this->render('table/table_kondisi_atap', [
			    //     'kondisi_atap' => $kondisi_atap,
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
              'label'=>'Beton',
              'attribute'=>'beton',
              'hAlign' => 'right',
              'pageSummary' => true,
              'pageSummary' => Html::a('<font color="blue"><b>'.Bdtrt::find()->where("atap = 'Beton/genteng beton'")->count().'</b></font>', ['bdtrt/listbdtrt', ['kondisi_atap'=>'beton',]] ),
              'format' => 'html',
              'value' => function ($model) {
                            $hasil=Html::a('<font color="orange"><b>'.$model['beton'].'</b></font>', ['bdtrt/listbdtrt',['kondisi_atap'=>'beton','kodekecamatan'=>$model['KDKEC']]] , []);
                            return $hasil;
                             // return $model['beton'];
                         },
            ],
             [
              'label'=>'Genteng Keramik',
              'attribute'=>'gentengkeramik',
              'hAlign' => 'right',
              'pageSummary' => true,
              'pageSummary' => Html::a('<font color="blue"><b>'.Bdtrt::find()->where("atap = 'Genteng keramik'")->count().'</b></font>', ['bdtrt/listbdtrt', ['kondisi_atap'=>'gentengkeramik',]] ),
              'format' => 'raw',
              'value' => function ($model) {
                            $hasil=Html::a('<font color="orange"><b>'.$model['gentengkeramik'].'</b></font>', ['bdtrt/listbdtrt',['kondisi_atap'=>'gentengkeramik','kodekecamatan'=>$model['KDKEC']]] , []);
                            return $hasil;
                            // return $model['gentengkeramik'];
                         },
            ],
            [
              'label'=>'Genteng Metal',
              'attribute'=>'gentengmetal',
              'hAlign' => 'right',
              'format'=>'decimal',
              'pageSummary' => true,
              'pageSummary' => Html::a('<font color="blue"><b>'.Bdtrt::find()->where("atap = 'Genteng metal'")->count().'</b></font>', ['bdtrt/listbdtrt', ['kondisi_atap'=>'gentengmetal',]] ),
              'format' => 'html',
              'value' => function ($model) {
                            $hasil=Html::a('<font color="orange"><b>'.$model['gentengmetal'].'</b></font>', ['bdtrt/listbdtrt',['kondisi_atap'=>'gentengmetal','kodekecamatan'=>$model['KDKEC']]] , []);
                            return $hasil;
                          // return $model['gentengmetal'];
                         },
            ],
            [
              'label'=>'Genteng Tanah Liat',
              'attribute'=>'gentengtanahliat',
              'hAlign' => 'right',
              'pageSummary' => true,
              'pageSummary' => Html::a('<font color="blue"><b>'.Bdtrt::find()->where("atap = 'Genteng tanah liat'")->count().'</b></font>', ['bdtrt/listbdtrt', ['kondisi_atap'=>'gentengtanahliat',]] ),
              'format' => 'html',
              'value' => function ($model) {
                            $hasil=Html::a('<font color="orange"><b>'.$model['gentengtanahliat'].'</b></font>', ['bdtrt/listbdtrt',['kondisi_atap'=>'gentengtanahliat','kodekecamatan'=>$model['KDKEC']]] , []);
                            return $hasil;
                            // return $model['gentengtanahliat'];
                         },
            ],
            [
              'label'=>'Asbes',
              'attribute'=>'asbes',
              'hAlign' => 'right',
              'pageSummary' => true,
              'pageSummary' => Html::a('<font color="blue"><b>'.Bdtrt::find()->where("atap = 'Asbes'")->count().'</b></font>', ['bdtrt/listbdtrt', ['kondisi_atap'=>'asbes',]] ),
              'format' => 'html',
              'value' => function ($model) {
                            $hasil=Html::a('<font color="orange"><b>'.$model['asbes'].'</b></font>', ['bdtrt/listbdtrt',['kondisi_atap'=>'asbes','kodekecamatan'=>$model['KDKEC']]] , []);
                            return $hasil;
                            // return $model['asbes'];
                         },
            ],
            [
              'label'=>'Seng',
              'attribute'=>'seng',
              'hAlign' => 'right',
              'pageSummary' => true,
              'pageSummary' => Html::a('<font color="blue"><b>'.Bdtrt::find()->where("atap = 'Seng'")->count().'</b></font>', ['bdtrt/listbdtrt', ['kondisi_atap'=>'seng',]] ),
              'format' => 'html',
              'value' => function ($model) {
                            $hasil=Html::a('<font color="orange"><b>'.$model['seng'].'</b></font>', ['bdtrt/listbdtrt',['kondisi_atap'=>'seng','kodekecamatan'=>$model['KDKEC']]] , []);
                            return $hasil;
                            // return $model['seng'];
                         },
            ],
            [
              'label'=>'Sirap',
              'attribute'=>'sirap',
              'hAlign' => 'right',
              'pageSummary' => true,
              'pageSummary' => Html::a('<font color="blue"><b>'.Bdtrt::find()->where("atap = 'Sirap'")->count().'</b></font>', ['bdtrt/listbdtrt', ['kondisi_atap'=>'sirap',]] ),
              'format' => 'html',
              'value' => function ($model) {
                            $hasil=Html::a('<font color="orange"><b>'.$model['sirap'].'</b></font>', ['bdtrt/listbdtrt',['kondisi_atap'=>'sirap','kodekecamatan'=>$model['KDKEC']]] , []);
                            return $hasil;
                            // return $model['sirap'];
                         },
            ],
            [
              'label'=>'Bambu',
              'attribute'=>'bambu',
              'hAlign' => 'right',
              'pageSummary' => true,
              'pageSummary' => Html::a('<font color="blue"><b>'.Bdtrt::find()->where("atap = 'Bambu'")->count().'</b></font>', ['bdtrt/listbdtrt', ['kondisi_atap'=>'bambu',]] ),
              'format' => 'html',
              'value' => function ($model) {
                            $hasil=Html::a('<font color="orange"><b>'.$model['bambu'].'</b></font>', ['bdtrt/listbdtrt',['kondisi_atap'=>'bambu','kodekecamatan'=>$model['KDKEC']]] , []);
                            return $hasil;
                            // return $model['bambu'];
                         },
            ],
            [
              'label'=>'Jerami',
              'attribute'=>'jerami',
              'hAlign' => 'right',
              'pageSummary' => true,
              'pageSummary' => Html::a('<font color="blue"><b>'.Bdtrt::find()->where("atap = 'Jerami/ijuk/daun daunan/rumbia'")->count().'</b></font>', ['bdtrt/listbdtrt', ['kondisi_atap'=>'jerami',]] ),
              'format' => 'html',
              'value' => function ($model) {
                            $hasil=Html::a('<font color="orange"><b>'.$model['jerami'].'</b></font>', ['bdtrt/listbdtrt',['kondisi_atap'=>'jerami','kodekecamatan'=>$model['KDKEC']]] , []);
                            return $hasil;
                            // return $model['jerami'];
                         },
            ],
            [
              'label'=>'Lainnya',
              'attribute'=>'lainnya',
              'hAlign' => 'right',
              'pageSummary' => true,
              'pageSummary' => Html::a('<font color="blue"><b>'.Bdtrt::find()->where("atap = 'Lainnya'")->count().'</b></font>', ['bdtrt/listbdtrt', ['kondisi_atap'=>'lainnya',]] ),
              'format' => 'html',
              'value' => function ($model) {
                            $hasil=Html::a('<font color="orange"><b>'.$model['lainnya'].'</b></font>', ['bdtrt/listbdtrt',['kondisi_atap'=>'lainnya','kodekecamatan'=>$model['KDKEC']]] , []);
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
