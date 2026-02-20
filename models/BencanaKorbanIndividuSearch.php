<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\BencanaKorbanIndividu;

/**
 * BencanaKorbanIndividuSearch represents the model behind the search form of `app\models\BencanaKorbanIndividu`.
 */
class BencanaKorbanIndividuSearch extends BencanaKorbanIndividu
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'bencana_id', 'kategori_korban_id', 'created_by'], 'integer'],
            [['nama', 'nik', 'jenis_kelamin', 'alamat', 'created_at', 'status_akhir'], 'safe'],
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
        $query = BencanaKorbanIndividu::find();

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
            'bencana_id' => $this->bencana_id,
            'kategori_korban_id' => $this->kategori_korban_id,
            'created_by' => $this->created_by,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'nik', $this->nik])
            ->andFilterWhere(['like', 'jenis_kelamin', $this->jenis_kelamin])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'status_akhir', $this->status_akhir]);
            
        // Filtering based on User Role/Region
        if (!\Yii::$app->user->isGuest) {
            $user = \Yii::$app->user->identity;
            if ($user->role == 'kelurahan' && $user->kelurahan_id) {
                 $query->andWhere(['kelurahan_id' => $user->kelurahan_id]);
            } elseif ($user->role == 'kecamatan' && $user->kecamatan_id) {
                 $query->andWhere(['kecamatan_id' => $user->kecamatan_id]);
            }
        }

        return $dataProvider;
    }
}
