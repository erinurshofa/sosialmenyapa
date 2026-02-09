<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kegiatan".
 *
 * @property int $id
 * @property string $judul
 * @property string $lokasi
 * @property string $tanggal
 * @property string|null $bidang
 * @property string|null $nama_dinas
 * @property int $internal_dinas
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $kategori_id
 * @property string|null $penyelenggara
 * @property string|null $keterangan
 */
class Kegiatan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kegiatan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['judul', 'lokasi', 'tanggal'], 'required'],
            [['tanggal', 'created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['internal_dinas', 'kategori_id'], 'integer'],
            [['penyelenggara', 'keterangan'], 'string'],
            [['judul', 'lokasi'], 'string', 'max' => 255],
            [['bidang'], 'string', 'max' => 25],
            [['nama_dinas'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'judul' => 'Judul',
            'lokasi' => 'Lokasi',
            'tanggal' => 'Tanggal',
            'bidang' => 'Bidang',
            'nama_dinas' => 'Nama Dinas',
            'internal_dinas' => 'Internal Dinas',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'deleted_at' => 'Deleted At',
            'kategori_id' => 'Kategori ID',
            'penyelenggara' => 'Penyelenggara',
            'keterangan' => 'Keterangan',
        ];
    }
}
