<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Examen $model */

$this->title = $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Examens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="examen-view">

    <p>
        <!-- <?= Html::a('Update', ['update', 'ID' => $model->ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'ID' => $model->ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?> -->
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID',
            [
                'attribute' => 'nombre',
                'header' => 'Nombre',
                'vAlign' => 'middle',
                'value' => function ($model) {
                    return $model->nombre;
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
            [
                'attribute' => 'fk_curso',
                'header' => 'Curso',
                'vAlign' => 'middle',
                'value' => function ($model) {
                    return $model->fkCurso->nombre;
                }
            ],
        ],
    ]) ?>

</div>
