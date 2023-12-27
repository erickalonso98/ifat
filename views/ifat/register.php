<?php 
    /** @var yii\web\View $this */
    //use yii\helpers\Html;
    use yii\bootstrap5\ActiveForm;
    use yii\bootstrap5\Html;
    use yii\helpers\Url;
 ?>
 <div class="container">

    <h3><?= $msg ?></h3>
    
    <div class="card card-body">
        <h1 class="text-center"><?= $title ?></h1>
        <p class="text-center mt-3">
            Si ya estas registrado ve a
            <a style="text-decoration:none;" href="<?php echo Url::to(['ifat/login']) ?>"><?= $enlace ?></a>
        </p>
        <hr>
            <?php $form = ActiveForm::begin([
            'method' => 'post',
            'id' => 'form-register',
            'enableClientValidation' => false,
            'enableAjaxValidation' => true,
            ]);
        ?>
        <div class="form-group">
            <?= $form->field($model, "username")->input("text")->label('Nombre de usuario') ?>   
        </div>

        <div class="form-group">
            <?= $form->field($model, "email")->input("email")->label('Correo electronico') ?>   
        </div>

        <div class="form-group">
             <?= $form->field($model, "password")->input("password")->label('Contraseña') ?>   
        </div>

        <?= Html::submitButton("Registrar", ["class" => "btn btn-primary"]) ?>

        <?php $form->end() ?>
    </div>
 </div>



