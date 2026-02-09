<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;
use kartik\grid\GridView;
use kartik\export\ExportMenu;
use yii\data\ArrayDataProvider;
use app\models\JenisPmks;
use miloschuman\highcharts\HighchartsAsset;

$dataProvider = new ArrayDataProvider([
    'allModels' => $rekap,
    'pagination' => false,
]);
$totalJumlah = array_sum(array_column($rekap, 'jumlah'));
?>
<div class="card shadow-sm border-0">
    <div class="card-header bg-navy text-white d-flex align-items-center">
        <i class="fa fa-book text-danger mr-2"></i> <span>REKAPITULASI JENIS PMKS</span>
    </div>
    <div class="card-body">
        <ul class="nav nav-tabs" id="rekapTabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="table-tab" data-toggle="tab" href="#table" role="tab" aria-controls="table" aria-selected="true">TABLE</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="grafik-tab" data-toggle="tab" href="#grafik" role="tab" aria-controls="grafik" aria-selected="false">GRAFIK</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="presentase-tab" data-toggle="tab" href="#presentase" role="tab" aria-controls="presentase" aria-selected="false">PRESENTASE</a>
            </li>
        </ul>

        <div class="tab-content mt-3" id="rekapTabContent">
            <div class="tab-pane fade show active" id="table" role="tabpanel" aria-labelledby="table-tab">
                <?php
                $gridColumns = [
                    ['class' => 'kartik\grid\SerialColumn'],
                    [
                        'label' => 'Jenis PMKS',
                        'attribute' => 'kode',
                        'pageSummary' => 'TOTAL :',
                        'format' => 'raw',
                        'value' => function ($model) {
                            $value = JenisPmks::find()->where(['kode' => $model['kode']])->one();
                            $namaPmks = $value ? $value['nama'] : 'Tidak Ditemukan';
                            return Html::a('<font color="green"><b>' . $namaPmks . '</b></font>', Url::to(['ppks/index', 'jenis_pmks' => $model['kode']]));
                        },
                    ],
                    [
                        'label' => 'Jumlah',
                        'attribute' => 'jumlah',
                        'format' => 'raw',
                        'pageSummary' => $totalJumlah,
                        'value' => function ($model) {
                            return Html::a('<font color="green"><b>' . $model['jumlah'] . '</b></font>', Url::to(['ppks/index', 'jenis_pmks' => $model['kode']]));
                        },
                    ],
                ];

                echo ExportMenu::widget([
                    'dataProvider' => $dataProvider,
                    'columns' => $gridColumns,
                    'showPageSummary' => true,
                
                ]);

                echo GridView::widget([
                    'dataProvider' => $dataProvider,
                    'columns' => $gridColumns,
                    'responsive' => true,
                    'hover' => true,
                    'showPageSummary' => true,
                ]);
                ?>
            </div>

            <div class="tab-pane fade" id="grafik" role="tabpanel" aria-labelledby="grafik-tab">
                <?= $this->render('grafik/grafik_list_jenis_pmks', ['rekap' => $rekap]) ?>
            </div>

            <div class="tab-pane fade" id="presentase" role="tabpanel" aria-labelledby="presentase-tab">
                <p>tes presentase</p>
                <?= $this->render('presentase/presentase_list_jenis_pmks', ['rekap' => $rekap]) ?>
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
