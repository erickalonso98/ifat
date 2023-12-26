<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;

use app\models\SoporteForm;

class IfatController extends Controller{

    public $title;

    public function actionIndex(){
        $this->title = 'Ifat';
        return $this->render('index',['title' => $this->title]);
    }

    public function actionCliente(){
        $this->title = 'Area de Atencion a clinte';
        return $this->render('cliente',['title' => $this->title]);
    }

    public function actionEncuesta(){
        $this->title = 'Encuesta';
        return $this->render('encuesta',['title' => $this->title]);
    }

    public function actionSoporte(){
        $this->title = 'Soporte tecnico';
        $model = new SoporteForm();
        if($model->load(Yii::$app->request->post()) && $model->validate()){
            return Yii::$app->getResponse()->redirect('mantenimiento');
        }
        return $this->render('soporte',['title' => $this->title,'model' => $model]);
    }
}