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
        'allModels' => $kondisi_dinding['kondisi_dinding'],
    ]);
?>
      <div class="row">
        <div class="col-md-12">
          <div class="nav-tabs-custom box box-success box-solid">
            <ul class="nav nav-tabs pull-right">
              <li><a href="#tab_1-1" data-toggle="tab">PRESENTASE</a></li>
              <li><a href="#tab_2-2" data-toggle="tab">GRAFIK</a></li>
              <li class="active"><a href="#tab_3-2" data-toggle="tab">TABLE</a></li>
              <li class="pull-left header text-blue"><i class="fa fa-book text-red"></i> REKAPITULASI KONDISI DINDING</li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane" id="tab_1-1">
                 <?= $this->render('presentase/presentase_kondisi_dinding', [
				        'kondisi_dinding' => $kondisi_dinding,
				    ]) ?>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2-2">
                 <?= $this->render('grafik/grafik_kondisi_dinding', [
			        'kondisi_dinding' => $kondisi_dinding,
			    ]) ?>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane active" id="tab_3-2">
               <?php 
       //         $this->render('table/table_kondisi_dinding', [
			    //     'kondisi_dinding' => $kondisi_dinding,
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
              'label'=>'Tembok',
              'attribute'=>'tembok',
              'hAlign' => 'right',
              'pageSummary' => true,
              'pageSummary' => Html::a('<font color="blue"><b>'.Bdtrt::find()->where("dinding = 'Tembok'")->count().'</b></font>', ['bdtrt/listbdtrt', ['kondisi_dinding'=>'tembok',]] ),
              'format' => 'html',
              'value' => function ($model) {
                             $hasil=Html::a('<font color="orange"><b>'.$model['tembok'].'</b></font>', ['bdtrt/listbdtrt',['kondisi_dinding'=>'tembok','kodekecamatan'=>$model['KDKEC']]] , []);
                            return $hasil;
                             // return $model['tembok'];
                         },
            ],
             [
              'label'=>'Plesteran',
              'attribute'=>'plesteran',
              'hAlign' => 'right',
              'pageSummary' => true,
              'pageSummary' => Html::a('<font color="blue"><b>'.Bdtrt::find()->where("dinding = 'Plesteran anyaman bambu/kawat'")->count().'</b></font>', ['bdtrt/listbdtrt', ['kondisi_dinding'=>'plesteran',]] ),
              'format' => 'raw',
              'value' => function ($model) {
                          $hasil=Html::a('<font color="orange"><b>'.$model['plesteran'].'</b></font>', ['bdtrt/listbdtrt',['kondisi_dinding'=>'plesteran','kodekecamatan'=>$model['KDKEC']]] , []);
                            return $hasil;
                            // return $model['plesteran'];
                         },
            ],
            [
              'label'=>'Kayu',
              'attribute'=>'kayu',
              'hAlign' => 'right',
              'format'=>'decimal',
              'pageSummary' => true,
              'pageSummary' => Html::a('<font color="blue"><b>'.Bdtrt::find()->where("dinding = 'Kayu'")->count().'</b></font>', ['bdtrt/listbdtrt', ['kondisi_dinding'=>'kayu',]] ),
              'format' => 'html',
              'value' => function ($model) {
                          $hasil=Html::a('<font color="orange"><b>'.$model['kayu'].'</b></font>', ['bdtrt/listbdtrt',['kondisi_dinding'=>'kayu','kodekecamatan'=>$model['KDKEC']]] , []);
                            return $hasil;
                          // return $model['kayu'];
                         },
            ],
            [
              'label'=>'Anyaman Bambu',
              'attribute'=>'anyamanbambu',
              'hAlign' => 'right',
              'pageSummary' => true,
              'pageSummary' => Html::a('<font color="blue"><b>'.Bdtrt::find()->where("dinding = 'Anyaman Bambu'")->count().'</b></font>', ['bdtrt/listbdtrt', ['kondisi_dinding'=>'anyamanbambu',]] ),
              'format' => 'html',
              'value' => function ($model) {
                            $hasil=Html::a('<font color="orange"><b>'.$model['anyamanbambu'].'</b></font>', ['bdtrt/listbdtrt',['kondisi_dinding'=>'anyamanbambu','kodekecamatan'=>$model['KDKEC']]] , []);
                            return $hasil;
                            // return $model['anyamanbambu'];
                         },
            ],
            [
              'label'=>'Batang Kayu',
              'attribute'=>'batangkayu',
              'hAlign' => 'right',
              'pageSummary' => true,
              'pageSummary' => Html::a('<font color="blue"><b>'.Bdtrt::find()->where("dinding = 'Batang Kayu'")->count().'</b></font>', ['bdtrt/listbdtrt', ['kondisi_dinding'=>'batangkayu',]] ),
              'format' => 'html',
              'value' => function ($model) {
                            $hasil=Html::a('<font color="orange"><b>'.$model['batangkayu'].'</b></font>', ['bdtrt/listbdtrt',['kondisi_dinding'=>'batangkayu','kodekecamatan'=>$model['KDKEC']]] , []);
                            return $hasil;
                            // return $model['batangkayu'];
                         },
            ],
            [
              'label'=>'Bambu',
              'attribute'=>'bambu',
              'hAlign' => 'right',
              'pageSummary' => true,
              'pageSummary' => Html::a('<font color="blue"><b>'.Bdtrt::find()->where("dinding = 'Bambu'")->count().'</b></font>', ['bdtrt/listbdtrt', ['kondisi_dinding'=>'bambu',]] ),
              'format' => 'html',
              'value' => function ($model) {
                            $hasil=Html::a('<font color="orange"><b>'.$model['bambu'].'</b></font>', ['bdtrt/listbdtrt',['kondisi_dinding'=>'bambu','kodekecamatan'=>$model['KDKEC']]] , []);
                            return $hasil;
                            // return $model['bambu'];
                         },
            ],
            [
              'label'=>'Lainnya',
              'attribute'=>'lainnya',
              'hAlign' => 'right',
              'pageSummary' => true,
              'pageSummary' => Html::a('<font color="blue"><b>'.Bdtrt::find()->where("dinding = 'Lainnya'")->count().'</b></font>', ['bdtrt/listbdtrt', ['kondisi_dinding'=>'lainnya',]] ),
              'format' => 'html',
              'value' => function ($model) {
                            $hasil=Html::a('<font color="orange"><b>'.$model['lainnya'].'</b></font>', ['bdtrt/listbdtrt',['kondisi_dinding'=>'lainnya','kodekecamatan'=>$model['KDKEC']]] , []);
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
