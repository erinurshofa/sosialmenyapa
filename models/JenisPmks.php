<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jenis_pmks".
 *
 * @property int $id
 * @property string $kode
 * @property string $nama
 * @property string $created_at
 * @property string $updated_at
 */
class JenisPmks extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jenis_pmks';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'safe'],
            [['kode', 'nama'], 'string', 'max' => 255],
            [['nama'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kode' => 'Kode',
            'nama' => 'Nama',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
