<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SimpleGiiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Simple Giis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="simple-gii-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Simple Gii', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'thought',
            'goodness',
            'rank',
            'censorship',
            // 'occurred',
            // 'email:email',
            // 'url:url',
            // 'filename',
            // 'avatar',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
