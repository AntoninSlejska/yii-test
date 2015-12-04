<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TableFive */

$this->title = 'Update Table Five: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Table Fives', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="table-five-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
