<?php
 
use yii\helpers\Html;
use app\components\Util;

?>

<?php foreach($models as $subcoleccion):   ?>
    <div class="col-sm-6 col-lg-4">
        <div class="product mb-0">
            <div class="product-thumb-info border-0 mb-3">

                <div class="addtocart-btn-wrapper">
                <?= Html::a('<i class="fas fa-search"></i>',
                                ['/manual/show-sub-manuales','id'=>Util::encrypt_decrypt_id($subcoleccion->IDSubCol,1), 'ID'=>Util::encrypt_decrypt_id(0,1)],
                                ['class'=>'text-decoration-none addtocart-btn'],
                                ['title'=>'Ver coleccion']) ?>
                </div>

                <p class="quick-view text-uppercase font-weight-semibold text-2">
                <?php echo $subcoleccion->nombre?>
                </p>
                <?= Html::a('<img src="'.
                    Yii::getAlias("@web")."/img/sie/logo.jpg".
                    '" class="img-fluid product-thumb-info-image" alt="">',
                    ['/manual/show-sub-manuales','id'=> Util::encrypt_decrypt_Id($subcoleccion->IDSubCol,1), 'ID'=>Util::encrypt_decrypt_id(0,1)]) ?>
            </div>

            <!-- <p class="price text-2 mb-3">
                <span class="badge badge-light bg-color-light-scale-2 badge-md text-color-dark py-2 me-2 ">Incluye - <?=Util::buscarNumHojas($subcoleccion->IDSubCol)?> Hojas</span>
                <?= Html::a('Entrar',['/coleccion/view-manual','id'=>Util::encrypt_decrypt_Id($subcoleccion->IDSubCol,1)],['class'=>'btn btn-xs btn-light text-1 text-uppercase']) ?>
            </p> -->
            
        </div>
    </div>
<?php endforeach; ?>

