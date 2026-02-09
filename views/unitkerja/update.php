<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Unitkerja */

$this->title = 'Update Unitkerja: ' . $model->id_unitkerja;
$this->params['breadcrumbs'][] = ['label' => 'Unitkerjas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_unitkerja, 'url' => ['view', 'id' => $model->id_unitkerja]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="unitkerja-update">
<div class="row">
  <div class="col-md-12">
    <div class="box box-success box-solid">
    <div class="box-header bg-green">
<i class="fa fa-fw fa-book"></i>
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
