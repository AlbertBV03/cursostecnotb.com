<?php

use yii\helpers\Url;
use app\models\Curso;
use yii\helpers\Html;
use yii\widgets\Pjax;
use kartik\grid\GridView;
use yii\bootstrap4\Modal;
use yii\grid\ActionColumn;
use yii\bootstrap4\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\search\CursoSearch $searchModelInscrito */
/** @var yii\data\ActivedataProviderInscrito $dataProviderInscrito */

$this->title = 'Inscritos';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $form = ActiveForm::begin(); ?>
<?= $form->field($curso, 'ID')->hiddenInput(['value'=>$cursoID,'id'=>'cursoID','name'=>'cursoID'])->label(false); ?>

<?php ActiveForm::end(); ?>

<?php


//columnas del gridview para seleccionar es modal
        $gridColumns = [
                [
                    'class'=>'yii\grid\SerialColumn',
                    'header'=>'Num',
                    'contentOptions'=>['style'=>'width:10px;vertical-align:middle;text-align:center;'],
                ],
                 'username'=>[
                'attribute'=>'username',
                'header'=>'Nombre de usuario',
                 'value'=>'username',
                 'vAlign'=>'middle',
                'hAlign'=>'middle',
                //'width'=>'10%'
                ],
                'email'=>[
                'attribute'=>'email',
                 'header'=>'Correo',
                 'value'=>'email',
                 'vAlign'=>'middle',
                 'hAlign'=>'middle',
                 //'width'=>'20%'
                 ],

            'status'=>[
                'attribute'=>'status',
                'header'=>'Estatus',
                'value'=>'status',
                'vAlign'=>'middle',
                'hAlign'=>'middle',
                //'width'=>'10%'
                ],
            ['class' => '\kartik\grid\ActionColumn',
                    'template' => '{info}',
                   'buttons' => [
                        'info' => function ($url, $dataProviderUsers) {
                         return Html::button('seleccionar', ['class'=>'btn btn-success btn-sm' , 'onclick'=>"asignacion('{$dataProviderUsers->id}')" ]);
                        },      
                    ],

                ],
        ];
    ?>  
    
<div class="container-fluid">
    <div class="curso-index">

        <h1><?= Html::encode($this->title) ?></h1><br>

       
        
        <?php
                Modal::begin([
                    'title' =>'<h4>Nuevo curso</h4>',
                    'id'     =>'movi-modal',
                    'size'   =>'modal-lg',
                    'clientOptions' => ['backdrop' => 'static', 'keyboard' => FALSE]
                    ]);
                    echo "<div id='movi-modalContent'> </div>";
                Modal::end();
            ?>
            
            <?php Modal::begin([
                        'id'=>'ventana', //.$id,
                        'title'=>'Seleccione un usuario',
                        'toggleButton' => [
                            'label'=>'<i class="fa fa-plus"></i> Agregar usuario al curso <br>', 'class'=>'btn btn-outline-success btn-sm',
                            'disabled' =>false,
                            //'disabled' =>(Util::buscaCantidadEvaluadores($fksol)<3)? false:true,
                        ],
                        'options'=>[
                            'data-keyboard'=>'false',
                            'data-backdrop'=>'static',
                            'data-controls-modal'=>'venta',
                        ],
                        'size'=>'modal-lg',
                      
                    ]);
                   
                   ?> 
            
            <p>
            <?php 

            echo    GridView::widget([
            'dataProvider'=> $dataProviderUsers,
            'columns' => $gridColumns,
            'filterModel' => $searchModelUsers,
            'responsive'=>true,
            'hover'=>false,
            'bordered'=>true,
            'resizableColumns'=>true,
            'headerRowOptions'=>['style'=>'font-size: .8em;background-color:#E6E6E6;color:#31708f'],
            'rowOptions' => ['style'=>'font-size: .9em;color:#000000;'],
            'panel' => [
                        'heading'=>'<p class="panel-title" style="font-size:.8em"><i class="glyphicon glyphicon-globe"></i>LISTA DE USUARIOS</p>',
                        'type'=>'info',
                        //'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> Create Country', ['create'], ['class' => 'btn btn-success']),
                        //'after'=>Html::a('<i class="glyphicon glyphicon-repeat"></i> Reset Grid', ['index'], ['class' => 'btn btn-info']),
                        'footer'=>false,
                        //'heading'=>false,
                        'before'=>false,
                    ],
            'summary'=>false,
            'pjax' => true,
            ]);
            Modal::end()
            ?>
            <!-- <?= Html::a('Listado', ['listado'], ['class' => 'btn btn-success']) ?> -->
            <?= Html::a('<i class="fa fa-hand-point-left"></i> Regresar', ['/curso/index'], ['class' => 'btn btn-info btn-sm']) ?>
            </p>
        <?php // echo $this->render('_search', ['model' => $searchModelInscrito]); ?>
        <?php

            $gridColumns = [
                //['class' => 'yii\grid\SerialColumn'],
                /* [
                    'class'=>'yii\grid\SerialColumn',
                    'header'=>'Num',
                    'contentOptions'=>['style'=>'width:10px;vertical-align:middle;text-align:center;'],
                ], */
                [
                    'attribute' => 'fk_inscrito',
                    'header' => 'Usuario inscrito:',
                    'vAlign' => 'middle',
                    'format'=>'raw',
                    'value' => 'fkInscrito.username'
                ],
                [
                    'attribute' => 'fk_telefono',
                    'header' => 'Nombre:',
                    'vAlign' => 'middle',
                    'format'=>'raw',
                    'value' => 'fkTelefono.nombre'
                ],
                [
                    'attribute' => 'fkUser',
                    'header' => 'Asignó:',
                    'vAlign' => 'middle',
                    'format'=>'raw',
                    'value' => 'fkUser0.username'
                ],
                [
                    'attribute' => 'inicio',
                    'header' => 'Asignado el:',
                    'vAlign' => 'middle',
                    'content' => function ($model) {
                        return Yii::$app->formatter->asDate($model->created_at, 'long');
                    }
                ],
                /* [
                    'attribute' => 'fin',
                    'header' => 'Concluye el:',
                    'vAlign' => 'middle',
                    'content' => function ($model) {
                        return Yii::$app->formatter->asDate($model->fin, 'long');
                    }
                ], */
                /* [
                    'attribute' => 'status',
                    'header' => 'Estatus',
                    'vAlign' => 'middle',
                    'width' => '150px',
                    'value' => function ($model){
                        if ($model->status == 1) {
                            return "Capturado";
                        } elseif ($model->status == 2) {
                            return "Publicado";
                        } elseif ($model->status == 3) {
                            return "Archivado";
                        } elseif ($model->status == 4) {
                            return "Cancelado";
                        } elseif ($model->status == 5) {
                            return "En proceso";
                        }
                    },
                    'format' => 'raw'
                ], */
                /* [
                    'class' => 'kartik\grid\ActionColumn',
                    'width' => '50px',
                    'template' => '{ver}',
                    'header' => 'Ver',
                    'buttons' => [
                        'ver' => function ($url, $dataProviderInscrito) {
                            return Html::a('<i class="fas fa-eye"></i>', ['/user-management/user/view','id'=>  $dataProviderInscrito->fk_inscrito], ['class' => 'btn btn-outline-primary btn-sm']);
                            
                        },
                    ],
                ], */
                [
                    'class' => 'kartik\grid\ActionColumn',
                    'width' => '50px',
                    'template' => '{ver}',
                    'header' => 'Ver',
                    'buttons' => [
                        'ver' => function ($url, $dataProviderInscrito) {
                            return Html::button('<i class="fas fa-eye"></i>', 
                            ['value'=>Url::to(['/user-management/user/view','id'=>  $dataProviderInscrito->fk_inscrito]),
                            'class' => 'btn btn-outline-primary btn-sm custom_button'
                            ]);
                            },
                    ],
                ],
                /* [
                    'class' => 'kartik\grid\ActionColumn',
                    'width' => '50px',
                    'template' => '{inscritos}',
                    'header' => 'Inscritos',
                    'buttons' => [
                        'inscritos' => function ($url, $dataProviderInscrito) {
                            return Html::a('<i class="fas fa-user-check"></i>', ['/cursoinscrito/curso-inscrito','ID'=>  $dataProviderInscrito->ID], ['class' => 'btn btn-outline-primary btn-sm']);
                            
                        },
                    ],
                ], */
                /* [
                    'class' => 'kartik\grid\ActionColumn',
                    'template' => '{actualizar}',
                    'header' => 'Modificar',
                    'buttons' => [
                        'actualizar' => function ($url, $dataProviderInscrito) {
                        return Html::button('<i class="fa fa-fw fa-pen"></i></span>', 
                        ['value'=>Url::to(['/curso/update','ID'=>  $dataProviderInscrito->ID]),
                        'class' => 'btn btn-outline-primary btn-sm custom_button'
                        ]);
                        },
                    ],
                ], */
                [
                    'class' => 'kartik\grid\ActionColumn',
                    'width' => '50px',
                    'template' => '{borrar}',
                    'header' => 'Eliminar',
                    'buttons' => [
                        'borrar' => function ($url, $dataProviderInscrito) {
                            return Html::a('<i class="fa fa-fw fa-trash"></i>', ['remover-asignado', 'ID' => $dataProviderInscrito->ID, 'IDCurso' => $dataProviderInscrito->fk_curso], [
                                'class' => 'btn btn-outline-primary btn-sm',
                                'data' => [
                                    'confirm' => Yii::t('app', 'Seguro de borrar este registro?'),
                                    'method' => 'post',
                                ],
                            ]);
                        },
                    ],
                ],
            ]
        ?>
        <br>
        <br>
        <?= GridView::widget([
        'dataProvider' => $dataProviderInscrito,
        'filterModel' => $searchModelInscrito,
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
            'heading'=>'<h3 style="color:white;text-align:center">Usuarios inscritos</h3>',
            'type'=>'primary',
            //'footer'=>false,
            'before'=>false,
                ],
        'summary'=>false,
        'pjaxSettings' =>[
            'neverTimeout'=>false,
            'options'=>[
                    'id'=>'pjax_cursos',
                ]
            ],
        'pjax' => false,
        ]); ?>

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