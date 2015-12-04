<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TableFiveSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Table Fives';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="table-five-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Table Five', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            't3_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
