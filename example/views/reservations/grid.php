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
$numberOfRows = count($dataProvider->getModels());

if ($numberOfRows > 0) {
    foreach ($dataProvider->getModels() as $m) $sumOfPricesPerDay += $m->price_per_day;
    $averagePricePerDay = $sumOfPricesPerDay / $numberOfRows;
}

echo "<h2>Reservations</h2>" .
    GridViewReservation::widget([
        'showFooter' => true,
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            [
                'header' => 'Room',
                'filter' => Html::activeDropDownList($searchModel, 'room_id', $roomsFilterData, ['prompt' => '--- all']),
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


?>
