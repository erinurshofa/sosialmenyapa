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
/* @var $this yii\web\View */
/* @var $model app\models\Unitkerja */

$this->title = 'CEK NIK PERIODE OKTOBER 2020';
$statusdtks=false;
$statusdukcapil=false;
// $this->params['breadcrumbs'][] = ['label' => 'Unitkerjas', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
// \yii\web\YiiAsset::register($this);
?>
<div class="row">
  <div class="col-md-4">
    <div class="box box-success box-solid" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
        <div class="box-header bg-green">
            <strong  style="font-weight: bold;color:white;font-family:roboto;"><?= Html::encode('CEK NIK PERIODE OKTOBER 2020') ?></strong>
        </div>
        <div class="box-body">
            <?= $this->render('_formnik', [
                'model' => $model,
                // 'databantuan' =>$databantuan,
                'datadukcapil'=>$datadukcapil,
            ]) ?>
        </div>
    </div>
  </div>
</div>
<div class="row">
<?php if (!empty($model->nik)) { ?>
  <div class="col-md-6">
    <div class="box box-primary box-solid" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
        <div class="box-header bg-blue">
            <strong><?= Html::encode('Status Data') ?></strong>
        </div>
        <div class="box-body">
            <table class="table table-hover">
            <?php 
            $nilai=array_key_exists('RESPONSE_DESC', $datadukcapil);
            // dd($nilai);
            if (!empty($datadukcapil) && $nilai===false) { 

                ?>
                <tr>
                    <td>Status Dukcapil</td>
                    <td>:</td>
                    <td>Valid</td>
                </tr>
                
            <?php }else{?>
                <?php if ($datadukcapil===false || empty($datadukcapil)) {?>
                <tr>
                    <td>Status Dukcapil</td>
                    <td>:</td>
                    <td><strong><font color="red"> Service Dukcapil tidak respon!</font></strong></td>
                </tr>
                <?php }if($nilai===true){?>

                <tr>
                    <td>Status Dukcapil</td>
                    <td>:</td>
                    <td><strong><font color="red"> <?=$datadukcapil['RESPONSE_DESC']?></font></strong></td>
                </tr>

                    <?php } else{ ?>
                <tr>
                    <td>Status Dukcapil</td>
                    <td>:</td>
                    <td><strong><font color="red"> NIK ini tidak valid untuk duk capil mohon dikoreksi!</font></strong></td>
                </tr>
                <?php } ?>
            <?php } ?>
            <?php if (!empty($bdtart)) { ?>
                <tr>
                    <td>Status BDT / DTKS</td>
                    <td>:</td>
                    <td><strong><font color="green">Data masuk pada BDT / DTKS</font></strong></td>
                </tr>
                <!-- <tr>
                    <td>Surat Keterangan</td>
                    <td>:</td>
                    <td><?php //Html::a('<i class="fa fa-fw fa-print"></i>Cetak Surat Keterangan', ['cetak-surat/view', 'nik' => $model->nik], ['class' => 'btn btn-success'])?></td>
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
    <?php if (!empty($bdtrt)) { ?>
<div class="box box-primary box-solid" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            <!-- <div class="box-header"> -->
                <!-- <i class="fa fa-th"></i>
                        <h3 class="box-title">Kepersertaan Program</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div> -->
                        <div class="box-header bg-blue">
            <strong><?= Html::encode('Kepersertaan Program') ?></strong>
        </div>
            <!-- </div> -->
            <div class="box-body responsive">
                  <table class="table table-hover">
                   <?php
                   $tampil=''; 
                    $bpnt=0;
                    $nomorbpnt=0;
                    $pkh=0;
                    $nomorpkh=0;
                    $kis=0;
                    $nomorkis=0;
                    $kip=0;
                    $nomorkip=0;
                    
                        # code...
                    
                    if ($bdtrt->sta_kks==="Ya") {
                        $bpnt=1;
                        if (isset($bdtart->NoPesertaKKS2016) && $bdtart->NoPesertaKKS2016 ==="") {
                            //status ya tidak ada nomor {masalah}
                            $tampil.='<tr><td><strong style="color:red;">BPNT</td><td>:</td><td>'.$bdtart->NoPesertaKKS2016.'</strong><span class="pull-right-container">
                              <small class="label pull-right bg-blue">status jknkis iya tetapi tidak memiliki nomor</small>
                            </span></td><tr>';
                        }else{
                            //ada nomor dan status ya
                            $tampil.='<tr><td>BPNT</td><td>:</td><td>'.$bdtart->NoPesertaKKS2016.'</td><tr>';
                            $nomorbpnt=1;
                        }
                    }
                    if ($bdtrt->sta_kks==="Ya+") {
                        $bpnt=1;
                        if (isset($bdtart->NoPesertaKKS2016) && $bdtart->NoPesertaKKS2016 ==="") {
                            //status ya tidak ada nomor {masalah}
                            $tampil.='<tr><td><strong style="color:red;">BPNT</td><td>:</td><td>'.$bdtart->NoPesertaKKS2016.'</strong><span class="pull-right-container">
                              <small class="label pull-right bg-blue">status jknkis iya tetapi tidak memiliki nomor</small>
                            </span></td><tr>';
                        }else{
                            //ada nomor dan status ya+
                            $tampil.='<tr><td>BPNT</td><td>:</td><td>'.$bdtart->NoPesertaKKS2016.'</td><tr>';
                            $nomorbpnt=1;
                        }
                    }
                   
                    if ($bdtrt->sta_pkh==="Ya") {
                        $pkh=1;
                        if (isset($model->NoPesertaPKH) && $model->NoPesertaPKH ==="") {
                             //status ya tidak ada nomor {masalah}
                             $tampil.='<tr><td><strong style="color:red;">Program Keluarga Harapan (PKH) </td><td>:</td><td>'.$model->NoPesertaPKH.'</strong><span class="pull-right-container">
                              <small class="label pull-right bg-blue">status pkh iya tetapi tidak memiliki nomor</small>
                            </span></td><tr>';
                        }else{
                            //ada nomor dan status ya
                            $tampil.='<tr><td>Program Keluarga Harapan (PKH) </td><td>:</td><td>'.@$bdtrt->NoPesertaPKH.'</td><tr>';
                            $nomorpkh=1;
                        }  
                    }
                    if ($bdtrt->sta_pkh==="Ya+") {
                        $pkh=1;
                        if (isset($model->NoPesertaPKH) && $model->NoPesertaPKH ==="") {
                             //status ya tidak ada nomor {masalah}
                             $tampil.='<tr><td><strong style="color:red;">Program Keluarga Harapan (PKH) </td><td>:</td><td>'.$bdtart->NoPesertaPKH.'</strong><span class="pull-right-container">
                              <small class="label pull-right bg-blue">status pkh iya tetapi tidak memiliki nomor</small>
                            </span></td><tr>';
                        }else{
                            //ada nomor dan status ya+
                            $tampil.='<tr><td>Program Keluarga Harapan (PKH) </td><td>:</td><td>'.@$bdtart->NoPesertaPKH.'</td><tr>';
                            $nomorpkh=1;
                        }  
                    }
                   
                    if ($bdtrt->sta_kis==="Ya") {
                        $kis=1;
                        if (isset($bdtart->NoPesertaPBI) && $bdtart->NoPesertaPBI ==="") {
                            //status ya tidak ada nomor {masalah}
                            $tampil.='<tr><td><strong style="color:red;">Program Indonesia Sehat (PIS/PBI JKN) </td><td>:</td><td>'.$bdtart->NoPesertaPBI.'</strong>
                            <span class="pull-right-container">
                              <small class="label pull-right bg-blue">status jknkis iya tetapi tidak memiliki nomor</small>
                            </span></td><tr>';
                        }else{
                            //ada nomor dan status ya
                            $tampil.='<tr><td>Program Indonesia Sehat (PIS/PBI JKN) </td><td>:</td><td>'.$bdtart->NoPesertaPBI.'</td><tr>';
                            $nomorkis=1;
                        }
                    }
                    if ($bdtrt->sta_kis==="Ya+") {
                        $kis=1;
                        if (isset($bdtart->NoPesertaPBI) && $bdtart->NoPesertaPBI ==="") {
                            //status ya tidak ada nomor {masalah}
                            $tampil.='<tr><td><strong style="color:red;">Program Indonesia Sehat (PIS/PBI JKN) </td><td>:</td><td>'.$model->NoPesertaPBI.'</strong>
                            <span class="pull-right-container">
                              <small class="label pull-right bg-blue">status jknkis iya tetapi tidak memiliki nomor</small>
                            </span></td><tr>';
                        }else{
                            //ada nomor dan status ya+
                            $tampil.='<tr><td>Program Indonesia Sehat (PIS/PBI JKN) </td><td>:</td><td>'.$bdtart->NoPesertaPBI.'</td><tr>';
                            $nomorkis=1;
                        }
                    }
          
                    if ($bdtrt->sta_kip==="Ya") {
                        $kip=1;
                        if (isset($bdtart->bdtrt->PesertaKIP) && $bdtart->bdtrt->PesertaKIP ==="" || $bdtart->bdtrt->PesertaKIP === '0') {
                            //status ya tidak ada nomor atau 0 {masalah}
                            $tampil.='<tr><td>Kartu Indonesia Pintar (KIP)</td><td>:</td><td>'.$bdtart->bdtrt->PesertaKIP.'<span class="pull-right-container">
                              <small class="label pull-right bg-blue">status kip iya tetapi tidak memiliki nomor</small>
                            </span</td><tr>';
                        }else{
                            //ada nomor dan status ya
                            $tampil.='<tr><td>Kartu Indonesia Pintar (KIP) </td><td>:</td><td>'.$bdtart->bdtrt->PesertaKIP.'</td><tr>';
                            $nomorkip=1;
                        }                                                                                                            
                    }
               
                    $bt = array("bpnt", "pkh", "jkn/kis", "kip");
                    $detail =DetailPenerimaBantuan::find()->where(['nik' => $bdtart->NIK])->all();
                    foreach ($detail as $key => $value) {
                        if (isset($value)) {
                            $singkat =Bantuan::findOne($value->id_bantuan)->nama_bantuan;
                            
                            if(strtolower($singkat)==='bpnt' && $bpnt===0 || strtolower($singkat)==='pkh' && $pkh===0|| strtolower($singkat)==='jkn/kis' && $kis===0|| strtolower($singkat)==='kip' && $kip===0){
                                $tampil.='<tr><td><strong style="color:red;">'.strtolower($singkat).' </td><td>:</td><td> '.$value['nomor_bantuan'].'</strong></td><tr>';
                            }

                            if (!in_array(strtolower($singkat), $bt)) {
                                $tampil.='<tr><td><strong style="color:red;">'.$singkat.' </td><td>:</td><td> '.$value['nomor_bantuan'].'</strong></td><tr>';
                            }
                        }
 
                        }
                        echo $tampil;
                   ?>
                </table>
            </div>
        </div>
<?php  } ?>
  </div>

        


  <div class="col-md-6">
  <?php 

  if (!empty($datadukcapil) && $nilai===false) {$statusdukcapil=true; ?>
    <div class="box box-success box-solid" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
        <div class="box-header bg-green">
            <strong><?= Html::encode('Data Dukcapil') ?></strong>
        </div>
        <div class="box-body">
        <?php
        ?>    
            <?php
// print_r($datadukcapil);
                // $datadukcapil=@$datadukcapil[0];
                if (is_array($datadukcapil)) {
            
                    echo "<table class='table table-hover'>";
                        foreach ($datadukcapil as $nama_index=>$isi) {
                            $array_search = array('','NIK','NO_KK','NAMA_LGKP','TMPT_LHR','TGL_LHR','ALAMAT','NO_RT','NO_RW','KEC_NAME','KEL_NAME','NAMA_LGKP_IBU');
                            $result=array_search($nama_index,$array_search);
                            if (!empty($result)) {
                                echo "<tr>";
                                echo "<td>".ucwords(str_replace("_", " ", $nama_index))." </td> <td> : </td> <td> $isi </td>";
                                echo "</tr>";
                            }  
                        }
                    echo "</table>";
                }                    
            ?>
        </div>
    </div>
<?php } ?>

     <?php if (!empty($bdtart)){ $statusdtks=true;?>
    <div class="box box-danger box-solid">
        <div class="box-header bg-red">
            <strong><?= Html::encode('Data Sidaksos') ?></strong>
        </div>
        <div class="box-body">
            <table class="table table-hover" cellpadding="0">
                <tr>
                    <td>IDBDT</td>
                    <td>:</td>
                    <td><?=$bdtart->IDBDT?></td>
                </tr>
                <tr>
                    <td>NIK</td>
                    <td>:</td>
                    <td><?=$bdtart->NIK?></td>
                </tr>
                <tr>
                    <td>Hubungan Keluarga</td>
                    <td>:</td>
                    <td><?= $bdtart->Hubkel?></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td><?= $bdtart->Nama?></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td><?= $bdtrt->Alamat?></td>
                </tr>
                <tr>
                    <td>Kecamatan</td>
                    <td>:</td>
                    <td><?=Kecamatan::find()->where(['KodeKecamatan'=>$bdtart->KDKEC])->one()->Nama?></td>
                </tr>
                <tr>
                    <td>Kelurahan</td>
                    <td>:</td>
                    <td><?=Kelurahan::find()->where(['KodeKecamatan'=>$bdtart->KDKEC,'KodeKelurahan'=>$bdtart->KDDESA])->one()->Nama?></td>
                </tr>
                <tr>
                        <td>Jenis Kelamin</td>
                        <td>:</td>
                        <td><?=$bdtart->JnsKel?></td>
                    </tr>
                    <tr>
                        <td>Tanggal Lahir</td>
                        <td>:</td>
                        <td><?=Actions::convDateTimeIndonesia($bdtart->TglLahir)?></td>
                    </tr>
                    <tr>
                        <td>Umur</td>
                        <td>:</td>
                        <td><?=$bdtart->Umur?> Tahun</td>
                    </tr>
                    <tr>
                        <td>Nomor KK</td>
                        <td>:</td>
                        <td><?=$bdtart->NoKK?></td>
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
            // print_r($databantuan);
                // $datadukcapil=@$datadukcapil[0];
                if (is_array($databantuan)) {
                    echo "<table class='table table-hover'>";
                        foreach ($databantuan as $nama_index=>$isi) {
                            switch ($nama_index) {
                                // case 'Bansossembakotahap1':
                                //     echo "<tr>";
                                //     if ($isi==true) {
                                //         $isi=Html::a('terdaftar', ['bansossembakotahap1/index', 'nik' => $model->nik], ['class' => '']);
                                //     }else{
                                //         $isi="tidak terdaftar";
                                //     }
                                //     echo "<td> Bansos Sembako APBD Kota Semarang </td> <td> : </td> <td> $isi </td>";
                                //     echo "</tr>";
                                //     break;
                                // case 'Bansossembakotahap2':
                                //     echo "<tr>";
                                //     if ($isi==true) {
                                //         $isi=Html::a('terdaftar', ['bansossembakotahap2/index', 'nik' => $model->nik], ['class' => '']);
                                //     }else{
                                //         $isi="tidak terdaftar";
                                //     }
                                //     echo "<td> Bansos Sembako APBD Kota Semarang Tahap 2</td> <td> : </td> <td> $isi </td>";
                                //     echo "</tr>";
                                //     break;  
                                // case 'Bansossembakotahap3':
                                //     echo "<tr>";
                                //     if ($isi==true) {
                                //         $isi=Html::a('terdaftar', ['bansossembakotahap3/index', 'nik' => $model->nik], ['class' => '']);
                                //     }else{
                                //         $isi="tidak terdaftar";
                                //     }
                                //     echo "<td> Bansos Sembako APBD Kota Semarang Tahap 3</td> <td> : </td> <td> $isi </td>";
                                //     echo "</tr>";
                                //     break;    
                                // case 'Jpsprovinsijateng':
                                //     echo "<tr>";
                                //     if ($isi==true) {
                                //         $isi=Html::a('terdaftar', ['jpsprovinsijateng/index', 'nik' => $model->nik], ['class' => '']);
                                //     }else{
                                //         $isi="tidak terdaftar";
                                //     }
                                //     echo "<td> Jps Provinsi Jateng </td> <td> : </td> <td> $isi </td>";
                                //     echo "</tr>";
                                //     break;
                                // case 'Jpsprovinsijateng2':
                                //     echo "<tr>";
                                //     if ($isi==true) {
                                //         $isi=Html::a('terdaftar', ['jpsprovinsijateng2/index', 'nik' => $model->nik], ['class' => '']);
                                //     }else{
                                //         $isi="tidak terdaftar";
                                //     }
                                //     echo "<td> Jps Provinsi Jateng Tahap 2</td> <td> : </td> <td> $isi </td>";
                                //     echo "</tr>";
                                //     break;
                                // case 'Sembakobantuanpresiden':
                                //     echo "<tr>";
                                //     if ($isi==true) {
                                //         $isi=Html::a('terdaftar', ['sembakobantuanpresiden/index', 'nik' => $model->nik], ['class' => '']);
                                //     }else{
                                //         $isi="tidak terdaftar";
                                //     }
                                //     echo "<td> Program Sembako Presiden </td> <td> : </td> <td> $isi </td>";
                                //     echo "</tr>";
                                //     break;
                                // case 'Bstnondtks':
                                //     echo "<tr>";
                                //     if ($isi==true) {
                                //         $isi=Html::a('terdaftar', ['bstnondtks/index', 'nik' => $model->nik], ['class' => '']);
                                //     }else{
                                //         $isi="tidak terdaftar";
                                //     }
                                //     echo "<td> BST NON DTKS </td> <td> : </td> <td> $isi </td>";
                                //     echo "</tr>";
                                //     break;
                                // case 'Bstdtks':
                                //     echo "<tr>";
                                //     if ($isi==true) {
                                //         $isi=Html::a('terdaftar', ['bstdtks/index', 'nik' => $model->nik], ['class' => '']);
                                //     }else{
                                //         $isi="tidak terdaftar";
                                //     }
                                //     echo "<td> BST DTKS </td> <td> : </td> <td> $isi </td>";
                                //     echo "</tr>";
                                //     break;
                                // case 'Sembakoregulerkemensos':
                                //     echo "<tr>";
                                //     if ($isi==true) {
                                //         $isi=Html::a('terdaftar', ['sembakoregulerkemensos/index', 'nik' => $model->nik], ['class' => '']);
                                //     }else{
                                //         $isi="tidak terdaftar";
                                //     }
                                //     echo "<td> Program Sembako Reguler Kemensos </td> <td> : </td> <td> $isi </td>";
                                //     echo "</tr>";
                                //     break;
                                // case 'Sembakoperluasankemensos':
                                //     echo "<tr>";
                                //     if ($isi==true) {
                                //         $isi=Html::a('terdaftar', ['sembakoperluasankemensos/index', 'nik' => $model->nik], ['class' => '']);
                                //     }else{
                                //         $isi="tidak terdaftar";
                                //     }
                                //     echo "<td> Program Sembako Perluasan Kemensos </td> <td> : </td> <td> $isi </td>";
                                //     echo "</tr>";
                                //     break;
                                // case 'Programpkhkemensos':
                                //     echo "<tr>";
                                //     if ($isi==true) {
                                //         $isi=Html::a('terdaftar', ['programpkhkemensos/index', 'nik' => $model->nik], ['class' => '']);
                                //     }else{
                                //         $isi="tidak terdaftar";
                                //     }
                                //     echo "<td> Program PKH Kemensos </td> <td> : </td> <td> $isi </td>";
                                //     echo "</tr>";
                                //     break;
                                // case 'Covid19':
                                //     echo "<tr>";
                                //     if ($isi==true) {
                                //         $isi=Html::a('terdaftar', ['covid19/index', 'nik' => $model->nik], ['class' => '']);
                                //     }else{
                                //         $isi="tidak terdaftar";
                                //     }
                                //     echo "<td> Bantuan Covid19 </td> <td> : </td> <td> $isi </td>";
                                //     echo "</tr>";
                                //     break;
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
                            // $array_search = array('','NIK','NAMA_LGKP','TMPT_LHR');
                            // $result=array_search($nama_index,$array_search);
                            // if (!empty($result)) {
                                
                            // }  
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