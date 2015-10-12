<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

/**
 *
 */
class NewsController extends Controller
{

  public function actionIndex()
  {
    echo "This is my first controller.";
  }

  public function dataItems()
  {
    $newsList = [
      ['title' => 'First World War', 'date' => '1914-07-28'],
      ['title' => 'Second World War', 'date' => '1939-09-01'],
      ['title' => 'First man on the moon', 'date' => '1969-07-20'],
    ];
    return $newsList;
  }

  public function actionItemsList()
  {
    $newsList = $this->dataItems();
    return $this->render('itemsList', ['newsList' => $newsList]);
  }

  public function actionItemDetail($title)
  {
    $newsList = $this->dataItems();
    $item = null;
    foreach ($newsList as $news) {
      if ($news['title'] == $title) $item = $news;
    }
    return $this->render('itemDetail', ['item' => $item]);
  }

}
