<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bencana".
 *
 * @property int $id
 * @property string $nama_bencana
 * @property string|null $lokasi
 * @property string|null $tanggal_mulai
 * @property string|null $tanggal_selesai
 * @property string|null $keterangan
 * @property string $created_at
 *
 * @property BencanaKorbanIndividu[] $bencanaKorbanIndividus
 * @property BencanaKorban[] $bencanaKorbans
 * @property BencanaLayanan[] $bencanaLayanans
 */
class Bencana extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bencana';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_bencana'], 'required'],
            [['tanggal_mulai', 'tanggal_selesai', 'created_at'], 'safe'],
            [['keterangan'], 'string'],
            [['nama_bencana'], 'string', 'max' => 150],
            [['lokasi'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_bencana' => 'Nama Bencana',
            'lokasi' => 'Lokasi',
            'tanggal_mulai' => 'Tanggal Mulai',
            'tanggal_selesai' => 'Tanggal Selesai',
            'keterangan' => 'Keterangan',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[BencanaKorbanIndividus]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBencanaKorbanIndividus()
    {
        return $this->hasMany(BencanaKorbanIndividu::class, ['bencana_id' => 'id']);
    }

    /**
     * Gets query for [[BencanaKorbans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBencanaKorbans()
    {
        return $this->hasMany(BencanaKorban::class, ['bencana_id' => 'id']);
    }

    /**
     * Gets query for [[BencanaLayanans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBencanaLayanans()
    {
        return $this->hasMany(BencanaLayanan::class, ['bencana_id' => 'id']);
    }
}
