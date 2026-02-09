<?php

use yii\widgets\DetailView;
use app\models\SantunanDisabilitas;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RekapPbiKecamatan */

$model = SantunanDisabilitas::findOne($id);
\yii\web\YiiAsset::register($this);

// Daftar dokumen dan label
$docs = [
    'foto_ktp' => 'Foto KTP',
    'foto_kk' => 'Foto KK',
    'foto' => 'Foto',
    'foto_surat_pengantar' => 'Foto Surat Pengantar',
    'foto_surat_permohonan' => 'Foto Surat Permohonan',
    'foto_id_dtks' => 'Foto ID DTKS',
];
?>

<div class="modal-header bg-primary">
    <h4 class="modal-title" id="document_name">
        <i class="fas fa-user"></i> Data Santunan Disabilitas <?= Html::encode($model->nama) ?>
    </h4>
    <button type="button" class="close" data-dismiss="modal">×</button>
</div>
<div class="modal-body p-0">
    <div class="card card-outline card-primary mb-0">
        <div class="card-body p-0">
            <?= DetailView::widget([
                'model' => $model,
                'options' => ['class' => 'table table-striped table-bordered detail-view mb-0'],
                'attributes' => [
                    'id',
                    'nama',
                    'nik',
                    'alamat',
                    [
                        'label' => 'Kecamatan',
                        'value' => $model->kecamatan_nama,
                    ],
                    [
                        'label' => 'Kelurahan',
                        'value' => $model->kelurahan_nama,
                    ],
                    [
                        'label' => 'Status Verifikasi',
                        'value' => $model->status_verifikasi,
                        'format' => 'raw',
                    ],
                    'tanggal_verifikasi:date',
                    'keterangan_verifikasi',
                    [
                        'label' => 'Status Validasi',
                        'value' => $model->status_validasi,
                    ],
                    [
                        'label' => 'Approved',
                        'value' => $model->approved ? 'Ya' : 'Tidak',
                    ],
                    [
                        'label' => 'Diverifikasi',
                        'value' => $model->diverifikasi ? 'Ya' : 'Tidak',
                    ],
                    [
                        'label' => 'Dibuat Oleh',
                        'value' => $model->dibuat,
                    ],
                    'created_at:datetime',
                    'updated_at:datetime',
                ],
            ]) ?>
            <div class="table-responsive px-3 pb-3">
                <table class="table table-bordered table-hover mb-0">
                    <thead class="thead-light">
                        <tr>
                            <th colspan="2"><i class="fas fa-file-alt"></i> Dokumen Pendukung</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($docs as $attr => $label): ?>
                            <tr>
                                <td width="40%"><?= $label ?></td>
                                <td>
                                    <?php if (!empty($model->$attr)): ?>
                                        <?= Html::a('Preview', $model->$attr, [
                                            'target' => '_blank',
                                            'class' => 'btn btn-sm btn-primary',
                                            'title' => 'Lihat dokumen'
                                        ]) ?>
                                    <?php else: ?>
                                        <span class="text-muted">Tidak ada file</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
</div>