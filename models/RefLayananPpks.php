<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ref_layanan_ppks".
 *
 * @property int $id
 * @property string $nama_layanan
 * @property string|null $aktif
 * @property string $created_at
 *
 * @property PpksLayananNonTerlantar[] $ppksLayananNonTerlantars
 * @property PpksLayananTerlantar[] $ppksLayananTerlantars
 */
class RefLayananPpks extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ref_layanan_ppks';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'nama_layanan'], 'required'],
            [['id'], 'integer'],
            [['aktif'], 'string'],
            [['created_at'], 'safe'],
            [['nama_layanan'], 'string', 'max' => 255],
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
            'nama_layanan' => 'Nama Layanan',
            'aktif' => 'Aktif',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[PpksLayananNonTerlantars]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPpksLayananNonTerlantars()
    {
        return $this->hasMany(PpksLayananNonTerlantar::class, ['layanan_id' => 'id']);
    }

    /**
     * Gets query for [[PpksLayananTerlantars]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPpksLayananTerlantars()
    {
        return $this->hasMany(PpksLayananTerlantar::class, ['layanan_id' => 'id']);
    }
}
