<?php

namespace app\modules\rbac\controllers;

use Yii;
use app\modules\rbac\models\Role;
use app\modules\rbac\models\search\RoleSearch;
use app\modules\rbac\controllers\BaseRbacController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use source\LuLu;
use app\modules\rbac\models\Relation;
use app\modules\rbac\models\Permission;

/**
 * RoleController implements the CRUD actions for Role model.
 */
class RoleController extends BaseRbacController
{

    /**
     * Lists all Role models.
     * @return mixed
     */
    public function actionIndex()
    {
    	$categoryId=LuLu::getGetValue('category_id');
        //$searchModel = new RoleSearch();
        $query = Role::find();
        $query->andFilterWhere(['category_id'=>$categoryId]);
        $dataProvider = $this->getDataProvider($query);

        return $this->render('index', [
            //'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Role model.
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
     * Creates a new Role model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($category_id=0)
    {
        $model = new Role();
        $model->category_id=$category_id;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'category_id' => $model->category_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Role model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'category_id' => $model->category_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Role model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionPermission($role)
    {
    	$rolePermissions = Relation::find()->select(['permission','value'])->where(['role'=>$role])->indexBy('permission')->all();
    	
    	if(\Yii::$app->request->isPost){
    		var_dump(LuLu::getPostValue('Permission'));
    		
    		$selectedPermissions = LuLu::getPostValue('Permission');
    		$keys = array_keys($selectedPermissions);
    		
    		Relation::deleteAll(['role'=>$role]);
    		
    		foreach ($selectedPermissions as $key=>$value)
    		{
    			$newRelation = new Relation();
    			$newRelation->role=$role;
    			$newRelation->permission=$key;
    			$newRelation->value=is_string($value)?$value:implode(',', $value);
    			$newRelation->save();
    		}
    		return $this->redirect(['index','role'=>$role]);
    	}
    	
    	$allPermissions = Permission::findAll();
    	
        return $this->render('index', [
            'rolePermissions' => $rolePermissions,
            'allPermissions' => $allPermissions,
        ]);
    }
    
    /**
     * Finds the Role model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Role the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Role::findOne(['key'=>$id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
