<?php

use yii\helpers\Html;
use yii\helpers\Markdown;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Manualdetalle $model */

$this->title = $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Manualdetalles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="container-fluid">
<div class="manualdetalle-view">

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
        <?= Html::a('Regresar a Catalogo', ['catalogodetalle'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'ID',
            [
                'attribute' => 'fk_manual',
                'format' => 'raw',
                'value' => function($model) {
                    return $model->fkManual ? $model->fkManual->nombre : null; // Asume que la columna de nombre en Manual es 'nombre'
                },
                'label' => 'Nombre del Manual',
            ],
            //'titulo:ntext',
            //'contenido:ntext',
            [
                'attribute' => 'titulo',
                'format' => 'raw',
                'value' => function ($model) {
                    return Markdown::process($model->titulo);
                },
            ],
            [
                'attribute' => 'contenido',
                'format' => 'raw',
                'value' => function ($model) {
                    return Markdown::process($model->contenido);
                },
            ],
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
        ],
    ]) ?>

</div>
</div>
