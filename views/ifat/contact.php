<?php 
    /** @var yii\web\View $this */
    use yii\helpers\Html;
    use app\assets\AppAsset;
 ?>
 <?php AppAsset::register($this); ?>
<div class="container mt-0">
    <div class="card">
        <div class="card-header">
            <h1 class="text-center text-uppercase"><?php echo $title; ?></h1>
        </div>
        <div class="card-body">
            <div id="map"></div>
            <div class="card card-body">
                <h3 class="text-center">Ubicacion</h3>
                <p>
                     Prol. de Paseo de la Sierra #820 Col. Primero de Mayo, C.P. 86190 Villahermosa, Tabasco, MX
                </p>
                <p>
                Tel. 9933 14 21 76 y 9933 14 21 77
                </p>
                <p>
                Lunes a Viernes de 8:00 a 16:00 hrs.
                </p>
            </div>
        </div>
    </div>
</div>




