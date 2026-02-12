<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;

// Use Bootstrap 5 Asset if available, or standard YII bootstrap.
// We rely on the View registering dependencies, but good to have base here.
if (class_exists('yii\bootstrap5\BootstrapAsset')) {
    \yii\bootstrap5\BootstrapAsset::register($this);
} elseif (class_exists('yii\bootstrap4\BootstrapAsset')) {
    \yii\bootstrap4\BootstrapAsset::register($this);
} else {
    \yii\bootstrap\BootstrapAsset::register($this);
}

// Register Google Fonts (Outfit) - already in CSS but good practice to preload if needed
// $this->registerLinkTag(['rel' => 'preconnect', 'href' => 'https://fonts.googleapis.com']);
// $this->registerLinkTag(['rel' => 'preconnect', 'href' => 'https://fonts.gstatic.com', 'crossorigin' => true]);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<?= $content ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
