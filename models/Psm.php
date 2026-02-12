<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "psm".
 *
 * @property int $id
 * @property string|null $nama
 * @property string|null $nik
 * @property string|null $email
 * @property string|null $hp
 * @property string|null $kecamatan
 * @property string|null $kelurahan
 * @property string|null $keterangan
 * @property string|null $tempat_lahir
 * @property string|null $tanggal_lahir
 * @property int|null $jenis_kelamin
 * @property string|null $jalan
 * @property string|null $rt
 * @property string|null $rw
 * @property string|null $provinsi_id
 * @property string|null $kota_id
 * @property string|null $kecamatan_id
 * @property string|null $kelurahan_id
 * @property int $user_id
 * @property string|null $login_terakhir
 * @property string|null $no_rekening
 * @property string|null $nama_pemilik
 * @property string|null $nama_bank
 * @property string|null $no_sertifikat
 * @property string|null $tanggal_sertifikat
 * @property string|null $file_sertifikat
 * @property string|null $file_sk_walikota
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Psm extends \yii\db\ActiveRecord
{
    public $password;
    public $confirm_password;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'psm';
    }

    /**
     * {@inheritdoc}
     */
    public $verifyCode; // CAPTCHA property

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tanggal_lahir', 'login_terakhir', 'tanggal_sertifikat', 'created_at', 'updated_at'], 'safe'],
            [['jenis_kelamin', 'user_id'], 'integer'],
            // [['user_id'], 'required'], // User ID is generated in controller, so unsafe to require it from input if load() is used broadly, but here it's fine.
            [['nama', 'nik', 'email', 'hp', 'kecamatan', 'kelurahan', 'keterangan', 'jalan', 'no_sertifikat', 'file_sertifikat','password','confirm_password'], 'string', 'max' => 255],
            [['tempat_lahir', 'no_rekening', 'nama_pemilik', 'file_sk_walikota'], 'string', 'max' => 100],
            [['rt', 'rw'], 'string', 'max' => 5],
            [['provinsi_id'], 'string', 'max' => 2],
            [['kota_id'], 'string', 'max' => 4],
            [['kecamatan_id'], 'string', 'max' => 7],
            [['kelurahan_id'], 'string', 'max' => 10],
            [['nama_bank'], 'string', 'max' => 50],

            // SECURITY ADDITIONS
            [['email'], 'email'],
            [['nik', 'email'], 'unique', 'targetClass' => '\app\models\Psm', 'message' => 'Data {attribute} sudah terdaftar.'],
            [['password'], 'string', 'min' => 6],
            [['confirm_password'], 'compare', 'compareAttribute' => 'password', 'message' => 'Konfirmasi password tidak cocok.'],
            [['verifyCode'], 'captcha'],

            // DATA FORMAT VALIDATION
            ['hp', 'match', 'pattern' => '/^[0-9]+$/', 'message' => 'Nomor HP harus berupa angka.'],
            ['nik', 'match', 'pattern' => '/^[0-9]{16}$/', 'message' => 'NIK harus berupa 16 digit angka.'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'nik' => 'Nik',
            'email' => 'Email',
            'hp' => 'Hp',
            'kecamatan' => 'Kecamatan',
            'kelurahan' => 'Kelurahan',
            'keterangan' => 'Keterangan',
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
            'no_rekening' => 'No Rekening',
            'nama_pemilik' => 'Nama Pemilik',
            'nama_bank' => 'Nama Bank',
            'no_sertifikat' => 'No Sertifikat',
            'tanggal_sertifikat' => 'Tanggal Sertifikat',
            'file_sertifikat' => 'File Sertifikat',
            'file_sk_walikota' => 'File Sk Walikota',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }
}
