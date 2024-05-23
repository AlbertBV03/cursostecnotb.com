
 <?php 
use yii\helpers\Url;
use yii\helpers\Html;
use app\components\Util;

?>
<div class="container-fluid">
<div class="row row-cols-4">

<?php foreach($cursos as $curso):   ?>
    <div class="card">
  <div class="card-body">

            <div class="product-thumb-info border-0 mb-3">

                <p class="quick-view text-uppercase font-weight-semibold text-2">
                <?php echo $curso->fkCurso->nombre?>
                </p>
                <a href="#">
                    <!-- <div class="product-thumb-info-image"> -->
                    <?= Html::img($curso->getImageUrl(),['style'=>'width:100%']); ?>
                   <!--  </div> -->
                </a>
            </div>
            <div class="d-flex justify-content-between">
                <div>
                    <h3 class="text-3-5 font-weight-medium font-alternative text-transform-none line-height-3 mb-0 text-uppercase"><?php echo $curso->fkCurso->detalle?></h3>
                </div>
                
            </div>

            <p>
            <a href="<?= Url::to(['manual/manuales', 'ID' => $curso->fk_curso]) ?>" class="btn btn-primary">Ver Manuales</a>
            </p>
            
        
    </div>
    </div>
<?php endforeach; ?>
</div>
</div>
