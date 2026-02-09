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
        'allModels' => $pendidikan['pendidikan'],
    ]);
?>
      <div class="row">
        <div class="col-md-12">
          <div class="nav-tabs-custom box box-success box-solid">
            <ul class="nav nav-tabs pull-right">
              <li><a href="#tab_1-1" data-toggle="tab">PRESENTASE</a></li>
              <li><a href="#tab_2-2" data-toggle="tab">GRAFIK</a></li>
              <li class="active"><a href="#tab_3-2" data-toggle="tab">TABLE</a></li>
              <li class="pull-left header text-blue"><i class="fa fa-book text-red"></i> REKAPITULASI PENDIDIKAN</li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane" id="tab_1-1">
                 <?= $this->render('presentase/presentase_pendidikan', [
				        'pendidikan' => $pendidikan,
				    ]) ?>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2-2">
                 <?= $this->render('grafik/grafik_pendidikan', [
			        'pendidikan' => $pendidikan,
			    ]) ?>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane active" id="tab_3-2">
             


               <?php 
       //         $this->render('table/table_pendidikan', [
			    //     'pendidikan' => $pendidikan,
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
              'label'=>'SD',
              'attribute'=>'sd',
              'hAlign' => 'right',
              'pageSummary' => true,
              'pageSummary' => Html::a('<font color="red"><b>'.Bdtart::find()->where("Umur BETWEEN 6 AND 12 AND Partisipasi_sekolah = 'Masih sekolah'")->count().'</b></font>', ['bdtart/listbdtart', ['pendidikan'=>'sd',]] ),
              'format' => 'html',
              'value' => function ($model) {
                           $hasil=Html::a('<font color="orange"><b>'.$model['sd'].'</b></font>', ['bdtart/listbdtart',['pendidikan'=>'sd','kodekecamatan'=>$model['KDKEC']]] , []);
                           return $hasil;
                         },
            ],
             [
              'label'=>'SD Tidak',
              'attribute'=>'sdtidak',
              'hAlign' => 'right',
              'pageSummary' => true,
              'pageSummary' => Html::a('<font color="red"><b>'.Bdtart::find()->where("Umur BETWEEN 6 AND 12 AND Partisipasi_sekolah = 'Tidak bersekolah lagi'")->count().'</b></font>', ['bdtart/listbdtart', ['pendidikan'=>'sdtidak',]] ),
              'format' => 'raw',
              'value' => function ($model) {
                         $hasil=Html::a('<font color="orange"><b>'.$model['sdtidak'].'</b></font>', ['bdtart/listbdtart',['pendidikan'=>'sdtidak','kodekecamatan'=>$model['KDKEC']]] , []);
                           return $hasil;
                         },
            ],
            [
              'label'=>'SMP',
              'attribute'=>'smp',
              'hAlign' => 'right',
              'format'=>'decimal',
              'pageSummary' => true,
              'pageSummary' => Html::a('<font color="red"><b>'.Bdtart::find()->where("Umur BETWEEN 13 AND 15 AND Partisipasi_sekolah = 'Masih sekolah'")->count().'</b></font>', ['bdtart/listbdtart', ['pendidikan'=>'smp',]] ),
              'format' => 'html',
              'value' => function ($model) {
                          $hasil=Html::a('<font color="orange"><b>'.$model['smp'].'</b></font>', ['bdtart/listbdtart',['pendidikan'=>'smp','kodekecamatan'=>$model['KDKEC']]] , []);
                           return $hasil;
                         },
            ],
            [
              'label'=>'SMP Tidak',
              'attribute'=>'smptidak',
              'hAlign' => 'right',
              'pageSummary' => true,
              'pageSummary' => Html::a('<font color="red"><b>'.Bdtart::find()->where("Umur BETWEEN 13 AND 15 AND Partisipasi_sekolah = 'Tidak bersekolah lagi'")->count().'</b></font>', ['bdtart/listbdtart', ['pendidikan'=>'smptidak',]] ),
              'format' => 'html',
              'value' => function ($model) {
                            $hasil=Html::a('<font color="orange"><b>'.$model['smptidak'].'</b></font>', ['bdtart/listbdtart',['pendidikan'=>'smptidak','kodekecamatan'=>$model['KDKEC']]] , []);
                           return $hasil;
                         },
            ],
            [
              'label'=>'SMA',
              'attribute'=>'sma',
              'hAlign' => 'right',
              'pageSummary' => true,
              'pageSummary' => Html::a('<font color="red"><b>'.Bdtart::find()->where("Umur BETWEEN 16 AND 18 AND Partisipasi_sekolah = 'Masih sekolah'")->count().'</b></font>', ['bdtart/listbdtart', ['pendidikan'=>'sma',]] ),
              'format' => 'html',
              'value' => function ($model) {
                            $hasil=Html::a('<font color="orange"><b>'.$model['sma'].'</b></font>', ['bdtart/listbdtart',['pendidikan'=>'sma','kodekecamatan'=>$model['KDKEC']]] , []);
                           return $hasil;
                         },
            ],
            [
              'label'=>'SMA Tidak',
              'attribute'=>'smatidak',
              'hAlign' => 'right',
              'pageSummary' => true,
              'pageSummary' => Html::a('<font color="red"><b>'.Bdtart::find()->where("Umur BETWEEN 16 AND 18 AND Partisipasi_sekolah = 'Tidak bersekolah lagi'")->count().'</b></font>', ['bdtart/listbdtart', ['pendidikan'=>'smatidak',]] ),
              'format' => 'html',
              'value' => function ($model) {
                          $hasil=Html::a('<font color="orange"><b>'.$model['smatidak'].'</b></font>', ['bdtart/listbdtart',['pendidikan'=>'smatidak','kodekecamatan'=>$model['KDKEC']]] , []);
                           return $hasil;
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
