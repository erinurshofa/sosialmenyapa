<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Unitkerja */

$this->title = 'Tambah Unitkerja';
$this->params['breadcrumbs'][] = ['label' => 'Unitkerjas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="unitkerja-create">

    <h1><?php //Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
