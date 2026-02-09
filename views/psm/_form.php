<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Kecamatan;
use app\models\Kelurahan;
use app\models\Provinsi;
use kartik\select2\Select2;
use kartik\depdrop\DepDrop;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
/** @var yii\web\View $this */
/** @var app\models\Psm $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="psm-form">

    <?php $form = ActiveForm::begin(); ?>
<div class="row">
    <div class="col-md-6">
        <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-md-6">
        <?= $form->field($model, 'nik')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-md-6">
         <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-md-6">
        <?= $form->field($model, 'hp')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-md-6">
        <?= $form->field($model, 'keterangan')->textarea(['rows' => 2, 'placeholder' => 'Keterangan']) ?>
    </div>
</div>

    <?php //$form->field($model, 'kecamatan')->textInput(['maxlength' => true]) ?>

    <?php //$form->field($model, 'kelurahan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tempat_lahir')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanggal_lahir')->textInput() ?>

    <?= $form->field($model, 'jenis_kelamin')->dropDownList(['LAKI-LAKI'=>'LAKI-LAKI','PEREMPUAN'=>'PEREMPUAN'], ['prompt' => 'Pilih Jenis Kelamin']) ?>

    <?= $form->field($model, 'jalan')->textarea(['rows' => 2, 'placeholder' => 'Jalan']) ?>

    <?= $form->field($model, 'rt')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rw')->textInput(['maxlength' => true]) ?>

    <?php //$form->field($model, 'provinsi_id')->textInput(['maxlength' => true]) ?>

    <?php //$form->field($model, 'kota_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kecamatan_id')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(Kecamatan::find()->all(), 'id_lama', 'nama'),
                    'options' => ['id' => 'kecamatan-id', 'placeholder' => 'Pilih Kecamatan'],
                    'pluginOptions' => ['allowClear' => true],
                ]); ?>
    
     <?php
                echo $form->field($model, 'kelurahan_id')->widget(DepDrop::classname(), [
                    'type' => DepDrop::TYPE_SELECT2,
                    'options' => ['id' => 'kelurahan-id'],
                    'pluginOptions' => [
                        'depends' => ['kecamatan-id'], // id field kecamatan
                        'placeholder' => 'Pilih Kelurahan...',
                        'url' => Url::to(['/site/get-kelurahan']),
                        'method' => 'post', // pastikan pakai POST
                    ]
                ]);
                ?>

    <?php //$form->field($model, 'kecamatan_id')->textInput(['maxlength' => true]) ?>

    <?php //$form->field($model, 'kelurahan_id')->textInput(['maxlength' => true]) ?>
<?php
    // Kecamatan (Dependent Dropdown)
                    // echo $form->field($model, 'kecamatan_id')->widget(DepDrop::classname(), [
                    //     'options' => ['id' => 'kecamatan-id'],
                    //     'type' => DepDrop::TYPE_SELECT2,
                    //     'pluginOptions' => [
                    //         'depends' => ['kota-id'],
                    //         'placeholder' => 'Pilih Kecamatan ...',
                    //         'url' => Url::to(['ppks/get-kecamatan']),
                    //         'params' => ['kota-id'], // 🔥 Kirim parameter kota_id
                    //     ],
                    // ]);

                    // // Kelurahan (Dependent Dropdown)
                    // echo $form->field($model, 'kelurahan_id')->widget(DepDrop::classname(), [
                    //     'options' => ['id' => 'kelurahan-id'],
                    //     'type' => DepDrop::TYPE_SELECT2,
                    //     'pluginOptions' => [
                    //         'depends' => ['kecamatan-id'],
                    //         'placeholder' => 'Pilih Kelurahan ...',
                    //         'url' => Url::to(['ppks/get-kelurahan']),
                    //         'params' => ['kecamatan-id'], // 🔥 Kirim parameter kecamatan_id
                    //     ],
                    // ]);
    ?>
    <?php //$form->field($model, 'user_id')->textInput() ?>

    <?php //$form->field($model, 'login_terakhir')->textInput() ?>

    <?= $form->field($model, 'no_rekening')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_pemilik')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_bank')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_sertifikat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanggal_sertifikat')->textInput() ?>

    <?= $form->field($model, 'file_sertifikat')->fileInput()  ?>

    <?= $form->field($model, 'file_sk_walikota')->fileInput()  ?>

    <?php //$form->field($model, 'created_at')->textInput() ?>

    <?php //$form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
