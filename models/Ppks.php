<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ppks".
 *
 * @property int $id
 * @property string $nama
 * @property string|null $nik
 * @property string|null $cek_double
 * @property string|null $no_kk
 * @property string|null $jenis_kelamin
 * @property string|null $alamat
 * @property int|null $rt
 * @property int|null $rw
 * @property string|null $provinsi_id
 * @property string|null $provinsi
 * @property string|null $kota_id
 * @property string|null $kota
 * @property string|null $kecamatan_id
 * @property string|null $kecamatan
 * @property string|null $kelurahan_id
 * @property string|null $kelurahan
 * @property string|null $alamat_domisili
 * @property int|null $rt_domisili
 * @property int|null $rw_domisili
 * @property string|null $provinsi_domisili_id
 * @property string|null $provinsi_domisili
 * @property string|null $kota_domisili_id
 * @property string|null $kota_domisili
 * @property string|null $kecamatan_domisili_id
 * @property string|null $kecamatan_domisili
 * @property string|null $kelurahan_domisili_id
 * @property string|null $kelurahan_domisili
 * @property string|null $jenis_ppks
 * @property string|null $jenis_ppks_fix
 * @property string|null $jenis_disabilitas
 * @property string|null $sumber_data
 * @property string|null $tempat_lahir
 * @property string|null $tanggal_lahir
 * @property string|null $punya_ktp
 * @property string|null $nama_cp
 * @property string|null $nomor_hp_cp
 * @property string|null $khusus_penyandang_disabilitas
 * @property int|null $masuk_dtks
 * @property int|null $stunting
 * @property int|null $tbc
 * @property int|null $p3ke
 * @property int|null $ibu_nifas
 * @property int|null $ibu_hamil
 * @property int|null $anak_yatim
 * @property int|null $calon_pengantin
 * @property int|null $anak_balita_terlantar
 * @property int|null $anak_terlantar
 * @property int|null $anak_yang_berhadapan_dengan_hukum
 * @property int|null $anak_jalanan
 * @property int|null $anak_dengan_kedisabilitasan
 * @property int|null $anak_dengan_kedisabilitasan_fisik
 * @property int|null $anak_dengan_kedisabilitasan_intelektual
 * @property int|null $anak_dengan_kedisabilitasan_mental
 * @property int|null $anak_dengan_kedisabilitasan_sensorik
 * @property int|null $anak_korban_tindak_kekerasan
 * @property int|null $anak_yang_memerlukan_perlindungan_khusus
 * @property int|null $lanjut_usia_terlantar
 * @property int|null $penyandang_disabilitas
 * @property int|null $penyandang_disabilitas_fisik
 * @property int|null $penyandang_disabilitas_intelektual
 * @property int|null $penyandang_disabilitas_mental
 * @property int|null $penyandang_disabilitas_sensorik
 * @property int|null $tuna_susila
 * @property int|null $gelandangan
 * @property int|null $pengemis
 * @property int|null $pemulung
 * @property int|null $kelompok_minoritas
 * @property int|null $bekas_warga_binaan_lembaga_pemasyarakatan
 * @property int|null $orang_dengan_hivaids
 * @property int|null $korban_penyalahgunaan_napza
 * @property int|null $korban_trafficking
 * @property int|null $korban_tindak_kekerasan
 * @property int|null $pekerja_migran_bermasalah_sosial
 * @property int|null $korban_bencana_alam
 * @property int|null $korban_bencana_sosial
 * @property int|null $perempuan_rawan_sosial_ekonomi
 * @property int|null $fakir_miskin
 * @property int|null $keluarga_bermasalah_sosial_psikologis
 * @property int|null $komunitas_adat_terpencil
 * @property string|null $verifikasi
 * @property string|null $tanggal_verifikasi
 * @property string|null $diverifikasi
 * @property string|null $status_verifikasi
 * @property string|null $validasi
 * @property string|null $tanggal_validasi
 * @property string|null $status_validasi
 * @property string|null $status_permohonan
 * @property string|null $approved
 * @property string|null $tanggal_approval
 * @property string|null $approved_by
 * @property string|null $dibuat
 * @property string|null $diedit
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Ppks extends \yii\db\ActiveRecord
{
    public $jenis_pmks;
    public $all_jenis_pmks;
    public $status;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ppks';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama'], 'required'],
            [['alamat', 'alamat_domisili', 'jenis_ppks', 'foto_orang', 'foto_rumah'], 'string'],
            [['rt', 'rw', 'rt_domisili', 'rw_domisili', 'masuk_dtks', 'stunting', 'tbc', 'p3ke', 'ibu_nifas', 'ibu_hamil', 'anak_yatim', 'calon_pengantin', 'anak_balita_terlantar', 'anak_terlantar', 'anak_yang_berhadapan_dengan_hukum', 'anak_jalanan', 'anak_dengan_kedisabilitasan', 'anak_dengan_kedisabilitasan_fisik', 'anak_dengan_kedisabilitasan_intelektual', 'anak_dengan_kedisabilitasan_mental', 'anak_dengan_kedisabilitasan_sensorik', 'anak_korban_tindak_kekerasan', 'anak_yang_memerlukan_perlindungan_khusus', 'lanjut_usia_terlantar', 'penyandang_disabilitas', 'penyandang_disabilitas_fisik', 'penyandang_disabilitas_intelektual', 'penyandang_disabilitas_mental', 'penyandang_disabilitas_sensorik', 'tuna_susila', 'gelandangan', 'pengemis', 'pemulung', 'kelompok_minoritas', 'bekas_warga_binaan_lembaga_pemasyarakatan', 'orang_dengan_hivaids', 'korban_penyalahgunaan_napza', 'korban_trafficking', 'korban_tindak_kekerasan', 'pekerja_migran_bermasalah_sosial', 'korban_bencana_alam', 'korban_bencana_sosial', 'perempuan_rawan_sosial_ekonomi', 'fakir_miskin', 'keluarga_bermasalah_sosial_psikologis', 'komunitas_adat_terpencil', 'dsen_id'], 'integer'],
            [['tanggal_verifikasi', 'tanggal_validasi', 'tanggal_approval', 'created_at', 'updated_at'], 'safe'],
            [['nama', 'jenis_kelamin', 'provinsi_id', 'provinsi', 'kota_id', 'kota', 'kecamatan_id', 'kecamatan', 'kelurahan_id', 'kelurahan', 'provinsi_domisili_id', 'provinsi_domisili', 'kota_domisili_id', 'kota_domisili', 'kecamatan_domisili_id', 'kecamatan_domisili', 'kelurahan_domisili_id', 'kelurahan_domisili', 'jenis_ppks_fix', 'jenis_disabilitas', 'sumber_data', 'tempat_lahir', 'tanggal_lahir','tinggal_dalam_keluarga','hubungan_dgn_kepala_keluarga','status_kawin','pekerjaan_atau_sekolah','kondisi_keterlantaran','keterangan', 'punya_ktp', 'nama_cp', 'nomor_hp_cp', 'khusus_penyandang_disabilitas', 'tanggal_input', 'kondisi_kesehatan', 'apakah_terlantar', 'keterangan_disabilitas_ganda'], 'string', 'max' => 255],
            [['nik', 'cek_double', 'no_kk'], 'string', 'max' => 16],
            [['verifikasi', 'diverifikasi','keterangan_verifikasi', 'status_verifikasi', 'validasi', 'status_validasi', 'status_permohonan', 'approved', 'approved_by', 'dibuat', 'diedit'], 'string', 'max' => 50],
            [['nik'], 'unique'],
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
            'cek_double' => 'Cek Double',
            'no_kk' => 'No Kk',
            'jenis_kelamin' => 'Jenis Kelamin',
            'alamat' => 'Alamat',
            'rt' => 'Rt',
            'rw' => 'Rw',
            'provinsi_id' => 'Provinsi ID',
            'provinsi' => 'Provinsi',
            'kota_id' => 'Kota ID',
            'kota' => 'Kota',
            'kecamatan_id' => 'Kecamatan ID',
            'kecamatan' => 'Kecamatan',
            'kelurahan_id' => 'Kelurahan ID',
            'kelurahan' => 'Kelurahan',
            'alamat_domisili' => 'Alamat Domisili',
            'rt_domisili' => 'Rt Domisili',
            'rw_domisili' => 'Rw Domisili',
            'provinsi_domisili_id' => 'Provinsi Domisili ID',
            'provinsi_domisili' => 'Provinsi Domisili',
            'kota_domisili_id' => 'Kota Domisili ID',
            'kota_domisili' => 'Kota Domisili',
            'kecamatan_domisili_id' => 'Kecamatan Domisili ID',
            'kecamatan_domisili' => 'Kecamatan Domisili',
            'kelurahan_domisili_id' => 'Kelurahan Domisili ID',
            'kelurahan_domisili' => 'Kelurahan Domisili',
            'jenis_ppks' => 'Jenis Ppks',
            'jenis_ppks_fix' => 'Jenis Ppks Fix',
            'jenis_disabilitas' => 'Jenis Disabilitas',
            'sumber_data' => 'Sumber Data',
            'tempat_lahir' => 'Tempat Lahir',
            'tanggal_lahir' => 'Tanggal Lahir',
            'tinggal_dalam_keluarga' => 'Tinggal Dalam Keluarga',
            'hubungan_dgn_kepala_keluarga' => 'Hubungan Dgn Kepala Keluarga',
            'status_kawin' => 'Status Kawin',
            'pekerjaan_atau_sekolah' => 'Pekerjaan Atau Sekolah',
            'apakah_terlantar' => 'Apakah Terlantar?',
            'kondisi_keterlantaran' => 'Kondisi Keterlantaran',
            'kondisi_kesehatan' => 'Kondisi Kesehatan',
            'keterangan' => 'Keterangan',
            'keterangan_disabilitas_ganda' => 'Keterangan Disabilitas Ganda',
            'foto_orang' => 'Foto Orang Yang Bersangkutan',
            'foto_rumah' => 'Foto Rumah',
            'punya_ktp' => 'Punya Ktp',
            'nama_cp' => 'Nama Cp',
            'nomor_hp_cp' => 'Nomor Hp Cp',
            'khusus_penyandang_disabilitas' => 'Khusus Penyandang Disabilitas',
            'masuk_dtks' => 'Masuk Dtks',
            'stunting' => 'Stunting',
            'tbc' => 'Tbc',
            'p3ke' => 'P3ke',
            'ibu_nifas' => 'Ibu Nifas',
            'ibu_hamil' => 'Ibu Hamil',
            'anak_yatim' => 'Anak Yatim',
            'calon_pengantin' => 'Calon Pengantin',
            'anak_balita_terlantar' => 'Anak Balita Terlantar',
            'anak_terlantar' => 'Anak Terlantar',
            'anak_yang_berhadapan_dengan_hukum' => 'Anak Yang Berhadapan Dengan Hukum',
            'anak_jalanan' => 'Anak Jalanan',
            'anak_dengan_kedisabilitasan' => 'Anak Dengan Kedisabilitasan',
            'anak_dengan_kedisabilitasan_fisik' => 'Anak Dengan Kedisabilitasan Fisik',
            'anak_dengan_kedisabilitasan_intelektual' => 'Anak Dengan Kedisabilitasan Intelektual',
            'anak_dengan_kedisabilitasan_mental' => 'Anak Dengan Kedisabilitasan Mental',
            'anak_dengan_kedisabilitasan_sensorik' => 'Anak Dengan Kedisabilitasan Sensorik',
            'anak_korban_tindak_kekerasan' => 'Anak Korban Tindak Kekerasan',
            'anak_yang_memerlukan_perlindungan_khusus' => 'Anak Yang Memerlukan Perlindungan Khusus',
            'lanjut_usia_terlantar' => 'Lanjut Usia Terlantar',
            'penyandang_disabilitas' => 'Penyandang Disabilitas',
            'penyandang_disabilitas_fisik' => 'Penyandang Disabilitas Fisik',
            'penyandang_disabilitas_intelektual' => 'Penyandang Disabilitas Intelektual',
            'penyandang_disabilitas_mental' => 'Penyandang Disabilitas Mental',
            'penyandang_disabilitas_sensorik' => 'Penyandang Disabilitas Sensorik',
            'tuna_susila' => 'Tuna Susila',
            'gelandangan' => 'Gelandangan',
            'pengemis' => 'Pengemis',
            'pemulung' => 'Pemulung',
            'kelompok_minoritas' => 'Kelompok Minoritas',
            'bekas_warga_binaan_lembaga_pemasyarakatan' => 'Bekas Warga Binaan Lembaga Pemasyarakatan',
            'orang_dengan_hivaids' => 'Orang Dengan Hivaids',
            'korban_penyalahgunaan_napza' => 'Korban Penyalahgunaan Napza',
            'korban_trafficking' => 'Korban Trafficking',
            'korban_tindak_kekerasan' => 'Korban Tindak Kekerasan',
            'pekerja_migran_bermasalah_sosial' => 'Pekerja Migran Bermasalah Sosial',
            'korban_bencana_alam' => 'Korban Bencana Alam',
            'korban_bencana_sosial' => 'Korban Bencana Sosial',
            'perempuan_rawan_sosial_ekonomi' => 'Perempuan Rawan Sosial Ekonomi',
            'fakir_miskin' => 'Fakir Miskin',
            'keluarga_bermasalah_sosial_psikologis' => 'Keluarga Bermasalah Sosial Psikologis',
            'komunitas_adat_terpencil' => 'Komunitas Adat Terpencil',
            'verifikasi' => 'Verifikasi',
            'tanggal_verifikasi' => 'Tanggal Verifikasi',
            'diverifikasi' => 'Diverifikasi',
            'status_verifikasi' => 'Status Verifikasi',
            'keterangan_verifikasi' => 'Keterangan Verifikasi',
            'validasi' => 'Validasi',
            'tanggal_validasi' => 'Tanggal Validasi',
            'status_validasi' => 'Status Validasi',
            'status_permohonan' => 'Status Permohonan',
            'approved' => 'Approved',
            'tanggal_approval' => 'Tanggal Approval',
            'approved_by' => 'Approved By',
            'dibuat' => 'Dibuat',
            'diedit' => 'Diedit',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        foreach ($changedAttributes as $kolom => $nilaiLama) {
            $nilaiBaru = $this->$kolom;
            $status="baru";
            if ($nilaiLama != $nilaiBaru) {
                $nilaiLama==null?$status:$status="edit";
                Yii::$app->db->createCommand()->insert('history_perubahan', [
                    'tabel_terkait' => static::tableName(),
                    'id_data' => $this->id,
                    'kolom' => $kolom,
                    'status' => $status,
                    'nilai_lama' => $nilaiLama,
                    'nilai_baru' => $nilaiBaru,
                    'user_id' => Yii::$app->user->id,
                    'created_at' => date('Y-m-d H:i:s'),
                ])->execute();
            }
        }
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDsen()
    {
        return $this->hasOne(Dsen::className(), ['id' => 'dsen_id']);
    }
}
