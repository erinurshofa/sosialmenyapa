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
        'allModels' => $kondisi_lantai['kondisi_lantai'],
    ]);
?>
      <div class="row">
        <div class="col-md-12">
          <div class="nav-tabs-custom box box-success box-solid">
            <ul class="nav nav-tabs pull-right">
              <li><a href="#tab_1-1" data-toggle="tab">PRESENTASE</a></li>
              <li><a href="#tab_2-2" data-toggle="tab">GRAFIK</a></li>
              <li class="active"><a href="#tab_3-2" data-toggle="tab">TABLE</a></li>
              <li class="pull-left header text-blue"><i class="fa fa-book text-red"></i> REKAPITULASI KONDISI LANTAI</li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane" id="tab_1-1">
                 <?= $this->render('presentase/presentase_kondisi_lantai', [
				        'kondisi_lantai' => $kondisi_lantai,
				    ]) ?>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2-2">
                 <?= $this->render('grafik/grafik_kondisi_lantai', [
			        'kondisi_lantai' => $kondisi_lantai,
			    ]) ?>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane active" id="tab_3-2">
               <?php 
       //         $this->render('table/table_kondisi_lantai', [
			    //     'kondisi_lantai' => $kondisi_lantai,
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
              'label'=>'Marmer',
              'attribute'=>'marmer',
              'hAlign' => 'right',
              'pageSummary' => true,
              'pageSummary' => Html::a('<font color="blue"><b>'.Bdtrt::find()->where("lantai = 'Marmer/granit'")->count().'</b></font>', ['bdtrt/listbdtrt', ['kondisi_lantai'=>'marmer',]] ),
              'format' => 'html',
              'value' => function ($model) {
                            $hasil=Html::a('<font color="orange"><b>'.$model['marmer'].'</b></font>', ['bdtrt/listbdtrt',['kondisi_lantai'=>'marmer','kodekecamatan'=>$model['KDKEC']]] , []);
                            return $hasil;
                             // return $model['marmer'];
                         },
            ],
             [
              'label'=>'Keramik',
              'attribute'=>'keramik',
              'hAlign' => 'right',
              'pageSummary' => true,
              'pageSummary' => Html::a('<font color="blue"><b>'.Bdtrt::find()->where("lantai = 'Keramik'")->count().'</b></font>', ['bdtrt/listbdtrt', ['kondisi_lantai'=>'keramik',]] ),
              'format' => 'raw',
              'value' => function ($model) {
                            $hasil=Html::a('<font color="orange"><b>'.$model['keramik'].'</b></font>', ['bdtrt/listbdtrt',['kondisi_lantai'=>'keramik','kodekecamatan'=>$model['KDKEC']]] , []);
                            return $hasil;
                            // return $model['keramik'];
                         },
            ],
            [
              'label'=>'Parket',
              'attribute'=>'parket',
              'hAlign' => 'right',
              'format'=>'decimal',
              'pageSummary' => true,
              'pageSummary' => Html::a('<font color="blue"><b>'.Bdtrt::find()->where("lantai = 'Parket/vinil/permadani'")->count().'</b></font>', ['bdtrt/listbdtrt', ['kondisi_lantai'=>'parket',]] ),
              'format' => 'html',
              'value' => function ($model) {
                            $hasil=Html::a('<font color="orange"><b>'.$model['parket'].'</b></font>', ['bdtrt/listbdtrt',['kondisi_lantai'=>'parket','kodekecamatan'=>$model['KDKEC']]] , []);
                            return $hasil;
                          // return $model['parket'];
                         },
            ],
            [
              'label'=>'Ubin',
              'attribute'=>'ubin',
              'hAlign' => 'right',
              'pageSummary' => true,
              'pageSummary' => Html::a('<font color="blue"><b>'.Bdtrt::find()->where("lantai = 'Ubin/tegel/teraso'")->count().'</b></font>', ['bdtrt/listbdtrt', ['kondisi_lantai'=>'ubin',]] ),
              'format' => 'html',
              'value' => function ($model) {
                            $hasil=Html::a('<font color="orange"><b>'.$model['ubin'].'</b></font>', ['bdtrt/listbdtrt',['kondisi_lantai'=>'ubin','kodekecamatan'=>$model['KDKEC']]] , []);
                            return $hasil;
                            // return $model['ubin'];
                         },
            ],
            [
              'label'=>'Kayu Tinggi',
              'attribute'=>'kayutinggi',
              'hAlign' => 'right',
              'pageSummary' => true,
              'pageSummary' => Html::a('<font color="blue"><b>'.Bdtrt::find()->where("lantai = 'Kayu/papan kualitas tinggi'")->count().'</b></font>', ['bdtrt/listbdtrt', ['kondisi_lantai'=>'kayutinggi',]] ),
              'format' => 'html',
              'value' => function ($model) {
                            $hasil=Html::a('<font color="orange"><b>'.$model['kayutinggi'].'</b></font>', ['bdtrt/listbdtrt',['kondisi_lantai'=>'kayutinggi','kodekecamatan'=>$model['KDKEC']]] , []);
                            return $hasil;
                            // return $model['kayutinggi'];
                         },
            ],
            [
              'label'=>'Sementara',
              'attribute'=>'sementara',
              'hAlign' => 'right',
              'pageSummary' => true,
              'pageSummary' => Html::a('<font color="blue"><b>'.Bdtrt::find()->where("lantai = 'Sementara/bata merah'")->count().'</b></font>', ['bdtrt/listbdtrt', ['kondisi_lantai'=>'sementara',]] ),
              'format' => 'html',
              'value' => function ($model) {
                            $hasil=Html::a('<font color="orange"><b>'.$model['sementara'].'</b></font>', ['bdtrt/listbdtrt',['kondisi_lantai'=>'sementara','kodekecamatan'=>$model['KDKEC']]] , []);
                            return $hasil;
                            // return $model['sementara'];
                         },
            ],
            [
              'label'=>'Bambu',
              'attribute'=>'bambu',
              'hAlign' => 'right',
              'pageSummary' => true,
              'pageSummary' => Html::a('<font color="blue"><b>'.Bdtrt::find()->where("lantai = 'Bambu'")->count().'</b></font>', ['bdtrt/listbdtrt', ['kondisi_lantai'=>'bambu',]] ),
              'format' => 'html',
              'value' => function ($model) {
                            $hasil=Html::a('<font color="orange"><b>'.$model['bambu'].'</b></font>', ['bdtrt/listbdtrt',['kondisi_lantai'=>'bambu','kodekecamatan'=>$model['KDKEC']]] , []);
                            return $hasil;
                            // return $model['bambu'];
                         },
            ],
            [
              'label'=>'Kayu Rendah',
              'attribute'=>'kayurendah',
              'hAlign' => 'right',
              'pageSummary' => true,
              'pageSummary' => Html::a('<font color="blue"><b>'.Bdtrt::find()->where("lantai = 'Kayu/papan kualitas rendah'")->count().'</b></font>', ['bdtrt/listbdtrt', ['kondisi_lantai'=>'kayurendah',]] ),
              'format' => 'html',
              'value' => function ($model) {
                            $hasil=Html::a('<font color="orange"><b>'.$model['kayurendah'].'</b></font>', ['bdtrt/listbdtrt',['kondisi_lantai'=>'kayurendah','kodekecamatan'=>$model['KDKEC']]] , []);
                            return $hasil;
                            // return $model['kayurendah'];
                         },
            ],
            [
              'label'=>'Tanah',
              'attribute'=>'tanah',
              'hAlign' => 'right',
              'pageSummary' => true,
              'pageSummary' => Html::a('<font color="blue"><b>'.Bdtrt::find()->where("lantai = 'Tanah'")->count().'</b></font>', ['bdtrt/listbdtrt', ['kondisi_lantai'=>'tanah',]] ),
              'format' => 'html',
              'value' => function ($model) {
                            $hasil=Html::a('<font color="orange"><b>'.$model['tanah'].'</b></font>', ['bdtrt/listbdtrt',['kondisi_lantai'=>'tanah','kodekecamatan'=>$model['KDKEC']]] , []);
                            return $hasil;
                            // return $model['tanah'];
                         },
            ],
            [
              'label'=>'Lainnya',
              'attribute'=>'lainnya',
              'hAlign' => 'right',
              'pageSummary' => true,
              'pageSummary' => Html::a('<font color="blue"><b>'.Bdtrt::find()->where("lantai = 'Lainnya'")->count().'</b></font>', ['bdtrt/listbdtrt', ['kondisi_lantai'=>'lainnya',]] ),
              'format' => 'html',
              'value' => function ($model) {
                            $hasil=Html::a('<font color="orange"><b>'.$model['lainnya'].'</b></font>', ['bdtrt/listbdtrt',['kondisi_lantai'=>'lainnya','kodekecamatan'=>$model['KDKEC']]] , []);
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
