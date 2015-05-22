<?php

namespace app\modules\rbac\controllers;

use Yii;
use app\modules\rbac\models\Permission;
use app\modules\rbac\models\search\PermissionSearch;
use app\modules\rbac\controllers\BaseRbacController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use source\LuLu;

/**
 * PermissionController implements the CRUD actions for Permission model.
 */
class PermissionController extends BaseRbacController
{
    
    /**
     * Lists all Permission models.
     * @return mixed
     */
    public function actionIndex()
    {
    	$categoryId=LuLu::getGetValue('category_id');
        //$searchModel = new PermissionSearch();
        $query = Permission::find();
        $query->andFilterWhere(['category_id'=>$categoryId]);
        $dataProvider = $dataProvider = $this->getDataProvider($query);

        return $this->render('index', [
            //'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Permission model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Permission model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($category_id=0)
    {
        $model = new Permission();
        $model->category_id=$category_id;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index','category_id'=>$category_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Permission model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
        	
            return $this->redirect(['index','category_id'=>$model->category_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
        return $this->render('update', [
        		'model' => $model,
        		]);
    }

    /**
     * Deletes an existing Permission model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Permission model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Permission the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Permission::findOne(['key'=>$id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
