<?php
namespace app\components;
use app\models\Manual;
use yii\base\Widget;
use yii;

class listarManuales extends Widget{
    public $models;
    public $id;

    public function init(){
        parent::init();
        //$this->_clientes = Cliente::findAll();
        if ($this->id==0){
            $this->models = Manual::find()->where(['fkStatus' => Yii::$app->params['publicado']])->all();
        }else{
            $this->models = Manual::find()
            ->where(['fkStatus' => Yii::$app->params['publicado']])
            ->andWhere(['fkSubcategoria'=>$this->id])
            ->all();
        }
    }
    public function getManuales()
    {
      return $this->models;
    }

    public function run(){
        return $this->render('showManuales',['models'=>$this->models]);
    }

}


?>