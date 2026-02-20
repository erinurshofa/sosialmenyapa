<?php

namespace app\controllers;

use Yii;
use app\models\Ppks;
use app\models\Rekap;
use app\models\PpksSearch;
use app\models\DataPpksForm;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Response;
use yii\helpers\Json;
use app\models\Kelurahan;
use app\models\Kota;
use app\models\Kecamatan;
use app\models\Kecamatan2;
use app\models\Kelurahan2;
use app\models\Provinsi;
use app\models\Actions;
use app\models\ActionsHelper;
use app\models\ActSecure;
// use kartik\mpdf\Pdf;
use yii\data\ActiveDataProvider;
// use setasign\Fpdi\Fpdi;
// use setasign\Fpdf\Fpdf;
use Mpdf\Mpdf;



/**
 * PpksController implements the CRUD actions for Ppks model.
 */
class PpksController extends Controller
{
    /**
     * {@inheritdoc}
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
     * Lists all Ppks models.
     * @return mixed
     */
    public function actionListPpksTerlantar()
    {
        $searchModel = new PpksSearch();
        $kecamatan=@Yii::$app->request->queryParams['kecamatan'];
        $kelurahan=@Yii::$app->request->queryParams['kelurahan'];
        $status=@Yii::$app->request->queryParams['status'];
        $jenis_kelamin=@Yii::$app->request->queryParams['jenis_kelamin'];
        $jenis_pmks=@Yii::$app->request->queryParams['jenis_pmks'];
        $anak_balita_terlantar = @Yii::$app->request->queryParams['anak_balita_terlantar'];
        $anak_terlantar = @Yii::$app->request->queryParams['anak_terlantar'];
        $anak_yang_berhadapan_dengan_hukum = @Yii::$app->request->queryParams['anak_yang_berhadapan_dengan_hukum'];
        $anak_jalanan = @Yii::$app->request->queryParams['anak_jalanan'];
        $anak_dengan_kedisabilitasan = @Yii::$app->request->queryParams['anak_dengan_kedisabilitasan'];
        $anak_korban_tindak_kekerasan = @Yii::$app->request->queryParams['anak_korban_tindak_kekerasan'];
        $anak_yang_memerlukan_perlindungan_khusus = @Yii::$app->request->queryParams['anak_yang_memerlukan_perlindungan_khusus'];
        $lanjut_usia_terlantar = @Yii::$app->request->queryParams['lanjut_usia_terlantar'];
        $penyandang_disabilitas = @Yii::$app->request->queryParams['penyandang_disabilitas'];
        $tuna_susila = @Yii::$app->request->queryParams['tuna_susila'];
        $gelandangan = @Yii::$app->request->queryParams['gelandangan'];
        $pengemis = @Yii::$app->request->queryParams['pengemis'];
        $pemulung = @Yii::$app->request->queryParams['pemulung'];
        $kelompok_minoritas = @Yii::$app->request->queryParams['kelompok_minoritas'];
        $bekas_warga_binaan_lembaga_pemasyarakatan = @Yii::$app->request->queryParams['bekas_warga_binaan_lembaga_pemasyarakatan'];
        $orang_dengan_hivaids = @Yii::$app->request->queryParams['orang_dengan_hivaids'];
        $korban_penyalahgunaan_napza = @Yii::$app->request->queryParams['korban_penyalahgunaan_napza'];
        $korban_trafficking = @Yii::$app->request->queryParams['korban_trafficking'];
        $korban_tindak_kekerasan = @Yii::$app->request->queryParams['korban_tindak_kekerasan'];
        $pekerja_migran_bermasalah_sosial = @Yii::$app->request->queryParams['pekerja_migran_bermasalah_sosial'];
        $korban_bencana_alam = @Yii::$app->request->queryParams['korban_bencana_alam'];
        $korban_bencana_sosial = @Yii::$app->request->queryParams['korban_bencana_sosial'];
        $perempuan_rawan_sosial_ekonomi = @Yii::$app->request->queryParams['perempuan_rawan_sosial_ekonomi'];
        $fakir_miskin = @Yii::$app->request->queryParams['fakir_miskin'];
        $keluarga_bermasalah_sosial_psikologis = @Yii::$app->request->queryParams['keluarga_bermasalah_sosial_psikologis'];
        $komunitas_adat_terpencil = @Yii::$app->request->queryParams['komunitas_adat_terpencil'];
        $all_jenis_pmks=@Yii::$app->request->queryParams['all_jenis_pmks'];
        $jenis_ppks_fix=@Yii::$app->request->queryParams['jenis_ppks_fix'];
        
        $searchModel = new PpksSearch([
            "kecamatan"=>@$kecamatan,
            "kelurahan"=>@$kelurahan,
            "jenis_kelamin"=>@$jenis_kelamin,
            "jenis_pmks"=>@$jenis_pmks,
            "anak_balita_terlantar" => @$anak_balita_terlantar,
            "anak_terlantar" => @$anak_terlantar,
            "anak_yang_berhadapan_dengan_hukum" => @$anak_yang_berhadapan_dengan_hukum,
            "anak_jalanan" => @$anak_jalanan,
            "anak_dengan_kedisabilitasan" => @$anak_dengan_kedisabilitasan,
            "anak_korban_tindak_kekerasan" => @$anak_korban_tindak_kekerasan,
            "anak_yang_memerlukan_perlindungan_khusus" => @$anak_yang_memerlukan_perlindungan_khusus,
            "lanjut_usia_terlantar" => @$lanjut_usia_terlantar,
            "penyandang_disabilitas" => @$penyandang_disabilitas,
            "tuna_susila" => @$tuna_susila,
            "gelandangan" => @$gelandangan,
            "pengemis" => @$pengemis,
            "pemulung" => @$pemulung,
            "kelompok_minoritas" => @$kelompok_minoritas,
            "bekas_warga_binaan_lembaga_pemasyarakatan" => @$bekas_warga_binaan_lembaga_pemasyarakatan,
            "orang_dengan_hivaids" => @$orang_dengan_hivaids,
            "korban_penyalahgunaan_napza" => @$korban_penyalahgunaan_napza,
            "korban_trafficking" => @$korban_trafficking,
            "korban_tindak_kekerasan" => @$korban_tindak_kekerasan,
            "pekerja_migran_bermasalah_sosial" => @$pekerja_migran_bermasalah_sosial,
            "korban_bencana_alam" => @$korban_bencana_alam,
            "korban_bencana_sosial" => @$korban_bencana_sosial,
            "perempuan_rawan_sosial_ekonomi" => @$perempuan_rawan_sosial_ekonomi,
            "fakir_miskin" => @$fakir_miskin,
            "keluarga_bermasalah_sosial_psikologis" => @$keluarga_bermasalah_sosial_psikologis,
            "komunitas_adat_terpencil" => @$komunitas_adat_terpencil,
            "all_jenis_pmks"=>@$all_jenis_pmks,
            "jenis_ppks_fix"=>@$jenis_ppks_fix,
            "status"=>@$status,
        ]);
        $dataProvider = $searchModel->search(['PpksSearch'=>['kecamatan'=>$kecamatan,'kelurahan'=>$kelurahan]]);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('list_ppks_terlantar', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Lists all Ppks models.
     * @return mixed
     */
    public function actionIndex()
    {
        set_time_limit(300);
        $searchModel = new PpksSearch();
        $kecamatan=@Yii::$app->request->queryParams['kecamatan'];
        $kelurahan=@Yii::$app->request->queryParams['kelurahan'];
        $status=@Yii::$app->request->queryParams['status'];
        $jenis_kelamin=@Yii::$app->request->queryParams['jenis_kelamin'];
        $jenis_pmks=@Yii::$app->request->queryParams['jenis_pmks'];
        $anak_balita_terlantar = @Yii::$app->request->queryParams['anak_balita_terlantar'];
        $anak_terlantar = @Yii::$app->request->queryParams['anak_terlantar'];
        $anak_yang_berhadapan_dengan_hukum = @Yii::$app->request->queryParams['anak_yang_berhadapan_dengan_hukum'];
        $anak_jalanan = @Yii::$app->request->queryParams['anak_jalanan'];
        $anak_dengan_kedisabilitasan = @Yii::$app->request->queryParams['anak_dengan_kedisabilitasan'];
        $anak_korban_tindak_kekerasan = @Yii::$app->request->queryParams['anak_korban_tindak_kekerasan'];
        $anak_yang_memerlukan_perlindungan_khusus = @Yii::$app->request->queryParams['anak_yang_memerlukan_perlindungan_khusus'];
        $lanjut_usia_terlantar = @Yii::$app->request->queryParams['lanjut_usia_terlantar'];
        $penyandang_disabilitas = @Yii::$app->request->queryParams['penyandang_disabilitas'];
        $tuna_susila = @Yii::$app->request->queryParams['tuna_susila'];
        $gelandangan = @Yii::$app->request->queryParams['gelandangan'];
        $pengemis = @Yii::$app->request->queryParams['pengemis'];
        $pemulung = @Yii::$app->request->queryParams['pemulung'];
        $kelompok_minoritas = @Yii::$app->request->queryParams['kelompok_minoritas'];
        $bekas_warga_binaan_lembaga_pemasyarakatan = @Yii::$app->request->queryParams['bekas_warga_binaan_lembaga_pemasyarakatan'];
        $orang_dengan_hivaids = @Yii::$app->request->queryParams['orang_dengan_hivaids'];
        $korban_penyalahgunaan_napza = @Yii::$app->request->queryParams['korban_penyalahgunaan_napza'];
        $korban_trafficking = @Yii::$app->request->queryParams['korban_trafficking'];
        $korban_tindak_kekerasan = @Yii::$app->request->queryParams['korban_tindak_kekerasan'];
        $pekerja_migran_bermasalah_sosial = @Yii::$app->request->queryParams['pekerja_migran_bermasalah_sosial'];
        $korban_bencana_alam = @Yii::$app->request->queryParams['korban_bencana_alam'];
        $korban_bencana_sosial = @Yii::$app->request->queryParams['korban_bencana_sosial'];
        $perempuan_rawan_sosial_ekonomi = @Yii::$app->request->queryParams['perempuan_rawan_sosial_ekonomi'];
        $fakir_miskin = @Yii::$app->request->queryParams['fakir_miskin'];
        $keluarga_bermasalah_sosial_psikologis = @Yii::$app->request->queryParams['keluarga_bermasalah_sosial_psikologis'];
        $komunitas_adat_terpencil = @Yii::$app->request->queryParams['komunitas_adat_terpencil'];
        $all_jenis_pmks=@Yii::$app->request->queryParams['all_jenis_pmks'];
        $jenis_ppks_fix=@Yii::$app->request->queryParams['jenis_ppks_fix'];
        
        $searchModel = new PpksSearch([
            "kecamatan"=>@$kecamatan,
            "kelurahan"=>@$kelurahan,
            "jenis_kelamin"=>@$jenis_kelamin,
            "jenis_pmks"=>@$jenis_pmks,
            "anak_balita_terlantar" => @$anak_balita_terlantar,
            "anak_terlantar" => @$anak_terlantar,
            "anak_yang_berhadapan_dengan_hukum" => @$anak_yang_berhadapan_dengan_hukum,
            "anak_jalanan" => @$anak_jalanan,
            "anak_dengan_kedisabilitasan" => @$anak_dengan_kedisabilitasan,
            "anak_korban_tindak_kekerasan" => @$anak_korban_tindak_kekerasan,
            "anak_yang_memerlukan_perlindungan_khusus" => @$anak_yang_memerlukan_perlindungan_khusus,
            "lanjut_usia_terlantar" => @$lanjut_usia_terlantar,
            "penyandang_disabilitas" => @$penyandang_disabilitas,
            "tuna_susila" => @$tuna_susila,
            "gelandangan" => @$gelandangan,
            "pengemis" => @$pengemis,
            "pemulung" => @$pemulung,
            "kelompok_minoritas" => @$kelompok_minoritas,
            "bekas_warga_binaan_lembaga_pemasyarakatan" => @$bekas_warga_binaan_lembaga_pemasyarakatan,
            "orang_dengan_hivaids" => @$orang_dengan_hivaids,
            "korban_penyalahgunaan_napza" => @$korban_penyalahgunaan_napza,
            "korban_trafficking" => @$korban_trafficking,
            "korban_tindak_kekerasan" => @$korban_tindak_kekerasan,
            "pekerja_migran_bermasalah_sosial" => @$pekerja_migran_bermasalah_sosial,
            "korban_bencana_alam" => @$korban_bencana_alam,
            "korban_bencana_sosial" => @$korban_bencana_sosial,
            "perempuan_rawan_sosial_ekonomi" => @$perempuan_rawan_sosial_ekonomi,
            "fakir_miskin" => @$fakir_miskin,
            "keluarga_bermasalah_sosial_psikologis" => @$keluarga_bermasalah_sosial_psikologis,
            "komunitas_adat_terpencil" => @$komunitas_adat_terpencil,
            "all_jenis_pmks"=>@$all_jenis_pmks,
            "jenis_ppks_fix"=>@$jenis_ppks_fix,
            "status"=>@$status,
        ]);
        $dataProvider = $searchModel->search(['PpksSearch'=>['kecamatan'=>$kecamatan,'kelurahan'=>$kelurahan]]);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
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
            $query = Ppks::find()
                ->where(['status_verifikasi' => "Belum"])
                ->andWhere(['kecamatan' => $nama_kecamatan])
                ->andWhere(['kelurahan' => $nama_kelurahan])
                ->orWhere(['diverifikasi' => $username]);
        }elseif($role=='kecamatan'){
            $query = Ppks::find()
                ->where(['status_validasi' => "Belum"])
                ->andWhere(['kecamatan' => $nama_kecamatan])
                ->orWhere(['divalidasi' => $username]);
                // ->andWhere(['kelurahan' => $nama_kelurahan]);
                // ->orWhere(['dibuat' => $pembuat]);
        }elseif($role=='dinsos'){
            $query = Ppks::find()
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

    public function actionListMutakhirPsm()
    {
        $request = Yii::$app->request;
        $kecamatan_id = @Yii::$app->user->identity->kecamatan_id;
        $kelurahan_id = @Yii::$app->user->identity->kelurahan_id;
        $username = @Yii::$app->user->identity->username;
        $role = @Yii::$app->user->identity->role;
        $nama_kecamatan = strtoupper(@Kecamatan::find()->where(['id_lama' => $kecamatan_id])->one()->nama);
        $nama_kelurahan = strtoupper(@Kelurahan::find()->where(['kelurahan_id' => $kelurahan_id])->one()->nama);
        
        $query = Ppks::find();
        if ($role=='kelurahan') {
            $query->where(['kecamatan' => $nama_kecamatan])
                  ->andWhere(['kelurahan' => $nama_kelurahan])
                  ->orWhere(['diverifikasi' => $username]);
        }elseif($role=='kecamatan'){
            $query->where(['kecamatan' => $nama_kecamatan])
                  ->orWhere(['divalidasi' => $username]);
        }

        if ($search = $request->get('search')) {
            $query->andWhere([
                'or',
                ['like', 'nama', $search],
                ['like', 'nik', $search],
                ['like', 'alamat', $search],
            ]);
        }
    
        $dataProvider = new \yii\data\ActiveDataProvider([
            'query' => $query,
            'pagination' => ['pageSize' => 10],
            'sort' => ['defaultOrder' => ['id' => SORT_DESC]],
        ]);
    
        return $this->render('list_mutakhir_psm', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionFormMutakhir($id)
    {
        $model = $this->findModel($id);
        $modelMutakhir = current(\app\models\PpksMutakhirStatus::find()->where(['ppks_id' => $id])->orderBy(['id'=>SORT_DESC])->all());
        // JIKA sedang menunggu konfirmasi, tidak boleh submit lagi
        
        if(!$modelMutakhir || $modelMutakhir->status_pengajuan != 'MENUNGGU KONFIRMASI') {
            $modelMutakhir = new \app\models\PpksMutakhirStatus();
        }

        if (Yii::$app->request->isPost && $modelMutakhir->isNewRecord) {
            $modelMutakhir->ppks_id = $model->id;
            $modelMutakhir->status_sebelumnya = $model->status ? $model->status : 'AKTIF';
            $modelMutakhir->status_baru = $_POST['PpksMutakhirStatus']['status_baru'];
            $modelMutakhir->status_pengajuan = 'MENUNGGU KONFIRMASI';
            $modelMutakhir->created_by = Yii::$app->user->identity->id;

            $file = \yii\web\UploadedFile::getInstance($modelMutakhir, 'dokumen_pendukung');
            if ($file) {
                $filename = 'dokumen_' . time() . '_' . uniqid() . '.' . $file->extension;
                $filepath = Yii::getAlias('@webroot') . '/uploads/mutakhir/' . $filename;
                if (!is_dir(dirname($filepath))) {
                    mkdir(dirname($filepath), 0777, true);
                }
                $file->saveAs($filepath);
                $modelMutakhir->dokumen_pendukung = $filename;
            } else {
                Yii::$app->session->setFlash('error', 'Dokumen pendukung wajib diunggah!');
                return $this->redirect(['form-mutakhir', 'id' => $id]);
            }

            if ($modelMutakhir->save(false)) {
                Yii::$app->session->setFlash('success', 'Pengajuan pemutakhiran status berhasil dikirim!');
                return $this->redirect(['list-mutakhir-psm']);
            }
        }

        return $this->render('form_mutakhir', [
            'model' => $model,
            'modelMutakhir' => $modelMutakhir,
        ]);
    }

    public function actionKonfirmasiMutakhir()
    {
        $query = \app\models\PpksMutakhirStatus::find()->orderBy(['id' => SORT_DESC]);
        
        $dataProvider = new \yii\data\ActiveDataProvider([
            'query' => $query,
            'pagination' => ['pageSize' => 10],
        ]);
    
        return $this->render('konfirmasi_mutakhir', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionSetujuiMutakhir($id)
    {
        $model = \app\models\PpksMutakhirStatus::findOne($id);
        if ($model) {
            $model->status_pengajuan = 'DISETUJUI';
            $model->updated_by = Yii::$app->user->identity->id;
            if ($model->save(false)) {
                $ppks = $model->ppks;
                $ppks->status = $model->status_baru;
                $ppks->save(false);
                Yii::$app->session->setFlash('success', 'Pengajuan disetujui! Status PPKS berhasil diubah.');
            }
        }
        return $this->redirect(['konfirmasi-mutakhir']);
    }

    public function actionTolakMutakhir($id)
    {
        $model = \app\models\PpksMutakhirStatus::findOne($id);
        if ($model && Yii::$app->request->isPost) {
            $model->status_pengajuan = 'DITOLAK';
            $model->keterangan_penolakan = Yii::$app->request->post('keterangan_penolakan');
            $model->updated_by = Yii::$app->user->identity->id;
            $model->save(false);
            Yii::$app->session->setFlash('success', 'Pengajuan ditolak.');
        }
        return $this->redirect(['konfirmasi-mutakhir']);
    }

    public function actionInputLayananTerlantar()
    {
        $request = Yii::$app->request;

        if ($request->isPost) {
            $kalayans = $request->post('kalayan');
            $status_id = $request->post('status_id');
            $tanggal_masuk = $request->post('tanggal_masuk');
            $tanggal_keluar = $request->post('tanggal_keluar');
            $keterangan = $request->post('keterangan');

            if (empty($kalayans) || !is_array($kalayans)) {
                Yii::$app->session->setFlash('error', 'Daftar kalayan tidak boleh kosong!');
                return $this->redirect(['input-layanan-terlantar']);
            }

            $successCount = 0;
            $errorCount = 0;

            foreach ($kalayans as $k) {
                if (isset($k['ppks_id']) && isset($k['layanan']) && is_array($k['layanan'])) {
                    foreach ($k['layanan'] as $layanan_id) {
                        $model = new \app\models\PpksLayananTerlantar();
                        $model->ppks_id = $k['ppks_id'];
                        $model->layanan_id = $layanan_id;
                        $model->status_id = $status_id;
                        $model->tanggal_masuk = $tanggal_masuk;
                        $model->tanggal_layanan = $tanggal_keluar;
                        $model->keterangan = $keterangan;
                        $model->dibuat_oleh = Yii::$app->user->identity->username;

                        if ($model->save()) {
                            $successCount++;
                        } else {
                            $errorCount++;
                        }
                    }
                }
            }

            if ($errorCount == 0) {
                Yii::$app->session->setFlash('success', "Berhasil menyimpan $successCount layanan terlantar!");
                return $this->redirect(['input-layanan-terlantar']);
            } else {
                Yii::$app->session->setFlash('warning', "Menyimpan $successCount layanan terlantar, namun ada $errorCount yang gagal.");
            }
        }

        $listStatus = \yii\helpers\ArrayHelper::map(\app\models\RefStatusTerlantar::find()->where(['aktif' => 'Y'])->all(), 'id', 'nama_status');
        $listLayanan = \yii\helpers\ArrayHelper::map(\app\models\RefLayananPpks::find()->where(['aktif' => 'Y'])->all(), 'id', 'nama_layanan');

        return $this->render('input_layanan_terlantar', [
            'listStatus' => $listStatus,
            'listLayanan' => $listLayanan,
        ]);
    }

    public function actionCariPpksLayananAjax($q = null)
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = ['results' => []];
        if (!is_null($q)) {
            $query = Ppks::find()
                ->where(['or', ['like', 'nik', $q], ['like', 'nama', $q]])
                ->andWhere(['status' => [null, 'AKTIF', '']])
                ->andWhere(['apakah_terlantar' => 1])
                ->limit(20)
                ->all();
                
            foreach ($query as $row) {
                $out['results'][] = [
                    'id' => $row->id,
                    'text' => $row->nik . ' - ' . $row->nama,
                    'nama' => $row->nama,
                    'nik' => $row->nik,
                    'alamat' => $row->alamat,
                ];
            }
        }
        return $out;
    }


    
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }
    
    public function actionUpdate2($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('update2', [
            'model' => $model,
        ]);
    }
    

    public function actionInputdatappks()
    {
        $model = new DataPpksForm();
        $model->tanggal_input = date('Y-m-d');
        $model2 = new Ppks();

        $request = Yii::$app->request;

        if ($request->isPost) {
            $model2->nama=@$_POST['DataPpksForm']['nama'];
            $model2->nik=@$_POST['DataPpksForm']['nik'];
            $model2->no_kk=@$_POST['DataPpksForm']['no_kk'];
            $model2->punya_ktp=@$_POST['DataPpksForm']['punya_ktp'];
            $model2->dsen_id=@$_POST['DataPpksForm']['dsen_id'];
            $model2->jenis_kelamin=@$_POST['DataPpksForm']['jenis_kelamin'];
            $model2->khusus_penyandang_disabilitas=@$_POST['DataPpksForm']['khusus_penyandang_disabilitas'];
            $model2->alamat=@$_POST['DataPpksForm']['alamat_ktp'];

            $provinsi_ktp_id=@$_POST['DataPpksForm']['provinsi_ktp'];
            $provinsi_ktp=Provinsi::findOne($provinsi_ktp_id)->nama;
            $model2->provinsi_id=$provinsi_ktp_id;
            $model2->provinsi=$provinsi_ktp;
            $kota_ktp_id=@$_POST['DataPpksForm']['kota_ktp'];
            $kota_ktp=Kota::findOne($kota_ktp_id)->nama;
            $model2->kota_id=$kota_ktp_id;
            $model2->kota=$kota_ktp;
            $kecamatan_ktp_id=@$_POST['DataPpksForm']['kecamatan_ktp'];
            if($kota_ktp_id != 3374){
                $kecamatan_ktp=Kecamatan2::findOne($kecamatan_ktp_id)->nama;
            }else{
                $kecamatan_ktp=Kecamatan2::find()->where(['id_lama'=>$kecamatan_ktp_id])->one()->nama;
            }
            $model2->kecamatan_id=$kecamatan_ktp_id;
            $model2->kecamatan=$kecamatan_ktp;
            $kelurahan_ktp_id=@$_POST['DataPpksForm']['kelurahan_ktp'];
            $kelurahan_ktp=Kelurahan2::findOne($kelurahan_ktp_id)->nama;
            $model2->kelurahan_id=$kelurahan_ktp_id;
            $model2->kelurahan=$kelurahan_ktp;

            $model2->rt=@$_POST['DataPpksForm']['rt_ktp'];
            $model2->rw=@$_POST['DataPpksForm']['rw_ktp'];

            $model2->alamat_domisili=@$_POST['DataPpksForm']['alamat_domisili'];
            $provinsi_domisili_id=@$_POST['DataPpksForm']['provinsi_domisili'];
            $provinsi_domisili=Provinsi::findOne($provinsi_domisili_id)->nama;
            $model2->provinsi_domisili_id=$provinsi_domisili_id;
            $model2->provinsi_domisili=$provinsi_domisili;
            $kota_domisili_id=@$_POST['DataPpksForm']['kota_domisili'];
            $kota_domisili=Kota::findOne($kota_domisili_id)->nama;
            $model2->kota_domisili_id=$kota_domisili_id;
            $model2->kota_domisili=$kota_domisili;
            $kecamatan_domisili_id=@$_POST['DataPpksForm']['kecamatan_domisili'];
            if($kota_domisili_id != 3374){
                $kecamatan_domisili=Kecamatan2::findOne($kecamatan_domisili_id)->nama;
            }else{
                $kecamatan_domisili=Kecamatan2::find()->where(['id_lama'=>$kecamatan_domisili_id])->one()->nama;
            }
            $model2->kecamatan_domisili_id=$kecamatan_domisili_id;
            $model2->kecamatan_domisili=$kecamatan_domisili;
            $kelurahan_domisili_id=@$_POST['DataPpksForm']['kelurahan_domisili'];
            $kelurahan_domisili=Kelurahan2::findOne($kelurahan_domisili_id)->nama;
            $model2->kelurahan_domisili_id=$kelurahan_domisili_id;
            $model2->kelurahan_domisili=$kelurahan_domisili;

            $model2->rt_domisili=@$_POST['DataPpksForm']['rt_domisili'];
            $model2->rw_domisili=@$_POST['DataPpksForm']['rw_domisili'];
            $model2->nama_cp=@$_POST['DataPpksForm']['nama_cp'];
            $model2->nomor_hp_cp=@$_POST['DataPpksForm']['nomor_hp_cp'];

            $model2->jenis_disabilitas = @$_POST['DataPpksForm']['jenis_disabilitas'];
            $model2->keterangan_disabilitas_ganda = @$_POST['DataPpksForm']['keterangan_disabilitas_ganda'];
            $model2->tempat_lahir = @$_POST['DataPpksForm']['tempat_lahir'];
            $model2->tanggal_lahir = @$_POST['DataPpksForm']['tanggal_lahir'];
            $model2->tinggal_dalam_keluarga = @$_POST['DataPpksForm']['tinggal_dalam_keluarga'];
            $model2->keterangan_di_luar_keluarga = @$_POST['DataPpksForm']['keterangan_di_luar_keluarga'];
            $model2->hubungan_dgn_kepala_keluarga = @$_POST['DataPpksForm']['hubungan_dgn_kepala_keluarga'];
            $model2->status_kawin = @$_POST['DataPpksForm']['status_kawin'];
            $model2->pekerjaan_atau_sekolah = @$_POST['DataPpksForm']['pekerjaan_atau_sekolah'];
            $model2->apakah_terlantar = @$_POST['DataPpksForm']['apakah_terlantar'];
            $model2->kondisi_keterlantaran = @$_POST['DataPpksForm']['kondisi_keterlantaran'];
            $model2->kondisi_kesehatan = @$_POST['DataPpksForm']['kondisi_kesehatan'];
            $model2->keterangan = @$_POST['DataPpksForm']['keterangan'];

            // Save Foto Orang
            $base64_foto_orang = @$_POST['DataPpksForm']['foto_orang'];
            if (!empty($base64_foto_orang) && preg_match('/^data:image\/(\w+);base64,/', $base64_foto_orang, $type_orang)) {
                $img_orang_data = substr($base64_foto_orang, strpos($base64_foto_orang, ',') + 1);
                $img_orang_type = strtolower($type_orang[1]); 
                if (in_array($img_orang_type, [ 'jpg', 'jpeg', 'png', 'gif', 'webp', 'avif' ])) {
                    $img_orang_decoded = base64_decode($img_orang_data);
                    if ($img_orang_decoded !== false) {
                        $filename_orang = 'foto_orang_' . time() . '_' . uniqid() . '.' . $img_orang_type;
                        $filepath_orang = Yii::getAlias('@webroot') . '/uploads/ppks/' . $filename_orang;
                        if (!is_dir(dirname($filepath_orang))) {
                            mkdir(dirname($filepath_orang), 0777, true);
                        }
                        file_put_contents($filepath_orang, $img_orang_decoded);
                        $model2->foto_orang = $filename_orang;
                    }
                }
            }

            // Save Foto Rumah
            $base64_foto_rumah = @$_POST['DataPpksForm']['foto_rumah'];
            if (!empty($base64_foto_rumah) && preg_match('/^data:image\/(\w+);base64,/', $base64_foto_rumah, $type_rumah)) {
                $img_rumah_data = substr($base64_foto_rumah, strpos($base64_foto_rumah, ',') + 1);
                $img_rumah_type = strtolower($type_rumah[1]); 
                if (in_array($img_rumah_type, [ 'jpg', 'jpeg', 'png', 'gif', 'webp', 'avif' ])) {
                    $img_rumah_decoded = base64_decode($img_rumah_data);
                    if ($img_rumah_decoded !== false) {
                        $filename_rumah = 'foto_rumah_' . time() . '_' . uniqid() . '.' . $img_rumah_type;
                        $filepath_rumah = Yii::getAlias('@webroot') . '/uploads/ppks/' . $filename_rumah;
                        if (!is_dir(dirname($filepath_rumah))) {
                            mkdir(dirname($filepath_rumah), 0777, true);
                        }
                        file_put_contents($filepath_rumah, $img_rumah_decoded);
                        $model2->foto_rumah = $filename_rumah;
                    }
                }
            }


            $model2->anak_balita_terlantar = @$_POST['pmks']['anak_balita_terlantar']=="on" ? 1:0;
            $model2->anak_terlantar = @$_POST['pmks']['anak_terlantar']=="on" ? 1:0;
            $model2->anak_yang_berhadapan_dengan_hukum = @$_POST['pmks']['anak_yang_berhadapan_dengan_hukum']=="on" ? 1:0;
            $model2->anak_jalanan = @$_POST['pmks']['anak_jalanan']=="on" ? 1:0;
            $model2->anak_dengan_kedisabilitasan = @$_POST['pmks']['anak_dengan_kedisabilitasan']=="on" ? 1:0;
            $model2->anak_korban_tindak_kekerasan = @$_POST['pmks']['anak_korban_tindak_kekerasan']=="on" ? 1:0;
            $model2->anak_yang_memerlukan_perlindungan_khusus = @$_POST['pmks']['anak_yang_memerlukan_perlindungan_khusus']=="on" ? 1:0;
            $model2->lanjut_usia_terlantar = @$_POST['pmks']['lanjut_usia_terlantar']=="on" ? 1:0;
            $model2->penyandang_disabilitas = @$_POST['pmks']['penyandang_disabilitas']=="on" ? 1:0;
            $model2->tuna_susila = @$_POST['pmks']['tuna_susila']=="on" ? 1:0;
            $model2->gelandangan = @$_POST['pmks']['gelandangan']=="on" ? 1:0;
            $model2->pengemis = @$_POST['pmks']['pengemis']=="on" ? 1:0;
            $model2->pemulung = @$_POST['pmks']['pemulung']=="on" ? 1:0;
            $model2->kelompok_minoritas = @$_POST['pmks']['kelompok_minoritas']=="on" ? 1:0;
            $model2->bekas_warga_binaan_lembaga_pemasyarakatan = @$_POST['pmks']['bekas_warga_binaan_lembaga_pemasyarakatan']=="on" ? 1:0;
            $model2->orang_dengan_hivaids = @$_POST['pmks']['orang_dengan_hivaids']=="on" ? 1:0;
            $model2->korban_penyalahgunaan_napza = @$_POST['pmks']['korban_penyalahgunaan_napza']=="on" ? 1:0;
            $model2->korban_trafficking = @$_POST['pmks']['korban_trafficking']=="on" ? 1:0;
            $model2->korban_tindak_kekerasan = @$_POST['pmks']['korban_tindak_kekerasan']=="on" ? 1:0;
            $model2->pekerja_migran_bermasalah_sosial = @$_POST['pmks']['pekerja_migran_bermasalah_sosial']=="on" ? 1:0;
            $model2->korban_bencana_alam = @$_POST['pmks']['korban_bencana_alam']=="on" ? 1:0;
            $model2->korban_bencana_sosial = @$_POST['pmks']['korban_bencana_sosial']=="on" ? 1:0;
            $model2->perempuan_rawan_sosial_ekonomi = @$_POST['pmks']['perempuan_rawan_sosial_ekonomi']=="on" ? 1:0;
            $model2->fakir_miskin = @$_POST['pmks']['fakir_miskin']=="on" ? 1:0;
            $model2->keluarga_bermasalah_sosial_psikologis = @$_POST['pmks']['keluarga_bermasalah_sosial_psikologis']=="on" ? 1:0;
            $model2->komunitas_adat_terpencil = @$_POST['pmks']['komunitas_adat_terpencil']=="on" ? 1:0;
            $model2->anak_dengan_kedisabilitasan_fisik = @$_POST['disabilitas']['anak_dengan_kedisabilitasan_fisik']=="on" ? 1:0;
            $model2->anak_dengan_kedisabilitasan_intelektual = @$_POST['disabilitas']['anak_dengan_kedisabilitasan_intelektual']=="on" ? 1:0;
            $model2->anak_dengan_kedisabilitasan_mental = @$_POST['disabilitas']['anak_dengan_kedisabilitasan_mental']=="on" ? 1:0;
            $model2->anak_dengan_kedisabilitasan_sensorik = @$_POST['disabilitas']['anak_dengan_kedisabilitasan_sensorik']=="on" ? 1:0;
            $model2->penyandang_disabilitas_fisik = @$_POST['disabilitas']['penyandang_disabilitas_fisik']=="on" ? 1:0;
            $model2->penyandang_disabilitas_intelektual = @$_POST['disabilitas']['penyandang_disabilitas_intelektual']=="on" ? 1:0;
            $model2->penyandang_disabilitas_mental = @$_POST['disabilitas']['penyandang_disabilitas_mental']=="on" ? 1:0;
            $model2->penyandang_disabilitas_sensorik = @$_POST['disabilitas']['penyandang_disabilitas_sensorik']=="on" ? 1:0;
            $model2->dibuat=@Yii::$app->user->identity->username;
            $model2->tanggal_input=@$_POST['DataPpksForm']['tanggal_input'];

            $model2->verifikasi="Belum";
            $model2->validasi="Belum";
            $model2->status_verifikasi="Belum";
            $model2->status_validasi="Belum";
            $model2->approved="Belum";

            $model2->save(false);
            Yii::$app->session->setFlash('success', 'Data '.$model2->nama.' berhasil disimpan!');
            return $this->redirect(['index']);
        }
        return $this->render('inputdatappks', [
            'model' => $model,
            'model2' => $model2,
        ]);
    }

    /**
     * Displays a single Ppks model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Ppks model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Ppks();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Ppks model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionEdit($id)
    {
        $model2 = new DataPpksForm();
        $model = $this->findModel($id);
        $request = Yii::$app->request;

        if ($request->isPost) {
            $model->nama=@$_POST['Ppks']['nama'];
            $model->nik=@$_POST['Ppks']['nik'];
            $model->no_kk=@$_POST['Ppks']['no_kk'];
            $model->punya_ktp=@$_POST['Ppks']['punya_ktp'];
            $model->masuk_dtks=@$_POST['Ppks']['masuk_dtks'];
            $model->jenis_kelamin=@$_POST['Ppks']['jenis_kelamin'];
            $model->khusus_penyandang_disabilitas=@$_POST['Ppks']['khusus_penyandang_disabilitas'];
            $model->alamat=@$_POST['DataPpksForm']['alamat_ktp'];

            $provinsi_ktp_id=@$_POST['DataPpksForm']['provinsi_ktp'];
            $provinsi_ktp=Provinsi::findOne($provinsi_ktp_id)->nama;
            $model->provinsi_id=$provinsi_ktp_id;
            $model->provinsi=$provinsi_ktp;
            $kota_ktp_id=@$_POST['DataPpksForm']['kota_ktp'];
            $kota_ktp=@Kota::findOne($kota_ktp_id)->nama;
            $model->kota_id=$kota_ktp_id;
            $model->kota=$kota_ktp;
            $kecamatan_ktp_id=@$_POST['DataPpksForm']['kecamatan_ktp'];
            if($kota_ktp_id != 3374){
                $kecamatan_ktp=Kecamatan2::findOne($kecamatan_ktp_id)->nama;
            }else{
                $kecamatan_ktp=Kecamatan2::find()->where(['id_lama'=>$kecamatan_ktp_id])->one()->nama;
            }
            $model->kecamatan_id=$kecamatan_ktp_id;
            $model->kecamatan=$kecamatan_ktp;
            $kelurahan_ktp_id=@$_POST['DataPpksForm']['kelurahan_ktp'];
            $kelurahan_ktp=Kelurahan2::findOne($kelurahan_ktp_id)->nama;
            $model->kelurahan_id=$kelurahan_ktp_id;
            $model->kelurahan=$kelurahan_ktp;

            $model->rt=@$_POST['DataPpksForm']['rt_ktp'];
            $model->rw=@$_POST['DataPpksForm']['rw_ktp'];

            $model->alamat_domisili=@$_POST['Ppks']['alamat_domisili'];
            $provinsi_domisili_id=@$_POST['Ppks']['provinsi_domisili'];
            $provinsi_domisili=Provinsi::findOne($provinsi_domisili_id)->nama;
            $model->provinsi_domisili_id=$provinsi_domisili_id;
            $model->provinsi_domisili=$provinsi_domisili;
            $kota_domisili_id=@$_POST['Ppks']['kota_domisili'];
            $kota_domisili=Kota::findOne($kota_domisili_id)->nama;
            $model->kota_domisili_id=$kota_domisili_id;
            $model->kota_domisili=$kota_domisili;
            $kecamatan_domisili_id=@$_POST['Ppks']['kecamatan_domisili'];
            if($kota_domisili_id != 3374){
                $kecamatan_domisili=Kecamatan2::findOne($kecamatan_domisili_id)->nama;
            }else{
                $kecamatan_domisili=Kecamatan2::find()->where(['id_lama'=>$kecamatan_domisili_id])->one()->nama;
            }
            $model->kecamatan_domisili_id=$kecamatan_domisili_id;
            $model->kecamatan_domisili=$kecamatan_domisili;
            $kelurahan_domisili_id=@$_POST['Ppks']['kelurahan_domisili'];
            $kelurahan_domisili=Kelurahan2::findOne($kelurahan_domisili_id)->nama;
            $model->kelurahan_domisili_id=$kelurahan_domisili_id;
            $model->kelurahan_domisili=$kelurahan_domisili;

            $model->rt_domisili=@$_POST['Ppks']['rt_domisili'];
            $model->rw_domisili=@$_POST['Ppks']['rw_domisili'];
            $model->nama_cp=@$_POST['Ppks']['nama_cp'];
            $model->nomor_hp_cp=@$_POST['Ppks']['nomor_hp_cp'];

            $model->jenis_disabilitas = @$_POST['Ppks']['jenis_disabilitas'];
            $model->keterangan_disabilitas_ganda = @$_POST['Ppks']['keterangan_disabilitas_ganda'];
            $model->tempat_lahir = @$_POST['Ppks']['tempat_lahir'];
            $model->tanggal_lahir = @$_POST['Ppks']['tanggal_lahir'];
            $model->tinggal_dalam_keluarga = @$_POST['Ppks']['tinggal_dalam_keluarga'];
            $model->keterangan_di_luar_keluarga = @$_POST['Ppks']['keterangan_di_luar_keluarga'];
            $model->hubungan_dgn_kepala_keluarga = @$_POST['Ppks']['hubungan_dgn_kepala_keluarga'];
            $model->status_kawin = @$_POST['Ppks']['status_kawin'];
            $model->pekerjaan_atau_sekolah = @$_POST['Ppks']['pekerjaan_atau_sekolah'];
            $model->apakah_terlantar = @$_POST['Ppks']['apakah_terlantar'];
            $model->kondisi_keterlantaran = @$_POST['Ppks']['kondisi_keterlantaran'];
            $model->kondisi_kesehatan = @$_POST['Ppks']['kondisi_kesehatan'];
            $model->keterangan = @$_POST['Ppks']['keterangan'];

            // Save Foto Orang
            $base64_foto_orang = @$_POST['Ppks']['foto_orang'];
            if (!empty($base64_foto_orang) && preg_match('/^data:image\/(\w+);base64,/', $base64_foto_orang, $type_orang)) {
                $img_orang_data = substr($base64_foto_orang, strpos($base64_foto_orang, ',') + 1);
                $img_orang_type = strtolower($type_orang[1]); 
                if (in_array($img_orang_type, [ 'jpg', 'jpeg', 'png', 'gif', 'webp', 'avif' ])) {
                    $img_orang_decoded = base64_decode($img_orang_data);
                    if ($img_orang_decoded !== false) {
                        $filename_orang = 'foto_orang_' . time() . '_' . uniqid() . '.' . $img_orang_type;
                        $filepath_orang = Yii::getAlias('@webroot') . '/uploads/ppks/' . $filename_orang;
                        if (!is_dir(dirname($filepath_orang))) {
                            mkdir(dirname($filepath_orang), 0777, true);
                        }
                        file_put_contents($filepath_orang, $img_orang_decoded);
                        $model->foto_orang = $filename_orang;
                    }
                }
            }

            // Save Foto Rumah
            $base64_foto_rumah = @$_POST['Ppks']['foto_rumah'];
            if (!empty($base64_foto_rumah) && preg_match('/^data:image\/(\w+);base64,/', $base64_foto_rumah, $type_rumah)) {
                $img_rumah_data = substr($base64_foto_rumah, strpos($base64_foto_rumah, ',') + 1);
                $img_rumah_type = strtolower($type_rumah[1]); 
                if (in_array($img_rumah_type, [ 'jpg', 'jpeg', 'png', 'gif', 'webp', 'avif' ])) {
                    $img_rumah_decoded = base64_decode($img_rumah_data);
                    if ($img_rumah_decoded !== false) {
                        $filename_rumah = 'foto_rumah_' . time() . '_' . uniqid() . '.' . $img_rumah_type;
                        $filepath_rumah = Yii::getAlias('@webroot') . '/uploads/ppks/' . $filename_rumah;
                        if (!is_dir(dirname($filepath_rumah))) {
                            mkdir(dirname($filepath_rumah), 0777, true);
                        }
                        file_put_contents($filepath_rumah, $img_rumah_decoded);
                        $model->foto_rumah = $filename_rumah;
                    }
                }
            }


            $model->anak_balita_terlantar = @$_POST['pmks']['anak_balita_terlantar']=="on" ? 1:0;
            $model->anak_terlantar = @$_POST['pmks']['anak_terlantar']=="on" ? 1:0;
            $model->anak_yang_berhadapan_dengan_hukum = @$_POST['pmks']['anak_yang_berhadapan_dengan_hukum']=="on" ? 1:0;
            $model->anak_jalanan = @$_POST['pmks']['anak_jalanan']=="on" ? 1:0;
            $model->anak_dengan_kedisabilitasan = @$_POST['pmks']['anak_dengan_kedisabilitasan']=="on" ? 1:0;
            $model->anak_korban_tindak_kekerasan = @$_POST['pmks']['anak_korban_tindak_kekerasan']=="on" ? 1:0;
            $model->anak_yang_memerlukan_perlindungan_khusus = @$_POST['pmks']['anak_yang_memerlukan_perlindungan_khusus']=="on" ? 1:0;
            $model->lanjut_usia_terlantar = @$_POST['pmks']['lanjut_usia_terlantar']=="on" ? 1:0;
            $model->penyandang_disabilitas = @$_POST['pmks']['penyandang_disabilitas']=="on" ? 1:0;
            $model->tuna_susila = @$_POST['pmks']['tuna_susila']=="on" ? 1:0;
            $model->gelandangan = @$_POST['pmks']['gelandangan']=="on" ? 1:0;
            $model->pengemis = @$_POST['pmks']['pengemis']=="on" ? 1:0;
            $model->pemulung = @$_POST['pmks']['pemulung']=="on" ? 1:0;
            $model->kelompok_minoritas = @$_POST['pmks']['kelompok_minoritas']=="on" ? 1:0;
            $model->bekas_warga_binaan_lembaga_pemasyarakatan = @$_POST['pmks']['bekas_warga_binaan_lembaga_pemasyarakatan']=="on" ? 1:0;
            $model->orang_dengan_hivaids = @$_POST['pmks']['orang_dengan_hivaids']=="on" ? 1:0;
            $model->korban_penyalahgunaan_napza = @$_POST['pmks']['korban_penyalahgunaan_napza']=="on" ? 1:0;
            $model->korban_trafficking = @$_POST['pmks']['korban_trafficking']=="on" ? 1:0;
            $model->korban_tindak_kekerasan = @$_POST['pmks']['korban_tindak_kekerasan']=="on" ? 1:0;
            $model->pekerja_migran_bermasalah_sosial = @$_POST['pmks']['pekerja_migran_bermasalah_sosial']=="on" ? 1:0;
            $model->korban_bencana_alam = @$_POST['pmks']['korban_bencana_alam']=="on" ? 1:0;
            $model->korban_bencana_sosial = @$_POST['pmks']['korban_bencana_sosial']=="on" ? 1:0;
            $model->perempuan_rawan_sosial_ekonomi = @$_POST['pmks']['perempuan_rawan_sosial_ekonomi']=="on" ? 1:0;
            $model->fakir_miskin = @$_POST['pmks']['fakir_miskin']=="on" ? 1:0;
            $model->keluarga_bermasalah_sosial_psikologis = @$_POST['pmks']['keluarga_bermasalah_sosial_psikologis']=="on" ? 1:0;
            $model->komunitas_adat_terpencil = @$_POST['pmks']['komunitas_adat_terpencil']=="on" ? 1:0;
            $model->anak_dengan_kedisabilitasan_fisik = @$_POST['disabilitas']['anak_dengan_kedisabilitasan_fisik']=="on" ? 1:0;
            $model->anak_dengan_kedisabilitasan_intelektual = @$_POST['disabilitas']['anak_dengan_kedisabilitasan_intelektual']=="on" ? 1:0;
            $model->anak_dengan_kedisabilitasan_mental = @$_POST['disabilitas']['anak_dengan_kedisabilitasan_mental']=="on" ? 1:0;
            $model->anak_dengan_kedisabilitasan_sensorik = @$_POST['disabilitas']['anak_dengan_kedisabilitasan_sensorik']=="on" ? 1:0;
            $model->penyandang_disabilitas_fisik = @$_POST['disabilitas']['penyandang_disabilitas_fisik']=="on" ? 1:0;
            $model->penyandang_disabilitas_intelektual = @$_POST['disabilitas']['penyandang_disabilitas_intelektual']=="on" ? 1:0;
            $model->penyandang_disabilitas_mental = @$_POST['disabilitas']['penyandang_disabilitas_mental']=="on" ? 1:0;
            $model->penyandang_disabilitas_sensorik = @$_POST['disabilitas']['penyandang_disabilitas_sensorik']=="on" ? 1:0;
            $model->dibuat=@Yii::$app->user->identity->username;

            $model->verifikasi="Belum";
            $model->validasi="Belum";
            $model->status_verifikasi="Belum";
            $model->status_validasi="Belum";
            $model->approved="Belum";

            $model->save(false);
            Yii::$app->session->setFlash('success', 'Data '.$model->nama.' berhasil disimpan!');
            return $this->redirect(['index']);
        }
        return $this->render('update', [
            'model' => $model,
            'model2' => $model2,
        ]);
    }

    public function actionVerifikasi($id)
    {
        $model = $this->findModel($id);
        if (Yii::$app->request->isPost) {
            $model->status_verifikasi=@$_POST['Ppks']['status_verifikasi'];
            $model->tanggal_verifikasi=@$_POST['Ppks']['tanggal_verifikasi'];
            $model->keterangan_verifikasi=@$_POST['Ppks']['keterangan_verifikasi'];
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
            $model->status_validasi=@$_POST['Ppks']['status_validasi'];
            $model->tanggal_validasi=@$_POST['Ppks']['tanggal_validasi'];
            $model->keterangan_validasi=@$_POST['Ppks']['keterangan_validasi'];
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
            $model->approved=@$_POST['Ppks']['approved'];
            $model->tanggal_approval=@$_POST['Ppks']['tanggal_approval'];
            $model->keterangan_approval=@$_POST['Ppks']['keterangan_approval'];
            $model->approved_by=@Yii::$app->user->identity->username;
            $model->save(false);
            Yii::$app->session->setFlash('success', 'Data '.$model->nama.' berhasil disetujui!');
            return $this->redirect(['listdata']);
        }
    }

    /**
     * Deletes an existing Ppks model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        Yii::$app->session->setFlash('success', 'Data berhasil dihapus!');
        return $this->redirect(Yii::$app->request->referrer);
        // return $this->redirect(['index']);
    }

    /**
     * Finds the Ppks model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Ppks the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Ppks::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionListjenispmks(){
        $rekap=Rekap::getListJenisPMKS();
        // dd($rekap);
        // $rekap2=Rekap::getRekapJenisPMKS();
        // dd($rekap);
        return $this->render('list_jenis_pmks', [
            'rekap' => $rekap,
            // 'rekap2' => $rekap2,
        ]);
    }

    public function actionRekapjenisppks(){
        // $kecamatan=@Yii::$app->request->queryParams['kecamatan'];
        $rekap=Rekap::statistikJenisPpks();
        return $this->render('rekap_jenis_ppks_kota', [
            'rekap' => $rekap,
        ]);
    }
    public function actionRekapjenisppkskecamatan(){
        $kecamatan=@Yii::$app->request->queryParams['kecamatan'];
        $rekap=Rekap::statistikJenisPpksKecamatan($kecamatan);
        return $this->render('rekap_jenis_ppks_kecamatan', [
            'rekap' => $rekap,
        ]);
    }

    public function actionRekapjenispmks(){
        $rekap=Rekap::getRekapJenisPMKS();
        return $this->render('rekap_jenis_pmks', [
            'rekap' => $rekap,
        ]);
    }
    public function actionRekapjenispmksperkecamatan(){
        $rekap=Rekap::getRekapJenisPMKSPerKecamatan();
        return $this->render('rekap_jenis_pmks_kecamatan', [
            'rekap' => $rekap,
        ]);
    }

    public function actionRekapjenispmksperkelurahan(){
        $kecamatan=@Yii::$app->getRequest()->getQueryParam('kecamatan');
        $rekap=Rekap::getRekapJenisPMKSPerKelurahan($kecamatan);
        return $this->render('rekap_jenis_pmks_kelurahan', [
            'rekap' => $rekap,
        ]);
    }

    public function actionTesRekap(){
        $rekap=Rekap::getRekapJenisPMKS();
        return $this->render('tesrekap', [
            'rekap' => $rekap,
        ]);
    }

    public function actionGetKelurahanktp($id_kecamatan)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $kelurahan = Kelurahan::find()
            ->where(['id_kecamatan' => $id_kecamatan])
            ->asArray()
            ->all();

        return Json::encode($kelurahan);
    }

    public function actionGetKelurahandomisili($id_kecamatan)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $kelurahan = Kelurahan::find()
            ->where(['id_kecamatan' => $id_kecamatan])
            ->asArray()
            ->all();

        return Json::encode($kelurahan);
    }

    public function actionGetProvinsi()
    {
        $data = Provinsi::find()->all();
        return json_encode(array_map(fn($p) => ['id' => $p->id, 'text' => $p->nama], $data));
    }
    public function actionGetKota()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        
        $out = [];
        $parents = Yii::$app->request->post('depdrop_parents'); // Ambil parameter dari POST
    
        if ($parents != null) {
            $provinsi_id = $parents[0]; // Ambil ID Provinsi
            $kota = Kota::find()->where(['provinsi_id' => $provinsi_id])->all();
    
            foreach ($kota as $k) {
                $out[] = ['id' => $k->id, 'name' => $k->nama];
            }
    
            return ['output' => $out, 'selected' => ''];
        }
    
        return ['output' => '', 'selected' => ''];
    }
    
    public function actionGetKecamatan()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
    
        $out = [];
        $parents = Yii::$app->request->post('depdrop_parents');
    
        if ($parents != null) {
            $kota_id = $parents[0]; // Ambil ID Kota
            $kecamatan = Kecamatan2::find()->where(['kota_id' => $kota_id])->all();
            if($kota_id!=3374){
                foreach ($kecamatan as $kc) {
                    $out[] = ['id' => $kc->id, 'name' => $kc->nama];
                }
            }else{
                foreach ($kecamatan as $kc) {
                    $out[] = ['id' => $kc->id_lama, 'name' => $kc->nama];
                }
            }
    
            return ['output' => $out, 'selected' => ''];
        }
    
        return ['output' => '', 'selected' => ''];
    }
    
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
    
    public function actionPrintPdf2()
    {
        require_once __DIR__ . '/../mpdf_v8.0.3/vendor/autoload.php';
        ini_set("pcre.backtrack_limit", "10000000");
        // Ambil data sesuai kategori tertentu
        $query = Ppks::find()
            ->where(['penyandang_disabilitas'=>1])
            ->orWhere(['anak_terlantar'=>1])
            ->orWhere(['lanjut_usia_terlantar'=>1])
            ->orWhere(['gelandangan'=>1])
            ->orWhere(['pengemis'=>1]);
        
    
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => false, // Nonaktifkan pagination agar semua data tampil di PDF
        ]);

        // echo '<pre>';print_r($dataProvider->getModels());exit;
    
        // Render view ke dalam variabel
        $content = $this->renderPartial('print-pdf', [
            'dataProvider' => $dataProvider,
        ]);
        
    
        // Konfigurasi mPDF menggunakan Kartik
        $mpdf = new Mpdf([
            'mode' => 'utf-8',
            'format' => 'LEGAL',
            'orientation' => 'L', 
            // 'destination' => Mpdf::DEST_BROWSER, // Bisa diganti ke Pdf::DEST_DOWNLOAD jika ingin langsung download
            // 'content' => $content,
            // 'cssInline' => '
            //     body { font-family: Arial, sans-serif; }
            //     table { width: 100%; border-collapse: collapse; }
            //     th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
            //     th { background-color: #f2f2f2; }
            // ',
            // 'options' => ['title' => 'Laporan Data PPKS'],
            // 'methods' => [
            //     'SetHeader' => ['Laporan Data PPKS||Dicetak: ' . date("d-m-Y H:i")],
            //     'SetFooter' => ['|Halaman ' . '[PAGENO] |'], // Perbaikan dengan menghapus {}
            // ]
        ]);
        // echo '<pre>'; print_r($pdf);exit;
        // Tambahkan konten ke PDF
        $mpdf->WriteHTML($content);

        // Tampilkan PDF di browser
        return $mpdf->Output('Laporan PPKS.pdf', 'I'); // 'I' = tampil di browser
    }

    public function actionPrintPdf3()
    {
        require_once __DIR__ . '/../mpdf_v8.0.3/vendor/autoload.php';
        
        ini_set("memory_limit", "512M"); // Tambah memori hingga 512MB
        ini_set("pcre.backtrack_limit", "10000000");

        // Ambil data secara bertahap untuk menghemat memori
        $query = Ppks::find()
            ->where(['penyandang_disabilitas' => 1])
            ->orWhere(['anak_terlantar' => 1])
            ->orWhere(['lanjut_usia_terlantar' => 1])
            ->orWhere(['gelandangan' => 1])
            ->orWhere(['pengemis' => 1]);

        // Render view ke dalam variabel secara bertahap
        $content = '';
        foreach ($query->batch(100) as $models) {
            $content .= $this->renderPartial('print-pdf', ['models' => $models]);
        }

        // Konfigurasi mPDF
        $mpdf = new \Mpdf\Mpdf([
            'mode' => 'utf-8',
            'format' => 'LEGAL',
            'orientation' => 'L',
        ]);

        // Tambahkan konten ke PDF
        $mpdf->WriteHTML($content);

        // Tampilkan PDF di browser
        return $mpdf->Output('Laporan PPKS.pdf', 'I'); // 'I' = tampil di browser
    }


    // public function actionGenerate()
    // {
    //     $pdf = new FPDF();
    //     $pdf->AddPage();
    //     $pdf->SetFont('Arial', 'B', 16);
    //     $pdf->Cell(190, 10, 'Laporan Data PPKS', 1, 1, 'C');

    //     // Contoh data statis (bisa diambil dari database)
    //     $data = [
    //         ['nama' => 'Ahmad', 'jenis' => 'Penyandang Disabilitas'],
    //         ['nama' => 'Budi', 'jenis' => 'Anak Terlantar'],
    //         ['nama' => 'Citra', 'jenis' => 'Lansia Terlantar'],
    //     ];

    //     $pdf->SetFont('Arial', '', 12);
    //     foreach ($data as $row) {
    //         $pdf->Cell(95, 10, $row['nama'], 1, 0, 'L');
    //         $pdf->Cell(95, 10, $row['jenis'], 1, 1, 'L');
    //     }

    //     $pdf->Output('I', 'Laporan_PPKS.pdf'); // Menampilkan di browser
    //     exit;
    // }
    public function actionPrintPdf4()
    {
        require_once __DIR__ . '/../mpdf_v8.0.3/vendor/autoload.php';
    
        ini_set("memory_limit", "1G"); // Tambah batas memori
        ini_set("max_execution_time", "300"); // Tambah batas waktu eksekusi
    
        // Konfigurasi mPDF
        $mpdf = new \Mpdf\Mpdf([
            'mode' => 'utf-8',
            'format' => 'LEGAL',
            'orientation' => 'L',
            'tempDir' => __DIR__ . '/../runtime/mpdf', // Cache sementara
        ]);
    
        // Header dan judul awal
        $mpdf->WriteHTML('<h2 style="text-align: center;">Laporan Data PPKS</h2>');
        $mpdf->WriteHTML('<h4 style="text-align: center;">Kategori: Penyandang Disabilitas, Anak Terlantar, Lanjut Usia Terlantar, Gelandangan, dan Pengemis</h4>');
    
        // Mulai tabel
        $mpdf->WriteHTML('
        <table border="1" cellspacing="0" cellpadding="5" width="100%">
            <thead>
                <tr style="background-color: #f2f2f2; text-align:center;">
                    <th>NO</th>
                    <th>NAMA</th>
                    <th>NIK</th>
                    <th>JENIS KELAMIN</th>
                    <th>TTL</th>
                    <th>ALAMAT</th>
                    <th>Kecamatan</th>
                    <th>Kelurahan</th>
                    <th>Jenis PPKS</th>
                </tr>
            </thead>
            <tbody>
        ');
    
        // Ambil data bertahap
        $query = Ppks::find()
            ->where(['penyandang_disabilitas' => 1])
            ->orWhere(['anak_terlantar' => 1])
            ->orWhere(['lanjut_usia_terlantar' => 1])
            ->orWhere(['gelandangan' => 1])
            ->orWhere(['pengemis' => 1]);
    
        $no = 1;
        foreach ($query->batch(500) as $models) {
            ob_start(); // Gunakan output buffering
            foreach ($models as $model) {
                echo '
                    <tr>
                        <td style="text-align: center;">' . $no++ . '</td>
                        <td>' . htmlspecialchars($model->nama) . '</td>
                        <td>' . htmlspecialchars($model->nik) . '</td>
                        <td>' . htmlspecialchars($model->jenis_kelamin) . '</td>
                        <td>' . htmlspecialchars($model->tempat_lahir . ', ' . $model->tanggal_lahir) . '</td>
                        <td>' . htmlspecialchars($model->alamat) . '</td>
                        <td>' . htmlspecialchars($model->kecamatan) . '</td>
                        <td>' . htmlspecialchars($model->kelurahan) . '</td>
                        <td>' . htmlspecialchars($model->jenis_ppks_fix) . '</td>
                    </tr>
                ';
            }
            $mpdf->WriteHTML(ob_get_clean()); // Tambahkan buffer ke mPDF, lalu bersihkan buffer
        }
    
        // Tutup tabel
        $mpdf->WriteHTML('</tbody></table>');
    
        // Simpan PDF ke file sementara
        $pdfPath = __DIR__ . '/../runtime/laporan_ppks.pdf';
        $mpdf->Output($pdfPath, 'F');
    
        // Kirim file ke browser
        return Yii::$app->response->sendFile($pdfPath, 'Laporan_PPKS.pdf', ['inline' => true]);
    }
    
    public function actionPrintPdf()
    {
        require_once __DIR__ . '/../mpdf_v8.0.3/vendor/autoload.php';

        ini_set("memory_limit", "1G");
        ini_set("max_execution_time", "300");
        ini_set("pcre.backtrack_limit", "10000000");

        $mpdf = new \Mpdf\Mpdf([
            'mode' => 'utf-8',
            'format' => 'LEGAL',
            'orientation' => 'L',
            'tempDir' => __DIR__ . '/../runtime/mpdf',
        ]);

        $query = Ppks::find()
            ->where(['jenis_ppks_fix' => 'PENYANDANG DISABILITAS (TERLANTAR)'])
            ->orWhere(['anak_terlantar' => 1])
            ->orWhere(['lanjut_usia_terlantar' => 1])
            ->orWhere(['gelandangan' => 1])
            ->orWhere(['pengemis' => 1]);

        $header = $this->renderPartial('print-pdf-header');

        ob_start();
        echo $header; 

        $no = 1;
        foreach ($query->batch(8000) as $models) {
            echo $this->renderPartial('print-pdf', ['models' => $models, 'no' => &$no]);
            unset($models);
        }

        echo '</tbody></table>';

        $content = ob_get_clean();
        $mpdf->WriteHTML($content);
        return $mpdf->Output('Laporan_PPKS.pdf', 'I');
    }

    // public function actionTes(){
    //     $listkelurahan=Kelurahan::find()->all();
    //     foreach ($listkelurahan as $key => $value) {
    //         $kecamatan=@Kecamatan::findOne($value['kecamatan_id']);
    //         $kelurahan2=@Kelurahan2::find()->where(['kecamatan_id'=>$kecamatan->id_lama,'nama'=>strtoupper($value['nama'])])->one();
    //         if(empty($kelurahan2)){
    //             echo '<pre>';print_r($kecamatan);print_r($value['nama']);exit;
    //         }
    //         $model=Kelurahan::findOne($value['id']);
    //         $model->kecamatan_id_baru=@$kelurahan2->kecamatan_id;
    //         $model->kelurahan_id=@$kelurahan2->id;
            
    //         $model->save(false);
    //     }
    //     return 'berhasil';
    //     // return $rekap;
    // }

    public function actionRekapFullPpks(){
        $rekap=Rekap::fullPpks();
        // echo '<pre>';print_r($rekap);exit;
        return $this->render('rekap_full_ppks', [
            'rekap' => $rekap,
        ]);
    }

    
    public function actionChartPpks(){
        $rekap=Rekap::fullPpks();
        // echo '<pre>';print_r($rekap);exit;
        return $this->render('chart_ppks', [
            'rekap' => $rekap,
        ]);
    }

    public function actionTes2(){
        //generate user kecamatan
        $sql="SELECT * FROM kecamatan order by id desc";
        $list=@Actions::getQuery($sql);
        foreach ($list as $key => $value) {
            
            $kecamatan=$value['nama'];
            $id_kecamatan=$value['id_lama'];
            $username='kec'.'_'.strtolower(str_replace(' ', '_', $value['nama']));
            $pass=ActionsHelper::generateSecurePassword();
            $password=ActSecure::encryptPassword($pass);
            $role_id=3;
            $role='kecamatan';
            $password_hint=$pass;
            // echo '<pre>Username ';print_r($username);echo '</br>Password ';print_r($password);exit;
            Yii::$app->db->createCommand()->insert('users', [
                'username' => $username,
                'password' => $password, // gunakan hash password
                'nama_lengkap' => 'Kecamatan '.$value['nama'],
                'email' => $username.'@gmail.com',
                'role_id' => $role_id,
                'role' => $role,
                'kecamatan_id' => $id_kecamatan,
                'kelurahan_id' => null,
                'psm_id' => null,
                'password_hint' => $password_hint,
                'status' => 'Aktif',
                'foto' => null,
                'lastlogin' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ])->execute();

            // echo '<pre>';print_r($value['id_lama']);exit;
        }
        return 'success';
        // $list=Kecamatan::find()->all(); 
    }

        public function actionTes3(){
        //generate user kecamatan
        $sql="SELECT * FROM kelurahan order by id desc";
        $list=@Actions::getQuery($sql);
        // echo '<pre>';print_r($list);echo '</pre>';exit;
        foreach ($list as $key => $value) {
            
            $kelurahan=$value['nama'];
            $id_kecamatan=$value['kecamatan_id_baru'];
            $id_kelurahan=$value['kelurahan_id'];
            $username='kel'.'_'.strtolower(str_replace(' ', '_', $value['nama']));
            $pass=ActionsHelper::generateSecurePassword();
            $password=ActSecure::encryptPassword($pass);
            $role_id=4;
            $role='kelurahan';
            $password_hint=$pass;
            // echo '<pre>Username ';print_r($username);echo '</br>Password ';print_r($password);exit;
            Yii::$app->db->createCommand()->insert('users', [
                'username' => $username,
                'password' => $password, // gunakan hash password
                'nama_lengkap' => 'Kelurahan '.$value['nama'],
                'email' => $username.'@gmail.com',
                'role_id' => $role_id,
                'role' => $role,
                'kecamatan_id' => $id_kecamatan,
                'kelurahan_id' => $id_kelurahan,
                'psm_id' => null,
                'password_hint' => $password_hint,
                'status' => 'Aktif',
                'foto' => null,
                'lastlogin' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ])->execute();

            // echo '<pre>';print_r($value['id_lama']);exit;
        }
        return 'success';
        // $list=Kecamatan::find()->all(); 
    }

public function actionListPpks()
{
    $searchModel = new \app\models\PpksSearch();
    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

    $role = Yii::$app->user->identity->role;
    $showAll = isset($params['all']) && $params['all'] === 'true';

    if ($showAll=='true') {
        // Tampilkan data yang status_verifikasi != 'Sudah' ATAU status_validasi != 'Sudah' ATAU approved != 'Sudah'
        $dataProvider->query->andWhere([
            'or',
            ['<>', 'status_verifikasi', 'Sudah'],
            ['<>', 'status_validasi', 'Sudah'],
            ['<>', 'approved', 'Sudah'],
        ]);
    }elseif ($role == 'kelurahan') {
        $searchModel->status_verifikasi = 'Belum';
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['status_verifikasi' => 'Belum']);
    } elseif ($role == 'kecamatan') {
        $searchModel->status_validasi = 'Belum';
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere([
            'status_verifikasi' => 'Sudah',
            'status_validasi' => 'Belum',
        ]);
    } elseif ($role == 'dinsos') {
        $searchModel->approved = 'Belum';
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere([
            'status_verifikasi' => 'Sudah',
            'status_validasi' => 'Sudah',
            'approved' => 'Belum',
        ]);
    }

    return $this->render('listppks', [
        'searchModel' => $searchModel,
        'dataProvider' => $dataProvider,
    ]);
}

    
}
