<?php
use app\models\P3keKeluarga2023;
use app\models\P3keIndividu2023;
use app\models\Account;
use app\models\Kecamatan;
use app\models\Actions;
use app\models\ActionsHelper2023;
use app\models\Dokumen;
use app\models\Pengampu;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

$keluarga=@P3keKeluarga2023::find()->where(['idp3ke'=>@$idp3ke])->one();
$individu=@P3keIndividu2023::find()->where(['idp3ke'=>@$idp3ke])->all();
// dd($keluarga->kepala_keluarga);
// $imageBase64=$keluarga->foto_rumah;
$imageBase64 = base64_encode($keluarga->foto_rumah);
?>
<center><h3 style="text-align:center;">PROFIL</h3></center>
<table class="table" cellpadding="2" cellspacing="0" width="100%">
    <tr>
        <td>&#8226;</td>
        <td>Kecamatan</td>
        <td>:</td>
        <td><?=ucwords(strtolower($keluarga->kecamatan))?></td>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
        <td>&#8226;</td>
        <td>Lantai Rumah</td>
        <td>:</td>
        <td><?=$keluarga->jenis_lantai?></td>
        <td rowspan="8"><img src="data:image/jpeg;base64,<?= $imageBase64 ?>" alt="Foto Rumah" width="113.385" height="170.118" /></td>
    </tr>
    <tr>
        <td>&#8226;</td>
        <td>Kelurahan</td>
        <td>:</td>
        <td><?=ucwords(strtolower($keluarga->kelurahan))?></td>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
        <td>&#8226;</td>
        <td>Bahan Bakar Memasak</td>
        <td>:</td>
        <td><?=$keluarga->bahan_bakar_memasak?></td>
    </tr>
    <tr>
        <td>&#8226;</td>
        <td>Idp3ke</td>
        <td>:</td>
        <td><?=$keluarga->idp3ke?></td>
        <td></td>
        <td>&#8226;</td>
        <td>Atap Rumah</td>
        <td>:</td>
        <td><?=$keluarga->jenis_atap?></td>
    </tr>
    <tr>
        <td>&#8226;</td>
        <td>Kepala Keluarga</td>
        <td>:</td>
        <td><?=ucwords(strtolower($keluarga->kepala_keluarga))?></td>
        <td></td>
        <td>&#8226;</td>
        <td>Sumber Air Bersih</td>
        <td>:</td>
        <td><?=$keluarga->sumber_air_minum?></td>
    </tr>
    <tr>
        <td>&#8226;</td>
        <td>Alamat</td>
        <td>:</td>
        <td><?=ucwords(strtolower($keluarga->alamat))?></td>
        <td></td>
        <td>&#8226;</td>
        <td>Status Kepemilikan Rumah</td>
        <td>:</td>
        <td><?=$keluarga->kepemilikan_rumah?></td>
    </tr>
    <tr>
        <td>&#8226;</td>
        <td>Status Kemiskinan</td>
        <td>:</td>
        <td><?=ucwords(strtolower($keluarga->status_kemiskinan))?></td>
        <td></td>
        <td>&#8226;</td>
        <td>Dinding Rumah</td>
        <td>:</td>
        <td><?=$keluarga->jenis_dinding?></td>
    </tr>
    <tr>
        <td>&#8226;</td>
        <td>Total Per Hari</td>
        <td>:</td>
        <td><?=formatRupiah($keluarga->total_per_hari)?></td>
        <td></td>
        <td>&#8226;</td>
        <td>Sumber Listrik Rumah</td>
        <td>:</td>
        <td><?=$keluarga->sumber_penerangan?></td>
    </tr>
    <tr>
        <td>&#8226;</td>
        <td>Total Pendapatan Keluarga Sebulan</td>
        <td>:</td>
        <td><?=formatRupiah($keluarga->total_pendapatan_keluarga_sebulan)?></td>
        <td></td>
        <td>&#8226;</td>
        <td>Fasilitas Buang Air Besar</td>
        <td>:</td>
        <td><?=$keluarga->memiliki_fasilitas_buang_air_besar?></td>
    </tr>
</table>

<table border="1" cellspacing="0" cellpadding="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Kepala Keluarga</th>
                <th>Status</th>
                <th>Usia</th>
                <th>Pekerjaan</th>
                <th>Kebutuhan</th>
                <th>Bentuk Intervensi</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Selesai</th>
                <th>OPD Pelaksana</th>
                <th>Acc Team</th>
            </tr>
        </thead>
        <tbody>
<?php

$hasil='';
$data['kebutuhan']['fasilitas_bantuan_permakanan']=$keluarga->fasilitas_bantuan_permakanan;
$data['kebutuhan']['rehab_rumah_tidak_layak_huni']=$keluarga->rehab_rumah_tidak_layak_huni;
$data['kebutuhan']['fasilitas_sanitasi_permukiman']=$keluarga->fasilitas_sanitasi_permukiman; 
$data['kebutuhan']['fasilitas_sumber_air_bersih']=$keluarga->fasilitas_sumber_air_bersih;
$i=0;
foreach ($data['kebutuhan'] as $key => $value) {
    if($value==1 && empty($hasil[$i])){
        $hasil[]=$key;
        $i++;
    }
    
}
// $hasil = array_unique($hasil);
// dd($hasil);
// $kebutuhan1=(!empty($hasil[0]))?$hasil[0]:'-';
// $kebutuhan2=(!empty($hasil[1]))?$hasil[1]:'-';


$a=0;
foreach ($individu as $key => $value) { 
    $t=ActionsHelper2023::getKebutuhan($value->idp3ke,$value->nik);
    $data='';
    $data[$a]['kebutuhan_individu']['fasilitas_administrasi_kependudukan']=$value->fasilitas_administrasi_kependudukan;
    $data[$a]['kebutuhan_individu']['fasilitas_jaminan_kesehatan']=$value->fasilitas_jaminan_kesehatan;
    $data[$a]['kebutuhan_individu']['penanganan_stunting_dan_gizi_buruk']=$value->penanganan_stunting_dan_gizi_buruk; 
    $data[$a]['kebutuhan_individu']['fasilitas_alat_bantu_penyandang_disabilitas']=$value->fasilitas_alat_bantu_penyandang_disabilitas;
    $data[$a]['kebutuhan_individu']['fasilitas_layanan_pendidikan']=$value->fasilitas_layanan_pendidikan;
    $data[$a]['kebutuhan_individu']['fasilitas_layanan_ketenagakerjaan']=$value->fasilitas_layanan_ketenagakerjaan;
    $data[$a]['kebutuhan_individu']['pemberdayaan_ekonomi']=$value->pemberdayaan_ekonomi; 
    $data[$a]['kebutuhan_individu']['pelayanan_keluarga_berencana']=$value->pelayanan_keluarga_berencana;
    $data[$a]['kebutuhan_individu']['pengembangan_pertanian_perikanan_peternakan']=$value->pengembangan_pertanian_perikanan_peternakan;
    $b=count($hasil);
    foreach ($data[$a]['kebutuhan_individu'] as $key2 => $value2) {
        if($value2==1){
            $hasil[]=$key2;
            $b++;
        }
    }
    $hasil = array_unique($hasil);

    // dd($hasil);
    $kebutuhan1=(!empty($hasil[0]))?$hasil[0]:'-';
    $kebutuhan2=(!empty($hasil[1]))?$hasil[1]:'-';
    $kebutuhan3=(!empty($hasil[2]))?$hasil[2]:'-';
    $kebutuhan4=(!empty($hasil[3]))?$hasil[3]:'-';
    $kebutuhan5=(!empty($hasil[4]))?$hasil[4]:'-';
    $kebutuhan6=(!empty($hasil[5]))?$hasil[5]:'-';
    $kebutuhan7=(!empty($hasil[6]))?$hasil[6]:'-';
    $kebutuhan8=(!empty($hasil[7]))?$hasil[7]:'-';
    // dd($data);
    // $kebutuhanindividu1=(!empty($hasilindividu[0]))?$hasilindividu[0]:'-';
    // $kebutuhanindividu2=(!empty($hasilindividu[1]))?$hasilindividu[1]:'-';
    $a++;  
    ?>
    <tr>
        <td rowspan="4"><?=$a?></td>
        <td rowspan="4"><?=ucwords(@$value->nama)?></td>
        <td rowspan="4"><?=('Kepala Keluarga'==$value->hubungan_dgn_kepala_keluarga)?'Ya':'-';?></td>
        <td rowspan="4"><?=$value->hubungan_dgn_kepala_keluarga?></td>
        <td rowspan="4"><?=hitung_umur($value->tanggal_lahir)?></td>
        <td rowspan="4"><?=$value->pekerjaan?></td>
        <?php
        // if($value->hubungan_dgn_kepala_keluarga=="Kepala Keluarga"){
            echo '<td>'.ucwords(str_replace('_', ' ', @$kebutuhan1)).'</td>';
        // }else{
        //     echo '<td>'.ucwords(str_replace('_', ' ', @$kebutuhanindividu1)).'</td>';
        // }
        ?>
        <?php
        // if($value->hubungan_dgn_kepala_keluarga=="Kepala Keluarga"){
            echo '<td>'.ucwords(@Pengampu::find()->where(['kolom_keluarga'=>$kebutuhan1])->one()->keterangan).'</td>';
        // }else{
        //     echo '<td>'.ucwords(@Pengampu::find()->where(['kolom_individu'=>@$kebutuhanindividu1])->one()->keterangan).'</td>';
        // }
        ?>
        <td></td>
        <td></td>
        <?php
        // if($value->hubungan_dgn_kepala_keluarga=="Kepala Keluarga"){
            echo '<td>'.@Pengampu::find()->where(['kolom_keluarga'=>$kebutuhan1])->one()->singkatan.'</td>';
        // }else{
        //     echo '<td>'.@Pengampu::find()->where(['kolom_individu'=>@$kebutuhanindividu1])->one()->singkatan.'</td>';
        // }
        ?>
         <td></td>
    </tr>
    <tr>
    <?php
        // if($value->hubungan_dgn_kepala_keluarga=="Kepala Keluarga"){
            echo '<td>'.ucwords(str_replace('_', ' ', @$kebutuhan2)).'</td>';
        // }else{
        //     echo '<td>'.ucwords(str_replace('_', ' ', @$kebutuhanindividu2)).'</td>';
        // }
        ?>
        <?php
        // if($value->hubungan_dgn_kepala_keluarga=="Kepala Keluarga"){
            echo '<td>'.ucwords(@Pengampu::find()->where(['kolom_keluarga'=>$kebutuhan2])->one()->keterangan).'</td>';
        // }else{
        //     echo '<td>'.ucwords(@Pengampu::find()->where(['kolom_individu'=>@$kebutuhanindividu2])->one()->keterangan).'</td>';
        // }
        ?>
        <td></td>
        <td></td>
        <?php
        // if($value->hubungan_dgn_kepala_keluarga=="Kepala Keluarga"){
            echo '<td>'.@Pengampu::find()->where(['kolom_keluarga'=>$kebutuhan2])->one()->singkatan.'</td>';
        // }else{
        //     echo '<td>'.@Pengampu::find()->where(['kolom_individu'=>@$kebutuhanindividu2])->one()->singkatan.'</td>';
        // }
        ?>
         <td></td>
    </tr>
    <tr>
    <?php
        // if($value->hubungan_dgn_kepala_keluarga=="Kepala Keluarga"){
            echo '<td>'.ucwords(str_replace('_', ' ', @$kebutuhan3)).'</td>';
        // }else{
        //     echo '<td>'.ucwords(str_replace('_', ' ', @$kebutuhanindividu2)).'</td>';
        // }
        ?>
        <?php
        // if($value->hubungan_dgn_kepala_keluarga=="Kepala Keluarga"){
            echo '<td>'.ucwords(@Pengampu::find()->where(['kolom_keluarga'=>$kebutuhan3])->one()->keterangan).'</td>';
        // }else{
        //     echo '<td>'.ucwords(@Pengampu::find()->where(['kolom_individu'=>@$kebutuhanindividu2])->one()->keterangan).'</td>';
        // }
        ?>
        <td></td>
        <td></td>
        <?php
        // if($value->hubungan_dgn_kepala_keluarga=="Kepala Keluarga"){
            echo '<td>'.@Pengampu::find()->where(['kolom_keluarga'=>$kebutuhan3])->one()->singkatan.'</td>';
        // }else{
        //     echo '<td>'.@Pengampu::find()->where(['kolom_individu'=>@$kebutuhanindividu2])->one()->singkatan.'</td>';
        // }
        ?>
         <td></td>
    </tr>
    <tr>
    <?php
        // if($value->hubungan_dgn_kepala_keluarga=="Kepala Keluarga"){
            echo '<td>'.ucwords(str_replace('_', ' ', @$kebutuhan4)).'</td>';
        // }else{
        //     echo '<td>'.ucwords(str_replace('_', ' ', @$kebutuhanindividu2)).'</td>';
        // }
        ?>
        <?php
        // if($value->hubungan_dgn_kepala_keluarga=="Kepala Keluarga"){
            echo '<td>'.ucwords(@Pengampu::find()->where(['kolom_keluarga'=>$kebutuhan4])->one()->keterangan).'</td>';
        // }else{
        //     echo '<td>'.ucwords(@Pengampu::find()->where(['kolom_individu'=>@$kebutuhanindividu2])->one()->keterangan).'</td>';
        // }
        ?>
        <td></td>
        <td></td>
        <?php
        // if($value->hubungan_dgn_kepala_keluarga=="Kepala Keluarga"){
            echo '<td>'.@Pengampu::find()->where(['kolom_keluarga'=>$kebutuhan4])->one()->singkatan.'</td>';
        // }else{
        //     echo '<td>'.@Pengampu::find()->where(['kolom_individu'=>@$kebutuhanindividu2])->one()->singkatan.'</td>';
        // }
        ?>
         <td></td>
    </tr>
    
<?php   //dd($value);

}
?>
        </tbody>
</table>
<?php

//  echo "<pre>";
//  print_r($hasilindividu);
//  echo "</pre>";
//  // exit;

?>