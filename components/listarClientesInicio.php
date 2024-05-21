<?php
namespace app\components;
use app\models\Cliente;
use yii\base\Widget;

class listarClientesInicio extends Widget{
    public $models;

    public function init(){
        parent::init();

        $this->models = Cliente::find()->all();
    }
    public function getClientes()
    {
      return $this->models;
    }

    public function run(){
        return $this->render('verclientes-inicio',['models'=>$this->models]);
    }

}


?>