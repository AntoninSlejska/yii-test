<?php
  echo "
    <h1>Room info</h1>
    <table class='table'>
    <tr>
      <th>Floor</th>
      <td>{$model['floor']}</td>
     <tr></tr>
      <th>Room number</th>
      <td>{$model['room_number']}</td>
     <tr></tr>
      <th>Conditioner</th>
      <td>" . Yii::$app->formatter->asBoolean($model['has_conditioner']) . "</td>
     <tr></tr>
      <th>TV</th>
      <td>" . Yii::$app->formatter->asBoolean($model['has_tv']) . "</td>
     <tr></tr>
      <th>Phone</th>
      <td>";
  echo ($model['has_phone'] == 1)?'Yes':'No';
  echo "</td>
     <tr></tr>
      <th>Available from</th>
      <td>" . Yii::$app->formatter->asDate($model['available_from']) . "</td>
     <tr></tr>
      <th>Available from (db format)</th>
      <td>" . Yii::$app->formatter->asDate($model['available_from'], 'php:Y-m-d') . "</td>
     <tr></tr>
      <th>Price per day</th>
      <td>" . Yii::$app->formatter->asCurrency($model['price_per_day'], 'EUR') . "</td>
     <tr></tr>
      <th>Description</th>
      <td>{$model['description']}</td>
    </tr>
    </table>";
 ?>
