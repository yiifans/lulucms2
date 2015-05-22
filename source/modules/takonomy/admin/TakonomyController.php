<?php

namespace source\modules\takonomy\admin;

use Yii;
use source\models\Takonomy;
use source\models\search\TakonomySearch;
use source\core\back\BaseBackController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ArrayDataProvider;

/**
 * TakonomyController implements the CRUD actions for Takonomy model.
 */
class TakonomyController extends BaseBackController
{


    /**
     * Lists all Takonomy models.
     * @return mixed
     */
    public function actionIndex($category)
    {
        $searchModel = new TakonomySearch();
        
        $dataProvider = new ArrayDataProvider();
        $dataProvider->allModels=Takonomy::getArrayTree($category);
        $dataProvider->key='id';

        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Takonomy model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id,$type)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Takonomy model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($category)
    {
        $model = new Takonomy();
		$model->category_id=$category;
		$model->loadDefaultValues();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'category'=>$category]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Takonomy model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $category=$model->category_id;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'category'=>$category]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Takonomy model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $model->delete();
        $category=$model->category_id;

        return $this->redirect(['index', 'category'=>$category]);
    }

    /**
     * Finds the Takonomy model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Takonomy the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Takonomy::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
