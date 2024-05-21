<?php
namespace app\components;
use yii;
use yii\base\Widget;
use app\models\Coleccion;
use app\models\Subcoleccion;

class listarSubcolecciones extends Widget{
    public $models;
    public $id;

    public function init(){
        parent::init();
        //$this->_clientes = Cliente::findAll();
        $this->models = Subcoleccion::find()->where(['estatus' => Yii::$app->params['publicado']])->andwhere(['fkColeccion' => $this->id])->all();
        
    }
    public function getSubColecciones()
    {
      return $this->models;
    }

    public function run(){
        return $this->render('showSubcolecciones',['models'=>$this->models]);
    }

}


?>