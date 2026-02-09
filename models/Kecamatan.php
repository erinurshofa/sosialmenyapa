<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kecamatan".
 *
 * @property int $id
 * @property string $nama
 * @property int|null $id_lama
 * @property int|null $id_baru
 *
 * @property Kelurahan[] $kelurahans
 */
class Kecamatan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kecamatan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama'], 'required'],
            [['id_lama', 'id_baru'], 'integer'],
            [['nama'], 'string', 'max' => 100],
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
            'nama' => 'Nama',
            'id_lama' => 'Id Lama',
            'id_baru' => 'Id Baru',
        ];
    }

    /**
     * Gets query for [[Kelurahans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKelurahans()
    {
        return $this->hasMany(Kelurahan::class, ['kecamatan_id' => 'id']);
    }
}
