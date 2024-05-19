<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Pregunta $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pregunta-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'contenido')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'respuesta')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'fk_examen')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
