<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\TableThree;

/* @var $this yii\web\View */
/* @var $model app\models\TableOne */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="table-one-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'three_list')
        ->dropDownList(ArrayHelper::map(TableThree::find()->all(), 'id', 'id'), ['multiple' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
