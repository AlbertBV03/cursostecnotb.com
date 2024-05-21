<?php
namespace app\Components;
use yii\helpers\Html;
use Yii;
Class Util {

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