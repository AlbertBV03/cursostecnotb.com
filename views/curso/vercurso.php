<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use webvimark\modules\UserManagement\models\User;

/** @var yii\web\View $this */
/** @var app\models\Curso $model */

$this->title = $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Cursos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="curso-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php if (User::hasRole('tutor') || User::hasRole('Administrador')): ?>

    <p>
        <?= Html::a('Update', ['update', 'ID' => $model->ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'ID' => $model->ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?php endif; ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'ID',
            //'portada',
            [
                'attribute'=>'portada', 
                'label'=>'Portada actual:',
                'format'=>'html',
                'value'=> function ($data){
                    return Html::img($data->getImageUrl(),
                    ['width' => '200px']);
                }, 
            ],
            'codigo',
            'nombre',
            'detalle:ntext',
            'costo',
            'inicio',
            'fin',
            //'fk_revisor',
            [
                'attribute'=>'fk_revisor', 
                'label'=>'Revisor:',
                'format'=>'raw',
                'value'=> $model->fkRevisor->username, 
                'valueColOptions'=>['style'=>'width:30%']
            ],
            //'fk_tipo',
            [
                'attribute'=>'fk_tipo', 
                'label'=>'Tipo de curso:',
                'format'=>'raw',
                'value'=> $model->fkTipo->nombre, 
                'valueColOptions'=>['style'=>'width:30%']
            ],
            //'fk_categoria',
            [
                'attribute'=>'fk_categoria', 
                'label'=>'Tipo de categoría:',
                'format'=>'raw',
                'value'=> $model->fkTipo->nombre, 
                'valueColOptions'=>['style'=>'width:30%']
            ],
            //'visitas',
            //'votos',
            //'like',
            //'dislike',
            'status',
            //'created_at',
            //'updated_at',
            [
                'attribute'=>'created_at', 
                'label' => 'Se creó el:',
                'format'=>'dateTime',
                'widgetOptions' => [
                    'pluginOptions'=>['format'=>'Y-m-d H:i:s']
                ],
                'valueColOptions'=>['style'=>'width:30%']
            ],
            [
                'attribute'=>'updated_at', 
                'label' => 'Se modificó el:',
                'format'=>'dateTime',
                'widgetOptions' => [
                    'pluginOptions'=>['format'=>'Y-m-d H:i:s']
                ],
                'valueColOptions'=>['style'=>'width:30%']
            ],
            'fkUser',
            [
                'attribute'=>'fkUser', 
                'label'=>'Usuario que creó:',
                'format'=>'raw',
                'value'=> $model->fkUser0->username, 
                'valueColOptions'=>['style'=>'width:30%']
            ],
        ],
    ]) ?>

</div>
