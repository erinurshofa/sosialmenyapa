<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\StatusKematianSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Status Kematians';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="status-kematian-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Status Kematian', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nik',
            'no_kk',
            'status',
            'keterangan',
            //'nilai_bantuan',
            //'username',
            //'updater',
            //'created',
            //'updated',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
