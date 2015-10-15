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
