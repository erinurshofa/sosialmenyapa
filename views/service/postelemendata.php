<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\models\Unitkerja */

$this->title = 'Post Data Syantik';
// $this->params['breadcrumbs'][] = ['label' => 'Unitkerjas', 'url' => ['index']];
// $this->params['breadcrumbs'][] = ['label' => $model->id_unitkerja, 'url' => ['view', 'id' => $model->id_unitkerja]];
// $this->params['breadcrumbs'][] = 'Update';
?>
<div class="postelemendata-update">

<select name="per1" id="per1">
  <option selected="selected">Choose one</option>
  <?php
    foreach($get as $value) { ?>
      <option value="<?= $value->id ?>"><?= $value->elemen_data.' - '.$value->urusan ?></option>
  <?php
    } ?>
</select> 


</div>
<?php $form = ActiveForm::begin(); ?>
	<!-- <input type="input" name="nilai" value="100">
	<input type="input" name="tahun" value="2019"> -->
	<?= $form->field($model, 'nama')->textInput(['readonly' => true]) ?>
    <?= $form->field($model, 'tahun')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'nilai')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['id'=>'coba','class' => 'btn btn-success']) ?>
    </div>
 <?php ActiveForm::end(); ?>

 