<?php

namespace source\modules\rbac\admin\controllers;

use Yii;
use source\modules\rbac\models\Permission;
use source\modules\rbac\models\search\PermissionSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use source\LuLu;
use yii\data\ArrayDataProvider;
use yii\helpers\ArrayHelper;

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
        $result=[];
        $rows = Permission::findAll(null,'sort_num asc');
        foreach($rows as $row)
        {
            $result[$row->category][]=$row;
        }
        
        return $this->render('index', [
            'basicsDataProvider' =>$this->getDataRrovider($result, Permission::Category_Basic),
            'controllersDataProvider' => $this->getDataRrovider($result, Permission::Category_Controller),
            'systemsDataProvider' => $this->getDataRrovider($result, Permission::Category_System),
        ]);
    }
    
    private function getDataRrovider($result,$category)
    {
        $provider = new ArrayDataProvider([
            'allModels'=>ArrayHelper::getValue($result, $category,[]),
            'key'=>'id',
            'pagination' => [
                'pageSize' => -1,
            ]
            
        ]);
        
        return $provider;
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
    public function actionCreate()
    {
        $model = new Permission();
       
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
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
        	
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
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
        if (($model = Permission::findOne(['id'=>$id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
