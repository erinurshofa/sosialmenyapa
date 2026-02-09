<?php

namespace app\controllers;

use app\models\Psm;
use app\models\PsmSearch;
use app\models\Users;
use app\models\ActionsHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;
use Yii;

/**
 * PsmController implements the CRUD actions for Psm model.
 */
class PsmController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
             'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
                'denyCallback' => function ($rule, $action) {
                    return $this->redirect(['auth/login']);
                }
            ],
        ];
    }

    /**
     * Lists all Psm models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PsmSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Psm model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Psm model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Psm();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Psm model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Psm model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Psm model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Psm the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Psm::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionTes(){
        return ActionsHelper::getPsm();
    }

    // public function actionListpsm(){
    //     $data = Users::find()->where(['status'=>'Belum Aktif', 'role'=>'psm'])->all();
    //     return $this->render('listpsm', [
    //         'data' => $data,
    //     ]);
    // }
public function actionListpsm()
{
    $searchModel = new \app\models\UsersSearch();
    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

    // Tambahkan filter tambahan di sini
    $searchModel->status = 'Belum Aktif';
    $searchModel->role = 'psm';

    $dataProvider->query->andWhere([
        'status' => 'Belum Aktif',
        'role' => 'psm',
    ]);

    return $this->render('listpsm', [
        'searchModel' => $searchModel,
        'dataProvider' => $dataProvider,
    ]);
}



}
