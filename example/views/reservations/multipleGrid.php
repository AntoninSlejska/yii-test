<?php
use app\models\Room;
use yii\grid\GridView;
use app\components\GridViewReservation;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;

$roomsFilterData = ArrayHelper::map(Room::find()->all(), 'id', function($model, $defaultValue) {
    return sprintf('Floor: %d - Number: %d', $model->floor, $model->room_number);
});

$sumOfPricesPerDay = 0;
$averagePricePerDay = 0;
$numberOfRows = count($reservationsDataProvider->getModels());

if ($numberOfRows > 0) {
    foreach ($reservationsDataProvider->getModels() as $m) $sumOfPricesPerDay += $m->price_per_day;
    $averagePricePerDay = $sumOfPricesPerDay / $numberOfRows;
}

echo "<h2>Reservations</h2>" .
    GridViewReservation::widget([
        'showFooter' => true,
        'dataProvider' => $reservationsDataProvider,
        'filterModel' => $reservationsSearchModel,
        'columns' => [
            'id',
            [
                'header' => 'Room',
                'filter' => Html::activeDropDownList($reservationsSearchModel, 'room_id', $roomsFilterData, ['prompt' => '--- all']),
                'content' => function($model) {
                    return $model->room->floor;
                },
                //'footer' => $numberOfRows,
            ],
            [
                'header' => 'Customer',
                'attribute' => 'customer.nameAndSurname',
            ],
            [
                'header' => 'Customer (name)',
                'attribute' => 'customer.name',
            ],
            [
                'header' => 'Customer (surname)',
                'attribute' => 'customer.surname',
            ],
            'room_id',
            [
                'attribute' => 'price_per_day',
                //'footer' => Yii::$app->formatter->asCurrency($averagePricePerDay, 'EUR'),
                'footer' => sprintf('Average: %0.2f', $resultQueryAveragePricePerDay),
            ],
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

echo "<h2>Rooms</h2>" .
    GridViewReservation::widget([
        'dataProvider' => $roomsDataProvider,
        'filterModel' => $roomsSearchModel,
        'columns' => [
            'id',
            'floor',
            'room_number',
            'has_conditioner:boolean',
            'has_phone:boolean',
            'has_tv:boolean',
            'available_from',
        ],
    ]);


?>
