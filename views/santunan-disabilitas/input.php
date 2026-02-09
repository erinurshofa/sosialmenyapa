<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\SantunanDisabilitas $model */

$this->title = 'Input Santunan Disabilitas';
$this->params['breadcrumbs'][] = ['label' => 'Data Santunan Disabilitas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-navy box-solid mt-2" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
    <div class="box-header bg-navy p-2">
        <i class="fa fa-fw fa-book"></i>
        <strong><?= Html::encode($this->title) ?></strong>
    </div>
    <div class="box-body p-2">
        <div class="santunan-disabilitas-input">

            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>

        </div>
    </div>
</div>
