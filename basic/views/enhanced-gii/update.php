<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EnhancedGii */

$this->title = 'Update Enhanced Gii: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Enhanced Gii', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="enhanced-gii-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
