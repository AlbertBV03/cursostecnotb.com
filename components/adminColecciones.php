<?php
namespace app\components;
use yii\base\Widget;
use app\models\Coleccion;

class adminColecciones extends Widget{
    public $models;

    public function init(){
        parent::init();

        //$this->_clientes = Cliente::findAll();
        $this->models = Coleccion::find()->all();
    }
    public function getColecciones()
    {
      return $this->models;
    }

    public function run(){
        return $this->render('verColecciones',['models'=>$this->models]);
    }

}


?>