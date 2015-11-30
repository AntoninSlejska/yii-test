<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EnhancedGii */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="enhanced-gii-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'thought')->textInput(['maxlength' => true, 'placeholder' => 'Thought']) ?>

    <?= $form->field($model, 'goodness')->textInput(['placeholder' => 'Goodness']) ?>

    <?= $form->field($model, 'rank')->textInput(['placeholder' => 'Rank']) ?>

    <?= $form->field($model, 'censorship')->textInput(['maxlength' => true, 'placeholder' => 'Censorship']) ?>

    <?= $form->field($model, 'occurred')->widget(\kartik\widgets\DatePicker::classname(), [
        'options' => ['placeholder' => 'Choose Occurred'],
        'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
    ]); ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'placeholder' => 'Email']) ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true, 'placeholder' => 'Url']) ?>

    <?= $form->field($model, 'filename')->textInput(['maxlength' => true, 'placeholder' => 'Filename']) ?>

    <?= $form->field($model, 'avatar')->textInput(['maxlength' => true, 'placeholder' => 'Avatar']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
