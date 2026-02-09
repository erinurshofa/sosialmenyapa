<?php

use app\models\Kegiatan;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\KegiatanSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Kegiatans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-navy box-solid mt-2" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
    <div class="box-header bg-navy p-2">
        <i class="fa fa-fw fa-book"></i>
        <strong><?= Html::encode($this->title) ?></strong>
    </div>
    <div class="box-body p-2">
        <div class="kegiatan-index">

            <p>
                <?= Html::a('INPUT Kegiatan', ['create'], ['class' => 'btn bg-navy']) ?>
            </p>

                            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        
                    <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
        'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
            'judul',
            'lokasi',
            'tanggal',
            'bidang',
            //'nama_dinas',
            //'internal_dinas',
            //'created_at',
            //'updated_at',
            //'deleted_at',
            //'kategori_id',
            //'penyelenggara:ntext',
            //'keterangan:ntext',
                    [
                        'class' => ActionColumn::className(),
                        'urlCreator' => function ($action, Kegiatan $model, $key, $index, $column) {
                            return Url::toRoute([$action, 'id' => $model->id]);
                        }
                    ],
                ],
            ]); ?>
        
        
        </div>
    </div>
</div>