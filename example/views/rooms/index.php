<?php
echo "<table class='table'>
  <tr>
  <th>Floor</th>
  <th>Room number</th>
  <th>Conditioner</th>
  <th>TV</th>
  <th>Phone</th>
  <th>Available from</th>
  <th>Available from (db format)</th>
  <th>Price per day</th>
  <th>Description</th>
  </tr>";

foreach ($rooms as $item) {
  echo "<tr>
    <td>{$item['floor']}</td>
    <td>{$item['room_number']}</td>
    <td>" . Yii::$app->formatter->asBoolean($item['has_conditioner']) . "</td>
    <td>" . Yii::$app->formatter->asBoolean($item['has_tv']) . "</td>
    <td>";
    echo ($item['has_phone'] == 1)?'Yes':'No';
    echo "</td>
    <td>" . Yii::$app->formatter->asDate($item['available_from']) . "</td>
    <td>" . Yii::$app->formatter->asDate($item['available_from'], 'php:Y-m-d') . "</td>
    <td>" . Yii::$app->formatter->asCurrency($item['price_per_day'], 'EUR') . "</td>
    <td>{$item['description']}</td>
    </tr>";
}

echo "</table>";
?>
