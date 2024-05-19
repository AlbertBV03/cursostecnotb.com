<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\search\CursoSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="curso-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'codigo') ?>

    <?= $form->field($model, 'portada') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'detalle') ?>

    <?php // echo $form->field($model, 'costo') ?>

    <?php // echo $form->field($model, 'inicio') ?>

    <?php // echo $form->field($model, 'fin') ?>

    <?php // echo $form->field($model, 'fk_revisor') ?>

    <?php // echo $form->field($model, 'fk_tipo') ?>

    <?php // echo $form->field($model, 'fk_categoria') ?>

    <?php // echo $form->field($model, 'visitas') ?>

    <?php // echo $form->field($model, 'votos') ?>

    <?php // echo $form->field($model, 'like') ?>

    <?php // echo $form->field($model, 'dislike') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'fkUser') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
