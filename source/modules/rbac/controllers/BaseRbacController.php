<?php

namespace app\modules\rbac\controllers;

use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\rest\ActiveController;
use yii\data\ActiveDataProvider;

class BaseRbacController extends Controller
{
	public function behaviors()
	{
		return [
			'verbs' => [
				'class' => VerbFilter::className(),
				'actions' => [
					'delete' => ['post'],
				],
			],
		];
	}
	
  
    
    public function getDataProvider($query,$options=[])
    {
    	if(!isset($options['query']))
    	{
    		$options['query']=$query;
    	}
    	$dataProvider = new ActiveDataProvider($options);
    	return $dataProvider;
    }
}
