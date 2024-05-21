<?php
namespace app\components;

use yii\base\Widget;
use yii;

class contadorVisitas extends Widget{
    public $identificador;
    public $estilo;

    public function init(){
        parent::init();
    }

    public function run(){
        
        return $this->render('showContador',['identificador'=>$this->identificador,'estilo'=>$this->estilo]);
    }

}


?>