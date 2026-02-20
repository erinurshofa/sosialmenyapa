<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bencana_jenis_layanan".
 *
 * @property int $id
 * @property string $nama_layanan
 *
 * @property BencanaLayanan[] $bencanaLayanans
 */
class BencanaJenisLayanan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bencana_jenis_layanan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_layanan'], 'required'],
            [['nama_layanan'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_layanan' => 'Nama Layanan',
        ];
    }

    /**
     * Gets query for [[BencanaLayanans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBencanaLayanans()
    {
        return $this->hasMany(BencanaLayanan::class, ['jenis_layanan_id' => 'id']);
    }
}
