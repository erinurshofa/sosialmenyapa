<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\BencanaKorbanIndividu $model */

$this->title = 'Profil Detail: ' . $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Data Korban', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->nama;
\yii\web\YiiAsset::register($this);

// Menyiapkan warna status_akhir
$status = strtolower($model->status_akhir);
$bgStatus = '#e2e8f0'; $iconStatus = 'fa-info-circle'; $txtColor = '#475569';
if ($status == 'input' || $status == '') { $bgStatus = '#fff3cd'; $txtColor = '#856404'; $iconStatus = 'fa-hourglass-half'; $model->status_akhir = 'Menunggu'; }
elseif ($status == 'verifikasi') { $bgStatus = '#cce5ff'; $txtColor = '#004085'; $iconStatus = 'fa-user-check'; }
elseif ($status == 'validasi') { $bgStatus = '#d4edda'; $txtColor = '#155724'; $iconStatus = 'fa-check-double'; }
elseif ($status == 'disetujui') { $bgStatus = 'linear-gradient(135deg, #11998e, #38ef7d)'; $txtColor = 'white'; $iconStatus = 'fa-thumbs-up'; }
elseif ($status == 'ditolak') { $bgStatus = '#f8d7da'; $txtColor = '#721c24'; $iconStatus = 'fa-times-circle'; }
?>

<style>
    .split-card-container {
        display: grid;
        grid-template-columns: 1fr 2fr;
        gap: 25px;
        margin-top: 15px;
    }
    @media (max-width: 900px) {
        .split-card-container { grid-template-columns: 1fr; }
    }
    .premium-profile-card, .premium-detail-card {
        background: #ffffff;
        border-radius: 16px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.05);
        border: 1px solid rgba(226, 232, 240, 0.8);
        overflow: hidden;
    }
    .premium-profile-header {
        background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
        height: 100px;
        position: relative;
    }
    .avatar-wrapper {
        position: absolute;
        bottom: -45px;
        left: 50%;
        transform: translateX(-50%);
        width: 100px;
        height: 100px;
        background: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        border: 4px solid #f8fafc;
        font-size: 2.5rem;
        color: <?= $model->jenis_kelamin == 'L' ? '#3182ce' : '#d53f8c' ?>;
    }
    .profile-info {
        padding: 60px 20px 30px;
        text-align: center;
    }
    .profile-info h3 { font-weight: 700; color: #0f172a; margin: 0 0 5px; font-size: 1.35rem; }
    .profile-info p { color: #64748b; font-size: 0.95rem; margin: 0; }
    
    .status-badge-lg {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 10px 24px;
        border-radius: 50rem;
        font-weight: 600;
        font-size: 0.95rem;
        margin-top: 20px;
        background: <?= $bgStatus ?>;
        color: <?= $txtColor ?>;
        box-shadow: 0 4px 15px rgba(0,0,0,0.05);
    }
    
    .premium-detail-header {
        background: #f8fafc;
        padding: 20px 25px;
        border-bottom: 1px solid rgba(226, 232, 240, 0.8);
        display: flex;
        align-items: center;
        gap: 12px;
        font-weight: 600;
        font-size: 1.1rem;
        color: #334155;
    }
    .detail-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    .detail-list li {
        padding: 16px 25px;
        border-bottom: 1px solid rgba(226, 232, 240, 0.5);
        display: flex;
        align-items: flex-start;
        gap: 15px;
    }
    .detail-list li:last-child { border-bottom: none; }
    .detail-icon {
        width: 35px;
        height: 35px;
        border-radius: 8px;
        background: #f1f5f9;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #64748b;
        font-size: 1rem;
        flex-shrink: 0;
    }
    .detail-text { flex-grow: 1; }
    .detail-label { display: block; font-size: 0.8rem; text-transform: uppercase; letter-spacing: 0.5px; color: #94a3b8; font-weight: 600; margin-bottom: 2px; }
    .detail-value { display: block; font-size: 0.95rem; color: #1e293b; font-weight: 500; }
    
    /* Action Buttons Header */
    .page-header-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
        background: #ffffff;
        padding: 15px 25px;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.03);
    }
    .page-title { display: flex; align-items: center; gap: 10px; margin: 0; font-size: 1.25rem; font-weight: 700; color: #0f172a; }
    .btn-pill {
        border-radius: 50rem;
        padding: 8px 20px;
        font-weight: 600;
        font-size: 0.9rem;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.2s ease;
        border: none;
    }
    .btn-pill-back { background: #f1f5f9; color: #475569; }
    .btn-pill-back:hover { background: #e2e8f0; color: #1e293b; transform: translateY(-2px); }
    .btn-pill-update { background: #eff6ff; color: #3b82f6; }
    .btn-pill-update:hover { background: #dbeafe; transform: translateY(-2px); }
    .btn-pill-delete { background: #fef2f2; color: #ef4444; }
    .btn-pill-delete:hover { background: #fee2e2; transform: translateY(-2px); }
    
</style>

<div class="bencana-korban-individu-view">

    <div class="page-header-actions">
        <h2 class="page-title">
            <i class="fas fa-address-card text-primary"></i> <?= Html::encode($this->title) ?>
        </h2>
        <div class="action-buttons">
            <?= Html::a('<i class="fas fa-arrow-left"></i> Kembali', ['index'], ['class' => 'btn-pill btn-pill-back']) ?>
            <?= Html::a('<i class="fas fa-edit"></i> Edit', ['update', 'id' => $model->id], ['class' => 'btn-pill btn-pill-update mx-2']) ?>
            <?= Html::a('<i class="fas fa-trash-alt"></i> Hapus', ['delete', 'id' => $model->id], [
                'class' => 'btn-pill btn-pill-delete',
                'data' => [
                    'confirm' => 'Apakah Anda yakin ingin menghapus data korban ini? Tindakan ini tidak dapat dipulihkan.',
                    'method' => 'post',
                ],
            ]) ?>
        </div>
    </div>

    <div class="split-card-container">
        <!-- Left: Profile Summary Card -->
        <div class="premium-profile-card">
            <div class="premium-profile-header">
                <div class="avatar-wrapper">
                    <i class="fas <?= $model->jenis_kelamin == 'L' ? 'fa-user-tie' : 'fa-user' ?>"></i>
                </div>
            </div>
            <div class="profile-info">
                <h3><?= Html::encode($model->nama) ?></h3>
                <p><i class="far fa-id-card"></i> NIK: <?= Html::encode($model->nik) ?></p>
                <div class="status-badge-lg">
                    <i class="fas <?= $iconStatus ?>"></i> <?= ucfirst($model->status_akhir) ?>
                </div>
            </div>
        </div>

        <!-- Right: Detail Record Card -->
        <div class="premium-detail-card">
            <div class="premium-detail-header">
                <i class="fas fa-info-circle text-info"></i> Rincian Kejadian & Demografi
            </div>
            <ul class="detail-list">
                <li>
                    <div class="detail-icon"><i class="fas fa-house-damage"></i></div>
                    <div class="detail-text">
                        <span class="detail-label">Jenis Bencana</span>
                        <span class="detail-value"><?= $model->bencana ? Html::encode($model->bencana->nama_bencana) : '-' ?></span>
                    </div>
                </li>
                <li>
                    <div class="detail-icon"><i class="fas fa-user-injured"></i></div>
                    <div class="detail-text">
                        <span class="detail-label">Kategori Korban</span>
                        <span class="detail-value"><?= $model->kategoriKorban ? Html::encode($model->kategoriKorban->nama_kategori) : '-' ?></span>
                    </div>
                </li>
                 <li>
                    <div class="detail-icon"><i class="fas fa-venus-mars"></i></div>
                    <div class="detail-text">
                        <span class="detail-label">Jenis Kelamin</span>
                        <span class="detail-value"><?= $model->jenis_kelamin == 'L' ? 'Laki-Laki' : 'Perempuan' ?></span>
                    </div>
                </li>
                <li>
                    <div class="detail-icon"><i class="fas fa-map-marker-alt"></i></div>
                    <div class="detail-text">
                        <span class="detail-label">Alamat Lengkap</span>
                        <span class="detail-value"><?= Html::encode($model->alamat) ?></span>
                    </div>
                </li>
                <li>
                    <div class="detail-icon"><i class="fas fa-map-signs"></i></div>
                    <div class="detail-text">
                        <span class="detail-label">Kelurahan / Kecamatan</span>
                        <span class="detail-value">
                            <?= $model->kelurahan ? Html::encode($model->kelurahan->nama) : '-' ?>
                            / 
                            <?= $model->kecamatan ? Html::encode($model->kecamatan->nama) : '-' ?>
                        </span>
                    </div>
                </li>
                <li>
                    <div class="detail-icon"><i class="fas fa-city"></i></div>
                    <div class="detail-text">
                        <span class="detail-label">Kota / Provinsi</span>
                        <span class="detail-value">Kota Semarang, Jawa Tengah</span>
                    </div>
                </li>
            </ul>
        </div>
    </div>

</div>
