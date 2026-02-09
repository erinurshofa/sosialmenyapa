<?php
use yii\helpers\Html;

$this->title = 'Laporan Data PPKS - Kategori Tertentu';
?>

<h2 style="text-align: center;">Laporan Data PPKS</h2>
<h4 style="text-align: center;">Kategori: Penyandang Disabilitas Terlantar, Anak Terlantar, Lanjut Usia Terlantar, Gelandangan, dan Pengemis</h4>

<table border="1" cellspacing="0" cellpadding="5" width="100%">
    <thead>
        <tr style="background-color: #f2f2f2; text-align:center;">
            <th>NO</th>
            <th>NAMA</th>
            <th>NIK</th>
            <th>JENIS KELAMIN</th>
            <th>TTL</th>
            <th>ALAMAT</th>
            <th>TINGGAL DI DALAM KELUARGA</th>
            <th>HUB DGN KRT DAN KEPALA KELUARGA</th>
            <th>Kecamatan</th>
            <th>Kelurahan</th>
            <th>Jenis PPKS</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $kategori_list = [
            'penyandang_disabilitas' => 'Penyandang Disabilitas',
            'anak_terlantar' => 'Anak Terlantar',
            'lanjut_usia_terlantar' => 'Lanjut Usia Terlantar',
            'pengemis' => 'Gelandangan Pengemis',
        ];

        foreach ($kategori_list as $key => $label) {
            $no = 1;
            $first_shown = false;
            $total = 0;

            foreach ($models as $model) {
                if ($model->$key == 1) {
                    // Cetak header kategori hanya sekali
                    if (!$first_shown) {
                        echo '<tr><td colspan="11" style="background-color: #d9edf7; font-weight: bold; text-align: left;">' . $label . '</td></tr>';
                        $first_shown = true;
                    }
                    ?>
                    <tr>
                        <td style="text-align: center;"><?= $no++ ?></td>
                        <td><?= Html::encode($model->nama) ?></td>
                        <td><?= Html::encode($model->nik) ?></td>
                        <td><?= Html::encode($model->jenis_kelamin) ?></td>
                        <td><?= Html::encode($model->tempat_lahir) ?>,<?= Html::encode($model->tanggal_lahir) ?></td>
                        <td><?= Html::encode($model->alamat) ?></td>
                        <td>-</td>
                        <td>-</td>
                        <td><?= Html::encode($model->kecamatan) ?></td>
                        <td><?= Html::encode($model->kelurahan) ?></td>
                        <td><?= Html::encode($model->jenis_ppks_fix) ?></td>
                    </tr>
                    <?php
                    $total++;
                }
            }

            // Jika tidak ada data dalam kategori
            if (!$first_shown) {
                echo '<tr><td colspan="11" style="text-align: center; font-weight: bold; color: red;">Tidak ada data untuk kategori ' . $label . '</td></tr>';
            } else {
                // Tambahkan total di baris terakhir kategori
                echo '<tr><td colspan="11" style="text-align: center; font-weight: bold; background-color: #f2f2f2;">Total ' . $label . ': ' . $total . '</td></tr>';
            }
        }
        ?>
    </tbody>
</table>
