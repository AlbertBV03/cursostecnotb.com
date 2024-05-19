<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Cursotipo $model */

$this->title = 'Update Cursotipo: ' . $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Cursotipos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'ID' => $model->ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cursotipo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
