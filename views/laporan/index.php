<?php
use yii\helpers\Html;
// use yii\grid\GridView;
use kartik\grid\GridView;
use app\models\Bdtart;
use app\models\Actions;
use yii\widgets\Dropdown;
use app\models\Bdtrt;
use app\models\DetailPenerimaBantuan;
use app\models\Bantuan;
use app\models\Kecamatan;
use app\models\Kelurahan;
use app\models\Districts;
use app\models\Villages;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $searchModel app\models\BdtartSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'DATA DTKS';
$this->params['breadcrumbs'][] = $this->title;
/* @var $this yii\web\View */
?>
<div class="row">
  <div class="col-md-12">
    <div class="box">
    <!-- <div class="box-header"> -->
    <!-- <strong><?php //Html::encode($this->title) ?></strong> -->
    <!-- </div> -->
      <div class="box-body">
        <?php echo Actions::tampilFilterKecamatan3();?>
    </div>
      </div>
    </div>
  </div>


<div class="row">
  <div class="col-md-12">
    <div class="box box-success box-solid">
    <div class="box-header bg-green">
    <strong><?= Html::encode($this->title) ?> - Kecamatan : ## Kelurahan : ##</strong>
    </div>
      <div class="box-body">
        <div class="table-responsive">
<?php if (Yii::$app->user->identity->role=='admin'): ?>
<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'IDBDT',
            'Nama',
            'NIK',
            'NoKK',
            [
                'label'=>'Kecamatan',
                'attribute'=>'KDKEC',
                //KDKEC
                'filter' => $listDistrics,
                    'filterType' => GridView::FILTER_SELECT2,
                    'filterWidgetOptions' => [
                        'options' => ['prompt' => ''],
                        'pluginOptions' => [
                            'allowClear' => true,
                            // 'width'=>'resolve'
                        ],
                    ],
                'format' => 'html',
                //'value'=>function($model){return $model->kecamatan->Nama;}
                 'value'=>function($model) { return Actions::getKecamatan($model->KDKEC)['Nama']; }
            ],
            [
                'label'=>'Kelurahan',
                'attribute'=>'KDDESA',
                'filter'=>'',
                // 'filter' => $listVillage,
                //     'filterType' => GridView::FILTER_SELECT2,
                //     'filterWidgetOptions' => [
                //         'options' => ['prompt' => ''],
                //         'pluginOptions' => [
                //             'allowClear' => true,
                //             // 'width'=>'resolve'
                //         ],
                //     ],
                'format' => 'html',
                //'value'=>function($model){return $model->kelurahan->Nama;}
                // /KDDESA
                // 'format' => 'html',
                 'value'=>function($model) { return Actions::getKelurahan($model->KDKEC,$model->KDDESA)['Nama']; }
            ],
            [
                'label'=>'Alamat',
                'attribute'=>'bdtrt.Alamat',
                'filter'=>'',
  
            ],
              [
                'label'=>'Jenis Kelamin',
                'attribute'=>'JnsKel',
                'filter'=>[
                            'Laki-Laki'=>'Laki-Laki',
                            'Perempuan'=>'Perempuan',
                        ],                
                'format' => 'html',
                //'value'=>function($model){return $model->kelurahan->Nama;}
                // /KDDESA
                // 'format' => 'html',
                 'value'=>function($model) { return $model->JnsKel; }
            ],
             [
                'label'=>'Percentile',
                'attribute'=>'percentile',
                'filter'=>[
                            ''=>'SEMUA',
                            'desil1'=>'desil 1',
                            'desil2'=>'desil 2',
                            'desil3'=>'desil 3',
                            'desil4'=>'desil 4',
                        ],
                'format' => 'html',
                'value'=>function($model) { 
                    $coba =Bdtrt::findOne($model->IDBDT);
                    return $coba->percentile; 
                }
            ],
            [
                'label'=>'Kepesertaan',
                'attribute'=>'kepesertaan',
                'filter'=>[
                    ''=>'semua',
                    'tidakpunya'=>'tidak memiliki bantuan',
                    'bpntplus'=>'bpnt',
                    'bpnt'=>'bpnt saja',
                    'bpntkip'=>'bpnt dan kip',
                    'bpntkis'=>'bpnt dan jkn/kis',
                    'bpntkiskip'=>'bpnt , jkn/kis dan kip',
                    'pkhplus'=>'pkh',
                    'pkh'=>'pkh saja',
                    'pkhkip'=>'pkh dan kip',
                    'pkhkis'=>'pkh dan jkn/kis',
                    'pkhbpnt'=>'pkh dan bpnt',
                    'pkhkiskip'=>'pkh, jkn/kis dan kip',
                    'pkhbpntkip'=>'pkh, bpnt dan kip',
                    'pkhbpntkis'=>'pkh, bpnt dan jkn/kis',
                    'jknkisplus'=>'jkn/kis',
                    'jknkis'=>'jkn/kis saja',
                    'jknkip'=>'jkn/kis dan kip',
                    'kipplus'=>'kip',
                    'kip'=>'kip saja',
                    'semua'=>'memiliki semua kepesertaan',
                    ],
                'format' => 'html',
                'value'=>function($model) {
                    $tampil=''; 
                    $bpnt=0;
                    $nomorbpnt=0;
                    $pkh=0;
                    $nomorpkh=0;
                    $kis=0;
                    $nomorkis=0;
                    $kip=0;
                    $nomorkip=0;
		
                    if (@$model->bdtrt->sta_kks==="Ya") {
                        $bpnt=1;
                        if (isset($model->NoPesertaKKS2016) && $model->NoPesertaKKS2016 ==="") {
                            //status ya tidak ada nomor {masalah}
                            // $tampil.='<strong style="color:red;">bpnt: '.$model->NoPesertaKKS2016.'</strong>
                            $tampil.='<strong>bpnt: '.$model->NoPesertaKKS2016.'</strong>
                              <small>status bpnt iya tetapi tidak memiliki nomor</small>
                            <br>';
                        }else{
                            //ada nomor dan status ya
                            $tampil.='bpnt :'.$model->NoPesertaKKS2016.'<br>';
                            $nomorbpnt=1;
                        }
                    }


                    if (@$model->bdtrt->sta_kks==="Ya+") {
                        $bpnt=1;
                        if (isset($model->NoPesertaKKS2016) && $model->NoPesertaKKS2016 ==="") {
                            //status ya tidak ada nomor {masalah}
                            $tampil.='<strong>bpnt: '.$model->NoPesertaKKS2016.'</strong>
                              <small>status bpnt iya tetapi tidak memiliki nomor</small>
                            <br>';
                        }else{
                            //ada nomor dan status ya+
                            $tampil.='<strong>bpnt :'.$model->NoPesertaKKS2016.'</strong><br>';
                            $nomorbpnt=1;
                        }
                    }
                    
                    if (@$model->bdtrt->sta_pkh==="Ya") {
                        $pkh=1;
                        if (isset($model->NoPesertaPKH) && $model->NoPesertaPKH ==="") {
                             //status ya tidak ada nomor {masalah}
                             $tampil.='<strong>pkh :'.$model->NoPesertaPKH.'</strong>
                              <small>status pkh iya tetapi tidak memiliki nomor</small>
                            <br>';
                        }else{
                            //ada nomor dan status ya
                            $tampil.='pkh :'.$model->NoPesertaPKH.'<br>';
                            $nomorpkh=1;
                        }  
                    }
                     if (@$model->bdtrt->sta_pkh==="Ya+") {
                        $pkh=1;
                        if (isset($model->NoPesertaPKH) && $model->NoPesertaPKH ==="") {
                             //status ya tidak ada nomor {masalah}
                             $tampil.='<strong>pkh :'.$model->NoPesertaPKH.'</strong>
                              <small>status pkh iya tetapi tidak memiliki nomor</small>
                            <br>';
                        }else{
                            //ada nomor dan status ya
                            $tampil.='<strong>pkh :'.$model->NoPesertaPKH.'</strong><br>';
                            $nomorpkh=1;
                        }  
                    }
                    if (@$model->bdtrt->sta_kis==="Ya") {
                        $kis=1;
                        if (isset($model->NoPesertaPBI) && $model->NoPesertaPBI ==="") {
                            //status ya tidak ada nomor {masalah}
                            $tampil.='<strong>jkn/kis :'.$model->NoPesertaPBI.'</strong>
                              <small>status jknkis iya tetapi tidak memiliki nomor</small>
                            <br>';
                        }else{
                            //ada nomor dan status ya
                            $tampil.='jkn/kis :'.$model->NoPesertaPBI.'<br>';
                            $nomorkis=1;
                        }
                    }
                    if (@$model->bdtrt->sta_kis==="Ya+") {
                        $kis=1;
                        if (isset($model->NoPesertaPBI) && $model->NoPesertaPBI ==="") {
                            //status ya tidak ada nomor {masalah}
                            $tampil.='<strong>jkn/kis :'.$model->NoPesertaPBI.'</strong>
                              <small>status jknkis iya tetapi tidak memiliki nomor</small>
                            <br>';
                        }else{
                            //ada nomor dan status ya
                            $tampil.='<strong>jkn/kis :'.$model->NoPesertaPBI.'</strong><br>';
                            $nomorkis=1;
                        }
                    }
                    if (@$model->bdtrt->sta_kip==="Ya") {
                        $kip=1;
                        if (isset($model->bdtrt->PesertaKIP) && $model->bdtrt->PesertaKIP ==="" || $model->bdtrt->PesertaKIP === '0') {
                            //status ya tidak ada nomor atau 0 {masalah}
                            $tampil.='kip :'.$model->bdtrt->PesertaKIP.'
                              <small>status kip iya tetapi tidak memiliki nomor</small>
                            <br>';
                        }else{
                            //ada nomor dan status ya
                            $tampil.='kip :'.$model->bdtrt->PesertaKIP.'<br>';
                            $nomorkip=1;
                        }                                                                                                            
                    }
                    $bt = array("bpnt", "pkh", "jkn/kis", "kip");
                    $detail =DetailPenerimaBantuan::find()->where(['nik' => $model->NIK])->all();
                    foreach ($detail as $key => $value) {
                        if (isset($value)) {
                            $singkat =Bantuan::findOne($value->id_bantuan)->singkatan_jenis_bantuan;
                            if(strtolower($singkat)==='bpnt' && $bpnt===0 || strtolower($singkat)==='pkh' && $pkh===0|| strtolower($singkat)==='jkn/kis' && $kis===0|| strtolower($singkat)==='kip' && $kip===0){
                                $tampil.='<strong>'.strtolower($singkat).' : '.$value['nomor_bantuan'].'</strong><br>';
                            }

                            if (!in_array(strtolower($singkat), $bt)) {
                                $tampil.='<strong>'.strtolower($singkat).' : '.$value['nomor_bantuan'].'</strong><br>';
                            }
                        }
                    }
                        return $tampil;
                }
            ],
            // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php endif ?>
<?php if (Yii::$app->user->identity->role=='opd'): ?>
<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'IDBDT',
            'Nama',
            'NIK',
            'NoKK',
            [
                'label'=>'Kecamatan',
                'attribute'=>'kecamatanNama',
                'filter'=>'',
                'format' => 'html',
                'value'=>function($model){return $model->kecamatan->Nama;}
                // 'filter'=>ArrayHelper::map(Kecamatan::find()->asArray()->all(), 'KodeKecamatan', 'Nama'),
                // 'format' => 'html',
                // 'value'=>function($model) { return Actions::getKecamatan($model->KDKEC)['Nama']; }
            ],
            [
                'label'=>'Kelurahan',
                'attribute'=>'kelurahanNama',
                'filter'=>'',
                'format' => 'html',
                'value'=>function($model){return $model->kelurahan->Nama;}
                // 'format' => 'html',
                // 'value'=>function($model) { return Actions::getKelurahan($model->KDKEC,$model->KDDESA)['Nama']; }
            ],
            [
                'label'=>'Alamat',
                'attribute'=>'bdtrt.Alamat',
                'filter'=>'',
                // 'format' => 'html',
                // 'value'=>function($model) { 
                //     $coba =Bdtrt::findOne($model->IDBDT);
                //     return $coba->Alamat; 
                // }
            ],
             [
                'label'=>'Percentile',
                'attribute'=>'percentile',
                'filter'=>[
                            ''=>'SEMUA',
                            'desil1'=>'desil 1',
                            'desil2'=>'desil 2',
                            'desil3'=>'desil 3',
                            'desil4'=>'desil 4',
                        ],
                'format' => 'html',
                'value'=>function($model) { 
                    $coba =Bdtrt::findOne($model->IDBDT);
                    return $coba->percentile; 
                }
            ],
            [
                'label'=>'Kepesertaan',
                'attribute'=>'kepesertaan',
            'filter'=>[
                ''=>'semua',
                    'tidakpunya'=>'tidak memiliki bantuan',
                    'bpntplus'=>'bpnt',
                    'bpnt'=>'bpnt saja',
                    'bpntkip'=>'bpnt dan kip',
                    'bpntkis'=>'bpnt dan jkn/kis',
                    'bpntkiskip'=>'bpnt , jkn/kis dan kip',
                    'pkhplus'=>'pkh',
                    'pkh'=>'pkh saja',
                    'pkhkip'=>'pkh dan kip',
                    'pkhkis'=>'pkh dan jkn/kis',
                    'pkhbpnt'=>'pkh dan bpnt',
                    'pkhkiskip'=>'pkh, jkn/kis dan kip',
                    'pkhbpntkip'=>'pkh, bpnt dan kip',
                    'pkhbpntkis'=>'pkh, bpnt dan jkn/kis',
                    'jknkisplus'=>'jkn/kis',
                    'jknkis'=>'jkn/kis saja',
                    'jknkip'=>'jkn/kis dan kip',
                    'kipplus'=>'kip',
                    'kip'=>'kip saja',
                    'semua'=>'memiliki semua kepesertaan',
                    ],
                'format' => 'html',
                'value'=>function($model) {
                    $tampil=''; 
                    $bpnt=0;
                    $nomorbpnt=0;
                    $pkh=0;
                    $nomorpkh=0;
                    $kis=0;
                    $nomorkis=0;
                    $kip=0;
                    $nomorkip=0;
                    if ($model->bdtrt->sta_kks==="Ya") {
                        $bpnt=1;
                        if (isset($model->NoPesertaKKS2016) && $model->NoPesertaKKS2016 ==="") {
                            //status ya tidak ada nomor {masalah}
                            $tampil.='<strong>bpnt: '.$model->NoPesertaKKS2016.'</strong>
                              <small>status bpnt iya tetapi tidak memiliki nomor</small>
                            <br>';
                        }else{
                            //ada nomor dan status ya
                            $tampil.='bpnt :'.$model->NoPesertaKKS2016.'<br>';
                            $nomorbpnt=1;
                        }
                    }
                    if ($model->bdtrt->sta_kks==="Ya+") {
                        $bpnt=1;
                        if (isset($model->NoPesertaKKS2016) && $model->NoPesertaKKS2016 ==="") {
                            //status ya tidak ada nomor {masalah}
                            $tampil.='<strong>bpnt: '.$model->NoPesertaKKS2016.'</strong>
                              <small>status bpnt iya tetapi tidak memiliki nomor</small>
                            <br>';
                        }else{
                            //ada nomor dan status ya+
                            $tampil.='<strong>bpnt :'.$model->NoPesertaKKS2016.'</strong><br>';
                            $nomorbpnt=1;
                        }
                    }
                    if ($model->bdtrt->sta_pkh==="Ya") {
                        $pkh=1;
                        if (isset($model->NoPesertaPKH) && $model->NoPesertaPKH ==="") {
                             //status ya tidak ada nomor {masalah}
                             $tampil.='<strong>pkh :'.$model->NoPesertaPKH.'</strong>
                              <small>status pkh iya tetapi tidak memiliki nomor</small>
                            <br>';
                        }else{
                            //ada nomor dan status ya
                            $tampil.='pkh :'.$model->NoPesertaPKH.'<br>';
                            $nomorpkh=1;
                        }  
                    }
                    if ($model->bdtrt->sta_pkh==="Ya+") {
                        $pkh=1;
                        if (isset($model->NoPesertaPKH) && $model->NoPesertaPKH ==="") {
                             //status ya tidak ada nomor {masalah}
                             $tampil.='<strong>pkh :'.$model->NoPesertaPKH.'</strong>
                              <small>status pkh iya tetapi tidak memiliki nomor</small>
                            <br>';
                        }else{
                            //ada nomor dan status ya+
                            $tampil.='<strong>pkh :'.$model->NoPesertaPKH.'</strong><br>';
                            $nomorpkh=1;
                        }  
                    }
                    if ($model->bdtrt->sta_kis==="Ya") {
                        $kis=1;
                        if (isset($model->NoPesertaPBI) && $model->NoPesertaPBI ==="") {
                            //status ya tidak ada nomor {masalah}
                            $tampil.='<strong>jkn/kis :'.$model->NoPesertaPBI.'</strong>
                              <small>status jknkis iya tetapi tidak memiliki nomor</small>
                            <br>';
                        }else{
                            //ada nomor dan status ya
                            $tampil.='jkn/kis :'.$model->NoPesertaPBI.'<br>';
                            $nomorkis=1;
                        }
                    }
                    if ($model->bdtrt->sta_kis==="Ya+") {
                        $kis=1;
                        if (isset($model->NoPesertaPBI) && $model->NoPesertaPBI ==="") {
                            //status ya tidak ada nomor {masalah}
                            $tampil.='<strong>jkn/kis :'.$model->NoPesertaPBI.'</strong>
                              <small>status jknkis iya tetapi tidak memiliki nomor</small>
                            <br>';
                        }else{
                            //ada nomor dan status ya
                            $tampil.='<strong>jkn/kis :'.$model->NoPesertaPBI.'</strong><br>';
                            $nomorkis=1;
                        }
                    }
                    if ($model->bdtrt->sta_kip==="Ya") {
                        $kip=1;
                        if (isset($model->bdtrt->PesertaKIP) && $model->bdtrt->PesertaKIP ==="" || $model->bdtrt->PesertaKIP === '0') {
                            //status ya tidak ada nomor atau 0 {masalah}
                            $tampil.='kip :'.$model->bdtrt->PesertaKIP.'
                              <small>status kip iya tetapi tidak memiliki nomor</small>
                            <br>';
                        }else{
                            //ada nomor dan status ya
                            $tampil.='kip :'.$model->bdtrt->PesertaKIP.'<br>';
                            $nomorkip=1;
                        }                                                                                                            
                    }
                    $bt = array("bpnt", "pkh", "jkn/kis", "kip");
                    $detail =DetailPenerimaBantuan::find()->where(['nik' => $model->NIK])->all();
                    foreach ($detail as $key => $value) {
                        if (isset($value)) {
                            $singkat =Bantuan::findOne($value->id_bantuan)->singkatan_jenis_bantuan;
                            if(strtolower($singkat)==='bpnt' && $bpnt===0 || strtolower($singkat)==='pkh' && $pkh===0|| strtolower($singkat)==='jkn/kis' && $kis===0|| strtolower($singkat)==='kip' && $kip===0){
                                $tampil.='<strong>'.strtolower($singkat).' : '.$value['nomor_bantuan'].'</strong><br>';
                            }

                            if (!in_array(strtolower($singkat), $bt)) {
                                $tampil.='<strong>'.strtolower($singkat).' : '.$value['nomor_bantuan'].'</strong><br>';
                            }
                        }
                    }
                        return $tampil;
                }
            ],
            [
                'label'=>'Bantuan',
                'attribute'=>'BPS_Pengurus_Lainnya',
                'filter'=>'',
                'format' => 'html',
                'value'=>function($model) { 
                  return Html::a('detail', ['bdtart/view','id'=>$model->IDARTBDT] , ['class'=>'label btn-warning']); }
            ],
            // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php endif ?>

		</div>
    </div>
      </div>
    </div>
  </div>

<?php
$this->registerJs('
$(document).ready(function(){
  $(".dropdown-submenu a.test").on("click", function(e){
    $(this).next("ul").toggle();
    e.stopPropagation();
    e.preventDefault();
  });
});
    ');


$this->registerCss(
"
.dropdown-submenu {
  position: relative;
}

.dropdown-submenu .dropdown-menu {
  top: 0;
  left: 100%;
  margin-top: -1px;
}
"
    );


?>
