<?php
use yii\grid\GridView;
use yii\helpers\Html;

echo "<h2>Reservations</h2>" .
    GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'customer_id',
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
