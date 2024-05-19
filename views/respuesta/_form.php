<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Respuesta $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="respuesta-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'respuesta')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'validado')->textInput() ?>

    <?= $form->field($model, 'fk_pregunta')->textInput() ?>

    <?= $form->field($model, 'fk_user')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
