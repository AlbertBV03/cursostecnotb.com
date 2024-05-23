<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Manualdetalle $model */

$this->title = 'Update Manualdetalle: ' . $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Manualdetalles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'ID' => $model->ID]];
$this->params['breadcrumbs'][] = 'Update';
?>

<div class="container-fluid">
<div class="manualdetalle-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
