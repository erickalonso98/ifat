<?php 

namespace app\models;

 use yii;
 use yii\base\Model;

 class CommentsForm extends Model {

    public $telefono;
    public $comentario;

    public function rules(){
        return [
            [['telefono','comentario'],'required'],
            
        ];
    }

 }