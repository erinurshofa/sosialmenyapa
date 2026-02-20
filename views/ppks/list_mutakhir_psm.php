<?php
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pemutakhiran Data PPKS';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ppks-list-mutakhir-psm pb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary box-solid" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                <div class="box-header bg-primary">
                    <i class="fa fa-refresh"></i>  <strong><?= Html::encode($this->title) ?></strong>
                </div>
                <div class="box-body p-2">
                    <p class="text-muted mb-3"><i class="fa fa-info-circle"></i> Pilih PPKS di bawah ini untuk mengajukan perubahan status (Meninggal Dunia, Mampu, Pindah).</p>

                    <form method="GET" action="" style="margin-bottom: 20px;">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Cari NIK atau Nama..." value="<?= Html::encode(Yii::$app->request->get('search')) ?>">
                            <span class="input-group-btn">
                                <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i> Cari</button>
                            </span>
                        </div>
                    </form>

                    <div class="table-responsive">
                        <?= GridView::widget([
                            'dataProvider' => $dataProvider,
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],
                                'nik',
                                'nama',
                                'alamat',
                                'jenis_ppks_fix',
                                [
                                    'attribute' => 'status',
                                    'label' => 'Status Aktif',
                                    'value' => function($data){
                                        return $data->status ? $data->status : 'AKTIF';
                                    }
                                ],
                                [
                                    'class' => 'yii\grid\ActionColumn',
                                    'template' => '{mutakhir}',
                                    'buttons' => [
                                        'mutakhir' => function ($url, $model) {
                                            $latest = \app\models\PpksMutakhirStatus::find()->where(['ppks_id'=>$model->id])->orderBy(['id'=>SORT_DESC])->one();
                                            if($latest && $latest->status_pengajuan == 'MENUNGGU KONFIRMASI'){
                                                return Html::a('<i class="fa fa-clock-o"></i> Menunggu Konfirmasi', ['form-mutakhir', 'id' => $model->id], [
                                                    'class' => 'btn btn-warning btn-xs',
                                                ]);
                                            }
                                            return Html::a('<i class="fa fa-pencil"></i> Ajukan Mutakhir', ['form-mutakhir', 'id' => $model->id], [
                                                'class' => 'btn btn-primary btn-xs',
                                            ]);
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
