<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

echo '<div class="row">
        <div class="col-lg-6">
            <h3>Date picker from value<br>(using MM/dd/yyy format in English language)</h3>';

$value = date('Y-m-d');
echo DatePicker::widget([
    'name' => 'from_date',
    'value' => $value,
    'language' => 'de',
    'dateFormat' => 'dd.MM.yyyy',
    ]);

echo '</div>
        <div class="col-lg-6">';

if ($reservationUpdated) {
    echo yii\bootstrap\Alert::widget([
        'options' => [
            'class' => 'alert-success',
        ],
        'body' => 'Reservation successfully updated',
    ]);
}

$form = ActiveForm::begin();

echo "<h3>Date picker from model<br>(using dd/MM/yyyy formate and italian language)</h3>
    <br><label>Date from</label>";

echo DatePicker::widget([
    'model' => $reservation,
    'attribute' => 'date_from',
    'language' => 'it',
    'dateFormat' => 'dd/MM/yyyy',
    ]);

?>
