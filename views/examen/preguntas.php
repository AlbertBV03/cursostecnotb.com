<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\Pjax;
use app\models\Examen;
use kartik\grid\GridView;
use yii\bootstrap4\Modal;
use yii\grid\ActionColumn;
use yii\widgets\DetailView;
/** @var yii\web\View $this */
/** @var PreguntasSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Examens';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid">
    <div class="examen-preguntas">
        <div class="card">
            <div class="row">

                <div class="col-sm-12">
                    <div class="card">
                        <h2>Datos del examen:</h2>
                            <?= DetailView::widget([
                                'model' => $examen,
                                'attributes' => [
                                    'ID',
                                    [
                                        'attribute' => 'nombre',
                                        'header' => 'Nombre',
                                        'vAlign' => 'middle',
                                        'value' => function ($examen) {
                                            return $examen->nombre;
                                        }
                                    ],
                                    [
                                        'attribute' => 'status',
                                        'header' => 'Estado',
                                        'value' => function ($examen) {
                                            if ($examen->status == 1) {
                                                return 'Vigente';
                                            } elseif ($examen->status == 0) {
                                                return 'No Vigente';
                                            } elseif ($examen->status == 2) {
                                                return 'Sin Asignar';
                                            } 
                                            else {
                                                return 'Sin registro';
                                            }
                                        },
                                    ],
                                    [
                                        'attribute' => 'fk_curso',
                                        'header' => 'Curso',
                                        'vAlign' => 'middle',
                                        'value' => function ($examen) {
                                            return $examen->fkCurso->nombre;
                                        }
                                    ],
                                ],
                            ]) ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">            
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <h2>Todas las preguntas:</h2>
                        <br>
                        <div class="conteiner">
                            <?= Html::button('<i class="fa fa-plus-circle"></i> Crear Pregunta</span>', ['value'=>Url::to(['/examen/crearpregunta', 'examen'=>  $examen->ID]), 'class' => 'btn btn-outline-primary','id'=>'modalButton']);?>
                        </div>
                        <br>
                        <table class="table">
                            <tr>
                                <th>ID</th>
                                <th>Contenido</th>
                                <th>Respuesta</th>
                                <th>Estado</th>
                                <th>Opciones</th>
                            </tr>
                            <?php
                                foreach ($model as $data) { ?>
                                <tr>
                                    <td><?php echo $data->ID; ?></td>
                                    <td><?php echo $data->contenido; ?></td>
                                    <td><?php echo $data->respuesta; ?></td>
                                    <td><?php switch ($data->status) {
                                            case 1:
                                                echo "Activo";
                                                break;
                                            case 0:
                                                echo "Inactivo";
                                                break;
                                            default:
                                                echo "Sin Asignar";
                                        }?>
                                    </td>
                                    <td>
                                        <?= Html::button('<i class="fa fa-fw fa-eye"></i></span>', 
                                            ['value'=>Url::to(['/examen/verpregunta','ID'=>  $data->ID]),
                                            'class' => 'btn btn-outline-primary btn-sm custom_button'
                                            ]);?>
                                        <?= Html::button('<i class="fa fa-fw fa-pen"></i></span>', 
                                            ['value'=>Url::to(['/examen/editarpregunta','ID'=> $data->ID, 'examen'=> $examen->ID]),
                                            'class' => 'btn btn-outline-primary btn-sm custom_button'
                                            ]);?>
                                        <?= Html::a('<i class="fa fa-fw fa-trash"></i></span>', ['eliminarpregunta', 'ID' => $data->ID, 'examen'=>  $examen->ID], [
                                            'class' => 'btn btn-danger btn-sm',
                                            'data' => [
                                                'confirm' => 'Are you sure you want to delete this item?',
                                                'method' => 'post',
                                            ],
                                            ]) ?>
                                    </td>
                                </tr>     
                            <?php       
                                }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>

<?php Modal::begin([
            'title' =>'<h4>Preguntas</h4>',
            'id'     =>'movi-modal',
            'size'   =>'modal-lg',
            'clientOptions' => ['backdrop' => 'static', 'keyboard' => FALSE]
            ]);
            echo "<div id='movi-modalContent'> </div>";
            Modal::end();
        ?>

<?php
$js = <<<JAVASCRIPT
    $(function(){
            $('#modalButton').click(function(){
                
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