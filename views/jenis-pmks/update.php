<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\JenisPmks */

$this->title = 'EDIT Jenis Pmks: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Jenis Pmks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box box-navy box-solid" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
    <div class="box-header bg-navy p-2">
        <i class="fa fa-fw fa-book"></i>
        <strong><?= Html::encode($this->title) ?></strong>
    </div>
    <div class="box-body">
<div class="jenis-pmks-update p-2">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

    </div>
    </div>
