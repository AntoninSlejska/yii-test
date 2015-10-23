<?php

namespace app\controllers;
use Yii;
use yii\web\Controller;
use app\models\Reservation;
use yii\data\ActiveDataProvider;

class ReservationsController extends Controller
{
    public function actionGrid()
    {
        $query = Reservation::find();

        if(isset($_GET['Reservation'])) {
            $query->andFilterWhere([
                'customer_id' => isset($_GET['Reservation']['customer_id'])?$_GET['Reservation']['customer_id']:null,
            ]);
        }

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        return $this->render('grid', ['dataProvider' => $dataProvider]);
    }
}
