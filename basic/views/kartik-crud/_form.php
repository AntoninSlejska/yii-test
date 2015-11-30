<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\datecontrol\DateControl;

/**
 * @var yii\web\View $this
 * @var app\models\KartikCrud $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="kartik-crud-form">

    <?php $form = ActiveForm::begin(['type'=>ActiveForm::TYPE_HORIZONTAL]); echo Form::widget([

    'model' => $model,
    'form' => $form,
    'columns' => 1,
    'attributes' => [

'goodness'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter Goodness...']], 

'rank'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter Rank...']], 

'censorship'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter Censorship...', 'maxlength'=>255]], 

'occurred'=>['type'=> Form::INPUT_WIDGET, 'widgetClass'=>DateControl::classname(),'options'=>['type'=>DateControl::FORMAT_DATE]], 

'filename'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter Filename...', 'maxlength'=>255]], 

'avatar'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter Avatar...', 'maxlength'=>255]], 

'thought'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter Thought...', 'maxlength'=>255]], 

'email'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter Email...', 'maxlength'=>255]], 

'url'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter Url...', 'maxlength'=>255]], 

    ]


    ]);
    echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']);
    ActiveForm::end(); ?>

</div>
