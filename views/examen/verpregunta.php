<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Pregunta $model */

$this->title = $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Preguntas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pregunta-view">

<?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID',
            [
                'attribute' => 'contenido',
                'header' => 'Contenido',
                'vAlign' => 'middle',
                'value' => function ($model) {
                    return $model->contenido;
                }
            ],
            [
                'attribute' => 'respuesta',
                'header' => 'Respuesta',
                'vAlign' => 'middle',
                'value' => function ($model) {
                    return $model->respuesta;
                }
            ],
            [
                'attribute' => 'status',
                'header' => 'Estado',
                'value' => function ($model) {
                    if ($model->status == 1) {
                        return 'Vigente';
                    } elseif ($model->status == 0) {
                        return 'No Vigente';
                    } elseif ($model->status == 2) {
                        return 'Sin Asignar';
                    } 
                    else {
                        return 'Sin registro';
                    }
                },
            ],
        ],
    ]) ?>

</div>
