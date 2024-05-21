<?php

use app\models\Curso;
use yii\helpers\Html;
use yii\web\JsExpression;
use kartik\select2\Select2;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\editors\Summernote;

/** @var yii\web\View $this */
/** @var app\models\Manual $model */
/** @var yii\widgets\ActiveForm $form */
?>
<div class="container">
<div class="manual-form">

    <style>
        .manual-form .form-group {
            margin-bottom: 20px;
        }
        
        /* Remover margenes y padding extras de Summernote */
        .manual-form .field-manual-nombre,
        .manual-form .field-manual-descripcion,
        .manual-form .field-manual-requisitos,
        .manual-form .field-manual-objetivo {
            margin-bottom: 350px;
        }
    </style>

    <?php $form = ActiveForm::begin(); ?>

    <!-- <#?= $form->field($model, 'ID')->textInput() ?> -->

    <div class="form-group field-manual-nombre">
        <?= $form->field($model, 'nombre')->widget(Summernote::class, [
            'useKrajeePresets' => true,
            // other widget settings
        ]); ?>
    </div>

    <div class="form-group field-manual-descripcion">
        <?= $form->field($model, 'descripcion')->widget(Summernote::class, [
            'useKrajeePresets' => true,
            // other widget settings
        ]); ?>
    </div>

    <div class="form-group field-manual-requisitos">
        <?= $form->field($model, 'requisitos')->widget(Summernote::class, [
            'useKrajeePresets' => true,
            // other widget settings
        ]); ?>
    </div>

    <div class="form-group field-manual-objetivo">
        <?= $form->field($model, 'objetivo')->widget(Summernote::class, [
            'useKrajeePresets' => true,
            // other widget settings
        ]); ?>
    </div>

    <div class="form-group field-manual-imagen">
        <?= $form->field($model, 'imagen')->fileInput(['class' => 'form-control', 'id' => 'formFile']) ?>
    </div>

    <div class="form-group field-manual-status">
        <?= $form->field($model, 'status')->widget(Select2::classname(), [
            'data' => [
                '1' => 'Activo',
                '2' => 'Inactivo',
            ],
            'options' => ['placeholder' => 'Selecciona un estado ...'],
            'pluginOptions' => [
                'allowClear' => true,
            ],
        ]); ?>
    </div>

    <div class="form-group field-manual-fk_curso">
        <?= $form->field($model, 'fk_curso')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(Curso::find()->all(), 'ID', 'nombre'),
            'options' => ['placeholder' => 'Selecciona Curso ...'],
            'pluginOptions' => [
                'allowClear' => true,
                'escapeMarkup' => new JsExpression('function(markup) { return markup; }'),
            ],
        ]); ?>
    </div>

    <!-- <#?= $form->field($model, 'nombre')->textarea(['rows' => 6]) ?> -->
    <!-- <#?= $form->field($model, 'descripcion')->textarea(['rows' => 6]) ?> -->
    <!-- <#?= $form->field($model, 'requisitos')->textarea(['rows' => 6]) ?> -->
    <!-- <#?= $form->field($model, 'objetivo')->textarea(['rows' => 6]) ?> -->
    <!-- <#?= $form->field($model, 'imagen')->textInput() ?> -->
    <!-- <#?= $form->field($model, 'status')->textInput() ?> -->

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
