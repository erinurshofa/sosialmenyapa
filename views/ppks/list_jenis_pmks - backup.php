<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;
use kartik\grid\GridView;
use kartik\export\ExportMenu;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;
use app\models\DtksMaret2022Dtks;
use app\models\Kecamatan;
use app\models\JenisPmks;
use miloschuman\highcharts\HighchartsAsset;

 $dataProvider = new ArrayDataProvider([
        'allModels' => $rekap,
        'pagination'=>false,
    ]);
    $totalJumlah = array_sum(array_column($rekap, 'jumlah'));
?>
<div class="card shadow-sm border-0">
    <div class="card-header bg-navy text-white d-flex align-items-center">
        <i class="fa fa-book text-danger me-2"></i> <span>REKAPITULASI JENIS PMKS</span>
    </div>
    <div class="card-body">
        <ul class="nav nav-tabs" id="rekapTabs" role="tablist">
          <li class="nav-item" role="presentation">
                <button class="nav-link active" id="table-tab" data-bs-toggle="tab" data-bs-target="#table" type="button" role="tab" aria-controls="table" aria-selected="true">TABLE</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="grafik-tab" data-bs-toggle="tab" data-bs-target="#grafik" type="button" role="tab" aria-controls="grafik" aria-selected="false">GRAFIK</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="presentase-tab" data-bs-toggle="tab" data-bs-target="#presentase" type="button" role="tab" aria-controls="presentase" aria-selected="false">PRESENTASE</button>
            </li>
            
            
        </ul>
        <div class="tab-content mt-3" id="rekapTabContent">
            <div class="tab-pane fade show active" id="table" role="tabpanel" aria-labelledby="table-tab">
            <?php
$gridColumns = [
    ['class' => 'kartik\grid\SerialColumn'],
    [
      'label'=>'Jenis PMKS',
      'attribute'=>'kode',
      'pageSummary' => 'TOTAL :',
      'format' => 'raw',
      'value' => function ($model) {
        $value = JenisPmks::find()->where(['kode' => $model['kode']])->one();
        $namaPmks = $value ? $value['nama'] : 'Tidak Ditemukan';
        $hasil = Html::a('<font color="green"><b>' . $namaPmks . '</b></font>', Url::to(['ppks/index', 'jenis_pmks' => $model['kode']]));
        return $hasil;        
      },
   ],
  [
    'label'=>'Jumlah',
    'attribute'=>'jumlah',
    'format' => 'raw',
    'pageSummary' => $totalJumlah,
    'value' => function ($model) {
      $hasil=Html::a('<font color="green"><b>'.$model['jumlah'].'</b></font>', Url::to(['ppks/index','jenis_pmks'=>$model['kode']]));
      return $hasil;
    },
  ],

];
  echo ExportMenu::widget([
    'dataProvider' => $dataProvider,
    'columns' => $gridColumns,
    'showPageSummary' => true,

]);

echo GridView::widget([
    'dataProvider'=> $dataProvider,
    'columns' => $gridColumns,
    'responsive'=>true,
    'hover'=>true,
    'showPageSummary' => true,
]);
?>

            </div>
            <div class="tab-pane fade" id="grafik" role="tabpanel" aria-labelledby="grafik-tab">
                tes grafik
                <?php //$this->render('grafik/grafik_list_jenis_pmks', ['rekap' => $rekap]) ?>
            </div>
            <div class="tab-pane fade" id="presentase" role="tabpanel" aria-labelledby="presentase-tab">
                <?php // $this->render('presentase/presentase_jenis_pmks', ['rekap' => $rekap]) ?>
                tes presentase
            </div>
           
            
        </div>
    </div>
</div>
<?php
$this->registerJs('
$(document).ready(function() {
    console.log("Dokumen siap, semua elemen seharusnya sudah dimuat.");
});

');
?>