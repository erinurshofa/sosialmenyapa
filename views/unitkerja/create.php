<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Unitkerja */

$this->title = 'Tambah Unitkerja';
$this->params['breadcrumbs'][] = ['label' => 'Daftar Unit Kerja', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="unitkerja-create">

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
