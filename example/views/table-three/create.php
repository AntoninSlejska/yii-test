<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TableThree */

$this->title = 'Create Table Three';
$this->params['breadcrumbs'][] = ['label' => 'Table Threes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="table-three-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
