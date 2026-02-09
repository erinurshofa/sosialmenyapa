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
        'allModels' => $lansia['lansia'],
    ]);
?>
      <div class="row">
        <div class="col-md-12">
          <div class="nav-tabs-custom box box-success box-solid">
            <ul class="nav nav-tabs pull-right">
              <li><a href="#tab_1-1" data-toggle="tab">PRESENTASE</a></li>
              <li><a href="#tab_2-2" data-toggle="tab">GRAFIK</a></li>
              <li class="active"><a href="#tab_3-2" data-toggle="tab">TABLE</a></li>
              <li class="pull-left header text-blue"><i class="fa fa-book text-red"></i> REKAPITULASI LANSIA</li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane" id="tab_1-1">
                 <?= $this->render('presentase/presentase_lansia', [
				        'lansia' => $lansia,
				    ]) ?>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2-2">
                 <?= $this->render('grafik/grafik_lansia', [
			        'lansia' => $lansia,
			    ]) ?>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane active" id="tab_3-2">
               <?php 
       //         $this->render('table/table_lansia', [
			    //     'lansia' => $lansia,
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
              'label'=>'Lansia Laki-Laki dan Perempuan',
              'attribute'=>'semua',
              'hAlign' => 'right',
              'pageSummary' => true,
              'pageSummary' => Html::a('<font color="orange"><b>'.Bdtart::find()->where("Umur >= 70")->count().'</b></font>', ['bdtart/listbdtart', ['lansia'=>'semua',]] ),
              // 'pageSummaryOptions' => ['class' =>'text-red'],
              'format' => 'raw',
              'value' => function ($model) {
                $hasil=Html::a('<font color="orange"><b>'.$model['semua'].'</b></font>', ['bdtart/listbdtart',['lansia'=>'semua','kodekecamatan'=>$model['KDKEC']]] , []);
                return $hasil;
                
                            // return $model['semua'];
                         },
            ],
            [
              'label'=>'Lansia Laki-Laki',
              'attribute'=>'lansiapria',
              'hAlign' => 'right',
              'format'=>'decimal',
              'pageSummary' => true,
              'pageSummary' => Html::a('<font color="red"><b>'.Bdtart::find()->where("Umur >= 70 and JnsKel = 'Laki-Laki'")->count().'</b></font>', ['bdtart/listbdtart', ['lansia'=>'lansiapria',]] ),
              'format' => 'html',
              'value' => function ($model) {
                         $hasil=Html::a('<font color="red"><b>'.$model['lansiapria'].'</b></font>', ['bdtart/listbdtart',['lansia'=>'lansiapria','kodekecamatan'=>$model['KDKEC']]] , []);
                          return $hasil;
                          // return $model['lansiapria'];
                         },
            ],
            [
              'label'=>'Lansia Perempuan',
              'attribute'=>'lansiaperempuan',
              'hAlign' => 'right',
              'pageSummary' => true,
              'pageSummary' => Html::a('<font color="blue"><b>'.Bdtart::find()->where("Umur >= 70 and JnsKel = 'Perempuan'")->count().'</b></font>', ['bdtart/listbdtart', ['lansia'=>'lansiaperempuan',]] ),
              'format' => 'html',
              'value' => function ($model) {
                            $hasil=Html::a('<font color="blue"><b>'.$model['lansiaperempuan'].'</b></font>', ['bdtart/listbdtart',['lansia'=>'lansiaperempuan','kodekecamatan'=>$model['KDKEC']]] , []);
                          return $hasil;
                            // return $model['lansiaperempuan'];
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
