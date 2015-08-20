<?php

namespace source\modules\fragment\admin\controllers;

use Yii;
use source\modules\fragment\models\Fragment1Data;
use source\modules\fragment\models\search\Fragment1DataSearch;
use source\core\back\BackController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use source\libs\Constants;

/**
 * Fragment1DataController implements the CRUD actions for Fragment1Data model.
 */
class Fragment1DataController extends BackController
{

    /**
     * Lists all Fragment1Data models.
     * @return mixed
     */
    public function actionIndex($fid)
    {
        $searchModel = new Fragment1DataSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Fragment1Data model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Fragment1Data model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($fid)
    {
        $model = new Fragment1Data();
        $model->fragment_id=$fid;
        $model->status=Constants::Status_Enable;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index','fid'=>$fid]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Fragment1Data model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id,$fid)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index','fid'=>$fid]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Fragment1Data model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id,$fid)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index','fid'=>$fid]);
    }

    /**
     * Finds the Fragment1Data model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Fragment1Data the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Fragment1Data::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
