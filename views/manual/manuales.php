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
    <h1><?= Markdown::process($this->title) ?></h1>

    <?= Html::a('Regresar al Catalogo', ['catalogocursos'], ['class' => 'btn btn-success']) ?>
    <p></p>

    <div class="row">
        <?php foreach ($manuales as $manual): ?>
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                <img src="<?= Yii::$app->request->baseUrl . '/' . $manual->imagen ?>" class="card-img-top img-fluid" style="max-width: 200px; max-height: 200px;" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= Markdown::process($manual->nombre) ?></h5>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <?= Html::a('Ver', ['manual/viewmanuales', 'ID' => $manual->ID], ['class' => 'btn btn-sm btn-outline-secondary']) ?>
                                <?= Html::a('Editar', ['manual/update', 'ID' => $manual->ID], ['class' => 'btn btn-sm btn-outline-secondary']) ?>
                                <?= Html::a('Eliminar', ['manual/delete', 'ID' => $manual->ID], [
                                    'class' => 'btn btn-sm btn-outline-secondary',
                                    'data' => [
                                        'confirm' => '¿Estás seguro de eliminar este manual?',
                                        'method' => 'post',
                                    ],
                                ]) ?>
                                <?= Html::a('Ver Hojas', ['manualdetalle/hojasmanual', 'ID' => $manual->ID], ['class' => 'btn btn-sm btn-outline-secondary']) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</div>
</div>
