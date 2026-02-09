<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Kecamatan;
use app\models\Kelurahan;
use app\models\Psm;
use kartik\select2\Select2;
use kartik\depdrop\DepDrop;
use yii\web\View;
use yii\helpers\Url;

?>

<div class="card shadow-lg p-4">
    <div class="card-header bg-primary text-white">
        <h4 class="mb-0">Form Tambah Pengguna</h4>
    </div>
    <div class="card-body">
        <?php $form = ActiveForm::begin(); ?>

        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'nama_lengkap')->textInput([
                    'maxlength' => true,
                    'placeholder' => 'Masukkan Nama Lengkap'
                ])->label('Nama Lengkap *') ?>
                <?= $form->field($model, 'email')->textInput([
                    'type' => 'email',
                    'maxlength' => true,
                    'placeholder' => 'Masukkan Email',
                    'class' => 'form-control form-control-md'
                ])->label('Email *') ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'username')->textInput([
                    'id'=>'username',
                    'maxlength' => true,
                    'placeholder' => 'Masukkan Username'
                ])->label('Username *') ?>
                <button type="button" id="generateUsername" class="btn btn-warning btn-block">Generate Username</button>

                
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Password</label>
                    <div class="input-group">
                        <input type="password" id="password" name="Users[password]" class="form-control" placeholder="Masukkan password">
                        <div class="input-group-append">
                            <button type="button" id="togglePassword" class="btn btn-secondary">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <button type="button" id="generatePassword" class="btn btn-warning btn-block">Generate Secure Password</button>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'role')->widget(Select2::class, [
                    'data' => [
                        'admin' => 'Admin',
                        'dinsos' => 'Dinsos',
                        'kecamatan' => 'Kecamatan',
                        'kelurahan' => 'Kelurahan',
                        'psm' => 'PSM'
                    ],
                    'options' => ['id' => 'role-select', 'placeholder' => 'Pilih Role'],
                    'pluginOptions' => ['allowClear' => true]
                ])->label('Role *') ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'kecamatan_id')->widget(Select2::class, [
                    'data' => ArrayHelper::map(Kecamatan::find()->all(), 'id_lama', 'nama'),
                    'options' => ['id' => 'kecamatan-field', 'placeholder' => 'Pilih Kecamatan'],
                    'pluginOptions' => ['allowClear' => true]
                ])->label('Kecamatan (Wajib untuk Kecamatan, Kelurahan, PSM)') ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'kelurahan_id')->widget(DepDrop::class, [
                    'options' => ['id' => 'kelurahan-field'],
                    'pluginOptions' => [
                        'depends' => ['kecamatan-field'],
                        'placeholder' => 'Pilih Kelurahan',
                        'url' => Url::to(['/users/get-kelurahan'])
                    ]
                ])->label('Kelurahan (Wajib untuk Kelurahan, PSM)') ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'psm_id')->widget(Select2::class, [
                    'data' => ArrayHelper::map(Psm::find()->all(), 'id', 'nama'),
                    'options' => ['id' => 'psm-field', 'placeholder' => 'Pilih PSM'],
                    'pluginOptions' => ['allowClear' => true]
                ])->label('PSM (Wajib untuk PSM)') ?>
            </div>
        </div>

        <div class="form-group text-right">
            <?= Html::submitButton('<i class="fas fa-save"></i> Simpan', [
                'class' => 'btn btn-success btn-md'
            ]) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>

<?php
$js = <<<JS
    function updateFields() {
        var role = $('#role-select').val();
        if (role == 'kecamatan') {
            $('#kecamatan-field').closest('.form-group').show();
            $('#kelurahan-field').closest('.form-group').hide();
            $('#psm-field').closest('.form-group').hide();
            $('#kecamatan-field').prop('required', true);
            $('#kelurahan-field').prop('required', false);
            $('#psm-field').prop('required', false);
        } else if (role == 'kelurahan' || role == 'psm') {
            $('#kecamatan-field').closest('.form-group').show();
            $('#kelurahan-field').closest('.form-group').show();
            $('#psm-field').closest('.form-group').show();
            $('#kecamatan-field').prop('required', true);
            $('#kelurahan-field').prop('required', true);
            $('#psm-field').prop('required', true);
        } else {
            $('#kecamatan-field').closest('.form-group').hide();
            $('#kelurahan-field').closest('.form-group').hide();
            $('#psm-field').closest('.form-group').hide();
            $('#kecamatan-field').prop('required', false);
            $('#kelurahan-field').prop('required', false);
            $('#psm-field').prop('required', false);
        }
    }

    $('#role-select').change(updateFields);
    updateFields(); // Panggil saat halaman dimuat
JS;

$this->registerJs($js, View::POS_READY);
?>
<script>
document.getElementById('togglePassword').addEventListener('click', function () {
    var password = document.getElementById('password');
    password.type = password.type === 'password' ? 'text' : 'password';
    this.innerHTML = password.type === 'password' ? '<i class="fas fa-eye"></i>' : '<i class="fas fa-eye-slash"></i>';
});

document.getElementById('generatePassword').addEventListener('click', function () {
    fetch('<?= Url::to(['users/generate-password']) ?>')
        .then(response => response.json())
        .then(data => {
            document.getElementById('password').value = data.password;
        })
        .catch(error => console.error('Error:', error));
});

document.getElementById('generateUsername').addEventListener('click', function () {
    var role = document.getElementById('role-select').value;
    var kecamatan = document.getElementById('kecamatan-field').value;
    var kelurahan = document.getElementById('kelurahan-field').value;

    if (!role) {
        alert("Pilih role terlebih dahulu!");
        return;
    }

    var params = new URLSearchParams();
    params.append("role", role);

    // Role kecamatan, kelurahan, dan psm wajib pilih kecamatan/kelurahan
    if (role === "kecamatan" && !kecamatan) {
        alert("Pilih kecamatan terlebih dahulu!");
        return;
    } else if ((role === "kelurahan" || role === "psm") && !kelurahan) {
        alert("Pilih kelurahan terlebih dahulu!");
        return;
    }

    // Tambahkan parameter jika sesuai
    if (kecamatan) params.append("kecamatan", kecamatan);
    if (kelurahan) params.append("kelurahan", kelurahan);

    fetch('<?= Url::to(['users/generate-username']) ?>&' + params.toString())
        .then(response => response.json())
        .then(data => {
            if (data.username) {
                document.getElementById('username').value = data.username;
            } else {
                alert("Gagal generate username!");
            }
        })
        .catch(error => console.error('Error:', error));
});


</script>