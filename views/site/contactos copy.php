<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\ContactForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\captcha\Captcha;

$this->title = 'Contactos';
$this->params['breadcrumbs'][] = $this->title;
?>
        <div class="content-wrapper">
          <div class="content"><div class="card card-default">
  <div class="card-header align-items-center px-3 px-md-5">
    <h2>Contactos</h2>

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-add-contact"> Agregar Contacto
    </button>
  </div>

  <div class="card-body px-3 px-md-5">
    <div class="row">
      <div class="col-lg-6 col-xl-4">
        <div class="card card-default p-4">
          <a href="javascript:0" class="media text-secondary" data-toggle="modal" data-target="#modal-contact">
            <img src="/images/user/u-xl-1.jpg" class="mr-3 img-fluid rounded" alt="Avatar Image">
            
            <div class="media-body">
              <h5 class="mt-0 mb-2 text-dark">Mayra Jandalu</h5>
              <ul class="list-unstyled text-smoke text-smoke">
                <li class="d-flex">
                  <i class="mdi mdi-map mr-1"></i>
                  <span>Asistente de Uriel</span>
                </li>
                <li class="d-flex">
                  <i class="mdi mdi-email mr-1"></i>
                  <span>exmaple@email.com</span>
                </li>
                <li class="d-flex">
                  <i class="mdi mdi-phone mr-1"></i>
                  <span>(993) 375 1970 </span>
                </li>
              </ul>
            </div>
          </a>
        </div>
      </div>
  
      <div class="col-lg-6 col-xl-4">
        <div class="card card-default p-4">
          <a href="javascript:0" class="media text-secondary" data-toggle="modal" data-target="#modal-contact">
            <img src="/images/user/u-xl-2.jpg" class="mr-3 img-fluid rounded" alt="Avatar Image">

            <div class="media-body">
              <h5 class="mt-0 mb-2 text-dark">Victor del Carmen</h5>
              <ul class="list-unstyled text-smoke">
                <li class="d-flex">
                  <i class="mdi mdi-map mr-1"></i>
                  <span>Perrita de Uriel</span>
                </li>
                <li class="d-flex">
                  <i class="mdi mdi-email mr-1"></i>
                  <span>exmaple@email.com</span>
                </li>
                <li class="d-flex">
                  <i class="mdi mdi-phone mr-1"></i>
                  <span>(914) 114 7604 </span>
                </li>
              </ul>
            </div>
          </a>
        </div>
      </div>
  
      <div class="col-lg-6 col-xl-4">
        <div class="card card-default p-4">
          <a href="javascript:0" class="media text-secondary" data-toggle="modal" data-target="#modal-contact">
            <img src="/images/user/u-xl-3.jpg" class="mr-3 img-fluid rounded" alt="Avatar Image">

            <div class="media-body">
              <h5 class="mt-0 mb-2 text-dark">Emma Smith</h5>
              <ul class="list-unstyled text-smoke">
                <li class="d-flex">
                  <i class="mdi mdi-map mr-1"></i>
                  <span>Nulla vel metus 15/178</span>
                </li>
                <li class="d-flex">
                  <i class="mdi mdi-email mr-1"></i>
                  <span>exmaple@email.com</span>
                </li>
                <li class="d-flex">
                  <i class="mdi mdi-phone mr-1"></i>
                  <span>(123) 888 777 632</span>
                </li>
              </ul>
    
            </div>
          </a>
        </div>
      </div>

      <div class="col-lg-6 col-xl-4">
        <div class="card card-default p-4">
          <a href="javascript:0" class="media text-secondary" data-toggle="modal" data-target="#modal-contact">
            <img src="/images/user/u-xl-4.jpg" class="mr-3 img-fluid rounded" alt="Avatar Image">

            <div class="media-body">
              <h5 class="mt-0 mb-2 text-dark">Emma Smith</h5>
              <ul class="list-unstyled text-smoke">
                <li class="d-flex">
                  <i class="mdi mdi-map mr-1"></i>
                  <span>Nulla vel metus 15/178</span>
                </li>
                <li class="d-flex">
                  <i class="mdi mdi-email mr-1"></i>
                  <span>exmaple@email.com</span>
                </li>
                <li class="d-flex">
                  <i class="mdi mdi-phone mr-1"></i>
                  <span>(123) 888 777 632</span>
                </li>
              </ul>
            </div>
          </a>
        </div>
      </div>

      <div class="col-lg-6 col-xl-4">
        <div class="card card-default p-4">
          <a href="javascript:0" class="media text-secondary" data-toggle="modal" data-target="#modal-contact">
            <img src="/images/user/u-xl-5.jpg" class="mr-3 img-fluid rounded" alt="Avatar Image">

            <div class="media-body">
              <h5 class="mt-0 mb-2 text-dark">Emma Smith</h5>
              <ul class="list-unstyled text-smoke">
                <li class="d-flex">
                  <i class="mdi mdi-map mr-1"></i>
                  <span>Nulla vel metus 15/178</span>
                </li>
                <li class="d-flex">
                  <i class="mdi mdi-email mr-1"></i>
                  <span>exmaple@email.com</span>
                </li>
                <li class="d-flex">
                  <i class="mdi mdi-phone mr-1"></i>
                  <span>(123) 888 777 632</span>
                </li>
              </ul>
            </div>
          </a>
        </div>
      </div>

      <div class="col-lg-6 col-xl-4">
        <div class="card card-default p-4">
          <a href="javascript:0" class="media text-secondary" data-toggle="modal" data-target="#modal-contact">
            <img src="/images/user/u-xl-6.jpg" class="mr-3 img-fluid rounded" alt="Avatar Image">
            <div class="media-body">
              <h5 class="mt-0 mb-2 text-dark">Emma Smith</h5>
              <ul class="list-unstyled text-smoke">
                <li class="d-flex">
                  <i class="mdi mdi-map mr-1"></i>
                  <span>Nulla vel metus 15/178</span>
                </li>
                <li class="d-flex">
                  <i class="mdi mdi-email mr-1"></i>
                  <span>exmaple@email.com</span>
                </li>
                <li class="d-flex">
                  <i class="mdi mdi-phone mr-1"></i>
                  <span>(123) 888 777 632</span>
                </li>
              </ul>
            </div>
          </a>
        </div>
      </div>

      <div class="col-lg-6 col-xl-4">
        <div class="card card-default p-4">
          <a href="javascript:0" class="media text-secondary" data-toggle="modal" data-target="#modal-contact">
            <img src="/images/user/u-xl-7.jpg" class="mr-3 img-fluid rounded" alt="Avatar Image">

            <div class="media-body">
              <h5 class="mt-0 mb-2 text-dark">Emma Smith</h5>
              <ul class="list-unstyled text-smoke">
                <li class="d-flex">
                  <i class="mdi mdi-map mr-1"></i>
                  <span>Nulla vel metus 15/178</span>
                </li>
                <li class="d-flex">
                  <i class="mdi mdi-email mr-1"></i>
                  <span>exmaple@email.com</span>
                </li>
                <li class="d-flex">
                  <i class="mdi mdi-phone mr-1"></i>
                  <span>(123) 888 777 632</span>
                </li>
              </ul>
            </div>
          </a>
        </div>
      </div>

      <div class="col-lg-6 col-xl-4">
        <div class="card card-default p-4">
          <a href="javascript:0" class="media text-secondary" data-toggle="modal" data-target="#modal-contact">
            <img src="/images/user/u-xl-8.jpg" class="mr-3 img-fluid rounded" alt="Avatar Image">

            <div class="media-body">
              <h5 class="mt-0 mb-2 text-dark">Emma Smith</h5>
              <ul class="list-unstyled text-smoke">
                <li class="d-flex">
                  <i class="mdi mdi-map mr-1"></i>
                  <span>Nulla vel metus 15/178</span>
                </li>
                <li class="d-flex">
                  <i class="mdi mdi-email mr-1"></i>
                  <span>exmaple@email.com</span>
                </li>
                <li class="d-flex">
                  <i class="mdi mdi-phone mr-1"></i>
                  <span>(123) 888 777 632</span>
                </li>
              </ul>
            </div>
          </a>
        </div>
      </div>

      <div class="col-lg-6 col-xl-4">
        <div class="card card-default p-4">
          <a href="javascript:0" class="media text-secondary" data-toggle="modal" data-target="#modal-contact">
            <img src="/images/user/u-xl-9.jpg" class="mr-3 img-fluid rounded" alt="Avatar Image">

            <div class="media-body">
              <h5 class="mt-0 mb-2 text-dark">Emma Smith</h5>
              <ul class="list-unstyled text-smoke">
                <li class="d-flex">
                  <i class="mdi mdi-map mr-1"></i>
                  <span>Nulla vel metus 15/178</span>
                </li>
                <li class="d-flex">
                  <i class="mdi mdi-email mr-1"></i>
                  <span>exmaple@email.com</span>
                </li>
                <li class="d-flex">
                  <i class="mdi mdi-phone mr-1"></i>
                  <span>(123) 888 777 632</span>
                </li>
              </ul>
            </div>
          </a>
        </div>
      </div>

      <div class="col-lg-6 col-xl-4">
        <div class="card card-default p-4">
          <a href="javascript:0" class="media text-secondary" data-toggle="modal" data-target="#modal-contact">
            <img src="/images/user/u-xl-10.jpg" class="mr-3 img-fluid rounded" alt="Avatar Image">

            <div class="media-body">
              <h5 class="mt-0 mb-2 text-dark">Emma Smith</h5>
              <ul class="list-unstyled text-smoke">
                <li class="d-flex">
                  <i class="mdi mdi-map mr-1"></i>
                  <span>Nulla vel metus 15/178</span>
                </li>
                <li class="d-flex">
                  <i class="mdi mdi-email mr-1"></i>
                  <span>exmaple@email.com</span>
                </li>
                <li class="d-flex">
                  <i class="mdi mdi-phone mr-1"></i>
                  <span>(123) 888 777 632</span>
                </li>
              </ul>
            </div>
          </a>
        </div>
      </div>

      <div class="col-lg-6 col-xl-4">
        <div class="card card-default p-4">
          <a href="javascript:0" class="media text-secondary" data-toggle="modal" data-target="#modal-contact">
            <img src="/images/user/u-xl-11.jpg" class="mr-3 img-fluid rounded" alt="Avatar Image">

            <div class="media-body">
              <h5 class="mt-0 mb-2 text-dark">Emma Smith</h5>
              <ul class="list-unstyled text-smoke">
                <li class="d-flex">
                  <i class="mdi mdi-map mr-1"></i>
                  <span>Nulla vel metus 15/178</span>
                </li>
                <li class="d-flex">
                  <i class="mdi mdi-email mr-1"></i>
                  <span>exmaple@email.com</span>
                </li>
                <li class="d-flex">
                  <i class="mdi mdi-phone mr-1"></i>
                  <span>(123) 888 777 632</span>
                </li>
              </ul>
            </div>
          </a>
        </div>
      </div>

      <div class="col-lg-6 col-xl-4">
        <div class="card card-default p-4">
          <a href="javascript:0" class="media text-secondary" data-toggle="modal" data-target="#modal-contact">
            <img src="/images/user/u-xl-12.jpg" class="mr-3 img-fluid rounded" alt="Avatar Image">

            <div class="media-body">
              <h5 class="mt-0 mb-2 text-dark">Emma Smith</h5>
              <ul class="list-unstyled text-smoke">
                <li class="d-flex">
                  <i class="mdi mdi-map mr-1"></i>
                  <span>Nulla vel metus 15/178</span>
                </li>
                <li class="d-flex">
                  <i class="mdi mdi-email mr-1"></i>
                  <span>exmaple@email.com</span>
                </li>
                <li class="d-flex">
                  <i class="mdi mdi-phone mr-1"></i>
                  <span>(123) 888 777 632</span>
                </li>
              </ul>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Contact Modal -->
<div class="modal fade" id="modal-contact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header justify-content-end border-bottom-0">
        <button type="button" class="btn-edit-icon" data-dismiss="modal" aria-label="Close">
          <i class="mdi mdi-pencil"></i>
				</button>
				
        <div class="dropdown">
          <button class="btn-dots-icon" type="button" id="dropdownMenuButton" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <i class="mdi mdi-dots-vertical"></i>
					</button>
					
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="javascript:void(0)">Action</a>
            <a class="dropdown-item" href="javascript:void(0)">Another action</a>
            <a class="dropdown-item" href="javascript:void(0)">Something else here</a>
          </div>
				</div>
				
        <button type="button" class="btn-close-icon" data-dismiss="modal" aria-label="Close">
          <i class="mdi mdi-close"></i>
        </button>
			</div>
			
      <div class="modal-body pt-0">
        <div class="row no-gutters">
          <div class="col-md-6">
            <div class="profile-content-left px-4">
              <div class="card text-center px-0 border-0">
                <div class="card-img mx-auto">
                  <img class="rounded-circle" src="/images/user/u6.jpg" alt="user image">
								</div>
								
                <div class="card-body">
                  <h4 class="py-2">Albrecht Straub</h4>
                  <p>Albrecht.straub@gmail.com</p>
                  <a class="btn btn-primary btn-pill btn-lg my-4" href="javascript:void(0)">Follow</a>
                </div>
							</div>
							
              <div class="d-flex justify-content-between ">
                <div class="text-center pb-4">
                  <h6 class="pb-2">1503</h6>
                  <p>Friends</p>
								</div>
								
                <div class="text-center pb-4">
                  <h6 class="pb-2">2905</h6>
                  <p>Followers</p>
								</div>
								
                <div class="text-center pb-4">
                  <h6 class="pb-2">1200</h6>
                  <p>Following</p>
                </div>
              </div>
            </div>
					</div>
					
          <div class="col-md-6">
            <div class="contact-info px-4">
              <h4 class="mb-1">Detalles del Contacto</h4>
              <p class="text-dark font-weight-medium pt-4 mb-2">Correo</p>
              <p>Albrecht.straub@gmail.com</p>
              <p class="text-dark font-weight-medium pt-4 mb-2">Numero Tel.</p>
              <p>+99 9539 2641 31</p>
              <p class="text-dark font-weight-medium pt-4 mb-2">Fecha Nacimiento</p>
              <p>Nov 15, 1990</p>
              <p class="text-dark font-weight-medium pt-4 mb-2">Puesto</p>
              <p>Lorem, ipsum dolor</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Add Contact Button  -->
<div class="modal fade" id="modal-add-contact" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <form >
        <div class="modal-header px-4">
          <h5 class="modal-title" id="exampleModalCenterTitle">Crear Nuevo Contacto</h5>
        </div>
        <div class="modal-body px-4">

          <div class="form-group row mb-6">
            <label for="coverImage" class="col-sm-4 col-lg-2 col-form-label">Imagen de Usuario</label>
            <div class="col-sm-8 col-lg-10">
              <div class="custom-file mb-1">
                <input type="file" class="custom-file-input" id="coverImage" required>
                <label class="custom-file-label" for="coverImage">Choose file...</label>
                <div class="invalid-feedback">Example invalid custom file feedback</div>
              </div>
            </div>
          </div>

          <div class="row mb-2">
            <div class="col-lg-6">
              <div class="form-group">
                <label for="firstName">Nombre</label>
                <input type="text" class="form-control" id="firstName" value="Albrecht">
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group">
                <label for="lastName">Apellidos</label>
                <input type="text" class="form-control" id="lastName" value="Straub">
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group mb-4">
                <label for="userName">Numero Tel</label>
                <input type="text" class="form-control" id="userName" value="Doe">
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group mb-4">
                <label for="email">Correo</label>
                <input type="email" class="form-control" id="email" value="albrecht.straub@gmail.com">
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group mb-4">
                <label for="Birthday">Fecha Nacimiento</label>
                <input type="text" class="form-control" id="Birthday" value="01-10-1993">
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group mb-4">
                <label for="event">Puesto</label>
                <input type="text" class="form-control" id="event" value="Some value for event">
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer px-4">
          <button type="button" class="btn btn-smoke btn-pill" data-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-primary btn-pill">Guardar Contacto</button>
        </div>
      </form>
    </div>
  </div>
</div></div>
          
        </div>