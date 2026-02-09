<?php
use yii\helpers\Url;
use app\models\Actions;
use app\models\ActionsService;
use app\models\P3keIndividu2025;
use app\models\P3keKeluarga2025;
use app\models\Dokumen;
use app\models\Account;
use app\models\Kecamatan;
use yii\helpers\Html;

$session = Yii::$app->session;

$this->title = 'Dashboard P3KE';

$jml_verifikasi_keluarga = 0;
$jml_verifikasi_individu = 0;
$jml_ditemukan_individu = 0;
$jml_meninggal_individu = 0;
$j_total_keluarga = 0;
$j_total_individu = 0;
$jml_kemiskinan_ekstrem_keluarga = 0;
$jml_kemiskinan_ekstrem_individu = 0;
$jml_ke_keluarga = 0;
$jml_ke_individu = 0;
$url_ke_keluarga = "";
$url_ke_individu = "";

$roleadmin = ["eksekutif", "admin", "pfm", "dinsos", "superadmin", "bappeda", "disnaker", "dispertan", "dinas_perikanan", "disdukcapil", "disdalduk_kb", "dinkes", "disperkim", "dinkop_um", "dinas_pendidikan", "kominfo", "pdam", "ketapang"];
if (in_array(strtolower(Yii::$app->user->identity->role), $roleadmin)) {
    $jml_verifikasi_keluarga = @P3keKeluarga2025::find()->where(['status_verval' => 'Sudah'])->count();
    $jml_verifikasi_individu = @P3keIndividu2025::find()->where(['verifikasi' => 'Sudah'])->count();
    $jml_ditemukan_individu = @P3keIndividu2025::find()->where(['status_keberadaan' => 'Ditemukan'])->count();
    $jml_meninggal_individu = @P3keIndividu2025::find()->where(['status_keberadaan' => 'Meninggal'])->count();
    $j_total_keluarga = @P3keKeluarga2025::find()->count();
    $j_total_individu = @P3keIndividu2025::find()->count();
    $jml_kemiskinan_ekstrem_keluarga = @P3keKeluarga2025::find()
        ->where(['status_kemiskinan' => 'Kemiskinan Ekstrem'])
        ->andWhere(['status_keberadaan' => 'Ditemukan'])
        ->andWhere(['status_intervensi' => ['Belum', 'Sedang Proses']])
        ->count();
    $jml_kemiskinan_ekstrem_individu = @P3keIndividu2025::find()
        ->where(['status_kemiskinan' => 'Kemiskinan Ekstrem'])
        ->andWhere(['status_keberadaan' => 'Ditemukan'])
        ->andWhere(['status_intervensi' => ['Belum', 'Sedang Proses']])
        ->count();
    $url_ke_keluarga = Url::to(['p3ke2025/index', 'status_kemiskinan_keluarga' => 'Kemiskinan Ekstrem', 'status_keberadaan_keluarga' => 'Ditemukan', 'status_intervensi_keluarga' => 'Belum dan Sedang Proses', 'set' => 'tab1']);
    $url_ke_individu = Url::to(['p3ke2025/index', 'status_kemiskinan_individu' => 'Kemiskinan Ekstrem', 'status_keberadaan_individu' => 'Ditemukan', 'status_intervensi_individu' => 'Belum dan Sedang Proses', 'set' => 'tab2']);
}

// Additional role-based configurations omitted for brevity

?>

<style>
.dashboard-container {
    font-family: 'Roboto', sans-serif;
    padding: 20px;
    background-color: #f9f9f9;
}

.card {
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    background-color: #fff;
    padding: 20px;
    text-align: center;
    margin-bottom: 20px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    position: relative;
    overflow: hidden;
}

.card:hover {
    transform: scale(1.05);
    box-shadow: 0 6px 8px rgba(0, 0, 0, 0.15);
}

.card-title {
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 10px;
}

.card-value {
    font-size: 24px;
    color: #28a745;
    font-weight: bold;
}

.card-link {
    display: block;
    margin-top: 10px;
    text-decoration: none;
    font-size: 14px;
    color: #007bff;
    transition: color 0.3s ease;
}

.card-link:hover {
    color: #0056b3;
    text-decoration: underline;
}

.card-icon {
    font-size: 50px;
    color: #6c757d;
    margin-bottom: 15px;
    transition: transform 0.3s ease, color 0.3s ease;
}

.card:hover .card-icon {
    transform: scale(1.2);
    color: #28a745;
}

.row {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
}

.col {
    flex: 1 1 calc(25% - 20px);
    min-width: 200px;
}
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<div class="dashboard-container">
    <div class="row">
        <div class="col">
            <div class="card">
                <i class="fas fa-users card-icon"></i>
                <div class="card-title">Verifikasi Keluarga</div>
                <div class="card-value">
                    <?= $jml_verifikasi_keluarga ?>/<?= $j_total_keluarga ?>
                </div>
                <a href="<?= Url::to(['p3ke2025/index', 'verifikasi_keluarga' => 'Sudah', 'set' => 'tab1']) ?>" class="card-link">Detail</a>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <i class="fas fa-user-check card-icon"></i>
                <div class="card-title">Verifikasi Individu</div>
                <div class="card-value">
                    <?= $jml_verifikasi_individu ?>/<?= $j_total_individu ?>
                </div>
                <a href="<?= Url::to(['p3ke2025/index', 'verifikasi_individu' => 'Sudah', 'set' => 'tab2']) ?>" class="card-link">Detail</a>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <i class="fas fa-user card-icon"></i>
                <div class="card-title">Individu Ditemukan</div>
                <div class="card-value">
                    <?= $jml_ditemukan_individu ?>/<?= $j_total_individu ?>
                </div>
                <a href="<?= Url::to(['p3ke2025/index', 'status_keberadaan_individu' => 'Ditemukan', 'set' => 'tab2']) ?>" class="card-link">Detail</a>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <i class="fas fa-user-slash card-icon"></i>
                <div class="card-title">Individu Meninggal</div>
                <div class="card-value">
                    <?= $jml_meninggal_individu ?>/<?= $j_total_individu ?>
                </div>
                <a href="<?= Url::to(['p3ke2025/index', 'status_keberadaan_individu' => 'Meninggal', 'set' => 'tab2']) ?>" class="card-link">Detail</a>
            </div>
        </div>
    </div>
</div>
