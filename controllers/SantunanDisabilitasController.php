<?php

namespace app\controllers;

use Yii;
use app\models\SantunanDisabilitas;
use app\models\SantunanDisabilitasSearch;
use app\models\Kecamatan;
use app\models\Kelurahan;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;

/**
 * SantunanDisabilitasController implements the CRUD actions for SantunanDisabilitas model.
 */
class SantunanDisabilitasController extends Controller
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
     * Lists all SantunanDisabilitas models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new SantunanDisabilitasSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SantunanDisabilitas model.
     * @param string $id ID
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
     * Creates a new SantunanDisabilitas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new SantunanDisabilitas();

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
     * Creates a new SantunanDisabilitas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionInput()
    {
        $model = new SantunanDisabilitas();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->kecamatan_nama = strtoupper(@Kecamatan::find()->where(['id_lama' => $model->kecamatan_id])->one()->nama);
                $model->kelurahan_nama = strtoupper(@Kelurahan::find()->where(['kelurahan_id' => $model->kelurahan_id])->one()->nama);
                $model->kecamatan_nama_pemohon = strtoupper(@Kecamatan::find()->where(['id_lama' => $model->kecamatan_id_pemohon])->one()->nama);
                $model->kelurahan_nama_pemohon = strtoupper(@Kelurahan::find()->where(['kelurahan_id' => $model->kelurahan_id_pemohon])->one()->nama);
                
                $model->foto_ktp = UploadedFile::getInstance($model, 'foto_ktp');
                $model->foto_kk = UploadedFile::getInstance($model, 'foto_kk');
                $model->foto = UploadedFile::getInstance($model, 'foto');
                $model->foto_id_dtks = UploadedFile::getInstance($model, 'foto_id_dtks');
                $model->foto_surat_permohonan = UploadedFile::getInstance($model, 'foto_surat_permohonan');
                $model->foto_surat_pengantar = UploadedFile::getInstance($model, 'foto_surat_pengantar');

                $path = 'uploads/santunan_disabilitas/';
                if (!is_dir($path)) {
                    mkdir($path, 0777, true);
                }

                $ktp_filename = 'ktp_' . time() . '.' . $model->foto_ktp->extension;
                $kk_filename = 'kk_' . time() . '.' . $model->foto_kk->extension;
                $foto_filename = 'foto_' . time() . '.' . $model->foto->extension;
                $foto_id_dtks_filename = 'foto_id_dtks_' . time() . '.' . $model->foto_id_dtks->extension;
                $foto_surat_permohonan_filename = 'foto_surat_permohonan_' . time() . '.' . $model->foto_surat_permohonan->extension;
                $foto_surat_pengantar_filename = 'foto_surat_pengantar_' . time() . '.' . $model->foto_surat_pengantar->extension;

                $model->foto_ktp->saveAs($path . $ktp_filename);
                $model->foto_kk->saveAs($path . $kk_filename);
                $model->foto->saveAs($path . $foto_filename);
                $model->foto_id_dtks->saveAs($path . $foto_id_dtks_filename);
                $model->foto_surat_permohonan->saveAs($path . $foto_surat_permohonan_filename);
                $model->foto_surat_pengantar->saveAs($path . $foto_surat_pengantar_filename);
               
                $model->foto_ktp = $ktp_filename;
                $model->foto_kk = $kk_filename;
                $model->foto = $foto_filename;
                $model->foto_id_dtks = $foto_id_dtks_filename;
                $model->foto_surat_permohonan = $foto_surat_permohonan_filename;
                $model->foto_surat_pengantar = $foto_surat_pengantar_filename;
            
                $model->verifikasi="Belum";
                $model->validasi="Belum";
                $model->status_verifikasi="Belum";
                $model->status_validasi="Belum";
                $model->approved="Belum";
                $model->status_approval="Belum";
               
                $model->tanggal_permohonan = date('Y-m-d');
                $model->dibuat=@Yii::$app->user->identity->username;
                $model->created_at = date('Y-m-d H:i:s');
                $model->updated_at = date('Y-m-d H:i:s');
                if ($model->save(false)) {
                    Yii::$app->session->setFlash('success', 'Pengajuan berhasil dikirim.');
                    return $this->redirect(['listdata']);
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('input', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing SantunanDisabilitas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id ID
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
     * Deletes an existing SantunanDisabilitas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the SantunanDisabilitas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id ID
     * @return SantunanDisabilitas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SantunanDisabilitas::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

        public function actionListdata()
    {
        $request = Yii::$app->request;
        $kecamatan_id = @Yii::$app->user->identity->kecamatan_id;
        $kelurahan_id = @Yii::$app->user->identity->kelurahan_id;
        $username = @Yii::$app->user->identity->username;
        $role = @Yii::$app->user->identity->role;
        $nama_kecamatan = strtoupper(@Kecamatan::find()->where(['id_lama' => $kecamatan_id])->one()->nama);
        $nama_kelurahan = strtoupper(@Kelurahan::find()->where(['kelurahan_id' => $kelurahan_id])->one()->nama);
        // echo '<pre>';
        // print_r(@$nama_kecamatan);
        // print_r(@$nama_kelurahan);
        // echo '</pre>';
        // exit;
        $query=null;
        if ($role=='kelurahan') {
            $query = SantunanDisabilitas::find()
                ->where(['status_verifikasi' => "Belum"])
                ->andWhere(['kecamatan_nama' => $nama_kecamatan])
                ->andWhere(['kelurahan_nama' => $nama_kelurahan])
                ->orWhere(['diverifikasi' => $username]);
        }elseif($role=='kecamatan'){
            $query = SantunanDisabilitas::find()
                ->where(['status_validasi' => "Belum"])
                ->andWhere(['kecamatan_nama' => $nama_kecamatan])
                ->orWhere(['divalidasi' => $username]);
                // ->andWhere(['kelurahan' => $nama_kelurahan]);
                // ->orWhere(['dibuat' => $pembuat]);
        }elseif($role=='dinsos'){
            $query = SantunanDisabilitas::find()
                ->where(['approved' => "Belum"])
                ->orWhere(['approved_by' => $username]);
                // ->andWhere(['kecamatan' => $nama_kecamatan])
                // ->andWhere(['kelurahan' => $nama_kelurahan]);
                // ->orWhere(['dibuat' => $pembuat]);
        }
        
    
        // Tambahkan filter berdasarkan parameter GET dari pencarian GridView
        if ($search = $request->get('search')) {
            $query->andWhere([
                'or',
                ['like', 'nama', $search],
                ['like', 'nik', $search],
                ['like', 'alamat', $search],
                ['like', 'rt', $search],
                ['like', 'rw', $search],
                ['like', 'dibuat', $search],
                ['like', 'diverifikasi', $search],
                ['like', 'divalidasi', $search],
                ['like', 'approved_by', $search],
            ]);
        }
        if ($request->get('status_verifikasi')) {
            $query->andWhere(['status_verifikasi' => $request->get('status_verifikasi')]);
        }
        if ($request->get('status_validasi')) {
            $query->andWhere(['status_validasi' => $request->get('status_validasi')]);
        }
        if ($request->get('approved')) {
            $query->andWhere(['approved' => $request->get('approved')]);
        }
    
        $dataProvider = new \yii\data\ActiveDataProvider([
            'query' => $query,
            'pagination' => ['pageSize' => 10],
            'sort' => ['defaultOrder' => ['id' => SORT_DESC]],
        ]);
    
        return $this->render('listdata', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionVerifikasi($id)
    {
        $model = $this->findModel($id);
        if (Yii::$app->request->isPost) {
            $model->status_verifikasi=@$_POST['SantunanDisabilitas']['status_verifikasi'];
            $model->tanggal_verifikasi=@$_POST['SantunanDisabilitas']['tanggal_verifikasi'];
            $model->keterangan_verifikasi=@$_POST['SantunanDisabilitas']['keterangan_verifikasi'];
            $model->diverifikasi=@Yii::$app->user->identity->username;
            $model->save(false);
            Yii::$app->session->setFlash('success', 'Data '.$model->nama.' berhasil diverifikasi!');
            return $this->redirect(['listdata']);
        }
    }

    public function actionValidasi($id)
    {
        $model = $this->findModel($id);
        if (Yii::$app->request->isPost) {
            $model->status_validasi=@$_POST['SantunanDisabilitas']['status_validasi'];
            $model->tanggal_validasi=@$_POST['SantunanDisabilitas']['tanggal_validasi'];
            $model->keterangan_validasi=@$_POST['SantunanDisabilitas']['keterangan_validasi'];
            $model->divalidasi=@Yii::$app->user->identity->username;
            $model->save(false);
            Yii::$app->session->setFlash('success', 'Data '.$model->nama.' berhasil divalidasi!');
            return $this->redirect(['listdata']);
        }
    }

    public function actionApproved($id)
    {
        $model = $this->findModel($id);
        if (Yii::$app->request->isPost) {
            $model->approved=@$_POST['SantunanDisabilitas']['approved'];
            $model->tanggal_approval=@$_POST['SantunanDisabilitas']['tanggal_approval'];
            $model->keterangan_approval=@$_POST['SantunanDisabilitas']['keterangan_approval'];
            $model->approved_by=@Yii::$app->user->identity->username;
            $model->save(false);
            Yii::$app->session->setFlash('success', 'Data '.$model->nama.' berhasil disetujui!');
            return $this->redirect(['listdata']);
        }
    }
}
