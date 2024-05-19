<?php

use yii\helpers\Html;
use kartik\select2\Select2;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Manual $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="manual-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- <=?= $form->field($model, 'ID')->textInput() ?> -->

    <!-- <=?= $form->field($model, 'nombre')->widget(Summernote::class, [
    'useKrajeePresets' => true,
    // other widget settings
    ]);
    ?> -->

    <?= $form->field($model, 'nombre')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'descripcion')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'requisitos')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'objetivo')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'imagen')->fileInput(['class' => 'form-control', 'id' => 'formFile']) ?>

    <!-- <#?= $form->field($model, 'imagen')->textInput() ?> -->

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

    <!-- <=?= $form->field($model, 'status')->textInput() ?> -->

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
