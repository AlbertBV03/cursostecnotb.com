<?php

use yii\helpers\Html;
use app\models\Manual;
use kartik\select2\Select2;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var app\models\Manualdetalle $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="manualdetalle-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- <#?= $form->field($model, 'ID')->textInput() ?> -->

    <?= $form->field($model, 'fk_manual')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Manual::find()->all(), 'ID', 'nombre'),
        'options' => ['placeholder' => 'Selecciona Manual ...'],
        'pluginOptions' => [
        ],
    ]); ?>

    <!-- <#?= $form->field($model, 'fk_manual')->textInput() ?> -->

    <?= $form->field($model, 'titulo')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'contenido')->textarea(['rows' => 6]) ?>

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

    <!-- <#?= $form->field($model, 'status')->textInput() ?> -->

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
