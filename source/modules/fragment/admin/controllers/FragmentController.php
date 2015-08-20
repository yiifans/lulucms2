<?php

namespace source\modules\fragment\admin\controllers;

use Yii;
use source\modules\fragment\models\Fragment;
use source\modules\fragment\models\search\FragmentSearch;
use source\core\back\BackController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FragmentController implements the CRUD actions for Fragment model.
 */
class FragmentController extends BackController
{

    /**
     * Lists all Fragment models.
     * @return mixed
     */
    public function actionIndex($type)
    {
        $searchModel = new FragmentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Fragment model.
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
     * Creates a new Fragment model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($type)
    {
        $model = new Fragment();
        $model->type = $type;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index','type'=>$type]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Fragment model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id,$type)
    {
        $model = $this->findModel($id);
        $model->type = $type;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index','type'=>$type]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Fragment model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id,$type)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index','type'=>$type]);
    }

    /**
     * Finds the Fragment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Fragment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Fragment::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
