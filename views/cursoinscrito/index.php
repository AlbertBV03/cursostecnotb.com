<?php

use app\models\Cursoinscrito;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\search\CursoinscritoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Cursoinscritos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cursoinscrito-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Cursoinscrito', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'fk_inscrito',
            'fk_curso',
            'status',
            'certificado',
            //'created_at',
            //'updated_at',
            //'fkUser',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Cursoinscrito $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'ID' => $model->ID]);
                 }
            ],
        ],
    ]); ?>


</div>
