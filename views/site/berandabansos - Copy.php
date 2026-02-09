<?php
use yii\helpers\Url;
use app\models\Actions;
use app\models\ActionsService;
use app\models\Bdtrt;
use app\models\Bdtart;
use app\models\Dokumen;
use miloschuman\highcharts\Highcharts;
use dosamigos\google\maps\LatLng;
use dosamigos\google\maps\services\DirectionsWayPoint;
use dosamigos\google\maps\services\TravelMode;
use dosamigos\google\maps\overlays\PolylineOptions;
use dosamigos\google\maps\services\DirectionsRenderer;
use dosamigos\google\maps\services\DirectionsService;
use dosamigos\google\maps\overlays\InfoWindow;
use dosamigos\google\maps\overlays\Marker;
use dosamigos\google\maps\Map;
use dosamigos\google\maps\Size;
use dosamigos\google\maps\services\DirectionsRequest;
use dosamigos\google\maps\overlays\Polygon;
use dosamigos\google\maps\layers\BicyclingLayer;
use yii\helpers\Html;

$session=Yii::$app->session;
$coord = new LatLng(['lat' => -7.003257, 'lng' => 110.4258603]);
$map = new Map([
  'center' => $coord,
  'zoom' => 10,
  'height' => 390,
  'width' => 500,
]);
// lets use the directions renderer
$mijen = new LatLng(['lat' => -7.076678, 'lng' => 110.309095]);
$gunungpati = new LatLng(['lat' => -7.103430, 'lng' => 110.386552]);
$banyumanik = new LatLng(['lat' => -7.053227, 'lng' => 110.428403]);
$gajahmungkur = new LatLng(['lat' => -7.004327, 'lng' => 110.408886]);
$semarangselatan = new LatLng(['lat' => -7.002000, 'lng' => 110.437386]);
$candisari = new LatLng(['lat' => -7.026746, 'lng' => 110.427962]);
$tembalang = new LatLng(['lat' => -7.059699, 'lng' => 110.447521]);
$pedurungan = new LatLng(['lat' => -7.009221, 'lng' => 110.464801]);
$genuk = new LatLng(['lat' => -6.965243, 'lng' => 110.477162]);
$gayamsari = new LatLng(['lat' => -6.999241, 'lng' => 110.449370]);
$semarangtimur = new LatLng(['lat' => -6.986794, 'lng' => 110.439633]);
$semarangutara = new LatLng(['lat' => -6.965289, 'lng' => 110.407141]);
$semarangtengah = new LatLng(['lat' => -6.983770, 'lng' => 110.419771]);
$semarangbarat = new LatLng(['lat' => -6.982275, 'lng' => 110.389272]);
$tugu = new LatLng(['lat' => -6.985226, 'lng' => 110.345299]);
$ngaliyan = new LatLng(['lat' => -6.996885, 'lng' => 110.347444]);

// Lets add a marker now
$marker1 = new Marker([
    'position' => $mijen,
    'title' => 'Kecamatan Mijen',
]);

$marker2 = new Marker([
    'position' => $gunungpati,
    'title' => 'Kecamatan Gunung Pati',
]);
$marker3 = new Marker([
    'position' => $banyumanik,
    'title' => 'Kecamatan Banyumanik',
]);

$marker4 = new Marker([
    'position' => $gajahmungkur,
    'title' => 'Kecamatan Gajah Mungkur',
]);

$marker5 = new Marker([
    'position' => $semarangselatan,
    'title' => 'Kecamatan Semarang Selatan',
]);

$marker6 = new Marker([
    'position' => $candisari,
    'title' => 'Kecamatan Candisari',
]);

$marker7 = new Marker([
    'position' => $tembalang,
    'title' => 'Kecamatan Tembalang',
]);

$marker8 = new Marker([
    'position' => $pedurungan,
    'title' => 'Kecamatan Pedurungan',
]);

$marker9 = new Marker([
    'position' => $genuk,
    'title' => 'Kecamatan Genuk',
]);

$marker10 = new Marker([
    'position' => $gayamsari,
    'title' => 'Kecamatan Gayamsari',
]);

$marker11 = new Marker([
    'position' => $semarangtimur,
    'title' => 'Kecamatan Semarang Timur',
]);

$marker12 = new Marker([
    'position' => $semarangutara,
    'title' => 'Kecamatan Semarang Utara',
]);

$marker13 = new Marker([
    'position' => $semarangtengah,
    'title' => 'Kecamatan Semarang Tengah',
]);

$marker14 = new Marker([
    'position' => $semarangbarat,
    'title' => 'Kecamatan Semarang Barat',
]);

$marker15 = new Marker([
    'position' => $tugu,
    'title' => 'Kecamatan Tugu',
]);

$marker16 = new Marker([
    'position' => $ngaliyan,
    'title' => 'Kecamatan Ngaliyan',
]);


// Provide a shared InfoWindow to the marker
$rekap =Actions::listdatarekap();
// $rekap =ActionsService::statistikJiwa();
// dd($rekap);
$marker1->attachInfoWindow(
    new InfoWindow([
        'content' => '
          <strong>Kecamatan Mijen</strong></br>
          Data Jiwa : '.Yii::$app->formatter->asInteger($rekap[0]['jiwa']).'</br>
          Data RT : '.Yii::$app->formatter->asInteger($rekap[0]['rt']).'</br>
          Data Keluarga : '.Yii::$app->formatter->asInteger($rekap[0]['keluarga']).'</br>
          '
    ])
);
$marker2->attachInfoWindow(
    new InfoWindow([
        'content' => '
          <strong>Kecamatan Gunung Pati</strong></br>
          Data Jiwa : '.Yii::$app->formatter->asInteger($rekap[1]['jiwa']).'</br>
          Data RT : '.Yii::$app->formatter->asInteger($rekap[1]['rt']).'</br>
          Data Keluarga : '.Yii::$app->formatter->asInteger($rekap[1]['keluarga']).'</br>
          '
    ])
);
$marker3->attachInfoWindow(
    new InfoWindow([
        'content' => '
          <strong>Kecamatan Banyumanik</strong></br>
          Data Jiwa : '.Yii::$app->formatter->asInteger($rekap[2]['jiwa']).'</br>
          Data RT : '.Yii::$app->formatter->asInteger($rekap[2]['rt']).'</br>
          Data Keluarga : '.Yii::$app->formatter->asInteger($rekap[2]['keluarga']).'</br>
          '
    ])
);
$marker4->attachInfoWindow(
    new InfoWindow([
        'content' => '
          <strong>Kecamatan Gajah Mungkur</strong></br>
          Data Jiwa : '.Yii::$app->formatter->asInteger($rekap[3]['jiwa']).'</br>
          Data RT : '.Yii::$app->formatter->asInteger($rekap[3]['rt']).'</br>
          Data Keluarga : '.Yii::$app->formatter->asInteger($rekap[3]['keluarga']).'</br>
          '
    ])
);
$marker5->attachInfoWindow(
    new InfoWindow([
        'content' => '
          <strong>Kecamatan Semarang Selatan</strong></br>
          Data Jiwa : '.Yii::$app->formatter->asInteger($rekap[4]['jiwa']).'</br>
          Data RT : '.Yii::$app->formatter->asInteger($rekap[4]['rt']).'</br>
          Data Keluarga : '.Yii::$app->formatter->asInteger($rekap[4]['keluarga']).'</br>
          '
    ])
);
$marker6->attachInfoWindow(
    new InfoWindow([
        'content' => '
          <strong>Kecamatan Candisari</strong></br>
          Data Jiwa : '.Yii::$app->formatter->asInteger($rekap[5]['jiwa']).'</br>
          Data RT : '.Yii::$app->formatter->asInteger($rekap[5]['rt']).'</br>
          Data Keluarga : '.Yii::$app->formatter->asInteger($rekap[5]['keluarga']).'</br>
          '
    ])
);
$marker7->attachInfoWindow(
    new InfoWindow([
        'content' => '
          <strong>Kecamatan Tembalang</strong></br>
          Data Jiwa : '.Yii::$app->formatter->asInteger($rekap[6]['jiwa']).'</br>
          Data RT : '.Yii::$app->formatter->asInteger($rekap[6]['rt']).'</br>
          Data Keluarga : '.Yii::$app->formatter->asInteger($rekap[6]['keluarga']).'</br>
          '
    ])
);
$marker8->attachInfoWindow(
    new InfoWindow([
        'content' => '
          <strong>Kecamatan Pedurungan</strong></br>
          Data Jiwa : '.Yii::$app->formatter->asInteger($rekap[7]['jiwa']).'</br>
          Data RT : '.Yii::$app->formatter->asInteger($rekap[7]['rt']).'</br>
          Data Keluarga : '.Yii::$app->formatter->asInteger($rekap[7]['keluarga']).'</br>
          '
    ])
);
$marker9->attachInfoWindow(
    new InfoWindow([
        'content' => '
          <strong>Kecamatan Genuk</strong></br>
          Data Jiwa : '.Yii::$app->formatter->asInteger($rekap[8]['jiwa']).'</br>
          Data RT : '.Yii::$app->formatter->asInteger($rekap[8]['rt']).'</br>
          Data Keluarga : '.Yii::$app->formatter->asInteger($rekap[8]['keluarga']).'</br>
          '
    ])
);

$marker10->attachInfoWindow(
    new InfoWindow([
        'content' => '
          <strong>Kecamatan Gayamsari</strong></br>
          Data Jiwa : '.Yii::$app->formatter->asInteger($rekap[9]['jiwa']).'</br>
          Data RT : '.Yii::$app->formatter->asInteger($rekap[9]['rt']).'</br>
          Data Keluarga : '.Yii::$app->formatter->asInteger($rekap[9]['keluarga']).'</br>
          '
    ])
);

$marker11->attachInfoWindow(
    new InfoWindow([
        'content' => '
          <strong>Kecamatan Semarang Timur</strong></br>
          Data Jiwa : '.Yii::$app->formatter->asInteger($rekap[10]['jiwa']).'</br>
          Data RT : '.Yii::$app->formatter->asInteger($rekap[10]['rt']).'</br>
          Data Keluarga : '.Yii::$app->formatter->asInteger($rekap[10]['keluarga']).'</br>
          '
    ])
);

$marker12->attachInfoWindow(
    new InfoWindow([
        'content' => '
          <strong>Kecamatan Semarang Utara</strong></br>
          Data Jiwa : '.Yii::$app->formatter->asInteger($rekap[11]['jiwa']).'</br>
          Data RT : '.Yii::$app->formatter->asInteger($rekap[11]['rt']).'</br>
          Data Keluarga : '.Yii::$app->formatter->asInteger($rekap[11]['keluarga']).'</br>
          '
    ])
);

$marker13->attachInfoWindow(
    new InfoWindow([
        'content' => '
          <strong>Kecamatan Semarang Tengah</strong></br>
          Data Jiwa : '.Yii::$app->formatter->asInteger($rekap[12]['jiwa']).'</br>
          Data RT : '.Yii::$app->formatter->asInteger($rekap[12]['rt']).'</br>
          Data Keluarga : '.Yii::$app->formatter->asInteger($rekap[12]['keluarga']).'</br>
          '
    ])
);

$marker14->attachInfoWindow(
    new InfoWindow([
        'content' => '
          <strong>Kecamatan Semarang Barat</strong></br>
          Data Jiwa : '.Yii::$app->formatter->asInteger($rekap[13]['jiwa']).'</br>
          Data RT : '.Yii::$app->formatter->asInteger($rekap[13]['rt']).'</br>
          Data Keluarga : '.Yii::$app->formatter->asInteger($rekap[13]['keluarga']).'</br>
          '
    ])
);

$marker15->attachInfoWindow(
    new InfoWindow([
        'content' => '
          <strong>Kecamatan Tugu</strong></br>
          Data Jiwa : '.Yii::$app->formatter->asInteger($rekap[14]['jiwa']).'</br>
          Data RT : '.Yii::$app->formatter->asInteger($rekap[14]['rt']).'</br>
          Data Keluarga : '.Yii::$app->formatter->asInteger($rekap[14]['keluarga']).'</br>
          '
    ])
);

$marker16->attachInfoWindow(
    new InfoWindow([
        'content' => '
          <strong>Kecamatan Ngaliyan</strong></br>
          Data Jiwa : '.Yii::$app->formatter->asInteger($rekap[15]['jiwa']).'</br>
          Data RT : '.Yii::$app->formatter->asInteger($rekap[15]['rt']).'</br>
          Data Keluarga : '.Yii::$app->formatter->asInteger($rekap[15]['keluarga']).'</br>
          '
    ])
);
$map->addOverlay($marker1);
$map->addOverlay($marker2);
$map->addOverlay($marker3);
$map->addOverlay($marker4);
$map->addOverlay($marker5);
$map->addOverlay($marker6);
$map->addOverlay($marker7);
$map->addOverlay($marker8);
$map->addOverlay($marker9);
$map->addOverlay($marker10);
$map->addOverlay($marker11);
$map->addOverlay($marker12);
$map->addOverlay($marker13);
$map->addOverlay($marker14);
$map->addOverlay($marker15);
$map->addOverlay($marker16);

$dashboard=Actions::listrekapdashboard();
$this->title = 'BERANDA BANSOS';
?>
<?php
$surat= Dokumen::find()->where(['username'=>@Yii::$app->user->identity->username])->andWhere(['status'=>'proses'])->andWhere(['kategori_dokumen'=>'Surat Permohonan Data'])->one();
$ba= Dokumen::find()->where(['username'=>@Yii::$app->user->identity->username])->andWhere(['status'=>'proses'])->andWhere(['kategori_dokumen'=>'Berita Acara Serah Terima'])->one();
if (null!==$ba) {
?>
<style type="text/css">
.box {
    border-radius: 2px;
    position: relative;
    display: block;
    margin-bottom: 20px;
    box-shadow: 0 1px 1px rgb(0 0 0 / 10%);
    background-color:#ff851b; 
}
</style>
<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-warning"></i> Info!</h4>
                Permohonan Bast sedang diperiksa. Mohon Tunggu!
              </div>
  <?php

}
  ?>
  <?php if (null!==$surat): ?>
    <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-warning"></i> Info!</h4>
                Permohonan Data sedang diperiksa. Mohon Tunggu!
              </div>
  <?php endif ?>

      <div class="row">
         <div class="col-lg-3 col-xs-6">
            <div id="bansos" class="small-box bg-green animate__animated animate__fadeInLeft" style="border-radius: 25px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  text-align: center;cursor: pointer;">
              <div class="inner">
                <center><h4 style="color:white;font-size:40px;">BANSOS</h4></center>
              </div>
              <div class="icon">
                <i class="fa fa-cubes"></i>
              </div>
              <a href="<?=Url::to(['setting/menu','menu'=>'bansos'])?>" class="small-box-footer" style="border-bottom-right-radius: 25px;border-bottom-left-radius: 25px;">
                <i class="fa fa-arrow-circle-left"></i> Bantuan Sosial 
              </a>
            </div>

        </div>
        <div class="col-lg-3 col-xs-6">
          <div id="dtks" class="small-box bg-orange animate__animated animate__fadeInLeft animate__delay-1s" style="border-radius: 25px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  text-align: center;cursor: pointer;">
            <div class="inner">
               <center><h4 style="color:white;font-size:40px;">DTKS</h4></center>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="<?=Url::to(['setting/menu','menu'=>'dtks'])?>" class="small-box-footer" style="border-bottom-right-radius: 25px;border-bottom-left-radius: 25px;">
               <i class="fa fa-arrow-circle-left"></i> Data Terpadu Kesejahteraan Sosial
            </a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <div id="pbi" class="small-box bg-red animate__animated animate__fadeInLeft animate__delay-2s" style="border-radius: 25px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  text-align: center;cursor: pointer;">
            <div class="inner">
              <center><h4 style="color:white;font-size:40px;">PBI</h4></center>
            </div>
            <div class="icon">
              <i class="fa fa-bank"></i>
            </div>
            <a href="<?=Url::to(['setting/menu','menu'=>'pbi'])?>" class="small-box-footer" style="border-bottom-right-radius: 25px;border-bottom-left-radius: 25px;">
              <i class="fa fa-arrow-circle-left"></i> Penerima Bantuan Iuran
            </a>
          </div>
        </div>
      
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-blue animate__animated animate__fadeInLeft animate__delay-3s" style="border-radius: 25px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  text-align: center;cursor: pointer;">
            <div class="inner">
              <center><h4 style="color:white;font-size:40px;">PENGATURAN</h4></center>
            </div>
            <div class="icon">
              <i class="fa fa-gears"></i>
            </div>
            <a href="<?=Url::to(['setting/menu','menu'=>'pengaturan'])?>" class="small-box-footer" style="border-bottom-right-radius: 25px;border-bottom-left-radius: 25px;">
              <i class="fa fa-arrow-circle-left"></i> Pengaturan
            </a>
          </div>
        </div>



      </div>


<div class="row">
<div class="col-lg-3 col-xs-6">
          <div id="p3ke" class="small-box bg-orange animate__animated animate__fadeInLeft animate__delay-1s" style="border-radius: 25px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  text-align: center;cursor: pointer;">
            <div class="inner">
               <center><h4 style="color:white;font-size:40px;">P3KE</h4></center>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="<?=Url::to(['setting/menu','menu'=>'p3ke'])?>" class="small-box-footer" style="border-bottom-right-radius: 25px;border-bottom-left-radius: 25px;">
               <i class="fa fa-arrow-circle-left"></i> Data P3KE
            </a>
          </div>
        </div>
  <div class="col-md-6 col-sm-6 col-xs-12">
  <div style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  text-align: center;cursor: pointer;" class="animate__animated animate__fadeInLeft animate__delay-2s">
    <div id="map" style="height: 450px"></div>
  </div>
    </div>
  </div>


  
</div>  


NON ADMIN


<?php 
// $coba =$model->id_beritamedia;
$this->registerJs(
"
$( document ).ready(function() {
    console.log( 'ready!' );

// $('#bansos').click(function() {
//   $('#bansos-modal').modal('show');
// });
// $('#dtks').click(function() {
//   $('#dtks-modal').modal('show');
// });
// $('#pbi').click(function() {
//   $('#pbi-modal').modal('show');
// });


});
"
);
?>

<?php
//-6.990093, 110.422990 semarang
//-1.9883142971770003, 113.60737246745127 indonesia
$kecamatan = json_encode($kecamatan);
$home=Url::base(true).'/index.php?r=dtks-maret2022-dtks%2Findex&kecamatan=';
$laki='&jenis_kelamin=Laki-laki';
$perempuan='&jenis_kelamin=Perempuan';
$kk='&kk=ada';
$url=Url::base(true).'/images/omah.svg';
// $junctionUrl = Url::to(['simpang/view']);
$script = <<< JS
    const map = L.map('map').setView([-6.990093, 110.422990], 11);
    const kecamatan = $kecamatan;
    const markers = [];

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    kecamatan.forEach(it => {
            var myIcon = L.icon({
                iconUrl: '$url',
                iconSize: [35, 45], // size of the icon
                });
            let mark = L.marker(it.latlong.split(","),{icon: myIcon}).addTo(map);
            mark.bindPopup(`
               <strong style="color:red;font-size:20px;">KECAMATAN `+ it.Nama +`</strong>
               <br>
               <strong>DTKS MARET 2022</strong>
               <table class="table table-hover" style="color:blue;font-size:20px;cursor: pointer;">
                    <tr>
                        <td>Jiwa</td>
                        <td>:</td>
                        <td><a href="$home`+ it.Nama +`" >`+ it.jiwa +`</a></td>
                    </tr>
                    <tr>
                        <td>Keluarga</td>
                        <td>:</td>
                        <td><a href="$home`+ it.Nama +`$kk" >`+ it.keluarga +`</a></td>
                    </tr>
                    <tr>
                        <td>Laki-Laki</td>
                        <td>:</td>
                        <td><a href="$home`+ it.Nama +`$laki" >`+ it.pria +`</a></td>
                    </tr>
                    <tr>
                        <td>Perempuan</td>
                        <td>:</td>
                        <td><a href="$home`+ it.Nama +`$perempuan" >`+ it.perempuan +`</a></td>
                    </tr>
                </table>
                <div class="text-center">
      
                </div>
            `)
            markers.push([mark, it]);
    });
JS;
$this->registerJs($script);
?>