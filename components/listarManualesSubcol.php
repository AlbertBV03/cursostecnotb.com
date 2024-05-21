<?php
namespace app\components;
use yii;
use yii\base\Widget;
use app\models\Manual;
use app\models\Subcoleccionmanual;

class listarManualesSubcol extends Widget{
    public $models;
    public $id;
    
    public function init(){
        parent::init();
        //$this->_clientes = Cliente::findAll();
        
        $this->models = Subcoleccionmanual::find()->where(['fkSubCol' => $this->id])->all();
        /* else{
            $this->models = Subcoleccionmanual::find()
            ->where(['fkStatus' => Yii::$app->params['publicado']])
            ->andWhere(['fkSubcategoria'=>$this->id])
            ->all();
        } */
    }
    public function getManuales()
    {
      return $this->models;
    }

    public function run(){
        return $this->render('showManualesSubcol',['models'=>$this->models]);
    }

}


?>