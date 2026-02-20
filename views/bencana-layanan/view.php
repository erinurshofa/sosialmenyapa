<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\BencanaLayanan $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Bencana Layanans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box box-navy box-solid mt-2" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
    <div class="box-header bg-navy p-2">
        <i class="fa fa-fw fa-book"></i>
        <strong><?= Html::encode($this->title) ?></strong>
    </div>
    <div class="box-body p-2">
        <div class="bencana-layanan-view">

            <h1><?= Html::encode($this->title) ?></h1>

            <p>
                <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
            </p>

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
            'bencana_id',
            'nama',
            'jenis_kelamin',
            'nik',
            'alamat:ntext',
            'jenis_layanan_id',
            'jenis_permakanan_id',
            'created_at',
                ],
            ]) ?>

        </div>
    </div>
</div>
