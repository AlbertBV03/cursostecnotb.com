<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Cursomanual $model */

$this->title = 'Update Cursomanual: ' . $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Cursomanuals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'ID' => $model->ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cursomanual-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
