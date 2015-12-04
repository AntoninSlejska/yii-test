<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\TableFive;

/* @var $this yii\web\View */
/* @var $model app\models\TableThree */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="table-three-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 't4_id')->textInput() ?>

    <?= $form->field($model, 'five_list')
        ->dropDownList(ArrayHelper::map(TableFive::find()->all(), 'id', 'id'), ['multiple' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
