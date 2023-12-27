<?php

namespace app\models;
use Yii;
use yii\db\ActiveRecord;
use yii\base\Security;

class Users extends ActiveRecord{

    public $password;
        
    public static function getDb()
    {
        return Yii::$app->db;
    }

    public function rules(){
        return [
            [['username','email','password'],'required'],
        ];
    }
    
    public static function tableName()
    {
        return 'user';
    }
    
}