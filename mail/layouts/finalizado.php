<?php
/**
 * @var $this yii\web\View
 * @var $user webvimark\modules\UserManagement\models\User
 */
use yii\helpers\Html;

?>
<?php
$confirmLink = Yii::$app->urlManager->createAbsoluteUrl(['/site/panel']);
?>

<h3>Hola, su solicitud de servicio de soporte en la  página de <?= Yii::$app->urlManager->hostInfo ?> a sido atendido por nuestros técnicos,
  su solicitud tiene los siguientes datos:</h3>
 <br/> <br/>
<table>
    <?= $content ?>
</table>

<br/><br/>
<b>Sigue el siguiente link para ver la solicitud:</b>

<?= Html::a('Ver solicitud', $confirmLink) ?>
<br/><br/>
<!--b>Sigue el siguiente link para activar la cuenta de correo y asignar el rol de administradorsie:</b-->

<!--?= Html::a('Activar cuenta de correo como usuario administradorsie', $adminConfirmLink) ?-->