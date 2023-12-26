<?php 

namespace app\models;

 use yii;
 use yii\base\Model;

 class CommentsForm extends Model {
    public $nombre;
    public $telefono;
    public $comentario;

    public function rules(){
        return [
            [['nombre','telefono','comentario'],'required'],
            
        ];
    }

 }