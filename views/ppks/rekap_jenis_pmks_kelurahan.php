<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;
use kartik\grid\GridView;
use kartik\export\ExportMenu;
use yii\data\ArrayDataProvider;
use app\models\JenisPmks;
use app\models\Ppks;
use miloschuman\highcharts\HighchartsAsset;

$this->title="REKAPITULASI JENIS PMKS PER KELURAHAN";
$dataProvider = new ArrayDataProvider([
    'allModels' => $rekap['ppks_jenis_pmks_perkelurahan'],
    'pagination' => false,
]);
$kecamatan=@Yii::$app->request->queryParams['kecamatan'];
$kecamatan=strtoupper($kecamatan);
// dd($rekap);
// $totalJumlah = array_sum(array_column($rekap, 'jumlah'));
?>
<div class="card shadow-sm border-0">
    <div class="card-header bg-navy text-white d-flex align-items-center">
        <i class="fa fa-book text-danger mr-2"></i> <span>REKAPITULASI JENIS PMKS PER KELURAHAN</span>
    </div>
    <div class="card-body">
        <ul class="nav nav-tabs" id="rekapTabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="table-tab" data-toggle="tab" href="#table" role="tab" aria-controls="table" aria-selected="true">TABLE</a>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link" id="grafik-tab" data-toggle="tab" href="#grafik" role="tab" aria-controls="grafik" aria-selected="false">GRAFIK</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="presentase-tab" data-toggle="tab" href="#presentase" role="tab" aria-controls="presentase" aria-selected="false">PRESENTASE</a>
            </li> -->
        </ul>

        <div class="tab-content mt-3" id="rekapTabContent">
            <div class="tab-pane fade show active" id="table" role="tabpanel" aria-labelledby="table-tab">
                <?php
                $gridColumns = [
                    ['class' => 'kartik\grid\SerialColumn'],
                    [
                        'label'=>'Kelurahan',
                        'attribute'=>'kelurahan',
                        'pageSummary' => 'TOTAL',
                        'format' => 'html',
                        'value' => function ($model) {
                                       return $model["kelurahan"];
                                   },
                      ],
                      [
                        'label'=>'Anak Balita Terlantar',
                        'attribute'=>'anak_balita_terlantar',
                        'hAlign' => 'right',
                        'format'=>'decimal',
                        'pageSummary' => function($model){
                          $kecamatan=@Yii::$app->request->queryParams['kecamatan'];
                          $kecamatan=strtoupper($kecamatan);
                          return Html::a('<font color="blue"><b>'.Ppks::find()->where(['anak_balita_terlantar'=>1,'kecamatan'=>$kecamatan])->count().'</b></font>', ['ppks/index','anak_balita_terlantar'=>1,'kecamatan'=>$kecamatan], []);
                        } ,
                        'format' => 'html',
                        'value' => function ($model) {
                            $hasil=Html::a('<font color="blue"><b>'.$model['anak_balita_terlantar'].'</b></font>', ['ppks/index','anak_balita_terlantar'=>1,'kecamatan'=>$model['kecamatan'],'kelurahan'=>$model['kelurahan']] , []);
                            return $hasil;
                        },
                      ],
                      [
                        'label'=>'Anak Terlantar',
                        'attribute'=>'anak_terlantar',
                        'hAlign' => 'right',
                        'format'=>'decimal',
                        'pageSummary' => function($model){
                          $kecamatan=@Yii::$app->request->queryParams['kecamatan'];
                          $kecamatan=strtoupper($kecamatan);
                          return Html::a('<font color="blue"><b>'.Ppks::find()->where(['anak_terlantar'=>1,'kecamatan'=>$kecamatan])->count().'</b></font>', ['ppks/index','anak_terlantar'=>1,'kecamatan'=>$kecamatan] , []);
                        },
                        // 'pageSummary' => Html::a('<font color="blue"><b>'.Ppks::find()->where(['anak_terlantar'=>1])->count().'</b></font>', ['ppks/index','anak_terlantar'=>1,'kecamatan'=>$kecamatan] , []),
                        'format' => 'html',
                        'value' => function ($model) {
                            return Html::a('<font color="blue"><b>'.$model['anak_terlantar'].'</b></font>', ['ppks/index','anak_terlantar'=>1,'kecamatan'=>$model['kecamatan'],'kelurahan'=>$model['kelurahan']] , []);
                        },
                    ],
                    [
                        'label'=>'Anak yang Berhadapan dengan Hukum',
                        'attribute'=>'anak_yang_berhadapan_dengan_hukum',
                        'hAlign' => 'right',
                        'format'=>'decimal',
                        'pageSummary' => function($model){
                          $kecamatan=@Yii::$app->request->queryParams['kecamatan'];
                          $kecamatan=strtoupper($kecamatan);
                          return Html::a('<font color="blue"><b>'.Ppks::find()->where(['anak_yang_berhadapan_dengan_hukum'=>1,'kecamatan'=>$kecamatan])->count().'</b></font>', ['ppks/index','anak_yang_berhadapan_dengan_hukum'=>1,'kecamatan'=>$kecamatan] , []);
                        },
                        // 'pageSummary' => Html::a('<font color="blue"><b>'.Ppks::find()->where(['anak_yang_berhadapan_dengan_hukum'=>1])->count().'</b></font>', ['ppks/index','anak_yang_berhadapan_dengan_hukum'=>1,'kecamatan'=>$kecamatan] , []),
                        'format' => 'html',
                        'value' => function ($model) {
                            return Html::a('<font color="blue"><b>'.$model['anak_yang_berhadapan_dengan_hukum'].'</b></font>', ['ppks/index','anak_yang_berhadapan_dengan_hukum'=>1,'kecamatan'=>$model['kecamatan'],'kelurahan'=>$model['kelurahan']] , []);
                        },
                    ],
                    [
                        'label'=>'Anak Jalanan',
                        'attribute'=>'anak_jalanan',
                        'hAlign' => 'right',
                        'format'=>'decimal',
                        'pageSummary' => function($model){
                          $kecamatan=@Yii::$app->request->queryParams['kecamatan'];
                          $kecamatan=strtoupper($kecamatan);
                          return Html::a('<font color="blue"><b>'.Ppks::find()->where(['anak_jalanan'=>1,'kecamatan'=>$kecamatan])->count().'</b></font>', ['ppks/index','anak_jalanan'=>1,'kecamatan'=>$kecamatan] , []);
                        },
                        // 'pageSummary' => Html::a('<font color="blue"><b>'.Ppks::find()->where(['anak_jalanan'=>1])->count().'</b></font>', ['ppks/index','anak_jalanan'=>1,'kecamatan'=>$kecamatan] , []),
                        'format' => 'html',
                        'value' => function ($model) {
                            return Html::a('<font color="blue"><b>'.$model['anak_jalanan'].'</b></font>', ['ppks/index','anak_jalanan'=>1,'kecamatan'=>$model['kecamatan'],'kelurahan'=>$model['kelurahan']] , []);
                        },
                    ],
                    [
                        'label'=>'Anak dengan Kedisabilitasan',
                        'attribute'=>'anak_dengan_kedisabilitasan',
                        'hAlign' => 'right',
                        'format'=>'decimal',
                        'pageSummary' => function($model){
                          $kecamatan=@Yii::$app->request->queryParams['kecamatan'];
                          $kecamatan=strtoupper($kecamatan);
                          return Html::a('<font color="blue"><b>'.Ppks::find()->where(['anak_dengan_kedisabilitasan'=>1,'kecamatan'=>$kecamatan])->count().'</b></font>', ['ppks/index','anak_dengan_kedisabilitasan'=>1,'kecamatan'=>$kecamatan] , []);
                        },
                        // 'pageSummary' => Html::a('<font color="blue"><b>'.Ppks::find()->where(['anak_dengan_kedisabilitasan'=>1])->count().'</b></font>', ['ppks/index','anak_dengan_kedisabilitasan'=>1,'kecamatan'=>$kecamatan] , []),
                        'format' => 'html',
                        'value' => function ($model) {
                            return Html::a('<font color="blue"><b>'.$model['anak_dengan_kedisabilitasan'].'</b></font>', ['ppks/index','anak_dengan_kedisabilitasan'=>1,'kecamatan'=>$model['kecamatan'],'kelurahan'=>$model['kelurahan']] , []);
                        },
                    ],
                    [
                        'label'=>'Anak Korban Tindak Kekerasan',
                        'attribute'=>'anak_korban_tindak_kekerasan',
                        'hAlign' => 'right',
                        'format'=>'decimal',
                        'pageSummary' => function($model){
                          $kecamatan=@Yii::$app->request->queryParams['kecamatan'];
                          $kecamatan=strtoupper($kecamatan);
                          return Html::a('<font color="blue"><b>'.Ppks::find()->where(['anak_korban_tindak_kekerasan'=>1,'kecamatan'=>$kecamatan])->count().'</b></font>', ['ppks/index','anak_korban_tindak_kekerasan'=>1,'kecamatan'=>$kecamatan] , []);
                        },
                        // 'pageSummary' => Html::a('<font color="blue"><b>'.Ppks::find()->where(['anak_korban_tindak_kekerasan'=>1])->count().'</b></font>', ['ppks/index','anak_korban_tindak_kekerasan'=>1,'kecamatan'=>$kecamatan] , []),
                        'format' => 'html',
                        'value' => function ($model) {
                            return Html::a('<font color="blue"><b>'.$model['anak_korban_tindak_kekerasan'].'</b></font>', ['ppks/index','anak_korban_tindak_kekerasan'=>1,'kecamatan'=>$model['kecamatan'],'kelurahan'=>$model['kelurahan']] , []);
                        },
                    ],
                    [
                        'label'=>'Anak yang Memerlukan Perlindungan Khusus',
                        'attribute'=>'anak_yang_memerlukan_perlindungan_khusus',
                        'hAlign' => 'right',
                        'format'=>'decimal',
                        'pageSummary' => function($model){
                          $kecamatan=@Yii::$app->request->queryParams['kecamatan'];
                          $kecamatan=strtoupper($kecamatan);
                          return Html::a('<font color="blue"><b>'.Ppks::find()->where(['anak_yang_memerlukan_perlindungan_khusus'=>1,'kecamatan'=>$kecamatan])->count().'</b></font>', ['ppks/index','anak_yang_memerlukan_perlindungan_khusus'=>1,'kecamatan'=>$kecamatan] , []);
                        },
                        // 'pageSummary' => Html::a('<font color="blue"><b>'.Ppks::find()->where(['anak_yang_memerlukan_perlindungan_khusus'=>1])->count().'</b></font>', ['ppks/index','anak_yang_memerlukan_perlindungan_khusus'=>1,'kecamatan'=>$kecamatan] , []),
                        'format' => 'html',
                        'value' => function ($model) {
                            return Html::a('<font color="blue"><b>'.$model['anak_yang_memerlukan_perlindungan_khusus'].'</b></font>', ['ppks/index','anak_yang_memerlukan_perlindungan_khusus'=>1,'kecamatan'=>$model['kecamatan'],'kelurahan'=>$model['kelurahan']] , []);
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

            <!-- <div class="tab-pane fade" id="grafik" role="tabpanel" aria-labelledby="grafik-tab"> -->
                <?php //$this->render('grafik/grafik_list_jenis_pmks', ['rekap' => $rekap]) ?>
            <!-- </div> -->

            <!-- <div class="tab-pane fade" id="presentase" role="tabpanel" aria-labelledby="presentase-tab"> -->
                <!-- <p>tes presentase</p> -->
                <?php //$this->render('presentase/presentase_list_jenis_pmks', ['rekap' => $rekap]) ?>
            <!-- </div> -->
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
