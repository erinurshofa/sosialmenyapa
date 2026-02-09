<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Kegiatan $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="kegiatan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'judul')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lokasi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanggal')->textInput() ?>

    <?= $form->field($model, 'bidang')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_dinas')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'internal_dinas')->textInput() ?>

    <?php //$form->field($model, 'created_at')->textInput() ?>

    <?php //$form->field($model, 'updated_at')->textInput() ?>

    <?php //$form->field($model, 'deleted_at')->textInput() ?>

        <?= $form->field($model, 'kategori_id')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(KegiatanKategori::find()->all(), 'id', 'nama'),
                    'options' => ['id' => 'kategori-id', 'placeholder' => 'Pilih Kategori'],
                    'pluginOptions' => ['allowClear' => true],
                ]); ?>

    <?php //$form->field($model, 'kategori_id')->textInput() ?>

    <?= $form->field($model, 'penyelenggara')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'keterangan')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
