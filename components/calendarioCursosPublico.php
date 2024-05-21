<?php
namespace app\components;
use app\models\Curso;
use yii\base\Widget;

class calendarioCursosPublico extends Widget{
    public $models;

    public function init(){
        parent::init();
    }
    public function getCursos()
    {
      return $this->models;
    }

    public function run(){
        return $this->render('verCalendarioPublico');
    }
}


?>