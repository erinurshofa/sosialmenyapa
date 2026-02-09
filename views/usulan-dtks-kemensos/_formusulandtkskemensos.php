<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use app\models\JenisPekerjaan;
use app\models\AlasanDtks;
use app\models\ProgramBansos;
use app\models\KriteriaMiskin;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\models\UsulanDtksKemensos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usulan-dtks-kemensos-form">
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
    <div class="box box-navy box-solid" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
        <div class="box-header bg-navy">
          <i class="fa fa-fw fa-book"></i>
          <strong>Identitas</strong>
        </div>
        <div class="box-body">
          <div class="row">
            <div class="col-md-3">
                <?= $form->field($model, 'nik')->textInput(['type'=>'number','maxlength' => 16,'minlength' => 16,"onkeydown"=>"return event.keyCode !== 69"]) ?>
                <?= $form->field($model, 'status_kawin')->dropDownList($model->listStatusKawin())?>
                <?= $form->field($model, 'hubungan_keluarga')->dropDownList($model->listHubunganKeluarga())?>
                <?= $form->field($model, 'alamat')->textArea(['rows' => 5])?>
            </div>
            <div class="col-md-3">
                <?= $form->field($model, 'no_kk')->textInput(['maxlength' => true])?>
                <?= $form->field($model, 'ibu_kandung')->textInput(['maxlength' => true])?>
                <?= $form->field($model, 'rt')->textInput(['type' => 'number',"onkeydown"=>"return event.keyCode !== 69"])?>
                <?= $form->field($model, 'tempat_lahir')->textInput(['maxlength' => true])?>
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
                            <strong>Data Identitas</strong>
                    </div>
                    <div class="box-body">
                        <table class="table table-hover" id="dtks">            
                        </table> 
                    </div>
                </div>
            </div>
          </div>
        </div>
    </div>

    <div class="box box-navy box-solid" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
        <div class="box-header bg-navy">
          <i class="fa fa-fw fa-book"></i>
          <strong>Program Bansos</strong>
        </div>
        <div class="box-body">
          <div class="row">
            <div class="col-md-3">
                <?= $form->field($model, 'non_bansos')->dropDownList(['Ya'=>'Ya','Tidak'=>'Tidak'])?>
                <?= $form->field($model, 'pkh')->dropDownList(['Ya'=>'Ya','Tidak'=>'Tidak'])?>
                <?= $form->field($model, 'bsp')->dropDownList(['Ya'=>'Ya','Tidak'=>'Tidak'])?>
                <?= $form->field($model, 'pbi')->dropDownList(['Ya'=>'Ya','Tidak'=>'Tidak'])?>
            </div>
            <div class="col-md-3">
                <?= $form->field($model, 'status_non_bansos')->dropDownList(['Layak'=>'Layak','Tidak Layak'=>'Tidak Layak'])?>
                <?= $form->field($model, 'status_pkh')->dropDownList(['Layak'=>'Layak','Tidak Layak'=>'Tidak Layak'])?>
                <?= $form->field($model, 'status_bsp')->dropDownList(['Layak'=>'Layak','Tidak Layak'=>'Tidak Layak'])?>
                <?= $form->field($model, 'status_pbi')->dropDownList(['Layak'=>'Layak','Tidak Layak'=>'Tidak Layak'])?>
            </div>
            <div class="col-md-3">
                <?= $form->field($model, 'alasan_non_bansos')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(AlasanDtks::find()->select(['id','nama'])->where(['non_bansos'=>1])->all(), 'nama', 'nama'),
                    'id' => 'alasan_non_bansos',
                    'class' => 'form-control inline-block',
                    'options' => ['placeholder' => '- Pilih Keterangan Non Bansos -'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);?>
                <?= $form->field($model, 'alasan_pkh')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(AlasanDtks::find()->select(['id','nama'])->where(['pkh'=>1])->all(), 'nama', 'nama'),
                    'id' => 'alasan_pkh',
                    'class' => 'form-control inline-block',
                    'options' => ['placeholder' => '- Pilih Keterangan PKH -'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);?>
                <?= $form->field($model, 'alasan_bsp')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(AlasanDtks::find()->select(['id','nama'])->where(['bsp'=>1])->all(), 'nama', 'nama'),
                    'id' => 'alasan_bsp',
                    'class' => 'form-control inline-block',
                    'options' => ['placeholder' => '- Pilih Keterangan BSP -'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);?>
                <?= $form->field($model, 'alasan_pbi')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(AlasanDtks::find()->select(['id','nama'])->where(['pbi'=>1])->all(), 'nama', 'nama'),
                    'id' => 'alasan_pbi',
                    'class' => 'form-control inline-block',
                    'options' => ['placeholder' => '- Pilih Keterangan PBI -'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);?>
            </div>
          </div>
        </div>
    </div>

<!--  <div class="box box-navy box-solid" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
        <div class="box-header bg-navy">
          <i class="fa fa-fw fa-book"></i>
          <strong>Kriteria Miskin</strong>
        </div>
        <div class="box-body">
            <?php
                // $kriteria = @KriteriaMiskin::find()->all();
                // foreach ($kriteria as $key => $value) {
                //     $no=$key+1;
                //     echo $no.'. '.$value['pertanyaan'].'<br/>';
                //     echo '&nbsp;&nbsp;&nbsp;&nbsp;<input type="hidden" name="id['.$key.']" value="'.$value['id'].'" class="form-control">';
                //     // Add radio buttons for "Yes" and "No"
                //     echo '<input type="radio" name="jawaban[' . $key . ']" value="Ya" required> Ya';
                //     echo '&nbsp;&nbsp;&nbsp;<input type="radio" name="jawaban[' . $key . ']" value="Tidak" required> Tidak';

                //     // Add input for comments
                //     echo '&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="keterangan['.$key.']" placeholder="Keterangan" class="form-control">';
                //     echo '<br/><br/>';
                // }
            ?>
        </div>
    </div>
-->


    <div class="box box-navy box-solid" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
        <div class="box-header bg-navy">
          <i class="fa fa-fw fa-book"></i>
          <strong>File</strong>
        </div>
        <div class="box-body">
          <div class="row">
            <div class="col-md-3">
                <?= $form->field($model, 'ktp')->fileInput() ?>
                <img id="imgktp" src="<?= Yii::$app->request->baseUrl . '/images/' .'no-image.png' ?>" class="img-responsive" width="300px" />
            </div>
            <div class="col-md-3">
                <?= $form->field($model, 'foto_rumah')->fileInput() ?>
                <img id="imgfotorumah" src="<?= Yii::$app->request->baseUrl . '/images/' .'no-image.png' ?>" class="img-responsive" width="300px" />
            </div>
            <div class="col-md-3">
                <?= $form->field($model, 'berita_acara_muskel')->fileInput() ?>
                <iframe id="pdfberitaacaramuskel" width="600" height="400" frameborder="0"></iframe>
            </div>
          </div>
        </div>
    </div>
<div class="row">
    <div class="col-md-3">
        
        
            
    </div>
    <div class="col-md-3">
        
        
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
            <?php //$form->field($model, 'bansos_dtks')->dropDownList(['PBI'=>'PBI'])?>  
        <div id="bansosdtks" style="display:none;">
            <?php //$form->field($model, 'bansos_dtks')->dropDownList(['BPNT'=>'BPNT','PKH'=>'PKH','PBI'=>'PBI'])?>    
            <?php //$form->field($model, 'bansos_dtks')->dropDownList(['PBI'=>'PBI'])?>    
        </div>    
        <div id="nonbansosdtks" style="display:block;">
            <?php //$form->field($model, 'nonbansos_dtks')->dropDownList(['NONBANSOS'=>'NONBANSOS'])?>
        </div>
        
        
    </div>
    <div class="col-md-3">

    </div>
    <div class="col-md-3">
        
      </div>
        
    </div>
    
    

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
