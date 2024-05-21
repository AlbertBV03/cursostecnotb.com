
<?php 
use yii\helpers\Html;
use app\components\Util;

?>

<?php foreach($models as $manual):   ?>
    <div class="col-sm-6 col-lg-4">
        <div class="product mb-0">
            <div class="product-thumb-info border-0 mb-3">

                <div class="addtocart-btn-wrapper">
                <?= Html::a('<i class="fas fa-search"></i>',
                                ['/manual/view-manual','id'=>Util::encrypt_decrypt_id($manual->fkManual0->IDManual,1)],
                                ['class'=>'text-decoration-none addtocart-btn'],
                                ['title'=>'Ver manual']) ?>
                </div>

                <p class="quick-view text-uppercase font-weight-semibold text-2">
                <?php echo $manual->fkManual0->nombre?>
                </p>
                <a href="#">
                    <div class="product-thumb-info-image">
                        <img alt="" class="img-fluid" src="<?= Yii::getAlias('@web')."/uploads/manual/".$manual->fkManual0->foto;?>">

                    </div>
                </a>
            </div>
            <div class="d-flex justify-content-between">
                <div>
                    <h3 class="text-3-5 font-weight-medium font-alternative text-transform-none line-height-3 mb-0 text-uppercase"><?php echo $manual->fkManual0->descripcion?></h3>
                </div>
                
            </div>

            <p class="price text-2 mb-3">
                <span class="badge badge-light bg-color-light-scale-2 badge-md text-color-dark py-2 me-2 ">Incluye - <?=Util::buscarNumHojas($manual->fkManual0->IDManual)?> Hojas</span>
                <?= Html::a('Entrar',['/manual/view-manual','id'=>Util::encrypt_decrypt_Id($manual->fkManual0->IDManual,1)],['class'=>'btn btn-xs btn-light text-1 text-uppercase']) ?>
            </p>
            
        </div>
    </div>
<?php endforeach; ?>

