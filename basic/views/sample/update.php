<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Sample $model
 */

$this->title = 'Sample ' . $model->id . ', ' . 'Edit';
$this->params['breadcrumbs'][] = ['label' => 'Samples', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Edit';
?>
<div class="giiant-crud sample-update">

    <h1>
        <?= 'Sample' ?>        <small>
                        <?= $model->id ?>        </small>
    </h1>

    <div class="crud-navigation">
        <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span> ' . 'View', ['view', 'id' => $model->id], ['class' => 'btn btn-default']) ?>
    </div>

	<?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>
