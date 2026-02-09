<?php
use yii\helpers\Url;
use app\models\Actions;
/* @var $this yii\web\View */

$this->title = 'APP GAKIN KOTA SEMARANG';
?>
<section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php //$totalJadwal?></h3>
              <p>Gakin</p>
            </div>
            <div class="icon">
              <i class="fa fa-book"></i>
            </div>
            <a href="<?=Url::toRoute(['/site/dashboard'])?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php //$totalPelaksana?></h3>

              <p>BDTART</p>
            </div>
            <div class="icon">
              <i class="fa fa-group"></i>
            </div>
            <a href="<?=Url::toRoute(['/bdtart/index'])?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php //$totalSambutan?></h3>

              <p>BDTRT</p>
            </div>
            <div class="icon">
              <i class="fa fa-newspaper-o"></i>
            </div>
            <a href="<?=Url::toRoute(['/bdtrt/index'])?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php //$totalUser?></h3>

              <p>Pengguna Aplikasi</p>
            </div>
            <div class="icon">
              <i class="fa fa-user"></i>
            </div>
            <a href="<?=Url::toRoute(['/account/index'])?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->





      </div>


    <div>
</div></section>