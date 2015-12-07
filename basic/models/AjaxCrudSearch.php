<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AjaxCrud;

/**
 * AjaxCrudSearch represents the model behind the search form about `app\models\AjaxCrud`.
 */
class AjaxCrudSearch extends AjaxCrud
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'goodness', 'rank'], 'integer'],
            [['thought', 'censorship', 'occurred', 'email', 'url', 'filename', 'avatar'], 'safe'],
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
        $query = AjaxCrud::find();

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