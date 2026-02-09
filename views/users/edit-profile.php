<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

$this->title = 'Edit Profil';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Edit Profil</h3>
    </div>

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div class="card-body">
        <div class="text-center">
            <img id="profilePreview" 
                 src="<?= $model->foto ? Url::to('@web/' . $model->foto) : Url::to('@web/images/user.png'); ?>" 
                 class="profile-user-img img-fluid img-circle" style="width: 100px;">
        </div>

        <?= $form->field($model, 'foto')->fileInput([
            'class' => 'form-control',
            'id' => 'fotoInput',
            'onchange' => 'previewImage(event)'
        ])->label('Upload Foto') ?>

        <?= $form->field($model, 'username')->textInput(['readonly' => true]) ?>
        <?= $form->field($model, 'nama_lengkap')->textInput() ?>

        <div class="form-group">
            <label>Password Baru</label>
            <div class="input-group">
                <input type="password" id="password" name="Users[new_password]" class="form-control" placeholder="Masukkan password baru">
                <div class="input-group-append">
                    <button type="button" id="togglePassword" class="btn btn-secondary">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
            </div>
            <small class="text-muted">Kosongkan jika tidak ingin mengubah password</small>
        </div>

        <button type="button" id="generatePassword" class="btn btn-warning btn-block">Generate Secure Password</button>

        <button type="submit" class="btn btn-primary btn-block">Simpan Perubahan</button>
    </div>

    <?php ActiveForm::end(); ?>
</div>

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

// ✅ Preview gambar otomatis saat memilih file
function previewImage(event) {
    var reader = new FileReader();
    reader.onload = function() {
        var output = document.getElementById('profilePreview');
        output.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
}
</script>
