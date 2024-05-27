<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use webvimark\modules\UserManagement\models\User;

/** @var yii\web\View $this */
/** @var app\models\Curso $model */

$this->title = $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Cursos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="curso-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
    <?php if (User::hasRole('tutor') || User::hasRole('Administrador')): ?>
        <?= Html::a('Update', ['update', 'ID' => $model->ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'ID' => $model->ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ;
        endif; ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID',
            'codigo',
            'portada',
            'nombre',
            'detalle:ntext',
            'costo',
            'inicio',
            'fin',
            'fk_revisor',
            'fk_tipo',
            'fk_categoria',
            'visitas',
            'votos',
            'like',
            'dislike',
            'status',
            'created_at',
            'updated_at',
            'fkUser',
        ],
    ]) ?>

</div>
