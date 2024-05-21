<?php
namespace app\components;
use yii\base\Widget;
use app\models\Noticiaarchivo;

class listarImagenNoticia extends Widget{
    public $models;
    public $id;

    public function init(){
        parent::init();

        //$this->_clientes = Cliente::findAll();
        $this->models = Noticiaarchivo::find()->where(['fkNoticia'=> $this->id])->all();
       
    }
    public function getImagenes()
    {
      return $this->models;
    }

    public function run(){
        return $this->render('verImagenNoticia',['models'=>$this->models]);
    }

}

?>