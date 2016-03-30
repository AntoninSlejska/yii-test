<?php
use yii\helpers\Html;
use yii2fullcalendar\yii2fullcalendar;
use yii2fullcalendar\models\Event;

/* @var $this yii\web\View */
/* @var $model app\models\Event */

$this->title = 'Calendar';
$this->params['breadcrumbs'][] = ['label' => 'Events', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

echo '<div class="event-view">';

echo '<h1>' . Html::encode($this->title) . '</h1>';

$events = array();

foreach ($models as $model) {
    $event = new Event();
    $event->id = $model->id;
    $event->title = $model->title;
    $event->start = $model->start;
    $event->end = $model->end;
    $events[] = $event;
}

echo yii2fullcalendar::widget([
        'events'=> $events,
    ]);

echo '</div>';
?>
