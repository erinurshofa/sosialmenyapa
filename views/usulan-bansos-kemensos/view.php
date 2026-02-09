<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Account;
/* @var $this yii\web\View */
/* @var $model app\models\UsulanBansosKemensos */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Data Usulan Bansos Kemensos', 'url' => ['listdata']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="row">
  <div class="col-md-12">
    <div class="box box-success box-solid">
        <div class="box-header bg-green">
            <i class="fa fa-fw fa-book"></i>
            <strong><?= Html::encode($this->title) ?></strong>
        </div>
        <div class="box-body">
    <p>
        <?php //Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php //Html::a('Delete', ['delete', 'id' => $model->id], [
        //     'class' => 'btn btn-danger',
        //     'data' => [
        //         'confirm' => 'Are you sure you want to delete this item?',
        //         'method' => 'post',
        //     ],
        // ]) ?>
    </p>

            <div class="table-responsive">
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                    'id',
                    'nik',
                    'program_bansos',
                    'no_kk',
                    'nama',
                    'tempat_lahir',
                    'tanggal_lahir',
                    'ibu_kandung',
                    'jenis_kelamin',
                    'jenis_pekerjaan',
                    'status_kawin',
                    'alamat',
                    'rt',
                    'rw',
                    'provinsi',
                    'kabupaten',
                    [
                        'attribute'=>'kecamatan',
                        'label'=>'KECAMATAN',

                    ],
                    [
                        'attribute'=>'kelurahan',
                        'label'=>'KELURAHAN',
                    ],
                    [
                        'label'=>'Petugas Input',
                        'attribute'=>'username',
                    ],
                    [
                        'label'=>'Nama OPD',
                        'attribute'=>'username',
                        'filter'=>'',
                        'value'=>function($model){
                            return Account::find()->where(['username'=>$model->username])->one()->nama_opd;
                        },
                    ],
                    'kecamatan_yg_menyetujui',
                    'kode_kecamatan',
                    'nama_kecamatan',
                    'created',
                    'updated',
                    ],
                ]) ?>
            </div>
        </div>
    </div>
  </div>
</div>