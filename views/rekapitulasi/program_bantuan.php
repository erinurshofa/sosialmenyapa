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
        'allModels' => $program_bantuan['program_bantuan'],
    ]);
?>
      <div class="row">
        <div class="col-md-12">
          <div class="nav-tabs-custom box box-success box-solid">
            <ul class="nav nav-tabs pull-right">
              <li><a href="#tab_1-1" data-toggle="tab">PRESENTASE</a></li>
              <li><a href="#tab_2-2" data-toggle="tab">GRAFIK</a></li>
              <li class="active"><a href="#tab_3-2" data-toggle="tab">TABLE</a></li>
              <li class="pull-left header text-blue"><i class="fa fa-book text-red"></i> REKAPITULASI BANTUAN</li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane" id="tab_1-1">
                 <?= $this->render('presentase/presentase_program_bantuan', [
				        'program_bantuan' => $program_bantuan,
				    ]) ?>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2-2">
                 <?= $this->render('grafik/grafik_program_bantuan', [
			        'program_bantuan' => $program_bantuan,
			    ]) ?>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane active" id="tab_3-2">
               <?php
       //          $this->render('table/table_program_bantuan', [
			    //     'program_bantuan' => $program_bantuan,
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
              'label'=>'Status KKS',
              'attribute'=>'statuskks',
              'hAlign' => 'right',
              'pageSummary' => true,
              'pageSummary' => Html::a('<font color="blue"><b>'.Bdtrt::find()->where("sta_kks = 'Ya'")->count().'</b></font>', ['bdtrt/listbdtrt', ['program_bantuan'=>'statuskks',]] ),
              'format' => 'html',
              'value' => function ($model) {
                            $hasil=Html::a('<font color="orange"><b>'.$model['statuskks'].'</b></font>', ['bdtrt/listbdtrt',['program_bantuan'=>'statuskks','kodekecamatan'=>$model['KDKEC']]] , []);
                            return $hasil;
                             // return $model['statuskks'];
                         },
            ],
             [
              'label'=>'Status KIP',
              'attribute'=>'statuskip',
              'hAlign' => 'right',
              'pageSummary' => true,
              'pageSummary' => Html::a('<font color="blue"><b>'.Bdtrt::find()->where("sta_kip = 'Ya'")->count().'</b></font>', ['bdtrt/listbdtrt', ['program_bantuan'=>'statuskip',]] ),
              'format' => 'raw',
              'value' => function ($model) {
                           $hasil=Html::a('<font color="orange"><b>'.$model['statuskip'].'</b></font>', ['bdtrt/listbdtrt',['program_bantuan'=>'statuskip','kodekecamatan'=>$model['KDKEC']]] , []);
                            return $hasil;
                         },
            ],
            [
              'label'=>'Status KIS',
              'attribute'=>'statuskis',
              'hAlign' => 'right',
              'format'=>'decimal',
              'pageSummary' => true,
              'pageSummary' => Html::a('<font color="blue"><b>'.Bdtrt::find()->where("sta_kis = 'Ya'")->count().'</b></font>', ['bdtrt/listbdtrt', ['program_bantuan'=>'statuskis',]] ),
              'format' => 'html',
              'value' => function ($model) {
                           $hasil=Html::a('<font color="orange"><b>'.$model['statuskis'].'</b></font>', ['bdtrt/listbdtrt',['program_bantuan'=>'statuskis','kodekecamatan'=>$model['KDKEC']]] , []);
                            return $hasil;

                         },
            ],
            [
              'label'=>'Status BPJS Mandiri',
              'attribute'=>'statusbpjsmandiri',
              'hAlign' => 'right',
              'pageSummary' => true,
              'pageSummary' => Html::a('<font color="blue"><b>'.Bdtrt::find()->where("sta_bpjs_mandiri = 'Ya'")->count().'</b></font>', ['bdtrt/listbdtrt', ['program_bantuan'=>'statusbpjsmandiri',]] ),
              'format' => 'html',
              'value' => function ($model) {
                           $hasil=Html::a('<font color="orange"><b>'.$model['statusbpjsmandiri'].'</b></font>', ['bdtrt/listbdtrt',['program_bantuan'=>'statusbpjsmandiri','kodekecamatan'=>$model['KDKEC']]] , []);
                            return $hasil;
                         },
            ],
            [
              'label'=>'Status Jamsostek',
              'attribute'=>'statusjamsostek',
              'hAlign' => 'right',
              'pageSummary' => true,
              'pageSummary' => Html::a('<font color="blue"><b>'.Bdtrt::find()->where("sta_jamsostek = 'Ya'")->count().'</b></font>', ['bdtrt/listbdtrt', ['program_bantuan'=>'statusjamsostek',]] ),
              'format' => 'html',
              'value' => function ($model) {
                           $hasil=Html::a('<font color="orange"><b>'.$model['statusjamsostek'].'</b></font>', ['bdtrt/listbdtrt',['program_bantuan'=>'statusjamsostek','kodekecamatan'=>$model['KDKEC']]] , []);
                            return $hasil; 
                            // return $model['statusjamsostek'];
                         },
            ],
            [
              'label'=>'Status Asuransi',
              'attribute'=>'statusasuransi',
              'hAlign' => 'right',
              'pageSummary' => true,
              'pageSummary' => Html::a('<font color="blue"><b>'.Bdtrt::find()->where("sta_asuransi = 'Ya'")->count().'</b></font>', ['bdtrt/listbdtrt', ['program_bantuan'=>'statusasuransi',]] ),
              'format' => 'html',
              'value' => function ($model) {
                            $hasil=Html::a('<font color="orange"><b>'.$model['statusasuransi'].'</b></font>', ['bdtrt/listbdtrt',['program_bantuan'=>'statusasuransi','kodekecamatan'=>$model['KDKEC']]] , []);
                            return $hasil; 
                            // return $model['statusasuransi'];
                         },
            ],
            [
              'label'=>'Status PKH',
              'attribute'=>'statuspkh',
              'hAlign' => 'right',
              'pageSummary' => true,
              'pageSummary' => Html::a('<font color="blue"><b>'.Bdtrt::find()->where("sta_pkh = 'Ya'")->count().'</b></font>', ['bdtrt/listbdtrt', ['program_bantuan'=>'statuspkh',]] ),
              'format' => 'html',
              'value' => function ($model) {
                            $hasil=Html::a('<font color="orange"><b>'.$model['statuspkh'].'</b></font>', ['bdtrt/listbdtrt',['program_bantuan'=>'statuspkh','kodekecamatan'=>$model['KDKEC']]] , []);
                            return $hasil; 
                            // return $model['statuspkh'];
                         },
            ],
            [
              'label'=>'Status Sastra',
              'attribute'=>'statusrastra',
              'hAlign' => 'right',
              'pageSummary' => true,
              'pageSummary' => Html::a('<font color="blue"><b>'.Bdtrt::find()->where("sta_rastra = 'Ya'")->count().'</b></font>', ['bdtrt/listbdtrt', ['program_bantuan'=>'statusrastra',]] ),
              'format' => 'html',
              'value' => function ($model) {
                            $hasil=Html::a('<font color="orange"><b>'.$model['statusrastra'].'</b></font>', ['bdtrt/listbdtrt',['program_bantuan'=>'statusrastra','kodekecamatan'=>$model['KDKEC']]] , []);
                            return $hasil; 
                            // return $model['statusrastra'];
                         },
            ],
            [
              'label'=>'Status KUR',
              'attribute'=>'statuskur',
              'hAlign' => 'right',
              'pageSummary' => true,
              'pageSummary' => Html::a('<font color="blue"><b>'.Bdtrt::find()->where("sta_kur = 'Ya'")->count().'</b></font>', ['bdtrt/listbdtrt', ['program_bantuan'=>'statuskur',]] ),
              'format' => 'html',
              'value' => function ($model) {
                            $hasil=Html::a('<font color="orange"><b>'.$model['statuskur'].'</b></font>', ['bdtrt/listbdtrt',['program_bantuan'=>'statuskur','kodekecamatan'=>$model['KDKEC']]] , []);
                            return $hasil;
                            // return $model['statuskur'];
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
