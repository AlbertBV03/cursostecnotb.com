
 <?php 
use yii\helpers\Html;
use app\components\Util;

foreach($models as $manual):   ?>
<div class="col-md-4 col-lg-3">
    <article class="post post-medium border-0 pb-0 mb-5">
        <div class="post-image">
            <?= Html::a('<img src="'.
            Yii::getAlias("@web")."/uploads/manual/".
            $manual->foto.
            '" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="">',
            ['/manual/manual','id'=> Util::encrypt_decrypt_Id($manual->IDManual,1)]) ?>
        </div>

        <div class="post-content">

            <h2 class="font-weight-semibold text-5 line-height-6 mt-3 mb-2">
                <?= Html::a($manual->nombre, ['/manual/manual','id'=>Util::encrypt_decrypt_Id($manual->IDManual,1)]);?></h2>
                <p><?php echo $manual->descripcion;?></p>

            <div class="post-meta">
                <span><i class="far fa-user"></i> Creado <?=$manual->fkUser0->username;?> </span>
                <span><i class="far fa-folder"></i> <a href="#">Hojas</a>, 10 </span>
                <span><i class="far fa-comments"></i> <a href="#">100 Visitas</a></span>
                <span class="d-block mt-2">
               <!-- <a href="blog-post.html" class="btn btn-xs btn-light text-1 text-uppercase">Entrar</a>-->
                <?= Html::a('Entrar',['/manual/manual','id'=>Util::encrypt_decrypt_Id($manual->IDManual,1)],['class'=>'btn btn-xs btn-light text-1 text-uppercase']) ?>
                </span>
            </div>

        </div>
    </article>
</div>
<?php endforeach; ?>
                                    