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
        'allModels' => $disabilitas['disabilitas'],
    ]);
?>
      <div class="row">
        <div class="col-md-12">
          <div class="nav-tabs-custom box box-success box-solid">
            <ul class="nav nav-tabs pull-right">
              <li><a href="#tab_1-1" data-toggle="tab">PRESENTASE</a></li>
              <li><a href="#tab_2-2" data-toggle="tab">GRAFIK</a></li>
              <li class="active"><a href="#tab_3-2" data-toggle="tab">TABLE</a></li>
              <li class="pull-left header text-blue"><i class="fa fa-book text-red"></i> REKAPITULASI DISABILITAS</li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane" id="tab_1-1">
                 <?= $this->render('presentase/presentase_disabilitas', [
				        'disabilitas' => $disabilitas,
				    ]) ?>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2-2">
                 <?= $this->render('grafik/grafik_disabilitas', [
			        'disabilitas' => $disabilitas,
			    ]) ?>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane active" id="tab_3-2">
               <?php 
       //         $this->render('table/table_disabilitas', [
			    //     'disabilitas' => $disabilitas,
			    // ]) 

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
              'label'=>'Tunadaksa',
              'attribute'=>'tunadaksa',
              'hAlign' => 'right',
              'pageSummary' => true,
              'pageSummary' => Html::a('<font color="red"><b>'.Bdtart::find()->where("Jenis_cacat = 'Tuna daksa/cacat tubuh'")->count().'</b></font>', ['bdtart/listbdtart', ['disabilitas'=>'tunadaksa',]] ),
              // 'pageSummaryOptions' => ['class' =>'text-red'],
              'format' => 'raw',
              'value' => function ($model) {
                          $hasil=Html::a('<font color="red"><b>'.$model['tunadaksa'].'</b></font>', ['bdtart/listbdtart',['disabilitas'=>'tunadaksa','kodekecamatan'=>$model['KDKEC']]] , []);
                          return $hasil;
                         },
            ],
            [
              'label'=>'Tunanetra',
              'attribute'=>'tunanetra',
              'hAlign' => 'right',
              'format'=>'decimal',
              'pageSummary' => true,
              'pageSummary' => Html::a('<font color="blue"><b>'.Bdtart::find()->where("Jenis_cacat = 'Tuna netra/buta'")->count().'</b></font>', ['bdtart/listbdtart', ['disabilitas'=>'tunadaksa',]] ),
              'format' => 'html',
              'value' => function ($model) {
                          $hasil=Html::a('<font color="blue"><b>'.$model['tunanetra'].'</b></font>', ['bdtart/listbdtart',['disabilitas'=>'tunanetra','kodekecamatan'=>$model['KDKEC']]] , []);
                          return $hasil;
                         },
            ],
            [
              'label'=>'Tunarungu',
              'attribute'=>'tunarungu',
              'hAlign' => 'right',
              'pageSummary' => true,
              'pageSummary' => Html::a('<font color="blue"><b>'.Bdtart::find()->where("Jenis_cacat = 'Tuna rungu'")->count().'</b></font>', ['bdtart/listbdtart', ['disabilitas'=>'tunarungu',]] ),
              'format' => 'html',
              'value' => function ($model) {
                $hasil=Html::a('<font color="orange"><b>'.$model['tunarungu'].'</b></font>', ['bdtart/listbdtart',['disabilitas'=>'tunarungu','kodekecamatan'=>$model['KDKEC']]] , []);
                          return $hasil;
                         },
            ],
            [
              'label'=>'Tunawicara',
              'attribute'=>'tunawicara',
              'hAlign' => 'right',
              'pageSummary' => true,
              'pageSummary' => Html::a('<font color="blue"><b>'.Bdtart::find()->where("Jenis_cacat = 'Tuna wicara'")->count().'</b></font>', ['bdtart/listbdtart', ['disabilitas'=>'tunawicara',]] ),
              'format' => 'html',
              'value' => function ($model) {
                          $hasil=Html::a('<font color="orange"><b>'.$model['tunawicara'].'</b></font>', ['bdtart/listbdtart',['disabilitas'=>'tunawicara','kodekecamatan'=>$model['KDKEC']]] , []);
                          return $hasil;
                         },
            ],
            [
              'label'=>'Tunarunguwicara',
              'attribute'=>'tunarunguwicara',
              'hAlign' => 'right',
              'pageSummary' => true,
              'pageSummary' => Html::a('<font color="blue"><b>'.Bdtart::find()->where("Jenis_cacat = 'Tuna rungu & wicara'")->count().'</b></font>', ['bdtart/listbdtart', ['disabilitas'=>'tunarunguwicara',]] ),
              'format' => 'html',
              'value' => function ($model) {
                          $hasil=Html::a('<font color="orange"><b>'.$model['tunarunguwicara'].'</b></font>', ['bdtart/listbdtart',['disabilitas'=>'tunarunguwicara','kodekecamatan'=>$model['KDKEC']]] , []);
                          return $hasil;
                         },
            ],
            [
              'label'=>'Tunanetracacat',
              'attribute'=>'tunanetracacat',
              'hAlign' => 'right',
              'pageSummary' => true,
              'pageSummary' => Html::a('<font color="blue"><b>'.Bdtart::find()->where("Jenis_cacat = 'Tuna netra & cacat tubuh'")->count().'</b></font>', ['bdtart/listbdtart', ['disabilitas'=>'tunanetracacat',]] ),
              'format' => 'html',
              'value' => function ($model) {
                          $hasil=Html::a('<font color="orange"><b>'.$model['tunanetracacat'].'</b></font>', ['bdtart/listbdtart',['disabilitas'=>'tunanetracacat','kodekecamatan'=>$model['KDKEC']]] , []);
                          return $hasil;
                         },
            ],
            [
              'label'=>'Tunanetrarunguwicara',
              'attribute'=>'tunanetrarunguwicara',
              'hAlign' => 'right',
              'pageSummary' => true,
              'pageSummary' => Html::a('<font color="blue"><b>'.Bdtart::find()->where("Jenis_cacat = 'Tuna netra, rungu,& wicara'")->count().'</b></font>', ['bdtart/listbdtart', ['disabilitas'=>'tunanetrarunguwicara',]] ),
              'format' => 'html',
              'value' => function ($model) {
                          $hasil=Html::a('<font color="orange"><b>'.$model['tunanetrarunguwicara'].'</b></font>', ['bdtart/listbdtart',['disabilitas'=>'tunanetrarunguwicara','kodekecamatan'=>$model['KDKEC']]] , []);
                          return $hasil;
                         },
            ],
            [
              'label'=>'Tunarunguwicaracacat',
              'attribute'=>'tunarunguwicaracacat',
              'hAlign' => 'right',
              'pageSummary' => true,
              'pageSummary' => Html::a('<font color="blue"><b>'.Bdtart::find()->where("Jenis_cacat = 'Tuna rungu, wicara,& cacat tubuh'")->count().'</b></font>', ['bdtart/listbdtart', ['disabilitas'=>'tunarunguwicaracacat',]] ),
              'format' => 'html',
              'value' => function ($model) {
                          $hasil=Html::a('<font color="orange"><b>'.$model['tunarunguwicaracacat'].'</b></font>', ['bdtart/listbdtart',['disabilitas'=>'tunarunguwicaracacat','kodekecamatan'=>$model['KDKEC']]] , []);
                          return $hasil;

                         },
            ],
                        [
              'label'=>'Tunarunguwicaranetracacat',
              'attribute'=>'tunarunguwicaranetracacat',
              'hAlign' => 'right',
              'pageSummary' => true,
              'pageSummary' => Html::a('<font color="blue"><b>'.Bdtart::find()->where("Jenis_cacat = 'Tuna rungu, wicara,netra, & cacat tubuh'")->count().'</b></font>', ['bdtart/listbdtart', ['disabilitas'=>'tunarunguwicaranetracacat',]] ),
              'format' => 'html',
              'value' => function ($model) {
                          $hasil=Html::a('<font color="orange"><b>'.$model['tunarunguwicaranetracacat'].'</b></font>', ['bdtart/listbdtart',['disabilitas'=>'tunarunguwicaranetracacat','kodekecamatan'=>$model['KDKEC']]] , []);
                          return $hasil;
                            // return $model['tunarunguwicaranetracacat'];
                         },
            ],
            [
              'label'=>'Cacatmental',
              'attribute'=>'cacatmental',
              'hAlign' => 'right',
              'pageSummary' => true,
              'pageSummary' => Html::a('<font color="blue"><b>'.Bdtart::find()->where("Jenis_cacat = 'Cacat mental retardasi'")->count().'</b></font>', ['bdtart/listbdtart', ['disabilitas'=>'cacatmental',]] ),
              'format' => 'html',
              'value' => function ($model) {
                            $hasil=Html::a('<font color="orange"><b>'.$model['cacatmental'].'</b></font>', ['bdtart/listbdtart',['disabilitas'=>'cacatmental','kodekecamatan'=>$model['KDKEC']]] , []);
                          return $hasil;
                            // return $model['cacatmental'];
                         },
            ],
             [
              'label'=>'Mantangangguanjiwa',
              'attribute'=>'mantangangguanjiwa',
              'hAlign' => 'right',
              'pageSummary' => true,
              'pageSummary' => Html::a('<font color="blue"><b>'.Bdtart::find()->where("Jenis_cacat = 'Mantan penderita gangguan jiwa'")->count().'</b></font>', ['bdtart/listbdtart', ['disabilitas'=>'mantangangguanjiwa',]] ),
              'format' => 'html',
              'value' => function ($model) {
                            $hasil=Html::a('<font color="orange"><b>'.$model['mantangangguanjiwa'].'</b></font>', ['bdtart/listbdtart',['disabilitas'=>'mantangangguanjiwa','kodekecamatan'=>$model['KDKEC']]] , []);
                          return $hasil;
                            // return $model['mantangangguanjiwa'];
                         },
            ],
            [
              'label'=>'Cacatfisikmental',
              'attribute'=>'cacatfisikmental',
              'hAlign' => 'right',
              'pageSummary' => true,
              'pageSummary' => Html::a('<font color="blue"><b>'.Bdtart::find()->where("Jenis_cacat = 'Cacat fisik & mental'")->count().'</b></font>', ['bdtart/listbdtart', ['disabilitas'=>'cacatfisikmental',]] ),
              'format' => 'html',
              'value' => function ($model) {
                          $hasil=Html::a('<font color="orange"><b>'.$model['cacatfisikmental'].'</b></font>', ['bdtart/listbdtart',['disabilitas'=>'cacatfisikmental','kodekecamatan'=>$model['KDKEC']]] , []);
                          return $hasil;
                         },
            ],
            [
              'label'=>'Totalcacat',
              'attribute'=>'totalcacat',
              'hAlign' => 'right',
              'pageSummary' => true,
              'pageSummary' => Html::a('<font color="blue"><b>'.Bdtart::find()->where("Jenis_cacat != 'NULL' and Jenis_cacat != 'Tidak cacat'")->count().'</b></font>', ['bdtart/listbdtart', ['disabilitas'=>'totalcacat',]] ),
              'format' => 'html',
              'value' => function ($model) {
                          $hasil=Html::a('<font color="orange"><b>'.$model['totalcacat'].'</b></font>', ['bdtart/listbdtart',['disabilitas'=>'totalcacat','kodekecamatan'=>$model['KDKEC']]] , []);
                          return $hasil;
                         },
            ],
            // [
            //   'label'=>'Jumlah',
            //   'attribute'=>'jumlah',
            //   'hAlign' => 'right',
            //   'pageSummary' => true,
            //   'format' => 'html',
            //   'value' => function ($model) {
            //       return $model['jumlah'];
            //    },
            // ],
          
            
           
           
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
