<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\base\Security;
//use yii\bootstrap5\Html;
//use yii\helpers\Url;
//use yii\bootstrap5\ActiveForm;

use app\models\SoporteForm;
use app\models\EncuestaForm;
use app\models\CommentsForm;
use app\models\LoginForm;
use app\models\RegisterForm;

use app\models\Users;

class IfatController extends Controller{

    public $title;
    public $text;
    public $enlace;

    public function actionIndex(){
        $this->title = 'Ifat';
        return $this->render('index',['title' => $this->title]);
    }

    public function actionAbout(){
        $this->title = 'Nosotros';
        return $this->render('about',['title' => $this->title]);
    }

    public function actionCatalogue(){
        $this->title = 'Catalogos';
        return $this->render('catalogue',['title' => $this->title]);
    }

    public function actionContact(){
        $this->title = 'Contacto';
        return $this->render('contact',['title' => $this->title]);
    }

    public function actionCliente(){
        $this->title = 'Servicio al cliente';
        $model = new CommentsForm();
        if($model->load(Yii::$app->request->post()) && $model->validate()){
            return Yii::$app->getResponse()->redirect('thank');
        }
        return $this->render('servicio',['title' => $this->title,'model' => $model]);
    }

    public function actionEncuesta(){
            $this->title = 'Encuesta';
            $this->text ='Artesanias Ifat le gustaria saber como fue atendido en la compra que realizo, nos gustaria que respondiera las siguentes preguntas, esto para seguir mejorando en el servicio que se le ofrece';
            $model = new EncuestaForm();
            if($model->load(Yii::$app->request->post()) && $model->validate()){
                return Yii::$app->getResponse()->redirect('pregunta');
            }
            return $this->render('encuesta',['title' => $this->title,'model' => $model,'text' => $this->text]);
    }

    public function actionSoporte(){
        $this->title = 'Soporte tecnico';
        $model = new SoporteForm();
        if($model->load(Yii::$app->request->post()) && $model->validate()){
            return Yii::$app->getResponse()->redirect('mantenimiento');
        }
        return $this->render('soporte',['title' => $this->title,'model' => $model]);
    }

    private function randKey($str='', $long=0)
    {
        $key = null;
        $str = str_split($str);
        $start = 0;
        $limit = count($str)-1;
        for($x=0; $x<$long; $x++)
        {
            $key .= $str[rand($start, $limit)];
        }
        return $key;
    }
  
 public function actionConfirm(){
    $table = new Users;
    if (Yii::$app->request->get()){
   
        //Obtenemos el valor de los parámetros get
        $id = Html::encode($_GET["id"]);
        $authKey = $_GET["authKey"];
    
        if ((int) $id){
            //Realizamos la consulta para obtener el registro
            $model = $table
            ->find()
            ->where("id=:id", [":id" => $id])
            ->andWhere("authKey=:authKey", [":authKey" => $authKey]);
 
            //Si el registro existe
            if ($model->count() == 1){
                $activar = Users::findOne($id);
                $activar->activate = 1;
                if ($activar->update()){
                    echo "Enhorabuena registro llevado a cabo correctamente, redireccionando ...";
                    echo "<meta http-equiv='refresh' content='8; ".Url::toRoute("ifat/login")."'>";
                }else{
                    echo "Ha ocurrido un error al realizar el registro, redireccionando ...";
                    echo "<meta http-equiv='refresh' content='8; ".Url::toRoute("ifat/login")."'>";
                }
             }else //Si no existe redireccionamos a login
             {
                return $this->redirect(["ifat/login"]);
            }
        }else //Si id no es un número entero redireccionamos a login
        {
            return $this->redirect(["ifat/login"]);
        }
    }
 }

    public function actionRegister(){
        $this->title = 'Registrate';
        $this->enlace = 'Login';

        /*
        tambien funciona 
        $model = new Users();

        if($model->load(Yii::$app->request->post()) && $model->save() && $model->validate()){
            return Yii::$app->getResponse()->redirect('success');
        }*/

       
  $model = new RegisterForm;
   
  //Mostrará un mensaje en la vista cuando el usuario se haya registrado
  $msg = null;
   
  //Validación mediante ajax
  if ($model->load(Yii::$app->request->post()) && Yii::$app->request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
    }
   
  //Validación cuando el formulario es enviado vía post
  //Esto sucede cuando la validación ajax se ha llevado a cabo correctamente
  //También previene por si el usuario tiene desactivado javascript y la
  //validación mediante ajax no puede ser llevada a cabo
  if ($model->load(Yii::$app->request->post())){
   if($model->validate()){
    //Preparamos la consulta para guardar el usuario
    $table = new Users;
    $table->username = $model->username;
    $table->email = $model->email;
    $table->password = Yii::$app->security->generatePasswordHash($model->password);    

    //Creamos una cookie para autenticar al usuario cuando decida recordar la sesión, esta misma
    //clave será utilizada para activar el usuario
    $table->authKey = $this->randKey("abcdef0123456789", 200);
    //Creamos un token de acceso único para el usuario
    $table->accessToken = $this->randKey("abcdef0123456789", 200);
     
    //Si el registro es guardado correctamente
    if ($table->insert()){
     //Nueva consulta para obtener el id del usuario
     //Para confirmar al usuario se requiere su id y su authKey
     $user = $table->find()->where(["email" => $model->email])->one();
     $id = urlencode($user->id);
     $authKey = urlencode($user->authKey);
      
     $subject = "Confirmar registro";
     $body = "<h1>Haga click en el siguiente enlace para finalizar tu registro</h1>";
     $body .= "<a href='http://yii.local/index.php?r=ifat/confirm&id=".$id."&authKey=".$authKey."'>Confirmar</a>";
      
     //Enviamos el correo
     Yii::$app->mailer->compose()
     ->setTo($user->email)
     ->setFrom([Yii::$app->params["adminEmail"] => Yii::$app->params["title"]])
     ->setSubject($subject)
     ->setHtmlBody($body)
     ->send();
     
     $model->username = null;
     $model->email = null;
     $model->password = null;
    
     
     $msg = "Enhorabuena, ahora sólo falta que confirmes tu registro en tu cuenta de correo";

    }else{
     $msg = "Ha ocurrido un error al llevar a cabo tu registro";
    }
     
   }else{
    $model->getErrors();
   }

  }

    return $this->render('register',['title' => $this->title,'model' => $model,'enlace' => $this->enlace,'msg' => $msg]);
}

    public function actionLogin(){
        $this->title = 'Login';
        $this->text = 'Inicia sesion para continuar';
        $this->enlace = 'Registrate';

        $model = new LoginForm();

        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

       return $this->render('login',['title' => $this->title,'text' => $this->text,'enlace' => $this->enlace,'model' => $model]);
    }
}