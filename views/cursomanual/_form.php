<?php

use app\models\Curso;
use yii\helpers\Html;
use app\models\Manual;
use kartik\select2\Select2;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var app\models\Cursomanual $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="cursomanual-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- <#?= $form->field($model, 'ID')->textInput() ?> -->

    <?= $form->field($model, 'fk_curso')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Curso::find()->all(), 'ID', 'nombre'),
        'options' => ['placeholder' => 'Selecciona Manual ...'],
        'pluginOptions' => [
        ],
    ]); ?>

    <!-- <#?= $form->field($model, 'fk_curso')->textInput() ?> -->

    <?= $form->field($model, 'fk_manual')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Manual::find()->all(), 'ID', 'nombre'),
        'options' => ['placeholder' => 'Selecciona Manual ...'],
        'pluginOptions' => [
        ],
    ]); ?>

    <!-- <#?= $form->field($model, 'fk_manual')->textInput() ?> -->

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
