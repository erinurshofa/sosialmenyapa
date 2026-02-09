<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "psm2".
 *
 * @property string $id
 * @property string $nik
 * @property string $nama
 * @property string $tempat_lahir
 * @property string $tanggal_lahir
 * @property int $jenis_kelamin
 * @property string $jalan
 * @property string $rt
 * @property string $rw
 * @property string $provinsi_id
 * @property string $kota_id
 * @property string $kecamatan_id
 * @property string $kelurahan_id
 * @property string $user_id
 * @property string $login_terakhir
 * @property string $created_at
 * @property string $updated_at
 * @property string $no_rekening
 * @property string $nama_pemilik
 * @property string $nama_bank
 * @property string $no_hp
 * @property string $no_sertifikat
 * @property string $tanggal_sertifikat
 * @property string $file_sertifikat
 * @property string $file_sk_walikota
 */
class Psm2 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'psm2';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nik', 'nama', 'user_id'], 'required'],
            [['tanggal_lahir', 'login_terakhir', 'created_at', 'updated_at', 'tanggal_sertifikat'], 'safe'],
            [['jenis_kelamin', 'user_id'], 'integer'],
            [['nik'], 'string', 'max' => 16],
            [['nama', 'jalan', 'no_sertifikat', 'file_sertifikat'], 'string', 'max' => 255],
            [['tempat_lahir', 'no_rekening', 'nama_pemilik', 'file_sk_walikota'], 'string', 'max' => 100],
            [['rt', 'rw'], 'string', 'max' => 5],
            [['provinsi_id'], 'string', 'max' => 2],
            [['kota_id'], 'string', 'max' => 4],
            [['kecamatan_id'], 'string', 'max' => 7],
            [['kelurahan_id'], 'string', 'max' => 10],
            [['nama_bank'], 'string', 'max' => 50],
            [['no_hp'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nik' => 'Nik',
            'nama' => 'Nama',
            'tempat_lahir' => 'Tempat Lahir',
            'tanggal_lahir' => 'Tanggal Lahir',
            'jenis_kelamin' => 'Jenis Kelamin',
            'jalan' => 'Jalan',
            'rt' => 'Rt',
            'rw' => 'Rw',
            'provinsi_id' => 'Provinsi ID',
            'kota_id' => 'Kota ID',
            'kecamatan_id' => 'Kecamatan ID',
            'kelurahan_id' => 'Kelurahan ID',
            'user_id' => 'User ID',
            'login_terakhir' => 'Login Terakhir',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'no_rekening' => 'No Rekening',
            'nama_pemilik' => 'Nama Pemilik',
            'nama_bank' => 'Nama Bank',
            'no_hp' => 'No Hp',
            'no_sertifikat' => 'No Sertifikat',
            'tanggal_sertifikat' => 'Tanggal Sertifikat',
            'file_sertifikat' => 'File Sertifikat',
            'file_sk_walikota' => 'File Sk Walikota',
        ];
    }
}
