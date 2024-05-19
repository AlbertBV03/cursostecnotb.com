<?php

namespace app\controllers;

use Yii;
use app\models\User;
use yii\web\Controller;
use yii\web\UploadedFile;
use app\models\Datospersonales;

class PerfilController extends Controller
{
    public function actionIndex(){
        $id = Yii::$app->user->id;
        $user = User::findOne($id);
        $Datospersonales = Datospersonales::findOne(['fk_user' => $id]);
        
        return $this->render('index', [
            'user' => $user,
            'Datospersonales' => $Datospersonales,
        ]);
    }

    public function actionEditar(){

        $id = Yii::$app->user->id;
        $user = User::findOne($id);
        $Datospersonales = Datospersonales::findOne(['fk_user' => $id]);

        if (Yii::$app->request->isPost) {
            $postData = Yii::$app->request->post();
            $user->email = $postData['User']['email'];
            $Datospersonales->nombre = $postData['Datospersonales']['nombre'];
            $Datospersonales->telefono = $postData['Datospersonales']['telefono'];
            
            $user->save(false);
            $Datospersonales->save(false);
            return $this->redirect('index');
        }

        return $this->render('editar', [
            'user' => $user,
            'Datospersonales' => $Datospersonales,
        ]);
    }

}
