<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Usuarioexamen $model */

$this->title = 'Create Usuarioexamen';
$this->params['breadcrumbs'][] = ['label' => 'Usuarioexamens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuarioexamen-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
