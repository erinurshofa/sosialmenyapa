<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Kecamatan;
use app\models\Kelurahan;
use app\models\Provinsi;
use app\models\Kota;
use kartik\select2\Select2;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var app\models\BencanaKorbanIndividu $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="bencana-korban-individu-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'bencana_id')->textInput() ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nik')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jenis_kelamin')->dropDownList([ 'L' => 'L', 'P' => 'P', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'kategori_korban_id')->textInput() ?>

    <?php
    echo $form->field($model, 'provinsi_id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Provinsi::find()->all(), 'id', 'nama'),
        'options' => ['id' => 'provinsi-id', 'placeholder' => 'Pilih Provinsi ...'],
        'pluginOptions' => ['allowClear' => true],
    ]);

    echo $form->field($model, 'kota_id')->widget(DepDrop::classname(), [
        'options' => ['id' => 'kota-id'],
        'type' => DepDrop::TYPE_SELECT2,
        'pluginOptions' => [
            'depends' => ['provinsi-id'],
            'placeholder' => 'Pilih Kota ...',
            'url' => Url::to(['ppks/get-kota']),
            'params' => ['provinsi-id'],
        ],
    ]);

    echo $form->field($model, 'kecamatan_id')->widget(DepDrop::classname(), [
        'options' => ['id' => 'kecamatan-id'],
        'type' => DepDrop::TYPE_SELECT2,
        'pluginOptions' => [
            'depends' => ['kota-id'],
            'placeholder' => 'Pilih Kecamatan ...',
            'url' => Url::to(['ppks/get-kecamatan']),
            'params' => ['kota-id'],
        ],
    ]);

    echo $form->field($model, 'kelurahan_id')->widget(DepDrop::classname(), [
        'options' => ['id' => 'kelurahan-id'],
        'type' => DepDrop::TYPE_SELECT2,
        'pluginOptions' => [
            'depends' => ['kecamatan-id'],
            'placeholder' => 'Pilih Kelurahan ...',
            'url' => Url::to(['ppks/get-kelurahan']),
            'params' => ['kecamatan-id'],
        ],
    ]);
    ?>

    <?= $form->field($model, 'alamat')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'status_akhir')->dropDownList([ 'menunggu' => 'Menunggu', 'proses' => 'Proses', 'disetujui' => 'Disetujui', 'ditolak' => 'Ditolak', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
