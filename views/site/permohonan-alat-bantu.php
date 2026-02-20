<?php
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Alur Permohonan Alat Bantu Disabilitas';
?>

<div class="container py-5">
    <!-- Header Section -->
    <div class="text-center mb-5" data-aos="fade-down">
        <h2 class="fw-bold" style="color: #f8b400;">Prosedur Pengajuan Alat Bantu Disabilitas</h2>
        <p class="lead text-muted mx-auto" style="color:#ffffff;max-width: 800px;">
            Layanan ini diperuntukkan bagi warga Kota Semarang penyandang disabilitas yang membutuhkan alat bantu. 
            <br><strong>Catatan Penting:</strong> Pengajuan permohonan <u>wajib</u> dilakukan melalui petugas <strong>Pekerja Sosial Masyarakat (PSM)</strong> yang terdaftar di wilayah kelurahan masing-masing.
        </p>
        <div style="width: 80px; height: 4px; background: #f8b400; margin: 20px auto; border-radius: 2px;"></div>
    </div>
    <!-- Timeline Section -->
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="timeline-container ps-lg-5">
                
                <!-- Vertical Line -->
                <div class="timeline-line d-none d-lg-block"></div>

                <!-- Step 1 -->
                <div class="timeline-item mb-5" data-aos="fade-up" data-aos-delay="100">
                    <div class="timeline-number shadow-lg">1</div>
                    <div class="card border-0 shadow-sm timeline-card h-100">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-3">
                                <div class="icon-circle bg-light-blue me-3">
                                    <i class="fas fa-user-plus text-primary"></i>
                                </div>
                                <h4 class="fw-bold mb-0 text-dark">Registrasi PSM</h4>
                            </div>
                            <p class="text-muted mb-4">
                                Langkah pertama adalah memastikan Anda terdaftar sebagai <strong>Pekerja Sosial Masyarakat (PSM)</strong>. Jika belum, silakan lakukan registrasi dengan mengisi data diri lengkap sesuai KTP.
                            </p>
                            <a href="<?= Url::to(['/site/registrasi-psm']) ?>" class="btn btn-primary rounded-pill px-4 shadow-sm">
                                <i class="fas fa-arrow-right me-2"></i> Daftar Sekarang
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Step 2 -->
                <div class="timeline-item mb-5" data-aos="fade-up" data-aos-delay="200">
                    <div class="timeline-number shadow-lg">2</div>
                    <div class="card border-0 shadow-sm timeline-card h-100">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-3">
                                <div class="icon-circle bg-light-warning me-3">
                                    <i class="fas fa-clipboard-check text-warning"></i>
                                </div>
                                <h4 class="fw-bold mb-0 text-dark">Verifikasi Dinas Sosial</h4>
                            </div>
                            <p class="text-muted">
                                Data pendaftaran Anda akan diverifikasi oleh petugas Dinas Sosial Kota Semarang. Proses ini memastikan validitas data sebelum Anda diberikan akses ke sistem. Mohon menunggu 1x24 jam (hari kerja).
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Step 3 -->
                <div class="timeline-item mb-5" data-aos="fade-up" data-aos-delay="300">
                    <div class="timeline-number shadow-lg">3</div>
                    <div class="card border-0 shadow-sm timeline-card h-100">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-3">
                                <div class="icon-circle bg-light-success me-3">
                                    <i class="fas fa-envelope-open-text text-success"></i>
                                </div>
                                <h4 class="fw-bold mb-0 text-dark">Terima Akses Login</h4>
                            </div>
                            <p class="text-muted">
                                Setelah verifikasi disetujui, sistem akan mengirimkan <strong>Username</strong> dan <strong>Password</strong> ke alamat email yang Anda daftarkan. 
                            </p>
                            <div class="alert alert-info border-0 bg-light-info text-info small">
                                <i class="fas fa-info-circle me-1"></i> Periksa folder <strong>Inbox</strong> atau <strong>Spam</strong> pada email Anda.
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Step 4 -->
                <div class="timeline-item mb-5" data-aos="fade-up" data-aos-delay="400">
                    <div class="timeline-number shadow-lg">4</div>
                    <div class="card border-0 shadow-sm timeline-card h-100">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-3">
                                <div class="icon-circle bg-light-primary me-3">
                                    <i class="fas fa-sign-in-alt text-primary"></i>
                                </div>
                                <h4 class="fw-bold mb-0 text-dark">Login Aplikasi</h4>
                            </div>
                            <p class="text-muted mb-4">
                                Gunakan kredensial (Username & Password) yang telah diterima untuk masuk ke dalam dasbor sistem SIPEDULI.
                            </p>
                            <a href="<?= Url::to(['/auth/login']) ?>" class="btn btn-outline-primary rounded-pill px-4">
                                <i class="fas fa-lock me-2"></i> Login Disini
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Step 5 -->
                <div class="timeline-item mb-5" data-aos="fade-up" data-aos-delay="500">
                    <div class="timeline-number shadow-lg">5</div>
                    <div class="card border-0 shadow-sm timeline-card h-100 bg-gradient-primary-soft">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-3">
                                <div class="icon-circle bg-white me-3 shadow-sm">
                                    <i class="fas fa-wheelchair text-primary"></i>
                                </div>
                                <h4 class="fw-bold mb-0 text-primary">Input Permohonan</h4>
                            </div>
                            <p class="text-dark">
                                Selamat! Anda sekarang dapat mengajukan permohonan. Pilih menu <strong>"Permohonan Alat Bantu Disabilitas"</strong> pada dashboard Anda dan isi formulir pengajuan sesuai kebutuhan warga.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Footer Action -->
    <div class="text-center mt-4 mb-5">
        <a href="<?= Url::to(['/site/index']) ?>" class="btn btn-link text-muted text-decoration-none">
            <i class="fas fa-arrow-left me-1"></i> Kembali ke Halaman Utama
        </a>
    </div>
</div>

<style>
    /* Styling Variables */
    :root {
        --primary-color: #01579B;
        --secondary-color: #f8b400;
    }

    .timeline-container {
        position: relative;
    }

    /* Vertical connector line */
    .timeline-line {
        position: absolute;
        left: 30px; /* Aligned with number center */
        top: 0;
        bottom: 0;
        width: 3px;
        background: #e0e0e0;
        z-index: 0;
    }

    .timeline-item {
        position: relative;
        padding-left: 80px; /* Space for number */
        z-index: 1;
    }

    .timeline-number {
        position: absolute;
        left: 0;
        top: 0;
        width: 60px;
        height: 60px;
        background: var(--primary-color);
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        font-weight: bold;
        border: 4px solid #fff; /* White ring effect */
    }

    .timeline-card {
        border-radius: 15px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        background: #fff;
    }

    .timeline-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.08) !important;
    }

    .icon-circle {
        width: 50px;
        height: 50px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.25rem;
    }

    /* Background Utility Classes */
    .bg-light-blue { background-color: #e3f2fd; }
    .bg-light-warning { background-color: #fff8e1; }
    .bg-light-success { background-color: #e8f5e9; }
    .bg-light-primary { background-color: #e1f5fe; }
    .bg-light-info { background-color: #e0f7fa; }
    
    .bg-gradient-primary-soft {
        background: linear-gradient(135deg, #e3f2fd 0%, #ffffff 100%);
        border: 1px solid #bbdefb;
    }

    /* Mobile Responsiveness */
    @media (max-width: 991.98px) {
        .timeline-line { display: none; }
        .timeline-item { padding-left: 0; }
        .timeline-number {
            position: relative;
            margin-bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
        }
        .timeline-card { text-align: center; }
        .d-flex.align-items-center {
            justify-content: center;
        }
        .me-3 {
            margin-right: 0.5rem !important;
            margin-bottom: 0.5rem;
        }
        /* Stack icon above title on mobile */
        .card-body .d-flex {
            flex-direction: column;
        }
    }
</style>
