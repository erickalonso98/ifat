<?php 
    /** @var yii\web\View $this */
    //use yii\helpers\Html;
    use yii\bootstrap5\ActiveForm;
    use yii\bootstrap5\Html;
    use yii\helpers\Url;
 ?>
 
<div class="container">
    <div class="card card-body">
        <h1 class="text-center"><?= $title ?></h1>
        <p class="text-center"><?= $text ?></p>
        <hr>
        <?php $form = ActiveForm::begin(['id' => 'login-form']) ?>
            <div class="form-group">
                <?= $form->field($model,'username')->label('Correo Electronico')->textInput(['autofocus' => true]) ?>
            </div>
            <div class="form-group">
                <?= $form->field($model,'password')->label('clave')->passwordInput() ?>
            </div>
            <?= Html::submitButton('Iniciar',['class' => 'btn btn-success']) ?>
        <?php ActiveForm::end(); ?>
        <p class="text-center mt-3">
            No Tienes Cuenta?
            <a style="text-decoration:none;" href="<?php echo Url::to(['ifat/register']) ?>"><?= $enlace ?></a>
        </p>
        
    </div>
</div>
 