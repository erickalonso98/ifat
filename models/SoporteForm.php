<?php

namespace app\models;

use Yii;
use yii\base\Model;

class SoporteForm extends Model{
    public $nombre;
    public $apellidopat;
    public $apellidomat;
    public $email;
    public $telefono;
    public $paginaWeb;
    public $comentario;

    public function rules(){
        return [
            [['nombre','apellidopat','apellidomat','email','telefono','paginaWeb','comentario'],'required']
        ];
    }
}