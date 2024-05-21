
 <?php 
use yii\helpers\Html;
use app\components\Util;

foreach($models as $noticia):   ?>
<div class="col-md-4 col-lg-3">
    <article class="post post-medium border-0 pb-0 mb-5">
        <div class="post-image">
            <?= Html::a('<img src="'.
            Yii::getAlias("@web")."/uploads/noticiaportada/".
            $noticia->foto.
            '" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="">',
            ['/noticia/noticia','id'=> Util::encrypt_decrypt_Id($noticia->IDNoticia,1)]) ?>
        </div>

        <div class="post-content">

            <h2 class="font-weight-semibold text-5 line-height-6 mt-3 mb-2">
                <?= Html::a($noticia->titulo, ['/noticia/noticia','id'=>Util::encrypt_decrypt_Id($noticia->IDNoticia,1)]);?></h2>
                <p><?php echo $noticia->descripcion;?></p>

            <div class="post-meta">
                <span><i class="far fa-user"></i> Creado <?= $noticia->fkAutor0->username;?> </span>
                <span><i class="far fa-folder"></i> <a href="#">Hojas</a>, <?= $noticia->numeroFotos; ?> </span>
                <span><i class="far fa-comments"></i> <a href="#">100 Visitas</a></span>
                <span class="d-block mt-2">
               <!-- <a href="blog-post.html" class="btn btn-xs btn-light text-1 text-uppercase">Entrar</a>-->
                <?= Html::a('Entrar',['/noticia/noticia','id'=>Util::encrypt_decrypt_Id($noticia->IDNoticia,1)],['class'=>'btn btn-xs btn-light text-1 text-uppercase']) ?>
                </span>
            </div>

        </div>
    </article>
</div>
<?php endforeach; ?>
                                    