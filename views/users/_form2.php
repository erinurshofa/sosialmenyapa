<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Account */
/* @var $form yii\widgets\ActiveForm */
?>

<!-- <div class="account-form"> -->

   

    <?php //$form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?php //$form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?php //$form->field($model, 'nama_lengkap')->textInput(['maxlength' => true]) ?>

    <?php //$form->field($model, 'nama_opd')->textInput(['maxlength' => true]) ?>

    <?php //$form->field($model, 'jabatan')->textInput(['maxlength' => true]) ?>

    <?php //$form->field($model, 'telp')->textInput(['maxlength' => true]) ?>

    <?php //$form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'role')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'ip')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'browser')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'foto')->textInput() ?>

    <?php // $form->field($model, 'host')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'konfirmasi_email')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '']) ?>

    <?php // $form->field($model, 'kode_konfirmasi')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'konfirmasi_admin')->dropDownList([ 'Y' => 'Y', 'N' => 'N', 'Tolak' => 'Tolak', ], ['prompt' => '']) ?>

    <?php // $form->field($model, 'lastlogin')->textInput() ?>

    <?php // $form->field($model, 'created')->textInput() ?>

    <?php // $form->field($model, 'updated')->textInput() ?>

    <?php //$form->field($model, 'flag')->textInput() ?>
<!-- 
    <div class="form-group">
        
    </div> -->

     <?php $form = ActiveForm::begin(); ?>
<!-- <form action="#" method="post" enctype="multipart/form-data" class="form-horizontal" name="form2"> -->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">×</button>
          <h4 class="modal-title" id="document_name">Ubah Profil Photo</h4>
        </div>
        <div class="modal-body">
        <?= $form->field($model, 'foto')->fileInput() ?>
        <?= Html::hiddenInput('username', $model->username); ?>
        <?= Html::hiddenInput('password', $model->password); ?>
        <?= Html::hiddenInput('nama_lengkap', $model->nama_lengkap); ?>
        <?= Html::hiddenInput('nip', $model->nip); ?>
        <?= Html::hiddenInput('nama_opd', $model->nama_opd); ?>
        <?= Html::hiddenInput('alamat', $model->alamat); ?>
        <?= Html::hiddenInput('jabatan', $model->jabatan); ?>
        <?= Html::hiddenInput('telp', $model->telp); ?>
        <?= Html::hiddenInput('email', $model->email); ?>
   
               <!-- <input type="hidden" name="nama_foto" value="default.jpg">
               <input type="hidden" name="id_user" value="5007">
               <input type="file" name="file_upload" class="form-control" required=""> -->
          </div>
        <div class="modal-footer">
        <?= Html::submitButton('Upload', ['class' => 'btn btn-info Upload']) ?>
          <!-- <button type="submit" class="btn btn-info Upload">Upload</button> -->
          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        </div>
       <!-- </form> -->
      <!-- </div> -->
<?php ActiveForm::end(); ?>
<!-- </div> -->
