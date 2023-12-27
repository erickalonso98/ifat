<?php 
    /** @var yii\web\View $this */
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
 ?>

<div class="container">
    <div class="card card-body">
        <h1 class="text-center"><?php echo $title; ?></h1>
        <p class="text-center">Haznos saber tu opinion de nuestros productos en la caja de comentarios</p>
        <hr>
        <?php 
            $form = ActiveForm::begin(['id'=>'form-comments'])
        ?>
     
        <div class="form-group">
            <?= $form->field($model,'telefono')->input('tel') ?>
        </div>

        <div class="form-group">
            <?= $form->field($model,'comentario')->textarea(['rows' => 6]) ?>
        </div>
        <?= Html::submitButton('Enviar',['class' => 'btn btn-success']) ?>
        <?php ActiveForm::end() ?>
    </div>
</div>
