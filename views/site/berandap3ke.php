<?php
use yii\helpers\Url;
use app\models\Actions;
use app\models\ActionsService;
use app\models\P3keIndividu2023;
use app\models\P3keKeluarga2023;
use app\models\Dokumen;
use app\models\Account;
use app\models\Kecamatan;
use yii\helpers\Html;

$session=Yii::$app->session;

$this->title = 'BERANDA P3KE';

$jml_verifikasi_keluarga=0;
$jml_verifikasi_individu=0;
$jml_ditemukan_individu=0;
$jml_meninggal_individu=0;
$j_total_keluarga=0;
$j_total_individu=0;
$jml_kemiskinan_ekstrem_keluarga=0;
$jml_kemiskinan_ekstrem_individu=0;
$jml_ke_keluarga=0;
$jml_ke_individu=0;
$url_ke_keluarga="";
$url_ke_individu="";

$roleadmin = array("eksekutif","admin","pfm","dinsos","superadmin","bappeda","disnaker","dispertan","dinas_perikanan","disdukcapil","disdalduk_kb","dinkes","disperkim","dinkop_um","dinas_pendidikan","kominfo","pdam","ketapang");
if((in_array(strtolower(Yii::$app->user->identity->role), $roleadmin))){
  $jml_verifikasi_keluarga=@P3keKeluarga2023::find()->where(['status_verval'=>'Sudah'])->count();
  $jml_verifikasi_individu=@P3keIndividu2023::find()->where(['verifikasi'=>'Sudah'])->count();
  $jml_ditemukan_individu=@P3keIndividu2023::find()->where(['status_keberadaan'=>'Ditemukan'])->count();
  $jml_meninggal_individu=@P3keIndividu2023::find()->where(['status_keberadaan'=>'Meninggal'])->count();
  $j_total_keluarga=@P3keKeluarga2023::find()->count();
  $j_total_individu=@P3keIndividu2023::find()->count();
  $jml_kemiskinan_ekstrem_keluarga=@P3keKeluarga2023::find()->where(['status_kemiskinan'=>'Kemiskinan Ekstrem'])->andWhere(['status_keberadaan'=>'Ditemukan'])->andWhere(['status_intervensi'=>'Belum'])->orWhere(['status_intervensi'=>'Sedang Proses'])->count();
  $jml_kemiskinan_ekstrem_individu=@P3keIndividu2023::find()->where(['status_kemiskinan'=>'Kemiskinan Ekstrem'])->andWhere(['status_keberadaan'=>'Ditemukan'])->andWhere(['status_intervensi'=>'Belum'])->orWhere(['status_intervensi'=>'Sedang Proses'])->count();
  $jml_ke_keluarga=@P3keKeluarga2023::find()->where(['status_kemiskinan'=>'Kemiskinan Ekstrem'])->andWhere(['status_keberadaan'=>'Ditemukan'])->count();
  $jml_ke_individu=@P3keIndividu2023::find()->where(['status_kemiskinan'=>'Kemiskinan Ekstrem'])->andWhere(['status_keberadaan'=>'Ditemukan'])->count();
  $url_ke_keluarga=Url::to(['p3ke/index','status_kemiskinan_keluarga'=>'Kemiskinan Ekstrem','status_keberadaan_keluarga'=>'Ditemukan','status_intervensi_keluarga'=>'Belum dan Sedang Proses','set'=>'tab1']);
  $url_ke_individu=Url::to(['p3ke/index','status_kemiskinan_individu'=>'Kemiskinan Ekstrem','status_keberadaan_individu'=>'Ditemukan','status_intervensi_individu'=>'Belum dan Sedang Proses','set'=>'tab2']);
}
if(@Yii::$app->user->identity->role=='kecamatan'){
  $account=@Account::find()->where(['username'=>@Yii::$app->user->identity->username])->one();
  $kecamatan=@Kecamatan::find()->where(["KodeKecamatan"=>@$account['kode_kecamatan']])->one()->Nama;
  $jml_verifikasi_keluarga=@P3keKeluarga2023::find()->where(['status_verval'=>'Sudah'])->andWhere(['kecamatan'=>@$kecamatan])->count();
  $jml_verifikasi_individu=@P3keIndividu2023::find()->where(['verifikasi'=>'Sudah'])->andWhere(['kecamatan'=>@$kecamatan])->count();
  $jml_ditemukan_individu=@P3keIndividu2023::find()->where(['status_keberadaan'=>'Ditemukan'])->andWhere(['kecamatan'=>@$kecamatan])->count();
  $jml_meninggal_individu=@P3keIndividu2023::find()->where(['status_keberadaan'=>'Meninggal'])->andWhere(['kecamatan'=>@$kecamatan])->count();
  $j_total_keluarga=@P3keKeluarga2023::find()->where(['kecamatan'=>@$kecamatan])->count();
  $j_total_individu=@P3keIndividu2023::find()->where(['kecamatan'=>@$kecamatan])->count();
  $jml_kemiskinan_ekstrem_keluarga=@P3keKeluarga2023::find()->where(['status_kemiskinan'=>'Kemiskinan Ekstrem'])->andWhere(['status_keberadaan'=>'Ditemukan'])->andWhere(['status_intervensi'=>'Belum'])->orWhere(['status_intervensi'=>'Sedang Proses'])->andWhere(['kecamatan'=>@$kecamatan])->count();
  $jml_kemiskinan_ekstrem_individu=@P3keIndividu2023::find()->where(['status_kemiskinan'=>'Kemiskinan Ekstrem'])->andWhere(['status_keberadaan'=>'Ditemukan'])->andWhere(['status_intervensi'=>'Belum'])->orWhere(['status_intervensi'=>'Sedang Proses'])->andWhere(['kecamatan'=>@$kecamatan])->count();
  $url_ke_keluarga=Url::to(['p3ke/index','status_kemiskinan_keluarga'=>'Kemiskinan Ekstrem','status_keberadaan_keluarga'=>'Ditemukan','status_intervensi_keluarga'=>'Belum dan Sedang Proses','kecamatan'=>@$kecamatan,'set'=>'tab1']);
  $url_ke_individu=Url::to(['p3ke/index','status_kemiskinan_individu'=>'Kemiskinan Ekstrem','status_keberadaan_individu'=>'Ditemukan','status_intervensi_individu'=>'Belum dan Sedang Proses','kecamatan'=>@$kecamatan,'set'=>'tab2']);
}
if(@Yii::$app->user->identity->role=='kelurahan'){
  $account=@Account::find()->where(['username'=>@Yii::$app->user->identity->username])->one();
  $kecamatan=@Kecamatan::find()->where(["KodeKecamatan"=>@$account['kode_kecamatan']])->one()->Nama;
  $kelurahan=strtoupper(@Actions::getKelurahan($account['kode_kecamatan'],$account['kode_kelurahan'])["Nama"]);
  $jml_verifikasi_keluarga=@P3keKeluarga2023::find()->where(['status_verval'=>'Sudah'])->andWhere(['kecamatan'=>@$kecamatan])->andWhere(['kelurahan'=>@$kelurahan])->count();
  $jml_verifikasi_individu=@P3keIndividu2023::find()->where(['verifikasi'=>'Sudah'])->andWhere(['kecamatan'=>@$kecamatan])->andWhere(['kelurahan'=>@$kelurahan])->count();
  $jml_ditemukan_individu=@P3keIndividu2023::find()->where(['status_keberadaan'=>'Ditemukan'])->andWhere(['kecamatan'=>@$kecamatan])->andWhere(['kelurahan'=>@$kelurahan])->count();
  $jml_meninggal_individu=@P3keIndividu2023::find()->where(['status_keberadaan'=>'Meninggal'])->andWhere(['kecamatan'=>@$kecamatan])->andWhere(['kelurahan'=>@$kelurahan])->count();
  $j_total_keluarga=@P3keKeluarga2023::find()->where(['kecamatan'=>@$kecamatan])->andWhere(['kelurahan'=>@$kelurahan])->count();
  $j_total_individu=@P3keIndividu2023::find()->where(['kecamatan'=>@$kecamatan])->andWhere(['kelurahan'=>@$kelurahan])->count();
  $jml_kemiskinan_ekstrem_keluarga=@P3keKeluarga2023::find()->where(['status_kemiskinan'=>'Kemiskinan Ekstrem'])->andWhere(['status_keberadaan'=>'Ditemukan'])->andWhere(['status_intervensi'=>'Belum'])->orWhere(['status_intervensi'=>'Sedang Proses'])->andWhere(['kecamatan'=>@$kecamatan])->andWhere(['kelurahan'=>@$kelurahan])->count();
  $jml_kemiskinan_ekstrem_individu=@P3keIndividu2023::find()->where(['status_kemiskinan'=>'Kemiskinan Ekstrem'])->andWhere(['status_keberadaan'=>'Ditemukan'])->andWhere(['status_intervensi'=>'Belum'])->orWhere(['status_intervensi'=>'Sedang Proses'])->andWhere(['kecamatan'=>@$kecamatan])->andWhere(['kelurahan'=>@$kelurahan])->count();
  $url_ke_keluarga=Url::to(['p3ke/index','status_kemiskinan_keluarga'=>'Kemiskinan Ekstrem','status_keberadaan_keluarga'=>'Ditemukan','status_intervensi_keluarga'=>'Belum dan Sedang Proses','kecamatan'=>@$kecamatan,'kelurahan'=>@$kelurahan,'set'=>'tab1']);
  $url_ke_individu=Url::to(['p3ke/index','status_kemiskinan_individu'=>'Kemiskinan Ekstrem','status_keberadaan_individu'=>'Ditemukan','status_intervensi_individu'=>'Belum dan Sedang Proses','kecamatan'=>@$kecamatan,'kelurahan'=>@$kelurahan,'set'=>'tab2']);
}


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
            <div id="bansos" class="small-box bg-white animate__animated animate__fadeInLeft" style="border-radius: 25px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  text-align: center;cursor: pointer;">
                <div class="inner">
                  <center><h4 style="color:green;font-size:20px;" class="pull-right"><?=$jml_verifikasi_keluarga?>/<?=$j_total_keluarga?></h4></center>
                  <center><h4 style="color:red;font-size:20px;">Verifikasi Keluarga</h4></center>
                </div>
                <div class="icon">
                  <i class="fa fa-cubes"></i>
                </div>
                <a href="<?=Url::to(['p3ke/index','verifikasi_keluarga'=>'Sudah','set'=>'tab1'])?>" class="small-box-footer" style="border-bottom-right-radius: 25px;border-bottom-left-radius: 25px;border-bottom:15px solid red;color:navy;">
                  <i class="fa fa-arrow-circle-left"></i> Verifikasi Keluarga 
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <div id="dtks" class="small-box bg-white animate__animated animate__fadeInLeft animate__delay-1s" style="border-radius: 25px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  text-align: center;cursor: pointer;">
            <div class="inner">
               <center><h4 style="color:green;font-size:20px;" class="pull-right"><?=$jml_verifikasi_individu?>/<?=$j_total_individu?></h4></center>
               <center><h4 style="color:red;font-size:20px;">Verifikasi Individu</h4></center>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="<?=Url::to(['p3ke/index','verifikasi_individu'=>'Sudah','set'=>'tab2'])?>" class="small-box-footer" style="border-bottom-right-radius: 25px;border-bottom-left-radius: 25px;border-bottom:15px solid red;color:navy;">
               <i class="fa fa-arrow-circle-left"></i> Verifikasi Individu
            </a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <div id="pbi" class="small-box bg-white animate__animated animate__fadeInLeft animate__delay-2s" style="border-radius: 25px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  text-align: center;cursor: pointer;">
            <div class="inner">
              <center><h4 style="color:green;font-size:20px;" class="pull-right"><?=$jml_ditemukan_individu?>/<?=$j_total_individu?></h4></center>
              <center><h4 style="color:red;font-size:20px;">Individu Ditemukan</h4></center>
            </div>
            <div class="icon">
              <i class="fa fa-bank"></i>
            </div>
            <a href="<?=Url::to(['p3ke/index','status_keberadaan_individu'=>'Ditemukan','set'=>'tab2'])?>" class="small-box-footer" style="border-bottom-right-radius: 25px;border-bottom-left-radius: 25px;border-bottom:15px solid red;color:navy;">
              <i class="fa fa-arrow-circle-left"></i>Individu Ditemukan
            </a>
          </div>
        </div>
      
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-white animate__animated animate__fadeInLeft animate__delay-3s" style="border-radius: 25px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  text-align: center;cursor: pointer;">
            <div class="inner">
              <center><h4 style="color:green;font-size:20px;" class="pull-right"><?=$jml_meninggal_individu?>/<?=$j_total_individu?></h4></center>
               <center><h4 style="color:red;font-size:20px;">Individu Meninggal</h4></center>
            </div>
            <div class="icon">
              <i class="fa fa-gears"></i>
            </div>
            <a href="<?=Url::to(['p3ke/index','status_keberadaan_individu'=>'Meninggal','set'=>'tab2'])?>" class="small-box-footer" style="border-bottom-right-radius: 25px;border-bottom-left-radius: 25px;border-bottom:15px solid red;color:navy;">
              <i class="fa fa-arrow-circle-left"></i> Individu Meninggal
            </a>
          </div>
        </div>
        
        <div class="col-lg-3 col-xs-6">
            <div id="miskin_ekstrem_keluarga" class="small-box bg-white animate__animated animate__fadeInLeft" style="border-radius: 25px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  text-align: center;cursor: pointer;">
              <div class="inner">
                <center><h4 style="color:green;font-size:20px;" class="pull-right"><?=$jml_kemiskinan_ekstrem_keluarga?>/<?=$jml_ke_keluarga?></h4></center>
                <center><h4 style="color:red;font-size:20px;">Kemiskinan Ekstrem Keluarga</h4></center>
              </div>
              <div class="icon">
                <i class="fa fa-cubes"></i>
              </div>
              <a href="<?=$url_ke_keluarga?>" class="small-box-footer" style="border-bottom-right-radius: 25px;border-bottom-left-radius: 25px;border-bottom:15px solid red;color:navy;">
                <i class="fa fa-arrow-circle-left"></i> Kemiskinan Ekstrem Keluarga 
              </a>
            </div>
        </div>

        <div class="col-lg-3 col-xs-6">
            <div id="miskin_ekstrem_individu" class="small-box bg-white animate__animated animate__fadeInLeft animate__delay-1s" style="border-radius: 25px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  text-align: center;cursor: pointer;">
              <div class="inner">
                <center><h4 style="color:green;font-size:20px;" class="pull-right"><?=$jml_kemiskinan_ekstrem_individu?>/<?=$jml_ke_individu?></h4></center>
                <center><h4 style="color:red;font-size:20px;">Kemiskinan Ekstrem Individu</h4></center>
              </div>
              <div class="icon">
                <i class="fa fa-cubes"></i>
              </div>
              <a href="<?=$url_ke_individu?>" class="small-box-footer" style="border-bottom-right-radius: 25px;border-bottom-left-radius: 25px;border-bottom:15px solid red;color:navy;">
                <i class="fa fa-arrow-circle-left"></i> Kemiskinan Ekstrem Individu 
              </a>
            </div>
        </div>

      </div>

      <div class="row">
            <div class="col-md-12">
              <div class="box box-navy box-solid" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                    <div class="box-header bg-navy">
                        <i class="fa fa-fw fa-book"></i>
                        <strong>Note</strong>
                    </div>
                    <div class="box-body">
                        <p>(Sumber Data dari Hasil Verval Desil 1 P3KE di 177 Kelurahan per 17 Juni 2023)</p>
                    </div>
                </div>
            </div>
        </div>

</div>  
