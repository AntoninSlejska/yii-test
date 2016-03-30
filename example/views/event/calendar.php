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
    $event->description = $model->description;
    $event->allDay = $model->allDay;
    $event->start = $model->start;
    $event->end = $model->end;
    $event->dow = $model->dow;
    $event->className = $model->className;
    $event->editable = $model->editable;
    $event->source = $model->source;
    $event->color = $model->color;
    $event->backgroundColor = $model->backgroundColor;
    $event->borderColor = $model->borderColor;
    $event->textColor = $model->textColor;
    $events[] = $event;
}

echo yii2fullcalendar::widget([
        'events'=> $events,
        'options' => [
            'lang' => 'de',
            'weekends' => true,
            'default' => 'month',
            'editable' => true,
      ],
    ]);

echo '</div>';
?>
