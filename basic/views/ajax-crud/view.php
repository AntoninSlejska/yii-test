<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\AjaxCrud */
?>
<div class="ajax-crud-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'thought',
            'goodness',
            'rank',
            'censorship',
            'occurred',
            'email:email',
            'url:url',
            'filename',
            'avatar',
        ],
    ]) ?>

</div>
