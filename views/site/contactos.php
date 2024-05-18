<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\ContactForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\captcha\Captcha;
use app\components\listarContactos;

$this->title = 'Usuarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-wrapper">
  <div class="content"><div class="card card-default">
    <div class="card-header align-items-center px-3 px-md-5">
      <h2>Usuarios</h2>
    </div>
    <div class="card-body px-3 px-md-5">
    <div class="row">
      <?php echo listarContactos::widget(); ?>
    </div>
    </div>
  </div>
</div>
