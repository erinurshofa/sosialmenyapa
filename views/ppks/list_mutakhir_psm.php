<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pemutakhiran Data PPKS';
$this->params['breadcrumbs'][] = $this->title;
?>

<style>
/* Modern Color Palette & Typography */
:root {
    --primary-blue: #2563eb;
    --primary-hover: #1d4ed8;
    --secondary-bg: #f8fafc;
    --card-bg: #ffffff;
    --text-main: #1e293b;
    --text-muted: #64748b;
    --border-color: #e2e8f0;
    --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
    --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
    --shadow-hover: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
    --radius-md: 0.75rem;
    --radius-lg: 1rem;
    --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

.ppks-premium-container {
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
    color: var(--text-main);
    padding-bottom: 2rem;
}

/* Header Section */
.premium-header {
    background: linear-gradient(135deg, var(--primary-blue), #3b82f6);
    border-radius: var(--radius-lg);
    padding: 2rem;
    color: white;
    margin-bottom: 2rem;
    box-shadow: var(--shadow-md);
    position: relative;
    overflow: hidden;
}

.premium-header::after {
    content: '';
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 50%;
    background: linear-gradient(to right, rgba(255,255,255,0), rgba(255,255,255,0.1));
    transform: skewX(-15deg);
}

.premium-title {
    font-size: 1.75rem;
    font-weight: 700;
    margin: 0 0 0.5rem 0;
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.premium-subtitle {
    font-size: 1rem;
    opacity: 0.9;
    margin: 0;
    font-weight: 400;
}

/* Search Bar */
.premium-search-wrapper {
    background: var(--card-bg);
    padding: 1.5rem;
    border-radius: var(--radius-md);
    box-shadow: var(--shadow-sm);
    margin-bottom: 2rem;
    border: 1px solid var(--border-color);
}

.premium-search-group {
    display: flex;
    gap: 1rem;
    position: relative;
}

.premium-search-input {
    flex: 1;
    padding: 1rem 1rem 1rem 3rem;
    border: 2px solid var(--border-color);
    border-radius: 0.5rem;
    font-size: 1rem;
    transition: var(--transition);
    background: var(--secondary-bg);
}

.premium-search-input:focus {
    outline: none;
    border-color: var(--primary-blue);
    background: var(--card-bg);
    box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.1);
}

.search-icon {
    position: absolute;
    left: 1rem;
    top: 50%;
    transform: translateY(-50%);
    color: var(--text-muted);
    font-size: 1.25rem;
}

.btn-premium-search {
    background: var(--primary-blue);
    color: white;
    border: none;
    padding: 0 1.5rem;
    border-radius: 0.5rem;
    font-weight: 600;
    font-size: 1rem;
    cursor: pointer;
    transition: var(--transition);
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.btn-premium-search:hover {
    background: var(--primary-hover);
    transform: translateY(-1px);
}

/* Card Grid Layout */
.ppks-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
    gap: 1.5rem;
}

/* Individual Card */
.ppks-card {
    background: var(--card-bg);
    border-radius: var(--radius-md);
    border: 1px solid var(--border-color);
    box-shadow: var(--shadow-sm);
    transition: var(--transition);
    display: flex;
    flex-direction: column;
    overflow: hidden;
    position: relative;
}

.ppks-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-hover);
    border-color: #cbd5e1;
}

.card-header-status {
    padding: 1rem 1.25rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 1px solid var(--border-color);
    background: var(--secondary-bg);
}

.status-badge {
    padding: 0.35rem 0.75rem;
    border-radius: 2rem;
    font-size: 0.85rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.025em;
}

.status-aktif {
    background: #dcfce7;
    color: #166534;
}

.card-body-content {
    padding: 1.25rem;
    flex: 1;
}

.ppks-name {
    font-size: 1.15rem;
    font-weight: 700;
    color: var(--text-main);
    margin: 0 0 0.25rem 0;
    line-height: 1.4;
}

.ppks-nik {
    font-family: 'Courier New', Courier, monospace;
    font-size: 0.95rem;
    color: var(--text-muted);
    margin: 0 0 1rem 0;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.ppks-detail-row {
    display: flex;
    align-items: flex-start;
    gap: 0.75rem;
    margin-bottom: 0.75rem;
    font-size: 0.9rem;
    color: var(--text-main);
}

.detail-icon {
    color: var(--text-muted);
    margin-top: 0.2rem;
    width: 16px;
    text-align: center;
}

/* Card Footer & Action Buttons */
.card-footer-action {
    padding: 1.25rem;
    border-top: 1px solid var(--border-color);
    background: var(--card-bg);
    display: flex;
    gap: 0.75rem;
}

.btn-action {
    flex: 1;
    display: inline-flex;
    justify-content: center;
    align-items: center;
    gap: 0.5rem;
    padding: 0.75rem 1rem;
    border-radius: 0.5rem;
    font-weight: 600;
    font-size: 0.9rem;
    text-decoration: none !important;
    transition: var(--transition);
    text-align: center;
}

.btn-ajukan {
    background: var(--primary-blue);
    color: white !important;
    border: 1px solid var(--primary-blue);
}

.btn-ajukan:hover {
    background: var(--primary-hover);
    transform: translateY(-2px);
    box-shadow: 0 4px 6px -1px rgba(37, 99, 235, 0.2);
}

.btn-menunggu {
    background: #fffbeb;
    color: #b45309 !important;
    border: 1px solid #fde68a;
    cursor: not-allowed;
}

/* Empty State */
.empty-state {
    text-align: center;
    padding: 4rem 2rem;
    background: var(--card-bg);
    border-radius: var(--radius-md);
    border: 1px dashed #cbd5e1;
    color: var(--text-muted);
}

.empty-icon {
    font-size: 4rem;
    color: #e2e8f0;
    margin-bottom: 1rem;
}

/* Custom Pagination */
.premium-pagination {
    margin-top: 2rem;
    display: flex;
    justify-content: center;
}

.premium-pagination .pagination {
    margin: 0;
    gap: 0.25rem;
}

.premium-pagination .pagination > li > a,
.premium-pagination .pagination > li > span {
    border-radius: 0.5rem;
    padding: 0.5rem 1rem;
    color: var(--text-main);
    border: 1px solid var(--border-color);
    background: var(--card-bg);
    font-weight: 500;
    transition: var(--transition);
}

.premium-pagination .pagination > li > a:hover {
    background: var(--secondary-bg);
    color: var(--primary-blue);
    border-color: #cbd5e1;
}

.premium-pagination .pagination > .active > a,
.premium-pagination .pagination > .active > a:hover,
.premium-pagination .pagination > .active > span {
    background: var(--primary-blue);
    border-color: var(--primary-blue);
    color: white;
}

/* ----------------------------------
   RESPONSIVE QUERIES
---------------------------------- */
@media (max-width: 768px) {
    .premium-header {
        padding: 1.5rem;
        text-align: center;
    }
    
    .premium-title {
        justify-content: center;
        font-size: 1.5rem;
    }
    
    .premium-search-group {
        flex-direction: column;
    }
    
    .btn-premium-search {
        padding: 1rem;
        justify-content: center;
    }
    
    .ppks-grid {
        grid-template-columns: 1fr;
    }
}
</style>

<div class="ppks-premium-container">
    <!-- Header -->
    <div class="premium-header">
        <h1 class="premium-title">
            <i class="fa fa-users"></i> Pemutakhiran Data PPKS
        </h1>
        <p class="premium-subtitle">Ajukan perubahan status secara _real-time_ untuk warga PPKS di wilayah kelolaan Anda.</p>
    </div>

    <!-- Smart Search -->
    <div class="premium-search-wrapper">
        <form method="GET" action="">
            <div class="premium-search-group">
                <i class="fa fa-search search-icon"></i>
                <input type="text" name="search" class="premium-search-input" placeholder="Ketik NIK atau Nama Lengkap PPKS..." value="<?= Html::encode(Yii::$app->request->get('search')) ?>">
                <button class="btn-premium-search" type="submit">Cari Data</button>
                <?php if(Yii::$app->request->get('search')): ?>
                    <a href="<?= yii\helpers\Url::to(['list-mutakhir-psm']) ?>" class="btn-premium-search" style="background:var(--text-muted);"><i class="fa fa-times"></i> Reset</a>
                <?php endif; ?>
            </div>
        </form>
    </div>

    <!-- Data Grid -->
    <?php 
    $models = $dataProvider->getModels(); 
    if(empty($models)): 
    ?>
        <div class="empty-state">
            <i class="fa fa-folder-open-o empty-icon"></i>
            <h3>Tidak Ada Data Ditemukan</h3>
            <p>Silakan coba kata kunci pencarian yang lain.</p>
        </div>
    <?php else: ?>
        <div class="ppks-grid">
            <?php foreach($models as $model): ?>
                <?php 
                    $latest = \app\models\PpksMutakhirStatus::find()->where(['ppks_id'=>$model->id])->orderBy(['id'=>SORT_DESC])->one();
                    $isMenunggu = ($latest && $latest->status_pengajuan == 'MENUNGGU KONFIRMASI');
                    $currentStatus = $model->status ? $model->status : 'AKTIF';
                ?>
                <div class="ppks-card">
                    <!-- Card Header -->
                    <div class="card-header-status">
                         <span style="font-size: 0.8rem; color: var(--text-muted);"><i class="fa fa-id-card-o"></i> PPKS ID: #<?= $model->id ?></span>
                         <span class="status-badge status-aktif">
                             <i class="fa fa-circle" style="font-size:8px; vertical-align:middle; margin-right:4px;"></i> <?= Html::encode($currentStatus) ?>
                         </span>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body-content">
                        <h3 class="ppks-name"><?= Html::encode($model->nama) ?></h3>
                        <p class="ppks-nik"><i class="fa fa-hashtag"></i> NIK: <?= Html::encode($model->nik) ?></p>
                        
                        <div class="ppks-detail-row">
                            <i class="fa fa-map-marker detail-icon"></i>
                            <div>
                                <span style="display:block; font-weight:600; font-size:0.8rem; color:var(--text-muted); text-transform:uppercase;">Alamat Domisili</span>
                                <?= Html::encode($model->alamat) ?>
                            </div>
                        </div>

                        <div class="ppks-detail-row">
                            <i class="fa fa-tags detail-icon"></i>
                            <div>
                                <span style="display:block; font-weight:600; font-size:0.8rem; color:var(--text-muted); text-transform:uppercase;">Jenis Kategori PPKS</span>
                                <?= Html::encode($model->jenis_ppks_fix) ?>
                            </div>
                        </div>
                    </div>

                    <!-- Card Footer -->
                    <div class="card-footer-action">
                        <?php if($isMenunggu): ?>
                            <a href="<?= yii\helpers\Url::to(['form-mutakhir', 'id' => $model->id]) ?>" class="btn-action btn-menunggu">
                                <i class="fa fa-clock-o fa-spin"></i> Menunggu Persetujuan
                            </a>
                        <?php else: ?>
                            <a href="<?= yii\helpers\Url::to(['form-mutakhir', 'id' => $model->id]) ?>" class="btn-action btn-ajukan">
                                <i class="fa fa-edit"></i> Ajukan Mutakhir
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Pagination -->
        <div class="premium-pagination">
            <?= LinkPager::widget([
                'pagination' => $dataProvider->pagination,
                'prevPageLabel' => '&laquo; Sebelumnya',
                'nextPageLabel' => 'Selanjutnya &raquo;',
                'maxButtonCount' => 5,
            ]); ?>
        </div>
    <?php endif; ?>

</div>
