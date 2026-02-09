<?php

use yii\helpers\Html;
use app\models\Actions;
use app\models\UsulanBansosKemensos;
use app\models\Bdtart;
/* @var $this yii\web\View */
/* @var $model app\models\UsulanBansosKemensos */

$this->title = 'Input Usulan Bansos Kemensos';
$this->params['breadcrumbs'][] = ['label' => 'Data Usulan Bansos Kemensos', 'url' => ['listdata']];
$this->params['breadcrumbs'][] = $this->title;
$nik='';
$statusdukcapil=false;
$data=UsulanBansosKemensos::find()->where(['username'=>Yii::$app->user->identity->username])->all();
// $nilai=false;
?>
<ul class="timeline">
            <li>
              <i class="fa fa-envelope bg-blue"></i>
              <div class="timeline-item">
                <h3 class="timeline-header"><a href="#">Pengumuman penting!</a></h3>

                <div class="timeline-body">
                  <ol>
                    <li>Tidak boleh memasukkan NIK yang sudah pernah dimasukkan.</li>
                    <li>Tidak boleh memasukkan NIK yang memilik nomor KK yang sama.</li>
                    <li>Tidak Termasuk penerima BSP atau BPNT.</li>
                    <li>Tidak Termasuk penerima BST.</li>
                    <li>Tidak Termasuk penerima PKH.</li>
                    <!-- <li>Tidak Termasuk penerima KJS.</li>
                    <li>Tidak Termasuk penerima Isoman.</li>
                    <li>Tidak Termasuk penerima PPKM Darurat.</li>
                    <li>Tidak Termasuk penerima Bantuan Beras.</li>
                    <li>Tidak Termasuk penerima Bantuan Relawan.</li>
                    <li>Tidak Termasuk penerima Pemenuhan Kuota Beras.</li>
                    <li>Tidak Termasuk penerima Permakanan Juli 2021.</li>
                    <li>Umur minimal 60 tahun keatas.</li> -->
                    <li>NIK hanya boleh domisili Kota Semarang.</li>
                    <li>Domisili sesuai kelurahan masing-masing.</li>
                  </ol>
                </div>
                <div class="timeline-footer">
                
                </div>
              </div>
            </li>
    </ul>
<div class="row">
  <div class="col-md-12">
    <div class="box box-success box-solid">
	    <div class="box-header bg-green">
			<i class="fa fa-fw fa-book"></i>
	    	<strong><?= Html::encode($this->title) ?></strong>
	    </div>
	    <div class="box-body">

	        <div class="table-responsive">
				<?= $this->render('_formusulanbansoskemensos', [
				        'model' => $model,
				        'datadukcapil'=>$datadukcapil,
				    ]) ?>
			</div>
	    </div>
    </div>
  </div>
</div>
  <?php 
  // if (!empty($nik)) {
  $nilai=false;
  if (is_array($datadukcapil) && array_key_exists('RESPONSE_DESC', $datadukcapil))
    {
       $nilai=array_key_exists('RESPONSE_DESC', $datadukcapil);
    }
  	
  	

  	// }
  

  if (!empty($datadukcapil) && $nilai===false) { ?>

   <div class="box box-success box-solid">
        <div class="box-header bg-green">
            <strong><?= Html::encode('Pekerjaan dan Bansos yang dipilih') ?></strong>
        </div>
        <div class="box-body">
          <table class='table table-hover'>
          <?php
              $punyadtks=@Bdtart::find()->where(['NIK' => $datadukcapil['NIK']])->exists();
              if ($punyadtks) {?>
              <tr>
                <td>Status DTKS</td>
                <td>:</td>
                <td>Termasuk DTKS</td>
              </tr>

             <?php } else { ?>
              <tr>
                <td>Status DTKS</td>
                <td>:</td>
                <td>Tidak Termasuk DTKS</td>
              </tr>

             <?php } ?>
              <tr>
                <td>Jenis Pekerjaan</td>
                <td>:</td>
                <td><?=$model->jenis_pekerjaan?><?= Html::hiddenInput($model->jenis_pekerjaan, $model->jenis_pekerjaan)?></td>
              </tr>
              <tr>
                <td>Program Bansos</td>
                <td>:</td>
                <td><?=$model->program_bansos?><?= Html::hiddenInput($model->program_bansos, $model->program_bansos)?></td>
              </tr>
            </table> 
          </div>
      </div>
    <div class="box box-success box-solid">
        <div class="box-header bg-green">
            <strong><?= Html::encode('Data Dukcapil') ?></strong>
        </div>
        <div class="box-body">
             
            <?php
                // $datadukcapil=@$datadukcapil[0];
                if (is_array($datadukcapil)) {
                    echo "<table class='table table-hover'>";
                        foreach ($datadukcapil as $nama_index=>$isi) {
                            $array_search = array('','NIK','NO_KK','NAMA_LGKP','TMPT_LHR','TGL_LHR','ALAMAT','NO_RT','NO_RW','KEC_NAME','KEL_NAME','KAB_NAME','NAMA_LGKP_IBU');
                            $result=array_search($nama_index,$array_search);
                            if (!empty($result)) {
                            	if ($nama_index==="NIK") {
                            		$nik=$isi;
                            	} 
                            	
                                echo "<tr>";
                                echo "<td>".ucwords(str_replace("_", " ", $nama_index))." </td> <td> : </td> <td> $isi </td>";
                                echo "</tr>";
                            }  
                        }
                    echo "</table>";
                }  


                
            ?>

            <div class="pull-right">


	<?= Html::a('Simpan Data', ['simpandata', 'nik' => $nik, 'jenis_pekerjaan'=>$model->jenis_pekerjaan, 'program_bansos'=>$model->program_bansos], ['class' => 'btn btn-success']) ?>
</div>
        </div>


    </div>
<?php } ?>

<div class="row">
  <div class="col-md-12">
    <div class="box box-success box-solid">
      <div class="box-header bg-green">
      <i class="fa fa-fw fa-book"></i>
        <strong>Data yang anda masukan</strong>
      </div>
      <div class="box-body">
          <div class="table-responsive">
<table class="table table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>No KK</th>
                    <th>NIK</th>
                    <th>Nama Lengkap</th>
                    <th>Jenis Kelamin</th>
                    <th>Jenis Pekerjaan</th>
                    <th>Program Bansos</th>
                    <th>Nama Kabupaten</th>
                    <th>Nama Kecamatan</th>
                    <th>Nama Kelurahan</th>
                    <th>Status Verifikasi Kecamatan</th>
                    <!-- <th>No Urut Keluarga</th>
                    <th>No Peserta PKH</th>
                    <th>No Peserta KKS 2016</th>
                    <th>No Peserta PBI</th> -->
                    <th>Opsi</th>
                  </tr>
                  </thead>
                  <tbody>
                  
                  <?php
                    $tam='';
                    $num=1;
                    foreach ($data as $key => $value) {
                        $tam .= '<tr>
                    <td>'.$num++.'</td>
                    <td>'.$value['no_kk'].'</td>
                    <td>'.$value['nik'].'</td>
                    <td>'.$value['nama'].'</td>
                    <td>'.$value['jenis_kelamin'].'</td>
                    <td>'.$value['jenis_pekerjaan'].'</td>
                    <td>'.$value['program_bansos'].'</td>
                    <td>'.$value['kabupaten'].'</td>
                    <td>'.$value['kecamatan'].'</td>
                    <td>'.$value['kelurahan'].'</td>
                    <td>'.$value['kecamatan_yg_menyetujui'].'</td>
                    <td>'.Html::a('<i class="fa fa-fw fa-search"></i>Detail', ['usulan-bansos-kemensos/view', 'id' => $value['id']], ['class' => 'btn btn-info btn-sm']).
                    '</td>
                  </tr>';
                    }
                    echo $tam;

                  ?>
           
                  </tbody>
                </table>
        </div>
      </div>
    </div>
  </div>
</div>