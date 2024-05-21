<?php

use app\models\Actividades;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap4\Modal;
use webvimark\modules\UserManagement\models\User;

/** @var yii\web\View $this */
/** @var app\models\ActividadesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Bienvenido a cursotecnotb';
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