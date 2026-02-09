<?php

use yii\helpers\Html;
use app\models\Kecamatan;
use app\models\Kelurahan;
/* @var $this yii\web\View */
/* @var $model app\models\StatusKematian */

$this->title = 'Update Status Kematian';
$this->params['breadcrumbs'][] = ['label' => 'Status Kematians', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="status-kematian-create">

    <!-- <h1><?php //Html::encode($this->title) ?></h1> -->
<div class="row">
  <div class="col-md-4">
    <div class="box box-success box-solid">
    <div class="box-header bg-green">
    <strong><?= Html::encode($this->title) ?></strong>
    </div>
      <div class="box-body">
      <?=Html::a('<i class="fa fa-fw fa-backward"></i>Kembali', Yii::$app->request->referrer, ['class' => 'btn btn-danger']);?>
    <table class="table table hover">
            <tr>
        <td>IDBDT</td>
        <td>:</td>
        <td><?=$bdtart->IDBDT?></td>
    </tr>
    <tr>
        <td>Nama</td>
        <td>:</td>
        <td><?=$bdtart->Nama?></td>
    </tr>
            <tr>
        <td>Jenis Kelamin</td>
        <td>:</td>
        <td><?=$bdtart->JnsKel?></td>
    </tr>
        <tr>
        <td>Kecamatan</td>
        <td>:</td>
        <td><?=Kecamatan::find()->where(['KodeKecamatan'=>$bdtart->KDKEC])->one()->Nama?></td>
    </tr>
    <tr>
        <td>Kelurahan</td>
        <td>:</td>
        <td><?=Kelurahan::find()->where(['KodeKecamatan'=>$bdtart->KDKEC])->andWhere(['KodeKelurahan'=>$bdtart->KDDESA])->one()->Nama?></td>
    </tr>
</table>

    </div>
      </div>
    </div>
  <div class="col-md-8">
    <div class="box box-success box-solid">
    <div class="box-header bg-green">
    <strong><?= Html::encode($this->title) ?></strong>
    </div>
      <div class="box-body">
    <?= $this->render('_form', [
        'model' => $model,
        'nik'=>$nik,
    ]) ?>

    </div>
      </div>
    </div>
  </div>


</div>
