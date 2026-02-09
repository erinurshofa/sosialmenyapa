<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UsulanDtksKemensos */

$this->title = 'Create Usulan Dtks Kemensos';
$this->params['breadcrumbs'][] = ['label' => 'Usulan Dtks Kemensos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usulan-dtks-kemensos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
