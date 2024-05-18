<?php

use app\models\Actividades;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap5\Modal;
use webvimark\modules\UserManagement\models\User;

/** @var yii\web\View $this */
/** @var app\models\ActividadesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Agenda de Actividades Pendientes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h1><?= Html::encode($this->title) ?></h1>
                </div>
                <div class="actividades-index">
                    <div class="card-body">

                            <p>
                            <?php if(User::hasRole('superadmin') || User::hasRole('Coordinador') || User::hasRole('Administrador')):

                                            echo Html::button('<i class="fa fa-plus"></i>', 
                                            ['value'=>Url::to(['actividades/consultar']),
                                                            'class' => 'btn btn-outline-primary btn-sm','id'=>'modalButton']); 
                                    endif; ?>
                            </p>
                            <?php
                                Modal::begin([
                                    'title' =>'<h4>Consultar mes</h4>',
                                    'id'     =>'movi-modal',
                                    'size'   =>'modal-lg',
                                    'clientOptions' => ['backdrop' => 'static', 'keyboard' => FALSE]
                                    ]);
                                    echo "<div id='movi-modalContent'> </div>";
                                Modal::end();
                            ?>

                    </div>
                </div>
            </div>
        </div>
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