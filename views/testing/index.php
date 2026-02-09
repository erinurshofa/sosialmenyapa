<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */

// Register the modal JS and CSS
Modal::begin([
    'id' => 'user-modal',
    'clientOptions' => ['backdrop' => 'static', 'keyboard' => false],
]);
Modal::end();

// User Modal Button
echo Html::button('Open User Modal', [
    'class' => 'btn btn-primary',
    'data' => [
        'toggle' => 'modal',
        'target' => '#user-modal',
        'remote' => Url::to(['testing/view-modal', 'userId' => 123, 'username' => 'example_username']),
    ],
]);

// Register the modal JS and CSS
Modal::begin([
    'id' => 'product-modal',
    'clientOptions' => ['backdrop' => 'static', 'keyboard' => false],
]);
Modal::end();

// Product Modal Button
echo Html::button('Open Product Modal', [
    'class' => 'btn btn-primary',
    'data' => [
        'toggle' => 'modal',
        'target' => '#product-modal',
        'remote' => Yii::$app->urlManager->createUrl(['testing/view-modal2', 'productId' => 456, 'productName' => 'example_product']),
    ],
]);
?>
