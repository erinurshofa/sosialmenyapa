<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\BencanaKorbanVerifikasi;

/**
 * BencanaKorbanVerifikasiSearch represents the model behind the search form of `app\models\BencanaKorbanVerifikasi`.
 */
class BencanaKorbanVerifikasiSearch extends BencanaKorbanVerifikasi
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'korban_id', 'processed_by'], 'integer'],
            [['tahap', 'status', 'keterangan', 'processed_at', 'created_at'], 'safe'],
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
        $query = BencanaKorbanVerifikasi::find();
        $query->joinWith(['korban']);

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
            'korban_id' => $this->korban_id,
            'processed_by' => $this->processed_by,
            'processed_at' => $this->processed_at,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'tahap', $this->tahap])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan]);
            
        // Filtering based on User Role/Region
        if (!\Yii::$app->user->isGuest) {
            $user = \Yii::$app->user->identity;
            if ($user->role == 'kelurahan' && $user->kelurahan_id) {
                 $query->andWhere(['bencana_korban_individu.kelurahan_id' => $user->kelurahan_id]);
                 // Kelurahan only sees items that are ready for verifikasi (e.g. status 'Input' or 'Belum Verifikasi')
                 // OR they see items they have already processed? 
                 // For now, filtering by region is the primary requirement.
            } elseif ($user->role == 'kecamatan' && $user->kecamatan_id) {
                 $query->andWhere(['bencana_korban_individu.kecamatan_id' => $user->kecamatan_id]);
            }
        }

        return $dataProvider;
    }
}
