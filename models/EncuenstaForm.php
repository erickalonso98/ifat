<?php 

namespace app\models;

use yii;
use yii\base\Model;

class EncuestaForm extends Model{
    public $ask;
    public $yourAttribute1;
    public $yourAttribute2;
    public $yourAttribute3;
    public $yourAttribute4;
    public $yourAttribute5;

    public function rules(){
        return [
            [['ask','yourAttribute1','yourAttribute2','yourAttribute3','yourAttribute4','yourAttribute5'],'required']
        ];
    }
}