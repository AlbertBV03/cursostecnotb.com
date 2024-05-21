<?php
namespace app\components;
use Yii;
use yii\base\Widget;
use app\models\Noticia;

class modalNoticia extends Widget{
    public $models;

    public function init(){
        parent::init();

        //$this->_clientes = Cliente::findAll();
        $this->models = Noticia::find()->where(['fkEstatus' => Yii::$app->params['publicadoInicio']])->orderBy(['created_at' => SORT_DESC])->one();
        /* var_dump($this->models->foto);
        die; */
    }
    public function getNoticia()
    {
      return $this->models;
    }

    public function run(){
        return $this->render('verNoticia',['models'=>$this->models]);
    }

}


?>