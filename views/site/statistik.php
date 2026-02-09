<?php
use yii\helpers\Url;
/* @var $this yii\web\View */
$this->title = 'STATISTIK';
?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"></script>
<style>
  .card { border-radius: 16px; box-shadow: 0 4px 24px rgba(0,0,0,0.08); border: none; }
  .card-header { font-size: 1.1rem; font-weight: 600; border-radius: 16px 16px 0 0; }
  .chart-desc { font-size: 0.95rem; color: #555; margin-bottom: 8px; }
  @media (max-width: 768px) {
    .card-header { font-size: 1rem; }
    .chart-desc { font-size: 0.9rem; }
  }
</style>
<section id="permohonan" style="padding: 15px 0;" class="d-flex align-items-center justify-content-center">
  <div class="container">
    <div class="heading text-center cnavy">
      <h2 class="fw-bold" style="font-family: 'Segoe UI', Arial, sans-serif;">Statistik <span style="color:#0d6efd;">PPKS</span></h2>
      <p style="color:white;max-width:600px;margin:0 auto;font-size:1.05rem;">
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
      <canvas id="chartWilayahJK" height="400" aria-label="Chart Jumlah PPKS per Jenis Kelamin dan Wilayah" role="img"></canvas>
      </div>
    </div>
    </div>

    <div class="col-md-6">
    <div class="card shadow">
      <div class="card-header bg-warning text-white">
      PPKS per Status DTKS per Wilayah
      </div>
      <div class="card-body">
      <div class="chart-desc">Perbandingan PPKS DTKS dan Non-DTKS di tiap wilayah.</div>
      <canvas id="chartDTKS" height="400" aria-label="Chart PPKS per Jenis Kelamin dan Status DTKS per Wilayah" role="img"></canvas>
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
  // Data dari PHP
  const wilayah = <?= json_encode($wilayah) ?>;
  const pria = <?= json_encode($pria) ?>;
  const perempuan = <?= json_encode($perempuan) ?>;
  const dtks = <?= json_encode($dtks) ?>;
  const nondtks = <?= json_encode($nondtks) ?>;
  const kategoriLabels = <?= json_encode(array_keys($kategori)) ?>;
  const kategoriData = <?= json_encode(array_values($kategori)) ?>;

  // Show loading spinner
  document.getElementById('chart-loading').style.display = 'flex';

  window.addEventListener('load', function() {
    document.getElementById('chart-loading').style.display = 'none';

    // Chart Statistik PPKS
    // const ctx3 = document.getElementById('chartPPKS').getContext('2d');
    // new Chart(ctx3, {
    //   type: 'bar',
    //   data: {
    //     labels: kategoriLabels,
    //     datasets: [{
    //       label: 'Jumlah PPKS',
    //       data: kategoriData,
    //       backgroundColor: [
    //         '#0d6efd',
    //         '#198754',
    //         '#ffc107',
    //         '#20c997',
    //         '#6f42c1'
    //       ],
    //       borderRadius: 8,
    //       borderWidth: 0
    //     }]
    //   },
    //   options: {
    //     indexAxis: 'y',
    //     responsive: true,
    //     plugins: {
    //       legend: { display: false },
    //       title: { display: false },
    //       tooltip: {
    //         enabled: true,
    //         callbacks: {
    //           label: ctx => `Jumlah: ${ctx.parsed.x}`
    //         }
    //       },
    //       datalabels: {
    //         anchor: 'end',
    //         align: 'right',
    //         color: '#222',
    //         font: { weight: 'bold' },
    //         formatter: value => value
    //       }
    //     },
    //     scales: {
    //       x: {
    //         beginAtZero: true,
    //         title: { display: true, text: 'Jumlah Orang' },
    //         grid: { color: '#e9ecef' }
    //       },
    //       y: { grid: { color: '#f8f9fa' } }
    //     }
    //   },
    //   plugins: [ChartDataLabels]
    // });
    const ctx3 = document.getElementById('chartPPKS').getContext('2d');
new Chart(ctx3, {
  type: 'bar',
  data: {
    labels: kategoriLabels, // array 26 label kategori
    datasets: [{
      label: 'Jumlah PPKS',
      data: kategoriData, // array 26 data kategori
      backgroundColor: [
        '#0d6efd', '#198754', '#ffc107', '#20c997', '#6f42c1', '#e83e8c', '#fd7e14', '#6610f2',
        '#6c757d', '#adb5bd', '#17a2b8', '#dc3545', '#f8f9fa', '#343a40', '#ff6384', '#36a2eb',
        '#cc65fe', '#ffce56', '#2ecc40', '#e67e22', '#e74c3c', '#1abc9c', '#8e44ad', '#f39c12',
        '#d35400', '#27ae60'
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
      title: { display: false },
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

    // Chart Wilayah Jenis Kelamin
    const ctx = document.getElementById('chartWilayahJK').getContext('2d');
    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: wilayah,
        datasets: [
          {
            label: 'Laki-laki',
            data: pria,
            backgroundColor: '#0d6efd',
            borderRadius: 8
          },
          {
            label: 'Perempuan',
            data: perempuan,
            backgroundColor: '#e83e8c',
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

    // Chart DTKS
    const ctx4 = document.getElementById('chartDTKS').getContext('2d');
    new Chart(ctx4, {
      type: 'bar',
      data: {
        labels: wilayah,
        datasets: [
          {
            label: 'DTKS',
            data: dtks,
            backgroundColor: '#0d6efd',
            borderRadius: 8
          },
          {
            label: 'Non-DTKS',
            data: nondtks,
            backgroundColor: '#6c757d',
            borderRadius: 8
          },
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