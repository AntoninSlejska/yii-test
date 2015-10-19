<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\UploadedFile;
use app\models\Room;

/**
 *
 */
class RoomsController extends Controller
{
  public function actionIndex()
  {
    $sql = 'SELECT * FROM room ORDER BY id ASC';

    $db = Yii::$app->db;

    $rooms = $db->createCommand($sql)->queryAll();

    return $this->render('index', ['rooms' => $rooms]);
  }

  public function actionIndexFiltered()
  {
    $query = Room::find();

    $searchFilter = [
      'floor' => ['operator' => '', 'value' => ''],
      'room_number' => ['operator' => '', 'value' => ''],
      'price_per_day' => ['operator' => '', 'value' => ''],
      ];

    if (isset($_POST['SearchFilter'])) {
      $fieldsList = ['floor', 'room_number', 'price_per_day'];

      foreach ($fieldsList as $field) {
        $fieldOperator = $_POST['SearchFilter'][$field]['operator'];
        $fieldValue = $_POST['SearchFilter'][$field]['value'];
        $searchFilter[$field] = ['operator' => $fieldOperator, 'value' => $fieldValue];

        if ($fieldValue != '') {
          $query->andWhere([$fieldOperator, $field, $fieldValue]);
        }
      }
    }

    $rooms = $query->all();

    return $this->render('indexFiltered', ['rooms' => $rooms, 'searchFilter' => $searchFilter]);
  }

  public function actionCreate()
  {
    $model = new Room();
    $modelCanSave = false;

    if ($model->load(Yii::$app->request->post()) && $model->validate()) {

      $model->file_image = UploadedFile::getInstance($model, 'file_image');

      if ($model->file_image) {
        $model->file_image->saveAs(Yii::getAlias('@uploadedfilesdir/' . $model->file_image->baseName . '.' . $model->file_image->extension));
      }

      $modelCanSave = true;
    }

    return $this->render('create', [
      'model' => $model,
      'modelSaved' => $modelCanSave,
    ]);
  }
}
