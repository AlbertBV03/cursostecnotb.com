<?php

namespace app\controllers;

use Yii;
use app\models\Manual;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;
use app\models\ManualSearch;
use app\models\Manualdetalle;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;

/**
 * ManualController implements the CRUD actions for Manual model.
 */
class ManualController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
{
    return [
        'access' => [
            'class' => AccessControl::className(),
            'only' => ['catalogo'], // Acción a la que se aplica esta regla
            'rules' => [
                [
                    'allow' => true,
                    'roles' => ['@'], // Solo usuarios autenticados
                ],
            ],
        ],
    ];
}

    /**
     * Lists all Manual models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ManualSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Manual model.
     * @param int $ID ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($ID)
    {
        $model = Manual::findOne($ID);

        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new Manual model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Manual();

        $Fotografia = UploadedFile::getInstance($model, 'imagen');

        if ( $model->load(Yii::$app->request->post())) {
            if ($Fotografia !== null) {
                $nombreAleatorio = Yii::$app->security->generateRandomString(10);
                $extension = $Fotografia->getExtension();
                $rutaGuardar = Yii::getAlias('@app/web/images/fotos/') . $nombreAleatorio . '.' . $extension;
        
                if (!is_dir(dirname($rutaGuardar))) {
                    mkdir(dirname($rutaGuardar), 0777, true);
                }
        
                if (!empty($model->imagen)) {
                    unlink(Yii::getAlias('@app/web/') . $model->imagen);
                }
        
                $Fotografia->saveAs($rutaGuardar);
                $model->imagen = 'images/fotos/' . $nombreAleatorio . '.' . $extension;
            }
            
            $model->save(false);
            return $this->redirect(['catalogo']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Manual model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $ID ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($ID)
    {
        $model = $this->findModel($ID);

        $Fotografia = UploadedFile::getInstance($model, 'imagen');

        if ( $model->load(Yii::$app->request->post())) {
            if ($Fotografia !== null) {
                $nombreAleatorio = Yii::$app->security->generateRandomString(10);
                $extension = $Fotografia->getExtension();
                $rutaGuardar = Yii::getAlias('@app/web/images/fotos/') . $nombreAleatorio . '.' . $extension;
        
                if (!is_dir(dirname($rutaGuardar))) {
                    mkdir(dirname($rutaGuardar), 0777, true);
                }
        
                if (!empty($model->imagen)) {
                    unlink(Yii::getAlias('@app/web/') . $model->imagen);
                }
        
                $Fotografia->saveAs($rutaGuardar);
                $model->imagen = 'images/fotos/' . $nombreAleatorio . '.' . $extension;
            }
            
            $model->save(false);
            return $this->redirect(['catalogo']);
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Manual model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $ID ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($ID)
{
    // Eliminar manualdetalles relacionados
    Manualdetalle::deleteAll(['fk_manual' => $ID]);

    // Eliminar manual
    $this->findModel($ID)->delete();

    return $this->redirect(['catalogo']);
}

    /**
     * Finds the Manual model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $ID ID
     * @return Manual the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($ID)
    {
        if (($model = Manual::findOne(['ID' => $ID])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionCatalogo()
{
    $searchModel = new ManualSearch();
    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

    return $this->render('catalogo', [
        'searchModel' => $searchModel,
        'dataProvider' => $dataProvider,
    ]);
}
}
