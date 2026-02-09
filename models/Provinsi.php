<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "provinsi".
 *
 * @property string $id
 * @property string $nama
 *
 * @property Kota[] $kotas
 * @property Kota[] $kotas0
 */
class Provinsi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'provinsi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'nama'], 'required'],
            [['id'], 'string', 'max' => 2],
            [['nama'], 'string', 'max' => 255],
            [['id'], 'unique'],
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
        ];
    }

    /**
     * Gets query for [[Kotas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKotas()
    {
        return $this->hasMany(Kota::class, ['provinsi_id' => 'id']);
    }

    /**
     * Gets query for [[Kotas0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKotas0()
    {
        return $this->hasMany(Kota::class, ['provinsi_id' => 'id']);
    }
}
