<?php
require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/vendor/yiisoft/yii2/Yii.php';
$config = require __DIR__ . '/config/web.php';
new yii\web\Application($config);

$db = Yii::$app->db;
try {
    $db->createCommand('ALTER TABLE bencana_korban_individu ADD COLUMN kecamatan_id INT NULL')->execute();
    echo "Added kecamatan_id\n";
} catch (\Exception $e) {
    echo "kecamatan_id already exists or error: " . $e->getMessage() . "\n";
}

try {
    $db->createCommand('ALTER TABLE bencana_korban_individu ADD COLUMN kelurahan_id INT NULL')->execute();
    echo "Added kelurahan_id\n";
} catch (\Exception $e) {
    echo "kelurahan_id already exists or error: " . $e->getMessage() . "\n";
}
