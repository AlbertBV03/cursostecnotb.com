<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Pregunta $model */

$this->title = 'Create Pregunta';
$this->params['breadcrumbs'][] = ['label' => 'Preguntas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pregunta-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
