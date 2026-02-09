<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kelurahan2".
 *
 * @property string $id
 * @property string $kecamatan_id
 * @property string $nama
 * @property string|null $id_benar
 * @property string|null $id_lama
 *
 * @property Kecamatan2 $kecamatan
 */
class Kelurahan2 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kelurahan2';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'kecamatan_id', 'nama'], 'required'],
            [['id'], 'string', 'max' => 10],
            [['kecamatan_id'], 'string', 'max' => 7],
            [['nama'], 'string', 'max' => 100],
            [['id_benar', 'id_lama'], 'string', 'max' => 13],
            [['id'], 'unique'],
            [['kecamatan_id'], 'exist', 'skipOnError' => true, 'targetClass' => Kecamatan2::class, 'targetAttribute' => ['kecamatan_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kecamatan_id' => 'Kecamatan ID',
            'nama' => 'Nama',
            'id_benar' => 'Id Benar',
            'id_lama' => 'Id Lama',
        ];
    }

    /**
     * Gets query for [[Kecamatan]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKecamatan()
    {
        return $this->hasOne(Kecamatan2::class, ['id' => 'kecamatan_id']);
    }
}
