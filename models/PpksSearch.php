<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Ppks;
use app\models\JenisPmks;

/**
 * PpksSearch represents the model behind the search form of `app\models\Ppks`.
 */
class PpksSearch extends Ppks
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'rt', 'rw', 'masuk_dtks', 'anak_balita_terlantar', 'anak_terlantar', 'anak_yang_berhadapan_dengan_hukum', 'anak_jalanan', 'anak_dengan_kedisabilitasan', 'anak_dengan_kedisabilitasan_fisik', 'anak_dengan_kedisabilitasan_intelektual', 'anak_dengan_kedisabilitasan_mental', 'anak_dengan_kedisabilitasan_sensorik', 'anak_korban_tindak_kekerasan', 'anak_yang_memerlukan_perlindungan_khusus', 'lanjut_usia_terlantar', 'penyandang_disabilitas', 'penyandang_disabilitas_fisik', 'penyandang_disabilitas_intelektual', 'penyandang_disabilitas_mental', 'penyandang_disabilitas_sensorik', 'tuna_susila', 'gelandangan', 'pengemis', 'pemulung', 'kelompok_minoritas', 'bekas_warga_binaan_lembaga_pemasyarakatan', 'orang_dengan_hivaids', 'korban_penyalahgunaan_napza', 'korban_trafficking', 'korban_tindak_kekerasan', 'pekerja_migran_bermasalah_sosial', 'korban_bencana_alam', 'korban_bencana_sosial', 'perempuan_rawan_sosial_ekonomi', 'fakir_miskin', 'keluarga_bermasalah_sosial_psikologis', 'komunitas_adat_terpencil'], 'integer'],
            [['nama', 'nik', 'cek_double', 'no_kk', 'jenis_kelamin', 'alamat', 'kelurahan', 'kecamatan', 'status','jenis_ppks', 'jenis_ppks_fix', 'jenis_disabilitas', 'sumber_data', 'tempat_lahir', 'tanggal_lahir','tinggal_dalam_keluarga','hubungan_dgn_kepala_keluarga','status_kawin','pekerjaan_atau_sekolah','kondisi_keterlantaran','keterangan', 'punya_ktp','status_verifikasi','status_validasi','status_approval','verifikasi','validasi','approved','diverifikasi','divalidasi','approved','keterangan_verifikasi','keterangan_validasi','keterangan_approval','tanggal_verifikasi','tanggal_validasi','tanggal_approval','dibuat','diedit', 'created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Ppks::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'rt' => $this->rt,
            'rw' => $this->rw,
            'masuk_dtks' => $this->masuk_dtks,
            'anak_balita_terlantar' => $this->anak_balita_terlantar,
            'anak_terlantar' => $this->anak_terlantar,
            'anak_yang_berhadapan_dengan_hukum' => $this->anak_yang_berhadapan_dengan_hukum,
            'anak_jalanan' => $this->anak_jalanan,
            'anak_dengan_kedisabilitasan' => $this->anak_dengan_kedisabilitasan,
            'anak_dengan_kedisabilitasan_fisik' => $this->anak_dengan_kedisabilitasan_fisik,
            'anak_dengan_kedisabilitasan_intelektual' => $this->anak_dengan_kedisabilitasan_intelektual,
            'anak_dengan_kedisabilitasan_mental' => $this->anak_dengan_kedisabilitasan_mental,
            'anak_dengan_kedisabilitasan_sensorik' => $this->anak_dengan_kedisabilitasan_sensorik,
            'anak_korban_tindak_kekerasan' => $this->anak_korban_tindak_kekerasan,
            'anak_yang_memerlukan_perlindungan_khusus' => $this->anak_yang_memerlukan_perlindungan_khusus,
            'lanjut_usia_terlantar' => $this->lanjut_usia_terlantar,
            'penyandang_disabilitas' => $this->penyandang_disabilitas,
            'penyandang_disabilitas_fisik' => $this->penyandang_disabilitas_fisik,
            'penyandang_disabilitas_intelektual' => $this->penyandang_disabilitas_intelektual,
            'penyandang_disabilitas_mental' => $this->penyandang_disabilitas_mental,
            'penyandang_disabilitas_sensorik' => $this->penyandang_disabilitas_sensorik,
            'tuna_susila' => $this->tuna_susila,
            'gelandangan' => $this->gelandangan,
            'pengemis' => $this->pengemis,
            'pemulung' => $this->pemulung,
            'kelompok_minoritas' => $this->kelompok_minoritas,
            'bekas_warga_binaan_lembaga_pemasyarakatan' => $this->bekas_warga_binaan_lembaga_pemasyarakatan,
            'orang_dengan_hivaids' => $this->orang_dengan_hivaids,
            'korban_penyalahgunaan_napza' => $this->korban_penyalahgunaan_napza,
            'korban_trafficking' => $this->korban_trafficking,
            'korban_tindak_kekerasan' => $this->korban_tindak_kekerasan,
            'pekerja_migran_bermasalah_sosial' => $this->pekerja_migran_bermasalah_sosial,
            'korban_bencana_alam' => $this->korban_bencana_alam,
            'korban_bencana_sosial' => $this->korban_bencana_sosial,
            'perempuan_rawan_sosial_ekonomi' => $this->perempuan_rawan_sosial_ekonomi,
            'fakir_miskin' => $this->fakir_miskin,
            'keluarga_bermasalah_sosial_psikologis' => $this->keluarga_bermasalah_sosial_psikologis,
            'komunitas_adat_terpencil' => $this->komunitas_adat_terpencil,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'nik', $this->nik])
            ->andFilterWhere(['like', 'cek_double', $this->cek_double])
            ->andFilterWhere(['like', 'no_kk', $this->no_kk])
            // ->andFilterWhere(['like', 'jenis_kelamin', $this->jenis_kelamin])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            // ->andFilterWhere(['like', 'kelurahan', $this->kelurahan])
            // ->andFilterWhere(['like', 'kecamatan', $this->kecamatan])
            ->andFilterWhere(['like', 'status_verifikasi', $this->status_verifikasi])
            ->andFilterWhere(['like', 'status_validasi', $this->status_validasi])
            // ->andFilterWhere(['like', 'status_approval', $this->status_approval])
            ->andFilterWhere(['like', 'verifikasi', $this->verifikasi])
            ->andFilterWhere(['like', 'validasi', $this->validasi])
            // ->andFilterWhere(['like', 'approval', $this->approval])
            ->andFilterWhere(['like', 'diverifikasi', $this->diverifikasi])
            ->andFilterWhere(['like', 'divalidasi', $this->divalidasi])
            ->andFilterWhere(['like', 'approved', $this->approved])
            ->andFilterWhere(['like', 'keterangan_verifikasi', $this->keterangan_verifikasi])
            ->andFilterWhere(['like', 'keterangan_validasi', $this->keterangan_validasi])
            ->andFilterWhere(['like', 'keterangan_approval', $this->keterangan_approval])
            ->andFilterWhere(['like', 'tanggal_verifikasi', $this->tanggal_verifikasi])
            ->andFilterWhere(['like', 'tanggal_validasi', $this->tanggal_validasi])
            ->andFilterWhere(['like', 'tanggal_approval', $this->tanggal_approval])
            ->andFilterWhere(['like', 'jenis_ppks', $this->jenis_ppks])
            ->andFilterWhere(['like', 'jenis_ppks_fix', $this->jenis_ppks_fix])
            ->andFilterWhere(['like', 'jenis_disabilitas', $this->jenis_disabilitas])
            ->andFilterWhere(['like', 'sumber_data', $this->sumber_data])
            ->andFilterWhere(['like', 'tempat_lahir', $this->tempat_lahir])
            ->andFilterWhere(['like', 'tanggal_lahir', $this->tanggal_lahir])
            ->andFilterWhere(['like', 'tinggal_dalam_keluarga', $this->tinggal_dalam_keluarga])
            ->andFilterWhere(['like', 'hubungan_dgn_kepala_keluarga', $this->hubungan_dgn_kepala_keluarga])
            ->andFilterWhere(['like', 'status_kawin', $this->status_kawin])
            ->andFilterWhere(['like', 'pekerjaan_atau_sekolah', $this->pekerjaan_atau_sekolah])
            ->andFilterWhere(['like', 'kondisi_keterlantaran', $this->kondisi_keterlantaran])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan])
            ->andFilterWhere(['like', 'punya_ktp', $this->punya_ktp]);

    if (!empty($this->jenis_kelamin)) {
         $query->andFilterWhere(['jenis_kelamin' => $this->jenis_kelamin]);
    }

    if (!empty($this->dibuat)) {
        $query->andFilterWhere(['dibuat' => $this->dibuat]);
   }

    if (!empty($this->jenis_pmks)) {
        $query->andFilterWhere([ $this->jenis_pmks =>1]);
    }

    if (!empty($this->status) && strtolower(trim($this->status)) == "terlantar") {
        $query->andFilterWhere(['like', 'jenis_ppks_fix', 'PENYANDANG DISABILITAS (TERLANTAR)'])
              ->orFilterWhere(['anak_terlantar' => 1])
              ->orFilterWhere(['lanjut_usia_terlantar' => 1])
              ->orFilterWhere(['gelandangan' => 1])
              ->orFilterWhere(['pengemis' => 1]);
    }

    if (!empty($this->all_jenis_pmks)) {
        $jenis=JenisPmks::find()->all();
        foreach ($jenis as $value) {
            $query->orFilterWhere([$value['kode'] =>1]);
        }  
    }
    
        // Filter berdasarkan kecamatan
    if (!empty($this->kecamatan)) {
        $query->andFilterWhere(['like', 'kecamatan', $this->kecamatan]);
    }

    // Filter berdasarkan kelurahan
    if (!empty($this->kelurahan)) {
        $query->andFilterWhere(['like', 'kelurahan', $this->kelurahan]);
    }

        return $dataProvider;
    }
}
