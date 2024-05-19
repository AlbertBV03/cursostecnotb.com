<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Usuarioexamen $model */

$this->title = 'Update Usuarioexamen: ' . $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Usuarioexamens', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'ID' => $model->ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="usuarioexamen-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
