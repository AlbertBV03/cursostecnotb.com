<?php

use yii\helpers\Url;
use app\models\Curso;
use yii\helpers\Html;
use yii\widgets\Pjax;
use kartik\grid\GridView;
use yii\bootstrap5\Modal;
use yii\grid\ActionColumn;

/** @var yii\web\View $this */
/** @var app\models\search\CursoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Cursos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid">
    <div class="curso-index">

        <h1><?= Html::encode($this->title) ?></h1><br>

        <p>
            <?php 
            echo Html::button('<i class="fa fa-plus"></i> Crear Colección', 
            ['value'=>Url::to(['/curso/create']),
                            'class' => 'btn btn-outline-primary btn-sm','id'=>'modalButton']) 
            ?>
            <?= Html::a('Listado', ['listado'], ['class' => 'btn btn-success']) ?>
        </p>
        <br>
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
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <?php

            $gridColumns = [
                //['class' => 'yii\grid\SerialColumn'],
                /* [
                    'class'=>'yii\grid\SerialColumn',
                    'header'=>'Num',
                    'contentOptions'=>['style'=>'width:10px;vertical-align:middle;text-align:center;'],
                ], */
                [
                    'attribute' => 'codigo',
                    'header' => 'Coódigo:',
                    'vAlign' => 'middle',
                    'format'=>'raw',
                ],
                [
                    'attribute' => 'nombre',
                    'header' => 'Nombre:',
                    'vAlign' => 'middle',
                    'format'=>'raw',
                ],
                [
                    'attribute' => 'inicio',
                    'header' => 'Inicia el:',
                    'vAlign' => 'middle',
                    'content' => function ($model) {
                        return Yii::$app->formatter->asDate($model->created_at, 'long');
                    }
                ],
                [
                    'attribute' => 'fin',
                    'header' => 'Concluye el:',
                    'vAlign' => 'middle',
                    'content' => function ($model) {
                        return Yii::$app->formatter->asDate($model->updated_at, 'long');
                    }
                ],
                [
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
                    'width' => '50px',
                    'template' => '{ver}',
                    'header' => 'Ver',
                    'buttons' => [
                        'ver' => function ($url, $dataProvider) {
                            return Html::a('<i class="fas fa-eye"></i>', ['curso','ID'=>  $dataProvider->ID], ['class' => 'btn btn-outline-primary btn-sm']);
                            
                        },
                    ],
                ],
                [
                    'class' => 'kartik\grid\ActionColumn',
                    'template' => '{actualizar}',
                    'header' => 'Modificar',
                    'buttons' => [
                        'actualizar' => function ($url, $dataProvider) {
                        return Html::button('<i class="fa fa-fw fa-pen"></i></span>', 
                        ['value'=>Url::to(['/curso/update','ID'=>  $dataProvider->ID]),
                        'class' => 'btn btn-outline-primary btn-sm custom_button'
                        ]);
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
            'heading'=>'<h3 style="color:white;text-align:center">Cursos</h3>',
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