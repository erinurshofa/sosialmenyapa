<?php
/** @var yii\web\View $this */
/** @var app\models\Psm $model */
?>

<div class="alert alert-success">
    <h3>Terima Kasih, <strong> <?= htmlspecialchars($model->nama) ?></strong>!</h3>
    <p>Pendaftaran Anda sebagai <strong>Pekerja Sosial Masyarakat</strong> telah berhasil.</p>
    <p>Kami akan melakukan review dalam waktu <strong>2x24 jam</strong>. Silakan cek email Anda untuk informasi selanjutnya.</p>
    <p class="mt-2 text-muted">
        Apabila email tidak ditemukan di kotak masuk (inbox), silakan periksa juga pada folder <strong>Spam</strong> atau <strong>Promosi</strong>.
    </p>
</div>
