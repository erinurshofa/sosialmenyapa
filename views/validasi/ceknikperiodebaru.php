<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Kecamatan;
use app\models\Kelurahan;
use app\models\Actions;
use app\models\DetailPenerimaBantuan;
use app\models\Bantuan;
use app\models\Bdtart;
use app\models\StatusKematian;
// print_r($dtks);
// exit;
/* @var $this yii\web\View */
/* @var $model app\models\Unitkerja */

$this->title = 'CEK NIK PERIODE DTKS MARET 2022';
$statusdtks=false;
$statusdukcapil=false;
$nik = isset ($datacapil['NIK']) ? $datacapil['NIK']:'';
$namalengkap = isset ($datacapil['NAMA_LGKP']) ? $datacapil['NAMA_LGKP']:'';
$alamat = isset ($datacapil['ALAMAT']) ? $datacapil['ALAMAT']:'';
$kecamatan = isset ($datacapil['KEC_NAME']) ? $datacapil['KEC_NAME']:'';
$kelurahan = isset ($datacapil['KEL_NAME']) ? $datacapil['KEL_NAME']:'';
$jeniskelamin = isset ($datacapil['JENIS_KLMIN']) ? $datacapil['JENIS_KLMIN']:'';
$nort = isset ($datacapil['NO_RT']) ? $datacapil['NO_RT']:'';
$norw = isset ($datacapil['NO_RW']) ? $datacapil['NO_RW']:'';
$nokk = isset ($datacapil['NO_KK']) ? $datacapil['NO_KK']:'';
$tempatlahir = isset ($datacapil['TMPT_LHR']) ? $datacapil['TMPT_LHR']:'';
$jenispekerjaan = isset ($datacapil['JENIS_PKRJN']) ? $datacapil['JENIS_PKRJN']:'';
$tanggallahir = isset ($datacapil['TGL_LHR']) ? $datacapil['TGL_LHR']:'';

// $this->params['breadcrumbs'][] = $this->title;
// \yii\web\YiiAsset::register($this);
?>
<div class="row">
  <div class="col-md-4">
    <div class="box box-danger box-solid" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
        <div class="box-header bg-danger">
            <strong style="font-weight: bold;color:white;font-family:roboto;"><?= Html::encode('CEK NIK PERIODE DTKS MARET 2022') ?></strong>
        </div>
        <div class="box-body">
            <?= $this->render('_formnik', [
                'model' => $model,
                'data'=>@$data,
            ]) ?>
        </div>
    </div>
  </div>
<div class="col-md-8">
    <div class="box box-info box-solid" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
        <div class="box-header bg-info">
            <strong style="font-weight: bold;color:white;font-family:roboto;"><?= Html::encode('INFO') ?></strong>
        </div>
        <div class="box-body">
            <ul>
                <li>Hanya dapat cek NIK yang masuk DTKS</li>
                <li>Jika dukcapil tidak terhubung maka tidak muncul tanda apapun hanya terlihat status tidak terhubung</li>
                <li>Jika data sesuai dukcapil maka muncul tanda <?='<span class="bg-green"><i class="fa fa-fw fa-check"></i></span>'?></li>
                <li>Jika tidak sesuai dukcapil maka muncul tanda <?='<span class="bg-red"><i class="fa fa-fw fa-close"></i></span>'?></li>
            </ul>
        </div>
    </div>
  </div>
</div>
<div class="row">

  <div class="col-md-6">
    <div class="box box-primary box-solid" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
        <div class="box-header bg-blue">
            <strong style="font-weight: bold;color:white;font-family:roboto;"><?= Html::encode('STATUS DATA') ?></strong>
        </div>
        <div class="box-body">
            <table class="table table-hover">
            
            <?php if (!empty($dtks)) { ?>
                <tr>
                    <td>Status Dukcapil</td>
                    <td>:</td>
                    <td><strong><?php if(!empty($datacapil)){echo '<font color="green">Terhubung</font>';}else{echo '<font color="red">Tidak Terhubung</font>';}?></strong></td>
                </tr>
                <tr>
                    <td>Status BDT / DTKS</td>
                    <td>:</td>
                    <td><strong><font color="green">Data masuk pada BDT / DTKS</font></strong></td>
                </tr>
                <!-- <tr>
                    <td>Surat Keterangan</td>
                    <td>:</td>
                    <td><?php //Html::a('<i class="fa fa-fw fa-print"></i>Cetak Surat Keterangan', ['cetak-surat/suratketeranganbaru', 'nik' => $model->nik,'periode'=>'dtks_maret_2022_dtks'], ['class' => 'btn btn-success'])?></td>
                </tr> -->
            <?php }else{?>
                <tr>
                    <td>Status BDT / DTKS</td>
                    <td>:</td>
                    <td><strong><font color="red">Data yang bersangkutan tidak masuk di DTKS</font></strong></td>
                </tr>
            <?php } ?>

            </table>        
        </div>
    </div>
    <?php if (!empty($dtks)) { ?>
<div class="box box-primary box-solid" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">

        <div class="box-header bg-blue">
            <strong  style="font-weight: bold;color:white;font-family:roboto;"><?= Html::encode('KEPESERTAAN PROGRAM') ?></strong>
        </div>
            <div class="box-body responsive">
                  <table class="table table-hover">
                   <?php
                    $tampil=''; 

                    if (strtolower($dtks['bansos_bpnt'])==="ya") {
                        $tampil.='<tr><td><strong style="color:red;">BPNT</td><td>:</td><td>Terdaftar</td><tr>';  
                    }else{
                        $tampil.='<tr><td>BPNT</td><td>:</td><td>Tidak Terdaftar</td><tr>';
                    }
                    if (strtolower($dtks['bansos_pkh'])==="ya") {
                        $tampil.='<tr><td><strong style="color:red;">PKH</strong></td><td>:</td><td>Terdaftar</td><tr>';
                    }else{
                        $tampil.='<tr><td>PKH</td><td>:</td><td>Tidak Terdaftar</td><tr>';
                    }
                    if (strtolower($dtks['bansos_bpnt_pkm'])==="ya") {
                        $tampil.='<tr><td><strong style="color:red;">BPNT PKM</strong></td><td>:</td><td>Terdaftar</td><tr>';
                    }else{
                        $tampil.='<tr><td>BPNT PKM</td><td>:</td><td>Tidak Terdaftar</td><tr>';
                    }
                    if (strtolower($dtks['bansos_pbi_jkn'])==="ya") {
                        $tampil.='<tr><td><strong style="color:red;">PBI JKN</strong></td><td>:</td><td>Terdaftar</td><tr>';
                    }else{
                        $tampil.='<tr><td>PBI JKN</td><td>:</td><td>Tidak Terdaftar</td><tr>';
                    }

                        echo $tampil;
                   ?>
                </table>
            </div>
        </div>

  </div>

        


  <div class="col-md-6">
  <?php 

  if (!empty($datacapil)) {$statusdukcapil=true; ?>
<!--     <div class="box box-success box-solid">
        <div class="box-header bg-green">
            <strong style="font-weight: bold;color:white;font-family:roboto;"><?= Html::encode('DATA DUKCAPIL') ?></strong>
        </div>
        <div class="box-body"> -->
        <?php
        ?>    
            <?php
                // if (is_array($datacapil)) {
            
                //     echo "<table class='table table-hover'>";
                //         foreach ($datacapil as $nama_index=>$isi) {
                //             $array_search = array('','NIK','NO_KK','NAMA_LGKP','KEC_NAME','KEL_NAME');
                //             $result=array_search($nama_index,$array_search);
                //             if (!empty($result)) {
                //                 echo "<tr>";
                //                 echo "<td>".ucwords(str_replace("_", " ", $nama_index))." </td> <td> : </td> <td> $isi </td>";
                //                 echo "</tr>";
                //             }  
                //         }
                //     echo "</table>";
                // }                    
            ?>
<!--         </div>
    </div> -->
<?php } ?>

     <?php if (!empty($dtks)){ $statusdtks=true;?>
    <div class="box box-danger box-solid"  style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
        <div class="box-header bg-red">
            <strong  style="font-weight: bold;color:white;font-family:roboto;"><?= Html::encode('DATA SIDAKSOS') ?></strong>
        </div>
        <div class="box-body">
            <table class="table table-hover" cellpadding="0">
                <tr>
                    <td>ID DTKS</td>
                    <td>:</td>
                    <td><?=$dtks->iddtks?></td>
                </tr>
                <tr>
                    <td>NIK</td>
                    <td>:</td>
                    <td>
                    <?=$dtks->nik?> 
                    <?php 
                        if ($nik==$dtks->nik) {
                            echo '<span class="bg-green"><i class="fa fa-fw fa-check"></i></span>';
                        }else if($nik==""){
                            
                        }else{
                            echo '<span class="bg-red"><i class="fa fa-fw fa-close"></i></span>';
                        }
                    ?>
                    </td>
                </tr>
                <tr>
                    <td>Hubungan Keluarga</td>
                    <td>:</td>
                    <td><?= $dtks->hub_keluarga?></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td>
                        <?= $dtks->nama?>
                        <?php 
                            if ($namalengkap=="Sesuai (100)") {
                                echo '<span class="bg-green"><i class="fa fa-fw fa-check"></i></span>';
                            }else if($namalengkap==""){
                                
                            }else{
                                echo '<span class="bg-red"><i class="fa fa-fw fa-close"></i></span>';
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td>    
                        <?= $dtks->alamat?>
                        <?php 
                            if ($alamat=="Sesuai (100)") {
                                echo '<span class="bg-green"><i class="fa fa-fw fa-check"></i></span>';
                            }else if($alamat==""){
                                
                            }else{
                                echo '<span class="bg-red"><i class="fa fa-fw fa-close"></i></span>';
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>RT</td>
                    <td>:</td>
                    <td>
                        <?= $dtks->rt?>
                        <?php 
                            if ($nort=="Sesuai") {
                                echo '<span class="bg-green"><i class="fa fa-fw fa-check"></i></span>';
                            }else if($nort==""){
                                
                            }else{
                                echo '<span class="bg-red"><i class="fa fa-fw fa-close"></i></span>';
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>RW</td>
                    <td>:</td>
                    <td>
                        <?= $dtks->rw?>
                        <?php 
                            if ($norw=="Sesuai") {
                                echo '<span class="bg-green"><i class="fa fa-fw fa-check"></i></span>';
                            }else if($norw==""){
                                
                            }else{
                                echo '<span class="bg-red"><i class="fa fa-fw fa-close"></i></span>';
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Kecamatan</td>
                    <td>:</td>
                    <td>
                        <?=$dtks->kecamatan?>
                        <?php 
                            if ($kecamatan=="Sesuai") {
                                echo '<span class="bg-green"><i class="fa fa-fw fa-check"></i></span>';
                            }else if($kecamatan==""){
                                
                            }else{
                                echo '<span class="bg-red"><i class="fa fa-fw fa-close"></i></span>';
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Kelurahan</td>
                    <td>:</td>
                    <td>
                        <?=$dtks->kelurahan?>
                        <?php 
                            if ($kelurahan=="Sesuai") {
                                echo '<span class="bg-green"><i class="fa fa-fw fa-check"></i></span>';
                            }else if($kelurahan==""){
                                
                            }else{
                                echo '<span class="bg-red"><i class="fa fa-fw fa-close"></i></span>';
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Pekerjaan</td>
                    <td>:</td>
                    <td>
                        <?= $dtks->pekerjaan?>
                        <?php 
                            if ($jenispekerjaan=="Sesuai") {
                                echo '<span class="bg-green"><i class="fa fa-fw fa-check"></i></span>';
                            }else if($jenispekerjaan==""){
                                
                            }else{
                                echo '<span class="bg-red"><i class="fa fa-fw fa-close"></i></span>';
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>:</td>
                    <td>
                        <?=$dtks->jenis_kelamin?>
                        <?php 
                            if ($jeniskelamin=="Sesuai") {
                                echo '<span class="bg-green"><i class="fa fa-fw fa-check"></i></span>';
                            }else if($jeniskelamin==""){
                                
                            }else{
                                echo '<span class="bg-red"><i class="fa fa-fw fa-close"></i></span>';
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Tempat Lahir</td>
                    <td>:</td>
                    <td>
                        <?=$dtks->tempat_lahir?>
                        <?php 
                            if ($tempatlahir=="Sesuai (100)") {
                                echo '<span class="bg-green"><i class="fa fa-fw fa-check"></i></span>';
                            }else if($tempatlahir==""){
                                
                            }else{
                                echo '<span class="bg-red"><i class="fa fa-fw fa-close"></i></span>';
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td>:</td>
                    <td>
                        <?=Actions::convDateTimeIndonesia($dtks->tanggal_lahir)?>
                        <?php 
                            if ($tanggallahir=="Sesuai") {
                                echo '<span class="bg-green"><i class="fa fa-fw fa-check"></i></span>';
                            }else if($tanggallahir==""){
                                
                            }else{
                                echo '<span class="bg-red"><i class="fa fa-fw fa-close"></i></span>';
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Umur</td>
                    <td>:</td>
                    <td><?= getAge($dtks->tanggal_lahir)?> Tahun</td>
                </tr>
                <tr>
                    <td>Nomor KK</td>
                    <td>:</td>
                    <td>
                        <?=$dtks->nokk?>
                        <?php 
                            if ($nokk=="Sesuai") {
                                echo '<span class="bg-green"><i class="fa fa-fw fa-check"></i></span>';
                            }else if($nokk==""){
                                
                            }else{
                                echo '<span class="bg-red"><i class="fa fa-fw fa-close"></i></span>';
                            }
                        ?>
                    </td>
                </tr>
            </table> 
            
        </div>
    </div>
     <?php } ?>  
  </div>



 <?php } ?>
</div>
<!-- end row kedua -->
<div class="row">
<div class="col-md-12">
  <?php if (!empty($databantuan)) {?>
    <div class="box box-success box-solid">
        <div class="box-header bg-green">
            <strong><?= Html::encode('Data Bantuan') ?></strong>
        </div>
        <div class="box-body">
        <?php
        ?>    
            <?php
                if (is_array($databantuan)) {
                    echo "<table class='table table-hover'>";
                        foreach ($databantuan as $nama_index=>$isi) {
                            switch ($nama_index) {
                               
                                case 'bst':
                                    echo "<tr>";
                                    if ($isi==true) {
                                        $isi=Html::a('terdaftar', ['bst-maret-april2021/index', 'nik' => $model->nik], ['class' => '']);
                                    }else{
                                        $isi="tidak terdaftar";
                                    }
                                    echo "<td> Bantuan Sosial Tunai </td> <td> : </td> <td> $isi </td>";
                                    echo "</tr>";
                                    break;
                                case 'bsp':
                                    echo "<tr>";
                                    if ($isi==true) {
                                        $isi=Html::a('terdaftar', ['bsp-mei2021/index', 'nik' => $model->nik], ['class' => '']);
                                    }else{
                                        $isi="tidak terdaftar";
                                    }
                                    echo "<td> Bantuan Sosial Pangan </td> <td> : </td> <td> $isi </td>";
                                    echo "</tr>";
                                    break;
                                case 'pkh':
                                    echo "<tr>";
                                    if ($isi==true) {
                                        $isi=Html::a('terdaftar', ['pkh-april2021/index', 'nik' => $model->nik], ['class' => '']);
                                    }else{
                                        $isi="tidak terdaftar";
                                    }
                                    echo "<td> Program Keluarga Harapan </td> <td> : </td> <td> $isi </td>";
                                    echo "</tr>";
                                    break;
                                
                            }
                           
                        }
                    echo "</table>";
                }                    
            ?>
        </div>
    </div>
<?php } ?>
</div>
</div>

<div class="row">
    <div class="col-md-12">
<?php if (!empty($bdtart)) {?>
        <div class="box box-warning box-solid">
    <div class="box-header bg-orange">
        <strong><?= Html::encode('Keterangan Sosial Ekonomi Anggota Rumah Tangga') ?></strong>
    </div>
    <div class="box-body">
<table class="table table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Art</th>
                    <th>Tanggal Lahir</th>
                    <th>NIK</th>
                    <th>Jenis Kelamin</th>
                    <th>HubKel Dgn KRT</th>
                    <th>HubKel Dgn KK</th>
                    <th>Status</th>
                    <!-- <th>No Urut Keluarga</th>
                    <th>No Peserta PKH</th>
                    <th>No Peserta KKS 2016</th>
                    <th>No Peserta PBI</th> -->
                    <th>Opsi</th>
                  </tr>
                  </thead>
                  <tbody>
                  
                  <?php
                      $listbdt = Bdtart::find()->where(['IDBDT' => $bdtart->IDBDT])->all();
                    $tam='';
                    $num=1;
                    foreach ($listbdt as $key => $value) {
                        $tam .= '<tr>
                    <td>'.$num++.'</td>
                    <td>'.$value['Nama'].'</td>
                    <td>'.Actions::convDateTimeIndonesia($value['TglLahir']).'</td>
                    <td>'.$value['NIK'].'</td>
                    <td>'.$value['JnsKel'].'</td>
                    <td>'.$value['Hub_KRT'].'</td>
                    <td>'.$value['Hubkel'].'</td>
                    <td>'.Actions::statuskematian($value['NIK']).'</td>'.
                    // <td>'.$value['NUK'].'</td>
                    // <td>'.$value['NoPesertaPKH'].'</td>
                    // <td>'.$value['NoPesertaKKS2016'].'</td>
                    // <td>'.$value['NoPesertaPBI'].'</td>
                    '<td>'.Html::a('<i class="fa fa-fw fa-search"></i>Detail', ['bdtart/detail', 'id' => $value['IDARTBDT']], ['class' => 'btn btn-info btn-sm']).
                        Html::a('<i class="fa fa-fw fa-cog"></i>Status', ['status-kematian/statuskematian', 'nik' => $value['NIK']], ['class' => 'btn btn-warning btn-sm']).
                        Html::a('<i class="fa fa-fw fa-file"></i>Bantuan', ['detail-penerima-bantuan/entri', 'nik' => $value['NIK']], ['class' => 'btn btn-success btn-sm','target'=>'_blank'])
                    .'</td>
                  </tr>';
                    }
                    echo $tam;
                  
                  
                  ?>
           
                  </tbody>
                </table>
        </div>
      </div>
      <?php } ?>

<?php
// if (!empty($datadukcapil)) {
// dd($datadukcapil);
// }
// print_r($datadukcapil)
?>

    </div>
</div>