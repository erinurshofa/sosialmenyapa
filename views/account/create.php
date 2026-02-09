<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Account */

$this->title = 'Create Account';
$this->params['breadcrumbs'][] = ['label' => 'Accounts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
  <div class="col-md-12">
    <div class="box box-success box-solid">
        <div class="box-header bg-green">
            <strong><?= Html::encode($this->title) ?></strong>
        </div>
      <div class="box-body">
        <?= $this->render('_formcreate', [
            'model' => $model,
        ]) ?>
    </div>
        </div>
</div>
