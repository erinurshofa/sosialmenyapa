<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bencana_kategori_korban".
 *
 * @property int $id
 * @property string $nama_kategori
 *
 * @property BencanaKorbanIndividu[] $bencanaKorbanIndividus
 * @property BencanaKorban[] $bencanaKorbans
 */
class BencanaKategoriKorban extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bencana_kategori_korban';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_kategori'], 'required'],
            [['nama_kategori'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_kategori' => 'Nama Kategori',
        ];
    }

    /**
     * Gets query for [[BencanaKorbanIndividus]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBencanaKorbanIndividus()
    {
        return $this->hasMany(BencanaKorbanIndividu::class, ['kategori_korban_id' => 'id']);
    }

    /**
     * Gets query for [[BencanaKorbans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBencanaKorbans()
    {
        return $this->hasMany(BencanaKorban::class, ['kategori_korban_id' => 'id']);
    }
}
