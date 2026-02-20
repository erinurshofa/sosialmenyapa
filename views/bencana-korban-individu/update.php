<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\BencanaKorbanIndividu $model */

$this->title = 'Update Bencana Korban Individu: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Bencana Korban Individus', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box box-navy box-solid mt-2" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
    <div class="box-header bg-navy p-2">
        <i class="fa fa-fw fa-book"></i>
        <strong><?= Html::encode($this->title) ?></strong>
    </div>
    <div class="box-body p-2">
        <div class="bencana-korban-individu-update">

            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>

        </div>
    </div>
</div>