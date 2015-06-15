<?php
namespace source\core\base;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class BaseController extends Controller
{
	
	public function behaviors()
	{
	    return [
// 	        'access' => [
// 	            'class' => AccessControl::className(),
// 	            'only' => ['logout'],
// 	            'rules' => [
// 	                [
// 	                    'actions' => ['logout'],
// 	                    'allow' => true,
// 	                    'roles' => ['@'],
// 	                ],
// 	            ],
// 	        ],
// 	        'verbs' => [
// 	            'class' => VerbFilter::className(),
// 	            'actions' => [
// 	                'logout' => ['post'],
// 	                'delete'=> ['post'],
// 	            ],
// 	        ],
	    ];
	}

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction'
            ], 
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction', 
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
                'height'=>'40',
                'width'=>'100',
                'minLength'=>3,
                'maxLength'=>5,
            ]
        ];
    }
}
