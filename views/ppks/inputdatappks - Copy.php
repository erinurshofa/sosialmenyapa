<?php

use yii\helpers\Html;
use app\models\Actions;
use app\models\Ppks;
use yii\helpers\Url;
// use app\models\Bdtart;

/* @var $this yii\web\View */
/* @var $model app\models\datappks */

$this->title = 'Input Data PPKS';
$this->params['breadcrumbs'][] = ['label' => 'Data PPKS', 'url' => ['listdata']];
$this->params['breadcrumbs'][] = $this->title;
// $nik='';
// $nik2='';
// $statusdukcapil=false;
// $data=Ppks::find()->where(['username'=>Yii::$app->user->identity->username])->all();

?>
<ul class="timeline">
            <li>
              <i class="fa fa-envelope bg-blue"></i>
              <div class="timeline-item">
                <h3 class="timeline-header"><a href="#">Pengumuman penting!</a></h3>

                <div class="timeline-body">
                  <ol>
                    <li>Tidak boleh memasukkan NIK yang sudah pernah dimasukkan.</li>
                    <!-- <li>Tidak boleh memasukkan NIK yang memilik nomor KK yang sama.</li> -->
                    <li>Umur maksimal 18 tahun.</li> 
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
				<?= $this->render('_formdatappks', [
				        'model' => $model,
                // 'datadukcapil'=>$datadukcapil,
                // 'datadukcapilwali'=>$datadukcapilwali,
				    ]) ?>
			</div>
	    </div>
    </div>
  </div>
</div>


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
                    <th>Yang Meninggal</th>
                    <th>Tinggal Dengan Siapa</th>
                    <th>No HP Pengasuh</th>
                    <th>Nama Kota</th>
                    <th>Nama Kecamatan</th>
                    <th>Nama Kelurahan</th>
                    <th>Status Verifikasi Kecamatan</th>
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
                    <td>'.@$value['no_kk'].'</td>
                    <td>'.@$value['nik'].'</td>
                    <td>'.@$value['nama'].'</td>
                    <td>'.@$value['jenis_kelamin'].'</td>
                    <td>'.@$value['yang_meninggal'].'</td>
                    <td>'.@$value['tinggal_dengan_siapa'].'</td>
                    <td>'.@$value['no_hp_pengasuh'].'</td>
                    <td>'.@$value['kota'].'</td>
                    <td>'.@$value['kecamatan'].'</td>
                    <td>'.@$value['kelurahan'].'</td>
                    <td>'.@$value['kecamatan_yg_menyetujui'].'</td>
                    <td>'.Html::a('<i class="fa fa-fw fa-search"></i>Detail', ['datappks/view', 'id' => $value['id']], ['class' => 'btn btn-info btn-sm']).
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
<?php 
$simpan    = Url::to(['datappks/postdata']);
$getnik    = Url::to(['datappks/getnik']);
$script = <<< JS
$( document ).ready(function() {
$("#datappksform-nik").on('change', function() {
  console.log('test');
    $.ajax({
                url: '$getnik',
                type: "POST",
                data:{
                    nik :$("#datappksform-nik").val(),
                    yang_meninggal : $("#datappksform-yang_meninggal").val(),
                    tinggal_dengan_siapa : $("#datappksform-tinggal_dengan_siapa").val(),
                    no_hp_pengasuh : $("#datappksform-no_hp_pengasuh").val(),
                },
                success:    function(response){
                    $("#dukcapil").empty();
                    for(var k in response) {
                      markup = "<tr><td>" + k + "</td><td>:</td><td>" + response[k] + "</td></tr>";
                      tableBody = $("#dukcapil");
                      tableBody.append(markup);
                    }
                      
                },
                error:  function(){
                    alert("response");
                }
            });
});
$("#datappksform-tinggal_dengan_siapa").on('change', function() {
    $.ajax({
                url: '$getnik',
                type: "POST",
                data:{
                    nik :$("#datappksform-tinggal_dengan_siapa").val(),
                    yang_meninggal : $("#datappksform-yang_meninggal").val(),
                    tinggal_dengan_siapa : $("#datappksform-tinggal_dengan_siapa").val(),
                    no_hp_pengasuh : $("#datappksform-no_hp_pengasuh").val(),
                },
                success:    function(response){
                    $("#dukcapilwali").empty();
                    for(var k in response) {
                      markup = "<tr><td>" + k + "</td><td>:</td><td>" + response[k] + "</td></tr>";
                      tableBody = $("#dukcapilwali");
                      tableBody.append(markup);
                    }
                    
                },
                error:  function(){
                    alert("response");
                }
            });
});


$("#datappksform-kk").change(function(){
    if (this.files && this.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#imgkk').attr('src', e.target.result);
        }

        reader.readAsDataURL(this.files[0]);
    }
});
$("#datappksform-akta_anak").change(function(){
    if (this.files && this.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#imgaktaanak').attr('src', e.target.result);
        }

        reader.readAsDataURL(this.files[0]);
    }
});
$("#datappksform-sk_meninggal_covid").change(function(){
    if (this.files && this.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#imgskmeninggalcovid').attr('src', e.target.result);
        }

        reader.readAsDataURL(this.files[0]);
    }
});
$("#datappksform-foto_anak").change(function(){
    if (this.files && this.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#imgfotoanak').attr('src', e.target.result);
        }

        reader.readAsDataURL(this.files[0]);
    }
});

    console.log( "ready!" );
});
JS;
$this->registerJs($script);