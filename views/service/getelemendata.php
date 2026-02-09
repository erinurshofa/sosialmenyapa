<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UnitkerjaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Elemen Data';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="elemendata-index">

<select name="per1" id="per1">
  <option selected="selected">Choose one</option>
  <?php
    foreach($data as $value) { ?>
      <option value="<?= $value->id ?>"><?= $value->elemen_data.' - '.$value->urusan ?></option>
  <?php
    } ?>
</select> 
</div>
