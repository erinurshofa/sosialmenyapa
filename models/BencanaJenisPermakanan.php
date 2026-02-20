<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bencana_jenis_permakanan".
 *
 * @property int $id
 * @property string $nama_permakanan
 *
 * @property BencanaLayanan[] $bencanaLayanans
 */
class BencanaJenisPermakanan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bencana_jenis_permakanan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_permakanan'], 'required'],
            [['nama_permakanan'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_permakanan' => 'Nama Permakanan',
        ];
    }

    /**
     * Gets query for [[BencanaLayanans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBencanaLayanans()
    {
        return $this->hasMany(BencanaLayanan::class, ['jenis_permakanan_id' => 'id']);
    }
}
