<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\EnhancedGii */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Enhanced Gii', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="enhanced-gii-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Enhanced Gii'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        'thought',
        'goodness',
        'rank',
        'censorship',
        'occurred',
        'email:email',
        'url:url',
        'filename',
        'avatar',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>