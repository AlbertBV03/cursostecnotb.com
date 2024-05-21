
 <?php 
 foreach($models as $cliente):   ?>
										<div>
											<div class="card border-0">
												<span class="thumb-info thumb-info-no-borders thumb-info-no-borders-rounded thumb-info-slow-image-zoom-hover thumb-info-swap-content anim-hover-inner-wrapper">
													<span class="thumb-info-wrapper overlay overflow-hidden">
														<img src="<?= Yii::getAlias('@web') ?>/uploads/institutos/<?php echo $cliente->img;?>" class="img-fluid" alt="">
														<span class="thumb-info-title bottom-30 bg-transparent w-100 mw-100 p-0">
															<span class="thumb-info-swap-content-wrapper">
																<span class="thumb-info-inner text-start ps-5"></span>
																<span class="thumb-info-inner text-2">
																	<!--p class="px-5 text-4 text-lg-2 opacity-7 font-weight-medium text-light">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras posuere elit in massa congue congue. Ut ornare fermentum sem, vitae port.</p-->

																	<ul class="social-icons social-icons-clean social-icons-icon-light">
                                                                    <a href="<?php echo $cliente->url;?>" target="_blank" class="read-more text-color-black font-weight-semibold text-2">Visitar <i class="fas fa-angle-right position-relative top-1 ms-1"></i></a>
																	</ul>

																</span>
															</span>
														</span>
													</span>
												</span>
												<h3 class="font-weight-bold text-capitalize line-height-1 text-5-5 mt-4 mb-0"><?php echo $cliente->nombre;?></h3>
												<!--p class="font-weight-medium text-color-grey text-3 mb-2">Associate Dentist</p-->
											</div>
										</div>
<?php endforeach; ?>
