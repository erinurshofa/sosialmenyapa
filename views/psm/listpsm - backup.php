<?php
use yii\helpers\Html;
use app\models\Kecamatan;
use app\models\Kelurahan;
/* @var $this yii\web\View */
/* @var $data app\models\Users[] */

$this->title = 'Daftar PSM Belum Aktif';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="users-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (!empty($data)) : ?>
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Kecamatan</th>
                    <th>Kelurahan</th>
                    <th>Tanggal Daftar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $index => $user): ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= Html::encode($user->nama_lengkap) ?></td>
                        <td><?= Html::encode($user->email) ?></td>
                        <td><?= Html::encode(Kecamatan::find()->where(['id_lama'=>$user->kecamatan_id])->one()->nama) ?></td>
                        <td><?= Html::encode(Kelurahan::find()->where(['kelurahan_id'=>$user->kelurahan_id])->one()->nama) ?></td>
                        <td><?= Yii::$app->formatter->asDate($user->created_at) ?></td>
                        <td>
                            <?= Html::a('Lihat', ['users/view', 'id' => $user->id], ['class' => 'btn btn-sm btn-primary']) ?>
                            <?= Html::a('Aktifkan', ['users/activate', 'id' => $user->id], [
                                'class' => 'btn btn-sm btn-success',
                                'data' => [
                                    'confirm' => 'Yakin ingin mengaktifkan akun ini?',
                                    'method' => 'post',
                                ],
                            ]) ?>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="alert alert-info">
            Tidak ada PSM dengan status <strong>Belum Aktif</strong>.
        </div>
    <?php endif; ?>
</div>
