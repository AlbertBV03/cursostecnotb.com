<?php

use yii\helpers\Html;
use kartik\widgets\Select2;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Pregunta $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pregunta-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'contenido')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'respuesta')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status')->widget(Select2::classname(), [
        'data' => [
            '1' => 'Activo',
            '0' => 'Inactivo',
            '2' => 'Sin Asignar',
        ],
        'hideSearch' => true,
        'options' => ['placeholder' => ''],
        'pluginOptions' => [
            'allowClear' => true,
            'dropdownParent' => '#movi-modal',
        ],
    ]); ?>

    <!-- <?= $form->field($model, 'fk_examen')->textInput() ?> -->

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
