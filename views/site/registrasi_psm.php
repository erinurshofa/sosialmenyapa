<?php
use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\select2\Select2;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use app\models\Kecamatan;

$this->title = 'Registrasi PSM';
$this->registerCssFile('https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css');
$this->registerJsFile('https://code.jquery.com/jquery-3.6.0.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile('https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
?>
<br/>
<div class="container-form mt-5">
            <h2 class="text-center text-primary">Registrasi PSM</h2>
            <p class="text-center text-muted">Silakan isi formulir berikut untuk mendaftar sebagai PSM.</p>
            
            <!-- DISPLAY FLASH MESSAGES MANUALLY IF LAYOUT DOESN'T -->
            <?php if (Yii::$app->session->hasFlash('error')): ?>
                <div class="alert alert-danger">
                    <?= Yii::$app->session->getFlash('error') ?>
                </div>
            <?php endif; ?>
            <?php if (Yii::$app->session->hasFlash('success')): ?>
                <div class="alert alert-success">
                    <?= Yii::$app->session->getFlash('success') ?>
                </div>
            <?php endif; ?>

            <?php $form = ActiveForm::begin(); ?>
                <div class="mb-3">
                   <?= $form->field($model, 'nik')->textInput(['required' => true]) ?>
                </div>
                <div class="mb-3">
                   <?= $form->field($model, 'nama')->textInput(['required' => true]) ?>
                </div>
                <div class="mb-3">
                    <?= $form->field($model, 'hp')->textInput(['required' => true]) ?>
                </div>
                <div class="mb-3">
                    <?= $form->field($model, 'email')->input('email', ['required' => true]) ?>
                </div>
                <div class="mb-3">
                <?= $form->field($model, 'kecamatan_id')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(Kecamatan::find()->all(), 'id_lama', 'nama'),
                    'options' => ['id' => 'kecamatan-id', 'placeholder' => 'Pilih Kecamatan'],
                    'pluginOptions' => ['allowClear' => true],
                ]); ?>
                </div>
                <div class="mb-3">
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
                </div>
                <div class="mb-3">
                    <?= $form->field($model, 'password', [
                        'template' => '{label}<div class="input-group">{input}<button class="btn btn-outline-secondary toggle-password" type="button" data-target="#psm-password">👁</button></div>{error}{hint}'
                    ])->passwordInput(['id' => 'psm-password', 'class' => 'form-control', 'required' => true]) ?>
                </div>
                <div class="mb-3">
                    <?= $form->field($model, 'verifyCode')->widget(\yii\captcha\Captcha::className(), [
                        'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                    ]) ?>
                </div>

                <div class="mb-3">
                    <?= $form->field($model, 'confirm_password', [
                        'template' => '{label}<div class="input-group">{input}<button class="btn btn-outline-secondary toggle-password" type="button" data-target="#psm-confirm-password">👁</button></div>{error}{hint}'
                    ])->passwordInput(['id' => 'psm-confirm-password', 'class' => 'form-control', 'required' => true]) ?>
                </div>

                <!-- <div class="mb-3">
                    <?php //$form->field($model, 'confirm_password')->passwordInput(['required' => true]) ?>
                </div> -->
                <div class="alert alert-info mt-5">
                    Dimohon mengisi informasi dibawah ini untuk keperluan administrasi.
                </div>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <?= $form->field($model, 'no_rekening')->textInput(['placeholder' => 'Contoh: 1234567890']) ?>
                    </div>
                    <div class="col-md-4 mb-3">
                        <?= $form->field($model, 'nama_pemilik')->textInput(['placeholder' => 'Atas Nama Rekening']) ?>
                    </div>
                    <div class="col-md-4 mb-3">
                        <?= $form->field($model, 'nama_bank')->textInput(['placeholder' => 'Contoh: BRI, BNI, Mandiri']) ?>
                    </div>
                </div>
                <div class="d-grid gap-2 mt-4 mb-3">
                    <?= Html::submitButton('Daftar Sekarang', ['class' => 'btn btn-primary btn-lg']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
<!-- <script>
$(document).on('change', '#kecamatan-id', function() {
    let kecamatanId = $(this).val();
    console.log("📌 Kecamatan yang dipilih:", kecamatanId);

    if (!kecamatanId) {
        console.warn("⚠ Kecamatan belum dipilih!");
        return;
    }

    $.ajax({
        url: "<?php //Url::to(['/site/get-kelurahan']) ?>",
        type: "POST",
        dataType: "json",
        data: { depdrop_parents: [kecamatanId] },
        success: function(response) {
            console.log("✅ Respons diterima:", response);
        },
        error: function(xhr, textStatus, errorThrown) {
            console.error("❌ AJAX Error:", textStatus, errorThrown, xhr.responseText);
        }
    });
});

</script> -->
<?php
$this->registerJs("
    $('.toggle-password').on('click', function() {
        var input = $($(this).data('target'));
        var type = input.attr('type') === 'password' ? 'text' : 'password';
        input.attr('type', type);
        $(this).text(type === 'password' ? '👁' : '🙈');
    });
");
?>