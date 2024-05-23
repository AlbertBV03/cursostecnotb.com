<?php

namespace app\controllers;

use Yii;
use app\models\Examen;
use yii\web\Controller;
use app\models\Pregunta;
use yii\filters\VerbFilter;
use app\models\ExamenSearch;
use app\models\PreguntaSearch;
use yii\web\NotFoundHttpException;

/**
 * ExamenController implements the CRUD actions for Examen model.
 */
class ExamenController extends Controller
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
     * Lists all Examen models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ExamenSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Examen model.
     * @param int $ID ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($ID)
    {
        return $this->renderAjax('view', [
            'model' => $this->findModel($ID),
        ]);
    }

    /**
     * Creates a new Examen model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Examen();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['index']);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->renderAjax('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Examen model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $ID ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($ID)
    {
        $model = $this->findModel($ID);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->renderAjax('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Examen model.
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
     * Finds the Examen model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $ID ID
     * @return Examen the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($ID)
    {
        if (($model = Examen::findOne(['ID' => $ID])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionPreguntas($ID)
    {
        $examen = Examen::find()->where(['ID' => $ID])->one();
        $model = Pregunta::find()->where(['fk_examen' => $ID])->all();

        return $this->render('preguntas', [
            'examen' => $examen,
            'model' => $model,
        ]);
    }

    public function actionVerpregunta($ID)
    {
        $model = Pregunta::find()->where(['ID' => $ID])->one();
        $model->fk_examen = $examen;

        return $this->renderAjax('verpregunta', [
            'model' => $model,
        ]);
    }

    public function actionCrearpregunta($examen)
    {
        $model = new Pregunta();
        $model->fk_examen = $examen;

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['preguntas', 'ID' => $examen]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->renderAjax('crearpregunta', [
            'model' => $model,
        ]);
    }

    public function actionEditarpregunta($ID,$examen)
    {
        $model = Pregunta::findOne(['ID' => $ID]);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['preguntas', 'ID' => $examen]);
        }

        return $this->renderAjax('editarpregunta', [
            'model' => $model,
        ]);
    }

    public function actionEliminarpregunta($ID,$examen)
    {
        $model = Pregunta::findOne(['ID' => $ID]);
        $model->delete();

        return $this->redirect(['preguntas', 'ID' => $examen]);
    }
}
