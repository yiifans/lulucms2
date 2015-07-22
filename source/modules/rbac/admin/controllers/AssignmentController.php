<?php

namespace source\modules\rbac\admin\controllers;

use Yii;
use source\modules\rbac\models\Assignment;
use source\modules\rbac\models\search\AssignmentSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use source\models\User;
use source\LuLu;
use source\modules\rbac\models\Role;

/**
 * AssignmentController implements the CRUD actions for Assignment model.
 */
class AssignmentController extends BaseRbacController
{
    

    /**
     * Lists all Assignment models.
     * @return mixed
     */
    public function actionIndex()
    {
        
        $query = User::find();
        $dataProvider = $this->getDataProvider($query);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Assignment model.
     * @param string $user_id
     * @param string $role
     * @return mixed
     */
    public function actionView($user, $role)
    {
        return $this->render('view', [
            'model' => $this->findModel($user, $role),
        ]);
    }

    /**
     * Creates a new Assignment model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Assignment();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'user' => $model->user, 'role' => $model->role]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Assignment model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $user_id
     * @param string $role
     * @return mixed
     */
    public function actionUpdate($user, $role)
    {
        $model = $this->findModel($user, $role);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', '$user' => $model->user_id, 'role' => $model->role]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionRole($user)
    {
    	$userRoles = Assignment::find()->select('role')->where(['user'=>$user])->indexBy('role')->all();
    	
    	if(\Yii::$app->request->isPost){
    		$selectedRoles = LuLu::getPostValue('roles',[]);
    		Assignment::deleteAll(['and','user=\''.$user.'\'',['not in','role',$selectedRoles]]);
    		
    		foreach ($selectedRoles as $selectedRole)
    		{
    			if($userRoles!=null&&isset($userRoles[$selectedRole]))
    			{
    				continue;
    			}
    			
    			$newAssignment = new Assignment();
    			$newAssignment->user=$user;
    			$newAssignment->role=$selectedRole;
    			$newAssignment->save();
    		}
    		return $this->redirect(['role','user'=>$user]);
    	}
    	
    	$allRoles = Role::findAll();
    	
        return $this->render('role', [
            'userRoles' => $userRoles,
            'allRoles' => $allRoles,
        ]);
        
    	
    }
    
    /**
     * Deletes an existing Assignment model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $user_id
     * @param string $role
     * @return mixed
     */
    public function actionDelete($user, $role)
    {
        $this->findModel($user, $role)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Assignment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $user_id
     * @param string $role
     * @return Assignment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($user, $role)
    {
        if (($model = Assignment::findOne(['user' => $user, 'role' => $role])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
