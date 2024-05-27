<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use webvimark\modules\UserManagement\models\User;

/* @var $this yii\web\View */
/* @var $model app\models\Cursoinscrito */

$this->title = $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Cursoinscritos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="cursoinscrito-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php if (User::hasRole('tutor') || User::hasRole('Administrador')): ?>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?php endif ; ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID',
            'fk_inscrito',
            'fk_curso',
            'status',
            'certificado',
            'created_at',
            'updated_at',
            'fkUser',
            'fk_telefono',
        ],
    ]) ?>

</div>
