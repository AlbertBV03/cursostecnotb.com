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
<div class="container-fluid">
<div class="manual-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- <#?= $form->field($model, 'ID')->textInput() ?> -->

        <?= $form->field($model, 'nombre')->widget(Summernote::class, [
            'useKrajeePresets' => true,
            'container' => [
                'class' => 'kv-editor-container',
                ],
        ]); ?>

        <?= $form->field($model, 'descripcion')->widget(Summernote::class, [
            'useKrajeePresets' => true,
            'container' => [
                'class' => 'kv-editor-container',
                ],
        ]); ?>

        <?= $form->field($model, 'requisitos')->widget(Summernote::class, [
            'useKrajeePresets' => true,
            'container' => [
                'class' => 'kv-editor-container',
                ],
        ]); ?>

        <?= $form->field($model, 'objetivo')->widget(Summernote::class, [
            'useKrajeePresets' => true,
            'container' => [
                'class' => 'kv-editor-container',
                ],
        ]); ?>

        <?= $form->field($model, 'imagen')->fileInput(['class' => 'form-control', 'id' => 'formFile']) ?>

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
    <!-- <#?= $form->field($model, 'status')->textInput( ) ?> -->

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
