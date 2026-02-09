<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kota".
 *
 * @property string $id
 * @property string $provinsi_id
 * @property string $nama
 *
 * @property Kecamatan2[] $kecamatan2s
 * @property Kecamatan2[] $kecamatan2s0
 * @property Provinsi $provinsi
 * @property Provinsi $provinsi0
 */
class Kota extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kota';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'provinsi_id', 'nama'], 'required'],
            [['id'], 'string', 'max' => 4],
            [['provinsi_id'], 'string', 'max' => 2],
            [['nama'], 'string', 'max' => 100],
            [['id'], 'unique'],
            [['provinsi_id'], 'exist', 'skipOnError' => true, 'targetClass' => Provinsi::class, 'targetAttribute' => ['provinsi_id' => 'id']],
            [['provinsi_id'], 'exist', 'skipOnError' => true, 'targetClass' => Provinsi::class, 'targetAttribute' => ['provinsi_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'provinsi_id' => 'Provinsi ID',
            'nama' => 'Nama',
        ];
    }

    /**
     * Gets query for [[Kecamatan2s]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKecamatan2s()
    {
        return $this->hasMany(Kecamatan2::class, ['kota_id' => 'id']);
    }

    /**
     * Gets query for [[Kecamatan2s0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKecamatan2s0()
    {
        return $this->hasMany(Kecamatan2::class, ['kota_id' => 'id']);
    }

    /**
     * Gets query for [[Provinsi]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProvinsi()
    {
        return $this->hasOne(Provinsi::class, ['id' => 'provinsi_id']);
    }

    /**
     * Gets query for [[Provinsi0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProvinsi0()
    {
        return $this->hasOne(Provinsi::class, ['id' => 'provinsi_id']);
    }
}
