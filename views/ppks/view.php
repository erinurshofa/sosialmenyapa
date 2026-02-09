<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Ppks */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ppks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
// Ambil role user
$role = Yii::$app->user->identity->role ?? null;

// Cek akses wilayah (misal: kelurahan_id/kecamatan_id pada user dan model)
$userKelurahan = Yii::$app->user->identity->kelurahan_id ?? null;
$userKecamatan = Yii::$app->user->identity->kecamatan_id ?? null;
$modelKelurahan = $model->kelurahan_id ?? null;
$modelKecamatan = $model->kecamatan_id ?? null;
?>
<div class="box box-navy box-solid" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
    <div class="box-header bg-navy p-2">
        <i class="fa fa-fw fa-book"></i>
        <strong><?= Html::encode($this->title) ?></strong>
    </div>
    <div class="box-body">
<div class="ppks-view p-2">

    <h3 class="mb-4">
        <i class="fa fa-user-circle text-primary"></i> 
        <?= Html::encode($model->nama) ?>
    </h3>

<p>
    <?php if ($role === 'admin' || $role === 'dinsos'): ?>
        <?= Html::a('<i class="fa fa-pencil-alt"></i> Update', ['update', 'id' => $model->id], ['class' => 'btn btn-sm btn-primary']) ?>
        <?= Html::a('<i class="fa fa-trash"></i> Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-sm btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    <?php elseif ($role === 'kelurahan' && $userKelurahan == $modelKelurahan): ?>
        <?= Html::a('<i class="fa fa-pencil-alt"></i> Update', ['update', 'id' => $model->id], ['class' => 'btn btn-sm btn-primary']) ?>
    <?php elseif ($role === 'kecamatan' && $userKecamatan == $modelKecamatan): ?>
        <?= Html::a('<i class="fa fa-pencil-alt"></i> Update', ['update', 'id' => $model->id], ['class' => 'btn btn-sm btn-primary']) ?>
    <?php endif; ?>
</p>

        <!-- STATUS PROGRESS -->
<div class="row text-center mb-4">
    <!-- Verifikasi -->
    <div class="col-md-4 border rounded p-3">
        <div><strong>Verifikasi</strong></div>
        <div class="my-2">
            <?= $model->verifikasi 
                ? '<i class="fa fa-check-circle fa-2x text-success"></i><div class="text-success">Terverifikasi</div>' 
                : '<i class="fa fa-times-circle fa-2x text-danger"></i><div class="text-danger">Belum</div>' ?>
        </div>
        <div><small><i class="fa fa-calendar"></i> <?= !empty($model->tanggal_verifikasi) ? date('d M Y H:i', strtotime($model->tanggal_verifikasi)) : '-' ?></small></div>
        <div><small><i class="fa fa-user"></i> <?= !empty($model->diverifikasi) ? $model->diverifikasi : '-' ?></small></div>
    </div>

    <!-- Validasi -->
    <div class="col-md-4 border rounded p-3">
        <div><strong>Validasi</strong></div>
        <div class="my-2">
            <?= $model->validasi 
                ? '<i class="fa fa-check-circle fa-2x text-success"></i><div class="text-success">Tervalidasi</div>' 
                : '<i class="fa fa-times-circle fa-2x text-danger"></i><div class="text-danger">Belum</div>' ?>
        </div>
        <div><small><i class="fa fa-calendar"></i> <?= !empty($model->tanggal_validasi) ? date('d M Y H:i', strtotime($model->tanggal_validasi)) : '-' ?></small></div>
        <div><small><i class="fa fa-user"></i> <?= !empty($model->divalidasi) ? $model->divalidasi : '-' ?></small></div>
    </div>

    <!-- Approved -->
    <div class="col-md-4 border rounded p-3">
        <div><strong>Approved</strong></div>
        <div class="my-2">
            <?= $model->approved 
                ? '<i class="fa fa-check-circle fa-2x text-success"></i><div class="text-success">Disetujui</div>' 
                : '<i class="fa fa-times-circle fa-2x text-danger"></i><div class="text-danger">Belum</div>' ?>
        </div>
        <div><small><i class="fa fa-calendar"></i> <?= !empty($model->tanggal_approval) ? date('d M Y H:i', strtotime($model->tanggal_approval)) : '-' ?></small></div>
        <div><small><i class="fa fa-user"></i> <?= !empty($model->approved_by) ? $model->approved_by : '-' ?></small></div>
    </div>
</div>


    <div class="row">
        <div class="col-md-6">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'nama',
                    'nik',
                    // 'cek_double',
                    'no_kk',
                    'jenis_kelamin',
                    [
                        'attribute' => 'alamat',
                        'format' => 'ntext'
                    ],
                    'rt',
                    'rw',
                ],
                'options' => ['class' => 'table table-bordered table-hover table-sm'],
            ]) ?>
        </div>
        <div class="col-md-6">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'kelurahan',
                    'kecamatan',
                    // [
                    //     'attribute' => 'jenis_ppks',
                    //     'format' => 'ntext'
                    // ],
                    'jenis_ppks_fix',
                    'jenis_disabilitas',
                    'sumber_data',
                    'tempat_lahir',
                    'tanggal_lahir',
                    'created_at',
                    'updated_at',
                ],
                'options' => ['class' => 'table table-bordered table-hover table-sm'],
            ]) ?>
        </div>
    </div>

</div>

<div class="ppks-view p-2">
    <h4 class="mb-3">Status PPKS</h4>
    <div class="row">
        <?php
        $kategoriList = [
            'punya_ktp' => 'Memiliki KTP',
            'masuk_dtks' => 'Terdaftar di DTKS',
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

        $total = count($kategoriList);
        $half = ceil($total / 2);
        $keys = array_keys($kategoriList);
        ?>

        <!-- Kolom Kiri -->
        <div class="col-md-6">
            <table class="table table-bordered table-striped table-sm">
                <thead class="thead-dark">
                    <tr>
                        <th style="width: 5%">#</th>
                        <th>Jenis Kategori</th>
                        <th style="width: 10%" class="text-center">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 0; $i < $half; $i++): 
                        $field = $keys[$i];
                        $label = $kategoriList[$field];
                        $value = $model->$field;
                        $status = $value ? 
                            '<span class="text-success"><i class="fa fa-check-circle"></i></span>' :
                            '<span class="text-danger"><i class="fa fa-times-circle"></i></span>';
                    ?>
                        <tr>
                            <td><?= $i + 1 ?></td>
                            <td><?= Html::encode($label) ?></td>
                            <td class="text-center"><?= $status ?></td>
                        </tr>
                    <?php endfor; ?>
                </tbody>
            </table>
        </div>

        <!-- Kolom Kanan -->
        <div class="col-md-6">
            <table class="table table-bordered table-striped table-sm">
                <thead class="thead-dark">
                    <tr>
                        <th style="width: 5%">#</th>
                        <th>Jenis Kategori</th>
                        <th style="width: 10%" class="text-center">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = $half; $i < $total; $i++): 
                        $field = $keys[$i];
                        $label = $kategoriList[$field];
                        $value = $model->$field;
                        $status = $value ? 
                            '<span class="text-success"><i class="fa fa-check-circle"></i></span>' :
                            '<span class="text-danger"><i class="fa fa-times-circle"></i></span>';
                    ?>
                        <tr>
                            <td><?= $i + 1 ?></td>
                            <td><?= Html::encode($label) ?></td>
                            <td class="text-center"><?= $status ?></td>
                        </tr>
                    <?php endfor; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>



    </div>
    </div>