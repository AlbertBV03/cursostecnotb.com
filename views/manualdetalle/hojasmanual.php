<?php

use yii\helpers\Html;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Markdown;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var app\models\ManualdetalleSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var int $ID */

$this->title = 'Manualdetalles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid">
    <div class="manualdetalle-index">

        <h1><?= Html::encode($this->title) ?></h1>

        <p>
            <?= Html::a('Regresar al Catalogo', ['cursoinscrito/mis-cursos'], ['class' => 'btn btn-success']) ?>
        </p>

        <div class="row">
            <?php if (!empty($dataProvider->models)): ?>
                <?php foreach ($dataProvider->models as $model): ?>
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <!-- Aquí deberías incluir la imagen si la tienes -->
                            <div class="card-body">
                                <h5 class="card-title"><?= Markdown::process($model->fkManual->nombre) ?></h5>
                                <p class="card-text"><?= Markdown::process($model->titulo) ?></p>
                                <?= Html::a('Ver', ['manualdetalle/viewhojas', 'ID' => $model->ID], ['class' => 'btn btn-sm btn-outline-secondary']) ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12">
                    <div class="alert alert-warning" role="alert">
                        No hay hojas en este manual.
                    </div>
                </div>
            <?php endif; ?>
        </div>

    </div>
</div>
