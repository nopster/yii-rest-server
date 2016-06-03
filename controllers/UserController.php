<?php

namespace app\controllers;

use yii\rest\ActiveController;

class UserController extends ActiveController
{
    public $modelClass = 'app\models\User';
	public function actions() 
	{ 
		$actions = parent::actions();
		$actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];
		return $actions;
	}

	public function prepareDataProvider() 
	{
		$searchModel = new \app\models\UserSearch();    
		return $searchModel->search(\Yii::$app->request->queryParams);
	}
}