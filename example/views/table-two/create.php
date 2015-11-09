<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TableTwo */

$this->title = 'Create Table Two';
$this->params['breadcrumbs'][] = ['label' => 'Table Twos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="table-two-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
