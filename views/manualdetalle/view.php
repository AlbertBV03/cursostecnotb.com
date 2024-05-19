<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Manualdetalle $model */

$this->title = $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Manualdetalles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
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
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID',
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
        ],
    ]) ?>

</div>
