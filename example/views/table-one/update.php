<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TableOne */

$this->title = 'Update Table One: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Table Ones', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="table-one-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
