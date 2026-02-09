<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SantunanKematian;

/**
 * SantunanKematianSearch represents the model behind the search form of `app\models\SantunanKematian`.
 */
class SantunanKematianSearch extends SantunanKematian
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'umur', 'kecamatan_id', 'kelurahan_id', 'dtks', 'kecamatan_id_pemohon', 'kelurahan_id_pemohon', 'verifikasi', 'diverifikasi', 'validasi', 'divalidasi', 'approved', 'approved_by', 'verifikasi_bag_hukum', 'diverifikasi_bag_hukum', 'verifikasi_inspektorat', 'diverifikasi_inspektorat', 'jumlah_santunan', 'isverifikasi_dpkad', 'diverifikasi_dpkad'], 'integer'],
            [['nik', 'nama','jenis_kelamin','jenis_kelamin_pemohon', 'tempat_lahir', 'tanggal_lahir', 'tanggal_kematian', 'alamat', 'rt', 'rw', 'kecamatan_nama', 'kelurahan_nama', 'no_dtks', 'nik_pemohon', 'nama_pemohon', 'no_hp_pemohon', 'hubungan_pemohon', 'alamat_pemohon', 'rt_pemohon', 'rw_pemohon', 'kecamatan_nama_pemohon', 'kelurahan_nama_pemohon', 'foto_ktp', 'foto_kk', 'foto_ktp_pemohon', 'foto_kk_pemohon', 'foto_sk_kematian', 'foto_sk_ahli_waris', 'foto_id_dtks', 'created_at', 'updated_at', 'deleted_at', 'tanggal_verifikasi', 'status_verifikasi', 'tanggal_validasi', 'status_validasi', 'status_permohonan','status_approval', 'tanggal_approval', 'tanggal_verifikasi_bag_hukum', 'tanggal_verifikasi_inspektorat', 'nama_ahli_waris', 'tanggal_verifikasi_dpkad','dibuat','diedit'], 'safe'],
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
        $query = SantunanKematian::find();

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
            'tanggal_kematian' => $this->tanggal_kematian,
            'umur' => $this->umur,
            'kecamatan_id' => $this->kecamatan_id,
            'kelurahan_id' => $this->kelurahan_id,
            'dtks' => $this->dtks,
            'kecamatan_id_pemohon' => $this->kecamatan_id_pemohon,
            'kelurahan_id_pemohon' => $this->kelurahan_id_pemohon,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
            'verifikasi' => $this->verifikasi,
            'tanggal_verifikasi' => $this->tanggal_verifikasi,
            'diverifikasi' => $this->diverifikasi,
            'validasi' => $this->validasi,
            'tanggal_validasi' => $this->tanggal_validasi,
            'divalidasi' => $this->divalidasi,
            'approved' => $this->approved,
            'tanggal_approval' => $this->tanggal_approval,
            'approved_by' => $this->approved_by,
            'verifikasi_bag_hukum' => $this->verifikasi_bag_hukum,
            'tanggal_verifikasi_bag_hukum' => $this->tanggal_verifikasi_bag_hukum,
            'diverifikasi_bag_hukum' => $this->diverifikasi_bag_hukum,
            'verifikasi_inspektorat' => $this->verifikasi_inspektorat,
            'tanggal_verifikasi_inspektorat' => $this->tanggal_verifikasi_inspektorat,
            'diverifikasi_inspektorat' => $this->diverifikasi_inspektorat,
            'jumlah_santunan' => $this->jumlah_santunan,
            'isverifikasi_dpkad' => $this->isverifikasi_dpkad,
            'tanggal_verifikasi_dpkad' => $this->tanggal_verifikasi_dpkad,
            'diverifikasi_dpkad' => $this->diverifikasi_dpkad,
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
            ->andFilterWhere(['like', 'nik_pemohon', $this->nik_pemohon])
            ->andFilterWhere(['like', 'nama_pemohon', $this->nama_pemohon])
            ->andFilterWhere(['like', 'no_hp_pemohon', $this->no_hp_pemohon])
            ->andFilterWhere(['like', 'hubungan_pemohon', $this->hubungan_pemohon])
            ->andFilterWhere(['like', 'alamat_pemohon', $this->alamat_pemohon])
            ->andFilterWhere(['like', 'rt_pemohon', $this->rt_pemohon])
            ->andFilterWhere(['like', 'rw_pemohon', $this->rw_pemohon])
            ->andFilterWhere(['like', 'kecamatan_nama_pemohon', $this->kecamatan_nama_pemohon])
            ->andFilterWhere(['like', 'kelurahan_nama_pemohon', $this->kelurahan_nama_pemohon])
            ->andFilterWhere(['like', 'foto_ktp', $this->foto_ktp])
            ->andFilterWhere(['like', 'foto_kk', $this->foto_kk])
            ->andFilterWhere(['like', 'foto_ktp_pemohon', $this->foto_ktp_pemohon])
            ->andFilterWhere(['like', 'foto_kk_pemohon', $this->foto_kk_pemohon])
            ->andFilterWhere(['like', 'foto_sk_kematian', $this->foto_sk_kematian])
            ->andFilterWhere(['like', 'foto_sk_ahli_waris', $this->foto_sk_ahli_waris])
            ->andFilterWhere(['like', 'foto_id_dtks', $this->foto_id_dtks])
            ->andFilterWhere(['like', 'status_verifikasi', $this->status_verifikasi])
            ->andFilterWhere(['like', 'status_validasi', $this->status_validasi])
            ->andFilterWhere(['like', 'status_permohonan', $this->status_permohonan])
            ->andFilterWhere(['like', 'status_approval', $this->status_approval])
            ->andFilterWhere(['like', 'keterangan_verifikasi', $this->keterangan_verifikasi])
            ->andFilterWhere(['like', 'keterangan_validasi', $this->keterangan_validasi])
            ->andFilterWhere(['like', 'keterangan_approval', $this->keterangan_approval])
            ->andFilterWhere(['like', 'nama_ahli_waris', $this->nama_ahli_waris]);
            
            if (!empty($this->dibuat)) {
                    $query->andFilterWhere(['dibuat' => $this->dibuat]);
            }
            if (!empty($this->diedit)) {
                    $query->andFilterWhere(['diedit' => $this->diedit]);
            }
        return $dataProvider;
    }
}
