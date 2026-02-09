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
$this->title = 'DASHBOARD';
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
        <div class="col-lg-3 col-xs-6">
            <div id="p3ke_2025" class="small-box bg-red animate__animated animate__fadeInLeft" style="border-radius: 25px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
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
         <div class="col-lg-3 col-xs-6">
            <div id="bansos" class="small-box bg-green animate__animated animate__fadeInLeft" style="border-radius: 25px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  text-align: center;cursor: pointer;">
              <div class="inner">
                <center><h4 style="color:white;font-size:40px;">BANSOS</h4></center>
              </div>
              <div class="icon">
                <i class="fa fa-cubes"></i>
              </div>
              <a href="#" class="small-box-footer" style="border-bottom-right-radius: 25px;border-bottom-left-radius: 25px;">
                <i class="fa fa-arrow-circle-left"></i> Bantuan Sosial 
              </a>
            </div>

        </div>
        <div class="col-lg-3 col-xs-6">
          <div id="dtks" class="small-box bg-orange animate__animated animate__fadeInLeft animate__delay-1s" style="border-radius: 25px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  text-align: center;cursor: pointer;">
            <div class="inner">
               <center><h4 style="color:white;font-size:40px;">DTKS</h4></center>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="#" class="small-box-footer" style="border-bottom-right-radius: 25px;border-bottom-left-radius: 25px;">
               <i class="fa fa-arrow-circle-left"></i> Data Terpadu Kesejahteraan Sosial
            </a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <div id="pbi" class="small-box bg-red animate__animated animate__fadeInLeft animate__delay-2s" style="border-radius: 25px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  text-align: center;cursor: pointer;">
            <div class="inner">
              <center><h4 style="color:white;font-size:40px;">PBI</h4></center>
            </div>
            <div class="icon">
              <i class="fa fa-bank"></i>
            </div>
            <a href="#" class="small-box-footer" style="border-bottom-right-radius: 25px;border-bottom-left-radius: 25px;">
              <i class="fa fa-arrow-circle-left"></i> Penerima Bantuan Iuran
            </a>
          </div>
        </div>
      
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-blue animate__animated animate__fadeInLeft animate__delay-3s" style="border-radius: 25px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
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

<div class="row">
<div class="col-lg-3 col-xs-6">
          <div id="p3ke" class="small-box bg-orange animate__animated animate__fadeInLeft animate__delay-1s" style="border-radius: 25px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
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

</div>


<div id="bansos-modal" class="modal fade">
        <div class="modal-dialog modal-lg animate__animated animate__fadeInUp">
            <div class="modal-content">

                <!-- Header -->
                <div class="modal-header">
                <h5 class="modal-title"  style="color:#da251d;font-weight:bold;">PILIH PERIODE BANSOS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

                <!-- Body -->
                <div class="modal-body">
                <div class="row">
                  <div class="col-md-3">
                    <a href="<?=Url::to(['setting/session','periode'=>'januari_2022','menu'=>'bansos'])?>" class="btn btn-danger" style="border-radius: 25px;">
                      <i class="fa fa-arrow-circle-left"></i> Bansos Januari 2022 
                    </a>
                  </div>
                  <div class="col-md-3">
                    <a href="<?=Url::to(['setting/session','periode'=>'november_2021','menu'=>'bansos'])?>" class="btn btn-warning" style="border-radius: 25px;">
                      <i class="fa fa-arrow-circle-left"></i> Bansos November 2021 
                    </a>
                  </div>
                  <div class="col-md-3">
                    <a href="<?=Url::to(['setting/session','periode'=>'2022','menu'=>'bansos'])?>" class="btn btn-success" style="border-radius: 25px;">
                      <i class="fa fa-arrow-circle-left"></i> Bansos Tahun 2022
                    </a>
                  </div>
                  <div class="col-md-3">
                     <a href="<?=Url::to(['setting/session','periode'=>'2021','menu'=>'bansos'])?>" class="btn btn-primary" style="border-radius: 25px;">
                      <i class="fa fa-arrow-circle-left"></i> Bansos Tahun 2021
                    </a>
                  </div>
                </div>
                   
                </div>

                <!-- Footer -->
                <div class="modal-footer modal-footer--mine">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<div id="dtks-modal" class="modal fade">
        <div class="modal-dialog modal-lg animate__animated animate__fadeInUp">
            <div class="modal-content">

                <!-- Header -->
                <div class="modal-header">
                <h5 class="modal-title"  style="color:#da251d;font-weight:bold;">PILIH PERIODE DTKS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

                <!-- Body -->
                <div class="modal-body">
                <div class="row">
                  <div class="col-md-3">
                    <a href="<?=Url::to(['setting/session','periode'=>'maret_2022','menu'=>'dtks'])?>" class="btn btn-success" style="border-radius: 25px;">
                      <i class="fa fa-arrow-circle-left"></i> DTKS Maret 2022 
                    </a>
                  </div>
                  <div class="col-md-3">
                    <a href="<?=Url::to(['setting/session','periode'=>'februari_2022','menu'=>'dtks'])?>" class="btn btn-danger" style="border-radius: 25px;">
                      <i class="fa fa-arrow-circle-left"></i> DTKS Februari 2022 
                    </a>
                  </div>
                  <div class="col-md-3">
                    <a href="<?=Url::to(['setting/session','periode'=>'januari_2022','menu'=>'dtks'])?>" class="btn btn-primary" style="border-radius: 25px;">
                      <i class="fa fa-arrow-circle-left"></i> DTKS Januari 2022 
                    </a>
                  </div>
                  <div class="col-md-3">
                    <a href="<?=Url::to(['setting/session','periode'=>'desember_2021','menu'=>'dtks'])?>" class="btn btn-warning" style="border-radius: 25px;">
                      <i class="fa fa-arrow-circle-left"></i> DTKS Desember 2021 
                    </a>
                  </div>
                  <div class="col-md-3">
                    <a href="<?=Url::to(['setting/session','periode'=>'november_2021','menu'=>'dtks'])?>" class="btn btn-success" style="border-radius: 25px;">
                      <i class="fa fa-arrow-circle-left"></i> DTKS November 2021 
                    </a>
                  </div>
                  <div class="col-md-3">
                    <a href="<?=Url::to(['setting/session','periode'=>'september_2021','menu'=>'dtks'])?>" class="btn btn-success" style="border-radius: 25px;">
                      <i class="fa fa-arrow-circle-left"></i> DTKS September 2021 
                    </a>
                  </div>
                  <div class="col-md-3">
                    <a href="<?=Url::to(['setting/session','periode'=>'agustus_2021','menu'=>'dtks'])?>" class="btn btn-danger" style="border-radius: 25px;">
                      <i class="fa fa-arrow-circle-left"></i> DTKS Agustus 2021 
                    </a>
                  </div>
                  <div class="col-md-3">
                    <a href="<?=Url::to(['setting/session','periode'=>'juni_2021','menu'=>'dtks'])?>" class="btn btn-primary" style="border-radius: 25px;">
                      <i class="fa fa-arrow-circle-left"></i> DTKS Juni 2021 
                    </a>
                  </div>
                  <div class="col-md-3">
                    <a href="<?=Url::to(['setting/session','periode'=>'mei_2021','menu'=>'dtks'])?>" class="btn btn-warning" style="border-radius: 25px;">
                      <i class="fa fa-arrow-circle-left"></i> DTKS Mei 2021 
                    </a>
                  </div>
                  <div class="col-md-3">
                    <a href="<?=Url::to(['setting/session','periode'=>'2022','menu'=>'dtks'])?>" class="btn btn-primary" style="border-radius: 25px;">
                      <i class="fa fa-arrow-circle-left"></i> DTKS Tahun 2022
                    </a>
                  </div>
                  <div class="col-md-3">
                     <a href="<?=Url::to(['setting/session','periode'=>'2021','menu'=>'dtks'])?>" class="btn btn-primary" style="border-radius: 25px;">
                      <i class="fa fa-arrow-circle-left"></i> DTKS Tahun 2021
                    </a>
                  </div>
                  <div class="col-md-3">
                     <a href="<?=Url::to(['setting/session','periode'=>'2020','menu'=>'dtks'])?>" class="btn btn-primary" style="border-radius: 25px;">
                      <i class="fa fa-arrow-circle-left"></i> DTKS Tahun 2020
                    </a>
                  </div>
                  <div class="col-md-3">
                     <a href="<?=Url::to(['setting/session','periode'=>'2019','menu'=>'dtks'])?>" class="btn btn-primary" style="border-radius: 25px;">
                      <i class="fa fa-arrow-circle-left"></i> DTKS Tahun 2019
                    </a>
                  </div>
                </div>
                   
                </div>

                <!-- Footer -->
                <div class="modal-footer modal-footer--mine">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<div id="pbi-modal" class="modal fade">
        <div class="modal-dialog modal-lg animate__animated animate__fadeInUp">
            <div class="modal-content">
                <!-- Header -->
                <div class="modal-header">
                <h5 class="modal-title"  style="color:#da251d;font-weight:bold;">PILIH PERIODE PBI</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

                <!-- Body -->
                <div class="modal-body">
                <div class="row">
                  <div class="col-md-3">
                    <a href="<?=Url::to(['setting/session','periode'=>'maret_2022','menu'=>'pbi'])?>" class="btn btn-success" style="border-radius: 25px;">
                      <i class="fa fa-arrow-circle-left"></i> PBI Maret 2022
                    </a>
                  </div>
                  <div class="col-md-3">
                    <a href="<?=Url::to(['setting/session','periode'=>'februari_2022','menu'=>'pbi'])?>" class="btn btn-primary" style="border-radius: 25px;">
                      <i class="fa fa-arrow-circle-left"></i> PBI Februari 2022 
                    </a>
                  </div>
                  <div class="col-md-3">
                    <a href="<?=Url::to(['setting/session','periode'=>'januari_2022','menu'=>'pbi'])?>" class="btn btn-danger" style="border-radius: 25px;">
                      <i class="fa fa-arrow-circle-left"></i> PBI Januari 2022 
                    </a>
                  </div>
                  <div class="col-md-3">
                    <a href="<?=Url::to(['setting/session','periode'=>'desember_2021','menu'=>'pbi'])?>" class="btn btn-warning" style="border-radius: 25px;">
                      <i class="fa fa-arrow-circle-left"></i> PBI Desember 2021 
                    </a>
                  </div>
                  <div class="col-md-3">
                    <a href="<?=Url::to(['setting/session','periode'=>'november_2021','menu'=>'pbi'])?>" class="btn btn-primary" style="border-radius: 25px;">
                      <i class="fa fa-arrow-circle-left"></i> PBI November 2021 
                    </a>
                  </div>
                  <div class="col-md-3">
                    <a href="<?=Url::to(['setting/session','periode'=>'oktober_2021','menu'=>'pbi'])?>" class="btn btn-success" style="border-radius: 25px;">
                      <i class="fa fa-arrow-circle-left"></i> PBI Oktober 2021
                    </a>
                  </div>
                  <div class="col-md-3">
                    <a href="<?=Url::to(['setting/session','periode'=>'2022','menu'=>'pbi'])?>" class="btn btn-success" style="border-radius: 25px;">
                      <i class="fa fa-arrow-circle-left"></i> PBI Tahun 2022
                    </a>
                  </div>
                  <div class="col-md-3">
                     <a href="<?=Url::to(['setting/session','periode'=>'2021','menu'=>'pbi'])?>" class="btn btn-primary" style="border-radius: 25px;">
                      <i class="fa fa-arrow-circle-left"></i> PBI Tahun 2021
                    </a>
                  </div>
                </div>
                   
                </div>

                <!-- Footer -->
                <div class="modal-footer modal-footer--mine">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

<?php 
$this->registerJs(
"
$( document ).ready(function() {
    console.log( 'ready!' );

$('#bansos').click(function() {
  $('#bansos-modal').modal('show');
});
$('#dtks').click(function() {
  $('#dtks-modal').modal('show');
});
$('#pbi').click(function() {
  $('#pbi-modal').modal('show');
});
// $('.close').click(function() {
//   $('#bansos-modal').modal('hide');
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