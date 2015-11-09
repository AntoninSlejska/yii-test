<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TableTwo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="table-two-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 't1_id')->textInput() ?>

    <?= $form->field($model, 't3_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
