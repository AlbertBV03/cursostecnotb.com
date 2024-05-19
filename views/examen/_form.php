<?php

use app\models\Curso;
use yii\helpers\Html;
use kartik\select2\Select2;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var app\models\Examen $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="examen-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fk_curso')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Curso::find()->all(), 'ID', 'nombre'),
        'options' => ['placeholder' => ''],
        'pluginOptions' => [
            'allowClear' => true,
            'dropdownParent' => '#movi-modal',
        ],
    ]); ?>

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
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
