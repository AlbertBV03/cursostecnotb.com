<?php
 
use yii\helpers\Html;
use app\components\Util;

?>

<?php foreach($models as $coleccion):   ?>
    <div class="col-sm-6 col-lg-4">
        <div class="product mb-0">
            <div class="product-thumb-info border-0 mb-3">

                <div class="addtocart-btn-wrapper">
                <?= Html::a('<i class="fas fa-search"></i>',
                                ['/subcoleccion/show-subcoleccion','id'=>Util::encrypt_decrypt_id($coleccion->IDColeccion,1)],
                                ['class'=>'text-decoration-none addtocart-btn'],
                                ['title'=>'Ver coleccion']) ?>
                </div>

                <p class="quick-view text-uppercase font-weight-semibold text-2">
                <?php echo $coleccion->nombre?>
                </p>
                <?php if ($coleccion->foto==!""){ ?>
                    <?= Html::a('<img src="'.
                    Yii::getAlias("@web").$coleccion->getImageUrl().
                    '" class="img-fluid product-thumb-info-image" alt="">',
                    ['/subcoleccion/show-subcoleccion','id'=> Util::encrypt_decrypt_Id($coleccion->IDColeccion,1)]) ?>
                <?php }else{ ?>
                    <?= Html::a('<img src="'.
                    Yii::getAlias("@web")."/img/sie/logo.jpg".
                    '" class="img-fluid product-thumb-info-image" alt="">',
                    ['/subcoleccion/show-subcoleccion','id'=> Util::encrypt_decrypt_Id($coleccion->IDColeccion,1)]) ?>
                    <?php } ?>
            </div>

            <!-- <p class="price text-2 mb-3">
                <span class="badge badge-light bg-color-light-scale-2 badge-md text-color-dark py-2 me-2 ">Incluye - <?=Util::buscarNumHojas($coleccion->IDColeccion)?> Hojas</span>
                <?= Html::a('Entrar',['/coleccion/view-manual','id'=>Util::encrypt_decrypt_Id($coleccion->IDColeccion,1)],['class'=>'btn btn-xs btn-light text-1 text-uppercase']) ?>
            </p> -->
            
        </div>
    </div>
<?php endforeach; ?>

