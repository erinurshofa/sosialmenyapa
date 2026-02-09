<?php

use yii\helpers\Html;
use app\models\Actions;
// use app\models\Bdtart;
// use app\models\Bdtrt;
use app\models\Users;
/* @var $this yii\web\View */
/* @var $model app\models\Account */

// $this->title = 'Update Account: ' . $model->id_account;
// $this->params['breadcrumbs'][] = ['label' => 'Accounts', 'url' => ['index']];
// $this->params['breadcrumbs'][] = ['label' => $model->id_account, 'url' => ['view', 'id' => $model->id_account]];
// $this->params['breadcrumbs'][] = 'Update';
$this->title = 'Edit Profile';
?>
<div class="account-update">

    <!-- <h1><?php //Html::encode($this->title) ?></h1> -->

<div class="row"> 
   <!-- /.col -->
        <div class="col-md-4">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-aqua-active">
              <h3 class="widget-user-username"><?=$model->nama_lengkap?></h3>
              <h5 class="widget-user-desc"><?php //strtoupper($model->jabatan)?></h5>
            </div>
            <div class="widget-user-image">
                         <?php
      if (isset($model->foto) && $model->foto !="" ){
        $ogimage='data:image/jpeg;base64,'.base64_encode( $model->foto );
        echo '<img class="img-responsive" src='.$ogimage.' alt='.$model->nama_lengkap.'>';
        // echo '<div class="form-group field-gallery-foto"><div class="col-md-2"><img class="img-responsive" src="'.$ogimage.'" Width="200px">';
        // echo '</div><div class="col-md-10">';
        // echo Html::a('Delete Foto', ['gallery/deletefoto','id'=>$model->id], ['class'=>'btn btn-danger']);
        // echo '</div></div>';
      }else{
        echo '<img class="img-circle" src="images/user.png" alt="User Avatar">';
      }
    ?>
            </div>
            <div class="box-footer">
              <div class="row">
              <p class="text-muted text-center">Terakhir Login : <?=Actions::convDateTimeIndonesia($model->lastlogin)?></p>
                 <a href="javascript:void(0);" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#myModal" class="btn btn-danger btn-block"><b>Upload Photo</b></a> 
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.widget-user -->

          <!-- <div class="col-md-6"> -->
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Data</h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
                <!-- <li class="active">
                  <a href="#"><i class="fa fa-th"></i> BDTART
                    <span class="label label-primary pull-right"><?php //Bdtart::find()->count()?></span>
                  </a></li>
                <li><a href="#"><i class="fa fa-th"></i> BDTRT<span class="label label-warning pull-right"><?php //Bdtrt::find()->count()?></span></a></li> -->
                <li><a href="#"><i class="fa fa-th"></i> USER<span class="label label-danger pull-right"><?=Users::find()->count()?></span></a></li>
               <!--  <li><a href="#"><i class="fa fa-th"></i> PENERIMA BANTUAN <span class="label label-success pull-right">65</span></a>
                </li>
                <li><a href="#"><i class="fa fa-th"></i> PROGRAM KIP<span class="label label-primary pull-right"><?php //Bdtart::find()->count()?></span></a></li> -->
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
              <!--/.box -->
            </div>
        <!-- </div> -->
        <!-- /.col -->		
		<!-- <div class="col-md-3">
		<div class="box box-danger">
			<div class="box-header with-border">
				<i class="fa fa-camera"></i>
				<h3 class="box-title">Photo Profile</h3>
			</div>
			<div class="box-body">           
              <center><img class="profile-user-img img-responsive img-circle" src="http://pluspng.com/img-png/manga-boy-png-eren-lost-girls-manga-png-808.png" alt="Eri Nur Sofa"></center>

              <h3 class="profile-username text-center"><?=$model->nama_lengkap?></h3>
              <hr>

              <p class="text-muted text-center">Terakhir Login : 24 Mei 2019 | 14:10:02</p>
 
               <a href="javascript:void(0);" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#myModal" class="btn btn-success btn-block"><b>Upload Photo</b></a>             	
               <p>
            </p></div>
          </div>  
        </div> -->

<div class="col-md-8">
<div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-aqua-active">
            <h3 class="widget-user-username">Identitas User</h3>
              <h5 class="widget-user-desc">Silahkan Edit Data Profil Dengan Baik dan Benar!</h5>
            </div>
            		<div class="box box-widget">
			<!-- <div class="box-header with-border"> -->
			<!-- <div class="box-header with-border">
				<i class="fa fa-user-secret"></i>
				<h3 class="box-title">Identitas User</h3>
			</div> -->
		<div class="box-body">
		<?= $this->render('_form', [
        'model' => $model,
    ]) ?>
	</div>
</div>
    </div>

</div>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">    
      <!-- Modal content-->
      <div class="modal-content">
      <?= $this->render('_form2', [
        'model' => $model,
    ]) ?>
      
    </div>
 </div>

<script>
	$(function(){
		$(".pesan_error").delay(5000).fadeOut(1000);
	});
	
	$("#password").password('toggle');
</script>        </div>

   

</div>
