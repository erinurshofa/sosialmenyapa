<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Unitkerja */

$this->title = $model->id_unitkerja;
$this->params['breadcrumbs'][] = ['label' => 'Unitkerjas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="unitkerja-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_unitkerja], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_unitkerja], [
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
            'id_unitkerja',
            'kd_unit_kerja',
            'nm_unit_kerja',
            'nama_penanggung_jawab',
            'no_telp',
            'kd_skpd',
            'flag',
        ],
    ]) ?>

</div>
