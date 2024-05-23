<?php

use app\models\Curso;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\search\CursoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Cursos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="curso-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Curso', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('<i class="fa fa-hand-point-left"></i> Regresar', ['/curso/index'], ['class' => 'btn btn-info btn-sm']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'codigo',
            'portada',
            'nombre',
            'detalle:ntext',
            //'costo',
            //'inicio',
            //'fin',
            //'fk_revisor',
            //'fk_tipo',
            //'fk_categoria',
            //'visitas',
            //'votos',
            //'like',
            //'dislike',
            //'status',
            //'created_at',
            //'updated_at',
            //'fkUser',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Curso $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'ID' => $model->ID]);
                 }
            ],
        ],
    ]); ?>


</div>
