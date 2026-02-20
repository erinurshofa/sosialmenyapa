<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dsen".
 *
 * @property int $id
 * @property string $nama
 * @property string|null $deskripsi
 */
class Dsen extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dsen';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama'], 'required'],
            [['deskripsi'], 'string'],
            [['nama'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'deskripsi' => 'Deskripsi',
        ];
    }
}
