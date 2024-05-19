<?php

use app\models\Manualdetalle;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ManualdetalleSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Manualdetalles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="manualdetalle-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Manualdetalle', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'ID',
            //'fk_manual',
            [
                'attribute' => 'fk_manual',
                'value' => function($model) {
                    return $model->fkManual ? $model->fkManual->nombre : null; // Asume que la columna de nombre en Manual es 'nombre'
                },
                'label' => 'Nombre del Manual',
            ],
            'titulo:ntext',
            'contenido:ntext',
            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function ($model) {
                    $colorClass = $model->status == 1 ? 'badge-success' : 'badge-danger';
                    $statusText = $model->status == 1 ? 'Activo' : 'Inactivo';
                    return '<span class="badge ' . $colorClass . '">' . $statusText . '</span>';
                },
            ],
            //'status',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Manualdetalle $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'ID' => $model->ID]);
                 }
            ],
        ],
    ]); ?>


</div>
