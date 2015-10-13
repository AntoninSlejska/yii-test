<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

/**
 *
 */
class NewsController extends Controller
{

  public function data()
  {
    return [
      ["id" => 1, "date" => "2015-05-11", "category" => "business", "title" => "Test news of 2015-05-11"],
      ["id" => 2, "date" => "2015-06-12", "category" => "shopping", "title" => "Test news of 2015-06-12"],
      ["id" => 3, "date" => "2015-07-13", "category" => "business", "title" => "Test news of 2015-07-13"],
      ["id" => 4, "date" => "2016-08-14", "category" => "business", "title" => "Test news of 2016-08-14"],
      ["id" => 5, "date" => "2017-09-15", "category" => "shopping", "title" => "Test news of 2017-09-15"],
      ["id" => 6, "date" => "2018-10-16", "category" => "shopping", "title" => "Test news of 2018-10-16"],
    ];
  }

  public function actionItemsList()
  {
    $year = Yii::$app->request->get('year');
    $category = Yii::$app->request->get('category');

    $data = $this->data();
    $filteredData = [];

    foreach ($data as $d) {
      if (($year != null) && (date('Y', strtotime($d['date'])) == $year)) $filteredData[] = $d;
      if (($category != null) && ($d['category'] == $category)) $filteredData[] = $d;
    }

    return $this->render('itemsList', ['year' => $year, 'category' => $category, 'filteredData' => $filteredData]);
  }

  public function actionIndex()
  {
    return $this->render('index');
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

  public function actionAdvTest()
  {
    return $this->render('advTest');
  }

  public function actionResponsiveContentTest()
  {
    $responsive = Yii::$app->request->get('responsive', 0);

    if ($responsive) {
      $this->layout = 'responsive';
    } else {
      $this->layout = 'main';
    }

    return $this->render('responsiveContentTest', ['responsive' => $responsive]);
  }

  public function actionInternationalIndex()
  {
    // if missing, value will be en
    $lang = Yii::$app->request->get('lang', 'en');

    Yii::$app->language = $lang;

    return $this->render('internationalIndex');
  }

  public function actionItemDetail()
  {
    $title = Yii::$app->request->get('title');

    $data = $this->data();

    $itemFound = null;

    foreach ($data as $d) {
      if ($d['title'] == $title) $itemFound = $d;
    }

    return $this->render('itemDetail', ['title' => $title, 'itemFound' => $itemFound]);
  }

}
