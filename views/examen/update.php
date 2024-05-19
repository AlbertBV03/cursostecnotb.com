<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Examen $model */

$this->title = 'Update Examen: ' . $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Examens', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'ID' => $model->ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="examen-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
