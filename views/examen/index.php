<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\Pjax;
use app\models\Examen;
use kartik\grid\GridView;
use yii\bootstrap5\Modal;
use yii\grid\ActionColumn;
/** @var yii\web\View $this */
/** @var app\models\ExamenSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Examens';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid">

    <div class="examen-index">

        <p>
            <?= Html::button('Crear Examen', ['value'=>Url::to(['/examen/create']), 'class' => 'btn btn-outline-primary btn-sm','id'=>'modalButton'])?>
        </p>
        <br>

        <?php Modal::begin([
            'title' =>'<h4>Examen</h4>',
            'id'     =>'movi-modal',
            'size'   =>'modal-lg',
            'clientOptions' => ['backdrop' => 'static', 'keyboard' => FALSE]
            ]);
            echo "<div id='movi-modalContent'> </div>";
            Modal::end();
        ?>

        <?php Pjax::begin(); ?>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <?php 
            $gridColumns = [
                [
                    'attribute' => 'nombre',
                    'header' => 'Nombre',
                    'vAlign' => 'middle',
                    'format'=>'raw',
                ],
                [
                    'attribute' => 'fk_curso',
                    'header' => 'Curso',
                    'vAlign' => 'middle',
                    'content' => function ($model) {
                        return $model->fkCurso->nombre;
                    }
                ],
                [
                    'attribute' => 'status',
                    'header' => 'Estatus',
                    'vAlign' => 'middle',
                    'width' => '150px',
                    'value' => function ($model){
                        if ($model->status == 1) {
                            return "Activo";
                        } elseif ($model->status == 0) {
                            return "Inactivo";
                        } elseif ($model->status == 2) {
                            return "Sin Asignar";
                        }
                    },
                    
                    /* 'filterType' => GridView::FILTER_SELECT2,
                    'filter' => ArrayHelper::map(Status::find()->all(),'IDStatus','nombre'), 
                    'filterWidgetOptions' => [
                        'pluginOptions' => ['allowClear' => true],
                    ],
                    'filterInputOptions' => ['placeholder' => 'Seleccione'], // allows multiple authors to be chosen */
                    'format' => 'raw'
                ],
                [
                    'class' => 'kartik\grid\ActionColumn',
                    'width' => '40px',
                    'template' => '{ver}',
                    'header' => 'Ver',
                    'buttons' => [
                        'ver' => function ($url, $dataProvider) {
                            return Html::button('<i class="fas fa-eye"></i></span>', 
                            ['value'=>Url::to(['/examen/view','ID'=>  $dataProvider->ID]),
                            'class' => 'btn btn-outline-primary btn-sm custom_button'
                            ]);
                        },
                    ],
                ],
                [
                    'class' => 'kartik\grid\ActionColumn',
                    'width' => '40px',
                    'template' => '{actualizar}',
                    'header' => 'Modificar',
                    'buttons' => [
                        'actualizar' => function ($url, $dataProvider) {
                            return Html::button('<i class="fa fa-fw fa-pen"></i></span>', 
                            ['value'=>Url::to(['/examen/update','ID'=>  $dataProvider->ID]),
                            'class' => 'btn btn-outline-primary btn-sm custom_button'
                            ]);
                        },
                    ],
                ],
                [
                    'class' => 'kartik\grid\ActionColumn',
                    'width' => '40px',
                    'template' => '{opciones}',
                    'header' => 'Opciones',
                    'buttons' => [
                        'opciones' => function ($url, $dataProvider) {
                            return Html::a('Gestionar preguntas', ['preguntas','ID'=>  $dataProvider->ID], ['class' => 'btn btn-outline-primary btn-sm']);
                            
                        },
                    ],
                ],
                /* [
                    'class' => 'kartik\grid\ActionColumn',
                    'width' => '50px',
                    'template' => '{borrar}',
                    'header' => 'Eliminar',
                    'buttons' => [
                        'borrar' => function ($url, $dataProvider) {
                            return Html::a('<i class="fa fa-fw fa-trash"></i>', ['delete', 'id' => $dataProvider->ID], [
                                'class' => 'btn btn-outline-primary btn-sm',
                                'data' => [
                                    'confirm' => Yii::t('app', 'Seguro de borrar este registro?'),
                                    'method' => 'post',
                                ],
                            ]);
                        },
                    ],
                ], */
            
            ]
        ?>

        <?php Pjax::begin(); ?> 
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            //'showPageSummary' => true,
            'columns' => $gridColumns,
            //'pjax' => true,
            'striped' => false,
            'hover' => true,
            'responsive'=>true,
            'bordered'=>true,
            //'resizableColumns'=>true,
            'headerRowOptions'=>['style'=>'font-size: .8em;background-color:#E6E6E6;color:#31708f'],
            'rowOptions' => ['style'=>'font-size: .9em;color:#000000;'],
            'panel' => [
                'heading'=>'<h3 style="color:white;text-align:center">Examenes</h3>',
                'type'=>'primary',
                //'footer'=>false,
                'before'=>false,
                    ],
            'summary'=>false,
            'pjaxSettings' =>[
                'neverTimeout'=>true,
                'options'=>[
                        'id'=>'pjax_tickets',
                    ]
                ],
            'pjax' => true,
            ]); ?>
            <?php Pjax::end(); ?>

        <?php Pjax::end(); ?>

    </div>
</div>
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
