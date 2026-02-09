<?php
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'STATISTIK';
?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"></script>
<section id="permohonan" style="padding: 15px 0;" class="d-flex align-items-center justify-content-center">
            <div class="container">
                <div class="heading text-center cnavy">
                    <h2 class="fw-bold">Statistik <span>PPKS</span></h2>
                </div>
                <div class="row justify-content-center">

                </div>
</div>
</section>
<div class="container mt-5">
    <div class="row g-4">

      <div class="col-md-6">
        <div class="card shadow">
          <div class="card-header bg-success text-white">
            Jumlah PPKS per Jenis Kelamin dan Wilayah
          </div>
          <div class="card-body">
            <canvas id="chartWilayahJK" height="200"></canvas>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="card shadow">
          <div class="card-header bg-warning text-white">
            PPKS per Jenis Kelamin dan Status DTKS per Wilayah
          </div>
          <div class="card-body">
            <canvas id="chartDTKS" height="200"></canvas>
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="card shadow">
          <div class="card-header bg-warning text-white">
            Statistik PPKS
          </div>
          <div class="card-body">
            <canvas id="chartPPKS" height="200"></canvas>
          </div>
        </div>
      </div>


    </div>
  </div>

  <!-- Chart.js Script -->
  <script>

    const ctx3 = document.getElementById('chartPPKS').getContext('2d');
    new Chart(ctx3, {
      type: 'bar',
      data: {
        labels: [
          'Anak Terlantar',
          'Lansia Terlantar',
          'Disabilitas',
          'Gepeng',
          'Korban Bencana'
        ],
        datasets: [{
          label: 'Jumlah PPKS',
          data: [120, 85, 60, 40, 95],
          backgroundColor: [
            'rgba(255, 99, 132, 0.6)',
            'rgba(54, 162, 235, 0.6)',
            'rgba(255, 206, 86, 0.6)',
            'rgba(75, 192, 192, 0.6)',
            'rgba(153, 102, 255, 0.6)'
          ],
          borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)'
          ],
          borderWidth: 1
        }]
      },
      options: {
        indexAxis: 'y',
        responsive: true,
        plugins: {
          legend: { display: false },
          title: {
            display: true,
            text: 'Jumlah PPKS per Kategori'
          },
          datalabels: {
            anchor: 'end',
            align: 'right',
            color: '#000',
            font: {
              weight: 'bold'
            },
            formatter: function(value) {
              return value;
            }
          }
        },
        scales: {
          x: {
            beginAtZero: true,
            title: {
              display: true,
              text: 'Jumlah Orang'
            }
          }
        }
      },
      plugins: [ChartDataLabels]
    });

    const ctx = document.getElementById('chartWilayahJK').getContext('2d');
    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: [
          'Semarang Barat',
          'Semarang Timur',
          'Semarang Utara',
          'Semarang Selatan',
          'Semarang Tengah'
        ],
        datasets: [
          {
            label: 'Laki-laki',
            data: [120, 90, 75, 60, 85],
            backgroundColor: 'rgba(54, 162, 235, 0.6)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
          },
          {
            label: 'Perempuan',
            data: [100, 95, 60, 70, 90],
            backgroundColor: 'rgba(255, 99, 132, 0.6)',
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 1
          }
        ]
      },
      options: {
        indexAxis: 'y',
        responsive: true,
        plugins: {
          legend: {
            position: 'top'
          },
          title: {
            display: true,
            text: 'Jumlah PPKS per Jenis Kelamin dan Wilayah'
          },
          datalabels: {
            anchor: 'end',
            align: 'right',
            color: '#000',
            font: {
              weight: 'bold'
            },
            formatter: (value) => value
          }
        },
        scales: {
          x: {
            beginAtZero: true,
            title: {
              display: true,
              text: 'Jumlah Orang'
            }
          }
        }
      },
      plugins: [ChartDataLabels]
    });

    const ctx4 = document.getElementById('chartDTKS').getContext('2d');
    new Chart(ctx4, {
      type: 'bar',
      data: {
        labels: [
          'Semarang Barat',
          'Semarang Timur',
          'Semarang Utara',
          'Semarang Selatan',
          'Semarang Tengah'
        ],
        datasets: [
          {
            label: 'Laki-laki DTKS',
            data: [50, 45, 40, 30, 35],
            backgroundColor: 'rgba(54, 162, 235, 0.7)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
          },
          {
            label: 'Perempuan DTKS',
            data: [40, 35, 30, 25, 30],
            backgroundColor: 'rgba(255, 99, 132, 0.7)',
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 1
          },
          {
            label: 'Laki-laki Non-DTKS',
            data: [70, 55, 45, 30, 50],
            backgroundColor: 'rgba(54, 162, 235, 0.3)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1,
            borderDash: [5, 5]
          },
          {
            label: 'Perempuan Non-DTKS',
            data: [60, 60, 30, 45, 60],
            backgroundColor: 'rgba(255, 99, 132, 0.3)',
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 1,
            borderDash: [5, 5]
          }
        ]
      },
      options: {
        indexAxis: 'y',
        responsive: true,
        plugins: {
          legend: {
            position: 'top'
          },
          title: {
            display: true,
            text: 'Jumlah PPKS per Jenis Kelamin dan Status DTKS per Wilayah'
          },
          datalabels: {
            anchor: 'end',
            align: 'right',
            color: '#000',
            font: {
              weight: 'bold'
            },
            formatter: (value) => value
          }
        },
        scales: {
          x: {
            beginAtZero: true,
            title: {
              display: true,
              text: 'Jumlah Orang'
            }
          }
        }
      },
      plugins: [ChartDataLabels]
    });
  </script>