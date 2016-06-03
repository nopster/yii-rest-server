<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\data\ActiveDataProvider; 

class User extends ActiveRecord
{
	public static function tableName()
    {
        return 'user';
    }
	public function rules()
    {
        return [
			[['id'], 'integer'],
            [['username','email','password'], 'required'],
            [['username'], 'string', 'max' => 20],
            [['email'], 'string', 'max' => 255],
			['email','email'],
            [['password'], 'string', 'length' => [6, 30]],
            [['display_name'], 'string', 'max' => 70],
			[['status'], 'integer'],
        ];
    }
	 public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'email' => 'Email',
            'password' => 'Password',
            'display_name' => 'Display Name',
		    'status' => 'Display Name',
        ];
    }
}