<?php

// use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Account */

$this->title = 'Tambah Pengguna atau Pemakai Aplikasi';
// $this->params['breadcrumbs'][] = ['label' => 'Accounts', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="account-create">

    <!-- <h1><?php //Html::encode($this->title) ?></h1> -->



</div>

<?php
use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'Sidaksos versi 1';
?>
<div class="wrapper hold-transition skin-green layout-top-nav">
 <header class="main-header">
    <nav class="navbar navbar-static-top">
<div class="container">
     <div class="navbar-header">
          <a href=<?=Url::to(['site/index'])?> class="navbar-brand"><b>Sidaksos versi 1</b></a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
    </div>
<div class="collapse navbar-collapse pull-right" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href=<?=Url::to(['site/index'])?>>Home <span class="sr-only">(current)</span></a></li>
            <li><a href=<?=Url::to(['site/permohonanakun'])?>>Permohonan Akun <span class="sr-only">(current)</span></a></li>
            <li><a href=<?=Url::to(['site/login'])?>>Login</a></li>
          </ul>
</div>
</div>
</nav>
</header>
</div>
<div class="site-index container">

    <div class="jumbotron text-shadow">
        <h3>Permohonan Akun</h3>

       <!--  <p class="lead"> TERWUJUDNYA SEMARANG KOTA PERDAGANGAN DAN JASA, YANG BERBUDAYA MENUJU MASYARAKAT SEJAHTERA</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Menuju Masyarakat Kota Semarang Sejahtera</a></p>
 -->
         <?= $this->render('_formpermohonanakun', [
        'model' => $model,
    ]) ?>
    </div>


</div>
