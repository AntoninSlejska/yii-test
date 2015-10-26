<?php
use app\models\Room;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;

$roomsFilterData = ArrayHelper::map(Room::find()->all(), 'id', function($model, $defaultValue) {
    return sprintf('Floor: %d - Number: %d', $model->floor, $model->room_number);
});

echo "<h2>Reservations</h2>" .
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            [
                'header' => 'Room',
                'filter' => Html::activeDropDownList($searchModel, 'room_id', $roomsFilterData, ['prompt' => '--- all']),
                'content' => function($model) {
                    return $model->room->floor;
                }
            ],
            'customer.name',
            'room_id',
            'price_per_day',
            'date_from',
            'date_to',
            'reservation_date',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{delete}',
                'header' => 'Actions',
            ],
        ],
    ]);


?>
