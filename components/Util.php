<?php
namespace app\Components;
use yii\helpers\Html;
use app\models\Manualdetalle;
use Yii;
Class Util {

    public static function estatusCliente($estatus){
        if($estatus=='V'){
            $valorRetorno = 1;
        }else{
            $valorRetorno = 0;
        }
        return $valorRetorno;
    }

     //borra archivo despues de subir nueva imagen
     public static function borrarArchivo($nombre){
        $file = Yii::$app->basePath . '/web/uploads/institutos/'. $nombre;
        if (empty($file) || !file_exists($file)) {
            return false;
        }
        if (!unlink($file)) {
            return false;
        }
        return true;
    }

    //borra archivo despues de subir nueva imagen
    public static function borrarPortada($nombre){
        $file = Yii::$app->basePath . '/web/uploads/noticiaportada/'. $nombre;
        if (empty($file) || !file_exists($file)) {
            return false;
        }
        if (!unlink($file)) {
            return false;
        }
        return true;
    }

    //encripta id y desencripta encrytbykey 
    public static function wait_encrypt_decrypt_Id($id,$bandera){
        //genera una cadena para ser usado por el encryptByKey
        $key = Yii::$app->params['banderaEncriptaciónId'];
        //en caso de que sea encriptar, la bandera será 1
        if($bandera==1){
            $encrypted = utf8_encode(Yii::$app->security->encryptByKey($id, $key));
        }elseif($bandera==2){
            $encrypted = Yii::$app->security->decryptByKey(utf8_decode($id), $key);
        }
        return $encrypted;
    }

    //encripta id y desencripta id
    public static function encrypt_decrypt_Id($id,$bandera){
        //genera una cadena para ser usado por el encryptByKey
        $key = Yii::$app->params['banderaEncriptaciónId'];
        //en caso de que sea encriptar, la bandera será 1
        if($bandera==1){
            $encrypted = Yii::$app->security->hashData($id,$key,false);
        }elseif($bandera==2){
            $encrypted = Yii::$app->security->validateData($id,$key,false);
        }
        return $encrypted;
    }

    public static function buscarNumHojas($idManual){
        $encontrados = Manualdetalle::find()->where(['fkManual' => $idManual])->count();
        return $encontrados;
    }
    //encripta id y desencripta id
    public static function encrypt_decryptID($id,$bandera){
        //genera una cadena para ser usado por el encryptByKey
        $key = Yii::$app->params['banderaEncriptaciónId'];
        //en caso de que sea encriptar, la bandera será 1
        if($bandera==1){
            $encrypted = Yii::$app->security->hashData($id,$key,false);
        }elseif($bandera==2){
            $encrypted = Yii::$app->security->validateData($id,$key,false);
        }
        return $encrypted;
    }
}
?>