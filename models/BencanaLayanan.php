<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bencana_layanan".
 *
 * @property int $id
 * @property int $bencana_id
 * @property string $nama
 * @property string|null $jenis_kelamin
 * @property string|null $nik
 * @property string|null $alamat
 * @property int $jenis_layanan_id
 * @property int|null $jenis_permakanan_id
 * @property string $created_at
 *
 * @property Bencana $bencana
 * @property BencanaJenisLayanan $jenisLayanan
 * @property BencanaJenisPermakanan $jenisPermakanan
 */
class BencanaLayanan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bencana_layanan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['bencana_id', 'nama', 'jenis_layanan_id'], 'required'],
            [['bencana_id', 'jenis_layanan_id', 'jenis_permakanan_id'], 'integer'],
            [['jenis_kelamin', 'alamat'], 'string'],
            [['created_at'], 'safe'],
            [['nama'], 'string', 'max' => 150],
            [['nik'], 'string', 'max' => 20],
            [['bencana_id'], 'exist', 'skipOnError' => true, 'targetClass' => Bencana::class, 'targetAttribute' => ['bencana_id' => 'id']],
            [['jenis_layanan_id'], 'exist', 'skipOnError' => true, 'targetClass' => BencanaJenisLayanan::class, 'targetAttribute' => ['jenis_layanan_id' => 'id']],
            [['jenis_permakanan_id'], 'exist', 'skipOnError' => true, 'targetClass' => BencanaJenisPermakanan::class, 'targetAttribute' => ['jenis_permakanan_id' => 'id']],
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
            'nama' => 'Nama',
            'jenis_kelamin' => 'Jenis Kelamin',
            'nik' => 'Nik',
            'alamat' => 'Alamat',
            'jenis_layanan_id' => 'Jenis Layanan ID',
            'jenis_permakanan_id' => 'Jenis Permakanan ID',
            'created_at' => 'Created At',
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
     * Gets query for [[JenisLayanan]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJenisLayanan()
    {
        return $this->hasOne(BencanaJenisLayanan::class, ['id' => 'jenis_layanan_id']);
    }

    /**
     * Gets query for [[JenisPermakanan]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJenisPermakanan()
    {
        return $this->hasOne(BencanaJenisPermakanan::class, ['id' => 'jenis_permakanan_id']);
    }
}
