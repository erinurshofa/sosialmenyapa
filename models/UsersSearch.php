<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Users;

class UsersSearch extends Users
{
    public function rules()
    {
        return [
            [['id', 'role_id', 'kecamatan_id', 'kelurahan_id'], 'integer'],
            [['username', 'nama_lengkap', 'created_at', 'updated_at'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Users::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10, 
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ],
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere(['id' => $this->id])
              ->andFilterWhere(['role_id' => $this->role_id])
              ->andFilterWhere(['kecamatan_id' => $this->kecamatan_id])
              ->andFilterWhere(['kelurahan_id' => $this->kelurahan_id])
              ->andFilterWhere(['like', 'username', $this->username])
              ->andFilterWhere(['like', 'nama_lengkap', $this->nama_lengkap])
            //   ->andFilterWhere(['>=', 'created_at', $this->created_at])
              ->andFilterWhere(['<=', 'updated_at', $this->updated_at]);
        
              if (!empty($this->created_at)) {
            $query->andWhere(['DATE(created_at)' => $this->created_at]);
        }

        return $dataProvider;
    }
}
