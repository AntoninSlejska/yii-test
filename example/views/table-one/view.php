<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TableOne */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Table Ones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="table-one-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
        ],
    ]) ?>

</div>
<?php

foreach ($model->tableTwoRecords as $record) {
    echo 'Table 2 >> ';
    echo 'ID: <b>' . $record->id;
    echo '</b>, T1 ID: <b>' . $record->t1_id;
    echo '</b>, T3 ID: <b>' . $record->t3_id;
    echo '</b>; ';
    echo 'Table 3 >> ';
    echo 'ID: <b>' . $record->tableThreeRecord->id;
    echo '</b>, T4 ID: <b>' . $record->tableThreeRecord->t4_id;
    echo '</b>; ';
    echo 'Table 4 >> ';
    echo 'ID: <b>' . $record->tableThreeRecord->tableFourRecord->id;
    echo '</b>;<br>';
}

// print_r($records);
//
// foreach ($records as $record) {
//
// print_r($record);
//
// }

 ?>
