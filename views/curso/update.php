<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Curso $model */

$this->title = 'Update Curso: ' . $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Cursos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'ID' => $model->ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="curso-update">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
        'estatus' => $estatus,
        'tutores' => $tutores,
    ]) ?>

</div>
