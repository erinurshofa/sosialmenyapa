<?php
use yii\helpers\Json;
use yii\web\JsExpression;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Batas Wilayah Kota Semarang</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        #map {
            height: 80vh;
            margin: 0;
            padding: 0;
        }
        .petainfo {
            padding: 10px 15px;
            background: rgba(255, 255, 255, 0.9);
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
            border-radius: 8px;
            font-size: 14px;
            font-family: Arial, sans-serif;
            color: #333;
        }
        .petainfo h4 {
            margin: 0 0 8px;
            font-size: 16px;
            font-weight: bold;
        }
        .legend {
            background: rgba(255, 255, 255, 0.9);
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
            border-radius: 8px;
            line-height: 20px;
            padding: 10px 15px;
            font-size: 12px;
            font-family: Arial, sans-serif;
            color: #333;
        }
        .legend i {
            width: 20px;
            height: 20px;
            float: left;
            margin-right: 10px;
            opacity: 0.8;
            border-radius: 3px;
            background: #6c757d;
        }
        .kecamatan-label {
            font-size: 12px;
            color: #fff;
            background: rgba(60, 60, 60, 0.8);
            padding: 3px 7px;
            border-radius: 4px;
            text-align: center;
            white-space: nowrap;
            font-family: Arial, sans-serif;
        }
        .control-container {
            position: absolute;
            top: 10px;
            left: 10px;
            z-index: 1000;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 5px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        }
    </style>
</head>
<body>
<div id="map"></div>

<!-- Control Menu for GeoJSON Switch -->
<div class="control-container">
    <label for="geojsonSelect">Pilih Batas Wilayah:</label>
    <select id="geojsonSelect">
        <option value="kecamatan">Kecamatan</option>
        <option value="kelurahan">Kelurahan</option>
    </select>
</div>

<script>
    // Initialize map
    var map = L.map('map').setView([-6.9500, 110.4203], 12);

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
            this._div.innerHTML = '<h4>Batas Wilayah Kecamatan</h4>' + 
                '<table style="width: 100%; border-collapse: collapse;">' +
                    '<tr><td><b>Kecamatan</b></td><td>:</td><td><i class="fas fa-map-marker-alt" style="color: #3498db;"></i> ' + props.kecamatan + '</td></tr>' +
                    '<tr><td><b>PPKS</b></td><td>:</td><td><i class="fas fa-users" style="color: #2ecc71;"></i> ' + props.ppks + '</td></tr>' +
                    '<tr><td><b>Pria</b></td><td>:</td><td><i class="fas fa-male" style="color: #f39c12;"></i> ' + props.pria + '</td></tr>' +
                    '<tr><td><b>Perempuan</b></td><td>:</td><td><i class="fas fa-female" style="color: #e74c3c;"></i> ' + props.perempuan + '</td></tr>' +
                    '<tr><td colspan="2" style="text-align: center;">' +
                        '<a href="https://example.com/' + props.kecamatan + '" target="_blank" style="color: #2980b9; text-decoration: none;">More Info</a>' +
                    '</td></tr>' +
                '</table>';
        } else {
            this._div.innerHTML = '<h4>Batas Wilayah Kecamatan</h4>' + 
                'Arahkan mouse ke wilayah';
        }
    };
    info.addTo(map);

    // Style function for GeoJSON features
    function style(feature) {
        return {
            fillColor: '#6c757d',
            weight: 2,
            opacity: 1,
            color: '#343a40',
            dashArray: '3',
            fillOpacity: 0.6
        };
    }

    // Function to show chart in popup
    function showChartPopup(e, props) {
        var popupContent = document.createElement('div');
        var canvas = document.createElement('canvas');
        canvas.width = 300;
        canvas.height = 200;
        popupContent.appendChild(canvas);

        var popup = L.popup()
            .setLatLng(e.latlng)
            .setContent(popupContent)
            .openOn(map);

        var chartData = {
            labels: ['PPKS', 'Pria', 'Perempuan'],
            datasets: [{
                label: 'Data PPKS di ' + props.kecamatan,
                data: [props.ppks, props.pria, props.perempuan],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(75, 192, 192, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(75, 192, 192, 1)'
                ],
                borderWidth: 1
            }]
        };

        new Chart(canvas, {
            type: 'bar',
            data: chartData,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top'
                    }
                }
            }
        });
    }

    // Create GeoJSON layer dynamically based on the data
    var geojsonLayer = L.geoJson(null, {
        style: style,
        onEachFeature: function(feature, layer) {
            var stats = <?php echo Json::encode($kecamatan); ?>;
            var currentStats = stats.find(function(item) {
                return item.nama === feature.properties.kecamatan;
            });

            if (currentStats) {
                feature.properties.ppks = currentStats.ppks;
                feature.properties.pria = currentStats.pria;
                feature.properties.perempuan = currentStats.perempuan;
            }

            var center = layer.getBounds().getCenter();
            L.marker(center, {
                icon: L.divIcon({
                    className: 'kecamatan-label',
                    html: feature.properties.kecamatan
                })
            }).addTo(map);

            layer.on({
                click: function(e) {
                    // Update info control when area is clicked
                    info.update(feature.properties);
                    showChartPopup(e, feature.properties);
                },
                mouseover: function(e) {
                    // Change color on hover
                    e.target.setStyle({
                        fillColor: '#f39c12',
                        weight: 2,
                        color: '#e67e22',
                        dashArray: '',
                        fillOpacity: 0.7
                    });
                },
                mouseout: function(e) {
                    geojsonLayer.resetStyle(e.target);
                }
            });
        }
    }).addTo(map);

    // Function to fetch GeoJSON data based on the selected type
    function loadGeoJSONData(type) {
        var url = type === 'kelurahan' ? 'http://localhost/sosialmenyapa/web/geo/batas-kelurahan.geojson' : 'http://localhost/sosialmenyapa/web/geo/batas-kecamatan.geojson';
        fetch(url)
            .then(response => response.json())
            .then(data => {
                geojsonLayer.clearLayers(); // Clear the existing layer
                geojsonLayer.addData(data); // Add the new data
            })
            .catch(error => console.error('Error loading GeoJSON:', error));
    }

    // Initial load
    loadGeoJSONData('kecamatan');

    // Listen for dropdown change event to load selected GeoJSON
    document.getElementById('geojsonSelect').addEventListener('change', function() {
        loadGeoJSONData(this.value);
    });
</script>

</body>
</html>
