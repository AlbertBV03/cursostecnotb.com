<?php

use yii\helpers\Html;
use app\models\Cursotipo;
use kartik\file\FileInput;
use kartik\date\DatePicker;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Cursocategoria;
use kartik\typeahead\TypeaheadBasic;

/** @var yii\web\View $this */
/** @var app\models\Curso $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="curso-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php
            if ($model->portada!='') {
                echo "<h1>Imagen actual</h1>";
                echo Html::img($model->getImageUrl(),['style'=>'width:50%']);
            }    
        ?>
    <?php echo $form->field($model, 'imageFile',
            [
                'template' => '
                    <div class="form-group col-lg-12">
                    <label class="form-label mb-1 text-2">Portada</label>
                        {input}
                    </div>
                    {error}',
                'inputOptions' => [
                    'placeholder' => 'Portada de colección',
                    'class'=>'form-control text-3 h-auto py-2',
                ]]
            
            )->widget(
                FileInput::classname(), [
            'options' => ['accept' => 'image/*'],
            'pluginOptions' => [
                'showPreview' => true,
                'showCaption' => true,
                'showRemove' => true,
                'showUpload' => false,
                'fileActionSettings'=>[
                    'showUpload' => false
                    ],
            ],
            ]); ?>

    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model, 'codigo',
             ['template' => '
             <label class="form-label mb-2 text-2"> Código</label>
                 {input}
             {error}',
             'inputOptions' => [
             'class'=>'form-control',
             'placeholder'=>'Ingrese el código del curso',
             ]] 
            )->textInput(['maxlength' => true]) ?>

        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'nombre',
             ['template' => '
             <label class="form-label mb-2 text-2"> Nombre</label>
                 {input}
             {error}',
             'inputOptions' => [
             'class'=>'form-control',
             'placeholder'=>'Ingrese nombre del curso',
             ]] 
            )->textInput(['maxlength' => true]) ?>

        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <?= $form->field($model, 'detalle',
             ['template' => '
             <label class="form-label mb-2 text-2"> Detalle</label>
                 {input}
             {error}',
             'inputOptions' => [
             'class'=>'form-control',
             'placeholder'=>'Ingrese el detalle del curso',
             ]] 
            )->textarea(['rows' => 6]) ?>

        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">

            <?= $form->field($model, 'inicio',
            ['template' => '
            <label class="form-label mb-2 text-5"> Fecha Apertura</label>
                {input}
            {error}',
            'inputOptions' => [
            'class'=>'form-control',
            ]] 
            
            )->widget(DatePicker::classname(), [
                'options' => ['placeholder' => 'Ingrese fecha inicio ...'],
                'pluginOptions' => [
                    'autoclose' => true,
                    'format'=> 'yyyy-mm-dd'
                ]
            ]); ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'fin',
                ['template' => '
                <label class="form-label mb-2 text-5"> Fecha Cierre</label>
                    {input}
                {error}',
                'inputOptions' => [
                'class'=>'form-control',
                ]] 
                
                )->widget(DatePicker::classname(), [
                    'options' => ['placeholder' => 'Ingrese fecha cierre ...'],
                    'pluginOptions' => [
                        'autoclose' => true,
                    'format'=> 'yyyy-mm-dd'
                    ]
                ]); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model, 'usuario',
             ['template' => '
             <label class="form-label mb-2 text-2"> Revisor</label>
                 {input}
             {error}',
             'inputOptions' => [
             'class'=>'form-control',
             'placeholder'=>'Ingrese el revisor de este curso',
             ]] 
             )->widget(TypeaheadBasic::classname(), [
                 'data' => $tutores,
                 'options' => ['placeholder' => 'Ingrese el revisor del curso',
                 'value' => $model->isNewRecord ? '' : $model->fkRevisor->username,
                 'autocomplete'=>'off'
             ],
                 'pluginOptions' => ['highlight'=>true],
                 ])?>  

        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'fk_tipo',
             ['template' => '
             <label class="form-label mb-2 text-2"> Tipo</label>
                 {input}
             {error}',
             'inputOptions' => [
             'class'=>'form-control',
             ]] 
             )->dropDownList(
                ArrayHelper::map(Cursotipo::find()->all(),
                'ID','nombre'),
                ['prompt'=>'Seleccione un tipo']); ?>

        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model, 'fk_categoria',
             ['template' => '
             <label class="form-label mb-2 text-2"> Categoría</label>
                 {input}
             {error}',
             'inputOptions' => [
             'class'=>'form-control',
             ]] 
             )->dropDownList(
                ArrayHelper::map(Cursocategoria::find()->all(),
                'ID','nombre'),
                ['prompt'=>'Seleccione una Categoría']); ?>

        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'costo',
             ['template' => '
             <label class="form-label mb-2 text-2"> Costo</label>
                 {input}
             {error}',
             'inputOptions' => [
             'class'=>'form-control',
             'placeholder'=>'Ingrese el costo del curso',
             'value' => 0,
             ]] 
            )->textInput(['maxlength' => true]) ?>

        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <?= $form->field($model,'status',
                [
                    'template' => '
                    <label class="form-label mb-1 text-2"> Estatus</label>
                    {input}
                    {error}',
                    'inputOptions' => [
                        'class' => 'form-select form-control h-auto',
                    ]
                ]
                )->dropDownList( $estatus,
                    ['prompt' => 'Seleccione un estatus']
                ); ?>
        </div>
    </div>
    <!-- <?= $form->field($model, 'visitas')->textInput() ?>

    <?= $form->field($model, 'votos')->textInput() ?>

    <?= $form->field($model, 'like')->textInput() ?>

    <?= $form->field($model, 'dislike')->textInput() ?> -->

    <!-- <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'fkUser')->textInput() ?> -->

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
