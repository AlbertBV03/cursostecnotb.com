<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\Pjax;
use app\models\Examen;
use kartik\grid\GridView;
use yii\bootstrap5\Modal;
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

                <div class="col-sm-4">
                <div class="card">
                <h2>Examen</h2>


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
                </div></div>
                <div class="col-sm-8">
                    <div class="card">
                        <h2>Todas las preguntas</h2>
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
                                    <td><?php echo $data->status; ?></td>
                                    <td><?php echo "<button class=".'btn btn-outline-primary'.">Editar</button>";?></td>
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
<br>