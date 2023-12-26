<?php 
    /** @var yii\web\View $this */
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
 ?>

<div class="container">
    <div class="card card-body">
        <h1 class="text-center"><?php echo $title; ?></h1>
        <hr>
        <?php 
            $form = ActiveForm::begin(['id'=>'form-soporte'])
        ?>
        <div class="form-group">
            <?= $form->field($model,'nombre')->label('Nombre') ?>
        </div>

        <div class="form-group">
            <?= $form->field($model,'apellidopat')->label('Apellido paterno') ?>
        </div>

        <div class="form-group">
            <?= $form->field($model,'apellidomat')->label('Apellido materno') ?>
        </div>

        <div class="form-group">
            <?= $form->field($model,'email')->label('Correo Electronico') ?>
        </div>

        <div class="form-group">
            <?= $form->field($model,'telefono')->input('tel')->label('Telefono')?>
        </div>

        <div class="form-group">
            <?= $form->field($model,'paginaWeb')->label('Pagina Web') ?>
        </div>

        <div class="form-group">
            <?= $form->field($model,'comentario')->label('Descripcion de detalle')->textarea(['rows' => 6]) ?>
        </div>

        <?= Html::submitButton('Enviar',['class' => 'btn btn-success']) ?>
        <?php ActiveForm::end() ?>
    </div>
</div>


