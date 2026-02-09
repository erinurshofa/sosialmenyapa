<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Ppks;
/* @var $this yii\web\View */
/* @var $model app\models\RekapPbiKecamatan */
/* @var $form yii\widgets\ActiveForm */
$model=@Ppks::findOne($id);
// $this->title = $model->id;
?>

<!-- <div class="rekap-pbi-kecamatan-form"> -->

<?php $form = ActiveForm::begin([
        'action'=>'index.php?r=ppks%2Fverifikasi&id='.$id,
     ]); ?>
    <div class="modal-header">
          <h4 class="modal-title" id="document_name">Verifikasi Data <?=$model->nama?></h4>
          <button type="button" class="close" data-dismiss="modal">×</button>
    </div>
    <div class="modal-body">

        <?= $form->field($model, 'status_verifikasi')->dropDownList([
                'Belum' => 'Belum',
                'Sedang Proses' => 'Sedang Proses',
                'Sudah' => 'Sudah',
            ], ['prompt' => 'Pilih Status Verifikasi', 'class' => 'form-control']) ?>

        <?= $form->field($model, 'keterangan_verifikasi')->textArea(['rows' => 5]) ?>

        <?= $form->field($model, 'tanggal_verifikasi')->textInput(['type' => 'date']) ?>
    </div>
    <div class="modal-footer">
        <?= Html::submitButton('<i class="fa fa-fw fa-save"></i> Simpan', ['class' => 'btn btn-success']) ?>
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
    </div>
    <!-- <div class="form-group">
        <?php //Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div> -->

    <?php ActiveForm::end(); ?>

<!-- </div> -->
