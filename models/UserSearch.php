<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\User;

class UserSearch extends User
{
	public function rules()
    {
        return [
            [['id'], 'integer'],
            [['username'], 'safe'],
			[['email'], 'safe'],
			[['password'], 'safe'],
			[['display_name'], 'safe'],
			[['status'], 'integer'],
        ];
    }
	public function search($params)
    {
        $query = User::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $this->load($params);
		if (!$this->validate()) {

            return $dataProvider;
        }

        $query->andFilterWhere(['id' => $this->id]);
		$query->andFilterWhere(['status' => $this->status]);
        $query->andFilterWhere(['like', 'username', $this->username]);
	    $query->andFilterWhere(['like', 'email', $this->email]);
	    $query->andFilterWhere(['like', 'password', $this->password]);
	    $query->andFilterWhere(['like', 'display_name', $this->display_name]);  
        return $dataProvider;
    }
	
}