<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Cursomanual $model */

$this->title = $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Cursomanuals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="cursomanual-view">

    <h1><?= Html::encode($this->title) ?></h1>

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

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'ID',
            [
                'attribute' => 'fk_curso',
                'value' => function($model) {
                    return $model->fkCurso ? $model->fkCurso->nombre : null; // Asume que la columna de nombre en Curso es 'nombre'
                },
                'label' => 'Nombre del Curso',
            ],
            [
                'attribute' => 'fk_manual',
                'format' => 'raw',
                'value' => function($model) {
                    return $model->fkManual ? $model->fkManual->nombre : null; // Asume que la columna de nombre en Manual es 'nombre'
                },
                'label' => 'Nombre del Manual',
            ],
            //'fk_curso',
            //'fk_manual',
        ],
    ]) ?>

</div>
