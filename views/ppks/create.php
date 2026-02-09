<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Ppks */

$this->title = 'Create Ppks';
$this->params['breadcrumbs'][] = ['label' => 'Ppks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ppks-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
