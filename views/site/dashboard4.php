<?php
use yii\helpers\Json;
use yii\helpers\Url;
use yii\web\JsExpression;
header("Access-Control-Allow-Origin: *");
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
        #map { height: 80vh; margin: 0; padding: 0; }
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
    </style>
</head>
<body>
<div id="map"></div>

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
            this._div.innerHTML = '<h4>' + (isKecamatan ? 'Batas Wilayah Kecamatan' : 'Batas Wilayah Kelurahan') + '</h4>' + 
                '<table style="width: 100%; border-collapse: collapse;">' +
                    '<tr><td><b>' + (isKecamatan ? 'Kecamatan' : 'Kelurahan') + '</b></td><td>:</td><td><i class="fas fa-map-marker-alt" style="color: #3498db;"></i> ' + (isKecamatan ? props.kecamatan : props.kel_desa) + '</td></tr>' +
                    '<tr><td><b>PPKS</b></td><td>:</td><td><i class="fas fa-users" style="color: #2ecc71;"></i> ' + props.ppks + '</td></tr>' +
                    '<tr><td><b>Pria</b></td><td>:</td><td><i class="fas fa-male" style="color: #f39c12;"></i> ' + props.pria + '</td></tr>' +
                    '<tr><td><b>Perempuan</b></td><td>:</td><td><i class="fas fa-female" style="color: #e74c3c;"></i> ' + props.perempuan + '</td></tr>' +
                '</table>';
        } else {
            this._div.innerHTML = '<h4>' + (isKecamatan ? 'Batas Wilayah Kecamatan' : 'Batas Wilayah Kelurahan') + '</h4>' + 
                'Arahkan mouse ke wilayah';
        }
    };
    info.addTo(map);

    // Style function for GeoJSON features
    function style(feature) {
        return { fillColor: '#6c757d', weight: 2, opacity: 1, color: '#343a40', dashArray: '3', fillOpacity: 0.6 };
    }

    // Function to process GeoJSON features
    function processFeatures(data, stats) {
        return L.geoJson(data, {
            style: style,
            onEachFeature: function(feature, layer) {
                console.log(feature.properties);
                // var areaName = (isKecamatan ? feature.properties.kecamatan : feature.properties.kelurahan);
                var areaName = isKecamatan ? feature.properties.kecamatan : feature.properties.kel_desa;

                var currentStats = stats.find(function(item) { return  item.nama === areaName; });
                console.log(currentStats);
                if (currentStats) {
                    feature.properties.ppks = currentStats.ppks;
                    feature.properties.pria = currentStats.pria;
                    feature.properties.perempuan = currentStats.perempuan;
                }

                layer.on({
                    click: function(e) { info.update(feature.properties); },
                    mouseover: function(e) {
                        e.target.setStyle({ fillColor: '#f39c12', weight: 2, color: '#e67e22', fillOpacity: 0.7 });
                    },
                    mouseout: function(e) { geojsonLayer.resetStyle(e.target); }
                });
            }
        });
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
                loadGeoJsonData('http://localhost/sosialmenyapa/web/geo/batas-kelurahan.geojson', dataKelurahan);
            } else {
                isKecamatan = true;
                button.innerText = "Switch to Kelurahan";
                loadGeoJsonData('http://localhost/sosialmenyapa/web/geo/batas-kecamatan.geojson', dataKecamatan);
            }
        };
        return div;
    };
    switchControl.addTo(map);

    // Initially load Kecamatan GeoJSON
    loadGeoJsonData('http://localhost/sosialmenyapa/web/geo/batas-kecamatan.geojson', dataKecamatan);
</script>

</body>
</html>
