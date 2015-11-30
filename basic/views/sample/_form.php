<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;

/**
* @var yii\web\View $this
* @var app\models\Sample $model
* @var yii\widgets\ActiveForm $form
*/

?>

<div class="sample-form">

    <?php $form = ActiveForm::begin([
    'id' => 'Sample',
    'layout' => 'horizontal',
    'enableClientValidation' => true,
    'errorSummaryCssClass' => 'error-summary alert alert-error'
    ]
    );
    ?>

    <div class="">
        <?php $this->beginBlock('main'); ?>

        <p>
            
			<?= $form->field($model, 'id')->textInput() ?>
			<?= $form->field($model, 'thought')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'goodness')->textInput() ?>
			<?= $form->field($model, 'rank')->textInput() ?>
			<?= $form->field($model, 'censorship')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'occurred')->textInput() ?>
			<?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'filename')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'avatar')->textInput(['maxlength' => true]) ?>
        </p>
        <?php $this->endBlock(); ?>
        
        <?=
    Tabs::widget(
                 [
                   'encodeLabels' => false,
                     'items' => [ [
    'label'   => 'Sample',
    'content' => $this->blocks['main'],
    'active'  => true,
], ]
                 ]
    );
    ?>
        <hr/>

        <?php echo $form->errorSummary($model); ?>

        <?= Html::submitButton(
        '<span class="glyphicon glyphicon-check"></span> ' .
        ($model->isNewRecord ? 'Create' : 'Save'),
        [
        'id' => 'save-' . $model->formName(),
        'class' => 'btn btn-success'
        ]
        );
        ?>

        <?php ActiveForm::end(); ?>

    </div>

</div>

