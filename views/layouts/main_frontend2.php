<?php
use yii\helpers\Html;
use yii\helpers\Url;
use app\assets\AppAsset;
use app\assets\AppAsset2;
AppAsset2::register($this);

AppAsset::register($this);
$this->title = 'Dinas Sosial Kota Semarang';
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- <script src="https://kit.fontawesome.com/your-fontawesome-key.js" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <style>
        body { font-family: 'Poppins', sans-serif; }
        .navbar { transition: all 0.4s ease-in-out; background: #01579B; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); }
        .navbar.scrolled { background: linear-gradient(to right, #01579B, rgba(0, 0, 0, 0.3)); box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); }
        .navbar a { color: white; font-weight: 600; transition: color 0.3s; }
        .navbar a:hover { color: #f8b400; }
        .slider { height: 100vh;position: relative; text-align: center; color: white; background: linear-gradient(to right, #01579B, rgba(0, 0, 0, 0.3)) , url('<?= Url::to('@web/images/background-image.jpg') ?>') no-repeat center center; background-size: cover; }
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
        @media (max-width: 991px) { /* Ukuran navbar mobile */
            .navbar-nav {
                background: linear-gradient(to right, #01579B, rgba(0, 0, 0, 0.3));
                color: white !important; /* Pastikan teks tetap terlihat */
                /*padding: 10px 15px;
                border-radius: 5px;
                margin: 5px 0;*/
            }
        }
        .title {
            text-align: center;
            margin-bottom: 30px;
            font-weight: bold;
        }
        .card {
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .card-title {
            font-weight: bold;
        }
        .container-form { max-width: 600px; margin: 60px auto; background: white; padding: 30px; border-radius: 12px; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); }
        .btn-submit { background: linear-gradient(135deg, #2196F3, #3F51B5); color: white; border: none; padding: 12px; border-radius: 6px; }
        .btn-submit:hover { background: linear-gradient(135deg, #1976D2, #303F9F); }
        #particles-js {
            position: fixed;
            width: 100%;
            height: 100vh;
            top: 0;
            left: 0;
            z-index: -1; /* Menaruh partikel di belakang elemen lainnya */
        }
        .cnavy{
            color:navy;
        }
        /* .container-form {
            position: relative;
            z-index: 10; /* Pastikan form berada di atas partikel */
         /*    background: rgba(255, 255, 255, 0.9); /* Tambahkan transparansi untuk lebih jelas */
         /*    padding: 30px;
            border-radius: 12px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        } */
    </style>
</head>
<body>
<?php $this->beginBody() ?>
<nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="/">SOSIAL MENYAPA</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="<?= Url::to(['/site/home']) ?>">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= Url::to(['/site/statistik']) ?>">Statistik</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-bs-toggle="dropdown">Permohonan</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#permohonan">Permohonan Santuan Kematian</a></li>
                            <li><a class="dropdown-item" href="#permohonan">Permohonan Alat Bantu Disabilitas</a></li>
                            <li><a class="dropdown-item" href="<?= Url::to(['/site/registrasi-psm']) ?>">Registrasi PSM</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-bs-toggle="dropdown">Informasi</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?= Url::to(['/site/kegiatan']) ?>">Kegiatan</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="<?= Url::to(['/site/home', '#' => 'kontak']) ?>">Kontak</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= Url::to(['/auth/login']) ?>">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div id="particles-js" class="position-absolute w-100 h-100"></div>
    <?= $this->render('content2', ['content' => $content]) ?>
    <br/>
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
        
    </script>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
