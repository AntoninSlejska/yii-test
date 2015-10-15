<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;

if ($modelSaved) {
  echo "<div class'alert alert-success'>
  Model ready to be saved!<br><br>
  These are the values:<br>
  Floor: "           . $model->floor . "<br>" .
  "Room number: "    . $model->room_number . "<br>" .
  "Has conditioner: ". Yii::$app->formatter->asBoolean($model->has_conditioner) . "<br>" .
  "Has TV: "         . Yii::$app->formatter->asBoolean($model->has_tv) . "<br>" .
  "Has Phone: "      . Yii::$app->formatter->asBoolean($model->has_phone) . "<br>" .
  "Available from: " . Yii::$app->formatter->asDate($model->available_from, 'php:j. n. Y') . "<br>" .
  "Price per day: "  . Yii::$app->formatter->asCurrency($model->price_per_day, 'EUR') . "<br>" .
  "Image: ";
if (isset($model->file_image)) {
  echo "<img src='" . Url::to('@uploadedfilesdir/' . $model->file_image->name) . "'>";
}

echo"<br></div>";
}

$form = ActiveForm::begin();
echo "<div class='row'>
  <div class='col-lg-12'>
  <h1>Room form</h1>" .
  $form->field($model, 'floor')->textInput() .
  $form->field($model, 'room_number')->textInput() .
  $form->field($model, 'has_conditioner')->checkbox() .
  $form->field($model, 'has_tv')->checkbox() .
  $form->field($model, 'has_phone')->checkbox() .
  $form->field($model, 'available_from')->textInput() .
  $form->field($model, 'price_per_day')->textInput() .
  $form->field($model, 'description')->textarea() .
  $form->field($model, 'file_image')->fileInput() .
  "</div></div>
  <div class='form-group'>" .
  Html::submitButton('Create', ['class' => 'btn btn-success']) .
 "</div>";

ActiveForm::end();
?>
