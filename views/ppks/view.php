<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Ppks */

$this->title = 'Profil Kalayan: ' . $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'PPKS', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->nama;
\yii\web\YiiAsset::register($this);

// Ambil role user & wilayah
$role = Yii::$app->user->identity->role ?? null;
$userKelurahan = Yii::$app->user->identity->kelurahan_id ?? null;
$userKecamatan = Yii::$app->user->identity->kecamatan_id ?? null;
$modelKelurahan = $model->kelurahan_id ?? null;
$modelKecamatan = $model->kecamatan_id ?? null;

// Tentukan foto profil
$fotoUrl = !empty($model->foto) ? Url::to('@web/uploads/' . $model->foto) : Url::to('@web/img/avatar.png');

// Kategori List Array
$kategoriList = [
    'punya_ktp' => ['Memiliki KTP', 'id-card'],
    'masuk_dtks' => ['Terdaftar di DTKS', 'database'],
    'anak_balita_terlantar' => ['Anak Balita Terlantar', 'baby'],
    'anak_terlantar' => ['Anak Terlantar', 'child'],
    'anak_yang_berhadapan_dengan_hukum' => ['Anak Berhadapan dengan Hukum', 'gavel'],
    'anak_jalanan' => ['Anak Jalanan', 'road'],
    'anak_dengan_kedisabilitasan' => ['Anak Disabilitas', 'wheelchair'],
    'anak_dengan_kedisabilitasan_fisik' => ['Anak Disabilitas Fisik', 'crutch'],
    'anak_dengan_kedisabilitasan_intelektual' => ['Anak Disabilitas Intelektual', 'brain'],
    'anak_dengan_kedisabilitasan_mental' => ['Anak Disabilitas Mental', 'head-side-virus'],
    'anak_dengan_kedisabilitasan_sensorik' => ['Anak Disabilitas Sensorik', 'eye-slash'],
    'anak_korban_tindak_kekerasan' => ['Anak Korban Kekerasan', 'user-injured'],
    'anak_yang_memerlukan_perlindungan_khusus' => ['Anak Perlindungan Khusus', 'shield-alt'],
    'lanjut_usia_terlantar' => ['Lansia Terlantar', 'blind'],
    'penyandang_disabilitas' => ['Penyandang Disabilitas', 'wheelchair'],
    'penyandang_disabilitas_fisik' => ['Disabilitas Fisik', 'wheelchair'],
    'penyandang_disabilitas_intelektual' => ['Disabilitas Intelektual', 'brain'],
    'penyandang_disabilitas_mental' => ['Disabilitas Mental', 'head-side-virus'],
    'penyandang_disabilitas_sensorik' => ['Disabilitas Sensorik', 'deaf'],
    'tuna_susila' => ['Tuna Susila', 'female'],
    'gelandangan' => ['Gelandangan', 'walking'],
    'pengemis' => ['Pengemis', 'hand-holding'],
    'pemulung' => ['Pemulung', 'trash-restore'],
    'kelompok_minoritas' => ['Kelompok Minoritas', 'users'],
    'bekas_warga_binaan_lembaga_pemasyarakatan' => ['Eks Napi', 'door-open'],
    'orang_dengan_hivaids' => ['ODHA', 'ribbon'],
    'korban_penyalahgunaan_napza' => ['Korban Napza', 'pills'],
    'korban_trafficking' => ['Korban Trafficking', 'people-carry'],
    'korban_tindak_kekerasan' => ['Korban Kekerasan', 'user-times'],
    'pekerja_migran_bermasalah_sosial' => ['PMI Bermasalah', 'plane-arrival'],
    'korban_bencana_alam' => ['Korban Bencana Alam', 'house-damage'],
    'korban_bencana_sosial' => ['Korban Bencana Sosial', 'fire-alt'],
    'perempuan_rawan_sosial_ekonomi' => ['Perempuan RSE', 'female'],
    'fakir_miskin' => ['Fakir Miskin', 'coins'],
    'keluarga_bermasalah_sosial_psikologis' => ['Kel. Bermasalah Psiko', 'users-slash'],
    'komunitas_adat_terpencil' => ['KAT', 'campground'],
];

// Helpers untuk status
$statusBadgeClass = [
    'AKTIF' => 'badge-success',
    'MENINGGAL DUNIA' => 'badge-dark',
    'PINDAH TIDAK DITEMPAT' => 'badge-warning',
    'MAMPU' => 'badge-info',
];
$badgeClass = $statusBadgeClass[$model->status] ?? 'badge-secondary';

// Ambil Riwayat Layanan
$layananTerlantar = \app\models\PpksLayananTerlantar::find()->where(['ppks_id' => $model->id])->orderBy(['tanggal_layanan' => SORT_DESC])->all();
$layananNonTerlantar = \app\models\PpksLayananNonTerlantar::find()->where(['ppks_id' => $model->id])->orderBy(['tanggal_layanan' => SORT_DESC])->all();
$hasHistory = !empty($layananTerlantar) || !empty($layananNonTerlantar);
?>

<style>
/* Custom Styles for Premium UI */
.profile-user-img {
    border: 3px solid #adb5bd;
    margin: 0 auto;
    padding: 3px;
    width: 120px;
    height: 120px;
    object-fit: cover;
}
.profile-username {
    font-size: 21px;
    margin-top: 10px;
    font-weight: 700;
}
.card-primary.card-outline {
    border-top: 3px solid var(--primary);
}
.list-group-unbordered > .list-group-item {
    border-left: 0;
    border-right: 0;
    border-radius: 0;
    padding-left: 0;
    padding-right: 0;
}
.indicator-box {
    padding: 12px;
    border-radius: 8px;
    margin-bottom: 10px;
    background: #f8f9fa;
    border: 1px solid #dee2e6;
    display: flex;
    align-items: center;
    transition: all 0.3s ease;
}
.indicator-box.active {
    background: #eafbee;
    border-color: #28a745;
    box-shadow: 0 2px 5px rgba(40, 167, 69, 0.2);
}
.indicator-box .icon-wrapper {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    margin-right: 15px;
    background: #fff;
    box-shadow: 0 1px 3px rgba(0,0,0,0.1);
}
.indicator-box.active .icon-wrapper {
    color: #28a745;
    background: #fff;
}
.indicator-box.inactive .icon-wrapper {
    color: #6c757d;
}
.indicator-box .indicator-text {
    font-weight: 600;
    color: #495057;
    font-size: 14px;
    line-height: 1.2;
}
.timeline-item-premium {
    position: relative;
    padding-left: 30px;
    margin-bottom: 25px;
}
.timeline-item-premium::before {
    content: '';
    position: absolute;
    left: 7px;
    top: 0;
    bottom: -25px;
    width: 2px;
    background: #e9ecef;
}
.timeline-item-premium:last-child::before {
    display: none;
}
.timeline-item-premium .timeline-icon {
    position: absolute;
    left: 0;
    top: 0;
    width: 16px;
    height: 16px;
    border-radius: 50%;
    background: #007bff;
    border: 3px solid #fff;
    box-shadow: 0 0 0 2px #007bff;
}
.timeline-item-premium.tl-danger .timeline-icon { background: #dc3545; box-shadow: 0 0 0 2px #dc3545; }
.timeline-item-premium.tl-success .timeline-icon { background: #28a745; box-shadow: 0 0 0 2px #28a745; }
.timeline-content {
    background: #fff;
    border-radius: 6px;
    padding: 15px;
    box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    border: 1px solid #f4f6f9;
}
</style>

<div class="row">
    <!-- COL-MD-4 KIRI : PROFIL UTAMA -->
    <div class="col-md-4 col-12 mb-4">
        <div class="card card-primary card-outline shadow-sm">
            <div class="card-body box-profile text-center">
                <img class="profile-user-img img-fluid img-circle" src="<?= $fotoUrl ?>" alt="User profile picture">

                <h3 class="profile-username"><?= Html::encode($model->nama) ?></h3>
                <p class="text-muted mb-2"><i class="fa fa-id-card"></i> <?= Html::encode($model->nik) ?></p>
                <h5><span class="badge badge-pill <?= $badgeClass ?> px-3 py-2 text-uppercase"><?= !empty($model->status) ? Html::encode($model->status) : 'AKTIF' ?></span></h5>

                <ul class="list-group list-group-unbordered my-3">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <b>KK</b> <span class="text-muted"><?= Html::encode($model->no_kk) ?: '-' ?></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <b>Jenis Kelamin</b> <span class="text-muted"><?= Html::encode($model->jenis_kelamin) ?></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <b>Terlantar?</b> 
                        <?php if ($model->apakah_terlantar == 1): ?>
                            <span class="badge badge-danger">YA</span>
                        <?php else: ?>
                            <span class="badge badge-secondary">TIDAK</span>
                        <?php endif; ?>
                    </li>
                </ul>

                <div class="d-flex justify-content-center mt-3">
                    <!-- Approval Badges -->
                    <div class="mr-3 text-center" title="Status Verifikasi">
                        <?php if ($model->verifikasi): ?>
                            <i class="fa fa-check-circle fa-2x text-success"></i><br><small class="text-success">Verif</small>
                        <?php else: ?>
                            <i class="fa fa-times-circle fa-2x text-danger"></i><br><small class="text-danger">Verif</small>
                        <?php endif; ?>
                    </div>
                    <div class="mr-3 text-center" title="Status Validasi">
                        <?php if ($model->validasi): ?>
                            <i class="fa fa-check-circle fa-2x text-success"></i><br><small class="text-success">Valid</small>
                        <?php else: ?>
                            <i class="fa fa-times-circle fa-2x text-danger"></i><br><small class="text-danger">Valid</small>
                        <?php endif; ?>
                    </div>
                    <div class="text-center" title="Status Approval Dinsos">
                        <?php if ($model->approved): ?>
                            <i class="fa fa-check-circle fa-2x text-success"></i><br><small class="text-success">Approve</small>
                        <?php else: ?>
                            <i class="fa fa-times-circle fa-2x text-danger"></i><br><small class="text-danger">Approve</small>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="mt-4 pt-3 border-top">
                    <?php if ($role === 'admin' || $role === 'dinsos' || ($role === 'kelurahan' && $userKelurahan == $modelKelurahan) || ($role === 'kecamatan' && $userKecamatan == $modelKecamatan)): ?>
                        <?= Html::a('<i class="fa fa-pencil-alt"></i> Edit Profil', ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-block mb-2 rounded-pill']) ?>
                    <?php endif; ?>
                    
                    <?php if ($role === 'admin' || $role === 'dinsos'): ?>
                        <?= Html::a('<i class="fa fa-trash"></i> Hapus Data', ['delete', 'id' => $model->id], [
                            'class' => 'btn btn-outline-danger btn-block rounded-pill',
                            'data' => [
                                'confirm' => 'Apakah Anda yakin ingin menghapus PPKS ini?',
                                'method' => 'post',
                            ],
                        ]) ?>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </div>
    <!-- END COL-MD-4 -->

    <!-- COL-MD-8 KANAN : TABS -->
    <div class="col-md-8 col-12 mb-4">
        <div class="card shadow-sm">
            <div class="card-header p-2">
                <ul class="nav nav-pills" id="ppksTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="bio-tab" data-toggle="pill" href="#bio" role="tab" aria-controls="bio" aria-selected="true"><i class="fa fa-address-card"></i> Biodata</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="indikator-tab" data-toggle="pill" href="#indikator" role="tab" aria-controls="indikator" aria-selected="false"><i class="fa fa-tags"></i> Klasifikasi PPKS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="layanan-tab" data-toggle="pill" href="#layanan" role="tab" aria-controls="layanan" aria-selected="false"><i class="fa fa-history"></i> Riwayat Layanan</a>
                    </li>
                </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content" id="ppksTabContent">
                    
                    <!-- TAB 1 : BIODATA -->
                    <div class="tab-pane fade show active" id="bio" role="tabpanel" aria-labelledby="bio-tab">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <h5 class="border-bottom pb-2 text-primary"><i class="fa fa-map-marker-alt"></i> Identitas Geografis</h5>
                                <table class="table table-sm table-borderless table-striped">
                                    <tr><th width="30%">Alamat KTP</th><td><?= nl2br(Html::encode($model->alamat)) ?> RT <?= $model->rt ?>/RW <?= $model->rw ?></td></tr>
                                    <tr><th>Kelurahan/Desa</th><td><?= Html::encode($model->kelurahan) ?></td></tr>
                                    <tr><th>Kecamatan</th><td><?= Html::encode($model->kecamatan) ?></td></tr>
                                    <tr><th>Alamat Domisili</th><td><?= nl2br(Html::encode($model->alamat_domisili)) ?></td></tr>
                                </table>
                            </div>
                            <!-- ... -->
                            <div class="col-md-12 mb-3">
                                <h5 class="border-bottom pb-2 text-primary"><i class="fa fa-info-circle"></i> Info Personal Tambahan</h5>
                                <table class="table table-sm table-borderless table-striped">
                                    <tr><th width="30%">Tempat, Tgl Lahir</th><td><?= Html::encode($model->tempat_lahir) ?>, <?= $model->tanggal_lahir ? date('d M Y', strtotime($model->tanggal_lahir)) : '-' ?></td></tr>
                                    <tr><th>Kondisi Kesehatan</th><td><?= Html::encode($model->kondisi_kesehatan) ?: '-' ?></td></tr>
                                    <tr><th>Jenis Disabilitas</th><td><?= Html::encode($model->jenis_disabilitas ?: '-') ?></td></tr>
                                    <tr><th>Kontak Penanggungjawab</th><td><?= Html::encode($model->nama_cp) ?> <br> <i class="fa fa-phone"></i> <?= Html::encode($model->nomor_hp_cp) ?></td></tr>
                                    <tr><th>Sumber Data Utama</th><td><?= Html::encode($model->jenis_ppks_fix) ?></td></tr>
                                    <tr><th colspan="2">Keterangan Umum :<br> <small class="text-muted"><?= nl2br(Html::encode($model->keterangan)) ?: '<i>Tidak ada keterangan</i>' ?></small></th></tr>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- TAB 2 : INDIKATOR / CHECKLIST KATEGORI -->
                    <div class="tab-pane fade" id="indikator" role="tabpanel" aria-labelledby="indikator-tab">
                        <h5 class="mb-3 text-secondary"><i class="fa fa-check-square"></i> Matriks Kelompok Kerentanan Masalah Sosial</h5>
                        <p class="text-muted small mb-4">Elemen yang berwarna hijau menandakan bahwa kalayan bersangkutan memiliki keterikatan terhadap indikator tersebut (Berdasarkan *Database*).</p>
                        
                        <div class="row">
                            <?php foreach ($kategoriList as $field => $info): 
                                $label = $info[0];
                                $icon = $info[1];
                                $isActive = $model->$field ? true : false;
                                $boxClass = $isActive ? 'active' : 'inactive';
                            ?>
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="indicator-box <?= $boxClass ?>">
                                    <div class="icon-wrapper"><i class="fa fa-<?= $icon ?>"></i></div>
                                    <div class="indicator-text"><?= Html::encode($label) ?></div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- TAB 3 : RIWAYAT LAYANAN TIMELINE -->
                    <div class="tab-pane fade" id="layanan" role="tabpanel" aria-labelledby="layanan-tab">
                        <?php if (!$hasHistory): ?>
                            <div class="text-center p-5 text-muted bg-light rounded">
                                <i class="fa fa-folder-open fa-3x mb-3 text-black-50"></i><br>
                                <h5>Belum Ada Riwayat Layanan</h5>
                                <p>Kalayan ini belum tertaut riwayat pengambilan layanan atau penyaluran bantuan apapun di sistem.</p>
                            </div>
                        <?php else: ?>
                            <div class="mt-2">
                                <?php foreach ($layananTerlantar as $hist): ?>
                                    <div class="timeline-item-premium tl-danger">
                                        <div class="timeline-icon"></div>
                                        <div class="timeline-content">
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <h6 class="m-0 text-danger font-weight-bold"><i class="fa fa-medkit"></i> <?= $hist->layanan ? Html::encode($hist->layanan->nama_layanan) : 'Layanan Terhapus' ?></h6>
                                                <span class="badge badge-danger">Layanan Terlantar</span>
                                            </div>
                                            <div class="row text-sm">
                                                <div class="col-8">
                                                    <p class="mb-1 text-muted"><strong>Status Keluar:</strong> <?= $hist->status ? Html::encode($hist->status->nama_status) : '-' ?></p>
                                                    <p class="mb-0">" <?= nl2br(Html::encode($hist->keterangan)) ?> "</p>
                                                </div>
                                                <div class="col-4 text-right">
                                                    <div>Msk: <strong><?= $hist->tanggal_masuk ? date('d M Y', strtotime($hist->tanggal_masuk)) : '-' ?></strong></div>
                                                    <div>Klr: <strong class="text-dark"><?= date('d M Y', strtotime($hist->tanggal_layanan)) ?></strong></div>
                                                    <small class="text-muted d-block mt-2"><i class="fa fa-user"></i> Admin: <?= Html::encode($hist->dibuat_oleh) ?></small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>

                                <?php foreach ($layananNonTerlantar as $hist2): ?>
                                    <div class="timeline-item-premium tl-success">
                                        <div class="timeline-icon"></div>
                                        <div class="timeline-content">
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <h6 class="m-0 text-success font-weight-bold"><i class="fa fa-medkit"></i> <?= $hist2->layanan ? Html::encode($hist2->layanan->nama_layanan) : 'Layanan Terhapus' ?></h6>
                                                <span class="badge badge-success">Non-Terlantar</span>
                                            </div>
                                            <div class="row text-sm">
                                                <div class="col-8">
                                                    <p class="mb-0">" <?= nl2br(Html::encode($hist2->keterangan)) ?> "</p>
                                                </div>
                                                <div class="col-4 text-right">
                                                    <div>Msk: <strong><?= $hist2->tanggal_masuk ? date('d M Y', strtotime($hist2->tanggal_masuk)) : '-' ?></strong></div>
                                                    <div>Dilayani: <strong class="text-dark"><?= date('d M Y', strtotime($hist2->tanggal_layanan)) ?></strong></div>
                                                    <small class="text-muted d-block mt-2"><i class="fa fa-user"></i> Admin: <?= Html::encode($hist2->dibuat_oleh) ?></small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>

                </div>
            </div><!-- /.card-body -->
        </div><!-- /.card -->
    </div>
    <!-- END COL-MD-8 -->
</div>