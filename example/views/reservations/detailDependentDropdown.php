<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use app\models\Customer;
use app\models\Reservation;

$urlReservationsByCustomer = Url::to(['reservations/ajax-drop-down-list-by-customer-id']);

$this->registerJs( <<< EOT_JS
    $(document).on('change', '#reservation-customer_id', function(event) {
        $('#detail').hide();

        var customerId = $(this).val();

        $.get(
        '{$urlReservationsByCustomer}',
        { 'customer_id' : customerId },
        function(data) {
            data = '<option value="">--- choose</option>'+data;
            $('#reservation-id').html(data);
        }
        )
        event.preventDefault();
    });

    $(document).on('change', '#reservation-id', function(event) {
        $(this).parents('form').submit();
        event.preventDefault();
    });
EOT_JS
);

echo '<div class="customer-form">';

$form = ActiveForm::begin( ['enableAjaxValidation' => false, 'enableClientValidation' => false, 'options' => ['data-ajax' => '']]);

$customers = Customer::find()->all();
echo $form->field($model, 'customer_id')->dropDownList(ArrayHelper::map( $customers, 'id', 'nameAndSurname'), [ 'prompt' => '--- choose' ]);

$reservations = Reservation::findAll(['customer_id' => $model->customer_id]);

// echo $form->field($model, 'id')->label('Reservation ID')->dropDownList(ArrayHelper::map( $reservations, 'id', function($temp, $defaultValue) {
//         $content = sprintf('reservation #%s at %s', $temp->id, date('Y-m-d H:i:s', strtotime($temp->reservation_date)));
//         return $content;
// }), [ 'prompt' => '--- choose' ]);

echo $form->field($model, 'id')->label('Reservation ID')->dropDownList(ArrayHelper::map($reservations, 'id', 'description'), [ 'prompt' => '--- choose' ]);

echo '<div id="detail">';

if($showDetail) {
    echo '<hr />
    <h2>Reservation Detail:</h2>
    <table>
        <tr>
            <td>Price per day: </td>
            <td> ';
    echo $model->price_per_day;
    echo    '</td>
        </tr>
    </table>';
}
echo '</div>';
ActiveForm::end();
echo '</div>';
?>
