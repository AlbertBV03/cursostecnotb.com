<?php

use yii\helpers\Url;
use app\components\Util;
use yii\bootstrap4\Html;
//windows
use kartik\dialog\Dialog;
use yii\bootstrap4\Modal;
use yii\web\JsExpression;
use yii\widgets\DetailView;


/* @var $this yii\web\View */
/* @var $model app\models\Manual */

$this->title = $model->IDColeccion;
$this->params['breadcrumbs'][] = ['label' => 'panel', 'url' => ['/site/dashboard']];
$this->params['breadcrumbs'][] = ['label' => 'Manuals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="container">
   <div class="row py">
   <div role="main" class="main shop pt-4">

<div class="container">
   
    <div class="row">
    <!-- sección manual-->
        <div class="col-lg-12">

            <div class="masonry-loader masonry-loader-loaded">
                <div class="row products product-thumb-info-list" data-plugin-masonry="" data-plugin-options="{'layoutMode': 'fitRows'}" style="position: relative; height: 1986px;">

                    <div class="col-sm-4" style="position: absolute; left: 0px; top: 0px;">
                        <article class="post post-medium border-0 pb-0 mb-5">
                        <div class="post-image">
                            <?php if($model->portada ==! ""){ ?>
                            <?= Html::a('<img src="'.
                            Yii::getAlias("@web").$model->getImageUrl().
                            '" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" width="300px" alt="">',
                            ['#']) ?>
                            <?php } ?>
                        
                        </div>
                        </article>
                    </div>

                    <div class="col-sm-5" style="position: absolute; left: 0px; top: 993px;">
                        <table class="table">
                        <tr><td>Nombre:</td><td><?php echo $model->nombre; ?></td></tr>
                        <!-- <tr><td>Descripcion:</td><td><?php //echo $model->descripcion; ?></td></tr> -->
                        <!-- <tr><td>Identificador:</td><td><?php //echo $model->identificador; ?></td></tr> -->
                        <tr><td>Creado el:</td><td><?php echo Yii::$app->formatter->asDateTime($model->created_at, 'long'); ?></td></tr>
                        <tr><td>Actualizado el:</td><td><?php echo Yii::$app->formatter->asDateTime($model->updated_at, 'long'); ?></td></tr>
                        <tr><td>Autor:</td><td><?php echo $model->fkUser0->username; ?></td></tr>
                        <tr><td>Estatus:</td>
                        <td>
                        <span class="badge badge-dark">
                        <?php switch ($model->estatus) {
                            case 1:
                                echo "Capturado";
                                break;
                            case 2:
                                echo "Publicado";
                                break;
                            case 3:
                                echo "Archivado";
                                break;
                            case 4:
                                echo "Cancelado";
                                break;
                            case 5:
                                echo "En proceso";
                                break;
                            }
                         ?>
                        </span>    
                        </td>
                        <tr><td>Operación:</td>
                        <td>
                        <!-- <?= Html::a('<i class="fas fa-edit"></i>', ['/coleccion/update','id'=>Util::encrypt_decrypt_Id($model->IDColeccion,1)], ['class'=>'btn btn-success'],['type'=>'button']) ?> -->
                        <?= Html::button('<i class="fa fa-edit"></i>', 
                        ['value'=>Url::to(['/coleccion/update', 'id'=>Util::encrypt_decrypt_Id($model->IDColeccion,1)]),
                                    'class' => 'btn btn-success','id'=>'modalButton']) ?>
                        <?php 
                        $id=Util::encrypt_decrypt_Id($model->IDColeccion,1);
                        ?>
                        <?= Html::Button('<i class="fas fa-trash"></i>', ['class'=>'btn btn-danger', 'onclick'=>"deleteColeccion('$id')"]);   ?>
                        <?= Html::a('<i class="fa fa-hand-point-left"></i>', ['/coleccion/index', 'ID' => Util::encrypt_decrypt_Id(0,1)], ['class' => 'btn btn-light']) ?>
                        </td>
                        </tr>
                        </table>
                    </div>


                </div>

            <div class="bounce-loader"><div class="bounce1"></div><div class="bounce2"></div><div class="bounce3"></div></div></div>
        </div>
     </div>

    <div class="row">
    <div class="col-lg-2">
    <p>
        <?php 
                    echo Html::button('<i class="fa fa-plus"></i> Agregar Subcolecciones', 
                    ['value'=>Url::to(['/subcoleccion/create', 'id'=>Util::encrypt_decrypt_Id($model->IDColeccion,1)]),
                                    'class' => 'btn btn-outline-success btn-sm','id'=>'modalButton2']) 
                    ?>
    </p>
    <?php
        Modal::begin([
            'title' =>'<h4>Añadir o editar</h4>',
            'id'     =>'movi-modal',
            'size'   =>'modal-lg',
            'clientOptions' => ['backdrop' => 'static', 'keyboard' => FALSE]
            ]);
            echo "<div id='movi-modalContent'> </div>";
        Modal::end();
    ?>

    </div>
        <div class="col-lg-12">
                <table class="table">
                <thead><td>Nombre</td><td>Estatus</td><td>Ver</td><td>Borrar</td></thead>
                <div class="mb-0 pb-1">
                <?php foreach($subcolecciones as $subcoleccion):   ?>
                    <tr>
                        
                        <td>
                        <?=$subcoleccion->nombre;?>
                        </td>
                        
                        <td>
                        <?php switch ($subcoleccion->estatus) {
                            case 1:
                                echo "Capturado";
                                break;
                            case 2:
                                echo "Publicado";
                                break;
                            case 3:
                                echo "Archivado";
                                break;
                            case 4:
                                echo "Cancelado";
                                break;
                            case 5:
                                echo "En proceso";
                                break;
                            }
                         ?>
                        </td>

                        <td>
                            <?php
                            $idSubCol = Util::encrypt_decrypt_Id($subcoleccion->IDSubCol,1);
                            $IDColeccion = Util::encrypt_decrypt_Id($model->IDColeccion,1)
                            ?>
                        <?= Html::a('<i class="fas fa-eye"></i>', ['/subcoleccion/sub-coleccion','id'=> $idSubCol], ['class'=>'btn btn-success mb-2'],['type'=>'button']) ?>
                        </td>
                        <td>
                            <?php
                            $idSubCol = Util::encrypt_decrypt_Id($subcoleccion->IDSubCol,1);
                            $IDColeccion = Util::encrypt_decrypt_Id($model->IDColeccion,1)
                            ?>
                        <?= Html::Button('<i class="fas fa-trash"></i>', ['class'=>'btn btn-danger', 'onclick'=>"deleteSubcoleccion('$idSubCol','$IDColeccion')"]);   ?>
                        </td>
                    </tr>
                <?php endforeach;  ?>
                </div>
                </table>
        </div>
    </div>


</div>



</div>
    </div>
    </div>

<?php
    echo Dialog::widget();
?>
<?php
$js = <<<JAVASCRIPT
        $(function(){
                $('#modalButton').click(function(){
                    
                    $('#movi-modal').modal('show')
                                .find('#movi-modalContent')
                                .load($(this).attr('value'));
                    });
                    $('#modalButton2').click(function(){
                    
                    $('#movi-modal').modal('show')
                                .find('#movi-modalContent')
                                .load($(this).attr('value'));
                    });

                    $('.custom_button').click(function(){
                        $('#movi-modal').modal('show')
                                .find('#movi-modalContent')
                                .load($(this).attr('value'));
                        //dynamiclly set the header for the modal
                    });

            });

        JAVASCRIPT;
        $this->registerJs($js);
?>

