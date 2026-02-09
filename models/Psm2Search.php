<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Psm2;

/**
 * Psm2Search represents the model behind the search form of `app\models\Psm2`.
 */
class Psm2Search extends Psm2
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'jenis_kelamin', 'user_id'], 'integer'],
            [['nik', 'nama', 'tempat_lahir', 'tanggal_lahir', 'jalan', 'rt', 'rw', 'provinsi_id', 'kota_id', 'kecamatan_id', 'kelurahan_id', 'login_terakhir', 'created_at', 'updated_at', 'no_rekening', 'nama_pemilik', 'nama_bank', 'no_hp', 'no_sertifikat', 'tanggal_sertifikat', 'file_sertifikat', 'file_sk_walikota'], 'safe'],
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
        $query = Psm2::find();

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
            'jenis_kelamin' => $this->jenis_kelamin,
            'user_id' => $this->user_id,
            'login_terakhir' => $this->login_terakhir,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'tanggal_sertifikat' => $this->tanggal_sertifikat,
        ]);

        $query->andFilterWhere(['like', 'nik', $this->nik])
            ->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'tempat_lahir', $this->tempat_lahir])
            ->andFilterWhere(['like', 'jalan', $this->jalan])
            ->andFilterWhere(['like', 'rt', $this->rt])
            ->andFilterWhere(['like', 'rw', $this->rw])
            ->andFilterWhere(['like', 'provinsi_id', $this->provinsi_id])
            ->andFilterWhere(['like', 'kota_id', $this->kota_id])
            ->andFilterWhere(['like', 'kecamatan_id', $this->kecamatan_id])
            ->andFilterWhere(['like', 'kelurahan_id', $this->kelurahan_id])
            ->andFilterWhere(['like', 'no_rekening', $this->no_rekening])
            ->andFilterWhere(['like', 'nama_pemilik', $this->nama_pemilik])
            ->andFilterWhere(['like', 'nama_bank', $this->nama_bank])
            ->andFilterWhere(['like', 'no_hp', $this->no_hp])
            ->andFilterWhere(['like', 'no_sertifikat', $this->no_sertifikat])
            ->andFilterWhere(['like', 'file_sertifikat', $this->file_sertifikat])
            ->andFilterWhere(['like', 'file_sk_walikota', $this->file_sk_walikota]);

        return $dataProvider;
    }
}
