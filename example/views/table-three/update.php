<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TableThree */

$this->title = 'Update Table Three: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Table Threes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="table-three-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
