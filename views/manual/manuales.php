<?php
use yii\helpers\Html;
use yii\helpers\Markdown;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $curso app\models\Curso */
/* @var $manuales app\models\Manual[] */

$this->title = 'Manuales del Curso: ' . $curso->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Cursos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid">
<div class="curso-manuales">
<br>
    <!-- <h1><?= Markdown::process($this->title) ?></h1> -->
    <p>
    <?= Html::a('<i class="fa fa-hand-point-left"></i> Regresar', ['/cursoinscrito/mis-cursos'], ['class' => 'btn btn-info btn-sm']) ?>
    </p><br>

    <div class="row row-cols-4">

        <?php foreach ($manuales as $manual): ?>
            <div class="card">
                <div class="card-body">
                <img src="<?= Yii::$app->request->baseUrl . '/' . $manual->imagen ?>" class="card-img-top img-fluid" style="max-width: 200px; max-height: 200px;" alt="...">
  
                        <h5 class="card-title"><?= Markdown::process($manual->nombre) ?></h5>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <?= Html::a('Ver', ['manual/viewmanuales', 'ID' => $manual->ID], ['class' => 'btn btn-sm btn-outline-secondary']) ?>
                                <!-- <?= Html::a('Editar', ['manual/update', 'ID' => $manual->ID], ['class' => 'btn btn-sm btn-outline-secondary']) ?>
                                <?= Html::a('Eliminar', ['manual/delete', 'ID' => $manual->ID], [
                                    'class' => 'btn btn-sm btn-outline-secondary',
                                    'data' => [
                                        'confirm' => '¿Estás seguro de eliminar este manual?',
                                        'method' => 'post',
                                    ],
                                ]) ?> -->
                            </div>
                        </div>
                
                </div>
            </div>
            
        <?php endforeach; ?>
    </div>
</div>
</div>
