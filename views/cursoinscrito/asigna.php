<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Cursoinscrito $model */

$this->title = 'Asignar Usuario';
$this->params['breadcrumbs'][] = ['label' => 'Cursoinscritos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cursoinscrito-create">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_asignar', [
        'searchModelUsers' => $searchModelUsers,
        'dataProviderUsers' => $dataProviderUsers,
    ]) ?>

</div>
