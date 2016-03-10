<?php
use kartik\helpers\Html;
use kartik\dynagrid\DynaGrid;
use kartik\export\ExportMenu;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ClientSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Clients';
$this->params['breadcrumbs'][] = $this->title;

$gridColumns = [
    'clientNumber',
    'clientName',
    'contactLastName',
    'contactFirstName',
    'phone',
    'addressLine1',
    'addressLine2',
    'city',
    'state',
];

$fullExportMenu = ExportMenu::widget([
    'dataProvider' => $dataProvider,
    'columns' => $gridColumns,
    'target' => ExportMenu::TARGET_BLANK,
    'fontAwesome' => true,
    'pjaxContainerId' => 'kv-pjax-container',
]);

$gridExportMenu = [
    'fontAwesome' => true,
    'target' => GridView::TARGET_SELF,
];

?>
<div class="client-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DynaGrid::widget([
        'columns' => $gridColumns,
        'showPersonalize' => true,
        'allowPageSetting' => true,
        'allowThemeSetting' => false,
        'allowFilterSetting' => false,
        'allowSortSetting' => false,
        'theme'=>'panel-warning',
        'gridOptions' => [
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'showPageSummary'=>true,
            'panel' => [
                'before'=>'{dynagrid}',
            ],
            'floatHeader' => true,
            'pjax' => true,
            'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
            'panel' => [
                'type' => GridView::TYPE_DEFAULT,
            ],

            // the toolbar setting is default
           'toolbar' => [
               '{toggleData}{export}',
               $fullExportMenu,
               ['content'=>
                   Html::button('<i class="glyphicon glyphicon-plus"></i>', ['type'=>'button', 'title'=>Yii::t('kvgrid', 'Add Book'), 'class'=>'btn btn-success', 'onclick'=>'alert("This will launch the book creation form.\n\nDisabled for this demo!");']) . ' '.
                       Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['grid-demo'], ['data-pjax'=>0, 'class' => 'btn btn-default', 'title'=>Yii::t('kvgrid', 'Reset Grid')])
               ],
           ],
           // configure your GRID inbuilt export dropdown to include additional items
           'export' => $gridExportMenu,
        ],
        'options'=>['id'=>'dynagrid-1'],
    ]); ?>

</div>
