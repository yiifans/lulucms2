<?php

namespace source\modules\rbac\admin\controllers;

use Yii;
use source\modules\rbac\models\Relation;
use source\modules\rbac\models\search\RelationSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use source\modules\rbac\models\Permission;
use source\LuLu;
use source\modules\rbac\models\Category;
use source\modules\rbac\models\Role;

/**
 * RelationController implements the CRUD actions for Relation model.
 */
class RelationController extends BaseRbacController
{

    /**
     * Lists all Relation models.
     * @return mixed
     */
    public function actionIndex($role)
    {
    	if(\Yii::$app->request->isPost){
    		
    		$selectedPermissions = LuLu::getPostValue('Permission');
    		
    		Relation::AddBatchItems($role, $selectedPermissions);
    		
    		return $this->redirect(['index','role'=>$role]);
    	}
    	
    	$allPermissions = Permission::getAllPermissionsGroupedByCategory();
    	$rolePermissions = Relation::find()->select(['permission','value'])->where(['role'=>$role])->indexBy('permission')->all();
    	$categories = Permission::getCategoryItems();
    	$role = Role::findOne(['id'=>$role]);
    	
        return $this->render('index', [
            'rolePermissions' => $rolePermissions,
            'allPermissions' => $allPermissions,
            'categories'=>$categories,
            'role'=>$role
        ]);
    }

    /**
     * Displays a single Relation model.
     * @param string $role
     * @param string $permission
     * @return mixed
     */
    public function actionView($role, $permission)
    {
        return $this->render('view', [
            'model' => $this->findModel($role, $permission),
        ]);
    }

    /**
     * Creates a new Relation model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Relation();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'role' => $model->role, 'permission' => $model->permission]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Relation model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $role
     * @param string $permission
     * @return mixed
     */
    public function actionUpdate($role, $permission)
    {
        $model = $this->findModel($role, $permission);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'role' => $model->role, 'permission' => $model->permission]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Relation model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $role
     * @param string $permission
     * @return mixed
     */
    public function actionDelete($role, $permission)
    {
        $this->findModel($role, $permission)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Relation model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $role
     * @param string $permission
     * @return Relation the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($role, $permission)
    {
        if (($model = Relation::findOne(['role' => $role, 'permission' => $permission])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
