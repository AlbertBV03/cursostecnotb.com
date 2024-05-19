<?php

namespace app\controllers;

use Yii;
use app\models\Curso;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;
use app\models\search\CursoSearch;
use yii\web\NotFoundHttpException;

/**
 * CursoController implements the CRUD actions for Curso model.
 */
class CursoController extends Controller
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
     * Lists all Curso models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new CursoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Lists all Curso models.
     *
     * @return string
     */
    public function actionListado()
    {
        $searchModel = new CursoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('listado', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Curso model.
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
     * Creates a new Curso model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Curso();
        $estatus = ['1' => 'Capturado', '2' => 'Publicado', '3' => 'Archivado', '4' => 'Cancelado', '5' => 'Proceso' ];

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $imageFile = UploadedFile::getInstance($model, 'imageFile');
                if (!is_null($imageFile)) {
                    $nameFileDelete= $model->imageFile; // se cambio de img a imageFile
                    $tmp = (explode(".", $imageFile->name));
                    $ext = end($tmp);
                   // generate a unique file name to prevent duplicate filenames
                    $model->portada = Yii::$app->security->generateRandomString().".{$ext}";
                     // the path to save file, you can set an uploadPath
                     // in Yii::$app->params (as used in example below)                       
                     Yii::$app->params['uploadPath'] = Yii::$app->basePath . '/web/uploads/portadacurso/';
                     $path = Yii::$app->params['uploadPath'] . $model->portada;
                     $imageFile->saveAs($path);
                }

                if ($model->save()){
                return $this->redirect(['view', 'ID' => $model->ID]);
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        if (Yii::$app->request->isAjax) {
            return $this->renderAjax('create', [
                'model' => $model,
                'estatus' => $estatus,
            ]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'estatus' => $estatus,
            ]);
        }
    }

    /**
     * Updates an existing Curso model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $ID ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($ID)
    {
        $model = $this->findModel($ID);
        $estatus = ['1' => 'Capturado', '2' => 'Publicado', '3' => 'Archivado', '4' => 'Cancelado', '5' => 'Proceso' ];

        if ($this->request->isPost && $model->load($this->request->post())) {
            $imageFile = UploadedFile::getInstance($model, 'imageFile');
            if (!is_null($imageFile)) {
                $nameFileDelete= $model->imageFile; // se cambio de img a imageFile
                $tmp = (explode(".", $imageFile->name));
                $ext = end($tmp);
                // generate a unique file name to prevent duplicate filenames
                $model->portada = Yii::$app->security->generateRandomString().".{$ext}";
                    // the path to save file, you can set an uploadPath
                    // in Yii::$app->params (as used in example below)                       
                    Yii::$app->params['uploadPath'] = Yii::$app->basePath . '/web/uploads/portadacurso/';
                    $path = Yii::$app->params['uploadPath'] . $model->portada;
                    $imageFile->saveAs($path);
            }
            if ($model->save()){
                return $this->redirect(['view', 'ID' => $model->ID]);
            }
        }

        if (Yii::$app->request->isAjax) {
            return $this->renderAjax('update', [
                'model' => $model,
                'estatus' => $estatus,
            ]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'estatus' => $estatus,
            ]);
        }
    }

    /**
     * Deletes an existing Curso model.
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
     * Finds the Curso model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $ID ID
     * @return Curso the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($ID)
    {
        if (($model = Curso::findOne(['ID' => $ID])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
