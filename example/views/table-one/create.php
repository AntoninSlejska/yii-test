<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TableOne */

$this->title = 'Create Table One';
$this->params['breadcrumbs'][] = ['label' => 'Table Ones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="table-one-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
