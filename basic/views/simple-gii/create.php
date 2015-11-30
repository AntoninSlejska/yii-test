<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SimpleGii */

$this->title = 'Create Simple Gii';
$this->params['breadcrumbs'][] = ['label' => 'Simple Giis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="simple-gii-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
