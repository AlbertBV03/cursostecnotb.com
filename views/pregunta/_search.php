<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\PreguntaSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pregunta-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'contenido') ?>

    <?= $form->field($model, 'respuesta') ?>

    <?= $form->field($model, 'status') ?>

    <?= $form->field($model, 'fk_examen') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
