<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin(['id' => 'room-form']);

echo "<div class='row'>
  <div class='col-lg-6'>
  <h2>Create a new room</h2>" .
  $form->field($model, 'floor')->textInput() .
  $form->field($model, 'room_number')->textInput() .
  $form->field($model, 'has_conditioner')->checkbox() .
  $form->field($model, 'has_tv')->checkbox() .
  $form->field($model, 'has_phone')->checkbox() .
  $form->field($model, 'available_from')->textInput() .
  $form->field($model, 'price_per_day')->textInput() .
  $form->field($model, 'description')->textarea() .
  Html::submitButton('Save', ['class' => 'btn btn-primary']) .
 "</div></div>";

ActiveForm::end();
?>
