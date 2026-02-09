<?php
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'SIDAKSOS versi 1';
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
<div class="site-index container" style='background: white; box-shadow: 5px 5px 5px #222222;" )'>
<!-- http://localhost/gakin/web/images/server.jpg -->
    <!-- <div class="jumbotron text-shadow" style='background-image:url("/images/server.jpg"); opacity:1;'> -->
    
    <div class="jumbotron text-shadow" style='background-image:url("/images/server.jpg"); opacity:1;'>
	<img src=<?php echo "http://".$_SERVER['HTTP_HOST'].Yii::$app->urlManager->baseUrl."/images/pemerintah.png" ?> height=30% width=40% style='opacity:1;'>
<img src=<?php echo "http://".$_SERVER['HTTP_HOST'].Yii::$app->urlManager->baseUrl."/images/sidaksos.png" ?> height=30% width=40% style='opacity:1;'>
</br></br>
<center>

    <!-- <br><b>    <font size='8' color='white' style='opacity:1;'> SIDAKSOS </font> </b> -->
	<font color=white>
        <!-- <p class="lead"> Sistem Informasi Data Terpadu Kesejahteraan Sosial </p> -->
        </br></br>
        <marquee><strong><font size='5' color="white" style='opacity:1;'> DATA VALID MISKIN SEDIKIT MENUJU MASYARAKAT KOTA SEMARANG SEJAHTERA</font></strong></marquee>
	</font>
<br> <br> 
        <p><a class="btn btn-lg btn-success" href="http://dinsos.semarangkota.go.id">Menuju Masyarakat Kota Semarang Sejahtera</a></p>
    </div>
</center>                
