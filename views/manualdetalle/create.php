<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Manualdetalle $model */

$this->title = 'Create Manualdetalle';
$this->params['breadcrumbs'][] = ['label' => 'Manualdetalles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid">
<div class="manualdetalle-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
