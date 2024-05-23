<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\Markdown;

/** @var yii\web\View $this */
/** @var app\models\Manual $model */

$this->title = $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Manuals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="container-fluid">
<div class="manualdetalle-view">

    <div>
        <?= Markdown::process($model->titulo) ?>
    </div>
    <div>
        <?= Markdown::process($model->contenido) ?>
    </div>

</div>
</div>
