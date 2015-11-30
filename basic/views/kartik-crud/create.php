<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\KartikCrud $model
 */

$this->title = 'Create Kartik Crud';
$this->params['breadcrumbs'][] = ['label' => 'Kartik Cruds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kartik-crud-create">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
