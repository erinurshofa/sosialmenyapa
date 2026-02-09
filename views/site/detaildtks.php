<?php
use yii\helpers\Url;
use app\models\Actions;
// use Da\QrCode\QrCode;
// use Da\QrCode\Format\BookMarkFormat; 
use app\models\Bdtart;
use app\models\BspSeptember2021;
use app\models\BstMeiJuni2021;
use app\models\PkhJuli2021;
$nik=@Yii::$app->getRequest()->getQueryParam('nik');
$punyadtks=Bdtart::find()->where(['NIK' => $nik])->exists();

$punyabsp=BspSeptember2021::find()->where(['nik_ktp' => $nik])->exists();
$punyabst=BstMeiJuni2021::find()->where(['no_identitas' => $nik])->exists();
$punyapkh=PkhJuli2021::find()->where(['nik' => $nik])->exists();

$urlqr='http://sidaksos.semarangkota.go.id/index.php?r=site%2Fdetaildtks&nik='.$model['Nik'];

$adabsp= ($punyabsp) ? 'Ya' : 'Tidak';
$adapkh= ($punyapkh) ? 'Ya' : 'Tidak';
$adapbi= ($model['bdtart']['Ada_pbi'] == 'Ya') ? 'Ya' : 'Tidak';

$this->title = 'SIDAKSOS VERSI 2';
?>

	

 <?php
    $gambar="background-image:url(\"http://".$_SERVER['HTTP_HOST'].Yii::$app->urlManager->baseUrl."/theme1/img/hero-bg2.svg\");opacity:1;";
    ?>
<div class="wrapper hold-transition skin-green layout-top-nav">
 <header class="main-header">
    <nav class="navbar navbar-static-top">
<div class="container">
     <div class="navbar-header">
          <a href=<?=Url::to(['site/index'])?> class="navbar-brand"><b>Dinas Sosial Kota Semarang</b></a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
    </div>
<div class="collapse navbar-collapse pull-right" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href=<?=Url::to(['site/index'])?>>Home <span class="sr-only">(current)</span></a></li>
            <!-- <li><a href=<?php //Url::to(['site/permohonanakun'])?>>Permohonan Akun <span class="sr-only">(current)</span></a></li> -->
            <li><a href=<?=Url::to(['site/login'])?>>Login</a></li>
          </ul>
</div>
</div>
</nav>
</header>
</div>
<br> <br>
<?php if ($punyadtks): ?>
<div class="container">
<div class="jumbotron text-shadow">
	DATA DIBAWAH INI VALID
<br>
<?php



?>


<table>
	<tr>
		<td>Lampiran</td>
		<td>:</td>
		<td>1 Lembar</td>
	</tr>
</table>
<br>
<h5>Menyatakan Bahwa</h5>
<table class="table table-hover">
	<tr>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td>NIK</td>
		<td>:</td>
		<td><strong><?=$model['Nik']?></strong></td>
	</tr>
</table>
<table>
	<tr>
		<td>Terdaftar pada <strong>Data Terpadu Kesejahteraan Sosial Kementerian Sosial R.I (DTKS)</strong> dengan data sebagai berikut :</td>
		<td><?php //echo '<img width="100px" height="100px" src="' . $qrCode->writeDataUri() . '">'; ?></td>
	</tr>
</table>
 

<table class="table table-hover">
	<tr>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td>Provinsi</td>
		<td>:</td>
		<td><strong>JAWA TENGAH</strong></td>
	</tr>
	<tr>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td>Kab/Kota</td>
		<td>:</td>
		<td><strong>KOTA SEMARANG</strong></td>
	</tr>
	<tr>
	    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td>Kecamatan</td>
		<td>:</td>
		<td><strong><?=@strtoupper($model['kecamatan'])?></strong></td>
	</tr>
	<tr>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td>Desa</td>
		<td>:</td>
		<td><strong><?=@strtoupper($model['kelurahan'])?></strong></td>
	</tr>
	<tr>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td>ID DTKS</td>
		<td>:</td>
		<td><strong><?=$model['bdtart']['IDBDT']?></strong></td>
	</tr>
	<tr>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td>ID ART DTKS</td>
		<td>:</td>
		<td><strong><?=$model['bdtart']['IDARTBDT']?></strong></td>
	</tr>
	<tr>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td>Nama</td>
		<td>:</td>
		<td><strong><?=$model['datadukcapil']['NAMA_LGKP']?></strong></td>
	</tr>
	<tr>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td>No KK</td>
		<td>:</td>
		<td><strong><?=$model['datadukcapil']['NO_KK']?></strong></td>
	</tr>
	<tr>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td>Tgl Lahir</td>
		<td>:</td>
		<td><strong><?=strtoupper(Actions::convDateTanggal($model['datadukcapil']['TGL_LHR']))?></strong></td>
	</tr>
	<tr>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td>Alamat</td>
		<td>:</td>
		<td><strong><?=@$model['bdtrt']['Alamat']?></strong></td>
	</tr>
	<tr>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td>Kepesertaan Rumah Tangga</td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td>BSP</td>
		<td>:</td>
		<td><strong><?=$adabsp?></strong></td>
	</tr>
	<tr>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td>PKH</td>
		<td>:</td>
		<td><strong><?=$adapkh?></strong></td>
	</tr>
	<tr>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td>PBI</td>
		<td>:</td>
		<td><strong><?=$adapbi?></strong></td>
	</tr>
</table>
<p>Demikian surat keterangan ini dibuat untuk dapat dipergunakan sebagaimana mestinya.</p>

<span style="font-size:12px;">Catatan :</span><br>
<span style="font-size:12px;">Berdasarkan Data Terpadu Kesejahteraan Sosial Kementerian Sosial R.I Periode Oktober 2020
</span><br>
<span style="font-size:12px;">BSP adalah Bantuan Sosial Pangan yang berupa bantuan tunai dan non tunai (BPNT)
</span><br>
<span style="font-size:12px;">PKH adalah Program Keluarga Harapan yang memberi bantuan sosial bersyarat untuk percepatan pengentasan kemiskinan
</span><br>
<span style="font-size:12px;">PBI adalah Penerima Bantuan Iuran Jaminan Kesehatan yang iuran BPJS Kesehatannya dibayarkan oleh pemerintah (APBN)
</span><br>
<span style="font-size:12px;">dicetak dari Aplikasi SIDAKSOS tanggal : <?=Actions::convDateTanggal(date('Y-m-d'))?></p>

<div style="page-break-before: always;">&nbsp;</div>

<table class="table table-hover" style="border: 2px solid black;" cellspacing="0" cellpadding="0">
                  <tr>
                  	<td style="border-bottom: 2px solid black;" colspan="6"><strong>&nbsp;&nbsp;LAMPIRAN</strong></td>
                  </tr>
                  <tr>
                  	<td style="border-bottom: 2px solid black;" colspan="6"><center>DAFTAR ANGGOTA RUMAH TANGGA</center></td>
                  </tr>
                  <tr>
                    <td style="border-bottom: 2px solid black;border-right: 2px solid black;">&nbsp;&nbsp;No&nbsp;&nbsp;</td>
                    <td style="border-bottom: 2px solid black;border-right: 2px solid black;">&nbsp;&nbsp;ID ART DTKS&nbsp;&nbsp;</td>
                    <td style="border-bottom: 2px solid black;border-right: 2px solid black;">&nbsp;&nbsp;Nama Art&nbsp;&nbsp;</td>
                    <td style="border-bottom: 2px solid black;border-right: 2px solid black;">&nbsp;&nbsp;Jenis Kelamin&nbsp;&nbsp;</td>
                    <td style="border-bottom: 2px solid black;border-right: 2px solid black;">&nbsp;&nbsp;HubKel Dgn KK&nbsp;&nbsp;</td>
                    <td style="border-bottom: 2px solid black;">&nbsp;&nbsp;Tanggal Lahir&nbsp;&nbsp;</td>
                  </tr>
                  <tr>
                  	<td style="border-bottom: 2px solid black;" colspan="6">&nbsp;&nbsp;&nbsp;</td>
                  </tr>
                  <?php
                    $listbdt = Bdtart::find()->where(['IDBDT' => $model['bdtart']->IDBDT])->all();
                    $tam='';
                    $num=1;
                    foreach ($listbdt as $key => $value) {
                        $tam .= '<tr>
                    <td style="border-bottom: 2px solid black;border-right: 2px solid black;">&nbsp;&nbsp;'.$num++.'&nbsp;&nbsp;</td>
                    <td style="border-bottom: 2px solid black;border-right: 2px solid black;">&nbsp;&nbsp;'.$value['IDARTBDT'].'&nbsp;&nbsp;</td>
                    <td style="border-bottom: 2px solid black;border-right: 2px solid black;">&nbsp;&nbsp;'.$value['Nama'].'&nbsp;&nbsp;</td>
                    <td style="border-bottom: 2px solid black;border-right: 2px solid black;">&nbsp;&nbsp;'.$value['JnsKel'].'&nbsp;&nbsp;</td>
                    <td style="border-bottom: 2px solid black;border-right: 2px solid black;">&nbsp;&nbsp;'.$value['Hubkel'].'&nbsp;&nbsp;</td>
                    <td style="border-bottom: 2px solid black;border-right: 2px solid black;">&nbsp;&nbsp;'.Actions::convDateTimeIndonesia($value['TglLahir']).'&nbsp;&nbsp;</td>
                  </tr>';
                    }
                    echo $tam;
                  ?>
                </table>

<br><br><br><br><br><br>
                <span style="font-size:12px;">diunduh pada <?=Actions::convDateTanggal(date('Y-m-d'))?> melalui http://sidaksos.semarangkota.go.id oleh: DINAS SOSIAL KOTA SEMARANG</p></span>
                </div></div>
<?php endif ?>
<?php if (!$punyadtks): ?>
	<div class="container">
		<div class="jumbotron">
			<h1>DATA TIDAK DITEMUKAN</h1>
		</div>
	</div>
<?php endif ?>