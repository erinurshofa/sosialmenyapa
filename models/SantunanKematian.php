<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "santunan_kematian".
 *
 * @property int $id
 * @property string $nik
 * @property string $nama
 * @property string $tempat_lahir
 * @property string $tanggal_lahir
 * @property string $tanggal_kematian
 * @property int|null $umur
 * @property string $alamat
 * @property string|null $rt
 * @property string|null $rw
 * @property int $kecamatan_id
 * @property string|null $kecamatan_nama
 * @property int $kelurahan_id
 * @property string|null $kelurahan_nama
 * @property string|null $no_dtks
 * @property int $dtks
 * @property string $nik_pemohon
 * @property string $nama_pemohon
 * @property string $no_hp_pemohon
 * @property string $hubungan_pemohon
 * @property string $alamat_pemohon
 * @property string|null $rt_pemohon
 * @property string|null $rw_pemohon
 * @property int $kecamatan_id_pemohon
 * @property string|null $kecamatan_nama_pemohon
 * @property int $kelurahan_id_pemohon
 * @property string|null $kelurahan_nama_pemohon
 * @property string|null $foto_ktp
 * @property string|null $foto_kk
 * @property string|null $foto_ktp_pemohon
 * @property string|null $foto_kk_pemohon
 * @property string|null $foto_sk_kematian
 * @property string|null $foto_sk_ahli_waris
 * @property string|null $foto_id_dtks
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property string|null $deleted_at
 * @property int $verifikasi
 * @property string|null $tanggal_verifikasi
 * @property int|null $diverifikasi
 * @property string|null $status_verifikasi
 * @property int $validasi
 * @property string|null $tanggal_validasi
 * @property int|null $divalidasi
 * @property string|null $status_validasi
 * @property string $status_permohonan
 * @property int|null $approved
 * @property string|null $tanggal_approval
 * @property int|null $approved_by
 * @property int|null $verifikasi_bag_hukum
 * @property string|null $tanggal_verifikasi_bag_hukum
 * @property int|null $diverifikasi_bag_hukum
 * @property int|null $verifikasi_inspektorat
 * @property string|null $tanggal_verifikasi_inspektorat
 * @property int|null $diverifikasi_inspektorat
 * @property string $nama_ahli_waris
 * @property int|null $jumlah_santunan
 * @property int $isverifikasi_dpkad
 * @property string|null $tanggal_verifikasi_dpkad
 * @property int|null $diverifikasi_dpkad
 */
class SantunanKematian extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'santunan_kematian';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nik', 'nama', 'tempat_lahir', 'tanggal_lahir', 'tanggal_kematian', 'alamat', 'kecamatan_id', 'kelurahan_id', 'nik_pemohon', 'nama_pemohon', 'no_hp_pemohon', 'hubungan_pemohon', 'alamat_pemohon', 'kecamatan_id_pemohon', 'kelurahan_id_pemohon', 'nama_ahli_waris','jenis_kelamin','jenis_kelamin_pemohon'], 'required'],
            [['tanggal_lahir', 'tanggal_kematian', 'created_at', 'updated_at', 'deleted_at', 'tanggal_verifikasi', 'tanggal_validasi', 'tanggal_approval', 'tanggal_verifikasi_bag_hukum', 'tanggal_verifikasi_inspektorat', 'tanggal_verifikasi_dpkad'], 'safe'],
            [['foto_ktp', 'foto_kk', 'foto_sk_kematian', 'foto_id_dtks', 'foto_ktp_pemohon', 'foto_kk_pemohon', 'foto_sk_ahli_waris'], 'required'],
            [['foto_ktp', 'foto_kk', 'foto_sk_kematian', 'foto_id_dtks', 'foto_ktp_pemohon', 'foto_kk_pemohon', 'foto_sk_ahli_waris'], 'file', 'extensions' => ['png', 'jpg', 'jpeg', 'pdf']],
            [['umur', 'kecamatan_id', 'kelurahan_id', 'dtks', 'kecamatan_id_pemohon', 'kelurahan_id_pemohon' , 'verifikasi_bag_hukum', 'diverifikasi_bag_hukum', 'verifikasi_inspektorat', 'diverifikasi_inspektorat', 'jumlah_santunan', 'isverifikasi_dpkad', 'diverifikasi_dpkad'], 'integer'],
            [['alamat', 'alamat_pemohon', 'status_verifikasi', 'status_validasi', 'status_permohonan','status_approval','keterangan_verifikasi','keterangan_validasi','keterangan_approval','verifikasi', 'diverifikasi', 'validasi', 'divalidasi', 'approved', 'approved_by'], 'string'],
            [['nik', 'nik_pemohon','jenis_kelamin','jenis_kelamin_pemohon'], 'string', 'max' => 16],
            [['nama', 'tempat_lahir', 'nama_pemohon', 'no_hp_pemohon', 'dibuat', 'diedit'], 'string', 'max' => 50],
            [['rt', 'rw', 'rt_pemohon', 'rw_pemohon'], 'string', 'max' => 5],
            [['kecamatan_nama', 'kelurahan_nama', 'no_dtks', 'nama_ahli_waris'], 'string', 'max' => 255],
            [['hubungan_pemohon', 'kecamatan_nama_pemohon', 'kelurahan_nama_pemohon'], 'string', 'max' => 30],
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
            'jenis_kelamin' => 'Jenis Kelamin',
            'tempat_lahir' => 'Tempat Lahir',
            'tanggal_lahir' => 'Tanggal Lahir',
            'tanggal_kematian' => 'Tanggal Kematian',
            'umur' => 'Umur',
            'alamat' => 'Alamat',
            'rt' => 'Rt',
            'rw' => 'Rw',
            'kecamatan_id' => 'Kecamatan ID',
            'kecamatan_nama' => 'Kecamatan Nama',
            'kelurahan_id' => 'Kelurahan ID',
            'kelurahan_nama' => 'Kelurahan Nama',
            'no_dtks' => 'No Dtks',
            'dtks' => 'Dtks',
            'nik_pemohon' => 'Nik Pemohon',
            'nama_pemohon' => 'Nama Pemohon',
            'jenis_kelamin_pemohon' => 'Jenis Kelamin Pemohon',
            'no_hp_pemohon' => 'No Hp Pemohon',
            'hubungan_pemohon' => 'Hubungan Pemohon',
            'alamat_pemohon' => 'Alamat Pemohon',
            'rt_pemohon' => 'Rt Pemohon',
            'rw_pemohon' => 'Rw Pemohon',
            'kecamatan_id_pemohon' => 'Kecamatan Id Pemohon',
            'kecamatan_nama_pemohon' => 'Kecamatan Nama Pemohon',
            'kelurahan_id_pemohon' => 'Kelurahan Id Pemohon',
            'kelurahan_nama_pemohon' => 'Kelurahan Nama Pemohon',
            'foto_ktp' => 'Foto Ktp',
            'foto_kk' => 'Foto Kk',
            'foto_ktp_pemohon' => 'Foto Ktp Pemohon',
            'foto_kk_pemohon' => 'Foto Kk Pemohon',
            'foto_sk_kematian' => 'Foto Sk Kematian',
            'foto_sk_ahli_waris' => 'Foto Sk Ahli Waris',
            'foto_id_dtks' => 'Foto Id Dtks',
            'verifikasi' => 'Verifikasi',
            'tanggal_verifikasi' => 'Tanggal Verifikasi',
            'diverifikasi' => 'Diverifikasi',
            'status_verifikasi' => 'Status Verifikasi',
            'keterangan_verifikasi' => 'Keterangan Verifikasi',
            'validasi' => 'Validasi',
            'tanggal_validasi' => 'Tanggal Validasi',
            'divalidasi' => 'Divalidasi',
            'status_validasi' => 'Status Validasi',
            'keterangan_validasi' => 'Keterangan Validasi',
            'status_permohonan' => 'Status Permohonan',
            'approved' => 'Approved',
            'status_approval' => 'Status Approval',
            'tanggal_approval' => 'Tanggal Approval',
            'approved_by' => 'Approved By',
            'keterangan_approval' => 'Keterangan Approval',
            'verifikasi_bag_hukum' => 'Verifikasi Bag Hukum',
            'tanggal_verifikasi_bag_hukum' => 'Tanggal Verifikasi Bag Hukum',
            'diverifikasi_bag_hukum' => 'Diverifikasi Bag Hukum',
            'verifikasi_inspektorat' => 'Verifikasi Inspektorat',
            'tanggal_verifikasi_inspektorat' => 'Tanggal Verifikasi Inspektorat',
            'diverifikasi_inspektorat' => 'Diverifikasi Inspektorat',
            'nama_ahli_waris' => 'Nama Ahli Waris',
            'jumlah_santunan' => 'Jumlah Santunan',
            'isverifikasi_dpkad' => 'Isverifikasi Dpkad',
            'tanggal_verifikasi_dpkad' => 'Tanggal Verifikasi Dpkad',
            'diverifikasi_dpkad' => 'Diverifikasi Dpkad',
            'dibuat' => 'Dibuat',
            'diedit' => 'Diedit',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'deleted_at' => 'Deleted At',
        ];
    }
}
