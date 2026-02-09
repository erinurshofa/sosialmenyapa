<?php
use yii\helpers\Url;
/* @var $this yii\web\View */
$this->title = 'STATISTIK';
?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"></script>
<style>
  .card {
    border-radius: 16px;
    box-shadow: 0 4px 24px rgba(0,0,0,0.08);
    border: none;
  }
  .card-header {
    font-size: 1.1rem;
    font-weight: 600;
    border-radius: 16px 16px 0 0;
  }
  .chart-desc {
    font-size: 0.95rem;
    color: #555;
    margin-bottom: 8px;
  }
  @media (max-width: 768px) {
    .card-header { font-size: 1rem; }
    .chart-desc { font-size: 0.9rem; }
  }
</style>
<section id="permohonan" style="padding: 15px 0;" class="d-flex align-items-center justify-content-center">
  <div class="container">
    <div class="heading text-center cnavy">
      <h2 class="fw-bold" style="font-family: 'Segoe UI', Arial, sans-serif;">Statistik <span style="color:#0d6efd;">PPKS</span></h2>
      <p style="color:#666;max-width:600px;margin:0 auto;font-size:1.05rem;">
        Data berikut memberikan gambaran jumlah PPKS berdasarkan kategori, wilayah, jenis kelamin, dan status DTKS. Arahkan kursor ke grafik untuk detail lebih lanjut.
      </p>
    </div>
    <div class="row justify-content-center"></div>
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
      <div class="chart-desc">Distribusi PPKS berdasarkan jenis kelamin di setiap wilayah.</div>
      <canvas id="chartWilayahJK" height="200" aria-label="Chart Jumlah PPKS per Jenis Kelamin dan Wilayah" role="img"></canvas>
      </div>
    </div>
    </div>

    <div class="col-md-6">
    <div class="card shadow">
      <div class="card-header bg-warning text-white">
      PPKS per Jenis Kelamin dan Status DTKS per Wilayah
      </div>
      <div class="card-body">
      <div class="chart-desc">Perbandingan PPKS DTKS dan Non-DTKS berdasarkan jenis kelamin di tiap wilayah.</div>
      <canvas id="chartDTKS" height="200" aria-label="Chart PPKS per Jenis Kelamin dan Status DTKS per Wilayah" role="img"></canvas>
      </div>
    </div>
    </div>

    <div class="col-md-12">
    <div class="card shadow">
      <div class="card-header bg-primary text-white">
      Statistik PPKS
      </div>
      <div class="card-body">
      <div class="chart-desc">Jumlah PPKS berdasarkan kategori utama.</div>
      <canvas id="chartPPKS" height="200" aria-label="Chart Statistik PPKS" role="img"></canvas>
      </div>
    </div>
    </div>

  </div>
</div>

<!-- Loading Spinner -->
<div id="chart-loading" style="display:none;position:fixed;top:0;left:0;width:100vw;height:100vh;background:rgba(255,255,255,0.7);z-index:9999;align-items:center;justify-content:center;">
  <div class="spinner-border text-primary" style="width:3rem;height:3rem;" role="status" aria-label="Loading chart..."></div>
</div>

<script>
  // Show loading spinner
  document.getElementById('chart-loading').style.display = 'flex';

  window.addEventListener('load', function() {
  document.getElementById('chart-loading').style.display = 'none';

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
      '#0d6efd',
      '#198754',
      '#ffc107',
      '#20c997',
      '#6f42c1'
      ],
      borderRadius: 8,
      borderWidth: 0
    }]
    },
    options: {
    indexAxis: 'y',
    responsive: true,
    plugins: {
      legend: { display: false },
      title: {
      display: false
      },
      tooltip: {
      enabled: true,
      callbacks: {
        label: ctx => `Jumlah: ${ctx.parsed.x}`
      }
      },
      datalabels: {
      anchor: 'end',
      align: 'right',
      color: '#222',
      font: {
        weight: 'bold'
      },
      formatter: value => value
      }
    },
    scales: {
      x: {
      beginAtZero: true,
      title: {
        display: true,
        text: 'Jumlah Orang'
      },
      grid: { color: '#e9ecef' }
      },
      y: {
      grid: { color: '#f8f9fa' }
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
      backgroundColor: '#0d6efd',
      borderRadius: 8
      },
      {
      label: 'Perempuan',
      data: [100, 95, 60, 70, 90],
      backgroundColor: '#e83e8c',
      borderRadius: 8
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
      title: { display: false },
      tooltip: {
      enabled: true,
      callbacks: {
        label: ctx => `${ctx.dataset.label}: ${ctx.parsed.x}`
      }
      },
      datalabels: {
      anchor: 'end',
      align: 'right',
      color: '#222',
      font: { weight: 'bold' },
      formatter: value => value
      }
    },
    scales: {
      x: {
      beginAtZero: true,
      title: { display: true, text: 'Jumlah Orang' },
      grid: { color: '#e9ecef' }
      },
      y: { grid: { color: '#f8f9fa' } }
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
      backgroundColor: '#0d6efd',
      borderRadius: 8
      },
      {
      label: 'Perempuan DTKS',
      data: [40, 35, 30, 25, 30],
      backgroundColor: '#e83e8c',
      borderRadius: 8
      },
      {
      label: 'Laki-laki Non-DTKS',
      data: [70, 55, 45, 30, 50],
      backgroundColor: '#6c757d',
      borderRadius: 8
      },
      {
      label: 'Perempuan Non-DTKS',
      data: [60, 60, 30, 45, 60],
      backgroundColor: '#fd7e14',
      borderRadius: 8
      }
    ]
    },
    options: {
    indexAxis: 'y',
    responsive: true,
    plugins: {
      legend: { position: 'top' },
      title: { display: false },
      tooltip: {
      enabled: true,
      callbacks: {
        label: ctx => `${ctx.dataset.label}: ${ctx.parsed.x}`
      }
      },
      datalabels: {
      anchor: 'end',
      align: 'right',
      color: '#222',
      font: { weight: 'bold' },
      formatter: value => value
      }
    },
    scales: {
      x: {
      beginAtZero: true,
      title: { display: true, text: 'Jumlah Orang' },
      grid: { color: '#e9ecef' }
      },
      y: { grid: { color: '#f8f9fa' } }
    }
    },
    plugins: [ChartDataLabels]
  });
  });
</script>