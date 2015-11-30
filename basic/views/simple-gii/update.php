<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SimpleGii */

$this->title = 'Update Simple Gii: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Simple Giis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="simple-gii-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
