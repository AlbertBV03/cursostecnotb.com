<?php
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use webvimark\modules\UserManagement\UserManagementModule;
use yii\helpers\Html;
use webvimark\modules\UserManagement\models\User;
?>
<div class="side-panel-wrapper">
			<button class="hamburguer-btn side-panel-close side-panel-toggle active" data-set-active="false">
				<span class="close">
					<span></span>
					<span></span>
				</span>
			</button>
			<div class="pt-5">
				<a href="index.php">
					<img alt="ESIE" width="200" height="80" src="/img/logos/logo-ESIE.jpg">
				</a>
				<p class="py-4 mb-2">El mundo tecnológico evoluciona a gran velocidad y en ESIE evolucionamos con él. Nosotros implementamos la transformación digital en tu negocio.</p>
				<h4 class="text-color-primary text-4">Acerca de</h4>
				<ul class="list list-icons font-weight-semibold text-color-default text-2-5">
					<li>
						<i class="icon-location-pin icons text-color-tertiary top-7"></i> Av. cobre, Cd. Industrial, Villahermosa, Tabasco, México.
					</li>
					<li>
						<i class="icon-envelope icons text-color-tertiary top-7"></i> <a href="mailto:info@esie.mx" class="text-color-default text-color-hover-tertiary text-decoration-none">info@esie.mx</a>
					</li>
					<li>
						<i class="icon-clock icons text-color-tertiary top-7"></i> Lunes-Sabado: 9:00 am a 8:00 pm/ Domingo: Cerrado.
					</li>
					<li>
						<i class="icon-phone icons text-color-tertiary top-7"></i> <a href="tel:993-181-0654" class="text-color-default text-color-hover-tertiary text-decoration-none">(993)1810654</a>
					</li>
				</ul>

				<a href="demo-dentist-contact.php#book" class="btn w-100  btn-secondary border-0 text-2-5 font-weight-semi-bold btn-px-4 btn-py-3 my-3">Contactanos</a>

				<h4 class="text-color-primary text-4 pt-3">Síguenos</h4>
				<ul class="social-icons social-icons-clean social-icons-medium">
					<li class="social-icons-facebook">
						<a href="http://www.facebook.com/" target="_blank" title="Facebook">
							<i class="fab fa-facebook-f"></i>
						</a>
					</li>
					<li class="social-icons-twitter">
						<a href="http://www.twitter.com/" target="_blank" title="Twitter">
							<i class="fab fa-twitter"></i>
						</a>
					</li>
					<li class="social-icons-instagram">
						<a href="http://www.instagram.com/" target="_blank" title="Instagram">
							<i class="fab fa-instagram"></i>
						</a>
					</li>
					<li class="social-icons-linkedin">
						<a href="http://www.linkedin.com/" target="_blank" title="Linkedin">
							<i class="fab fa-linkedin"></i>
						</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="body">
			<header id="header" data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': false, 'stickyChangeLogo': false, 'stickyStartAt': 53, 'stickySetTop': '-53px'}">
				<div class="header-body border-top-0 h-auto box-shadow-none">
					<div class="header-top border-width-1">
						<div class="container-fluid px-lg-5 h-100">
							<div class="header-row h-100">
								<div class="header-column justify-content-start">
									<div class="header-row">
										<nav class="header-nav-top">
											<ul class="nav nav-pills">
												<li class="nav-item py-2 d-none d-sm-inline-flex pe-2">
													<span class="ps-0 font-weight-semibold text-color-default text-2"><i class="icon-location-pin icons text-color-tertiary p-relative top-3 text-4-5"></i> Av. cobre, Cd. Industrial, Villahermosa, Tabasco, México.</span>
												</li>
											</ul>
										</nav>
									</div>
								</div>
								<div class="header-column justify-content-end">
									<div class="header-row">
										<nav class="header-nav-top">
											<ul class="nav nav-pills p-relative bottom-2">
												<li class="nav-item py-2 d-none d-md-inline-flex">
													<a href="mailto:info@esie.mx" class="text-2 font-weight-semibold text-color-default text-color-hover-tertiary"><i class="icon-envelope icons text-color-tertiary p-relative top-3 text-4-5"></i> info@esie.mx</a>
												</li>
												<li class="nav-item py-2 pe-2">
													<span class="text-2 font-weight-semibold text-color-default d-none d-lg-block"><i class="icon-clock icons text-color-tertiary p-relative top-3 text-4-5"></i> Lunes - Sabado: 9:00 am a 8:00 pm / Domingo - Cerrado</span>
												</li>
												<li class="nav-item py-2 pe-2">
													<a href="tel:993-181-0654" class="text-2 font-weight-semibold text-color-default text-color-hover-tertiary"><i class="icon-phone icons text-color-tertiary p-relative top-2 text-4-5"></i> (993)1810654</a>
												</li>
											</ul>
										</nav>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="header-container header-container-height-sm container-fluid px-lg-5 p-static">
						<div class="header-row">
							<div class="header-column">
								<div class="header-row">
									<div class="header-logo">
										<a href="index.php">
											<img alt="Porto" width="200" height="80" src="/img/logos/logo-ESIE.jpg">
										</a>
									</div>
								</div>
							</div>
							<div class="header-column justify-content-end justify-content-lg-center w-100">
								<div class="header-row">
									<div class="header-nav header-nav-line header-nav-bottom-line header-nav-bottom-line-effect-1 justify-content-lg-center ps-lg-5">
										<div class="header-nav-main header-nav-main-square header-nav-main-text-capitalize header-nav-main-text-size-4 header-nav-main-dropdown-no-borders header-nav-main-arrows header-nav-main-full-width-mega-menu header-nav-main-mega-menu-bg-hover header-nav-main-effect-2">
											<nav class="collapse">
												<ul class="nav nav-pills" id="mainNav">
													<li>
														<a href="/site/index" class="nav-link">
															INICIO
														</a>
													</li>
													<li class="dropdown">
														<a href="#" class="nav-link dropdown-toggle">IDENTIDAD</a>
														<ul class="dropdown-menu">
															<li><a href="/site/about" class="dropdown-item">Acerca de SIE</a></li>
															<li><a href="/site/team" class="dropdown-item">Equipo SIE</a></li>
															<li><a href="/site/features" class="dropdown-item">Caractetristicas del SIE</a></li>
															<li><a href="/contactar/create" class="dropdown-item">Contactanos</a></li>
															<!--li><a href="demo-dentist-services-details.php" class="dropdown-item">Root Canal</a></li-->
														</ul>
													</li>
													<li class="dropdown">
														<a href="#" class="nav-link dropdown-toggle">CLIENTES</a>
														<ul class="dropdown-menu">
															<li><a href="/cliente/list" class="dropdown-item">Clientes SIE</a></li>
															<li><a href="#" class="dropdown-item">Casos de estudio</a></li>
														</ul>
													</li>
													<li class="dropdown">
														<a href="#" class="nav-link dropdown-toggle">SERVICIOS</a>
														<ul class="dropdown-menu">
															<li><a href="#" class="dropdown-item">Capacitación</a></li>
															<li><a href="#" class="dropdown-item">Consultoria</a></li>
															<li><a href="#" class="dropdown-item">Respaldo</a></li>
														</ul>
													</li>
													<li class="dropdown">
														<a href="demo-dentist-services.php" class="nav-link dropdown-toggle">SOPORTE</a>
														<ul class="dropdown-menu">
															<li><a href="demo-dentist-services.php" class="dropdown-item">Preguntas frecuentes</a></li>
															<li><a href="demo-dentist-services-details.php" class="dropdown-item">Manuales</a></li>
															<li><a href="demo-dentist-services-details.php" class="dropdown-item">Actualizaciones</a></li>
														</ul>
													</li>
													<li class="dropdown">
																
																<?php if (Yii::$app->user->isGuest) { ?>
																
																		<?= Html::a('Iniciar Sesión', ['/user-management/auth/login'], ['class' => 'dropdown-item']) ?>
																
																<?php }else{ ?>
																
																		<?= Html::a('Cerrar sesión (' . Yii::$app->user->identity->username . ')', ['/user-management/auth/logout'], ['class' => 'dropdown-item dropdown-toggle']) ?>
																		
																		<ul class="dropdown-menu">
																				<li><?= Html::a('Mi Panel', ['/site/panel'], ['class' => 'dropdown-item']) ?></li>
																				<?php if(User::hasRole('superadmin')): ?>
																				<li><?= Html::a('Panel Control', ['/site/dashboard'], ['class' => 'dropdown-item']) ?></li>
																				<?php endif;?>
																		</ul>
																		
																	
																<?php }?>
																
															</li>
															<?php if(Yii::$app->user->isGuest) { ?>
															<li>
															<?= Html::a('Registro', ['/user-management/auth/registration'], ['class' => 'dropdown-item']) ?>
															</li>
															<?php } ?>	
												</ul>
											</nav>
										</div>
										<button class="btn header-btn-collapse-nav" data-bs-toggle="collapse" data-bs-target=".header-nav-main nav">
											<i class="fas fa-bars"></i>
										</button>
									</div>
									<div class="header-nav-features header-nav-features-no-border pe-3 order-1 order-lg-2">
										<div class="header-nav-feature header-nav-features-search d-inline-flex">
											<a href="#" class="header-nav-features-toggle text-decoration-none" data-focus="headerSearch" aria-label="Search"><i class="fas fa-search header-nav-top-icon text-4 p-relative top-3"></i></a>
											<div class="header-nav-features-dropdown" id="headerTopSearchDropdown">
												<form role="search" action="page-search-results.php" method="get">
													<div class="simple-search input-group">
														<input class="form-control text-1" id="headerSearch" name="q" type="search" value="" placeholder="Search...">
														<button class="btn" type="submit" aria-label="Search">
															<i class="fas fa-search header-nav-top-icon"></i>
														</button>
													</div>
												</form>
											</div>
										</div>
										<div class="header-nav-feature header-nav-features-side-panel d-inline-flex ms-2">
											<a href="#" class="side-panel-toggle btn btn-quaternary custom-text-color-1 border-0 d-none d-lg-inline-block ms-2" data-extra-class="side-panel-right"><i class="fas fa-bars"></i></a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</header>