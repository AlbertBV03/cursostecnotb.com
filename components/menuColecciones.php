<?php
namespace app\components;
use yii;
use yii\base\Widget;
use app\models\Manual;
use app\models\Coleccion;
use app\models\Subcoleccion;
use app\models\Subcoleccionmanual;
use webvimark\modules\UserManagement\models\User;

class menuColecciones extends Widget{
    public $models;
    public $coleccionsubcategoria;
    public $manual;
    public $manuales;

    public function init(){
        parent::init();
       if ( User::hasPermission('verManualesWeb') ){
        $this->models = Coleccion::find()->where(['estatus' => Yii::$app->params['publicado']])->andWhere(['OR','fkTipo' => Yii::$app->params['EJECUTIVO'], 'fkTipo' => Yii::$app->params['GRATIS']])->all();
        $this->manual = Manual::find()->select(['IDManual'])->where(['fkStatus' => Yii::$app->params['publicado']])->andWhere(['OR','fkTipo' => Yii::$app->params['EJECUTIVO'], 'fkTipo' => Yii::$app->params['GRATIS']])->all();
       } else {
        $this->models = Coleccion::find()->where(['estatus' => Yii::$app->params['publicado']])->andWhere(['fkTipo' => Yii::$app->params['GRATIS']])->all();
        $this->manual = Manual::find()->select(['IDManual'])->where(['fkStatus' => Yii::$app->params['publicado']])->andWhere(['fkTipo' => Yii::$app->params['GRATIS']])->all();
       }
        $this->coleccionsubcategoria = Subcoleccion::find()->where(['estatus' => Yii::$app->params['publicado']])->all();
        $this->manuales = Subcoleccionmanual::find($this->manual)->all();

    }
    /* public function getColecciones()
    {
      return [$this->models, $this->coleccionsubcategoria, $this->manuales];
    } */

    public function run(){
        return $this->render('showMenu',['models'=>$this->models, 'coleccionSubcategoria'=>$this->coleccionsubcategoria,'manuales'=>$this->manuales]);
    }

}


?>