<?php

use app\models\BencanaKorbanIndividu;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\BencanaKorbanIndividuSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Bencana Korban Individus';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-navy box-solid mt-2" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
    <div class="box-header bg-navy p-2">
        <i class="fa fa-fw fa-book"></i>
        <strong><?= Html::encode($this->title) ?></strong>
    </div>
    <div class="box-body p-2">
        <div class="bencana-korban-individu-index">

            <p>
                <?= Html::a('INPUT Bencana Korban Individu', ['create'], ['class' => 'btn bg-navy']) ?>
            </p>

                            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        
                    <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
        'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
            'bencana_id',
            'nama',
            'nik',
            'jenis_kelamin',
            //'kategori_korban_id',
            //'alamat:ntext',
            //'created_by',
            //'created_at',
            'status_akhir',
                    [
                        'class' => ActionColumn::className(),
                        'template' => '{view} {update} {delete} {verifikasi} {validasi} {approve}',
                        'buttons' => [
                            'verifikasi' => function ($url, $model) {
                                if (!\Yii::$app->user->isGuest && \Yii::$app->user->identity->role == 'kelurahan' && ($model->status_akhir == 'Input' || $model->status_akhir == null)) {
                                    return Html::a('<span class="fa fa-check"></span> Verifikasi', ['verifikasi', 'id' => $model->id], [
                                        'class' => 'btn btn-xs btn-success',
                                        'data' => [
                                            'confirm' => 'Apakah anda yakin ingin memverifikasi data ini?',
                                            'method' => 'post',
                                        ],
                                    ]);
                                }
                                return '';
                            },
                            'validasi' => function ($url, $model) {
                                if (!\Yii::$app->user->isGuest && \Yii::$app->user->identity->role == 'kecamatan' && $model->status_akhir == 'Verifikasi') {
                                    return Html::a('<span class="fa fa-check"></span> Validasi', ['validasi', 'id' => $model->id], [
                                        'class' => 'btn btn-xs btn-warning',
                                        'data' => [
                                            'confirm' => 'Apakah anda yakin ingin memvalidasi data ini?',
                                            'method' => 'post',
                                        ],
                                    ]);
                                }
                                return '';
                            },
                            'approve' => function ($url, $model) {
                                if (!\Yii::$app->user->isGuest && \Yii::$app->user->identity->role == 'dinsos' && $model->status_akhir == 'Validasi') {
                                    return Html::a('<span class="fa fa-check"></span> Approve', ['approve', 'id' => $model->id], [
                                        'class' => 'btn btn-xs btn-primary',
                                        'data' => [
                                            'confirm' => 'Apakah anda yakin ingin menyetujui data ini?',
                                            'method' => 'post',
                                        ],
                                    ]);
                                }
                                return '';
                            },
                        ],
                        'urlCreator' => function ($action, BencanaKorbanIndividu $model, $key, $index, $column) {
                            return Url::toRoute([$action, 'id' => $model->id]);
                        }
                    ],
                ],
            ]); ?>
        
        
        </div>
    </div>
</div>