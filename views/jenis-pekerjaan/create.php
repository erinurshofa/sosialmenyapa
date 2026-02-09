<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\JenisPekerjaan */

$this->title = 'Create Jenis Pekerjaan';
$this->params['breadcrumbs'][] = ['label' => 'Jenis Pekerjaans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jenis-pekerjaan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
