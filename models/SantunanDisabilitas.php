<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "santunan_disabilitas".
 *
 * @property int $id
 * @property string $nik
 * @property string $nama
 * @property string $tempat_lahir
 * @property string $tanggal_lahir
 * @property int $jenis_kelamin
 * @property int|null $umur
 * @property string $alamat
 * @property int $kecamatan_id
 * @property string|null $kecamatan_nama
 * @property int $kelurahan_id
 * @property string|null $kelurahan_nama
 * @property string|null $no_dtks
 * @property int $dtks
 * @property string|null $jenis_disabilitas
 * @property string|null $jenis_alat_bantu
 * @property string|null $no_kk
 * @property string $nik_pemohon
 * @property string $nama_pemohon
 * @property string|null $no_hp_pemohon
 * @property string|null $hubungan_pemohon
 * @property string $alamat_pemohon
 * @property int $kecamatan_id_pemohon
 * @property string|null $kecamatan_nama_pemohon
 * @property int $kelurahan_id_pemohon
 * @property string|null $kelurahan_nama_pemohon
 * @property string $tanggal_permohonan
 * @property string|null $foto_ktp
 * @property string|null $foto_kk
 * @property string|null $foto_surat_permohonan
 * @property string|null $foto_surat_pengantar
 * @property string|null $foto
 * @property string|null $foto_id_dtks
 * @property string|null $foto_tes_bera
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property string|null $deleted_at
 */
class SantunanDisabilitas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'santunan_disabilitas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nik', 'nama', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin','jenis_kelamin_pemohon', 'alamat', 'kecamatan_id', 'kelurahan_id', 'nik_pemohon', 'nama_pemohon', 'alamat_pemohon', 'kecamatan_id_pemohon', 'kelurahan_id_pemohon', 'tanggal_permohonan'], 'required'],
            [['tanggal_lahir', 'tanggal_permohonan', 'created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['foto_ktp', 'foto_kk', 'foto', 'foto_id_dtks', 'foto_surat_pengantar', 'foto_surat_permohonan', 'foto_tes_bera'], 'required'],
            [['foto_ktp', 'foto_kk', 'foto', 'foto_id_dtks', 'foto_surat_pengantar', 'foto_surat_permohonan', 'foto_tes_bera'], 'file', 'extensions' => ['png', 'jpg', 'jpeg', 'pdf']],
            [[ 'umur', 'kecamatan_id', 'kelurahan_id', 'dtks', 'kecamatan_id_pemohon', 'kelurahan_id_pemohon','rt','rw'], 'integer'],
            [['alamat', 'alamat_pemohon','keterangan_verifikasi','keterangan_validasi','keterangan_approval','status_verifikasi','status_validasi','status_approval'], 'string'],
            [['nik', 'no_kk', 'nik_pemohon','jenis_kelamin', 'jenis_kelamin_pemohon'], 'string', 'max' => 16],
            [['nama', 'tempat_lahir', 'jenis_disabilitas', 'jenis_alat_bantu', 'nama_pemohon', 'no_hp_pemohon', 'dibuat', 'diedit'], 'string', 'max' => 50],
            [['kecamatan_nama', 'kelurahan_nama', 'foto_ktp', 'foto_kk', 'foto_surat_permohonan', 'foto_surat_pengantar', 'foto', 'foto_id_dtks'], 'string', 'max' => 255],
            [['no_dtks', 'hubungan_pemohon', 'kecamatan_nama_pemohon', 'kelurahan_nama_pemohon'], 'string', 'max' => 30],
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
            'jenis_disabilitas' => 'Jenis Disabilitas',
            'jenis_alat_bantu' => 'Jenis Alat Bantu',
            'no_kk' => 'No Kk',
            'nik_pemohon' => 'Nik Pemohon',
            'nama_pemohon' => 'Nama Pemohon',
            'jenis_kelamin_pemohon' => 'Jenis Kelamin Pemohon',
            'no_hp_pemohon' => 'No Hp Pemohon',
            'hubungan_pemohon' => 'Hubungan Pemohon',
            'alamat_pemohon' => 'Alamat Pemohon',
            'kecamatan_id_pemohon' => 'Kecamatan Id Pemohon',
            'kecamatan_nama_pemohon' => 'Kecamatan Nama Pemohon',
            'kelurahan_id_pemohon' => 'Kelurahan Id Pemohon',
            'kelurahan_nama_pemohon' => 'Kelurahan Nama Pemohon',
            'tanggal_permohonan' => 'Tanggal Permohonan',
            'foto_ktp' => 'Foto Ktp',
            'foto_kk' => 'Foto Kk',
            'foto_surat_permohonan' => 'Foto Surat Permohonan',
            'foto_surat_pengantar' => 'Foto Surat Pengantar',
            'foto' => 'Foto',
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
            'dibuat' => 'Dibuat',
            'diedit' => 'Diedit',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'deleted_at' => 'Deleted At',
        ];
    }
}
