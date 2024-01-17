<?php

namespace app\models;
use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use yii\base\Security;

class Users extends ActiveRecord implements IdentityInterface{
 
    public static function getDb()
    {
        return Yii::$app->db;
    }

    public function getId(){
        return $this->id; 
    }

    public function rules(){
        return [
            [['username','email','password'],'required'],
        ];
    }

    public function getAuthKey(){
        // Generate and return a unique authentication key for the user
        return $this->generateAuthKey();
    }

    public function validateAuthKey($authKey){
        // Compare the provided auth key with the stored one
        return $this->getAuthKey() === $authKey;
    }
    

    public static function findIdentityByAccessToken($token, $type = null){
    // Example using database storage:
    $user = self::findOne(['access_token' => $token]);
    if ($user) {
        return $user;
    }

    // Handle other token storage methods as needed.
}

    public static function findIdentity($id){
        return static::findOne(['id' => $id]);
    }
    
    public static function tableName()
    {
        return 'user';
    }
    
}