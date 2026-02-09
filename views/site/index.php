<?php
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'SIDAKSOS VERSI 3';
?>
<?php
  $gambar="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);border-radius: 25px;background-image:url(\"http://".$_SERVER['HTTP_HOST'].Yii::$app->urlManager->baseUrl."/theme1/img/hero-bg2.svg\");opacity:1;background-size:cover;box-shadow:04px8px0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);";
?>
<div class="wrapper hold-transition skin-blue layout-top-nav" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  text-align: center;">
  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header" >
            <a href=<?=Url::to(['site/index'])?> class="navbar-brand"><b>Dinas Sosial Kota Semarang</b></a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
              <i class="fa fa-bars"></i>
            </button>
        </div>
        <div class="collapse navbar-collapse pull-right" id="navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href=<?=Url::to(['site/index'])?>>Home <span class="sr-only">(current)</span></a></li>
                <li><a href=<?=Url::to(['site/login'])?>>Login</a></li>
            </ul>
        </div>
      </div>
    </nav>
  </header>
</div>
<br> <br>
<div class="site-index container" style="">
    <div class="jumbotron text-shadow" style='<?=$gambar?>'>
    <a href="http://dinsos.semarangkota.go.id"><img src=<?php echo "http://".$_SERVER['HTTP_HOST'].Yii::$app->urlManager->baseUrl."/theme1/img/masyarakat.png" ?> class="img-responsive pull-right" height=20% width=40% style='opacity:1;'></a>    
    <img src=<?php echo "http://".$_SERVER['HTTP_HOST'].Yii::$app->urlManager->baseUrl."/images/pemerintah.png" ?> class="img-responsive pull-left" height=20% width=40% style='opacity:1;'>
<div style="clear:both;"></div>
</br></br>

<center>
<img src=<?php echo "http://".$_SERVER['HTTP_HOST'].Yii::$app->urlManager->baseUrl."/images/SIDAKSOS.svg" ?> class="img-responsive" height=30% width=40% style='opacity:1;'>
<strong style="color:red;font-size:large;border-color:white;">V.3</strong>
	<font color=white>
        </br></br>
        <marquee><strong style="text-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);"><font size='5' color="red" style='opacity:1;'> DATA VALID MISKIN SEDIKIT MENUJU MASYARAKAT KOTA SEMARANG SEJAHTERA</font></strong></marquee>
	</font>
    </div>
</center>                
