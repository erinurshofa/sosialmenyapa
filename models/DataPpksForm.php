<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class DataPpksForm extends Model
{
    public $nama;
    public $nik;
    public $no_kk;
    public $jenis_kelamin;
    public $masuk_dtks;
    public $khusus_penyandang_disabilitas;
    public $punya_ktp;
    public $alamat_ktp;
    public $rt_ktp;
    public $rw_ktp;
    public $provinsi_ktp;
    public $kota_ktp;
    public $kecamatan_ktp;
    public $kelurahan_ktp;
    public $alamat_domisili;
    public $rt_domisili;
    public $rw_domisili;
    public $provinsi_domisili;
    public $kota_domisili;
    public $kecamatan_domisili;
    public $kelurahan_domisili;

    public $nama_cp;
    public $nomor_hp_cp;
    public $tinggal_dalam_keluarga;
    public $tempat_lahir;
    public $tanggal_lahir;
    public $hubungan_dgn_kepala_keluarga;
    public $status_kawin;
    public $pekerjaan_atau_sekolah;
    public $kondisi_keterlantaran;
    public $keterangan;
    public $jenis_disabilitas;
    public $foto_orang;
    public $foto_rumah;


    public function rules()
    {
        return [
            [['nama', 'jenis_kelamin', 'alamat_ktp', 'rt_ktp', 'rw_ktp', 'kecamatan_ktp', 'kelurahan_ktp', 'alamat_domisili', 'rt_domisili', 'rw_domisili', 'kecamatan_domisili', 'kelurahan_domisili', 'nama_cp', 'nomor_hp_cp'], 'required'],
            [['nama', 'nik','no_kk', 'alamat_ktp', 'kecamatan_ktp', 'kelurahan_ktp', 'alamat_domisili', 'kecamatan_domisili', 'kelurahan_domisili', 'nama_cp', 'tempat_lahir', 'tanggal_lahir','tinggal_dalam_keluarga','hubungan_dgn_kepala_keluarga','status_kawin','pekerjaan_atau_sekolah','kondisi_keterlantaran','keterangan', 'tanggal_input'], 'string', 'max' => 255],
            [['foto_orang', 'foto_rumah'], 'string'],
            [['nik'], 'string', 'length' => 16],
            [['jenis_kelamin'], 'in', 'range' => ['LAKI-LAKI', 'PEREMPUAN']],
            // [['masuk_dtks'], 'in', 'range' => ['YA', 'TIDAK']],
            // [['punya_ktp'], 'in', 'range' => ['PUNYA', 'TIDAK PUNYA']],
            [['khusus_penyandang_disabilitas'], 'in', 'range' => ['TERLANTAR', 'TIDAK TERLANTAR']],
            // [['masuk_dtks', 'khusus_penyandang_disabilitas', 'punya_ktp'], 'boolean'],
            [['rt_ktp', 'rw_ktp', 'rt_domisili', 'rw_domisili', 'dsen_id'], 'integer'],
            [['nomor_hp_cp'], 'match', 'pattern' => '/^\+?\d{10,15}$/', 'message' => 'Nomor HP tidak valid.'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'nama' => 'Nama Lengkap',
            'nik' => 'Nomor Induk Kependudukan (NIK)',
            'no_kk' => 'Nomor Kartu Keluarga (KK)',
            'jenis_kelamin' => 'Jenis Kelamin',
            'masuk_dtks' => 'Masuk DTKS',
            'khusus_penyandang_disabilitas' => 'Khusus Penyandang Disabilitas',
            'punya_ktp' => 'Memiliki KTP',
            'alamat_ktp' => 'Alamat KTP',
            'rt_ktp' => 'RT KTP',
            'rw_ktp' => 'RW KTP',
            'kecamatan_ktp' => 'Kecamatan KTP',
            'kelurahan_ktp' => 'Kelurahan KTP',
            'alamat_domisili' => 'Alamat Domisili',
            'rt_domisili' => 'RT Domisili',
            'rw_domisili' => 'RW Domisili',
            'kecamatan_domisili' => 'Kecamatan Domisili',
            'kelurahan_domisili' => 'Kelurahan Domisili',
            'nama_cp' => 'Nama Kontak Person',
            'nomor_hp_cp' => 'Nomor HP Kontak Person',
            'tempat_lahir' => 'Tempat Lahir',
            'tanggal_lahir' => 'Tanggal Lahir',
            'tinggal_dalam_keluarga' => 'Tinggal Dalam Keluarga',
            'hubungan_dgn_kepala_keluarga' => 'Hubungan Dgn Kepala Keluarga',
            'status_kawin' => 'Status Kawin',
            'pekerjaan_atau_sekolah' => 'Pekerjaan Atau Sekolah',
            'kondisi_keterlantaran' => 'Kondisi Keterlantaran',
            'keterangan' => 'Keterangan',
            'foto_orang' => 'Foto Orang Yang Bersangkutan',
            'foto_rumah' => 'Foto Rumah',
        ];
    }

    public function hubunganDenganKepalaKeluarga(){
        $array=[
            'KEPALA KELUARGA'         => 'KEPALA KELUARGA',
            'SUAMI'                   => 'SUAMI',
            'ISTRI'                   => 'ISTRI',
            'ANAK'                    => 'ANAK',
            'MENANTU'                 => 'MENANTU',
            'CUCU'                    => 'CUCU',
            'ORANG TUA'              => 'ORANG TUA',
            'MERTUA'                  => 'MERTUA',
            'FAMILI LAIN'             => 'FAMILI LAIN',
            'PEMBANTU'                => 'PEMBANTU',
            'LAINNYA'                 => 'LAINNYA',
        ];
        return $array;
    }

    public function jenisDisabilitas(){
        $array=[
            'TIDAK ADA'                      => 'TIDAK ADA',
            'DISABILITAS FISIK'             => 'DISABILITAS FISIK',
            'DISABILITAS SENSORIK PENGLIHATAN' => 'DISABILITAS SENSORIK PENGLIHATAN',
            'DISABILITAS SENSORIK PENDENGARAN' => 'DISABILITAS SENSORIK PENDENGARAN',
            'DISABILITAS INTELEKTUAL'       => 'DISABILITAS INTELEKTUAL',
            'DISABILITAS MENTAL'            => 'DISABILITAS MENTAL',
            'DISABILITAS GANDA'             => 'DISABILITAS GANDA',
            'LAINNYA'                       => 'LAINNYA',
        ];
        return $array;
    }

    public function pekerjaanAtauSekolah(){
        $array=[
            'TIDAK SEKOLAH' => 'TIDAK SEKOLAH',
            'MASIH SEKOLAH' => 'MASIH SEKOLAH',
            'TIDAK BEKERJA' => 'TIDAK BEKERJA',
            'BEKERJA TIDAK TETAP' => 'BEKERJA TIDAK TETAP',
            'BEKERJA TETAP' => 'BEKERJA TETAP',
            'SEKOLAH DAN BEKERJA' => 'SEKOLAH DAN BEKERJA',
            'LANSIA TIDAK BEKERJA' => 'LANSIA TIDAK BEKERJA',
            'DISABILITAS TIDAK BEKERJA' => 'DISABILITAS TIDAK BEKERJA',
            'IBU RUMAH TANGGA' => 'IBU RUMAH TANGGA',
            'ANAK USIA DINI' => 'ANAK USIA DINI',
        ];
        return $array;
    }

    public function statusPerkawinan(){
        $array=[
            'BELUM KAWIN' => 'BELUM KAWIN',
            'KAWIN' => 'KAWIN',
            'CERAI HIDUP' => 'CERAI HIDUP',
            'CERAI MATI' => 'CERAI MATI',
        ];
        return $array;
    }
    public function listTinggalDalamKeluarga(){
        $array = ['DI DALAM KELUARGA'=>'DI DALAM KELUARGA','DI LUAR KELUARGA'=>'DI LUAR KELUARGA'];
        return $array;
    }
    public function listKondisiKeterlantaran(){
        $array = [
            'KELUARGA/MASYARAKAT/SESEORANG TIDAK MENGURUS'=>'KELUARGA/MASYARAKAT/SESEORANG TIDAK MENGURUS',
            'RENTAN MENGALAMI TINDAK KEKERASAN DARI LINGKUNGAN'=>'RENTAN MENGALAMI TINDAK KEKERASAN DARI LINGKUNGAN',
            'MASIH MEMILIKI KELUARGA TETAPI MENGALAMI TINDAK KEKERASAN PERLAKUAN SALAH EKSPLOITASI, DAN PENELANTARAN'=>'MASIH MEMILIKI KELUARGA TETAPI MENGALAMI TINDAK KEKERASAN PERLAKUAN SALAH EKSPLOITASI, DAN PENELANTARAN',
        ];
        return $array;
    }

    public function listJenisKelamin(){
        $array = ['LAKI-LAKI'=>'LAKI-LAKI','PEREMPUAN'=>'PEREMPUAN'];
        return $array;
    }
    public function masukDTKS(){
        $array = [0=>'TIDAK',1=>'YA'];
        return $array;
    }
    public function khususPenyandangDisabilitas(){
        $array = ['TERLANTAR'=>'TERLANTAR','TIDAK TERLANTAR'=>'TIDAK TERLANTAR'];
        return $array;
    }
    public function punyaKtp(){
        $array = [0=>'TIDAK PUNYA',1=>'PUNYA',];
        return $array;
    }

    
    public $dsen_id;
    public $tanggal_input;

    public function listDsen(){
        return \yii\helpers\ArrayHelper::map(Dsen::find()->all(), 'id', 'nama');
    }
}