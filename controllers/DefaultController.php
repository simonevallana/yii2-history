<?php

namespace boolean\history\controllers;

use Yii;
use boolean\history\HistoryEntity;
use boolean\history\HistorySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class DefaultController extends Controller
{

    public function actionIndex()
    {
        $searchModel = new HistorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    protected function findModel($id)
    {
        if (($model = HistoryEntity::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
