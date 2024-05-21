<?php
namespace app\components;
use yii;
use yii\base\Widget;
use app\models\Coleccion;
use app\models\Subcoleccion;
use webvimark\modules\UserManagement\models\User;

class listarColecciones extends Widget{
    public $models;
    public $id;

    public function init(){
        parent::init();
        //$this->_clientes = Cliente::findAll();
        if ( User::hasPermission('verManualesWeb') ){
            $this->models = Coleccion::find()->where(['estatus' => Yii::$app->params['publicado']])->andWhere(['OR','fkTipo' => Yii::$app->params['EJECUTIVO'], 'fkTipo' => Yii::$app->params['GRATIS']])->all();
        } else {
            $this->models = Coleccion::find()->where(['estatus' => Yii::$app->params['publicado']])->andWhere(['fkTipo' => Yii::$app->params['GRATIS']])->all();
        }
        
    }
    public function getColecciones()
    {
      return $this->models;
    }

    public function run(){
        return $this->render('showColecciones',['models'=>$this->models]);
    }

}


?>