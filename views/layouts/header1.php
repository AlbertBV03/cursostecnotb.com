<?php 
use webvimark\modules\UserManagement\models\User;
?>
<!-- ====================================
          ——— LEFT SIDEBAR WITH OUT FOOTER
        ===================================== -->
<aside class="left-sidebar sidebar-dark" id="left-sidebar">
          <div id="sidebar" class="sidebar sidebar-with-footer">
            <!-- Aplication Brand -->
            <div class="app-brand">
              <a href="/site/index">
                <img src="/images/sgm.jpg" alt="SOGEMEX" height="50" width="">
                <!-- <span class="brand-name">SOGEMEX</span>-->
              </a>
            </div>
            <!-- begin sidebar scrollbar -->
            <div class="sidebar-left" data-simplebar style="height: 100%;">
              <!-- sidebar menu -->
              <ul class="nav sidebar-inner" id="sidebar-menu">  
                  <li>
                    <a class="sidenav-item-link" href="/site/index">
                      <i class="mdi mdi-briefcase-account-outline"></i>
                      <span class="nav-text">Inicio</span>
                    </a>
                  </li>
                  <?php if(User::hasRole('superadmin') || User::hasRole('Estudiante')): ?>
                  <li  class="has-sub" >
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#utilidades"
                      aria-expanded="false" aria-controls="utilidades">
                      <i class="mdi mdi-image-filter-none"></i>
                      <span class="nav-text">Utilidades</span> <b class="caret"></b>
                    </a>
                    <ul  class="collapse"  id="utilidades"
                      data-parent="#sidebar-menu">
                      <div class="sub-menu">
                  <li>
                    <a class="sidenav-item-link" href="/cursoinscrito/mis-cursos">
                    <i class="mdi mdi-calendar-check"></i>
                      <span class="nav-text">Mis cursos</span>
                    </a>
                  </li>
                  </li>
                  </div>
                  </ul>
                  <li>
                  <?php endif;?>
                  <?php if(User::hasRole('superadmin') || User::hasRole('tutor')): ?>
                  <li>
                  <li class="section-title">
                    Cursos asignados
                  </li>
                  <li  class="has-sub" >
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#cursorevisor"
                      aria-expanded="false" aria-controls="gestion">
                      <i class="mdi mdi-image-filter-none"></i>
                      <span class="nav-text">Cursos</span> <b class="caret"></b>
                    </a>
                    <ul  class="collapse"  id="cursorevisor"
                      data-parent="#sidebar-menu">
                      <div class="sub-menu">
                    <li>
                    <a class="sidenav-item-link" href="/curso/curso-tutor">
                      <i class="mdi mdi-chart-line"></i>
                      <span class="nav-text">Cursos tutorados</span>
                    </a>
                  </li>
                  </div>
                  </ul>
                  <?php endif;?>
                  <?php if(User::hasRole('superadmin') || User::hasRole('Administrador')): ?>
                  <li>
                  <li class="section-title">
                    Gestión de cursos
                  </li>
                  <li  class="has-sub" >
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#curso"
                      aria-expanded="false" aria-controls="gestion">
                      <i class="mdi mdi-image-filter-none"></i>
                      <span class="nav-text">Cursos</span> <b class="caret"></b>
                    </a>
                    <ul  class="collapse"  id="curso"
                      data-parent="#sidebar-menu">
                      <div class="sub-menu">
                    <li>
                    <a class="sidenav-item-link" href="/curso/index">
                      <i class="mdi mdi-chart-line"></i>
                      <span class="nav-text">Cursos</span>
                    </a>
                  </li>
                  </div>
                  </ul>
                  <?php endif;?>
                  <?php if(User::hasRole('superadmin') || User::hasRole('Administrador')): ?>
                    <li  class="has-sub" >
                      <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#examen"
                        aria-expanded="false" aria-controls="examen">
                        <i class="mdi mdi-image-filter-none"></i>
                        <span class="nav-text">Examen</span> <b class="caret"></b>
                      </a>
                      <ul  class="collapse"  id="examen"
                        data-parent="#sidebar-menu">
                        <div class="sub-menu">
                          <li>
                            <a class="sidenav-item-link" href="/examen/index">
                              <i class="mdi mdi-chart-line"></i>
                              <span class="nav-text">Examenes</span>
                            </a>
                          </li>
                          <!-- <li>
                            <a class="sidenav-item-link" href="/site/index">
                              <i class="mdi mdi-chart-line"></i>
                              <span class="nav-text">Proximamente</span>
                            </a>
                          </li> -->
                        </div>
                      </ul>
                    </li>
                  <?php endif;?>
                  <?php if(User::hasRole('superadmin') || User::hasRole('Administrador')): ?>
                    <!--li class="section-title">
                    Aplicaciones
                    </li-->
                    <li  class="has-sub" >
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#manual"
                      aria-expanded="false" aria-controls="manual">
                      <i class="mdi mdi-image-filter-none"></i>
                      <span class="nav-text">Manuales</span> <b class="caret"></b>
                    </a>
                    <ul  class="collapse"  id="manual"
                      data-parent="#sidebar-menu">
                      <div class="sub-menu">
                  <li
                   >
                    <a class="sidenav-item-link" href="/manual/catalogo">
                      <i class="mdi mdi-file-document-box"></i>
                      <span class="nav-text">Todos los manuales</span>
                    </a>
                  </li>
                  <li>
                    <a class="sidenav-item-link" href="/manual/catalogocursos">
                      <i class="mdi mdi-folder-account"></i>
                      <span class="nav-text">Cursos con manuales</span>
                    </a>
                  </li>
                  <li
                   >
                    <a class="sidenav-item-link" href="/manualdetalle/catalogodetalle">
                      <i class="mdi mdi-book-open-variant"></i>
                      <span class="nav-text">Hojas de los manuales</span>
                    </a>
                  </li>
                  </div>
                  </ul>
                  </li>
                  <?php endif;?>

                  <?php if(User::hasRole('superadmin') || User::hasRole('Administrador')): ?>
                
                  <li class="section-title">
                    Páginas de admin
                  </li>            
                  <li  class="has-sub" >
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#users"
                      aria-expanded="false" aria-controls="users">
                      <i class="mdi mdi-image-filter-none"></i>
                      <span class="nav-text">User</span> <b class="caret"></b>
                    </a>
                    <ul  class="collapse"  id="users"
                      data-parent="#sidebar-menu">
                      <div class="sub-menu">                 
                            <li >
                              <a class="sidenav-item-link" href="/user-management/user">
                                <span class="nav-text">Usuarios</span>
                                
                              </a>
                            </li>                     
                            <li >
                              <a class="sidenav-item-link" href="/user-management/role">
                                <span class="nav-text">Roles</span>
                                
                              </a>
                            </li>                 
                            <li >
                              <a class="sidenav-item-link" href="/user-management/permission">
                                <span class="nav-text">Permisos</span>
                                
                              </a>
                            </li>                               
                      </div>
                    </ul>
                  </li>
                  <?php endif;?>
          </div>
        </aside>