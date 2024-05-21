<?php

use yii\helpers\Url;
use app\Components\Util;
use yii\bootstrap4\Html;

if ($models != '') {
    echo '<h3><a href="/noticia/view-noticia?id='. Util::encrypt_decrypt_id($models->IDNoticia,1) .'">'.$models->titulo . "</a></h3>";
    echo Html::a('<img src="'.
            Yii::getAlias("@web")."/uploads/noticiaportada/".
            $models->foto.
            '" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="">',
                            ['/noticia/view-noticia','id'=>Util::encrypt_decrypt_id($models->IDNoticia,1)]);   
    echo "<br>";
    echo "<br>";
    echo Html::button('Cerrar', ['value'=>Url::to(['/coleccion/create']), 'class' => 'btn btn-danger','id'=>'modal-hide']);

}
?>