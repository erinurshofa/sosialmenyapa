<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Kecamatan;
use app\models\Kelurahan;
use app\models\Actions;
use app\models\DetailPenerimaBantuan;
use app\models\Bantuan;
use app\models\DtksMaret2022Dtks;
use app\models\StatusKematian;
use app\models\ActionsService;
/* @var $this yii\web\View */
/* @var $model app\models\Unitkerja */

$this->title = 'CEK NO KK BERDASARKAN DATA PERIODE MARET 2022';
$statusdtks=false;
$statusdukcapil=false;
// $this->params['breadcrumbs'][] = ['label' => 'Unitkerjas', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
// \yii\web\YiiAsset::register($this);
?>
<div class="row">
  <div class="col-md-6">
    <div class="box box-danger box-solid" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
        <div class="box-header bg-danger">
            <strong><?= Html::encode('CEK NO KK BERDASARKAN DATA PERIODE MARET 2022') ?></strong>
        </div>
        <div class="box-body">
            <?= $this->render('_formnokk', [
                'model' => $model,
                'dtks' =>$dtks,
                'datadukcapil'=>$datadukcapil,
            ]) ?>
        </div>
    </div>
</div>
<?php if (!empty($model->nokk)) { ?>
<div class="col-md-6">
    <div class="box box-primary box-solid"  style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
        <div class="box-header bg-blue">
            <strong><?= Html::encode('Status Data') ?></strong>
        </div>
        <div class="box-body">
            <table class="table table-hover">
            <?php if (!empty($datadukcapil)) { ?>
                <tr>
                    <td>Status Dukcapil</td>
                    <td>:</td>
                    <td>Valid</td>
                </tr>
            <?php }else{?>
                <?php if ($datadukcapil===false) {?>
                <tr>
                    <td>Status Dukcapil</td>
                    <td>:</td>
                    <td><strong><font color="red"> Service Dukcapil tidak respon!</font></strong></td>
                </tr>
                <?php } else{ ?>
                <tr>
                    <td>Status Dukcapil</td>
                    <td>:</td>
                    <td><strong><font color="red"> Pencarian NIK berdasarkan No KK tidak valid!</font></strong></td>
                </tr>
                <?php } ?>
            <?php } ?>
            <?php if (!empty($dtks)) { ?>
                <tr>
                    <td>Status BDT / DTKS</td>
                    <td>:</td>
                    <td><strong><font color="green">Data masuk pada BDT / DTKS</font></strong></td>
                </tr>
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
   
</div>
 <?php } ?>
  </div>


<!-- end row kedua -->
<div class="row">
<div class="col-md-12">
  <?php if (!empty($data)) {?>
    <div class="box box-success box-solid" >
        <div class="box-header bg-green">
            <strong><?= Html::encode('Data Bantuan') ?></strong>
        </div>
        <div class="box-body">
        <?php
        ?>    
            <?php
                if (is_array($data)) {
                    echo "<table class='table table-hover'>";
                        foreach ($data as $nama_index=>$isi) {
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
<?php if (!empty($dtks)) {?>
        <div class="box box-navy box-solid" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
    <div class="box-header bg-navy">
        <strong><?= Html::encode('Anggota Rumah Tangga Masuk DTKS') ?></strong>
    </div>
    <div class="box-body">
    <div class="table-responsive">
<table class="table table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>NIK</th>
                    <th>Nama Art</th>
                    <th>Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Kecamatan</th>
                    <th>Kelurahan</th>
                    <th>Hubungan Keluarga</th>
                    <th>Opsi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    $tam='';
                    $num=1;
                    foreach ($dtks as $key => $value) {
                        // dd($value);
                        // $bantuan=ActionsService::getpenerimabantuan($value['nik']);
                        // $data=(DtksMaret2022Dtks::find()->where(['nik'=>$value['nik']])->exists()) ? 'Terdaftar':'Tidak Terdaftar';
                        $tam .= '<tr>
                    <td>'.$num++.'</td>
                    <td>'.Html::a($value['nik'], ['validasi/ceknikperiodebaru', 'nik' => $value['nik']], ['class' => '']).'</td>
                    <td>'.$value['nama'].'</td>
                    <td>'.Actions::convDateTimeIndonesia($value['tanggal_lahir']).'</td>
                    <td>'.$value['jenis_kelamin'].'</td>
                    <td>'.$value['kecamatan'].'</td>
                    <td>'.$value['kelurahan'].'</td>
                    <td>'.$value['hub_keluarga'].'</td>
                    <td>'.Html::a('<i class="fa fa-fw fa-search"></i>Detail', ['dtks-maret2022-dtks/view', 'id' => $value['id']], ['class' => 'btn btn-info btn-sm']).'</td>
                  </tr>';
                    }
                    echo $tam;
                  
                  
                  ?>
           
                  </tbody>
                </table>
                </div>
        </div>
      </div>
      <?php } ?>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
<?php if (!empty($datadukcapil)) {?>
        <div class="box box-warning box-solid" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
    <div class="box-header bg-orange">
        <strong><?= Html::encode('Anggota Rumah Tangga Berdasarkan Dukcapil') ?></strong>
    </div>
    <div class="box-body">
    <div class="table-responsive">
<table class="table table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>NIK</th>
                    <th>Nama Art</th>
                    <th>Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Jenis Bantuan</th>
                    <th>Status DTKS</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    $tam='';
                    $num=1;
                    foreach ($datadukcapil as $key => $value) {
                        $jeniskelamin=($value['JENIS_KLMIN'] == 1) ? 'Laki-Laki' : 'Perempuan';
                        $bantuan=ActionsService::getpenerimabantuan($value['NIK']);
                        $data=(DtksMaret2022Dtks::find()->where(['nik'=>$value['NIK']])->exists()) ? '<strong style="color:green;">Terdaftar</strong>':'<strong style="color:red;">Tidak Terdaftar</strong>';
                        $tam .= '<tr>
                    <td>'.$num++.'</td>
                    <td>'.Html::a($value['NIK'], ['validasi/ceknikperiodebaru', 'nik' => $value['NIK']], ['class' => '']).'</td>
                    <td>'.$value['NAMA_LGKP'].'</td>
                    <td>'.Actions::convDateTimeIndonesia($value['TGL_LHR']).'</td>
                    <td>'.$jeniskelamin.'</td>
                    <td>'.$bantuan['jenis_bantuan'].'</td>
                    <td>'.$data.'</td>
                  </tr>';
                    }
                    echo $tam;
                  ?>
           
                  </tbody>
                </table>
                </div>
        </div>
      </div>
      <?php } ?>
    </div>
</div>