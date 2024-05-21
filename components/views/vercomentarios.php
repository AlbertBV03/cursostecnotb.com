 <?php 
use yii\helpers\Html;

 foreach($models as $comentario): ?>
   <!--  <div class="row justify-content-center"> -->
        <div class="col-md-6 col-lg-12 mb-5 mb-lg-0">
            <div class="card mb-2">
                <div class="card-header">
                        <p><i class="fas fa-user"></i></i><?php echo ' ' . $comentario->fkuser0->username; ?> <span class="date text-muted"><small> el <?php echo $comentario->updateDate; ?></small></span></p> 
                </div>
                <div class="card-body">
                    <p><?php echo $comentario->comentario?></p>
                    <?php
                        if ($comentario->foto!='') {
                            //echo "<h5>Foto</h5>";
                            echo Html::img($comentario->getImageUrl(),['style'=>'width:70%']);
                        }    
                    ?>
                </div>
                
            </div>
        </div>
   <!--  </div> -->
<?php endforeach; ?>