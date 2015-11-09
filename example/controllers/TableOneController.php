<?php

namespace app\controllers;

use Yii;
use app\models\TableOne;
use app\models\TableOneSearch;
use app\models\TableTwo;
use app\models\TableTwoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;


/**
 * TableOneController implements the CRUD actions for TableOne model.
 */
class TableOneController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all TableOne models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TableOneSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function loadModel($id) {
        $model = TableTwo::find($id);
        if ($model === null)
            throw new CHttpException(404, 'Model not found.');
        return $model;
    }

    public function actionView($id)
    {
        // For the simple view
        $model = $this->findModel($id);

        // For the GridView
        $searchModel = new TableTwoSearch([
            't1_id' => $id, // the data have to be filtered by the id of the displayed record
        ]);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        // For the ListView
        // $modelForListView = $this->loadModel($id);
        // $query = TableTwo::find(['t1_id' => $id]);
        // $dataProviderForListView = new ActiveDataProvider([
        //     'query' => $query,
        //     'pagination' => [
        //         'pageSize' => 10,
        //     ],
        // ]);

        return $this->render('view', [
             'model' => $model,
             'searchModel' => $searchModel,
             'dataProvider' => $dataProvider,
            //  'modelForListView' => $modelForListView,
            //  'dataProviderForListView' => $dataProviderForListView,
        ]);
    }

    /**
     * Creates a new TableOne model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TableOne();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing TableOne model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing TableOne model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TableOne model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TableOne the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TableOne::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
