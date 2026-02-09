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
        'allModels' => $status_kesejahteraan['status_kesejahteraan'],
    ]);
?>
      <div class="row">
        <div class="col-md-12">
          <div class="nav-tabs-custom box box-success box-solid">
            <ul class="nav nav-tabs pull-right">
              <li><a href="#tab_1-1" data-toggle="tab">PRESENTASE</a></li>
              <li><a href="#tab_2-2" data-toggle="tab">GRAFIK</a></li>
              <li class="active"><a href="#tab_3-2" data-toggle="tab">TABLE</a></li>
              <li class="pull-left header text-blue"><i class="fa fa-book text-red"></i> REKAPITULASI STATUS KESEJAHTERAAN


              </li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane" id="tab_1-1">
                 <?= $this->render('presentase/presentase_status_kesejahteraan', [
				        'status_kesejahteraan' => $status_kesejahteraan,
				    ]) ?>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2-2">
                 <?= $this->render('grafik/grafik_status_kesejahteraan', [
			        'status_kesejahteraan' => $status_kesejahteraan,
			    ]) ?>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane active" id="tab_3-2">

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
              'label'=>'Sangat Miskin',
              'attribute'=>'sk1',
              'pageSummary'=>true,
              'pageSummary' => Html::a('<font color="red"><b>'.Bdtrt::find()->where(['status_kesejahteraan'=>1])->count().'</b></font>', ['bdtrt/listbdtrt', ['status_kesejahteraan'=>'Sangat Miskin',]] ),
              'format' => 'html',
              'value' => function ($model) {
                            $hasil=Html::a('<font color="red"><b>'.$model['sangatmiskin'].'</b></font>', ['bdtrt/listbdtrt',['status_kesejahteraan'=>'Sangat Miskin','kodekecamatan'=>$model['KDKEC']]] , []);
                            return $hasil;
                         },
            ],
            [
              'label'=>'Miskin',
              'attribute'=>'sk2',
              'pageSummary'=>true,
              'pageSummary' => Html::a('<font color="green"><b>'.Bdtrt::find()->where(['status_kesejahteraan'=>2])->count().'</b></font>', ['bdtrt/listbdtrt', ['status_kesejahteraan'=>'Miskin',]] ),
              'format' => 'html',
              'value' => function ($model) {
                          $hasil=Html::a('<font color="green"><b>'.$model['miskin'].'</b></font>', ['bdtrt/listbdtrt',['status_kesejahteraan'=>'Miskin','kodekecamatan'=>$model['KDKEC']]] , []);
                            return $hasil;
                         },
            ],
            [
              'label'=>'Hampir Miskin',
              'attribute'=>'sk3',
              'pageSummary'=>true,
              'pageSummary' => Html::a('<font color="blue"><b>'.Bdtrt::find()->where(['status_kesejahteraan'=>3])->count().'</b></font>', ['bdtrt/listbdtrt', ['status_kesejahteraan'=>'Hampir Miskin',]] ),
              'format' => 'html',
              'value' => function ($model) {
                  $hasil=Html::a('<font color="blue"><b>'.$model['hampirmiskin'].'</b></font>', ['bdtrt/listbdtrt',['status_kesejahteraan'=>'Hampir Miskin','kodekecamatan'=>$model['KDKEC']]] , []);
                            return $hasil;
                         },
            ],
            [
              'label'=>'Rentan Miskin',
              'attribute'=>'sk4',
              'pageSummary'=>true,
              'pageSummary' => Html::a('<font><b>'.Bdtrt::find()->where(['status_kesejahteraan'=>4])->count().'</b></font>', ['bdtrt/listbdtrt', ['status_kesejahteraan'=>'Rentan Miskin',]] ),
              'format' => 'html',
              'value' => function ($model) {
                $hasil=Html::a('<font><b>'.$model['rentanmiskin'].'</b></font>', ['bdtrt/listbdtrt',['status_kesejahteraan'=>'Rentan Miskin','kodekecamatan'=>$model['KDKEC']]] , []);
                            return $hasil;
                         },
            ],
             [
              'label'=>'Menuju Middle Class',
              'attribute'=>'sk5',
              'pageSummary'=>true,
              'pageSummary' => Html::a('<font color="orange"><b>'.Bdtrt::find()->where(['status_kesejahteraan'=>5])->count().'</b></font>', ['bdtrt/listbdtrt', ['status_kesejahteraan'=>'Menuju Middle Class',]] ),
              'format' => 'html',
              'value' => function ($model) {
                $hasil=Html::a('<font color="orange"><b>'.$model['menujumiddleclass'].'</b></font>', ['bdtrt/listbdtrt',['status_kesejahteraan'=>'Menuju Middle Class','kodekecamatan'=>$model['KDKEC']]] , []);
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
