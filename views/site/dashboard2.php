<?php
use yii\helpers\Url;
use app\models\Actions;
use app\models\Bdtrt;
use app\models\Bdtart;
use app\models\Dokumen;
use miloschuman\highcharts\Highcharts;
/* @var $this yii\web\View */
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
// $tahun = substr($session['periode'], -4);
// $bulan = substr($session['periode'], 0,strlen($session['periode'])-4);
// $bulan = strtoupper($bulan);

$coord = new LatLng(['lat' => -7.003257, 'lng' => 110.4258603]);

$map = new Map([
    'center' => $coord,
    'zoom' => 11,
    'height' => 390,
    'width' => 715,
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


// // setup just one waypoint (Google allows a max of 8)
// $waypoints = [
//     new DirectionsWayPoint(['location' => $school])
// ];

// $directionsRequest = new DirectionsRequest([
//     'origin' => $home,
//     'destination' => $school,
//     'waypoints' => $waypoints,
//     'travelMode' => TravelMode::DRIVING
// ]);

// Lets configure the polyline that renders the direction
// $polylineOptions = new PolylineOptions([
//     'strokeColor' => '#FFAA00',
//     'draggable' => true
// ]);

// // Now the renderer
// $directionsRenderer = new DirectionsRenderer([
//     'map' => $map->getName(),
//     'polylineOptions' => $polylineOptions
// ]);

// // Finally the directions service
// $directionsService = new DirectionsService([
//     'directionsRenderer' => $directionsRenderer,
//     'directionsRequest' => $directionsRequest
// ]);

// // Thats it, append the resulting script to the map
// $map->appendScript($directionsService->getJs());

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
// Semarang Selatan  -7.002000, 110.437386
// Candisari   -7.026746, 110.427962
// Tembalang   -7.059699, 110.447521
// Pedurungan    -7.009221, 110.464801
// Genuk     -6.965243, 110.477162
// Gayamsari   -6.999241, 110.449370
// semarang timur    -6.986794, 110.439633
// Semarang Utara    -6.965289, 110.407141
// Semarang Tengah   -6.983770, 110.419771
// Semarang Barat    -6.982275, 110.389272
// Tugu      -6.985226, 110.345299
// ngaliyan    -6.996885, 110.347444

// Provide a shared InfoWindow to the marker
$rekap =Actions::listdatarekap();

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
// Semarang Selatan  -7.002000, 110.437386
// Candisari   -7.026746, 110.427962
// Tembalang   -7.059699, 110.447521
// Pedurungan    -7.009221, 110.464801
// Genuk     -6.965243, 110.477162
// Gayamsari   -6.999241, 110.449370
// semarang timur    -6.986794, 110.439633
// Semarang Utara    -6.965289, 110.407141
// Semarang Tengah   -6.983770, 110.419771
// Semarang Barat    -6.982275, 110.389272
// Tugu      -6.985226, 110.345299
// ngaliyan    -6.996885, 110.347444

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

// $kelurahans = [
//     new LatLng(['lat' => -6.986949, 'lng' => 110.456298]),
//     new LatLng(['lat' => -6.988354, 'lng' => 110.463551]),
//     new LatLng(['lat' => -6.992571, 'lng' => 110.455075])
//     // new LatLng(['lat' => 25.774252, 'lng' => -80.190262])
// ];
// Now lets write a polygon
// $coords = [
//     new LatLng(['lat' => -6.990308, 'lng' => 110.404016]),
//     new LatLng(['lat' => -6.994227, 'lng' => 110.438520]),
//     new LatLng(['lat' => -6.972758, 'lng' => 110.401956])
//     // new LatLng(['lat' => 25.774252, 'lng' => -80.190262])
// ];


// $polygon = new Polygon([
//     'paths' => $coords
// ]);

// $polygon2 = new Polygon([
//     'paths' => $kelurahans
// ]);


// Add a shared info window
// $polygon->attachInfoWindow(new InfoWindow([
//         'content' => '<p>This is my super cool Polygon</p>'
//     ]));

// $polygon2->attachInfoWindow(new InfoWindow([
//         'content' => '<p>This is my super cool Polygon2</p>'
//     ]));


// Add it now to the map
// $map->addOverlay($polygon);

// $map->addOverlay($polygon2);


// Lets show the BicyclingLayer :)
// $bikeLayer = new BicyclingLayer(['map' => $map->getName()]);

// Append its resulting script
// $map->appendScript($bikeLayer->getJs());


//Display the map -finally :)
// echo $map->display();

$dashboard=Actions::listrekapdashboard();
$this->title = 'DASHBOARD';
?>
<?php
$surat= Dokumen::find()->where(['username'=>@Yii::$app->user->identity->username])->andWhere(['status'=>'proses'])->andWhere(['kategori_dokumen'=>'Surat Permohonan Data'])->one();
$ba= Dokumen::find()->where(['username'=>@Yii::$app->user->identity->username])->andWhere(['status'=>'proses'])->andWhere(['kategori_dokumen'=>'Berita Acara Serah Terima'])->one();
if (null!==$ba) {
?>
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
            <!-- =========================================================== -->
 <!-- Small boxes (Stat box) -->
      <div class="row">
         <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h4></h4>
              <strong style="color:white;">BANSOS</strong>
            </div>
            <div class="icon">
              <i class="fa fa-cubes"></i>
            </div>
            <a href="#" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h4></h4>
              <p>DTKS</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="#" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->        
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h4></h4>
              <p>PBI</p>
            </div>
            <div class="icon">
              <i class="fa fa-bank"></i>
            </div>
            <a href="#" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
      
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h4></h4>
              <p>PENGATURAN</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="#" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->


      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="fa fa-bookmark-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Pengguna Bantuan Pangan</span>
              <span class="info-box-number"><?=Yii::$app->formatter->asInteger($dashboard[0]['pbp'])?></span>

              <div class="progress">
                <div class="progress-bar" style="width: 100%"></div>
              </div>
                  <span class="progress-description">
                     Kuota Sosial Pengguna Bantuan Pangan
                  </span>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-green">
            <span class="info-box-icon"><i class="fa fa-thumbs-o-up"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Program Keluarga Harapan (PKH)</span>
              <span class="info-box-number"><?=Yii::$app->formatter->asInteger($dashboard[0]['pkh'])?></span>

              <div class="progress">
                <div class="progress-bar" style="width: 100%"></div>
              </div>
                  <span class="progress-description">
                  <?php
                  // $session=Yii::$app->session;
                  // $tahun = substr($session['periode'], -4);
                  // $bulan = substr($session['periode'], 0,strlen($session['periode'])-4);
                  // print_r($bulan);exit;
                  ?>
                    PROGRAM KELUARGA HARAPAN <?php //$bulan?> <?php //$tahun?>
                  </span>
            </div>

          </div>

        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="fa fa-cubes"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">PBI JK/KIS</span>
              <span class="info-box-number"><?=Yii::$app->formatter->asInteger($dashboard[0]['pbi'])?></span>

              <div class="progress">
                <div class="progress-bar" style="width: 100%"></div>
              </div>
                  <span class="progress-description">
                    PBI JK/KIS <?php //$bulan?> <?php //$tahun?>
                  </span>
            </div>

          </div>

        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-red">
            <span class="info-box-icon"><i class="fa fa-book"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">
              <?php 
                echo Html::a('Angka Kemiskinan Kota Semarang', ['bdtart/rekapbps'], ['style' => 'color:white;']);
              ?>
              </span>
              <span class="info-box-number"><?php 
                echo Html::a('3.98%', ['bdtart/rekapbps'], ['style' => 'color:white;']);
              ?></span>

              <div class="progress">
                <div class="progress-bar" style="width: 3.98%"></div>
              </div>
                  <span class="progress-description">
                    <?php 
                echo Html::a('BPS Kota Semarang', ['bdtart/rekapbps'], ['style' => 'color:white;']);
              ?> 
                  </span>
            </div>

          </div>

        </div>


      </div>



<div class="row">
  <div class="col-md-8 col-sm-6 col-xs-12">
    <?php echo $map->display();?>
  </div>
  <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="box box-widget widget-user-2">
            <div class="box-footer no-padding">
               <?php
               if ($session['periode']==="oktober2020") {
               $rekapperstatuskesejahteraan= Actions::listrekapperstatuskesejahteraan();
               $sk1=$rekapperstatuskesejahteraan[16]['sangatmiskin'];
               $sk2=$rekapperstatuskesejahteraan[16]['hampirmiskin'];
               $sk3=$rekapperstatuskesejahteraan[16]['miskin'];
               $sk4=$rekapperstatuskesejahteraan[16]['rentanmiskin'];
               $sk5=$rekapperstatuskesejahteraan[16]['menujumiddleclass'];
               $total=$rekapperstatuskesejahteraan[16]['grandtotal'];
               $persen1=($sk1/$total)*100;
               $persen2=($sk2/$total)*100;
               $persen3=($sk3/$total)*100;
               $persen4=($sk4/$total)*100;
               $persen5=($sk5/$total)*100;
echo Highcharts::widget([
    'options' => [
        'title' => ['text' => 'Grafik Status Kesejahteraan'],
        'plotOptions' => [
            'pie' => [
                'cursor' => 'pointer',
            ],
        ],
        'series' => [
            [ // new opening bracket
                'type' => 'pie',
                'name' => 'Status Kesejahteraan',
                'data' => [
                    ['Sangat Miskin', round($persen1,2)],
                    ['Hampir Miskin', round($persen2,2)],
                    ['Miskin', round($persen3,2)],
                    ['Rentan Miskin', round($persen4,2)],
                    ['Menuju Middle Class', round($persen5,2)],
                ],
                'showInLegend'=> true,
                "dataLabels" => [
                        "enabled"=> true,
                        "format" => "{point.name}: {point.y} %"
                    ]

            ] // new closing bracket
        ],
    ],
]);
               }else{

$rekapperdesil= Actions::listrekapperdesil();
               $desil1=$rekapperdesil[16]['desil1'];
               $desil2=$rekapperdesil[16]['desil2'];
               $desil3=$rekapperdesil[16]['desil3'];
               $desil4=$rekapperdesil[16]['desil4'];
               $total=$desil1+$desil2+$desil3+$desil4;
               $persen1=($desil1/$total)*100;
               $persen2=($desil2/$total)*100;
               $persen3=($desil3/$total)*100;
               $persen4=($desil4/$total)*100;
echo Highcharts::widget([
    'options' => [
        'title' => ['text' => 'Grafik Status Kesejahteraan'],
        'plotOptions' => [
            'pie' => [
                'cursor' => 'pointer',
            ],
        ],
        'series' => [
            [ // new opening bracket
                'type' => 'pie',
                'name' => 'Desil',
                'data' => [
                    ['desil1', round($persen1,2)],
                    ['desil2', round($persen2,2)],
                    ['desil3', round($persen3,2)],
                    ['desil4', round($persen4,2)],
                ],
            ] // new closing bracket
        ],
    ],
]);


               }

            ?>
            </div>
          </div>


  </div>
</div>

      <!-- =========================================================== -->

      <!-- Small boxes (Stat box) -->
      <div class="row">
         <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h4><?=Yii::$app->formatter->asInteger($dashboard[0]['kip'])?></h4>
              <p>Program KIP</p>
            </div>
            <div class="icon">
              <i class="fa fa-cubes"></i>
            </div>
            <a href="#" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h4><?=Yii::$app->formatter->asInteger($dashboard[0]['jiwa'])?></h4>
              <p>Jiwa DT</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="#" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->        
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h4><?=Yii::$app->formatter->asInteger($dashboard[0]['ruta'])?></h4>
              <p>RUTA DT</p>
            </div>
            <div class="icon">
              <i class="fa fa-bank"></i>
            </div>
            <a href="#" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
      
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h4><?=Yii::$app->formatter->asInteger($dashboard[0]['keluarga'])?></h4>
              <p>Keluarga DT</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="#" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->





<?php
// echo '<pre>';
// print_r($rekapperdesil[16]['desil1']);
// echo '</pre>';


?>