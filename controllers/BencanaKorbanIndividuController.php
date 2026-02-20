<?php

namespace app\controllers;

use app\models\BencanaKorbanIndividu;
use app\models\BencanaKorbanIndividuSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BencanaKorbanIndividuController implements the CRUD actions for BencanaKorbanIndividu model.
 */
class BencanaKorbanIndividuController extends Controller
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
     * Lists all BencanaKorbanIndividu models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new BencanaKorbanIndividuSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single BencanaKorbanIndividu model.
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
     * Creates a new BencanaKorbanIndividu model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new BencanaKorbanIndividu();

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
     * Updates an existing BencanaKorbanIndividu model.
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
     * Deletes an existing BencanaKorbanIndividu model.
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
     * Finds the BencanaKorbanIndividu model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return BencanaKorbanIndividu the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionVerifikasi($id)
    {
        $model = $this->findModel($id);
        // Only kelurahan can verify
        // if (Yii::$app->user->identity->role != 'kelurahan') { ... } 

        $verifikasi = new \app\models\BencanaKorbanVerifikasi();
        $verifikasi->korban_id = $model->id;
        $verifikasi->tahap = 'Verifikasi';
        $verifikasi->status = 'Disetujui'; // Default approved
        $verifikasi->processed_by = \Yii::$app->user->id;
        $verifikasi->processed_at = date('Y-m-d H:i:s');
        
        if ($verifikasi->save()) {
            $model->status_akhir = 'Verifikasi';
            $model->save(false);
            \Yii::$app->session->setFlash('success', 'Data berhasil diverifikasi.');
        } else {
            \Yii::$app->session->setFlash('error', 'Gagal memverifikasi data.');
        }

        return $this->redirect(['index']);
    }

    public function actionValidasi($id)
    {
        $model = $this->findModel($id);
        
        $verifikasi = new \app\models\BencanaKorbanVerifikasi();
        $verifikasi->korban_id = $model->id;
        $verifikasi->tahap = 'Validasi';
        $verifikasi->status = 'Disetujui';
        $verifikasi->processed_by = \Yii::$app->user->id;
        $verifikasi->processed_at = date('Y-m-d H:i:s');

        if ($verifikasi->save()) {
            $model->status_akhir = 'Validasi';
            $model->save(false);
            \Yii::$app->session->setFlash('success', 'Data berhasil divalidasi.');
        } else {
            \Yii::$app->session->setFlash('error', 'Gagal memvalidasi data.');
        }

        return $this->redirect(['index']);
    }

    public function actionApprove($id)
    {
        $model = $this->findModel($id);
        
        $verifikasi = new \app\models\BencanaKorbanVerifikasi();
        $verifikasi->korban_id = $model->id;
        $verifikasi->tahap = 'Approval';
        $verifikasi->status = 'Disetujui';
        $verifikasi->processed_by = \Yii::$app->user->id;
        $verifikasi->processed_at = date('Y-m-d H:i:s');

        if ($verifikasi->save()) {
            $model->status_akhir = 'Approved';
            $model->save(false);
            \Yii::$app->session->setFlash('success', 'Data berhasil disetujui.');
        } else {
            \Yii::$app->session->setFlash('error', 'Gagal menyetujui data.');
        }

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = BencanaKorbanIndividu::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
