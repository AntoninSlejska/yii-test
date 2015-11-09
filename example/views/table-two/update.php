<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TableTwo */

$this->title = 'Update Table Two: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Table Twos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="table-two-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
