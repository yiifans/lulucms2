<?php

namespace source\modules\menu\admin\controllers;

use Yii;
use source\modules\menu\models\Menu;
use source\modules\menu\models\search\MenuSearch;
use source\core\back\BackController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use source\LuLu;
use yii\data\ArrayDataProvider;

/**
 * DefaultController implements the CRUD actions for Menu model.
 */
class MenuController extends BackController
{
   

    /**
     * Lists all Menu models.
     * @return mixed
     */
    public function actionIndex($category)
    {
        $dataProvider = new ArrayDataProvider([
            'allModels'=>Menu::getArrayTree($category),
            'key'=>'id',
            'pagination' => [
                'pageSize' => -1,
            ],
        ]);
      
        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Menu model.
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
     * Creates a new Menu model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($category)
    {
        $model = new Menu();
        $model->category_id=$category;
      
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'category' =>$category]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Menu model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $category = $model->category_id;
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'category' => $category]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Menu model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $model->delete();
        
        $category=$model->category_id;

        return $this->redirect(['index','category'=>$category]);
    }

    /**
     * Finds the Menu model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Menu the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Menu::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
