<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Ppks */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ppks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box box-navy box-solid" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
    <div class="box-header bg-navy p-2">
        <i class="fa fa-fw fa-book"></i>
        <strong><?= Html::encode($this->title) ?></strong>
    </div>
    <div class="box-body">
<div class="ppks-view p-2">

    <h1><?= Html::encode($model->nama) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nama',
            'nik',
            'cek_double',
            'no_kk',
            'jenis_kelamin',
            'alamat:ntext',
            'rt',
            'rw',
            'kelurahan',
            'kecamatan',
            'jenis_ppks:ntext',
            'jenis_ppks_fix',
            'jenis_disabilitas',
            'sumber_data',
            'tempat_lahir',
            'tanggal_lahir',
            'punya_ktp',
            'masuk_dtks',
            // 'anak_balita_terlantar',
            // 'anak_terlantar',
            // 'anak_yang_berhadapan_dengan_hukum',
            // 'anak_jalanan',
            // 'anak_dengan_kedisabilitasan',
            // 'anak_dengan_kedisabilitasan_fisik',
            // 'anak_dengan_kedisabilitasan_intelektual',
            // 'anak_dengan_kedisabilitasan_mental',
            // 'anak_dengan_kedisabilitasan_sensorik',
            // 'anak_korban_tindak_kekerasan',
            // 'anak_yang_memerlukan_perlindungan_khusus',
            // 'lanjut_usia_terlantar',
            // 'penyandang_disabilitas',
            // 'penyandang_disabilitas_fisik',
            // 'penyandang_disabilitas_intelektual',
            // 'penyandang_disabilitas_mental',
            // 'penyandang_disabilitas_sensorik',
            // 'tuna_susila',
            // 'gelandangan',
            // 'pengemis',
            // 'pemulung',
            // 'kelompok_minoritas',
            // 'bekas_warga_binaan_lembaga_pemasyarakatan',
            // 'orang_dengan_hivaids',
            // 'korban_penyalahgunaan_napza',
            // 'korban_trafficking',
            // 'korban_tindak_kekerasan',
            // 'pekerja_migran_bermasalah_sosial',
            // 'korban_bencana_alam',
            // 'korban_bencana_sosial',
            // 'perempuan_rawan_sosial_ekonomi',
            // 'fakir_miskin',
            // 'keluarga_bermasalah_sosial_psikologis',
            // 'komunitas_adat_terpencil',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>

<div class="ppks-view p-2">
    <h4 class="mb-3">Kategori PPKS</h4>
    <table class="table table-bordered table-striped table-sm">
        <thead class="thead-dark">
            <tr>
                <th style="width: 5%">#</th>
                <th>Jenis Kategori</th>
                <th style="width: 10%">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $kategoriList = [
                'anak_balita_terlantar' => 'Anak Balita Terlantar',
                'anak_terlantar' => 'Anak Terlantar',
                'anak_yang_berhadapan_dengan_hukum' => 'Anak Berhadapan dengan Hukum',
                'anak_jalanan' => 'Anak Jalanan',
                'anak_dengan_kedisabilitasan' => 'Anak Disabilitas',
                'anak_dengan_kedisabilitasan_fisik' => 'Anak Disabilitas Fisik',
                'anak_dengan_kedisabilitasan_intelektual' => 'Anak Disabilitas Intelektual',
                'anak_dengan_kedisabilitasan_mental' => 'Anak Disabilitas Mental',
                'anak_dengan_kedisabilitasan_sensorik' => 'Anak Disabilitas Sensorik',
                'anak_korban_tindak_kekerasan' => 'Anak Korban Kekerasan',
                'anak_yang_memerlukan_perlindungan_khusus' => 'Anak Perlindungan Khusus',
                'lanjut_usia_terlantar' => 'Lansia Terlantar',
                'penyandang_disabilitas' => 'Penyandang Disabilitas',
                'penyandang_disabilitas_fisik' => 'Disabilitas Fisik',
                'penyandang_disabilitas_intelektual' => 'Disabilitas Intelektual',
                'penyandang_disabilitas_mental' => 'Disabilitas Mental',
                'penyandang_disabilitas_sensorik' => 'Disabilitas Sensorik',
                'tuna_susila' => 'Tuna Susila',
                'gelandangan' => 'Gelandangan',
                'pengemis' => 'Pengemis',
                'pemulung' => 'Pemulung',
                'kelompok_minoritas' => 'Kelompok Minoritas',
                'bekas_warga_binaan_lembaga_pemasyarakatan' => 'Eks Napi',
                'orang_dengan_hivaids' => 'ODHA',
                'korban_penyalahgunaan_napza' => 'Korban Napza',
                'korban_trafficking' => 'Korban Trafficking',
                'korban_tindak_kekerasan' => 'Korban Kekerasan',
                'pekerja_migran_bermasalah_sosial' => 'PMI Bermasalah',
                'korban_bencana_alam' => 'Korban Bencana Alam',
                'korban_bencana_sosial' => 'Korban Bencana Sosial',
                'perempuan_rawan_sosial_ekonomi' => 'Perempuan Rawan Sosial Ekonomi',
                'fakir_miskin' => 'Fakir Miskin',
                'keluarga_bermasalah_sosial_psikologis' => 'Keluarga Bermasalah Sosial Psikologis',
                'komunitas_adat_terpencil' => 'Komunitas Adat Terpencil',
            ];

            $no = 1;
            foreach ($kategoriList as $field => $label) {
                $status = $model->$field ? 
                    '<span class="text-success"><i class="fa fa-check-circle"></i></span>' :
                    '<span class="text-danger"><i class="fa fa-times-circle"></i></span>';
                echo "<tr>
                        <td>{$no}</td>
                        <td>{$label}</td>
                        <td class='text-center'>{$status}</td>
                    </tr>";
                $no++;
            }
            ?>
        </tbody>
    </table>
</div>

    </div>
    </div>