<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bencana_korban".
 *
 * @property int $id
 * @property int $bencana_id
 * @property int $kategori_korban_id
 * @property int|null $jumlah
 *
 * @property Bencana $bencana
 * @property BencanaKategoriKorban $kategoriKorban
 */
class BencanaKorban extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bencana_korban';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['bencana_id', 'kategori_korban_id'], 'required'],
            [['bencana_id', 'kategori_korban_id', 'jumlah'], 'integer'],
            [['bencana_id'], 'exist', 'skipOnError' => true, 'targetClass' => Bencana::class, 'targetAttribute' => ['bencana_id' => 'id']],
            [['kategori_korban_id'], 'exist', 'skipOnError' => true, 'targetClass' => BencanaKategoriKorban::class, 'targetAttribute' => ['kategori_korban_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'bencana_id' => 'Bencana ID',
            'kategori_korban_id' => 'Kategori Korban ID',
            'jumlah' => 'Jumlah',
        ];
    }

    /**
     * Gets query for [[Bencana]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBencana()
    {
        return $this->hasOne(Bencana::class, ['id' => 'bencana_id']);
    }

    /**
     * Gets query for [[KategoriKorban]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKategoriKorban()
    {
        return $this->hasOne(BencanaKategoriKorban::class, ['id' => 'kategori_korban_id']);
    }
}
