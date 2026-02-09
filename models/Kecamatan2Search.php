<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Kecamatan2;

/**
 * Kecamatan2Search represents the model behind the search form of `app\models\Kecamatan2`.
 */
class Kecamatan2Search extends Kecamatan2
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'kota_id', 'nama', 'id_benar', 'id_lama'], 'safe'],
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
        $query = Kecamatan2::find();

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
        $query->andFilterWhere(['like', 'id', $this->id])
            ->andFilterWhere(['like', 'kota_id', $this->kota_id])
            ->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'id_benar', $this->id_benar])
            ->andFilterWhere(['like', 'id_lama', $this->id_lama]);

        return $dataProvider;
    }
}
