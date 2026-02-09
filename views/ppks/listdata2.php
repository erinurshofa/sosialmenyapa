<?php

use yii\helpers\Html;
use yii\helpers\Url;
use app\models\Users;
use yii\web\View;

$this->title = 'Data PPKS';
$this->params['breadcrumbs'][] = ['label' => 'PPKS', 'url' => ['listdata']];
$this->params['breadcrumbs'][] = $this->title;

yii\web\YiiAsset::register($this);
$dataProviderModels = $model;
?>

<div class="box box-navy box-solid" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
    <div class="box-header bg-navy p-2">
        <i class="fa fa-fw fa-book"></i>
        <strong><?= $this->title ?></strong>
    </div>
    <div class="box-body p-2">
        <table id="ppksTable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>NIK</th>
                    <th>Alamat</th>
                    <th>RT</th>
                    <th>RW</th>
                    <th>Kecamatan</th>
                    <th>Kelurahan</th>
                    <th>Status Verifikasi</th>
                    <th>Status Validasi</th>
                    <th>Status Persetujuan</th>
                    <th>Diverifikasi Oleh</th>
                    <th>Di Input Oleh</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($dataProviderModels as $data): ?>
                    <tr>
                        <td><?= Html::encode($data->id) ?></td>
                        <td><?= Html::encode($data->nama) ?></td>
                        <td><?= Html::encode($data->nik) ?></td>
                        <td><?= Html::encode($data->alamat) ?></td>
                        <td><?= Html::encode($data->rt) ?></td>
                        <td><?= Html::encode($data->rw) ?></td>
                        <td><?= Html::encode($data->kecamatan) ?></td>
                        <td><?= Html::encode($data->kelurahan) ?></td>
                        <td><span class="badge badge-<?= ($data->status_verifikasi == 'Sudah') ? 'success' : (($data->status_verifikasi == 'Sedang Proses') ? 'warning' : 'secondary') ?>"> <?= Html::encode($data->status_verifikasi) ?> </span></td>
                        <td><span class="badge badge-<?= ($data->status_validasi == 'Sudah') ? 'success' : (($data->status_validasi == 'Ditolak') ? 'danger' : 'secondary') ?>"> <?= Html::encode($data->status_validasi) ?> </span></td>
                        <td><span class="badge badge-<?= ($data->status_approved == 'Sudah') ? 'success' : (($data->status_approved == 'Ditolak') ? 'danger' : 'secondary') ?>"> <?= Html::encode($data->status_approved) ?> </span></td>
                        <td><?= Html::encode(Users::findOne(['username' => $data->diverifikasi])->nama_lengkap ?? '-') ?></td>
                        <td><?= Html::encode(Users::findOne(['username' => $data->dibuat])->nama_lengkap ?? '-') ?></td>
                        <td>
                            <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#modalview<?= $data->id ?>">View</button>
                            <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modalverifikasi<?= $data->id ?>">Verifikasi</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#ppksTable').DataTable({
            "paging": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true
        });
    });
</script>
