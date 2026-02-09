<?php

use app\models\SantunanDisabilitas;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\SantunanDisabilitasSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Santunan Disabilitas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-navy box-solid mt-2" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
    <div class="box-header bg-navy p-2">
        <i class="fa fa-fw fa-book"></i>
        <strong><?= Html::encode($this->title) ?></strong>
    </div>
    <div class="box-body p-2">
        <div class="santunan-disabilitas-index">

            <p>
                <?= Html::a('INPUT Santunan Disabilitas', ['create'], ['class' => 'btn bg-navy']) ?>
            </p>

                            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        
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
            //'jenis_kelamin',
            //'umur',
            //'alamat:ntext',
            //'kecamatan_id',
            //'kecamatan_nama',
            //'kelurahan_id',
            //'kelurahan_nama',
            //'no_dtks',
            //'dtks',
            //'jenis_disabilitas',
            //'jenis_alat_bantu',
            //'no_kk',
            //'nik_pemohon',
            //'nama_pemohon',
            //'no_hp_pemohon',
            //'hubungan_pemohon',
            //'alamat_pemohon:ntext',
            //'kecamatan_id_pemohon',
            //'kecamatan_nama_pemohon',
            //'kelurahan_id_pemohon',
            //'kelurahan_nama_pemohon',
            //'tanggal_permohonan',
            //'foto_ktp',
            //'foto_kk',
            //'foto_surat_permohonan',
            //'foto_surat_pengantar',
            //'foto',
            //'foto_id_dtks',
            //'foto_tes_bera',
            //'created_at',
            //'updated_at',
            //'deleted_at',
                    [
                        'class' => ActionColumn::className(),
                        'urlCreator' => function ($action, SantunanDisabilitas $model, $key, $index, $column) {
                            return Url::toRoute([$action, 'id' => $model->id]);
                        }
                    ],
                ],
            ]); ?>
        
        
        </div>
    </div>
</div>