<?php
namespace app\components;
use app\models\Comentario;
use yii\base\Widget;

class listarComentarios extends Widget{
    public $models;
    public $id;

    public function init(){
        parent::init();

        //$this->_clientes = Cliente::findAll();
        $this->models = Comentario::find()->where(['fk_ticket'=> $this->id])->orderBy(['updateDate' => SORT_DESC])->all();
    }
    public function getComentarios()
    {
      return $this->models;
    }

    public function run(){
        return $this->render('vercomentarios',['models'=>$this->models]);
    }

}

?>