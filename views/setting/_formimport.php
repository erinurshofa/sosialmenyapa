<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Dokumen */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="row">
  <div class="col-md-6">
    
     <?php $form = ActiveForm::begin([
        'action' => ['setting/import'],
        'method' => 'post',
    ]); ?>

            <?= $form->field($model, 'jenis')->textInput()->label('Jenis') ?>

            <?= $form->field($model, 'file')->fileInput()->label('File CSV') ?>
           
            <?= $form->field($model, 'nama_tabel')->textInput()->label('Nama Tabel') ?>

        <?= Html::submitButton('Upload ', ['class' => 'btn btn-warning btn-xs']) ?>

<?php ActiveForm::end(); ?>
  </div>

</div>
    
