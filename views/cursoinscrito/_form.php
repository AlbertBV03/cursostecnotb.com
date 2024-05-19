<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Cursoinscrito $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="cursoinscrito-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fk_inscrito')->textInput() ?>

    <?= $form->field($model, 'fk_curso')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'certificado')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'fkUser')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
