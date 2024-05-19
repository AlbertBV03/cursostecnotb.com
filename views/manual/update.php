<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Manual $model */

$this->title = 'Update Manual: ' . $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Manuals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'ID' => $model->ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="manual-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
