<?php
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $productId int */
/* @var $productName string */

Modal::begin([
    'title' => 'Product Information',
    'id' => 'product-modal',
    'size' => Modal::SIZE_LARGE,
]);

echo "<p>Product ID: $productId</p>";
echo "<p>Product Name: $productName</p>";

Modal::end();
?>
