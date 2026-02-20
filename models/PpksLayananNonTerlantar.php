<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ppks_layanan_non_terlantar".
 *
 * @property int $id
 * @property int $ppks_id
 * @property int $layanan_id
 * @property string|null $tanggal_masuk
 * @property string $tanggal_layanan
 * @property string|null $keterangan
 * @property string|null $dibuat_oleh
 * @property string $created_at
 *
 * @property RefLayananPpks $layanan
 * @property Ppks $ppks
 */
class PpksLayananNonTerlantar extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ppks_layanan_non_terlantar';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ppks_id', 'layanan_id', 'tanggal_layanan'], 'required'],
            [['ppks_id', 'layanan_id'], 'integer'],
            [['tanggal_masuk', 'tanggal_layanan', 'created_at'], 'safe'],
            [['keterangan'], 'string'],
            [['dibuat_oleh'], 'string', 'max' => 50],
            [['ppks_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ppks::class, 'targetAttribute' => ['ppks_id' => 'id']],
            [['layanan_id'], 'exist', 'skipOnError' => true, 'targetClass' => RefLayananPpks::class, 'targetAttribute' => ['layanan_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ppks_id' => 'Ppks ID',
            'layanan_id' => 'Layanan ID',
            'tanggal_masuk' => 'Tanggal Masuk',
            'tanggal_layanan' => 'Tanggal Layanan',
            'keterangan' => 'Keterangan',
            'dibuat_oleh' => 'Dibuat Oleh',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[Layanan]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLayanan()
    {
        return $this->hasOne(RefLayananPpks::class, ['id' => 'layanan_id']);
    }

    /**
     * Gets query for [[Ppks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPpks()
    {
        return $this->hasOne(Ppks::class, ['id' => 'ppks_id']);
    }
}
