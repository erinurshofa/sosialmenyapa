<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Psm2 */

$this->title = 'INPUT Psm2';
$this->params['breadcrumbs'][] = ['label' => 'Psm2s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-navy box-solid" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
    <div class="box-header bg-navy">
        <i class="fa fa-fw fa-book"></i>
        <strong><?= Html::encode($this->title) ?></strong>
    </div>
    <div class="box-body">
<div class="psm2-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
    </div>
    </div>
