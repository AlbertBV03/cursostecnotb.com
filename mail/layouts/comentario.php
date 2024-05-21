<?php
/**
 * @var $this yii\web\View
 * @var $user webvimark\modules\UserManagement\models\User
 */
use yii\helpers\Html;
use webvimark\modules\UserManagement\models\User;

?>
<?php
$confirmLink = Yii::$app->urlManager->createAbsoluteUrl(['/comentario/comentario-solicitud', 'id' => $ID]);
?>
<?php
if ((User::hasRole('administradorsie') || User::hasRole('TecnicoEsie'))): ?>
  <h3>Hola, su solicitud de servicio de soporte en la  página de <?= Yii::$app->urlManager->hostInfo ?> tiene un mensaje por parte de uno de nuestros técnicos. Su solicitud tiene los siguientes datos:</h3>   
<?php else: ?>
  <h3>Hola, la solicitud de servicio de soporte en la  página de <?= Yii::$app->urlManager->hostInfo ?> tiene un mensaje por parte de un cliente. La solicitud tiene los siguientes datos:</h3>
<?php endif;?>
 <br/> <br/>
<table>
    <?= $content ?>
</table>

<br/><br/>
<b>Sigue el siguiente link para ver el comentario:</b>

<?= Html::a('Ver comentario', $confirmLink) ?>
<br/><br/>
<!--b>Sigue el siguiente link para activar la cuenta de correo y asignar el rol de administradorsie:</b-->

<!--?= Html::a('Activar cuenta de correo como usuario administradorsie', $adminConfirmLink) ?-->