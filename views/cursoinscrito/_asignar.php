<?php
use yii\bootstrap4\Html;
use kartik\grid\GridView;

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
                                   'heading'=>'<p class="panel-title" style="font-size:.8em"><i class="glyphicon glyphicon-globe"></i>LISTA DE MANUALES</p>',
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