<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Markdown;

/** @var yii\web\View $this */
/** @var app\models\Manual $model */

$this->title = $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Manuals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="container-fluid">
<div class="manual-view">

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
            <?= Html::a('Regresar al Catalogo', ['catalogo'], ['class' => 'btn btn-success']) ?>
            <?= Html::a('Regresar al Catalogo cursos', ['catalogocursos'], ['class' => 'btn btn-success']) ?>

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'ID',
            [
                'attribute' => 'nombre',
                'format' => 'raw',
                'value' => function ($model) {
                    return Markdown::process($model->nombre);
                },
            ],
            [
                'attribute' => 'descripcion',
                'format' => 'raw',
                'value' => function ($model) {
                    return Markdown::process($model->descripcion);
                },
            ],
            [
                'attribute' => 'requisitos',
                'format' => 'raw',
                'value' => function ($model) {
                    return Markdown::process($model->requisitos);
                },
            ],
            [
                'attribute' => 'objetivo',
                'format' => 'raw',
                'value' => function ($model) {
                    return Markdown::process($model->objetivo);
                },
            ],
            [
                'attribute' => 'imagen',
                'format' => 'html',
                'value' => function ($model) {
                    return Html::img(Url::to('@web/' . $model->imagen), ['width' => '100']);
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
            [
                'attribute' => 'fk_curso',
                'format' => 'raw',
                'value' => function($model) {
                    return $model->fkCurso ? $model->fkCurso->nombre : null; // Asume que la columna de nombre en Manual es 'nombre'
                },
                'label' => 'Nombre del Curso perteneciente',
            ],
        ],
    ]) ?>

</div>
</div>
