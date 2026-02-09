<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\StatusKematian */

$this->title = 'Create Status Kematian';
$this->params['breadcrumbs'][] = ['label' => 'Status Kematians', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="status-kematian-create">

    <!-- <h1><?php //Html::encode($this->title) ?></h1> -->
<div class="row">
  <div class="col-md-12">
    <div class="box box-success box-solid">
    <div class="box-header bg-green">
    <strong><?= Html::encode($this->title) ?></strong>
    </div>
      <div class="box-body">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    </div>
      </div>
    </div>
  </div>


</div>
