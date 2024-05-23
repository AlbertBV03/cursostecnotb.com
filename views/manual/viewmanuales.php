<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Markdown;

/** @var yii\web\View $this */
/** @var app\models\Manual $model */

$this->params['breadcrumbs'][] = ['label' => 'Manuals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="container-fluid">
<div class="manual-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <div>
        <?= Markdown::process($model->nombre) ?>
    </div>
    <div>
        <?= Markdown::process($model->descripcion) ?>
    </div>
    <div>
        <?= Markdown::process($model->requisitos) ?>
    </div>
    <div>
        <?= Markdown::process($model->objetivo) ?>
    </div>
    <div>
        <?= Html::img(Url::to('@web/' . $model->imagen), ['width' => '700']) ?>
    </div>


</div>
</div>
