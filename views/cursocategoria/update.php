<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Cursocategoria $model */

$this->title = 'Update Cursocategoria: ' . $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Cursocategorias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'ID' => $model->ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cursocategoria-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
