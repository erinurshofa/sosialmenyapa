<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\BencanaKorbanVerifikasi $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="bencana-korban-verifikasi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'korban_id')->textInput() ?>

    <?= $form->field($model, 'tahap')->dropDownList([ 'input' => 'Input', 'verifikasi_kelurahan' => 'Verifikasi kelurahan', 'validasi_kecamatan' => 'Validasi kecamatan', 'persetujuan_dinsos' => 'Persetujuan dinsos', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'status')->dropDownList([ 'menunggu' => 'Menunggu', 'disetujui' => 'Disetujui', 'ditolak' => 'Ditolak', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'keterangan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'processed_by')->textInput() ?>

    <?= $form->field($model, 'processed_at')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
