<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Ppks */
/* @var $modelMutakhir app\models\PpksMutakhirStatus */

$this->title = 'Form Pemutakhiran Status PPKS';
$this->params['breadcrumbs'][] = ['label' => 'Pemutakhiran Data', 'url' => ['list-mutakhir-psm']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ppks-form-mutakhir pb-5">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="box box-primary box-solid" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                <div class="box-header bg-primary">
                    <h3 class="box-title"><i class="fa fa-edit"></i> <?= Html::encode($this->title) ?></h3>
                </div>
                <div class="box-body p-4">
                    
                    <table class="table table-bordered table-striped mt-3">
                        <tr>
                            <th style="width: 35%;">NIK</th>
                            <td><?= Html::encode($model->nik) ?></td>
                        </tr>
                        <tr>
                            <th>Nama Lengkap</th>
                            <td><?= Html::encode($model->nama) ?></td>
                        </tr>
                        <tr>
                            <th>Status Saat Ini</th>
                            <td><span class="label label-info" style="font-size: 14px;"><?= $model->status ? $model->status : 'AKTIF' ?></span></td>
                        </tr>
                    </table>

                    <hr>

                    <?php if (!$modelMutakhir->isNewRecord && $modelMutakhir->status_pengajuan == 'MENUNGGU KONFIRMASI'): ?>
                        <div class="alert alert-warning">
                            <h4><i class="icon fa fa-warning"></i> Perhatian!</h4>
                            Data ini sedang dalam status <strong>MENUNGGU KONFIRMASI</strong> dari Dinsos (diajukan menjadi: <?= Html::encode($modelMutakhir->status_baru) ?>). Anda tidak dapat mengajukan pemutakhiran baru hingga pengajuan sebelumnya disetujui atau ditolak.
                        </div>
                        <a href="<?= yii\helpers\Url::to(['list-mutakhir-psm']) ?>" class="btn btn-default"><i class="fa fa-arrow-left"></i> Kembali</a>
                    <?php else: ?>
                        
                        <?php if (!$modelMutakhir->isNewRecord && $modelMutakhir->status_pengajuan == 'DITOLAK'): ?>
                            <div class="alert alert-danger">
                                <h4><i class="icon fa fa-ban"></i> Pengajuan Sebelumnya Ditolak</h4>
                                <strong>Alasan:</strong> <?= Html::encode($modelMutakhir->keterangan_penolakan) ?>
                            </div>
                        <?php endif; ?>

                        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

                        <?= $form->field($modelMutakhir, 'status_baru')->dropDownList([
                            'MENINGGAL DUNIA' => 'MENINGGAL DUNIA',
                            'PINDAH TIDAK DITEMPAT' => 'PINDAH TIDAK DITEMPAT',
                            'MAMPU' => 'MAMPU',
                            'AKTIF' => 'AKTIF',
                        ], ['prompt' => '-- Pilih Status Baru --', 'required' => true])->label('Ubah Status Menjadi <span class="text-danger">*</span>') ?>

                        <?= $form->field($modelMutakhir, 'dokumen_pendukung')->fileInput(['required' => true, 'accept' => 'image/*,application/pdf'])->label('Unggah Dokumen Pendukung (Foto/PDF) <span class="text-danger">*</span>') ?>
                        <p class="help-block" style="font-size: 12px; margin-top:-10px; margin-bottom:15px; color:#777;">Contoh: Foto Surat Kematian, Foto Tiket Pindah, atau Surat Keterangan Mampu.</p>

                        <div class="form-group text-right">
                            <a href="<?= yii\helpers\Url::to(['list-mutakhir-psm']) ?>" class="btn btn-default"><i class="fa fa-ban"></i> Batal</a>
                            <?= Html::submitButton('<i class="fa fa-paper-plane"></i> Ajukan Pemutakhiran', ['class' => 'btn btn-primary']) ?>
                        </div>

                        <?php ActiveForm::end(); ?>

                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
</div>
