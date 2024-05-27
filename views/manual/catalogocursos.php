<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CursomanualSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Catálogo de Cursos';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container-fluid">
<div class="curso-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="row">
        <?php foreach ($dataProvider->models as $cursoManual): ?>
            <?php $curso = $cursoManual; ?>
            <div class="col-md-4">
                <div class="card mb-4">
                    <?php if ($curso->portada): ?>
                        <img class="card-img-top" src="<?= $curso->getImageUrl() ?>" alt="<?= Html::encode($curso->nombre) ?>">
                    <?php endif; ?>
                    <div class="card-body">
                        <h5 class="card-title"><?= Html::encode($curso->nombre) ?></h5>
                        <p class="card-text"><?= Html::encode($curso->detalle) ?></p>
                        <a href="<?= Url::to(['manual/manuales', 'ID' => $curso->ID]) ?>" class="btn btn-primary">Ver Manuales</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</div>
