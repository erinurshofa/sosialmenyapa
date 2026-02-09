<?php
use yii\widgets\DetailView;
use app\models\Ppks;

/* @var $this yii\web\View */
/* @var $model app\models\RekapPbiKecamatan */


// $this->params['breadcrumbs'][] = ['label' => 'Rekap Pbi Kecamatans', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
$model=@Ppks::findOne($id);
// $this->title = $model->id;
\yii\web\YiiAsset::register($this);
?>

        <div class="modal-header">
          <h4 class="modal-title" id="document_name">Data PPKS <?= $model->nama ?></h4>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        <div class="modal-body">
        <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nama',
            'nik',
            'alamat',
            'kecamatan',
            'kelurahan',
            'status_verifikasi',
            'tanggal_verifikasi',
            'keterangan_verifikasi',
            'status_validasi',
            'approved',
            'diverifikasi',
            'dibuat',
            'created_at',
            'updated_at',
        ],
    ]) ?>
          </div>
        <div class="modal-footer">

          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        </div>
