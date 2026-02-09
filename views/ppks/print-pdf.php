<?php 
use yii\helpers\Html;
$kategori_list = [
    'penyandang_disabilitas' => 'Penyandang Disabilitas Terlantar',
    'anak_terlantar' => 'Anak Terlantar',
    'lanjut_usia_terlantar' => 'Lanjut Usia Terlantar',
    'pengemis' => 'Gelandangan Pengemis',
];

foreach ($kategori_list as $key => $label):
    $first_shown = false;
    $total = 0;
    $no = 1;
?>

    <?php foreach ($models as $model): ?>
        <?php if ($model->$key == 1): ?>
            <?php if (!$first_shown): // Cetak header kategori hanya sekali ?>
                <tr>
                    <td colspan="15" style="background-color: #d9edf7; font-weight: bold; text-align: left;">
                        <?= $label ?>
                    </td>
                </tr>
                <?php $first_shown = true; ?>
            <?php endif; ?>

            <tr>
                <td style="text-align: center;"><?= $no++ ?></td>
                <td><?= Html::encode($model->nama) ?></td>
                <td><?= Html::encode($model->nik) ?></td>
                <td><?= Html::encode($model->jenis_kelamin) ?></td>
                <td><?= Html::encode($model->tempat_lahir) ?>, <?= Html::encode($model->tanggal_lahir) ?></td>
                <td><?= Html::encode($model->alamat) ?></td>
                <td>-</td>
                <td>-</td>
                <td><?php //Html::encode($model->kecamatan) ?></td>
                <td><?php //Html::encode($model->kelurahan) ?></td>
                <td><?php //Html::encode($model->jenis_ppks_fix) ?></td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
            </tr>
            <?php $total++; ?>
        <?php endif; ?>
    <?php endforeach; ?>

    <?php if (!$first_shown): // Jika tidak ada data dalam kategori ?>
        <tr>
            <td colspan="15" style="text-align: left; font-weight: bold; color: red;">
                Tidak ada data untuk kategori <?= $label ?>
            </td>
        </tr>
    <?php else: ?>
        <tr>
            <td colspan="15" style="text-align: left; font-weight: bold; background-color: #f2f2f2;">
                Total <?= $label ?>: <?= $total ?>
            </td>
        </tr>
    <?php endif; ?>

<?php endforeach; ?>
