<?php
use yii\helpers\Html;
use yii\helpers\Url;
use app\assets\AppAsset;

AppAsset::register($this);
$this->title = 'Dinas Sosial Kota Semarang';
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Dinas Sosial Kota Semarang - Permohonan bantuan sosial, registrasi PSM, dan informasi kegiatan sosial.">
    <meta name="keywords" content="Dinas Sosial, Kota Semarang, Santunan Kematian, Disabilitas, PSM, Bantuan Sosial">

    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link rel="manifest" href="<?= Url::to('@web/manifest.json') ?>">
    <link rel="icon" type="image/png" href="<?= Url::to('@web/logo-icon.png') ?>">
    <meta name="theme-color" content="#01579B">
    <?php
// $this->registerCssFile('https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css');
// $this->registerJsFile('https://code.jquery.com/jquery-3.6.0.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
// $this->registerJsFile('https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
    ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> -->
    <!-- <script src="https://kit.fontawesome.com/your-fontawesome-key.js" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <style>
        body { font-family: 'Poppins', sans-serif; }
        .navbar { transition: all 0.4s ease-in-out; background: transparent; }
        .navbar.scrolled { background: linear-gradient(to right, #01579B, rgba(0, 0, 0, 0.3)); box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); }
        .navbar a { color: white; font-weight: 600; transition: color 0.3s; }
        .navbar a:hover { color: #f8b400; }
        .slider { height: 100vh; position: relative; text-align: center; color: white; background: linear-gradient(to right, #01579B, rgba(0, 0, 0, 0.3)), url('<?= Url::to('@web/images/background-image.jpg') ?>') no-repeat center center; background-size: cover; }
        .dropdown-menu { background-color: rgba(1, 87, 155, 0.9); border: none; }
        .dropdown-item { color: white; }
        .dropdown-item:hover { background-color: rgba(255, 255, 255, 0.2); }
        .btn-blue {
            background: linear-gradient(135deg, #2196F3 0%, #3F51B5 100%);
            box-shadow: 3px 3px 51px 0 rgba(0, 0, 0, 0.2);
            color: #ffffff;
            padding: 15px 50px;
            border-radius: 50px;
            display: inline-block;
            text-decoration: none;
            transition: all 0.4s ease-in-out;
        }
    
           /* Efek Ripple Orange */
           .btn-blue::after {
            content: "";
            position: absolute;
            width: 300%;
            height: 300%;
            top: 50%;
            left: 50%;
            background: rgba(17, 0, 255, 0.5);
            transition: transform 0.6s, opacity 0.6s;
            border-radius: 50%;
            transform: translate(-50%, -50%) scale(0);
            opacity: 0;
        }
        
        .btn-blue:active::after {
            transform: translate(-50%, -50%) scale(1);
            opacity: 1;
        }

        .btn-orange {
            background: linear-gradient(135deg, #f3d421 0%, #ff7f24 100%);
            box-shadow: 3px 3px 51px 0 rgba(0, 0, 0, 0.2);
            color: #ffffff;
            padding: 15px 50px;
            border-radius: 50px;
            display: inline-block;
            text-decoration: none;
            transition: all 0.4s ease-in-out;
        }
           /* Efek Ripple Orange */
           .btn-orange::after {
            content: "";
            position: absolute;
            width: 300%;
            height: 300%;
            top: 50%;
            left: 50%;
            transition: transform 0.6s, opacity 0.6s;
            transform: translate(-50%, -50%) scale(0);
            opacity: 0;
        }
        .btn-orange:active::after {
            transform: translate(-50%, -50%) scale(1);
            opacity: 1;
        }
        
        .icon-box {
            text-align: center;
            padding: 20px;
            border-radius: 10px;
            transition: all 0.3s ease-in-out;
            background: rgba(255, 255, 255, 0.2);
            color: navy;
            margin: 15px;
        }
        .icon-box:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: scale(1.05);
        }
        .icon-box i {
            font-size: 50px;
            margin-bottom: 15px;
        }
        .cnavy{
            color:navy;
        }
        @media (max-width: 991px) { /* Ukuran navbar mobile */
            .navbar-nav {
                background: linear-gradient(to right, #01579B, rgba(0, 0, 0, 0.3));
                color: white !important; /* Pastikan teks tetap terlihat */
                /*padding: 10px 15px;
                border-radius: 5px;
                margin: 5px 0;*/
            }
        }

        
    </style>
</head>
<body>
<?php $this->beginBody() ?>
<!-- navbar-light bg-light shadow-sm  -->
<nav class="navbar navbar-expand-lg fixed-top navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="/">SIPEDULI</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="<?= Url::to(['/site/home']) ?>">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= Url::to(['/site/statistik']) ?>">Statistik</a></li>
                    <!-- <li class="nav-item"><a class="nav-link" href="#permohonan">Permohonan</a></li> -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-bs-toggle="dropdown">Permohonan</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#permohonan">Permohonan Santuan Kematian</a></li>
                            <li><a class="dropdown-item" href="<?= Url::to(['/site/permohonan-alat-bantu']) ?>">Permohonan Alat Bantu Disabilitas</a></li>
                            <li><a class="dropdown-item" href="<?= Url::to(['/site/registrasi-psm']) ?>">Registrasi PSM</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-bs-toggle="dropdown">Informasi</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?= Url::to(['/site/kegiatan']) ?>">Kegiatan</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="#kontak">Kontak</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= Url::to(['/auth/login']) ?>">Login</a></li>
                    <li class="nav-item" id="installContainer" style="display: none;">
                        <button class="nav-link btn btn-outline-light text-white ms-2" id="installBtn" style="border: 1px solid rgba(255,255,255,0.5); border-radius: 20px; padding: 5px 15px;">
                            <i class="fas fa-download"></i> Install App
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="slider d-flex align-items-center justify-content-center">
        <div id="particles-js" class="position-absolute w-100 h-100"></div>
        <div class="container text-white w-80">
            <div class="content" data-aos="fade-up">
                <h1 class="fw-bold">DINAS SOSIAL <br> MENYAPA KOTA SEMARANG</h1>
                <p class="mt-3">Dinas Sosial Kota Semarang sebagai salah satu Organisasi Perangkat Daerah (OPD) di lingkungan Pemerintah Kota Semarang mempunyai tugas melaksanakan urusan pemerintahan daerah di bidang sosial. Sepanjang lima tahun kebelakang Dinas Sosial bersama-sama mewujudkan Visi dan Misi Kota Semarang Tahun 2016-2020 untuk “Mewujudkan Kehidupan Masyarakat yang Berbudaya dan Berkualitas” dengan tujuan...</p>
                <a href="#" data-bs-target="#aboutModal" data-bs-toggle="modal" class="btn btn-blue">Baca selengkapnya...</a>
                <!-- <a href="<?php //Url::to(['/site/about']) ?>" class="btn btn-blue">Baca selengkapnya...</a> -->
            </div>
        </div>
    </section>
    <div id="all" style="background-image: url(<?= Url::to('@web/images/ball-wed.svg') ?>);">

    
    
        <div class="container" style="margin-top: -50px; position: relative; z-index: 10;">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="alert alert-light text-center shadow-lg" style="border-radius: 15px; border: 1px solid #01579B;">
                        <h4 class="text-primary"><i class="fab fa-android"></i> <strong>Pasang Aplikasi di Android</strong></h4>
                        <p class="mb-3">Untuk kemudahan akses dan pendaftaran PSM, silakan instal aplikasi ini di perangkat Android Anda.</p>
                        <button class="btn btn-success btn-lg rounded-pill px-5" onclick="window.installPWA();">
                            <i class="fas fa-download me-2"></i> Download / Install Aplikasi
                        </button>
                        <div class="mt-2">
                            <small class="text-muted"><i>*Jika tombol tidak berfungsi, gunakan menu browser "Install App" atau "Add to Home Screen".</i></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section id="permohonan" style="padding: 50px 0;" class="d-flex align-items-center justify-content-center">
            <div class="container">
                <div class="heading text-center cnavy">
                    <h2 class="fw-bold">Permohonan <span>Santunan</span></h2>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-4" >
                        <a href="https://sosialmenyapa.semarangkota.go.id/login?s=permohonan" class="btn btn-orange">
                        <div class="icon-box" >
                            <i class="fas fa-hand-holding-heart text-orange"></i>
                            <h3>SANKEM</h3>
                            <p>Permohonan Santunan Kematian Warga Miskin</p>
                        </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="<?= Url::to(['/site/permohonan-alat-bantu']) ?>" class="btn btn-blue">
                        <div class="icon-box">
                            <i class="fas fa-wheelchair"></i>
                            <h3>SABD</h3>
                            <p>Permohonan Santunan Alat Bantu Disabilitas</p>
                        </div>
                    </a>
                    </div>
                    <div class="col-md-4">
                        <a href="<?= Url::to(['/site/registrasi-psm']) ?>" class="btn btn-orange">
                        <div class="icon-box">
                            <i class="fas fa-users"></i>
                            <h3>REGISTRASI PSM</h3>
                            <p>Registrasi Pekerja Sosial Masyarakat</p>
                        </div>
                    </a>
                    </div>
                </div>
            </div>
        </section>
    <center><section id="kontak" style="padding: 50px 0;" class="d-flex align-items-center justify-content-center"  >
        <div class="container cnavy">
            <div class="heading text-center" >
                <h2 class="fw-bold">Kontak <span>Kami</span></h2>
            </div>
            <p class="text-center">
                Jalan Pemuda No. 148 Kota Semarang <br>
                Telepon : (024) 356-9040 / (024) 354-9547 / (024) 3568540 <br>
                Email : dinsossemarang@gmail.com
            </p>
            <ul class="list-inline text-center mb-5">
                <li class="list-inline-item mr-4"><i class="fab fa-instagram mr-1"></i> <a href="https://instagram.com/dinsoskotasmg"  target="_blank">DinsosKotaSmg</a></li>
                <li class="list-inline-item mr-4"><i class="fab fa-twitter mr-1"></i> <a href="https://twitter.com/dinsossmg"  target="_blank">DinsosSMG</a></li>
                <li class="list-inline-item mr-4"><i class="fab fa-facebook mr-1"></i> <a href="https://www.facebook.com/dinsos.kotasemarang/"  target="_blank">Facebook Dinas Sosial</a></li>
                <li class="list-inline-item mr-4"><i class="fab fa-globe mr-1"></i> <a href="http://dinsos.semarangkota.go.id"  target="_blank">Website Dinas Sosial</a></li>
            </ul>
            <div class="text-center peta">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15840.888105977858!2d110.4136477!3d-6.9831049!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xd2c598fac5c1fd74!2sDinas%20Sosial%20Kota%20Semarang!5e0!3m2!1sid!2sid!4v1632899962090!5m2!1sid!2sid" height="500" style="width:100%;border:5px solid #fff;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </section>
</center>

<div class="modal fade" id="aboutModal" tabindex="-1" role="dialog" aria-labelledby="aboutModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="aboutModalLabel">Tentang SIPEDULI</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Tambahkan konten yang lebih panjang di sini -->
        <p>Dinas Sosial Kota Semarang sebagai salah satu Organisasi Perangkat Daerah (OPD) di lingkungan Pemerintah Kota Semarang mempunyai tugas melaksanakan urusan pemerintahan daerah di bidang sosial.</p>

<p>Sepanjang lima tahun kebelakang Dinas Sosial bersama-sama mewujudkan Visi dan Misi Kota Semarang Tahun 2016-2020 untuk “Mewujudkan Kehidupan Masyarakat yang Berbudaya dan Berkualitas” dengan tujuan “Meningkatnya Kesejahteraan Masyarakat”. Kebijakan pada Urusan Sosial diarahkan untuk mewujudkan kesejahteraan sosial masyarakat terutama bagi Penyandang Masalah Kesejahteraan Sosial (PMKS) melalui peningkatan kualitas pelayanan dan bantuan dasar kesejahteraan sosial bagi Penyandang Masalah Kesejahteraan Sosial (PMKS).</p>

<p>Untuk mewujudkan Visi dan Misi tersebut, Dinas Sosial “Bergerak Bersama Membangun Semarang” melalui pemberdayaan Kualitas Potensi Sumber Kesejahteraan Sosial (PSKS), peningkatan bantuan sosial, peningkatan prakarsa dan peran aktif masyarakat termasuk masyarakat mampu, dunia usaha, perguruan tinggi, organisasi sosial dan lain-lain.</p>

<p>Capaian indikator kinerja Penyandang Masalah Kesejahteraan Sosial (PMKS) yang memperoleh bantuan sosial mengalami peningkatan sebanyak 513.287 orang dari target 16.000 orang, atau meningkat jika dibandingkan tahun 2019 sebanyak 158.257 orang. Hal ini dikarenakan adanya Pandemi Covid-19 sehingga memicu meningkatnya jumlah PMKS pada Tahun 2020.</p>

<p>Untuk indikator kinerja Cakupan Potensi dan Sumber Kesejahteraan Sosial (PSKS) sebesar 66,67% belum bisa mencapai target yang ditetapkan sebesar 91,60%, atau sama dengan capaian tahun 2019 sebesar 66,67%. Hal ini dikarenakan belum ada tambahan terbentuknya PSKS di Kota Semarang.</p>

<p>Adanya permasalahan pencapaian indikator kinerja Cakupan Potensi dan Sumber Kesejahteraan Sosial (PSKS) dan isu strategis Pandemi Covid-19, menjadikan evaluasi dan bahan masukan demi kinerja selanjutnya.</p>

<p>Selanjutnya kami sampaikan bahwa Dinas Sosial Pemerintah Kota Semarang saat ini telah menyiapkan strategi hingga empat tahun kedepan guna mendukung pencapaian Visi dan Misi Kota Semarang Tahun 2021-2026.</p>

      </div>
    </div>
  </div>
</div>


    <footer class="footer text-center text-white">
        <div class="container">
            <p>Copyright &copy; Dinas Sosial Kota Semarang. All Rights Reserved.</p>
        </div>
    </footer>
    <script>
        $(document).ready(function () {
            $(window).scroll(function () {
                if ($(this).scrollTop() > 50) { $('.navbar').addClass('scrolled'); } 
                else { $('.navbar').removeClass('scrolled'); }
            });
        });
        AOS.init();

        particlesJS("particles-js", {
            "particles": {
                "number": {
                    "value": 150, // Tambah jumlah partikel untuk lebih rapat
                    "density": {
                        "enable": true,
                        "value_area": 600 // Kurangi area agar partikel lebih berdekatan
                    }
                },
                "color": {
                    "value": ["#ff0000", "#00ff00", "#0000ff"]
                },
                "size": {
                    "value": 3, // Kurangi ukuran agar lebih halus
                    "random": true
                },
                "move": {
                    "enable": true,
                    "speed": 1.5, // Kurangi kecepatan agar lebih smooth
                    "direction": "none",
                    "random": true
                }
            },
            "interactivity": {
                "events": {
                    "onhover": {
                        "enable": true,
                        "mode": "repulse"
                    },
                    "onclick": {
                        "enable": true,
                        "mode": "push"
                    }
                },
                "modes": {
                    "repulse": {
                        "distance": 30, // Kurangi jarak repulse agar efeknya tidak terlalu jauh
                        "duration": 0.2
                    },
                    "push": {
                        "particles_nb": 3 // Kurangi jumlah partikel saat diklik agar tidak terlalu ramai
                    }
                }
            },
            "retina_detect": true
        });
        
        
        // Global Install Function
        window.installPWA = function() {
            if (deferredPrompt) {
                // Show the install prompt
                deferredPrompt.prompt();
                // Wait for the user to respond to the prompt
                deferredPrompt.userChoice.then((choiceResult) => {
                    if (choiceResult.outcome === 'accepted') {
                        console.log('User accepted the A2HS prompt');
                    } else {
                        console.log('User dismissed the A2HS prompt');
                    }
                    deferredPrompt = null;
                });
            } else {
                // Check if already installed
                if (window.matchMedia('(display-mode: standalone)').matches || window.navigator.standalone === true) {
                    alert('Aplikasi ini sudah terinstall dan sedang berjalan dalam mode aplikasi.');
                    return;
                }

                // Check protocol
                if (window.location.protocol !== 'https:' && window.location.hostname !== 'localhost' && window.location.hostname !== '127.0.0.1') {
                    alert('Peringatan: Instalasi otomatis mungkin tidak berjalan karena website tidak diakses melalui HTTPS.\n\nSilakan coba akses melalui HTTPS atau localhost.');
                    return;
                }

                // Fallback instructions
                alert("Browser belum menampilkan prompt instalasi otomatis.\n\nKemungkinan penyebab:\n1. Aplikasi sudah terinstall.\n2. Service Worker baru saja diperbarui (coba refresh halaman).\n3. Browser tidak mendukung PWA (Gunakan Chrome/Edge).\n\nCara Manual: Cari menu 'Install App' atau 'Tambahkan ke Layar Utama' di pengaturan browser Anda.");
            }
        };

        if ('serviceWorker' in navigator) {
            window.addEventListener('load', function() {
                navigator.serviceWorker.register('<?= Url::to('@web/sw.js') ?>')
                .then(function(registration) {
                    console.log('ServiceWorker registration successful with scope: ', registration.scope);
                }, function(err) {
                    console.log('ServiceWorker registration failed: ', err);
                });
            });
        }

        let deferredPrompt;
        const installContainer = document.getElementById('installContainer');
        const installBtn = document.getElementById('installBtn');

        window.addEventListener('beforeinstallprompt', (e) => {
            // Prevent the mini-infobar from appearing on mobile
            e.preventDefault();
            // Stash the event so it can be triggered later.
            deferredPrompt = e;
            // Update UI notify the user they can install the PWA
            if (installContainer) installContainer.style.display = 'block';
            console.log('beforeinstallprompt fired');
        });

        if (installBtn) {
            installBtn.addEventListener('click', (e) => {
                window.installPWA();
            });
        }

        window.addEventListener('appinstalled', (evt) => {
            console.log('INSTALL: Success');
            alert('Aplikasi berhasil diinstall!');
        });
    </script>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
