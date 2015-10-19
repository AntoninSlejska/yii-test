<table class="table">
  <tr>
    <th>Room ID</th>
    <th>Customer ID</th>
    <th>Price per day</th>
    <th>Date from</th>
    <th>Date to</th>
    <th>Reservation date</th>
  </tr>
<?php
foreach ($rooms as $room) {
  $lastReservation = $room->lastReservation;
 ?>
  <tr>
    <td><?= $lastReservation['room_id'] ?></td>
    <td><?= $lastReservation['customer_id'] ?></td>
    <td><?= Yii::$app->formatter->asCurrency($lastReservation['price_per_day'], 'EUR') ?></td>
    <td><?= Yii::$app->formatter->asDate($lastReservation['date_from'], 'php:Y-m-d') ?></td>
    <td><?= Yii::$app->formatter->asDate($lastReservation['date_to'], 'php:Y-m-d') ?></td>
    <td><?= Yii::$app->formatter->asDate($lastReservation['reservation_date'], 'php:Y-m-d H:i:s') ?></td>
  </tr>
<?php } ?>
</table>
