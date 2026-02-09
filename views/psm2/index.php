<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\Psm2Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Psm2s';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-navy box-solid" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
    <div class="box-header bg-navy p-2">
        <i class="fa fa-fw fa-book"></i>
        <strong><?= Html::encode($this->title) ?></strong>
    </div>
    <div class="box-body p-2">

<div class="psm2-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('INPUT PSM2', ['create'], ['class' => 'btn bg-navy']) ?>
    </p>
<div class="table-responsive">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'nik',
            'nama',
            'tempat_lahir',
            'tanggal_lahir',
            'jenis_kelamin',
            'jalan',
            'rt',
            'rw',
            'provinsi_id',
            'kota_id',
            'kecamatan_id',
            'kelurahan_id',
            'user_id',
            //'login_terakhir',
            //'created_at',
            //'updated_at',
            'no_rekening',
            'nama_pemilik',
            'nama_bank',
            'no_hp',
            //'no_sertifikat',
            //'tanggal_sertifikat',
            //'file_sertifikat',
            //'file_sk_walikota',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    </div>
</div>
    </div>
    </div>
