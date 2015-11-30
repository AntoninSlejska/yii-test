<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\EnhancedGii */

$this->title = 'Create Enhanced Gii';
$this->params['breadcrumbs'][] = ['label' => 'Enhanced Gii', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="enhanced-gii-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
