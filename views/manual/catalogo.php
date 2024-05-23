<?php

use yii\helpers\Url;
use yii\helpers\Html;
use app\models\Manual;
use yii\helpers\Markdown;
use yii\grid\ActionColumn;

/** @var yii\web\View $this */
/** @var app\models\ManualSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Catálogo de Manuales';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container-fluid">
<div class="catalogo">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Manual', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Listado', ['index'], ['class' => 'btn btn-primary']) ?>
    </p>

    <div class="row">
        <?php foreach ($dataProvider->models as $model): ?>
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="<?= Yii::$app->request->baseUrl . '/' . $model->imagen ?>" class="card-img-top img-fluid" style="max-width: 200px; max-height: 200px;" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= Markdown::process($model->nombre) ?></h5>
                        <p class="card-text"><?= Markdown::process($model->descripcion) ?></p>
                        <a href="<?= Url::to(['view', 'ID' => $model->ID]) ?>" class="btn btn-primary">Ver</a>
                        <a href="<?= Url::to(['update', 'ID' => $model->ID]) ?>" class="btn btn-secondary">Actualizar</a>
                        <?= Html::a('Eliminar', ['delete', 'ID' => $model->ID], [
                            'class' => 'btn btn-danger',
                            'data' => [
                                'confirm' => '¿Estás seguro que quieres eliminar este manual?',
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



