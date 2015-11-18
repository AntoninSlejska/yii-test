<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

echo "<div class='room-form'>";

$form = ActiveForm::begin();

echo "<div class='model'>";

for ($i=0; $i < sizeof($models); $i++) {
    $model = $models[$i];
    echo "<hr />
        <label>Model " .
        $i .
        "</label>" .
        $form->field($model, "[$i]name")->textInput() .
        $form->field($model, "[$i]surname")->textInput() .
        $form->field($model, "[$i]phone_number")->textInput();
}

echo "</div>
    <hr />
    <div class'form-group'>" .
    Html::submitButton('Save', ['class' => 'btn btn-primary']) .
    "</div>";

ActiveForm::end();

echo "</div>";

?>
