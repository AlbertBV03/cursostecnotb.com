<?php
namespace app\components;
use app\models\Manual;
use yii\base\Widget;

class adminManuales extends Widget{
    public $models;

    public function init(){
        parent::init();

        //$this->_clientes = Cliente::findAll();
        $this->models = Manual::find()->all();
    }
    public function getManuales()
    {
      return $this->models;
    }

    public function run(){
        return $this->render('verManuales',['models'=>$this->models]);
    }

}


?>