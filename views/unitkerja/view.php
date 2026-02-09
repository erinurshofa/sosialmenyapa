<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Unitkerja */

$this->title = $model->id_unitkerja;
$this->params['breadcrumbs'][] = ['label' => 'Unitkerjas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="unitkerja-view">
<div class="row">
  <div class="col-md-12">
    <div class="box box-success box-solid">
    <div class="box-header bg-green">
<i class="fa fa-fw fa-plus-square"></i>
    <strong><?= Html::encode($this->title) ?></strong>
    </div>
      <div class="box-body">
        <div class="table-responsive">

<p>
        <?= Html::a('<i class="fa fa-fw fa-edit"></i>Update', ['update', 'id' => $model->id_unitkerja], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('<i class="fa fa-fw fa-trash"></i>Delete', ['delete', 'id' => $model->id_unitkerja], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_unitkerja',
            'kd_unit_kerja',
            'nm_unit_kerja',
            'nama_penanggung_jawab',
            'no_telp',
            // 'kd_skpd',
            // 'flag',
        ],
    ]) ?>

    </div>
    </div>
      </div>
    </div>
  </div>



    

</div>
