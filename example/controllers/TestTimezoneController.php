<?php

namespace app\controllers;

use Yii;
use DateTime;
use yii\web\Controller;

class TestTimezoneController extends Controller
{
    public function actionCheck()
    {
        $dt = new DateTime();
        echo 'Current date/time: ' . $dt->format('Y-m-d H:i:s') .
            '<br>' .
            'Current timezone: ' . $dt->getTimezone()->getName() .
            '<br>';

        $result = \Yii::$app->db->createCommand('SELECT NOW()')->queryColumn();
        echo 'Database current date/time: ' . $result[0];
    }
}

 ?>
