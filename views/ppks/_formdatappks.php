<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\DataPpksForm;
/* @var $this yii\web\View */
/* @var $model app\models\datappks */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="datappks-form">
<?php
if (!empty(Yii::$app->getRequest()->getQueryParam('nik'))) {
    $model->nik=Yii::$app->getRequest()->getQueryParam('nik');
    $model->yang_meninggal=Yii::$app->getRequest()->getQueryParam('yang_meninggal');
    $model->tinggal_dengan_siapa=Yii::$app->getRequest()->getQueryParam('tinggal_dengan_siapa');
    $model->no_hp_pengasuh=Yii::$app->getRequest()->getQueryParam('no_hp_pengasuh');
}
?>
    <?php $form = ActiveForm::begin(); ?>
<div class="row">
    <div class="col-md-3">
        <?= $form->field($model, 'nik')->textInput(['type'=>'number','maxlength' => 16,'minlength' => 16,"onkeydown"=>"return event.keyCode !== 69"]) ?>
        <?= $form->field($model, 'yang_meninggal')->dropDownList($model->listOrtuMeninggal())?>
        <?= $form->field($model, 'kk')->fileInput() ?>
        <img id="imgkk" src="#" class="img-responsive" width="300px" />
        <?= $form->field($model, 'akta_anak')->fileInput() ?>
        <img id="imgaktaanak" src="#" class="img-responsive" width="300px" />
        <?= $form->field($model, 'pendidikan_anak')->dropDownList($model->listPendidikanAnak())?>
        <?= $form->field($model, 'dukungan_hidup_layak')->dropDownList($model->listAdaTidak())?>
        <?= $form->field($model, 'dukungan_keluarga')->dropDownList($model->listAdaTidak())?>
        <?= $form->field($model, 'pelatihan_vokasiana')->dropDownList($model->listAdaTidak())?>
        <?= $form->field($model, 'dukungan_aksesibilitas')->dropDownList($model->listAdaTidak())?>
        <?= $form->field($model, 'volume')->textInput(['maxlength' => true])?>
        <?= $form->field($model, 'kelayakan_menerima_bantuan')->dropDownList($model->listAdaTidak())?>
    </div>
    <div class="col-md-3">
        <?= $form->field($model, 'tinggal_dengan_siapa')->textInput(['type'=>'number','maxlength' => 16,'minlength' => 16,"onkeydown"=>"return event.keyCode !== 69"])->label('Nik Pengasuh / Wali') ?>
        <?= $form->field($model, 'no_hp_pengasuh')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'sk_meninggal_covid')->fileInput() ?>
        <img id="imgskmeninggalcovid" src="#" class="img-responsive" width="300px" />
        <?= $form->field($model, 'foto_anak')->fileInput() ?>
        <img id="imgfotoanak" src="#" class="img-responsive" width="300px" />
        <?= $form->field($model, 'tinggal_saat_ini')->dropDownList($model->listTinggalSaatIni())?>
        <?= $form->field($model, 'pengasuhan')->dropDownList($model->listAdaTidak())?>
        <?= $form->field($model, 'terapi')->dropDownList($model->listAdaTidak())?>
        <?= $form->field($model, 'bantuan_dan_asisten_sosial')->dropDownList($model->listAdaTidak())?>
        <?= $form->field($model, 'jenis_kebutuhan_anak')->textInput(['maxlength' => true])?>
        <?= $form->field($model, 'estimasi_biaya')->textInput(['type' => 'number'])?>
        <?= $form->field($model, 'keterangan')->textInput(['maxlength' => true])?>
    </div>
    <!-- <div class="col-md-3">
    <h3>Data Anak</h3>
        <table id="dukcapil" class="table table-hover">            
        </table>
    </div>
    <div class="col-md-3">
    <h3>Data Wali</h3>
        <table id="dukcapilwali" class="table table-hover">            
        </table>
    </div> -->
</div>
    

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
