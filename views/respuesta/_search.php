<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\RespuestaSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="respuesta-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'respuesta') ?>

    <?= $form->field($model, 'validado') ?>

    <?= $form->field($model, 'fk_pregunta') ?>

    <?= $form->field($model, 'fk_user') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
