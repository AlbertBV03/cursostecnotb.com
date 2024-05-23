<?php

use app\models\Cursomanual;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\CursomanualSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Cursomanuals';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cursomanual-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Cursomanual', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'ID',
            //'fk_curso',
            [
                'attribute' => 'fk_curso',
                'value' => function($model) {
                    return $model->fkCurso ? $model->fkCurso->nombre : null; // Asume que la columna de nombre en Curso es 'nombre'
                },
                'label' => 'Nombre del Curso',
            ],
            //'fk_manual',
            [
                'attribute' => 'fk_manual',
                'format' => 'raw',
                'value' => function($model) {
                    return $model->fkManual ? $model->fkManual->nombre : null; // Asume que la columna de nombre en Manual es 'nombre'
                },
                'label' => 'Nombre del Manual',
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Cursomanual $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'ID' => $model->ID]);
                 }
            ],
        ],
    ]); ?>


</div>
