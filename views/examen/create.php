<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Examen $model */

$this->title = 'Create Examen';
$this->params['breadcrumbs'][] = ['label' => 'Examens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="examen-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
