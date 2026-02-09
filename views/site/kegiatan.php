<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;;
use app\models\KegiatanKategori;
use app\models\Kegiatan;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */

$this->title = 'INFO KEGIATAN';
$kategoriList = KegiatanKategori::find()
    ->where(['deleted_at' => null])
    ->orderBy(['nama' => SORT_ASC])
    ->all();

    $model= new Kegiatan();
?>
<style>
        @font-face {
  font-family: "weather";
  src: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/93/artill_clean_icons-webfont.eot");
  src: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/93/artill_clean_icons-webfont.eot?#iefix")
      format("embedded-opentype"),
    url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/93/artill_clean_icons-webfont.woff")
      format("woff"),
    url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/93/artill_clean_icons-webfont.ttf")
      format("truetype"),
    url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/93/artill_clean_icons-webfont.svg#artill_clean_weather_iconsRg")
      format("svg");
  font-weight: normal;
  font-style: normal;
}

i {
  color: #f5c774;
  font-family: weather;
  font-size: 1.6em;
  font-weight: normal;
  font-style: normal;
  text-transform: none;
}

.icon-0:before {
  content: ":";
}
.icon-1:before {
  content: "p";
}
.icon-2:before {
  content: "S";
}
.icon-3:before {
  content: "Q";
}
.icon-4:before {
  content: "S";
}
.icon-5:before {
  content: "W";
}
.icon-6:before {
  content: "W";
}
.icon-7:before {
  content: "W";
}
.icon-8:before {
  content: "W";
}
.icon-9:before {
  content: "I";
}
.icon-10:before {
  content: "W";
}
.icon-11:before {
  content: "I";
}
.icon-12:before {
  content: "I";
}
.icon-13:before {
  content: "I";
}
.icon-14:before {
  content: "I";
}
.icon-15:before {
  content: "W";
}
.icon-16:before {
  content: "I";
}
.icon-17:before {
  content: "W";
}
.icon-18:before {
  content: "U";
}
.icon-19:before {
  content: "Z";
}
.icon-20:before {
  content: "Z";
}
.icon-21:before {
  content: "Z";
}
.icon-22:before {
  content: "Z";
}
.icon-23:before {
  content: "Z";
}
.icon-24:before {
  content: "E";
}
.icon-25:before {
  content: "E";
}
.icon-26:before {
  content: "3";
}
.icon-27:before {
  content: "a";
}
.icon-28:before {
  content: "A";
}
.icon-29:before {
  content: "a";
}
.icon-30:before {
  content: "A";
}
.icon-31:before {
  content: "6";
}
.icon-32:before {
  content: "1";
}
.icon-33:before {
  content: "6";
}
.icon-34:before {
  content: "1";
}
.icon-35:before {
  content: "W";
}
.icon-36:before {
  content: "1";
}
.icon-37:before {
  content: "S";
}
.icon-38:before {
  content: "S";
}
.icon-39:before {
  content: "S";
}
.icon-40:before {
  content: "M";
}
.icon-41:before {
  content: "W";
}
.icon-42:before {
  content: "I";
}
.icon-43:before {
  content: "W";
}
.icon-44:before {
  content: "a";
}
.icon-45:before {
  content: "S";
}
.icon-46:before {
  content: "U";
}
.icon-47:before {
  content: "S";
}

.header {
  background: #b5170b;
  max-height: 17vh;
}

.row {
  margin: 0;
}

.cuaca {
  background: rgb(152, 19, 9);
  color: #fff;
  font-size: 7vh;
}

.waktu {
  background: #851108;
  color: #fff;
  font-size: 3vh;
}
.waktu #waktu {
  font-weight: bold;
}

.section {
  width: 100%;
  background: #fff;
}
.section .row-header {
  background: #f5c774;
  font-weight: bold;
  font-size: 1.5vw;
  margin: 0;
}
.section .main {
  width: 100%;
  overflow: hidden;
}
.section .main.sekarang {
  height: 39vh;
}
.section .main.besok {
  height: 20vh;
}
.section .main .row {
  font-weight: bold;
  font-size: 1.5vw;
  color: #000;
}
.section .main .row div {
  line-height: 3.5vh;
}
.title-besok {
  background: #da4648;
  font-weight: bold;
  color: #fff;
  font-size: 1.1rem;
}

@media  screen and (max-width: 600px) {
    .waktu #waktu {
        font-size: 5vh;
    }
}
    </style>
<div class="d-flex flex-column" id="activity-container">
        <div class="header">
            <div class="row">
                <div class="col-7 my-auto text-white">
                    <img src="https://sosialmenyapa.semarangkota.go.id/img/header-kegiatan.png" alt="DP3A Kota Semarang" class="img-fluid p-2">
                </div>
                <div class="col my-auto cuaca">
                    <div id="cuaca" class="text-center"></div>
                </div>
                <div class="col waktu">
                    <div class="d-flex flex-column">
                        <div id="hari">Senin, </div>
                        <div id="tanggal">19 Mei 2025</div>
                        <div id="waktu">13:55:34  <span class="wilayah">WIB</span></div>
                    </div>
                </div>
            </div>
        </div>
</div>
<?= Html::beginForm(['site/kegiatan'], 'get', ['class' => 'form-inline']) ?>

<div class="row my-5">
    <div class="col-md-4 col-12">
        <label for="search" class="col-form-label">Pencarian</label>
        <div class="input-group">
            <?= Html::textInput('search', $search, [
                'class' => 'form-control',
                'placeholder' => 'search...',
                'id' => 'search'
            ]) ?>
        </div>
    </div>

    <div class="col-md-4 col-12">
        <label for="kategori_id" class="col-form-label">Disposisi/Pelaksana</label>
        <div class="input-group">
            <?= Html::dropDownList(
                'kategori_id',
                $kategori_id,
                ArrayHelper::map($kategoriList, 'id', 'nama'),
                ['class' => 'form-control', 'prompt' => 'Semua', 'id' => 'kategori_id']
            ) ?>
        </div>
    </div>

    <div class="col-md-4 col-12">
        <label for="tanggal" class="col-form-label">Tanggal</label>
        <div class="input-group">
            <?= Html::input('date', 'tanggal', $tanggal, ['class' => 'form-control', 'id' => 'tanggal']) ?>
        </div>
    </div>

    <div class="col-12 mt-3 text-right">
        <?= Html::submitButton('Filter', ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Reset', ['site/kegiatan'], ['class' => 'btn btn-secondary']) ?>
    </div>
</div>

<?= Html::endForm() ?>

    <div class="section">
        
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center">NO</th>
                        <th class="">TEMPAT</th>
                        <th class="">KEGIATAN</th>
                        <th class="">PENYELENGGARA</th>
                        <th class="">DISPOSISI/PELAKSANA</th>
                        <th class=" text-center">TANGGAL</th>
                        <th class=" text-center">JAM</th>
                        <th class=" text-center">KETERANGAN</th>
                    </tr>
                </thead>
                <tbody>
                  <?php if (!empty($data)): ?>
                    <?php foreach ($data as $index => $item): ?>
                        <tr>
                            <td class="text-center"><?= $index + 1 ?></td>
                            <td><?= Html::encode($item->lokasi) ?></td>
                            <td><?= Html::encode($item->judul) ?></td>
                            <td><?= Html::encode($item->penyelenggara) ?></td>
                            <td><?= Html::encode(KegiatanKategori::findOne($item->kategori_id)->nama) ?></td>
                            <td class="text-center"><?= date('d-m-Y', strtotime($item->tanggal)) ?></td>
                            <td class="text-center"><?= date('H:i', strtotime($item->tanggal)) ?> WIB</td>
                            <td class="text-center"><?= Html::encode($item->keterangan) ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="8" class="text-center">Data tidak ditemukan</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="section">
    <div class="marquee p-2">
        <div>
                    Selamat Datang di Dinas Sosial Kota Semarang ●
                    Dinas Sosial HEBAT ●
                </div>
    </div>
    <style>
    .marquee {
        width: 100%;
        font-size: 1.5rem;
        background: #DA4648;
        color: white;
        white-space: nowrap;
        overflow: hidden;
        box-sizing: border-box;
    }
    .marquee div {
        display: inline-block;
        padding-left: 100%;
        animation: marquee 50s linear infinite;
    }
    @keyframes  marquee {
        0%   { transform: translate(0, 0); }
        100% { transform: translate(-100%, 0); }
    }
    </style>
</div>    
<script>
        var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];
        var date = new Date();
        var day = date.getDate();
        var month = date.getMonth();
        var thisDay = date.getDay(), thisDay = myDays[thisDay];
        var yy = date.getYear();
        var year = (yy < 1000) ? yy + 1900 : yy;
        document.getElementById('hari').innerHTML=thisDay + ", ";
        document.getElementById('tanggal').innerHTML=day + ' ' + months[month] + ' ' + year;
        function startTime() {
            var thisDay = date.getDay(), thisDay = myDays[thisDay];
            var yy = date.getYear();
            var year = (yy < 1000) ? yy + 1900 : yy;
            document.getElementById('hari').innerHTML=thisDay + ", ";
            document.getElementById('tanggal').innerHTML=day + ' ' + months[month] + ' ' + year;

            var today=new Date(), curr_hour=today.getHours(), curr_min=today.getMinutes(), curr_sec=today.getSeconds();
            curr_hour=checkTime(curr_hour);
            curr_min=checkTime(curr_min);
            curr_sec=checkTime(curr_sec);
            document.getElementById('waktu').innerHTML=curr_hour+":"+curr_min+":"+curr_sec+"  "+"<span class=\"wilayah\">WIB</span>";
        }
        function checkTime(i) {
            if (i<10) i="0" + i;
            return i;
        }
        setInterval(startTime, 500);
    </script>         
