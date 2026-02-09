<?php

/* @var $this \yii\web\View */
/* @var $content string */

\hail812\adminlte3\assets\AdminLteAsset::register($this);
$this->registerCssFile('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700');
$this->registerCssFile('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css');
\hail812\adminlte3\assets\PluginAsset::register($this)->add(['fontawesome', 'icheck-bootstrap']);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SOSIAL MENYAPA | LOGIN</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <?php $this->head() ?>
</head>
<?php
    $gambar1="background-image:url(\"http://".$_SERVER['HTTP_HOST'].Yii::$app->urlManager->baseUrl."/theme1/img/ball-wed.svg\");opacity:1;background-size:cover;";
    $gambar2="background-image:url(\"http://".$_SERVER['HTTP_HOST'].Yii::$app->urlManager->baseUrl."/theme1/img/wave.svg\");opacity:1;background-size:cover;";
    $gambar3="background-image:url(\"http://".$_SERVER['HTTP_HOST'].Yii::$app->urlManager->baseUrl."/images/tugu.jpg\");opacity:0.7;background-size:cover;";
    ?>
<body class="hold-transition login-page" style=<?=$gambar2?>>
<?php  $this->beginBody() ?>
<div class="card login-box"  style=<?=$gambar1?>>
    <div class="login-logo">
        <a href="<?=Yii::$app->homeUrl?>"><b>SOSIAL MENYAPA</b></a>
    </div>
    <!-- /.login-logo -->

    <?= $content ?>
</div>
<!-- /.login-box -->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>