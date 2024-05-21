<?php
use yii\helpers\Html;

foreach($models as $img): ?>

            <div class="col-6 col-md-4 p-0">
                <a href="<?= Yii::getAlias('@web') ?><?php echo $img->fkArchivo0->ruta;?>">
                    <span class="thumb-info thumb-info-no-borders thumb-info-centered-icons">
                        <span class="thumb-info-wrapper">
                            <img src="<?= Yii::getAlias('@web') ?><?php echo $img->fkArchivo0->ruta;?>" class="img-fluid" alt="" />
                            <span class="thumb-info-action">
                                <span class="thumb-info-action-icon thumb-info-action-icon-light"><i class="fas fa-plus text-dark"></i></span>
                            </span>
                        </span>
                    </span>
                </a>
            </div>
        
<?php endforeach; ?>
