<?php

use webvimark\modules\UserManagement\models\User;
use webvimark\modules\UserManagement\UserManagementModule;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use kartik\select2\Select2;
use kartik\date\DatePicker;
use webvimark\extensions\BootstrapSwitch\BootstrapSwitch;
use kartik\file\FileInput;
//use app\components\listarPerfil;

/**
 * @var yii\web\View $this
 * @var webvimark\modules\UserManagement\models\User $model
 * @var yii\bootstrap\ActiveForm $form
 */
?>
<div class="container fluid">
 <!-- ====================================
        ——— CONTENT WRAPPER
        ===================================== -->

<div class="row">
  <div class="col-xl-3">
    <!--  -->
    <div class="card card-default">
      <div class="card-header">
        <h2>Settings</h2>
      </div>

      <div class="card-body pt-0">
        <ul class="nav nav-settings">
          <li class="nav-item">
            <a class="nav-link active" href="/perfil/index">
              <i class="mdi mdi-account-outline mr-1"></i> Perfil
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/perfil/editar">
              <i class="mdi mdi-settings-outline mr-1"></i> Editar Perfil
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="col-xl-9">
    <div class="card card-default">
            <div class="card-header">
                <h2>Editar Perfil</h2>
            </div>
            <div class="card-body">
                <ul class="list-unstyled">
                    <li class="mb-3">
                        <span class="fw-medium">Nombre Completo:</span>
                        <span><?= Html::encode($Datospersonales->nombre) ?></span>
                    </li>
                    <li class="mb-3">
                        <span class="fw-medium">Correo Electrónico:</span>
                        <span><?= Html::encode($user->email) ?></span>
                    </li>
                    <li class="mb-3">
                        <span class="fw-medium">Teléfono:</span>
                        <span><?= Html::encode($Datospersonales->telefono) ?></span>
                    </li>
                    <li class="mb-3">
                        <span class="fw-medium">Puesto:</span>
                        <?php
                        if ($Datospersonales->rol == null) {
                            echo '<span>Sin rol asignado</span>';
                        } else {
                            echo '<span>' . Html::encode($Datospersonales->rol) . '</span>';
                        }
                        ?>
                    </li>
                </ul>
            </div>
    </div>
</div>
