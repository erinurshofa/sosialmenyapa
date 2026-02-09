<?php
use yii\helpers\Url;
use app\models\Actions;
use app\models\ActionsService;
use app\models\Bdtrt;
use app\models\Bdtart;
use app\models\Dokumen;
use miloschuman\highcharts\Highcharts;

use yii\helpers\Html;

$session=Yii::$app->session;

// $this->title = 'DASHBOARD';
?>
<?php
$surat= Dokumen::find()->where(['username'=>@Yii::$app->user->identity->username])->andWhere(['status'=>'proses'])->andWhere(['kategori_dokumen'=>'Surat Permohonan Data'])->one();
$ba= Dokumen::find()->where(['username'=>@Yii::$app->user->identity->username])->andWhere(['status'=>'proses'])->andWhere(['kategori_dokumen'=>'Berita Acara Serah Terima'])->one();
if (null!==$ba) {
?>
<style type="text/css">
.box {
    border-radius: 2px;
    position: relative;
    display: block;
    margin-bottom: 20px;
    box-shadow: 0 1px 1px rgb(0 0 0 / 10%);
    background-color:#ff851b; 
}
</style>
<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-warning"></i> Info!</h4>
                Permohonan Bast sedang diperiksa. Mohon Tunggu!
              </div>
  <?php

}
  ?>
  <?php if (null!==$surat): ?>
    <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-warning"></i> Info!</h4>
                Permohonan Data sedang diperiksa. Mohon Tunggu!
              </div>
  <?php endif ?>
  
      <div class="row">
         <div class="col-lg-12 col-xs-12">
          <center>
         <img src=<?php echo "http://".$_SERVER['HTTP_HOST'].Yii::$app->urlManager->baseUrl."/images/SIDAKSOS.svg" ?> class="img-responsive" height=25% width=30% style='opacity:1;margin-bottom:20px;'>
  </center>
        </div>
        <div class="col-lg-4 col-xs-6">
            <div id="p3ke_2025" class="small-box bg-orange animate__animated animate__fadeInLeft" style="border-radius: 25px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  text-align: center;cursor: pointer;">
              <div class="inner">
                <center><h4 style="color:white;font-size:40px;">P3KE 2025</h4></center>
              </div>
              <div class="icon">
                <i class="fa fa-cubes"></i>
              </div>
              <a href="<?=Url::to(['setting/menu','menu'=>'p3ke_2025'])?>" class="small-box-footer" style="border-bottom-right-radius: 25px;border-bottom-left-radius: 25px;">
                <i class="fa fa-arrow-circle-left"></i> P3KE 2025
              </a>
            </div>
        </div>
         <div class="col-lg-4 col-xs-6">
            <div id="bansos" class="small-box bg-blue animate__animated animate__fadeInLeft" style="border-radius: 25px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  text-align: center;cursor: pointer;">
              <div class="inner">
                <center><h4 style="color:white;font-size:40px;">BANSOS</h4></center>
              </div>
              <div class="icon">
                <i class="fa fa-cubes"></i>
              </div>
              <a href="<?=Url::to(['setting/menu','menu'=>'bansos'])?>" class="small-box-footer" style="border-bottom-right-radius: 25px;border-bottom-left-radius: 25px;">
                <i class="fa fa-arrow-circle-left"></i> Bantuan Sosial 
              </a>
            </div>
        </div>
        <div class="col-lg-4 col-xs-6">
          <div id="dtks" class="small-box bg-red animate__animated animate__fadeInLeft animate__delay-1s" style="border-radius: 25px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  text-align: center;cursor: pointer;">
            <div class="inner">
               <center><h4 style="color:white;font-size:40px;">DTKS</h4></center>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="<?=Url::to(['setting/menu','menu'=>'dtks'])?>" class="small-box-footer" style="border-bottom-right-radius: 25px;border-bottom-left-radius: 25px;">
               <i class="fa fa-arrow-circle-left"></i> Data Terpadu Kesejahteraan Sosial
            </a>
          </div>
        </div>

        <div class="col-lg-4 col-xs-6">
          <div id="pbi" class="small-box bg-green animate__animated animate__fadeInLeft animate__delay-2s" style="border-radius: 25px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  text-align: center;cursor: pointer;">
            <div class="inner">
              <center><h4 style="color:white;font-size:40px;">PBI</h4></center>
            </div>
            <div class="icon">
              <i class="fa fa-bank"></i>
            </div>
            <a href="<?=Url::to(['setting/menu','menu'=>'pbi'])?>" class="small-box-footer" style="border-bottom-right-radius: 25px;border-bottom-left-radius: 25px;">
              <i class="fa fa-arrow-circle-left"></i> Penerima Bantuan Iuran
            </a>
          </div>
        </div>
        <div class="col-lg-4 col-xs-6">
          <div id="p3ke" class="small-box bg-orange animate__animated animate__fadeInLeft animate__delay-3s" style="border-radius: 25px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  text-align: center;cursor: pointer;">
            <div class="inner">
               <center><h4 style="color:white;font-size:40px;">P3KE</h4></center>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="<?=Url::to(['setting/menu','menu'=>'p3ke'])?>" class="small-box-footer" style="border-bottom-right-radius: 25px;border-bottom-left-radius: 25px;">
               <i class="fa fa-arrow-circle-left"></i> Data P3KE
            </a>
          </div>
        </div>
        <div class="col-lg-4 col-xs-6">
          <div id="pfm" class="small-box bg-purple animate__animated animate__fadeInLeft animate__delay-4s" style="border-radius: 25px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  text-align: center;cursor: pointer;">
            <div class="inner">
               <center><h4 style="color:white;font-size:40px;">PFM</h4></center>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="<?=Url::to(['setting/menu','menu'=>'pfm'])?>" class="small-box-footer" style="border-bottom-right-radius: 25px;border-bottom-left-radius: 25px;">
               <i class="fa fa-arrow-circle-left"></i> Data PFM
            </a>
          </div>
        </div>
        <div class="col-lg-4 col-xs-6">
          <div class="small-box bg-navy animate__animated animate__fadeInLeft animate__delay-5s" style="border-radius: 25px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  text-align: center;cursor: pointer;">
            <div class="inner">
              <center><h4 style="color:white;font-size:40px;">PENGATURAN</h4></center>
            </div>
            <div class="icon">
              <i class="fa fa-gears"></i>
            </div>
            <a href="<?=Url::to(['setting/menu','menu'=>'pengaturan'])?>" class="small-box-footer" style="border-bottom-right-radius: 25px;border-bottom-left-radius: 25px;">
              <i class="fa fa-arrow-circle-left"></i> Pengaturan
            </a>
          </div>
        </div>



      </div>




<?php 
// $coba =$model->id_beritamedia;
$this->registerJs(
"
$( document ).ready(function() {
    console.log( 'ready!' );

// $('#bansos').click(function() {
//   $('#bansos-modal').modal('show');
// });
// $('#dtks').click(function() {
//   $('#dtks-modal').modal('show');
// });
// $('#pbi').click(function() {
//   $('#pbi-modal').modal('show');
// });


});
"
);
?>

<?php

$script = <<< JS
    
JS;
$this->registerJs($script);
?>