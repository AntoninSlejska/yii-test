<?php
use yii\helpers\Url;
?>

<a href="<?= Url::to(['index-with-relationships']) ?>" class="btn btn-danger">Reset</a>
<br><br>

<div class="row">
  <div class="col-md-4">
    <legend>Rooms</legend>
    <table class="table">
      <tr>
        <th>#</th>
        <th>Floor</th>
        <th>Room number</th>
        <th>Price per day</th>
      </tr>
      <?php foreach($rooms as $room) { ?>
        <tr>
          <td><a href="<?= Url::to(['index-with-relationships', 'room_id' => $room->id]) ?>" class="btn btn-primary btn-xs">detail</a></td>
          <td><?= $room['floor'] ?></td>
          <td><?= $room['room_number'] ?></td>
          <td><?= Yii::$app->formatter->asCurrency($room['price_per_day'], 'EUR') ?></td>
        </tr>
      <?php } ?>
    </table>

    <?php if ($roomSelected != null) { ?>
      <div class="alert alert-info">
        <b>You have selected room #<?= $roomSelected->id ?></b>
      </div>
    <?php } else {
      echo "<i>No room selected</i>";
    } ?>
  </div>

  <div class="col-md-4">
    <legend>Reservations</legend>
    <table class="table">
      <tr>
        <th>#</th>
        <th>Price per day</th>
        <th>Date from</th>
        <th>Date to</th>
      </tr>
      <?php foreach($reservations as $reservation) { ?>
        <tr>
          <td><a href="<?= Url::to(['index-with-relationships', 'reservation_id' => $reservation->id]) ?>" class="btn btn-primary btn-xs">detail</a></td>
          <td><?= Yii::$app->formatter->asCurrency($reservation['price_per_day'], 'EUR') ?></td>
          <td><?= Yii::$app->formatter->asDate($reservation['date_from'], 'php:Y-m-d') ?></td>
          <td><?= Yii::$app->formatter->asDate($reservation['date_to'], 'php:Y-m-d') ?></td>
        </tr>
      <?php } ?>
    </table>

    <?php if ($reservationSelected != null) { ?>
      <div class="alert alert-info">
        <b>You have selected reservation #<?= $reservationSelected->id ?></b>
      </div>
    <?php } else {
      echo "<i>No reservation selected</i>";
    } ?>
  </div>

  <div class="col-md-4">
    <legend>Customers</legend>
    <table class="table">
      <tr>
        <th>#</th>
        <th>Name</th>
        <th>Surname</th>
        <th>Phone</th>
      </tr>
      <?php foreach($customers as $customer) { ?>
        <tr>
          <td><a href="<?= Url::to(['index-with-relationships', 'customer_id' => $customer->id]) ?>" class="btn btn-primary btn-xs">detail</a></td>
          <td><?= $customer['name'] ?></td>
          <td><?= $customer['surname'] ?></td>
          <td><?= $customer['phone_number'] ?></td>
        </tr>
      <?php } ?>
    </table>

    <?php if ($customerSelected != null) { ?>
      <div class="alert alert-info">
        <b>You have selected customer #<?= $customerSelected->id ?></b>
      </div>
    <?php } else {
      echo "<i>No customer selected</i>";
    } ?>
  </div>

</div>
