<?php

namespace app\controllers;

use Yii;
use app\models\Curso;
use yii\helpers\Json;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\Cursoinscrito;
use app\models\Datospersonales;
use yii\web\NotFoundHttpException;
use app\models\search\CursoinscritoSearch;
use webvimark\modules\UserManagement\models\User;
use webvimark\modules\UserManagement\models\search\UserSearch;

/**
 * CursoinscritoController implements the CRUD actions for Cursoinscrito model.
 */
class CursoinscritoController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Cursoinscrito models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new CursoinscritoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Lists all Cursoinscrito models.
     *
     * @return string
     */
    public function actionMisCursos()
    {
        $cursos = Cursoinscrito::find()->where(['fk_inscrito' => Yii::$app->user->getId()])->all();

        return $this->render('miscursos', [
            'cursos' => $cursos,
        ]);
    }

    /**
     * Displays a single Cursoinscrito model.
     * @param int $ID ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($ID)
    {
        return $this->render('view', [
            'model' => $this->findModel($ID),
        ]);
    }

    /**
     * Displays all records from a single Curso model.
     * @param int $ID ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionCursoInscrito($ID)
    {
        $curso = Curso::find()->where(['ID' => $ID])->one();
        /* $inscritos = Cursoinscrito::find()->where(['fk_curso' => $ID])->all(); */
        $searchModelInscrito = new CursoinscritoSearch();
        $dataProviderInscrito = $searchModelInscrito->searchInscrito($ID, $this->request->queryParams);
        $searchModelUsers = new UserSearch();
        $dataProviderUsers = $searchModelUsers->search($this->request->queryParams);
        /* var_dump($inscritos);
        die; */
        $cursoID = $ID;
        $curso = new Cursoinscrito();

        return $this->render('cursoinscrito', [
            'curso' => $curso,
            'searchModelInscrito' => $searchModelInscrito,
            'dataProviderInscrito' => $dataProviderInscrito,
            'searchModelUsers' => $searchModelUsers,
            'dataProviderUsers' => $dataProviderUsers,
            'cursoID' => $cursoID,
            'curso' => $curso,
        ]);
    }

    /**
     * Creates a new Cursoinscrito model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Cursoinscrito();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'ID' => $model->ID]);
            }
        } else {
            $model->loadDefaultValues();
        }

        if (Yii::$app->request->isAjax) {
            return $this->renderAjax('create', [
                'model' => $model,
            ]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Creates a new Cursoinscrito model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionAsignar()
    {
        if(Yii::$app->request->isAjax) {
            $req            = Yii::$app->request->post('datos');
            $_ID            = $req['userID'];
            $_subcolID         = $req['cursoID'];
            //Busca el valor siguiente para asignar el numero de evaluador 2, 3
            //$docente = SeDocente::findOne(['ID' => $_ID]);
            /* var_dump($_subcolID);
            die; */
            // Inicia transaccion
            $transaction = Yii::$app->db->beginTransaction();
            try {
                // crea el usuario inscrito
                $model = new Cursoinscrito();
                $datosPer = Datospersonales::find()->select('ID')->where(['fk_user' => $_ID])->one();
                $model->fk_curso  = $_subcolID;
                $model->fk_inscrito    = $_ID;
                $model->status = Yii::$app->params['enCurso'];
                $model->fk_telefono = $datosPer->ID;
                /* var_dump($datosPer);
            die; */
                if($model->save()) {
                       $transaction->commit(); //ejecuta la grabación con el commit
                       return Json::encode([ 'id' => $_ID, 'subcol' => $_subcolID ]);
                    //}
                    return '1';
                } else {
                    return '0';
                }
            }catch(Exception $e){
                $transaction->rollback(); //se regresa todo a su estado anterior
                throw $e;
            }  
        } //cierra if is ajax
    }

    /**
     * Updates an existing Cursoinscrito model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $ID ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($ID)
    {
        $model = $this->findModel($ID);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ID' => $model->ID]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Cursoinscrito model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $ID ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($ID)
    {
        $this->findModel($ID)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Deletes an existing Cursoinscrito model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $ID ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionRemoverAsignado($ID, $IDCurso)
    {
        $this->findModel($ID)->delete();

        return $this->redirect(['cursoinscrito/curso-inscrito', 'ID' => $IDCurso]);
    }

    /**
     * Finds the Cursoinscrito model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $ID ID
     * @return Cursoinscrito the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($ID)
    {
        if (($model = Cursoinscrito::findOne(['ID' => $ID])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
