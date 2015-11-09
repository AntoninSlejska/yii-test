<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TableTwo;

/**
 * TableTwoSearch represents the model behind the search form about `app\models\TableTwo`.
 */
class TableTwoSearch extends TableTwo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 't1_id', 't3_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = TableTwo::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            't1_id' => $this->t1_id,
            't3_id' => $this->t3_id,
        ]);

        return $dataProvider;
    }
}
