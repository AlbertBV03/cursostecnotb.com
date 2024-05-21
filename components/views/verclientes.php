
 <?php 
 foreach($models as $cliente):   ?>
<div class="col-md-6 col-lg-4 mb-5 mb-lg-0 appear-animation animated fadeInUpShorter appear-animation-visible" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200" style="animation-delay: 200ms;">
                <h4 class="mb-4 text-primary"><?php echo $cliente->nombre;?></h4>
                <div class="card">
                    <img class="card-img-top" src="<?= Yii::getAlias('@web') ?>/uploads/institutos/<?php echo $cliente->img;?>" alt="Card Image">
                    <div class="card-body">
                       <a href="<?php echo $cliente->url;?>" target="_blank" class="read-more text-color-black font-weight-semibold text-2">Visitar <i class="fas fa-angle-right position-relative top-1 ms-1"></i></a>
                    </div>
                </div>
</div>
<?php endforeach; ?>