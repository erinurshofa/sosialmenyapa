<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use miloschuman\highcharts\HighchartsAsset;
use kartik\export\ExportMenu;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;
use app\models\Bdtart;
use app\models\Kecamatan;
use app\models\Dokumen;
use app\models\Bdtrt;
use kartik\grid\GridView;
 $dataProvider = new ArrayDataProvider([
        'allModels' => $desil['desil'],
    ]);
?>
      <div class="row">
        <div class="col-md-12">
          <div class="nav-tabs-custom box box-success box-solid">
            <ul class="nav nav-tabs pull-right">
              <li><a href="#tab_1-1" data-toggle="tab">PRESENTASE</a></li>
              <li><a href="#tab_2-2" data-toggle="tab">GRAFIK</a></li>
              <li class="active"><a href="#tab_3-2" data-toggle="tab">TABLE</a></li>
              <li class="pull-left header text-blue"><i class="fa fa-book text-red"></i> REKAPITULASI DESIL


              </li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane" id="tab_1-1">
                 <?= $this->render('presentase/presentase_desil', [
				        'desil' => $desil,
				    ]) ?>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2-2">
                 <?= $this->render('grafik/grafik_desil', [
			        'desil' => $desil,
			    ]) ?>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane active" id="tab_3-2">
               <?php 
       //         $this->render('table/table_desil', [
			    //     'desil' => $desil,
       //        'dataProvider'=>$dataProvider,
       //        'gridColumns'=>$gridColumns,
			    // ]) 
          ?>

<?php
$gridColumns = [
    ['class' => 'kartik\grid\SerialColumn'],
           [
              'label'=>'Kecamatan',
              'attribute'=>'kecamatan',
              'pageSummary'=>'Total',
              'format' => 'html',
              'value' => function ($model) {
                              return $model['kecamatan'];
                         },
            ],
            [
              'label'=>'Desil1',
              'attribute'=>'desil1',
              'pageSummary'=>true,
              'pageSummary' => Html::a('<font color="red"><b>'.Bdtrt::find()->where("percentile between 1 and 10")->count().'</b></font>', ['bdtrt/listbdtrt', ['percentile'=>'desil1',]] ),
              'format' => 'html',
              'value' => function ($model) {
                            $hasil=Html::a('<font color="red"><b>'.$model['desil1'].'</b></font>', ['bdtrt/listbdtrt',['percentile'=>'desil1','kodekecamatan'=>$model['KDKEC']]] , []);
                            return $hasil;
                           // return $model['desil1'];
                         },
            ],
            [
              'label'=>'Desil2',
              'attribute'=>'desil2',
              'pageSummary'=>true,
              'pageSummary' => Html::a('<font color="green"><b>'.Bdtrt::find()->where("percentile between 11 and 20")->count().'</b></font>', ['bdtrt/listbdtrt', ['percentile'=>'desil2',]] ),
              'format' => 'html',
              'value' => function ($model) {
                          $hasil=Html::a('<font color="green"><b>'.$model['desil2'].'</b></font>', ['bdtrt/listbdtrt',['percentile'=>'desil2','kodekecamatan'=>$model['KDKEC']]] , []);
                            return $hasil;
                           // return $model['desil2'];
                         },
            ],
            [
              'label'=>'Desil3',
              'attribute'=>'desil3',
              'pageSummary'=>true,
              'pageSummary' => Html::a('<font color="blue"><b>'.Bdtrt::find()->where("percentile between 21 and 30")->count().'</b></font>', ['bdtrt/listbdtrt', ['percentile'=>'desil3',]] ),
              'format' => 'html',
              'value' => function ($model) {
                  $hasil=Html::a('<font color="blue"><b>'.$model['desil3'].'</b></font>', ['bdtrt/listbdtrt',['percentile'=>'desil3','kodekecamatan'=>$model['KDKEC']]] , []);
                            return $hasil;
                              // return $model['desil3'];
                         },
            ],
            [
              'label'=>'Desil 4',
              'attribute'=>'desil4',
              'pageSummary'=>true,
              'pageSummary' => Html::a('<font><b>'.Bdtrt::find()->where("percentile between 31 and 40")->count().'</b></font>', ['bdtrt/listbdtrt', ['percentile'=>'desil4',]] ),
              'format' => 'html',
              'value' => function ($model) {
                $hasil=Html::a('<font><b>'.$model['desil4'].'</b></font>', ['bdtrt/listbdtrt',['percentile'=>'desil4','kodekecamatan'=>$model['KDKEC']]] , []);
                            return $hasil;
                           // return $model['desil4'];
                         },
            ],
             [
              'label'=>'Desil 4 Plus',
              'attribute'=>'desil4plus',
              'pageSummary'=>true,
              'pageSummary' => Html::a('<font color="orange"><b>'.Bdtrt::find()->where("percentile > 40")->count().'</b></font>', ['bdtrt/listbdtrt', ['percentile'=>'desil4plus',]] ),
              'format' => 'html',
              'value' => function ($model) {
                $hasil=Html::a('<font color="orange"><b>'.$model['desil4plus'].'</b></font>', ['bdtrt/listbdtrt',['percentile'=>'desil4plus','kodekecamatan'=>$model['KDKEC']]] , []);
                            return $hasil;
                           // return $model['desil4plus'];
                         },
            ],          
    // ['class' => 'yii\grid\ActionColumn'],
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
