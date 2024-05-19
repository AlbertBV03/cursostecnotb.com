<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Cursoinscrito $model */

$this->title = 'Update Cursoinscrito: ' . $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Cursoinscritos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'ID' => $model->ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cursoinscrito-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
