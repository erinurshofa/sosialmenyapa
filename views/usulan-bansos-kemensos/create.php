<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UsulanBansosKemensos */

$this->title = 'Input Usulan Bansos Kemensos';
$this->params['breadcrumbs'][] = ['label' => 'Data Usulan Bansos Kemensos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
  <div class="col-md-12">
    <div class="box box-success box-solid">
	    <div class="box-header bg-green">
			<i class="fa fa-fw fa-book"></i>
	    	<strong><?= Html::encode($this->title) ?></strong>
	    </div>
	    <div class="box-body">
	        <div class="table-responsive">
				<?= $this->render('_form', [
				        'model' => $model,
				    ]) ?>
			</div>
	    </div>
    </div>
  </div>
</div>