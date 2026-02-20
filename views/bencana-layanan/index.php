<?php

use app\models\BencanaLayanan;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\BencanaLayananSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Bencana Layanans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-navy box-solid mt-2" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
    <div class="box-header bg-navy p-2">
        <i class="fa fa-fw fa-book"></i>
        <strong><?= Html::encode($this->title) ?></strong>
    </div>
    <div class="box-body p-2">
        <div class="bencana-layanan-index">

            <p>
                <?= Html::a('INPUT Bencana Layanan', ['create'], ['class' => 'btn bg-navy']) ?>
            </p>

                            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        
                    <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
        'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
            'bencana_id',
            'nama',
            'jenis_kelamin',
            'nik',
            //'alamat:ntext',
            //'jenis_layanan_id',
            //'jenis_permakanan_id',
            //'created_at',
                    [
                        'class' => ActionColumn::className(),
                        'urlCreator' => function ($action, BencanaLayanan $model, $key, $index, $column) {
                            return Url::toRoute([$action, 'id' => $model->id]);
                        }
                    ],
                ],
            ]); ?>
        
        
        </div>
    </div>
</div>