<?php
use yii\helpers\Html;
use app\Components\Util;

        $contador = 0;
        $contador2 = 0;
        foreach($models as $categoria):   
        $contador = $contador + 1;
        ?>

        <li class="mb-1">
            <li class="nav-item"><?= Html::a($categoria->nombre, ['/coleccion/show-coleccion','id'=>Util::encrypt_decrypt_Id($categoria->IDColeccion,1)], ['class'=>'nav-link', 'style'=>'text-align:left', 'data-toggle'=>'collapse', 'data-target'=>"#collapse200One$contador", 'aria-expanded'=>false, 'aria-current'=>false]) ?></li>
            <div class="collapse hide" id="collapse200One<?= +$contador ?>">
                <ul>
                    <?php foreach($coleccionSubcategoria as $subcategoria):   
                        $contador2 = $contador2 + 2;

                        if ($subcategoria->fkColeccion == $categoria->IDColeccion) : ?>

                            <!-- <li class="nav-item"><a href="/subcoleccion/show-subcoleccion" class="nav-link"><?= $subcategoria->nombre ?></a></li> -->
<!--                             <li class="nav-item"><?= Html::a($subcategoria->nombre, ['/manual/show-sub-manuales','id'=>Util::encrypt_decrypt_Id($subcategoria->IDSubCol,1)], ['class'=>'nav-link']) ?></li>
 -->                            <li class="nav-item"><?= Html::a($subcategoria->nombre, ['/coleccion/show-coleccion','id'=>Util::encrypt_decrypt_Id($subcategoria->IDSubCol,1)], ['class'=>'nav-link', 'style'=>'text-align:left', 'data-toggle'=>'collapse', 'data-target'=>"#collapse200One1$contador2", 'aria-expanded'=>false, 'aria-current'=>true]) ?></li>

                        <?php endif; ?>
                        <div class="collapse hide" id="collapse200One1<?= +$contador2 ?>">
                        <ul>
                            <?php foreach($manuales as $manualsubcategoria):   
                                if ($manualsubcategoria->fkSubCol == $subcategoria->IDSubCol) : ?>
                                    <!-- <li class="nav-item"><a href="/subcoleccion/show-subcoleccion" class="nav-link"><?= $subcategoria->nombre ?></a></li> -->
                                    <li class="nav-item"><?= Html::a($manualsubcategoria->fkManual0->nombre, ['/manual/view-manual','id'=>Util::encrypt_decrypt_Id($manualsubcategoria->fkManual,1)], ['class'=>'nav-link']) ?></li>
                                <?php endif; ?>
                                
                            <?php endforeach;  ?>

                        </ul>
                    </div>
                    <?php endforeach;  ?>
                </ul>
            </div>
            
        </li>
            
        <?php endforeach;  ?>