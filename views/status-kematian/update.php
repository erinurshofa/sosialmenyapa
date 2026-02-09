<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\StatusKematian */

$this->title = 'Update Status Kematian: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Status Kematians', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="status-kematian-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
