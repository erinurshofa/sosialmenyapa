<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kecamatan2".
 *
 * @property string $id
 * @property string $kota_id
 * @property string $nama
 * @property string|null $id_benar
 * @property string|null $id_lama
 *
 * @property Kelurahan2[] $kelurahan2s
 * @property Kota $kota
 * @property Kota $kota0
 */
class Kecamatan2 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kecamatan2';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'kota_id', 'nama'], 'required'],
            [['id'], 'string', 'max' => 7],
            [['kota_id'], 'string', 'max' => 4],
            [['nama'], 'string', 'max' => 100],
            [['id_benar', 'id_lama'], 'string', 'max' => 8],
            [['id'], 'unique'],
            [['kota_id'], 'exist', 'skipOnError' => true, 'targetClass' => Kota::class, 'targetAttribute' => ['kota_id' => 'id']],
            [['kota_id'], 'exist', 'skipOnError' => true, 'targetClass' => Kota::class, 'targetAttribute' => ['kota_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kota_id' => 'Kota ID',
            'nama' => 'Nama',
            'id_benar' => 'Id Benar',
            'id_lama' => 'Id Lama',
        ];
    }

    /**
     * Gets query for [[Kelurahan2s]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKelurahan2s()
    {
        return $this->hasMany(Kelurahan2::class, ['kecamatan_id' => 'id']);
    }

    /**
     * Gets query for [[Kota]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKota()
    {
        return $this->hasOne(Kota::class, ['id' => 'kota_id']);
    }

    /**
     * Gets query for [[Kota0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKota0()
    {
        return $this->hasOne(Kota::class, ['id' => 'kota_id']);
    }
}
