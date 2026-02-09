<?php

use yii\helpers\Html;
use yii\helpers\Url;
use app\models\UsulanDtksKemensos;
use app\models\DtksFebruari2022Dtks;
/* @var $this yii\web\View */
/* @var $model app\models\UsulanDtksKemensos */

$this->title = 'Input Usulan Dtks Kemensos';
$this->params['breadcrumbs'][] = ['label' => 'Data Usulan Dtks Kemensos', 'url' => ['listdata']];
$this->params['breadcrumbs'][] = $this->title;
$nik='';
// $statusdukcapil=false;
$data=UsulanDtksKemensos::find()->where(['username'=>Yii::$app->user->identity->username])->all();
?>
<style type="text/css">
 .lds-dual-ring.hidden { 
display: none;
}
.lds-dual-ring {
  display: inline-block;
  width: 80px;
  height: 80px;
}
.lds-dual-ring:after {
  content: " ";
  display: block;
  width: 64px;
  height: 64px;
  margin: 5% auto;
  border-radius: 50%;
  border: 6px solid #fff;
  border-color: #fff transparent #fff transparent;
  animation: lds-dual-ring 1.2s linear infinite;
}
@keyframes lds-dual-ring {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}


.overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100vh;
    background: rgba(0,0,0,.8);
    z-index: 999;
    opacity: 1;
    transition: all 0.5s;
}
</style>

<ul class="timeline">
            <li>
              <i class="fa fa-envelope bg-blue"></i>
              <div class="timeline-item">
                <h3 class="timeline-header"><a href="#">Pengumuman penting!</a></h3>

                <div class="timeline-body">
                  <ol>
                    <li>Tidak boleh memasukkan NIK yang sudah pernah dimasukkan.</li>
                    <li>Boleh memasukkan NIK yang memilik nomor KK yang sama.</li>
                    <!-- <li>Tidak Termasuk penerima BSP atau BPNT.</li> -->
                    <!-- <li>Tidak Termasuk penerima PBI.</li> -->
                    <!-- <li>Tidak Termasuk penerima PKH.</li> -->
                    <li>NIK hanya boleh domisili Kota Semarang.</li>
                    <li>Domisili sesuai kelurahan masing-masing.</li>
                    <li>Terdaftar di DTKS SIKS NG.</li>
                  </ol>
                </div>
                <div class="timeline-footer">
                
                </div>
              </div>
            </li>
    </ul>
<div class="row">
  <div class="col-md-12">
    
    <div class="box box-success box-solid"  style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
	    <div class="box-header bg-navy">
			<i class="fa fa-fw fa-book"></i>
	    	<strong><?= Html::encode($this->title) ?></strong>
	    </div>
	    <div class="box-body">
				<?= $this->render('_formusulandtkskemensos', [
				        'model' => $model,
				        'data'=>$data,
				    ]) ?>
	    </div>
    </div>

  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="box box-primary box-solid">
      <div class="box-header bg-blue">
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
                    <th>Disabilitas</th>
                    <th>Nama Kabupaten</th>
                    <th>Nama Kecamatan</th>
                    <th>Nama Kelurahan</th>
                    <th>Status Validasi Kecamatan</th>
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
                    <td>'.$value['disabilitas'].'</td>
                    <td>'.$value['kabupaten'].'</td>
                    <td>'.$value['kecamatan'].'</td>
                    <td>'.$value['kelurahan'].'</td>
                    <td>'.$value['validasi_kecamatan'].'</td>
                    <td>'.Html::a('<i class="fa fa-fw fa-search"></i>Detail', ['usulan-dtks-kemensos/view', 'id' => $value['id']], ['class' => 'btn btn-info btn-sm']).
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
<div id="loader" class="lds-dual-ring hidden overlay"></div>
<?php 
$simpan    = Url::to(['usulan-dtks-kemensos/postdata']);
$getnik    = Url::to(['usulan-dtks-kemensos/getnik']);
$script = <<< JS
$( document ).ready(function() {
  var url_string = window.location.href;
  var url = new URL(url_string);
  var nik = url.searchParams.get("nik");
console.log(nik);
$("#usulandtkskemensosform-nik").on('change', function() {
  console.log('test');
    $.ajax({
                url: '$getnik',
                type: "POST",
                data:{
                    nik :$("#usulandtkskemensosform-nik").val(),
                },
                beforeSend: function() {
                    $('#loader').removeClass('hidden')
                },
                success:    function(response){
                  console.log(response);
                  if (response != null && response != '') {
                    $("#dtks").empty();
                    for(var k in response) {
                      markup = "<tr><td>" + k + "</td><td>:</td><td>" + response[k] + "</td></tr>";
                      tableBody = $("#dtks");
                      tableBody.append(markup);
                    }
                    $("#usulandtkskemensosform-no_kk").val(response['nokk']);
                    $("#usulandtkskemensosform-nama").val(response['nama']);
                    $("#usulandtkskemensosform-jenis_kelamin").val(response['jenis_kelamin']).trigger('change');
                    $("#usulandtkskemensosform-tempat_lahir").val(response['tempat_lahir']);
                    $("#usulandtkskemensosform-tanggal_lahir").val(response['tanggal_lahir']);
                    $("#usulandtkskemensosform-alamat").val(response['alamat']);
                    $("#usulandtkskemensosform-jenis_pekerjaan").val(response['pekerjaan']).trigger('change');
                    $("#usulandtkskemensosform-rt").val(response['rt']);
                    $("#usulandtkskemensosform-rw").val(response['rw']);
                    $("#usulandtkskemensosform-ibu_kandung").val(response['nama_ibu_kandung']);
                    $("#usulandtkskemensosform-status_kawin").val(response['status_kawin']);
                    $("#bansosdtks"). css("display", "block");
                    $("#nonbansosdtks"). css("display", "none");
                  } else{
                    $("#dtks").empty();
                    markup = "<tr><td>Status Identitas</td><td>:</td><td>Tidak Terdaftar</td></tr>";
                    tableBody = $("#dtks");
                    tableBody.append(markup);
                    $("#bansosdtks"). css("display", "none");
                    $("#nonbansosdtks"). css("display", "block");
                    // var select2_data = $('#usulandtkskemensosform-program_bansos').select2('data').push({ selected: false,disabled: false, text: 'text_4',id:5,title: 'text_4' });
                    // console.log(select2_data,'data');
                    // $("#usulandtkskemensosform-program_bansos").val("NONBANSOS");
                    // $("#usulandtkskemensosform-program_bansos").select2({disabled:'readonly'});
                  }    
                },
                error:  function(){
                    alert("response");
                },
                complete: function(){
                    $('#loader').addClass('hidden')
                }
            });

});

$("#usulandtkskemensosform-ktp").change(function(){
    if (this.files && this.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#imgktp').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]);
    }
});

$("#usulandtkskemensosform-foto_rumah").change(function(){
    if (this.files && this.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#imgfotorumah').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]);
    }
});

$("#usulandtkskemensosform-berita_acara_muskel").change(function(){
    if (this.files && this.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#pdfberitaacaramuskel').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]);
    }
});

$(document).on({
    ajaxStart: function() { $("#inputusulan").addClass("loading");    },
    ajaxStop: function() { $("#inputusulan").removeClass("loading"); }    
});

    console.log( "ready!" );
});
JS;
$this->registerJs($script);