<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Konfirmasi Pemutakhiran Status PPKS';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ppks-konfirmasi-mutakhir pb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary box-solid" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                <div class="box-header bg-primary">
                    <h3 class="box-title"><i class="fa fa-check-square-o"></i> <?= Html::encode($this->title) ?></h3>
                </div>
                <div class="box-body p-2">
                    <div class="table-responsive">
                        <?= GridView::widget([
                            'dataProvider' => $dataProvider,
                            'rowOptions' => function($model){
                                if($model->status_pengajuan == 'DISETUJUI'){
                                    return ['class' => 'success'];
                                }elseif($model->status_pengajuan == 'DITOLAK'){
                                    return ['class' => 'danger'];
                                }
                                return ['class' => 'warning'];
                            },
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],
                                [
                                    'attribute' => 'ppks_id',
                                    'label' => 'PPKS',
                                    'value' => function($model){
                                        return $model->ppks ? $model->ppks->nama . ' ('.$model->ppks->nik.')' : '-';
                                    }
                                ],
                                'status_sebelumnya',
                                [
                                    'attribute' => 'status_baru',
                                    'format' => 'raw',
                                    'value' => function($data){
                                        return '<b>' . $data->status_baru . '</b>';
                                    }
                                ],
                                [
                                    'attribute' => 'dokumen_pendukung',
                                    'format' => 'raw',
                                    'value' => function($data){
                                        if($data->dokumen_pendukung){
                                            return Html::a('<i class="fa fa-download"></i> Unduh/Lihat', Yii::getAlias('@web').'/uploads/mutakhir/'.$data->dokumen_pendukung, ['target' => '_blank', 'class' => 'btn btn-default btn-xs', 'data-pjax'=>"0"]);
                                        }
                                        return '-';
                                    }
                                ],
                                [
                                    'attribute' => 'status_pengajuan',
                                    'format' => 'raw',
                                    'value' => function($data){
                                        if($data->status_pengajuan == 'MENUNGGU KONFIRMASI') {
                                            return '<span class="label label-warning"><i class="fa fa-clock-o"></i> ' . $data->status_pengajuan . '</span>';
                                        } elseif($data->status_pengajuan == 'DISETUJUI') {
                                            return '<span class="label label-success"><i class="fa fa-check"></i> ' . $data->status_pengajuan . '</span>';
                                        } else {
                                            return '<span class="label label-danger"><i class="fa fa-times"></i> ' . $data->status_pengajuan . '</span><br><small>Alasan: '.$data->keterangan_penolakan.'</small>';
                                        }
                                    }
                                ],
                                'created_at',
                                [
                                    'class' => 'yii\grid\ActionColumn',
                                    'header' => 'Aksi',
                                    'template' => '{setujui} {tolak}',
                                    'buttons' => [
                                        'setujui' => function ($url, $model) {
                                            if($model->status_pengajuan == 'MENUNGGU KONFIRMASI') {
                                                return Html::a('<i class="fa fa-check"></i> Setujui', ['setujui-mutakhir', 'id' => $model->id], [
                                                    'class' => 'btn btn-success btn-xs',
                                                    'data' => [
                                                        'confirm' => 'Anda yakin menyetujui perubahan status PPKS ini menjadi '.$model->status_baru.'?',
                                                        'method' => 'post',
                                                    ],
                                                ]);
                                            }
                                            return '';
                                        },
                                        'tolak' => function ($url, $model) {
                                            if($model->status_pengajuan == 'MENUNGGU KONFIRMASI') {
                                                return Html::button('<i class="fa fa-times"></i> Tolak', [
                                                    'class' => 'btn btn-danger btn-xs btn-tolak',
                                                    'data-id' => $model->id,
                                                    'data-toggle' => 'modal',
                                                    'data-target' => '#modalTolak'
                                                ]);
                                            }
                                            return '';
                                        },
                                    ],
                                ],
                            ],
                        ]); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tolak -->
<div class="modal fade" id="modalTolak" tabindex="-1" role="dialog" aria-labelledby="modalTolakLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="formTolak" method="POST" action="">
          <div class="modal-header bg-danger">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="modalTolakLabel"><i class="fa fa-ban"></i> Tolak Pengajuan Pemutakhiran</h4>
          </div>
          <div class="modal-body">
             <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>" />
             <div class="form-group">
                 <label>Keterangan / Alasan Penolakan <span class="text-danger">*</span></label>
                 <textarea name="keterangan_penolakan" class="form-control" rows="3" required placeholder="Sebutkan kenapa pengajuan ini ditolak (misal: dokumen kurang jelas)..."></textarea>
             </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-danger"><i class="fa fa-times"></i> Tolak Pengajuan</button>
          </div>
      </form>
    </div>
  </div>
</div>

<?php
$urlTolakBase = Url::to(['tolak-mutakhir']);
$script = <<< JS
    $('.btn-tolak').on('click', function(){
        var id = $(this).data('id');
        $('#formTolak').attr('action', '$urlTolakBase' + '?id=' + id);
    });
JS;
$this->registerJs($script);
?>
