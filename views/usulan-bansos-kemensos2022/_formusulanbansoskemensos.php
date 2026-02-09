<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use app\models\JenisPekerjaan;
use app\models\ProgramBansos;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\models\UsulanBansosKemensos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usulanbansoskemensos-form">
<?php
if (!empty(Yii::$app->getRequest()->getQueryParam('nik'))) {
    $model->nik=Yii::$app->getRequest()->getQueryParam('nik');
    $model->jenis_pekerjaan=Yii::$app->getRequest()->getQueryParam('jenis_pekerjaan');
    $model->program_bansos=Yii::$app->getRequest()->getQueryParam('program_bansos');
}
?>
    <?php $form = ActiveForm::begin([
        'action' => ['simpandata'],
        'method' => 'post',
    ]); ?>
<div class="row">
    <div class="col-md-3">
        <?= $form->field($model, 'nik')->textInput(['type'=>'number','maxlength' => 16,'minlength' => 16,"onkeydown"=>"return event.keyCode !== 69"]) ?>
        <?= $form->field($model, 'status_kawin')->dropDownList($model->listStatusKawin())?>
        <?= $form->field($model, 'alamat')->textArea(['rows' => 5])?>
        <?= $form->field($model, 'jenis_pekerjaan')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(JenisPekerjaan::find()->select(['id','nama'])->all(), 'nama', 'nama'),
                'id' => 'jenis_pekerjaan',
                'class' => 'form-control inline-block',
                'options' => ['placeholder' => '- Pilih Jenis Pekerjaan -'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);?>
    </div>
    <div class="col-md-3">
        <?= $form->field($model, 'no_kk')->textInput(['maxlength' => true])?>
        <?= $form->field($model, 'ibu_kandung')->textInput(['maxlength' => true])?>
        <?= $form->field($model, 'rt')->textInput(['type' => 'number',"onkeydown"=>"return event.keyCode !== 69"])?>
        <?= $form->field($model, 'tempat_lahir')->textInput(['maxlength' => true])?>
        <?php 
        // $form->field($model, 'program_bansos')->widget(Select2::classname(), [
        //         'data' => ArrayHelper::map(ProgramBansos::find()->select(['id','nama_bansos'])->all(), 'nama_bansos', 'nama_bansos'),
        //         'id' => 'program_bansos',
        //         'class' => 'form-control inline-block',
        //         'options' => ['placeholder' => '- Pilih Program Bansos -'],
        //         'pluginOptions' => [
        //             'allowClear' => true
        //         ],
        //     ]);
            ?>
            <?= $form->field($model, 'bansos_dtks')->dropDownList(['PBI'=>'PBI'])?>  
        <div id="bansosdtks" style="display:none;">
            <?php //$form->field($model, 'bansos_dtks')->dropDownList(['BPNT'=>'BPNT','PKH'=>'PKH','PBI'=>'PBI'])?>    
            <?php //$form->field($model, 'bansos_dtks')->dropDownList(['PBI'=>'PBI'])?>    
        </div>    
        <div id="nonbansosdtks" style="display:block;">
            <?php //$form->field($model, 'nonbansos_dtks')->dropDownList(['NONBANSOS'=>'NONBANSOS'])?>
        </div>
        
        
    </div>
    <div class="col-md-3">
        <?= $form->field($model, 'nama')->textInput(['maxlength' => true])?>
        <?= $form->field($model, 'jenis_kelamin')->dropDownList($model->listJenisKelamin())?>
        <?= $form->field($model, 'rw')->textInput(['type' => 'number',"onkeydown"=>"return event.keyCode !== 69"])?>
        <?= 
            $form->field($model, 'tanggal_lahir')->widget(DatePicker::className(),[
            'name' => 'tanggal_lahir',
                'type' => DatePicker::TYPE_COMPONENT_APPEND,//agar dikanan
                'pluginOptions' => [
                    'autoclose'=>true,
                    'format' => 'yyyy-mm-dd'
                ]
            ]);
        ?> 
        <?= $form->field($model, 'disabilitas')->dropDownList($model->listDisabilitas())?>
    </div>
    <div class="col-md-3">
        <div class="box box-danger box-solid">
            <div class="box-header bg-red">
                <i class="fa fa-fw fa-book"></i>
                    <strong>Data DTKS</strong>
            </div>
            <div class="box-body">
                <table class="table table-hover" id="dtks">            
                </table> 
            </div>
        </div>
      </div>
        
    </div>
    
    

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
