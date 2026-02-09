<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\KelayakanDtks */

$this->title = 'Update Usulan Dtks Kemensos: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Usulan Dtks Kemensos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="usulan-dtks-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
