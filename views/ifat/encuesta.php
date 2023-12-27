<?php 
    /** @var yii\web\View $this */
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    
 ?>

 <div class="container">
    <div class="card card-body">
        <h1 class="text-center"><?php echo $title; ?></h1>
        <h5 class="text-center" style="font-weight: bold;"><?php echo $text; ?></h5>
        <hr>
        <?php $form = ActiveForm::begin(['id' => 'form-addask'])  ?>
            
            <div class="form-group">
                <?php 
                    echo $form->field($model, 'yourAttribute1',['labelOptions' => ['class' => 'font-weight-bold']])
                        ->label('1.- Se le hiso atractiva la página web de artesanías Ifat? (*)')->radioList([
                        'value1' => 'Si',
                        'value2' => 'No'
                    ]);
                 ?>
            </div>
             <div class="form-group">
                <?php 
                    echo $form->field($model, 'yourAttribute2',['labelOptions' => ['class' => 'font-weight-bold']])->label('2.- Del 1 al 5 donde 1 es mayor y 5 menor importancia, ¿Cuál fue el grado de satisfacción que obtuvo con su producto?')->radioList([
                        'value1' => 'Excelente',
                        'value2' => 'Bueno',
                        'value3' => 'Regular',
                        'value4' => 'Malo',
                        'value5' => 'Muy malo'
                    ]);
                 ?>
            </div>
             <div class="form-group">
                <?php 
                    echo $form->field($model, 'yourAttribute3',['labelOptions' => ['class' => 'font-weight-bold']])
                    ->label('3.- ¿Se le hizo satisfactorio el precio del producto?')
                    ->radioList([
                            'value1' => 'Si',
                            'value2' => 'No'
                    ]);
                 ?>
            </div>
             <div class="form-group">
                <?php 
                    echo $form->field($model, 'yourAttribute4',['labelOptions' => ['class' => 'font-weight-bold']])
                        ->label('4.- ¿Realizaría de nuevo alguna compra en artesanías Ifat?')
                        ->radioList([
                        'value1' => 'Si',
                        'value2' => 'No',
                    ]);
                 ?>
            </div>
             <div class="form-group">
                <?php 
                    echo $form->field($model, 'yourAttribute5',['labelOptions' => ['class' => 'font-weight-bold']])
                    ->label('5.-  ¿Está satisfecho con el servicio que se le ofreció?
')
                    ->radioList([
                        'value1' => 'Si',
                        'value2' => 'No',
                    ]);
                 ?>
            </div>
            <div class="form-group">
                <?= $form->field($model,'ask',['labelOptions' => ['class' => 'font-weight-bold']])
                         ->label('¿Por que motivo otorgas estas respuestas?')
                         ->textarea(['rows' => 5]); ?>
            </div>
            <?= Html::submitButton('Enviar',['class' => 'btn btn-success']); ?>
        <?php ActiveForm::end() ?>
    </div>
 </div>

