<?php
use yii\helpers\Html;
use miloschuman\highcharts\HighchartsAsset;
use kartik\export\ExportMenu;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;
use app\models\Kecamatan;
use app\models\Dokumen;
use app\models\UsulanDtksKemensos;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\Covid19Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Rekapitulasi Usulan Dtks Kemensos Per Kecamatan';
$this->params['breadcrumbs'][] = $this->title;
ini_set('precision', '16');
?>
<?php
/* @var $this yii\web\View */



 $dataProvider = new ArrayDataProvider([
        'allModels' => @$usulan_dtks_kemensos['usulan_dtks_kemensos'],
    ]);
?>
      <div class="row">
        <div class="col-md-12">
          <div class="nav-tabs-custom box box-success box-solid">
            <ul class="nav nav-tabs pull-right">
              <li class="active"><a href="#tab_3-2" data-toggle="tab">TABLE</a></li>
              <li class="pull-left header text-blue"><i class="fa fa-book text-red"></i> Rekapitulasi Data Usulan Dtks Kemensos


              </li>
            </ul>
            <div class="tab-content">
             
              <!-- /.tab-pane -->
              <div class="tab-pane active" id="tab_3-2">

<?php
$gridColumns = [
    ['class' => 'kartik\grid\SerialColumn'],
           [
              'label'=>'Kecamatan',
              'attribute'=>'Nama',
              'pageSummary'=>'Total',
              'format' => 'html',
              'value' => function ($model) {
                              return $model['Nama'];
                         },
            ],
            //            [
            //   'label'=>'Perempuan',
            //   'attribute'=>'Perempuan',
            //   // 'pageSummary'=>'Total',
            //   'format' => 'html',
            //   'value' => function ($model) {
            //                   return $model['Perempuan'];
            //              },
            // ],
            // [
            //   'label'=>'Pria',
            //   'attribute'=>'Pria',
            //   // 'pageSummary'=>'Total',
            //   'format' => 'html',
            //   'value' => function ($model) {
            //                   return $model['Pria'];
            //              },
            // ],
            [
              'label'=>'jumlah',
              'attribute'=>'jmltotal',
              'pageSummary' => Html::a('<font color="red"><b>'.UsulanDtksKemensos::find()->count().'</b></font>', ['usulan-dtks-kemensos/rekapdata'] , []),
              'pageSummaryOptions' => ['class' =>'text-red'],
              'format' => 'html',
              'value' => function ($model) {
                            $hasil=Html::a('<font color="red"><b>'.$model['jmltotal'].'</b></font>', ['usulan-dtks-kemensos/rekapdata','kode_kecamatan'=>$model['kode_kecamatan']] , []);
                            return $hasil;
                           // return $model['jumlah'];
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
