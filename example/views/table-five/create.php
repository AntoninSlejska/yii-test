<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TableFive */

$this->title = 'Create Table Five';
$this->params['breadcrumbs'][] = ['label' => 'Table Fives', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="table-five-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
