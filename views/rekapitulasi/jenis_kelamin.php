<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\export\ExportMenu;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;
use app\models\Bdtart;
use app\models\Kecamatan;
use app\models\Dokumen;
use app\models\Bdtrt;
use miloschuman\highcharts\HighchartsAsset;
 $dataProvider = new ArrayDataProvider([
        'allModels' => $jenis_kelamin['jenis_kelamin'],
    ]);

?>
      <div class="row">
        <div class="col-md-12">
          <div class="nav-tabs-custom box box-success box-solid">
            <ul class="nav nav-tabs pull-right">
              <li><a href="#tab_1-1" data-toggle="tab">PRESENTASE</a></li>
              <li><a href="#tab_2-2" data-toggle="tab">GRAFIK</a></li>
              <li class="active"><a href="#tab_3-2" data-toggle="tab">TABLE</a></li>
              <li class="pull-left header text-blue"><i class="fa fa-book text-red"></i> REKAPITULASI JENIS KELAMIN</li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane" id="tab_1-1">
                 <?= $this->render('presentase/presentase_jenis_kelamin', [
				        'jenis_kelamin' => $jenis_kelamin,
				    ]) ?>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2-2">
                 <?= $this->render('grafik/grafik_jenis_kelamin', [
			        'jenis_kelamin' => $jenis_kelamin,
			    ]) ?>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane active" id="tab_3-2">
               <?php
       //        $this->render('table/table_jenis_kelamin', [
			    //     'jenis_kelamin' => $jenis_kelamin,
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
              'label'=>'Laki-Laki',
              'attribute'=>'pria',
              'hAlign' => 'right',
              'pageSummary'=>true,
               'pageSummary' => Html::a('<font color="red"><b>'.Bdtart::find()->where(['JnsKel'=>'Laki-Laki'])->count().'</b></font>', ['bdtart/listbdtart', ['jenis_kelamin'=>'Laki-Laki',]] ),
              // 'pageSummaryOptions' => ['class' =>'text-red'],
              'format' => 'raw',
              'value' => function ($model) {
                          $hasil=Html::a('<font color="red"><b>'.$model['pria'].'</b></font>', ['bdtart/listbdtart',[
                            'kodekecamatan'=>$model['KDKEC'],
                            'jenis_kelamin'=>'Laki-Laki',
                            ]] , []);
                          return $hasil;
                            // return $model['pria'];
                         },
            ],
            [
              'label'=>'Perempuan',
              'attribute'=>'perempuan',
              'hAlign' => 'right',
              // 'format'=>'decimal',
               'pageSummary'=>true,
               'pageSummary' => Html::a('<font color="green"><b>'.Bdtart::find()->where(['JnsKel'=>'Perempuan'])->count().'</b></font>', ['bdtart/listbdtart', ['jenis_kelamin'=>'Perempuan',]] ),
              'format' => 'html',
              'value' => function ($model) {
                          $hasil=Html::a('<font color="green"><b>'.$model['perempuan'].'</b></font>', ['bdtart/listbdtart',[
                            'kodekecamatan'=>$model['KDKEC'],
                            'jenis_kelamin'=>'Perempuan',
                            ]] , []);
                          return $hasil;
                         },
            ],
            // [
            //   'label'=>'Jumlah Keluarga',
            //   'attribute'=>'keluarga',
            //   'hAlign' => 'right',
            //   'pageSummary' => true,
            //   'format' => 'html',
            //   'value' => function ($model) {
            //                 return $model['keluarga'];
            //              },
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
