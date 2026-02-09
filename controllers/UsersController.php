<?php

namespace app\controllers;

use Yii;
use app\models\Users;
use app\models\UsersSearch;
use app\models\ActSecure;
use app\models\ActionsHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;
use app\models\Kelurahan2;
use app\models\Roles;
use yii\web\Response;

class UsersController extends Controller
{
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

    public function actionIndex()
    {
        set_time_limit(300);
        $searchModel = new UsersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $model = new Users();

        if ($model->load(Yii::$app->request->post())) {
            // $model->password = Yii::$app->security->generatePasswordHash($model->password);
            $model->password_hint=$model->password;
            $model->password=ActSecure::encryptPassword($model->password);
            $model->role_id=@Roles::find()->where(['kode'=>$model->role])->one()->id;
            $model->status='Aktif';
            // print_r($model->attributes);exit;
            if ($model->save(false)) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            if (!empty($model->password)) {
                $model->password = ActSecure::encryptPassword($model->password);
            } else {
                unset($model->password);
            }

            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }


    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Users::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionEditProfile()
    {
        $model = Users::findOne(Yii::$app->user->identity->id);

        if (!$model) {
            throw new NotFoundHttpException('User tidak ditemukan.');
        }

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                // Jika ada upload foto baru
                $file = UploadedFile::getInstance($model, 'foto');
                if ($file) {
                    $fileName = 'uploads/' . Yii::$app->user->identity->id . '_' . time() . '.' . $file->extension;
                    $file->saveAs($fileName);
                    $model->foto = $fileName;
                }

                if (!empty($model->new_password)) {
                    $model->password = ActSecure::encryptPassword($model->new_password);
                    $model->password_hint=$model->new_password;
                }

                $model->save(false);
                Yii::$app->session->setFlash('success', 'Profil berhasil diperbarui.');
                return $this->refresh();
            }
        }

        return $this->render('edit-profile', [
            'model' => $model,
        ]);
    }

    public function actionGeneratePassword()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return ['password' => ActionsHelper::generateSecurePassword()];
    }

    // public function actionGenerateUsername()
    // {
    //     Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    //     return ['username' => ActionsHelper::generateUsername()];
    // }

    public function actionGetKelurahan()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
    
        $out = [];
        $parents = Yii::$app->request->post('depdrop_parents');
    
        if ($parents != null) {
            $kecamatan_id = $parents[0]; // Ambil ID Kecamatan
            $kelurahan = Kelurahan2::find()->where(['kecamatan_id' => $kecamatan_id])->all();
    
            foreach ($kelurahan as $kl) {
                $out[] = ['id' => $kl->id, 'name' => $kl->nama];
            }
    
            return ['output' => $out, 'selected' => ''];
        }
    
        return ['output' => '', 'selected' => ''];
    }

    public function actionGenerateUsername($role, $kecamatan = null, $kelurahan = null) {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        if (!$role) {
            return ['error' => 'Role tidak boleh kosong'];
        }
    
        $db = Yii::$app->db;
    
        do {
            if ($role === "kecamatan" && $kecamatan) {
                $name = $db->createCommand("SELECT nama FROM kecamatan WHERE id_lama=:id")
                           ->bindValue(':id', $kecamatan)
                           ->queryScalar();
            } elseif (($role === "kelurahan" || $role === "psm") && $kelurahan) {
                $name = $db->createCommand("SELECT nama FROM kelurahan2 WHERE id=:id")
                           ->bindValue(':id', $kelurahan)
                           ->queryScalar();
                if ($role === "psm") {
                    $name = "psm_" . $name;
                }
            } else {
                // Jika role bukan kecamatan/kelurahan/psm, gunakan metode acak
                return ['username' => ActionsHelper::generateUsername()];
            }
    
            // Format username
            $name = strtolower(str_replace(' ', '_', trim($name)));
            $randomNumber = rand(10, 99);
            $username = "{$name}_{$randomNumber}";
    
            // Cek apakah username sudah ada
            $exists = $db->createCommand("SELECT COUNT(*) FROM users WHERE username=:username")
                         ->bindValue(':username', $username)
                         ->queryScalar();
    
        } while ($exists > 0); // Ulangi jika username sudah ada

        return ['username' => $username];
    }

    public function actionActivate($id)
    {
        $model = Users::findOne($id);
        if (!$model) {
            throw new NotFoundHttpException('Data tidak ditemukan.');
        }

        // Buat password baru dan simpan (jika password awal tidak tersedia secara plain text)
        $model->status = 'Aktif';

        if ($model->save(false)) {
            // Kirim email ke pemohon
            Yii::$app->mailer->compose()
                ->setFrom(['sosialmenyapa@gmail.com' => 'Dinas Sosial Kota Semarang (Sosial Menyapa)'])
                ->setTo($model->email)
                ->setSubject('Akun PSM Anda Telah Diaktifkan')
                ->setHtmlBody("
                    <p>Yth. {$model->nama_lengkap},</p>
                    <p>Akun Anda sebagai PSM telah <strong>diaktifkan</strong>.</p>
                    <p>Berikut adalah detail akun Anda:</p>
                    <ul>
                        <li><strong>Username:</strong> {$model->username}</li>
                        <li><strong>Password:</strong> {$model->password_hint}</li>
                    </ul>
                    <p>Silakan login di sistem untuk melanjutkan proses.</p>
                    <p>Disarankan untuk mengganti password setelah login pertama.</p>
                    <br><p>Hormat kami,<br>Dinas Sosial Kota Semarang</p>
                ")
                ->send();

            Yii::$app->session->setFlash('success', 'Akun berhasil diaktifkan dan email telah dikirim.');
        } else {
            Yii::$app->session->setFlash('error', 'Gagal mengaktifkan akun.');
        }

        return $this->redirect(['psm/listpsm']);
    }

    



}
