<?php

use yii\helpers\Html;
use app\models\Manual;
use yii\web\JsExpression;
use kartik\select2\Select2;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\editors\Summernote;

/** @var yii\web\View $this */
/** @var app\models\Manualdetalle $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="manualdetalle-form">
    
    <style>
        .manualdetalle-form .form-group {
            margin-bottom: 20px;
        }
        
        /* Remover margenes y padding extras de Summernote */
        .manualdetalle-form .field-manualdetalle-titulo,
        .manualdetalle-form .field-manualdetalle-contenido {
            margin-bottom: 350px;
        }
    </style>

    <?php $form = ActiveForm::begin(); ?>

    <!-- <#?= $form->field($model, 'ID')->textInput() ?> -->

    <div class="form-group field-manualdetalle-fkmanual">
    <?= $form->field($model, 'fk_manual')->widget(Select2::classname(), [
    'data' => ArrayHelper::map(Manual::find()->all(), 'ID', 'nombreMarkdown'),
    'options' => ['placeholder' => 'Selecciona Manual ...'],
    'pluginOptions' => [
        'escapeMarkup' => new JsExpression('function(markup) { return markup; }'),
    ],
    ]); ?>


    </div>

    <!-- <#?= $form->field($model, 'fk_manual')->textInput() ?> -->

    <!-- <#?= $form->field($model, 'titulo')->textarea(['rows' => 6]) ?> -->

    <!-- <#?= $form->field($model, 'contenido')->textarea(['rows' => 6]) ?> -->

    <div class="form-group field-manualdetalle-titulo">
    <?= $form->field($model, 'titulo')->widget(Summernote::class, [
            'useKrajeePresets' => true,
            // other widget settings
        ]); ?>
    </div>

    <div class="form-group field-manualdetalle-contenido">
    <?= $form->field($model, 'contenido')->widget(Summernote::class, [
            'useKrajeePresets' => true,
            // other widget settings
        ]); ?>
    </div>

    <div class="form-group field-manualdetalle-status">
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

    <!-- <#?= $form->field($model, 'status')->textInput() ?> -->

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
