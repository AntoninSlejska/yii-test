<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Client;

/**
 * ClientSearch represents the model behind the search form about `app\models\Client`.
 */
class ClientSearch extends Client
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['clientNumber', 'salesRepEmployeeNumber'], 'integer'],
            [['clientName', 'contactLastName', 'contactFirstName', 'phone', 'addressLine1', 'addressLine2', 'city', 'state', 'postalCode', 'country'], 'safe'],
            [['creditLimit'], 'number'],
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
        $query = Client::find();

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
            'clientNumber' => $this->clientNumber,
            'salesRepEmployeeNumber' => $this->salesRepEmployeeNumber,
            'creditLimit' => $this->creditLimit,
        ]);

        $query->andFilterWhere(['like', 'clientName', $this->clientName])
            ->andFilterWhere(['like', 'contactLastName', $this->contactLastName])
            ->andFilterWhere(['like', 'contactFirstName', $this->contactFirstName])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'addressLine1', $this->addressLine1])
            ->andFilterWhere(['like', 'addressLine2', $this->addressLine2])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'state', $this->state])
            ->andFilterWhere(['like', 'postalCode', $this->postalCode])
            ->andFilterWhere(['like', 'country', $this->country]);

        return $dataProvider;
    }
}
