<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Manual $model */

$this->title = 'Create Manual';
$this->params['breadcrumbs'][] = ['label' => 'Manuals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container-fluid">
<div class="manual-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
