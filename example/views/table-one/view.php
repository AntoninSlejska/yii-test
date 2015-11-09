<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use yii\widgets\ListView;
use yii\grid\GridView;

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

echo '<br><h3>Simple view</h3><p>See: <a href="http://www.yiiframework.com/forum/index.php/topic/68387-what-is-the-correct-way-to-define-relationships-among-multiple-tables/page__view__findpost__p__291217">Yii Forum</a></p>';

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
    echo '</b><br>';
}

// foreach ($model->tableTwoRecords as $record) {
//     $records .= 'Table 2 >> ';
//     $records .=  'ID: <b>' . $record->id;
//     $records .=  '</b>, T1 ID: <b>' . $record->t1_id;
//     $records .=  '</b>, T3 ID: <b>' . $record->t3_id;
//     $records .=  '</b>; ';
//     $records .=  'Table 3 >> ';
//     $records .=  'ID: <b>' . $record->tableThreeRecord->id;
//     $records .=  '</b>, T4 ID: <b>' . $record->tableThreeRecord->t4_id;
//     $records .=  '</b>; ';
//     $records .=  'Table 4 >> ';
//     $records .=  'ID: <b>' . $record->tableThreeRecord->tableFourRecord->id;
//     $records .=  '</b><br>';
// }

// $records = $model->id;

// echo '<br><h3>ListView</h3>';
// echo ListView::widget( [
//     'dataProvider' => $dataProvider,
//     'itemView' => '_view',
//     //'itemView' => $records,
// ]);

echo '<br><h3>GridView</h3><p>See: <a href="http://www.yiiframework.com/forum/index.php/topic/68387-what-is-the-correct-way-to-define-relationships-among-multiple-tables/page__view__findpost__p__291387">Yii Forum</a></p>';
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'id',
        't1_id',
        'tableOneRecord.id',
        't3_id',
        'tableThreeRecord.id',
        'tableThreeRecord.t4_id',
        'tableFourRecord.id',
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{update} {delete}',
            'buttons' => [
                'update' => function ($url, $model, $key) {
                    return Html::a('<span class="glyphicon glyphicon-pencil"></span>', Url::to(['table-two/update', 'id' => $key ]));
               },
                'delete' => function ($url, $model, $key) {
                    return Html::a('<span class="glyphicon glyphicon-trash"></span>', Url::to(['table-two/delete', 'id' => $key ]));
                },
            ],
        ],
    ],
]);


// echo '<br><h3>ListView</h3><p>See: <a href="http://www.yiiframework.com/forum/index.php/topic/68387-what-is-the-correct-way-to-define-relationships-among-multiple-tables/">Yii Forum</a></p>';
// echo $modelForListView->id;
    // for TableTwo
// echo ListView::widget( [
//     'dataProvider' => $dataProviderForListView,
//     'itemView' => '_view',
// ]);


?>
