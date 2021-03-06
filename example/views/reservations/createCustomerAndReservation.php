<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Room;

echo "<div class='room-form'>";

$form = ActiveForm::begin();

echo "<div class'model'>" .
    $form->errorSummary([$customer, $reservation]) .
    "<h2>Customer</h2>" .
    $form->field($customer, "name")->textInput() .
    $form->field($customer, "surname")->textInput() .
    $form->field($customer, "phone_number")->textInput() .
    "<h2>Reservation</h2>" .
    $form->field($reservation, "room_id")->dropDownList(ArrayHelper::map(Room::find()->all(), 'id', function($room, $defaultValue) {
        return sprintf('Room n. %d at floor %d', $room->room_number, $room->floor);
        })) .
    $form->field($reservation, "price_per_day")->textInput() .
    $form->field($reservation, "date_from")->textInput() .
    $form->field($reservation, "date_to")->textInput() .
    "</div>" .
    "<div class='form-group'>" .
    Html::submitButton('Save customer and room', ['class' => 'btn btn-primary']) .
    "</div>";

ActiveForm::end();

echo "</div>";

?>
