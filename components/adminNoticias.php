<?php
namespace app\components;
use app\models\Noticia;
use yii\base\Widget;

class adminNoticias extends Widget{
    public $models;

    public function init(){
        parent::init();

        //$this->_clientes = Cliente::findAll();
        $this->models = Noticia::find()->all();
    }
    public function getNoticias()
    {
      return $this->models;
    }

    public function run(){
        return $this->render('verNoticias',['models'=>$this->models]);
    }

}


?>