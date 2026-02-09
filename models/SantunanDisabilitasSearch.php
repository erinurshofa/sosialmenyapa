<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SantunanDisabilitas;

/**
 * SantunanDisabilitasSearch represents the model behind the search form of `app\models\SantunanDisabilitas`.
 */
class SantunanDisabilitasSearch extends SantunanDisabilitas
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'umur', 'kecamatan_id', 'kelurahan_id', 'dtks', 'kecamatan_id_pemohon', 'kelurahan_id_pemohon','rt','rw'], 'integer'],
            [['nik', 'nama', 'jenis_kelamin','jenis_kelamin_pemohon', 'tempat_lahir', 'tanggal_lahir', 'alamat', 'kecamatan_nama', 'kelurahan_nama', 'no_dtks', 'jenis_disabilitas', 'jenis_alat_bantu', 'no_kk', 'nik_pemohon', 'nama_pemohon', 'no_hp_pemohon', 'hubungan_pemohon', 'alamat_pemohon', 'kecamatan_nama_pemohon', 'kelurahan_nama_pemohon', 'tanggal_permohonan', 'foto_ktp', 'foto_kk', 'foto_surat_permohonan', 'foto_surat_pengantar', 'foto', 'foto_id_dtks', 'foto_tes_bera','status_verifikasi','status_validasi','status_approval','verifikasi','validasi','approved','diverifikasi','divalidasi','approved','tanggal_verifikasi','tanggal_validasi','tanggal_approval','keterangan_verifikasi','keterangan_validasi','keterangan_approval','dibuat','diedit', 'created_at', 'updated_at', 'deleted_at'], 'safe'],
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
        $query = SantunanDisabilitas::find();

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
            'tanggal_lahir' => $this->tanggal_lahir,
            'umur' => $this->umur,
            'kecamatan_id' => $this->kecamatan_id,
            'kelurahan_id' => $this->kelurahan_id,
            'dtks' => $this->dtks,
            'kecamatan_id_pemohon' => $this->kecamatan_id_pemohon,
            'kelurahan_id_pemohon' => $this->kelurahan_id_pemohon,
            'tanggal_permohonan' => $this->tanggal_permohonan,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
        ]);

        $query->andFilterWhere(['like', 'nik', $this->nik])
            ->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'jenis_kelamin', $this->jenis_kelamin])
            ->andFilterWhere(['like', 'jenis_kelamin_pemohon', $this->jenis_kelamin_pemohon])
            ->andFilterWhere(['like', 'tempat_lahir', $this->tempat_lahir])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'rt', $this->rt])
            ->andFilterWhere(['like', 'rw', $this->rw])
            ->andFilterWhere(['like', 'kecamatan_nama', $this->kecamatan_nama])
            ->andFilterWhere(['like', 'kelurahan_nama', $this->kelurahan_nama])
            ->andFilterWhere(['like', 'no_dtks', $this->no_dtks])
            ->andFilterWhere(['like', 'jenis_disabilitas', $this->jenis_disabilitas])
            ->andFilterWhere(['like', 'jenis_alat_bantu', $this->jenis_alat_bantu])
            ->andFilterWhere(['like', 'no_kk', $this->no_kk])
            ->andFilterWhere(['like', 'nik_pemohon', $this->nik_pemohon])
            ->andFilterWhere(['like', 'nama_pemohon', $this->nama_pemohon])
            ->andFilterWhere(['like', 'no_hp_pemohon', $this->no_hp_pemohon])
            ->andFilterWhere(['like', 'hubungan_pemohon', $this->hubungan_pemohon])
            ->andFilterWhere(['like', 'alamat_pemohon', $this->alamat_pemohon])
            ->andFilterWhere(['like', 'kecamatan_nama_pemohon', $this->kecamatan_nama_pemohon])
            ->andFilterWhere(['like', 'kelurahan_nama_pemohon', $this->kelurahan_nama_pemohon])
            ->andFilterWhere(['like', 'foto_ktp', $this->foto_ktp])
            ->andFilterWhere(['like', 'foto_kk', $this->foto_kk])
            ->andFilterWhere(['like', 'foto_surat_permohonan', $this->foto_surat_permohonan])
            ->andFilterWhere(['like', 'foto_surat_pengantar', $this->foto_surat_pengantar])
            ->andFilterWhere(['like', 'foto', $this->foto])
            ->andFilterWhere(['like', 'foto_id_dtks', $this->foto_id_dtks])
            ->andFilterWhere(['like', 'foto_tes_bera', $this->foto_tes_bera])
            ->andFilterWhere(['like', 'status_verifikasi', $this->status_verifikasi])
            ->andFilterWhere(['like', 'status_validasi', $this->status_validasi])
            ->andFilterWhere(['like', 'status_approval', $this->status_approval])
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
            ->andFilterWhere(['like', 'tanggal_approval', $this->tanggal_approval]);

   if (!empty($this->dibuat)) {
        $query->andFilterWhere(['dibuat' => $this->dibuat]);
   }
   if (!empty($this->diedit)) {
        $query->andFilterWhere(['diedit' => $this->diedit]);
   }

        return $dataProvider;
    }
}
