<?php

namespace source\modules\fragment\admin\controllers;

use Yii;
use source\modules\fragment\models\Fragment2Data;
use source\modules\fragment\models\search\Fragment2DataSearch;
use source\core\back\BackController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use source\libs\Constants;

/**
 * Fragment2DataController implements the CRUD actions for Fragment2Data model.
 */
class Fragment2DataController extends BackController
{

    /**
     * Lists all Fragment2Data models.
     * @return mixed
     */
    public function actionIndex($fid)
    {
        $searchModel = new Fragment2DataSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Fragment2Data model.
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
     * Creates a new Fragment2Data model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($fid)
    {
        $model = new Fragment2Data();
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
     * Updates an existing Fragment2Data model.
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
     * Deletes an existing Fragment2Data model.
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
     * Finds the Fragment2Data model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Fragment2Data the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Fragment2Data::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
