<?php
$this->title = 'Monitoring Pompa';
?>

<div class="site-monitoring">
    <h2>Monitoring Pompa</h2>

    <label for="deviceSelector">Pilih Perangkat:</label>
    <select id="deviceSelector" class="form-control">
        <option value="all">Semua Perangkat</option>
        <option value="pompa1_1">Pompa 1-1</option>
        <option value="pompa1_2">Pompa 1-2</option>
    </select>

    <div id="deviceData">
        <!-- Data perangkat akan muncul di sini -->
    </div>
</div>

<?php
$websocketUrl = "ws://192.168.1.10:8081"; // Ganti dengan IP Server WebSocket
$js = <<<JS
    const socket = new WebSocket("$websocketUrl");
    let selectedDevice = "all"; // Default: tampilkan semua perangkat

    document.getElementById("deviceSelector").addEventListener("change", function() {
        selectedDevice = this.value;
        updateUI(); // Perbarui tampilan setelah memilih perangkat
    });

    socket.onmessage = function(event) {
        const data = JSON.parse(event.data);
        console.log("Data diterima:", data);
        updateUI(data);
    };

    function updateUI(data = []) {
        const container = document.getElementById("deviceData");
        container.innerHTML = ""; // Kosongkan kontainer sebelum mengisi ulang

        data.forEach(deviceData => {
            if (selectedDevice === "all" || deviceData.device === selectedDevice) {
                const div = document.createElement("div");
                div.id = `device-${deviceData.device}`; // ID unik untuk tiap perangkat
                div.classList.add("card", "p-3", "mb-3", "shadow-sm");

                div.innerHTML = `
                    <h4>Perangkat: ${deviceData.device}</h4>
                    <p><strong>Suhu:</strong> ${deviceData.suhu}°C</p>
                    <p><strong>Getaran:</strong> ${deviceData.getaran}</p>
                    <p><strong>Kelembapan:</strong> ${deviceData.kelembapan}%</p>
                    <p><strong>Waktu:</strong> ${deviceData.waktu}</p>
                `;

                container.appendChild(div);
            }
        });
    }
JS;

$this->registerJs($js);
?>
