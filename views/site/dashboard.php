<?php
use yii\helpers\Json;
use yii\helpers\Url;
use yii\web\JsExpression;
use app\models\Rekap;
use app\models\JenisPmks;
header("Access-Control-Allow-Origin: *");
ini_set('precision', '16');
ini_set('memory_limit',-1);
set_time_limit(500);
$this->title="DASHBOARD";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Batas Wilayah Kota Semarang</title>
    <link rel="stylesheet" href="<?= Url::to('@web/leaflet/leaflet.css', true) ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="<?= Url::to('@web/leaflet/leaflet.js', true) ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        #map { height: 100vh; margin: 0; padding: 0; }
        .judulinfo, .petainfo, .legend {
            padding: 10px 15px;
            background: rgba(255, 255, 255, 0.9);
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
            border-radius: 8px;
            font-size: 14px;
            font-family: Arial, sans-serif;
            color: #333;
        }
        .switch-btn { cursor: pointer; padding: 5px 10px; background-color: #2980b9; color: white; border-radius: 5px; margin: 5px 0; }
        .map-info-bar {
            width: 265px;
            height: 10px;
            display: block;
            background: linear-gradient( to right, #eff3ff 0%, #08306b 100% );
        }
    </style>
</head>
<body>
<div class="petainfo"><h2 class="h1 m-0" style="font-size:22px;font-weight: 700; color: #08306b;">DASHBOARD</h2></div>
<div id="map"></div>

<div class="row align-items-center petainfo" style="margin-bottom: 10px;">
    <div class="col">
        <p>
            <b>Peta Sebaran PPKS Yang Ditangani Dinas Sosial Kota Semarang</b><br>
            Warna semakin tua, PPKS semakin banyak <br>
            <span class="map-info-bar mt-2 mb-2"></span>
        </p>
    </div>
    <div class="col text-right">
        <h2 class="h1" style="font-weight: 700; color: #08306b;">6670</h2>
        <p style="font-weight: 600;">Total PPKS</p>
    </div>
</div>

<?php 
$baseurl="https://".$_SERVER['HTTP_HOST'].Yii::$app->urlManager->baseUrl;
?>
<script>
    // Data Kecamatan & Kelurahan dari PHP
    var dataKecamatan = <?= Json::encode($kecamatan) ?>;
    var dataKelurahan = <?= Json::encode($kelurahan) ?>;
    
    var isKecamatan = true; // Flag untuk menandakan apakah sedang menampilkan Kecamatan atau Kelurahan

    // Initialize map
    var map = L.map('map').setView([-7.022599, 110.4202026], 12);

    // Add base layer
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: 'Map data © <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors'
    }).addTo(map);

    // Info control
    var info = L.control({ position: 'topright' });
    info.onAdd = function(map) {
        this._div = L.DomUtil.create('div', 'petainfo');
        this.update();
        return this._div;
    };
    info.update = function(props) {
    if (props) {
        var baseUrl = '<?=$baseurl?>/index.php?r=ppks/index';
        var params = [];

        if (props.kecamatan) {
            params.push('kecamatan=' + encodeURIComponent(props.kecamatan.toUpperCase()));
        }
        if (props.kel_desa) {
            params.push('kelurahan=' + encodeURIComponent(props.kel_desa.toUpperCase()));
        }

        var ppksUrl = baseUrl + (params.length ? '&' + params.join('&') : '');
        var priaUrl = ppksUrl + (params.length ? '&jenis_kelamin=LAKI-LAKI' : '?jenis_kelamin=LAKI-LAKI');
        var perempuanUrl = ppksUrl + (params.length ? '&jenis_kelamin=PEREMPUAN' : '?jenis_kelamin=PEREMPUAN');
        var anak_balita_terlantarUrl = ppksUrl + (params.length ? '&anak_balita_terlantar=1' : '?anak_balita_terlantar=1');
        var anak_terlantarUrl = ppksUrl + (params.length ? '&anak_terlantar=1' : '?anak_terlantar=1');
        var anak_yang_berhadapan_dengan_hukumUrl = ppksUrl + (params.length ? '&anak_yang_berhadapan_dengan_hukum=1' : '?anak_yang_berhadapan_dengan_hukum=1');
        var anak_jalananUrl = ppksUrl + (params.length ? '&anak_jalanan=1' : '?anak_jalanan=1');
        var anak_dengan_kedisabilitasanUrl = ppksUrl + (params.length ? '&anak_dengan_kedisabilitasan=1' : '?anak_dengan_kedisabilitasan=1');
        var anak_korban_tindak_kekerasanUrl = ppksUrl + (params.length ? '&anak_korban_tindak_kekerasan=1' : '?anak_korban_tindak_kekerasan=1');
        var anak_yang_memerlukan_perlindungan_khususUrl = ppksUrl + (params.length ? '&anak_yang_memerlukan_perlindungan_khusus=1' : '?anak_yang_memerlukan_perlindungan_khusus=1');
        var lanjut_usia_terlantarUrl = ppksUrl + (params.length ? '&lanjut_usia_terlantar=1' : '?lanjut_usia_terlantar=1');
        var penyandang_disabilitasUrl = ppksUrl + (params.length ? '&penyandang_disabilitas=1' : '?penyandang_disabilitas=1');
        var tuna_susilaUrl = ppksUrl + (params.length ? '&tuna_susila=1' : '?tuna_susila=1');
        var gelandanganUrl = ppksUrl + (params.length ? '&gelandangan=1' : '?gelandangan=1');
        var pengemisUrl = ppksUrl + (params.length ? '&pengemis=1' : '?pengemis=1');
        var pemulungUrl = ppksUrl + (params.length ? '&pemulung=1' : '?pemulung=1');
        var kelompok_minoritasUrl = ppksUrl + (params.length ? '&kelompok_minoritas=1' : '?kelompok_minoritas=1');
        var bekas_warga_binaan_lembaga_pemasyarakatanUrl = ppksUrl + (params.length ? '&bekas_warga_binaan_lembaga_pemasyarakatan=1' : '?bekas_warga_binaan_lembaga_pemasyarakatan=1');
        var orang_dengan_hivaidsUrl = ppksUrl + (params.length ? '&orang_dengan_hivaids=1' : '?orang_dengan_hivaids=1');
        var korban_penyalahgunaan_napzaUrl = ppksUrl + (params.length ? '&korban_penyalahgunaan_napza=1' : '?korban_penyalahgunaan_napza=1');
        var korban_traffickingUrl = ppksUrl + (params.length ? '&korban_trafficking=1' : '?korban_trafficking=1');
        var korban_tindak_kekerasanUrl = ppksUrl + (params.length ? '&korban_tindak_kekerasan=1' : '?korban_tindak_kekerasan=1');
        var pekerja_migran_bermasalah_sosialUrl = ppksUrl + (params.length ? '&pekerja_migran_bermasalah_sosial=1' : '?pekerja_migran_bermasalah_sosial=1');
        var korban_bencana_alamUrl = ppksUrl + (params.length ? '&korban_bencana_alam=1' : '?korban_bencana_alam=1');
        var korban_bencana_sosialUrl = ppksUrl + (params.length ? '&korban_bencana_sosial=1' : '?korban_bencana_sosial=1');
        var perempuan_rawan_sosial_ekonomiUrl = ppksUrl + (params.length ? '&perempuan_rawan_sosial_ekonomi=1' : '?perempuan_rawan_sosial_ekonomi=1');
        var fakir_miskinUrl = ppksUrl + (params.length ? '&fakir_miskin=1' : '?fakir_miskin=1');
        var keluarga_bermasalah_sosial_psikologisUrl = ppksUrl + (params.length ? '&keluarga_bermasalah_sosial_psikologis=1' : '?keluarga_bermasalah_sosial_psikologis=1');
        var komunitas_adat_terpencilUrl = ppksUrl + (params.length ? '&komunitas_adat_terpencil=1' : '?komunitas_adat_terpencil=1');


        this._div.innerHTML = 
        '<div class="row align-items-center" style="width:300px;margin-bottom: 10px;">'+
                '<div class="col">'+
                    '<p>'+
                        '<b>Peta Sebaran PPKS Yang Ditangani Dinas Sosial Kota Semarang</b><br>'+
                        'Warna semakin tua, PPKS semakin banyak <br>'+
                        '<span class="map-info-bar mt-2 mb-2"></span>'+
                    '</p>'+
                '</div>'+
                '<div class="col">'+
                    '<b style="font-weight: 600;">' + (isKecamatan ? 'KECAMATAN' : 'KELURAHAN') +' '+  (isKecamatan ? props.kecamatan.toUpperCase() : props.kel_desa.toUpperCase()) +'</b></a></br>'+
                    '<a href="' + ppksUrl + '" target="_blank" style=" text-decoration: none;"><b class="h1" style="font-weight: 700; color: #08306b;">' + props.ppks + '</b></br>'+
                    '<b style="font-weight: 600;">TOTAL PPKS' +'</b>'+
                    // '<h2 class="h1" style="font-weight: 700; color: #08306b;">' + props.ppks + '</h2>'+
                '</div>'+
            '</div>'+
        // '<h4>' + (isKecamatan ? 'Batas Wilayah Kecamatan' : 'Batas Wilayah Kelurahan') + '</h4>' + 
            '<table style="width: 100%; border-collapse: collapse;">' +
                // '<tr><td><b>' + (isKecamatan ? 'Kecamatan' : 'Kelurahan') + '</b></td><td>:</td>' +
                // '<td><i class="fas fa-map-marker-alt" style="color: #3498db;"></i> ' +
                // (isKecamatan ? props.kecamatan.toUpperCase() : props.kel_desa.toUpperCase()) + '</td></tr>' +

                // '<tr><td><b>PPKS</b></td><td>:</td>' +
                // '<td><i class="fas fa-users" style="color: #2ecc71;"></i> ' +
                // '<a href="' + ppksUrl + '" target="_blank" style="color: #2ecc71; text-decoration: none;">' + props.ppks + '</a></td></tr>' +

                '<tr><td><b>Pria</b></td><td>:</td>' +
                '<td><i class="fas fa-male" style="color: #f39c12;"></i> ' +
                '<a href="' + priaUrl + '" target="_blank" style="color: #f39c12; text-decoration: none;">' + props.pria + '</a></td></tr>' +

                '<tr><td><b>Perempuan</b></td><td>:</td>' +
                '<td><i class="fas fa-female" style="color: #e74c3c;"></i> ' +
                '<a href="' + perempuanUrl + '" target="_blank" style="color: #e74c3c; text-decoration: none;">' + props.perempuan + '</a></td></tr>' +

                '<tr><td><b>Anak Balita Terlantar</b></td><td>:</td>' +
                '<td><i class="fas fa-child" style="color: #e74c3c;"></i> ' +
                '<a href="' + anak_balita_terlantarUrl + '" target="_blank" style="color: #e74c3c; text-decoration: none;">' + props.anak_balita_terlantar + '</a></td></tr>' +

                '<tr><td><b>Anak Terlantar</b></td><td>:</td>' +
                '<td><i class="fas fa-user-slash" style="color: #f39c12;"></i> ' +
                '<a href="' + anak_terlantarUrl + '" target="_blank" style="color: #f39c12; text-decoration: none;">' + props.anak_terlantar + '</a></td></tr>' +

                '<tr><td><b>Anak yang berhadapan dengan hukum</b></td><td>:</td>' +
                '<td><i class="fas fa-gavel" style="color: #3498db;"></i> ' +
                '<a href="' + anak_yang_berhadapan_dengan_hukumUrl + '" target="_blank" style="color: #3498db; text-decoration: none;">' + props.anak_yang_berhadapan_dengan_hukum + '</a></td></tr>' +

                '<tr><td><b>Anak Jalanan</b></td><td>:</td>' +
                '<td><i class="fas fa-road" style="color: #2ecc71;"></i> ' +
                '<a href="' + anak_jalananUrl + '" target="_blank" style="color: #2ecc71; text-decoration: none;">' + props.anak_jalanan + '</a></td></tr>' +

                '<tr><td><b>Anak dengan Kedisabilitasan</b></td><td>:</td>' +
                '<td><i class="fas fa-wheelchair" style="color: #9b59b6;"></i> ' +
                '<a href="' + anak_dengan_kedisabilitasanUrl + '" target="_blank" style="color: #9b59b6; text-decoration: none;">' + props.anak_dengan_kedisabilitasan + '</a></td></tr>' +

                '<tr><td><b>Anak Korban Tindak Kekerasan</b></td><td>:</td>' +
                '<td><i class="fas fa-hand-rock" style="color: #e74c3c;"></i> ' +
                '<a href="' + anak_korban_tindak_kekerasanUrl + '" target="_blank" style="color: #e74c3c; text-decoration: none;">' + props.anak_korban_tindak_kekerasan + '</a></td></tr>' +

                '<tr><td><b>Anak yg memerlukan perlindungan khusus</b></td><td>:</td>' +
                '<td><i class="fas fa-shield-alt" style="color: #34495e;"></i> ' +
                '<a href="' + anak_yang_memerlukan_perlindungan_khususUrl + '" target="_blank" style="color: #34495e; text-decoration: none;">' + props.anak_yang_memerlukan_perlindungan_khusus + '</a></td></tr>' +

                '<tr><td><b>Lanjut Usia Terlantar</b></td><td>:</td>' +
                '<td><i class="fas fa-blind" style="color: #d35400;"></i> ' +
                '<a href="' + lanjut_usia_terlantarUrl + '" target="_blank" style="color: #d35400; text-decoration: none;">' + props.lanjut_usia_terlantar + '</a></td></tr>' +

                '<tr><td><b>Penyandang Disabilitas</b></td><td>:</td>' +
                '<td><i class="fas fa-wheelchair" style="color: #16a085;"></i> ' +
                '<a href="' + penyandang_disabilitasUrl + '" target="_blank" style="color: #16a085; text-decoration: none;">' + props.penyandang_disabilitas + '</a></td></tr>' +

                '<tr><td><b>Tuna Susila</b></td><td>:</td>' +
                '<td><i class="fas fa-venus-mars" style="color: #e84393;"></i> ' +
                '<a href="' + tuna_susilaUrl + '" target="_blank" style="color: #e84393; text-decoration: none;">' + props.tuna_susila + '</a></td></tr>' +

                '<tr><td><b>Gelandangan</b></td><td>:</td>' +
                '<td><i class="fas fa-user-times" style="color: #c0392b;"></i> ' +
                '<a href="' + gelandanganUrl + '" target="_blank" style="color: #c0392b; text-decoration: none;">' + props.gelandangan + '</a></td></tr>' +

                '<tr><td><b>Pengemis</b></td><td>:</td>' +
                '<td><i class="fas fa-hand-holding-usd" style="color: #f1c40f;"></i> ' +
                '<a href="' + pengemisUrl + '" target="_blank" style="color: #f1c40f; text-decoration: none;">' + props.pengemis + '</a></td></tr>' +

                '<tr><td><b>Pemulung</b></td><td>:</td>' +
                '<td><i class="fas fa-recycle" style="color: #27ae60;"></i> ' +
                '<a href="' + pemulungUrl + '" target="_blank" style="color: #27ae60; text-decoration: none;">' + props.pemulung + '</a></td></tr>'+

            '</table>';

    } else {
        this._div.innerHTML = 
        '<div class="row align-items-center" style="width:300px;margin-bottom: 10px;">'+
                '<div class="col">'+
                    '<p>'+
                        '<b>Peta Sebaran PPKS Yang Ditangani Dinas Sosial Kota Semarang</b><br>'+
                        'Warna semakin tua, PPKS semakin banyak <br>'+
                        '<span class="map-info-bar mt-2 mb-2"></span>'+
                        'Arahkan dan klik mouse ke wilayah<br/>'+
                    '</p>'+
                '</div>'+
                // '<div class="col">'+
                //     '<h2 class="h1" style="font-weight: 700; color: #08306b;">6670</h2>'+
                //     '<p style="font-weight: 600;">Total PPKS</p>'+
                // '</div>'+
            '</div>';
        // '<h4>' + (isKecamatan ? 'Batas Wilayah Kecamatan' : 'Batas Wilayah Kelurahan') + '</h4>' + 
            
    }
};


    info.addTo(map);
        // Info control
    var oke = L.control({ position: 'bottomleft' });
    oke.onAdd = function(map) {
        this._div = L.DomUtil.create('div', 'petainfo');
        // this.update();
        return this._div;
    };
    oke.addTo(map);


    var iya = L.control({ position: 'topleft' });
    iya.onAdd = function(map) {
        this._div = L.DomUtil.create('div', 'petainfo');
        // this.update();
        return this._div;
    };
    iya.addTo(map);

    // Style function for GeoJSON features
    function style(feature) {
        return { fillColor: '#6c757d', weight: 2, opacity: 1, color: '#343a40', dashArray: '3', fillOpacity: 0.6 };
    }

    // Function to process GeoJSON features
    function processFeatures(data, stats) {
        return L.geoJson(data, {
            style: function(feature) {
            var areaName = isKecamatan ? feature.properties.kecamatan : feature.properties.kel_desa;
            // console.log(areaName,"areaName");
            var kecamatan = feature.properties.kecamatan;
           
            var currentStats = stats.find(function(item) {
                return isKecamatan ? item.nama === areaName : (item.nama === areaName && item.kecamatan == kecamatan);
            });
            console.log(currentStats,"currentStats");

            // Menambahkan data PPKS ke dalam properties feature
            feature.properties.ppks = currentStats ? currentStats.ppks : 0;
            feature.properties.pria = currentStats ? currentStats.pria : 0;
            feature.properties.perempuan = currentStats ? currentStats.perempuan : 0;
            feature.properties.anak_balita_terlantar = currentStats ? currentStats.anak_balita_terlantar : 0;
            feature.properties.anak_terlantar = currentStats ? currentStats.anak_terlantar : 0;
            feature.properties.anak_yang_berhadapan_dengan_hukum = currentStats ? currentStats.anak_yang_berhadapan_dengan_hukum : 0;
            feature.properties.anak_jalanan = currentStats ? currentStats.anak_jalanan : 0;
            feature.properties.anak_dengan_kedisabilitasan = currentStats ? currentStats.anak_dengan_kedisabilitasan : 0;
            feature.properties.anak_korban_tindak_kekerasan = currentStats ? currentStats.anak_korban_tindak_kekerasan : 0;
            feature.properties.anak_yang_memerlukan_perlindungan_khusus = currentStats ? currentStats.anak_yang_memerlukan_perlindungan_khusus : 0;
            feature.properties.lanjut_usia_terlantar = currentStats ? currentStats.lanjut_usia_terlantar : 0;
            feature.properties.penyandang_disabilitas = currentStats ? currentStats.penyandang_disabilitas : 0;
            feature.properties.tuna_susila = currentStats ? currentStats.tuna_susila : 0;
            feature.properties.gelandangan = currentStats ? currentStats.gelandangan : 0;
            feature.properties.pengemis = currentStats ? currentStats.pengemis : 0;
            feature.properties.pemulung = currentStats ? currentStats.pemulung : 0;
            feature.properties.kelompok_minoritas = currentStats ? currentStats.kelompok_minoritas : 0;
            feature.properties.bekas_warga_binaan_lembaga_pemasyarakatan = currentStats ? currentStats.bekas_warga_binaan_lembaga_pemasyarakatan : 0;
            feature.properties.orang_dengan_hivaids = currentStats ? currentStats.orang_dengan_hivaids : 0;
            feature.properties.korban_penyalahgunaan_napza = currentStats ? currentStats.korban_penyalahgunaan_napza : 0;
            feature.properties.korban_trafficking = currentStats ? currentStats.korban_trafficking : 0;
            feature.properties.korban_tindak_kekerasan = currentStats ? currentStats.korban_tindak_kekerasan : 0;
            feature.properties.pekerja_migran_bermasalah_sosial = currentStats ? currentStats.pekerja_migran_bermasalah_sosial : 0;
            feature.properties.korban_bencana_alam = currentStats ? currentStats.korban_bencana_alam : 0;
            feature.properties.korban_bencana_sosial = currentStats ? currentStats.korban_bencana_sosial : 0;
            feature.properties.perempuan_rawan_sosial_ekonomi = currentStats ? currentStats.perempuan_rawan_sosial_ekonomi : 0;
            feature.properties.fakir_miskin = currentStats ? currentStats.fakir_miskin : 0;
            feature.properties.keluarga_bermasalah_sosial_psikologis = currentStats ? currentStats.keluarga_bermasalah_sosial_psikologis : 0;
            feature.properties.komunitas_adat_terpencil = currentStats ? currentStats.komunitas_adat_terpencil : 0;


            return style(feature);
        },
            onEachFeature: function(feature, layer) {
                // console.log(feature.properties);
                // var areaName = (isKecamatan ? feature.properties.kecamatan : feature.properties.kelurahan);
                var areaName = isKecamatan ? feature.properties.kecamatan : feature.properties.kel_desa;
                // console.log(areaName,"areaName");
                var kecamatan = feature.properties.kecamatan;
                // console.log(kecamatan,"kecamatan");
                var currentStats = stats.find(function(item) { 
                    return  isKecamatan ? item.nama === areaName : item.nama === areaName && item.kecamatan === kecamatan; 
                });
                
                // console.log(currentStats);
                if (currentStats) {
                    feature.properties.ppks = currentStats.ppks;
                    feature.properties.pria = currentStats.pria;
                    feature.properties.perempuan = currentStats.perempuan;
                    feature.properties.anak_balita_terlantar = currentStats.anak_balita_terlantar;
                    feature.properties.anak_terlantar = currentStats.anak_terlantar;
                    feature.properties.anak_yang_berhadapan_dengan_hukum = currentStats.anak_yang_berhadapan_dengan_hukum;
                    feature.properties.anak_jalanan = currentStats.anak_jalanan;
                    feature.properties.anak_dengan_kedisabilitasan = currentStats.anak_dengan_kedisabilitasan;
                    feature.properties.anak_korban_tindak_kekerasan = currentStats.anak_korban_tindak_kekerasan;
                    feature.properties.anak_yang_memerlukan_perlindungan_khusus = currentStats.anak_yang_memerlukan_perlindungan_khusus;
                    feature.properties.lanjut_usia_terlantar = currentStats.lanjut_usia_terlantar;
                    feature.properties.penyandang_disabilitas = currentStats.penyandang_disabilitas;
                    feature.properties.tuna_susila = currentStats.tuna_susila;
                    feature.properties.gelandangan = currentStats.gelandangan;
                    feature.properties.pengemis = currentStats.pengemis;
                    feature.properties.pemulung = currentStats.pemulung;
                    feature.properties.kelompok_minoritas = currentStats.kelompok_minoritas;
                    feature.properties.bekas_warga_binaan_lembaga_pemasyarakatan = currentStats.bekas_warga_binaan_lembaga_pemasyarakatan;
                    feature.properties.orang_dengan_hivaids = currentStats.orang_dengan_hivaids;
                    feature.properties.korban_penyalahgunaan_napza = currentStats.korban_penyalahgunaan_napza;
                    feature.properties.korban_trafficking = currentStats.korban_trafficking;
                    feature.properties.korban_tindak_kekerasan = currentStats.korban_tindak_kekerasan;
                    feature.properties.pekerja_migran_bermasalah_sosial = currentStats.pekerja_migran_bermasalah_sosial;
                    feature.properties.korban_bencana_alam = currentStats.korban_bencana_alam;
                    feature.properties.korban_bencana_sosial = currentStats.korban_bencana_sosial;
                    feature.properties.perempuan_rawan_sosial_ekonomi = currentStats.perempuan_rawan_sosial_ekonomi;
                    feature.properties.fakir_miskin = currentStats.fakir_miskin;
                    feature.properties.keluarga_bermasalah_sosial_psikologis = currentStats.keluarga_bermasalah_sosial_psikologis;
                    feature.properties.komunitas_adat_terpencil = currentStats.komunitas_adat_terpencil;

                }

                // layer.on({
                //     click: function(e) { info.update(feature.properties); },
                //     mouseover: function(e) {
                //         e.target.setStyle({ fillColor: '#f39c12', weight: 2, color: '#e67e22', fillOpacity: 0.7 });
                //     },
                //     mouseout: function(e) { geojsonLayer.resetStyle(e.target); }
                // });
                layer.on({
                    click: function(e) { info.update(feature.properties); },
                    mouseover: function(e) {
                        e.target.setStyle({
                            fillColor: '#f39c12',
                            weight: 2,
                            color: '#e67e22',
                            fillOpacity: 0.9
                        });
                    },
                    mouseout: function(e) {
                        geojsonLayer.resetStyle(e.target);
                    }
                });
            }
        });
    }

    // Fungsi untuk mendapatkan warna berdasarkan jumlah PPKS
function getColor(ppks) {
    return ppks > 1500 ? '#08306b' :  // Biru tua pekat (tertinggi)
           ppks > 1200 ? '#2171b5' :  // Biru sedang
           ppks >  900 ? '#3289cb' :  // Biru lebih terang
           ppks >  600 ? '#5aaae7' :  // Biru soft
           ppks >  300 ? '#87c4f2' :  // Biru muda
                          '#eff3ff';   // Putih kebiruan (terendah)
}

// Fungsi untuk mengatur gaya wilayah berdasarkan jumlah PPKS
function style(feature) {
    var ppksCount = feature.properties.ppks || 0;
    return {
        fillColor: getColor(ppksCount),
        weight: 2,
        opacity: 1,
        color: '#343a40',
        dashArray: '3',
        fillOpacity: 1
    };
}


    // Function to fetch and update GeoJSON data
    function loadGeoJsonData(url, dataStats) {
        fetch(url)
            .then(response => response.json())
            .then(data => {
                geojsonLayer.clearLayers();
                geojsonLayer = processFeatures(data, dataStats);
                geojsonLayer.addTo(map);
            })
            .catch(error => console.error('Error loading GeoJSON:', error));
    }

    // GeoJSON Layer
    var geojsonLayer = L.geoJson(null).addTo(map);

    // Control for switching between "Kecamatan" and "Kelurahan"
    var switchControl = L.control({ position: 'bottomright' });
    switchControl.onAdd = function(map) {
        var div = L.DomUtil.create('div', 'switch-btn');
        div.innerHTML = '<button class="switch-btn">Switch to Kelurahan</button>';
        div.onclick = function() {
            var button = div.querySelector('button');
            if (isKecamatan) {
                isKecamatan = false;
                button.innerText = "Switch to Kecamatan";
                loadGeoJsonData('<?=$baseurl?>/geo/batas-kelurahan.geojson', dataKelurahan);
            } else {
                isKecamatan = true;
                button.innerText = "Switch to Kelurahan";
                loadGeoJsonData('<?=$baseurl?>/geo/batas-kecamatan.geojson', dataKecamatan);
            }
        };
        return div;
    };
    switchControl.addTo(map);

    // Initially load Kecamatan GeoJSON
    loadGeoJsonData('<?=$baseurl?>/geo/batas-kecamatan.geojson', dataKecamatan);
</script>

</body>
</html>
