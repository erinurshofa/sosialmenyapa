<?php
require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/vendor/yiisoft/yii2/Yii.php';
$config = require __DIR__ . '/config/web.php';
new yii\web\Application($config);

$model = new \app\models\BencanaKorbanIndividu();
$model->bencana_id = 1;
$model->nama = 'Andi Test';
$model->nik = '1234567890123456';
$model->kategori_korban_id = 1;
$model->provinsi_id = 33;
$model->kota_id = 3374;
$model->kecamatan_id = 2; // Real PK integer for Semarang district example
$model->kelurahan_id = 5; // Real PK integer
$model->jenis_kelamin = 'L';
$model->status_akhir = 'Input';

if ($model->save()) {
    echo "Record saved successfully with ID: " . $model->id . "\n";
    
    // verify if it fetched
    $fetched = \app\models\BencanaKorbanIndividu::findOne($model->id);
    echo "Saved kecamatan_id: " . $fetched->kecamatan_id . "\n";
    echo "Saved kelurahan_id: " . $fetched->kelurahan_id . "\n";
    
    // cleanup
    $model->delete();
    echo "Test record deleted.\n";
} else {
    echo "Failed to save:\n";
    print_r($model->getErrors());
}
