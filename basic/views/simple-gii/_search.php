<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SimpleGiiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="simple-gii-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'thought') ?>

    <?= $form->field($model, 'goodness') ?>

    <?= $form->field($model, 'rank') ?>

    <?= $form->field($model, 'censorship') ?>

    <?php // echo $form->field($model, 'occurred') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'url') ?>

    <?php // echo $form->field($model, 'filename') ?>

    <?php // echo $form->field($model, 'avatar') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
