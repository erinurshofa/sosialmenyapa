<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bencana_korban_individu".
 *
 * @property int $id
 * @property int $bencana_id
 * @property string $nama
 * @property string|null $nik
 * @property string|null $jenis_kelamin
 * @property int $kategori_korban_id
 * @property string|null $alamat
 * @property int|null $created_by
 * @property string $created_at
 * @property string|null $status_akhir
 *
 * @property Bencana $bencana
 * @property BencanaKorbanVerifikasi[] $bencanaKorbanVerifikasis
 * @property Users $createdBy
 * @property BencanaKategoriKorban $kategoriKorban
 * @property Kelurahan $kelurahan
 * @property Kecamatan $kecamatan
 */
class BencanaKorbanIndividu extends \yii\db\ActiveRecord
{
    public $provinsi_id;
    public $kota_id;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bencana_korban_individu';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['bencana_id', 'nama', 'kategori_korban_id'], 'required'],
            [['bencana_id', 'kategori_korban_id', 'created_by', 'kelurahan_id', 'kecamatan_id', 'kota_id', 'provinsi_id'], 'integer'],
            [['jenis_kelamin', 'alamat', 'status_akhir'], 'string'],
            [['created_at'], 'safe'],
            [['nama'], 'string', 'max' => 150],
            [['nik'], 'string', 'max' => 20],
            [['bencana_id'], 'exist', 'skipOnError' => true, 'targetClass' => Bencana::class, 'targetAttribute' => ['bencana_id' => 'id']],
            [['kategori_korban_id'], 'exist', 'skipOnError' => true, 'targetClass' => BencanaKategoriKorban::class, 'targetAttribute' => ['kategori_korban_id' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => Users::class, 'targetAttribute' => ['created_by' => 'id']],
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
            'nik' => 'Nik',
            'jenis_kelamin' => 'Jenis Kelamin',
            'kategori_korban_id' => 'Kategori Korban ID',
            'alamat' => 'Alamat',
            'kelurahan_id' => 'Kelurahan',
            'kecamatan_id' => 'Kecamatan',
            'kota_id' => 'Kota',
            'provinsi_id' => 'Provinsi',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'status_akhir' => 'Status Akhir',
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
     * Gets query for [[BencanaKorbanVerifikasis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBencanaKorbanVerifikasis()
    {
        return $this->hasMany(BencanaKorbanVerifikasi::class, ['korban_id' => 'id']);
    }

    /**
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(Users::class, ['id' => 'created_by']);
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

    public function getKelurahan()
    {
        return $this->hasOne(Kelurahan::class, ['id' => 'kelurahan_id']);
    }

    public function getKecamatan()
    {
        return $this->hasOne(Kecamatan::class, ['id' => 'kecamatan_id']);
    }
}