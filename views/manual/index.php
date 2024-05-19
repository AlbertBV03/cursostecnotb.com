<?php

use app\models\Manual;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ManualSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Manuals';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="manual-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Manual', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'ID',
            'nombre:ntext',
            'descripcion:ntext',
            'requisitos:ntext',
            'objetivo:ntext',
            [
                'attribute' => 'imagen',
                'format' => 'html',
                'value' => function ($model) {
                    return Html::img(Url::to('@web/' . $model->imagen), ['width' => '100']);
                },
            ],
            // 'imagen',
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
                'urlCreator' => function ($action, Manual $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'ID' => $model->ID]);
                 }
            ],
        ],
    ]); ?>


</div>
