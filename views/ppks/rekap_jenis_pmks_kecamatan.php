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

$this->title="REKAPITULASI JENIS PMKS PER KECAMATAN";
$dataProvider = new ArrayDataProvider([
    'allModels' => $rekap['ppks_jenis_pmks_perkecamatan'],
    'pagination' => false,
]);
?>
<div class="card shadow-sm border-0">
    <div class="card-header bg-navy text-white d-flex align-items-center">
        <i class="fa fa-book text-danger mr-2"></i> <span>REKAPITULASI JENIS PMKS PER KECAMATAN</span>
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
                        'label'=>'Kecamatan',
                        'attribute'=>'kecamatan',
                        'pageSummary' => 'TOTAL',
                        'format' => 'html',
                        'value' => function ($model) {
                            // dd($model);
                                       return $model["kecamatan"];
                                   },
                      ],
                      [
                        'label'=>'Anak Balita Terlantar',
                        'attribute'=>'anak_balita_terlantar',
                        'hAlign' => 'right',
                        'format'=>'decimal',
                        'pageSummary' => Html::a('<font color="blue"><b>'.Ppks::find()->where(['anak_balita_terlantar'=>1])->count().'</b></font>', ['ppks/index','anak_balita_terlantar'=>1] , []),
                        'format' => 'html',
                        'value' => function ($model) {
                            $hasil=Html::a('<font color="blue"><b>'.$model['anak_balita_terlantar'].'</b></font>', ['ppks/index','anak_balita_terlantar'=>1,'kecamatan'=>$model['kecamatan']] , []);
                            return $hasil;
                        },
                      ],
                      [
                        'label'=>'Anak Terlantar',
                        'attribute'=>'anak_terlantar',
                        'hAlign' => 'right',
                        'format'=>'decimal',
                        'pageSummary' => Html::a('<font color="blue"><b>'.Ppks::find()->where(['anak_terlantar'=>1])->count().'</b></font>', ['ppks/index','anak_terlantar'=>1] , []),
                        'format' => 'html',
                        'value' => function ($model) {
                            return Html::a('<font color="blue"><b>'.$model['anak_terlantar'].'</b></font>', ['ppks/index','anak_terlantar'=>1,'kecamatan'=>$model['kecamatan']] , []);
                        },
                    ],
                    [
                        'label'=>'Anak yang Berhadapan dengan Hukum',
                        'attribute'=>'anak_yang_berhadapan_dengan_hukum',
                        'hAlign' => 'right',
                        'format'=>'decimal',
                        'pageSummary' => Html::a('<font color="blue"><b>'.Ppks::find()->where(['anak_yang_berhadapan_dengan_hukum'=>1])->count().'</b></font>', ['ppks/index','anak_yang_berhadapan_dengan_hukum'=>1] , []),
                        'format' => 'html',
                        'value' => function ($model) {
                            return Html::a('<font color="blue"><b>'.$model['anak_yang_berhadapan_dengan_hukum'].'</b></font>', ['ppks/index','anak_yang_berhadapan_dengan_hukum'=>1,'kecamatan'=>$model['kecamatan']] , []);
                        },
                    ],
                    [
                        'label'=>'Anak Jalanan',
                        'attribute'=>'anak_jalanan',
                        'hAlign' => 'right',
                        'format'=>'decimal',
                        'pageSummary' => Html::a('<font color="blue"><b>'.Ppks::find()->where(['anak_jalanan'=>1])->count().'</b></font>', ['ppks/index','anak_jalanan'=>1] , []),
                        'format' => 'html',
                        'value' => function ($model) {
                            return Html::a('<font color="blue"><b>'.$model['anak_jalanan'].'</b></font>', ['ppks/index','anak_jalanan'=>1,'kecamatan'=>$model['kecamatan']] , []);
                        },
                    ],
                    [
                        'label'=>'Anak dengan Kedisabilitasan',
                        'attribute'=>'anak_dengan_kedisabilitasan',
                        'hAlign' => 'right',
                        'format'=>'decimal',
                        'pageSummary' => Html::a('<font color="blue"><b>'.Ppks::find()->where(['anak_dengan_kedisabilitasan'=>1])->count().'</b></font>', ['ppks/index','anak_dengan_kedisabilitasan'=>1] , []),
                        'format' => 'html',
                        'value' => function ($model) {
                            return Html::a('<font color="blue"><b>'.$model['anak_dengan_kedisabilitasan'].'</b></font>', ['ppks/index','anak_dengan_kedisabilitasan'=>1,'kecamatan'=>$model['kecamatan']] , []);
                        },
                    ],
                    [
                        'label'=>'Anak Korban Tindak Kekerasan',
                        'attribute'=>'anak_korban_tindak_kekerasan',
                        'hAlign' => 'right',
                        'format'=>'decimal',
                        'pageSummary' => Html::a('<font color="blue"><b>'.Ppks::find()->where(['anak_korban_tindak_kekerasan'=>1])->count().'</b></font>', ['ppks/index','anak_korban_tindak_kekerasan'=>1] , []),
                        'format' => 'html',
                        'value' => function ($model) {
                            return Html::a('<font color="blue"><b>'.$model['anak_korban_tindak_kekerasan'].'</b></font>', ['ppks/index','anak_korban_tindak_kekerasan'=>1,'kecamatan'=>$model['kecamatan']] , []);
                        },
                    ],
                    [
                        'label'=>'Anak yang Memerlukan Perlindungan Khusus',
                        'attribute'=>'anak_yang_memerlukan_perlindungan_khusus',
                        'hAlign' => 'right',
                        'format'=>'decimal',
                        'pageSummary' => Html::a('<font color="blue"><b>'.Ppks::find()->where(['anak_yang_memerlukan_perlindungan_khusus'=>1])->count().'</b></font>', ['ppks/index','anak_yang_memerlukan_perlindungan_khusus'=>1] , []),
                        'format' => 'html',
                        'value' => function ($model) {
                            return Html::a('<font color="blue"><b>'.$model['anak_yang_memerlukan_perlindungan_khusus'].'</b></font>', ['ppks/index','anak_yang_memerlukan_perlindungan_khusus'=>1,'kecamatan'=>$model['kecamatan']] , []);
                        },
                    ],
                    [
                        'label'=>'Lanjut Usia Terlantar',
                        'attribute'=>'lanjut_usia_terlantar',
                        'hAlign' => 'right',
                        'format'=>'decimal',
                        'pageSummary' => Html::a('<font color="blue"><b>'.Ppks::find()->where(['lanjut_usia_terlantar'=>1])->count().'</b></font>', ['ppks/index','lanjut_usia_terlantar'=>1] , []),
                        'format' => 'html',
                        'value' => function ($model) {
                            return Html::a('<font color="blue"><b>'.$model['lanjut_usia_terlantar'].'</b></font>', ['ppks/index','lanjut_usia_terlantar'=>1,'kecamatan'=>$model['kecamatan']] , []);
                        },
                    ],
                    [
                        'label'=>'Penyandang Disabilitas',
                        'attribute'=>'penyandang_disabilitas',
                        'hAlign' => 'right',
                        'format'=>'decimal',
                        'pageSummary' => Html::a('<font color="blue"><b>'.Ppks::find()->where(['penyandang_disabilitas'=>1])->count().'</b></font>', ['ppks/index','penyandang_disabilitas'=>1] , []),
                        'format' => 'html',
                        'value' => function ($model) {
                            return Html::a('<font color="blue"><b>'.$model['penyandang_disabilitas'].'</b></font>', ['ppks/index','penyandang_disabilitas'=>1,'kecamatan'=>$model['kecamatan']] , []);
                        },
                    ],
                    [
                        'label'=>'Tuna Susila',
                        'attribute'=>'tuna_susila',
                        'hAlign' => 'right',
                        'format'=>'decimal',
                        'pageSummary' => Html::a('<font color="blue"><b>'.Ppks::find()->where(['tuna_susila'=>1])->count().'</b></font>', ['ppks/index','tuna_susila'=>1] , []),
                        'format' => 'html',
                        'value' => function ($model) {
                            return Html::a('<font color="blue"><b>'.$model['tuna_susila'].'</b></font>', ['ppks/index','tuna_susila'=>1,'kecamatan'=>$model['kecamatan']] , []);
                        },
                    ],
                    [
                        'label'=>'Gelandangan',
                        'attribute'=>'gelandangan',
                        'hAlign' => 'right',
                        'format'=>'decimal',
                        'pageSummary' => Html::a('<font color="blue"><b>'.Ppks::find()->where(['gelandangan'=>1])->count().'</b></font>', ['ppks/index','gelandangan'=>1] , []),
                        'format' => 'html',
                        'value' => function ($model) {
                            return Html::a('<font color="blue"><b>'.$model['gelandangan'].'</b></font>', ['ppks/index','gelandangan'=>1,'kecamatan'=>$model['kecamatan']] , []);
                        },
                    ],
                    [
                        'label'=>'Pengemis',
                        'attribute'=>'pengemis',
                        'hAlign' => 'right',
                        'format'=>'decimal',
                        'pageSummary' => Html::a('<font color="blue"><b>'.Ppks::find()->where(['pengemis'=>1])->count().'</b></font>', ['ppks/index','pengemis'=>1] , []),
                        'format' => 'html',
                        'value' => function ($model) {
                            return Html::a('<font color="blue"><b>'.$model['pengemis'].'</b></font>', ['ppks/index','pengemis'=>1,'kecamatan'=>$model['kecamatan']] , []);
                        },
                    ],
                    [
                        'label'=>'Pemulung',
                        'attribute'=>'pemulung',
                        'hAlign' => 'right',
                        'format'=>'decimal',
                        'pageSummary' => Html::a('<font color="blue"><b>'.Ppks::find()->where(['pemulung'=>1])->count().'</b></font>', ['ppks/index','pemulung'=>1] , []),
                        'format' => 'html',
                        'value' => function ($model) {
                            return Html::a('<font color="blue"><b>'.$model['pemulung'].'</b></font>', ['ppks/index','pemulung'=>1,'kecamatan'=>$model['kecamatan']] , []);
                        },
                    ],
                    [
                        'label'=>'Kelompok Minoritas',
                        'attribute'=>'kelompok_minoritas',
                        'hAlign' => 'right',
                        'format'=>'decimal',
                        'pageSummary' => Html::a('<font color="blue"><b>'.Ppks::find()->where(['kelompok_minoritas'=>1])->count().'</b></font>', ['ppks/index','kelompok_minoritas'=>1] , []),
                        'format' => 'html',
                        'value' => function ($model) {
                            return Html::a('<font color="blue"><b>'.$model['kelompok_minoritas'].'</b></font>', ['ppks/index','kelompok_minoritas'=>1,'kecamatan'=>$model['kecamatan']] , []);
                        },
                    ],
                    [
                        'label'=>'Bekas Warga Binaan Lembaga Pemasyarakatan (BWBLP)',
                        'attribute'=>'bekas_warga_binaan_lembaga_pemasyarakatan',
                        'hAlign' => 'right',
                        'format'=>'decimal',
                        'pageSummary' => Html::a('<font color="blue"><b>'.Ppks::find()->where(['bekas_warga_binaan_lembaga_pemasyarakatan'=>1])->count().'</b></font>', ['ppks/index','bekas_warga_binaan_lembaga_pemasyarakatan'=>1] , []),
                        'format' => 'html',
                        'value' => function ($model) {
                            return Html::a('<font color="blue"><b>'.$model['bekas_warga_binaan_lembaga_pemasyarakatan'].'</b></font>', ['ppks/index','bekas_warga_binaan_lembaga_pemasyarakatan'=>1,'kecamatan'=>$model['kecamatan']] , []);
                        },
                    ],
                    [
                        'label'=>'Orang dengan HIV/AIDS (ODHA)',
                        'attribute'=>'orang_dengan_hivaids',
                        'hAlign' => 'right',
                        'format'=>'decimal',
                        'pageSummary' => Html::a('<font color="blue"><b>'.Ppks::find()->where(['orang_dengan_hivaids'=>1])->count().'</b></font>', ['ppks/index','orang_dengan_hivaids'=>1] , []),
                        'format' => 'html',
                        'value' => function ($model) {
                            return Html::a('<font color="blue"><b>'.$model['orang_dengan_hivaids'].'</b></font>', ['ppks/index','orang_dengan_hivaids'=>1,'kecamatan'=>$model['kecamatan']] , []);
                        },
                    ],
                    [
                        'label'=>'Korban Penyalahgunaan NAPZA',
                        'attribute'=>'korban_penyalahgunaan_napza',
                        'hAlign' => 'right',
                        'format'=>'decimal',
                        'pageSummary' => Html::a('<font color="blue"><b>'.Ppks::find()->where(['korban_penyalahgunaan_napza'=>1])->count().'</b></font>', ['ppks/index','korban_penyalahgunaan_napza'=>1] , []),
                        'format' => 'html',
                        'value' => function ($model) {
                            return Html::a('<font color="blue"><b>'.$model['korban_penyalahgunaan_napza'].'</b></font>', ['ppks/index','korban_penyalahgunaan_napza'=>1,'kecamatan'=>$model['kecamatan']] , []);
                        },
                    ],
                    [
                        'label'=>'Korban Trafficking',
                        'attribute'=>'korban_trafficking',
                        'hAlign' => 'right',
                        'format'=>'decimal',
                        'pageSummary' => Html::a('<font color="blue"><b>'.Ppks::find()->where(['korban_trafficking'=>1])->count().'</b></font>', ['ppks/index','korban_trafficking'=>1] , []),
                        'format' => 'html',
                        'value' => function ($model) {
                            return Html::a('<font color="blue"><b>'.$model['korban_trafficking'].'</b></font>', ['ppks/index','korban_trafficking'=>1,'kecamatan'=>$model['kecamatan']] , []);
                        },
                    ],
                    [
                        'label'=>'Korban Tindak Kekerasan',
                        'attribute'=>'korban_tindak_kekerasan',
                        'hAlign' => 'right',
                        'format'=>'decimal',
                        'pageSummary' => Html::a('<font color="blue"><b>'.Ppks::find()->where(['korban_tindak_kekerasan'=>1])->count().'</b></font>', ['ppks/index','korban_tindak_kekerasan'=>1] , []),
                        'format' => 'html',
                        'value' => function ($model) {
                            return Html::a('<font color="blue"><b>'.$model['korban_tindak_kekerasan'].'</b></font>', ['ppks/index','korban_tindak_kekerasan'=>1,'kecamatan'=>$model['kecamatan']] , []);
                        },
                    ],
                    [
                        'label'=>'Pekerja Migran Bermasalah Sosial',
                        'attribute'=>'pekerja_migran_bermasalah_sosial',
                        'hAlign' => 'right',
                        'format'=>'decimal',
                        'pageSummary' => Html::a('<font color="blue"><b>'.Ppks::find()->where(['pekerja_migran_bermasalah_sosial'=>1])->count().'</b></font>', ['ppks/index','pekerja_migran_bermasalah_sosial'=>1] , []),
                        'format' => 'html',
                        'value' => function ($model) {
                            return Html::a('<font color="blue"><b>'.$model['pekerja_migran_bermasalah_sosial'].'</b></font>', ['ppks/index','pekerja_migran_bermasalah_sosial'=>1,'kecamatan'=>$model['kecamatan']] , []);
                        },
                    ],
                    [
                        'label'=>'Korban Bencana Alam',
                        'attribute'=>'korban_bencana_alam',
                        'hAlign' => 'right',
                        'format'=>'decimal',
                        'pageSummary' => Html::a('<font color="blue"><b>'.Ppks::find()->where(['korban_bencana_alam'=>1])->count().'</b></font>', ['ppks/index','korban_bencana_alam'=>1] , []),
                        'format' => 'html',
                        'value' => function ($model) {
                            return Html::a('<font color="blue"><b>'.$model['korban_bencana_alam'].'</b></font>', ['ppks/index','korban_bencana_alam'=>1,'kecamatan'=>$model['kecamatan']] , []);
                        },
                    ],
                    [
                        'label'=>'Korban Bencana Sosial',
                        'attribute'=>'korban_bencana_sosial',
                        'hAlign' => 'right',
                        'format'=>'decimal',
                        'pageSummary' => Html::a('<font color="blue"><b>'.Ppks::find()->where(['korban_bencana_sosial'=>1])->count().'</b></font>', ['ppks/index','korban_bencana_sosial'=>1] , []),
                        'format' => 'html',
                        'value' => function ($model) {
                            return Html::a('<font color="blue"><b>'.$model['korban_bencana_sosial'].'</b></font>', ['ppks/index','korban_bencana_sosial'=>1,'kecamatan'=>$model['kecamatan']] , []);
                        },
                    ],
                    [
                        'label'=>'Perempuan Rawan Sosial Ekonomi',
                        'attribute'=>'perempuan_rawan_sosial_ekonomi',
                        'hAlign' => 'right',
                        'format'=>'decimal',
                        'pageSummary' => Html::a('<font color="blue"><b>'.Ppks::find()->where(['perempuan_rawan_sosial_ekonomi'=>1])->count().'</b></font>', ['ppks/index','perempuan_rawan_sosial_ekonomi'=>1] , []),
                        'format' => 'html',
                        'value' => function ($model) {
                            return Html::a('<font color="blue"><b>'.$model['perempuan_rawan_sosial_ekonomi'].'</b></font>', ['ppks/index','perempuan_rawan_sosial_ekonomi'=>1,'kecamatan'=>$model['kecamatan']] , []);
                        },
                    ],
                    [
                        'label'=>'Fakir Miskin',
                        'attribute'=>'fakir_miskin',
                        'hAlign' => 'right',
                        'format'=>'decimal',
                        'pageSummary' => Html::a('<font color="blue"><b>'.Ppks::find()->where(['fakir_miskin'=>1])->count().'</b></font>', ['ppks/index','fakir_miskin'=>1] , []),
                        'format' => 'html',
                        'value' => function ($model) {
                            return Html::a('<font color="blue"><b>'.$model['fakir_miskin'].'</b></font>', ['ppks/index','fakir_miskin'=>1,'kecamatan'=>$model['kecamatan']] , []);
                        },
                    ],
                    [
                        'label'=>'Keluarga Bermasalah Sosial Psikologis',
                        'attribute'=>'keluarga_bermasalah_sosial_psikologis',
                        'hAlign' => 'right',
                        'format'=>'decimal',
                        'pageSummary' => Html::a('<font color="blue"><b>'.Ppks::find()->where(['keluarga_bermasalah_sosial_psikologis'=>1])->count().'</b></font>', ['ppks/index','keluarga_bermasalah_sosial_psikologis'=>1] , []),
                        'format' => 'html',
                        'value' => function ($model) {
                            return Html::a('<font color="blue"><b>'.$model['keluarga_bermasalah_sosial_psikologis'].'</b></font>', ['ppks/index','keluarga_bermasalah_sosial_psikologis'=>1,'kecamatan'=>$model['kecamatan']] , []);
                        },
                    ],
                    [
                        'label'=>'Komunitas Adat Terpencil (KAT)',
                        'attribute'=>'komunitas_adat_terpencil',
                        'hAlign' => 'right',
                        'format'=>'decimal',
                        'pageSummary' => Html::a('<font color="blue"><b>'.Ppks::find()->where(['komunitas_adat_terpencil'=>1])->count().'</b></font>', ['ppks/index','komunitas_adat_terpencil'=>1] , []),
                        'format' => 'html',
                        'value' => function ($model) {
                            return Html::a('<font color="blue"><b>'.$model['komunitas_adat_terpencil'].'</b></font>', ['ppks/index','komunitas_adat_terpencil'=>1,'kecamatan'=>$model['kecamatan']] , []);
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
                <?=$this->render('grafik/grafik_jenis_pmks_kecamatan', ['rekap' => $rekap['ppks_jenis_pmks_perkecamatan']]) ?>
            </div>

            <div class="tab-pane fade" id="presentase" role="tabpanel" aria-labelledby="presentase-tab">
                <?= $this->render('presentase/presentase_jenis_pmks_kecamatan', ['rekap' => $rekap['ppks_jenis_pmks_perkecamatan']]) ?>
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
