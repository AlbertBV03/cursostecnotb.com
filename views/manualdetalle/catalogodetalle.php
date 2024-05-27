<?php

use yii\helpers\Html;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Markdown;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var app\models\ManualdetalleSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Manualdetalles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid">
<div class="manualdetalle-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Manualdetalle', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Listado', ['index'], ['class' => 'btn btn-success']) ?>

    </p>

    <div class="row">
        <?php foreach ($dataProvider->models as $model): ?>
            <div class="col-md-4">
                <div class="card mb-4">
                    <!-- Aquí deberías incluir la imagen si la tienes -->
                    <div class="card-body">
                        <h5 class="card-title"><?= Markdown::process($model->fkManual->nombre) ?></h5>
                        <p class="card-text"><?= Markdown::process($model->titulo) ?></p>
                        <?= Html::a('Ver', ['view', 'ID' => $model->ID], ['class' => 'btn btn-primary']) ?>
                        <?= Html::a('Actualizar', ['update', 'ID' => $model->ID], ['class' => 'btn btn-secondary']) ?>
                        <?= Html::a('Eliminar', ['delete', 'ID' => $model->ID], [
                            'class' => 'btn btn-danger',
                            'data' => [
                                'confirm' => '¿Estás seguro que quieres eliminar este manualdetalle?',
                                'method' => 'post',
                            ],
                        ]) ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</div>
</div>
