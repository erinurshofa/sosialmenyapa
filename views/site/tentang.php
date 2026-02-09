<?php
use yii\helpers\Url;
use kartik\export\ExportMenu;
use yii\data\ArrayDataProvider;
/* @var $this yii\web\View */

$this->title = 'SIDAKSOS versi 1';
$dp1 = new ArrayDataProvider(['allModels' => [
    ['id' => 1, 'fruit' => 'Apples', 'quantity' => '100'],
    ['id' => 2, 'fruit' => 'Oranges', 'quantity' => '60'],
    ['id' => 3, 'fruit' => 'Bananas', 'quantity' => '160'],
    ['id' => 4, 'fruit' => 'Pineapples', 'quantity' => '90'],
    ['id' => 5, 'fruit' => 'Grapes', 'quantity' => '290'],
]]);
$dp2 = new ArrayDataProvider(['allModels' => [
    ['id' => 1, 'vegetable' => 'Potatoes', 'quantity' => '190'],
    ['id' => 2, 'vegetable' => 'Onions', 'quantity' => '300'],
    ['id' => 3, 'vegetable' => 'Carrots', 'quantity' => '20'],
    ['id' => 4, 'vegetable' => 'Beans', 'quantity' => '50'],
    ['id' => 5, 'vegetable' => 'Garlic', 'quantity' => '170'],
]]);
// First export menu for dataprovider no. 1 - fruits
echo ExportMenu::widget([
    'dataProvider' => $dp1,
    'columns' => ['id', 'fruit', 'quantity'],
    'options' => ['id'=>'expMenu1'], // optional to set but must be unique
    'target' => ExportMenu::TARGET_BLANK
]);
// Second export menu for dataprovider no. 2 - vegetables
echo ExportMenu::widget([
    'dataProvider' => $dp2,
    'columns' => ['id', 'vegetable', 'quantity'],
    'options' => ['id'=>'expMenu2'], // optional to set but must be unique
    'target' => ExportMenu::TARGET_BLANK
]);
?>
