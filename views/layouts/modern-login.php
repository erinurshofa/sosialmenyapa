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

<div style="position: fixed; top: 20px; left: 20px; z-index: 9999;">
    <a href="<?= \yii\helpers\Url::to(['/site/index']) ?>" style="display: flex; align-items: center; justify-content: center; width: 40px; height: 40px; background: white; border-radius: 50%; box-shadow: 0 2px 5px rgba(0,0,0,0.2); color: #333; text-decoration: none;">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="19" y1="12" x2="5" y2="12"></line>
            <polyline points="12 19 5 12 12 5"></polyline>
        </svg>
    </a>
</div>

<?= $content ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
