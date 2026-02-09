<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use app\models\JenisPmks;
use app\models\Provinsi;
use app\models\Kota;
?>

<div class="ppks-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'nik')->textInput([
                'maxlength' => 16, 
                'placeholder' => 'Masukkan NIK', 
                'type' => 'number',
                'pattern' => '\d{16}'
            ])->label('Nomor Induk Kependudukan (NIK)') ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'no_kk')->textInput([
                'maxlength' => 16, 
                'placeholder' => 'Masukkan No KK', 
                'type' => 'number',
                'pattern' => '\d{16}'
            ]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'nama')->textInput(['maxlength' => true, 'placeholder' => 'Masukkan Nama Lengkap']) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'nomor_hp_cp')->textInput([
                'type' => 'number',
                'placeholder' => 'Masukkan Nomor HP Kontak Person',
                'pattern' => '[0-9]{10,13}'
            ]) ?>
        </div>
    </div>

    <h4>Alamat KTP</h4>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'alamat')->textarea(['rows' => 2, 'placeholder' => 'Masukkan Alamat KTP']) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'provinsi')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(Provinsi::find()->all(), 'id', 'nama'),
                'options' => ['id' => 'provinsi', 'placeholder' => 'Pilih Provinsi'],
                'pluginOptions' => ['allowClear' => true],
            ]) ?>
            <?= $form->field($model, 'kota')->widget(DepDrop::classname(), [
                'options' => ['id' => 'kota'],
                'type' => DepDrop::TYPE_SELECT2,
                'pluginOptions' => [
                    'depends' => ['provinsi'],
                    'placeholder' => 'Pilih Kota ...',
                    'url' => Url::to(['ppks/get-kota']),
                ],
            ]) ?>
        </div>
    </div>

    <h4>Alamat Domisili</h4>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'alamat_domisili')->textarea(['rows' => 2, 'id' => 'alamat_domisili', 'placeholder' => 'Masukkan Alamat Domisili']) ?>
            <label><input type="checkbox" id="copyAlamat"> Sama dengan alamat KTP</label>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'provinsi_domisili')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(Provinsi::find()->all(), 'id', 'nama'),
                'options' => ['id' => 'provinsi-domisili', 'placeholder' => 'Pilih Provinsi'],
                'pluginOptions' => ['allowClear' => true],
            ]) ?>
            <?= $form->field($model, 'kota_domisili')->widget(DepDrop::classname(), [
                'options' => ['id' => 'kota-domisili'],
                'type' => DepDrop::TYPE_SELECT2,
                'pluginOptions' => [
                    'depends' => ['provinsi-domisili'],
                    'placeholder' => 'Pilih Kota ...',
                    'url' => Url::to(['ppks/get-kota']),
                ],
            ]) ?>
        </div>
    </div>

    <h4>Jenis PMKS</h4>
    <?= $form->field($model, 'jenis_pmks')->checkboxList(
        ArrayHelper::map(JenisPmks::find()->all(), 'kode', 'nama'),
        ['separator' => '<br>']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>

<?php
$this->registerJs(<<<JS
    $('#copyAlamat').change(function() {
        if (this.checked) {
            $('#alamat_domisili').val($('#alamat_ktp').val());
            $('#provinsi-domisili').val($('#provinsi-ktp').val()).trigger('change');
        }
    });
JS);
?>
