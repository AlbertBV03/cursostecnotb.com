<?php

namespace app\controllers;

use app\models\Manualdetalle;
use app\models\ManualdetalleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\ManualSearch;
use Yii;

/**
 * ManualdetalleController implements the CRUD actions for Manualdetalle model.
 */
class ManualdetalleController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'only' => ['catalogodetalle', 'hojasmanual'], // Acción a la que se aplica esta regla
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['catalogodetalle'], // Acción catalogo
                        'roles' => ['@'], // Solo usuarios autenticados
                    ],
                    [
                        'allow' => true,
                        'actions' => ['hojasmanual'], // Acción catalogocursos
                        'roles' => ['@'], // Solo usuarios autenticados
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all Manualdetalle models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ManualdetalleSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Manualdetalle model.
     * @param int $ID ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($ID)
    {
        $model = Manualdetalle::findOne($ID);

        return $this->render('view', [
            'model' => $model,
        ]);
    }

    public function actionViewhojas($ID)
    {
        $model = $this->findModel($ID);

        return $this->render('viewhojas', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new Manualdetalle model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Manualdetalle();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'ID' => $model->ID]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Manualdetalle model.
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
     * Deletes an existing Manualdetalle model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $ID ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($ID)
    {
        $this->findModel($ID)->delete();

        return $this->redirect(['catalogodetalle']);
    }

    /**
     * Finds the Manualdetalle model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $ID ID
     * @return Manualdetalle the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($ID)
    {
        if (($model = Manualdetalle::findOne(['ID' => $ID])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionCatalogodetalle()
    {
        $searchModel = new ManualdetalleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('catalogodetalle', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionHojasmanual($ID)
    {
        $searchModel = new ManualdetalleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['fk_manual' => $ID]); // Agrega esta línea para filtrar por fk_manual

        return $this->render('hojasmanual', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionManuales($ID)
    {

        $manuales = Manual::find()->where(['fk_curso' => $ID])->all();

        return $this->render('manuales', [
            'curso' => $curso,
            'manuales' => $manuales,
        ]);
    }
}
