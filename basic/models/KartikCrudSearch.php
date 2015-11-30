<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\KartikCrud;

/**
 * KartikCrudSearch represents the model behind the search form about `app\models\KartikCrud`.
 */
class KartikCrudSearch extends KartikCrud
{
    public function rules()
    {
        return [
            [['id', 'goodness', 'rank'], 'integer'],
            [['thought', 'censorship', 'occurred', 'email', 'url', 'filename', 'avatar'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = KartikCrud::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'goodness' => $this->goodness,
            'rank' => $this->rank,
            'occurred' => $this->occurred,
        ]);

        $query->andFilterWhere(['like', 'thought', $this->thought])
            ->andFilterWhere(['like', 'censorship', $this->censorship])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'url', $this->url])
            ->andFilterWhere(['like', 'filename', $this->filename])
            ->andFilterWhere(['like', 'avatar', $this->avatar]);

        return $dataProvider;
    }
}
