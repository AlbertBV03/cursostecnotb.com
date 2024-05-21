<?php 
use yii\helpers\Html;
use app\components\Util;
use app\models\Contadorvisita;
use yii\helpers\ArrayHelper;
?>
<?php 
    date_default_timezone_set('America/Mexico_City');
    $today = date('Y');
    $model= new Contadorvisita;
    $visita = $model->AddVisitor($identificador);
    if($estilo=='fondo'){
?>

<div class="gdlr-core-pbf-wrapper " style="padding: 60px 20px 0px 20px;">
    <div class="gdlr-core-pbf-background-wrap" style="background-color: #1b2434; text-align:center;color:#FFFFFF ;">
                <?php echo "Esta página ha sido visitada <strong>" . $visita . "</strong> veces en el año ". $today; ?>
    </div>
</div>

<?php 
    }
    if($estilo=='sinfondo'){
    ?>
    <div class="gdlr-core-pbf-wrapper " style="padding: 60px 10px 0px 10px;">
            <div class="gdlr-core-pbf-background-wrap" style="background-color: #ffffff; text-align:center;color:#000000 ;">
                        <?php echo "Esta página ha sido visitada <strong>" . $visita . "</strong> veces en el año ". $today; ?>
            </div>
    </div>
<?php } ?>

<?php 
    if($estilo=='solocontador'){
    ?>
        <?php echo $visita; ?>
<?php } ?>