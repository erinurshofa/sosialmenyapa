<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Actions;
use app\models\ActionsHelper2025;
use app\models\Users;
use app\models\ActionsHelper;
use app\models\Psm;
use app\models\Account;
use app\models\Kecamatan;
use app\models\Rekap; 
use app\models\ActSecure;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use app\models\Kelurahan2;
use app\models\Kelurahan;
use app\models\Kegiatan;
use kartik\mpdf\Pdf;

class SiteController extends Controller
{
    // public $enableCsrfValidation = false; // ENABLED CSRF by commenting this out

    // Layout name constants
    const LAYOUT_MAIN_FRONTEND = 'main_frontend';
    const LAYOUT_MAIN_FRONTEND2 = 'main_frontend2';
    const LAYOUT_MAIN_KEGIATAN = 'main_kegiatan';
    const LAYOUT_MAIN_LOGIN = 'main-login';
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout','dashboard','index', 'get-kelurahan','kegiatan','home','statistik','registrasi-psm','kirim-email'],
                'rules' => [
                    [
                        'actions' => ['logout','dashboard'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['index','get-kelurahan','kegiatan','home','statistik','registrasi-psm','kirim-email'],
                        'allow' => true,
                        'roles' => ['?', '@'], // guest dan user boleh
                    ],
                ],

            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'get-kelurahan' => ['post'], // pastikan POST diizinkan
                ],
            ],
            // 'verbs' => [
            //     'class' => VerbFilter::className(),
            //     'actions' => [
            //         'logout' => ['post'],
            //     ],
            // ],
        ];
    }

    // public function beforeAction($action)
    // {
    //     if ($action->id === 'get-kelurahan') {
    //         Yii::$app->request->enableCsrfValidation = false;
    //     }

    //     return parent::beforeAction($action);
    // }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function beforeAction($action)
    {
        if ($action->id === 'get-kelurahan') {
            $this->enableCsrfValidation = false;
        }

        return parent::beforeAction($action);
    }

    public function actionHome()
    {
        $this->layout='main_frontend';
        return $this->render('index', []);
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        // $session = Yii::$app->session;
        // if (!Yii::$app->user->isGuest && $session->isActive) {
        //     // Actions::updatedashboard();
        //     return $this->redirect(['site/dashboard']);
        // }
        // // return $this->render('index', [
        // // ]);
        // return $this->redirect(['site/home']);
        $this->layout='main_frontend';
        return $this->render('index', []);
    }

    public function actionIndex2()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->redirect(['site/dashboard']);
        }
        // if (Yii::$app->user->isGuest)
            // return $this->goHome();
            // return Yii::$app->getResponse()->redirect(Url::to(['site/login']));
        return $this->render('index2', [
        //     'totalJadwal' => Actions::getTotalJadwal(),
        //     'totalPelaksana' => Actions::getTotalPelaksana(),
        //     'totalSambutan' => Actions::getTotalSambutan(),
        //     'totalUser' => Actions::getTotalUser(),
        //     'agendaWalikotaHariIni' => Actions::agendaHariIni(),
        ]);
    }

    public function actionCoba()
    {
        return $this->render('coba');
    }

public function actionKegiatan()
{
    $this->layout = "main_kegiatan";

    $query = Kegiatan::find()->where(['deleted_at' => null]);

    $search = Yii::$app->request->get('search');
    $kategori_id = Yii::$app->request->get('kategori_id');
    $tanggal = Yii::$app->request->get('tanggal');

    // Jika tidak ada tanggal dikirim, set default ke hari ini
    if (!$tanggal) {
        $tanggal = date('Y-m-d');
    }

    if ($search) {
        $query->andFilterWhere(['or',
            ['like', 'judul', $search],
            ['like', 'lokasi', $search],
            ['like', 'penyelenggara', $search],
        ]);
    }

    if ($kategori_id) {
        $query->andWhere(['kategori_id' => $kategori_id]);
    }

    if ($tanggal) {
        $query->andWhere(['DATE(tanggal)' => $tanggal]);
    }

    $data = $query->orderBy(['tanggal' => SORT_ASC])->all();
    
    return $this->render('kegiatan', [
        'data' => $data,
        'search' => $search,
        'kategori_id' => $kategori_id,
        'tanggal' => $tanggal, // tetap dikirim ke view
    ]);
}


    // public function actionStatistik()
    // {
    //     $this->layout = self::LAYOUT_MAIN_FRONTEND2;
    //     $data=Rekap::fullPpks();
    //     // echo '<pre>';print_r($data);echo '</pre>';exit;
    //     return $this->render('statistik',[
    //         'data' => $data,
    //     ]);
    // }

    public function actionStatistik()
    {
        $this->layout = self::LAYOUT_MAIN_FRONTEND2;
        $kecamatan = Yii::$app->request->get('kecamatan');
        $kelurahan = Yii::$app->request->get('kelurahan');
        $data = Rekap::fullPpks($kecamatan, $kelurahan);

        // Siapkan data untuk chart
        $wilayah = [];
        $pria = [];
        $perempuan = [];
        $dtks = [];
        $nondtks = [];

        // Daftar semua kategori sesuai field di tabel
        $kategori = [
            'Anak Terlantar' => 0,
            'Balita Terlantar' => 0,
            'Anak Berhadapan Hukum' => 0,
            'Anak Jalanan' => 0,
            'Anak Dengan Disabilitas' => 0,
            'Anak Korban Tindak Kekerasan' => 0,
            'Anak Memerlukan Perlindungan Khusus' => 0,
            'Lansia Terlantar' => 0,
            'Penyandang Disabilitas' => 0,
            'Tuna Susila' => 0,
            'Gelandangan' => 0,
            'Pengemis' => 0,
            'Pemulung' => 0,
            'Kelompok Minoritas' => 0,
            'Bekas Warga Binaan' => 0,
            'ODGJ Terlantar' => 0,
            'Korban Bencana Alam' => 0,
            'Korban Bencana Sosial' => 0,
            'Fakir Miskin' => 0,
            'Keluarga Bermasalah Sosial Psikologis' => 0,
            'Korban Tindak Kekerasan' => 0,
            'Pekerja Migran Bermasalah' => 0,
            'Orang Dengan HIV/AIDS' => 0,
            'Korban Perdagangan Orang' => 0,
            'Korban Eksploitasi Seksual' => 0,
            'Korban Napza' => 0,
            'Korban Trafficking' => 0,
            'Korban Diskriminasi' => 0,
            'Korban Konflik Sosial' => 0,
            'Korban Kekerasan' => 0,
            'Korban Penelantaran' => 0,
            // Tambahkan kategori lain sesuai kebutuhan field tabel Rekap
        ];

        foreach ($data['full_ppks'] as $row) {
            if ($row['kelurahan'] === 'SUBTOTAL') { // Per kecamatan
                $wilayah[] = $row['kecamatan'];
                $pria[] = (int)$row['pria'];
                $perempuan[] = (int)$row['perempuan'];
                $dtks[] = (int)$row['dtks'];
                $nondtks[] = (int)$row['non_dtks'];
            }
            // Kategori utama (ambil dari TOTAL)
            if ($row['kecamatan'] === 'TOTAL' && $row['kelurahan'] === 'SUBTOTAL') {
                $kategori['Anak Terlantar'] = (int)($row['anak_terlantar'] ?? 0);
                $kategori['Balita Terlantar'] = (int)($row['anak_balita_terlantar'] ?? 0);
                $kategori['Anak Berhadapan Hukum'] = (int)($row['anak_yang_berhadapan_dengan_hukum'] ?? 0);
                $kategori['Anak Jalanan'] = (int)($row['anak_jalanan'] ?? 0);
                $kategori['Anak Dengan Disabilitas'] = (int)($row['anak_dengan_kedisabilitasan'] ?? 0);
                $kategori['Anak Korban Tindak Kekerasan'] = (int)($row['anak_korban_tindak_kekerasan'] ?? 0);
                $kategori['Anak Memerlukan Perlindungan Khusus'] = (int)($row['anak_yang_memerlukan_perlindungan_khusus'] ?? 0);
                $kategori['Lansia Terlantar'] = (int)($row['lanjut_usia_terlantar'] ?? 0);
                $kategori['Penyandang Disabilitas'] = (int)($row['penyandang_disabilitas'] ?? 0);
                $kategori['Tuna Susila'] = (int)($row['tuna_susila'] ?? 0);
                $kategori['Gelandangan'] = (int)($row['gelandangan'] ?? 0);
                $kategori['Pengemis'] = (int)($row['pengemis'] ?? 0);
                $kategori['Pemulung'] = (int)($row['pemulung'] ?? 0);
                $kategori['Kelompok Minoritas'] = (int)($row['kelompok_minoritas'] ?? 0);
                $kategori['Bekas Warga Binaan'] = (int)($row['bekas_warga_binaan_lembaga_pemasyarakatan'] ?? 0);
                $kategori['ODGJ Terlantar'] = (int)($row['odgj_terlantar'] ?? 0);
                $kategori['Korban Bencana Alam'] = (int)($row['korban_bencana_alam'] ?? 0);
                $kategori['Korban Bencana Sosial'] = (int)($row['korban_bencana_sosial'] ?? 0);
                $kategori['Fakir Miskin'] = (int)($row['fakir_miskin'] ?? 0);
                $kategori['Keluarga Bermasalah Sosial Psikologis'] = (int)($row['keluarga_bermasalah_sosial_psikologis'] ?? 0);
                $kategori['Korban Tindak Kekerasan'] = (int)($row['korban_tindak_kekerasan'] ?? 0);
                $kategori['Pekerja Migran Bermasalah'] = (int)($row['pekerja_migran_bermasalah'] ?? 0);
                $kategori['Orang Dengan HIV/AIDS'] = (int)($row['orang_dengan_hivaids'] ?? 0);
                $kategori['Korban Perdagangan Orang'] = (int)($row['korban_perdagangan_orang'] ?? 0);
                $kategori['Korban Eksploitasi Seksual'] = (int)($row['korban_eksploitasi_seksual'] ?? 0);
                $kategori['Korban Napza'] = (int)($row['korban_penyalahgunaan_napza'] ?? 0);
                $kategori['Korban Trafficking'] = (int)($row['korban_trafficking'] ?? 0);
                $kategori['Korban Diskriminasi'] = (int)($row['korban_diskriminasi'] ?? 0);
                $kategori['Korban Konflik Sosial'] = (int)($row['korban_konflik_sosial'] ?? 0);
                $kategori['Korban Kekerasan'] = (int)($row['korban_kekerasan'] ?? 0);
                $kategori['Korban Penelantaran'] = (int)($row['korban_penelantaran'] ?? 0);
                // Tambahkan pengisian kategori lain jika ada field baru
            }
        }

        return $this->render('statistik', [
            'wilayah' => $wilayah,
            'pria' => $pria,
            'perempuan' => $perempuan,
            'dtks' => $dtks,
            'nondtks' => $nondtks,
            'kategori' => $kategori,
            'kecamatan' => $kecamatan,
            'kelurahan' => $kelurahan,
        ]);
    }
    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        $this->layout="main-login";
        // Actions::setglobal();
        if (!Yii::$app->user->isGuest) {
            // Actions::updatedashboard();
            return $this->redirect(['site/dashboard']);
        }

        $model = new LoginForm();
        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
            if($model->login() && (ActSecure::validateInput($_POST['LoginForm']) != false)){
                // echo '<pre>';
                // echo print_r($model);
                // echo '</pre>';
                // exit;
                // dd($model);
                ActionsHelper::loginLog();
                // Actions::createsession('januari_2022','bansos');
                // return $this->redirect(['site/dashboard']);
                return $this->goBack();
            }
        }
        
        
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            
        }

        $model->password = '';
        return $this->render('login4', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        // $a = Account::find()->where(['username'=>@Yii::$app->user->identity->username])->one();
        //update account lastlogin
        Actions::updatelastlogin(@Yii::$app->user->identity->username);
        Actions::closesession();
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionRegister()
    {
        return $this->render('maintenance');
    }

    public function actionPermohonanakun()
    {
        $model = new Account();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_account]);
        }

        return $this->render('permohonanakun', [
            'model' => $model,
        ]);
    }

    public function actionTerimakasih()
    {
        return $this->render('terimakasih', [
        ]);
    }


    public function actionDashboard()
    {
       set_time_limit(300);
       $kecamatan=Rekap::getRekapPpksKecamatan2();
       $kelurahan=Rekap::getRekapPpksKelurahan();
    //    dd($kelurahan);
        return $this->render('dashboard', [
                'kecamatan' => $kecamatan,
                'kelurahan' => $kelurahan,
        ]);
    }
    
    


    public function actionTest234(){
        $kecamatan = Kecamatan::find()->joinWith(['kelurahan'])->all();
        $tampil='';
        $tampil.='<div class="btn-group">'.
            '<button type="button" class="btn btn-danger">Filter Kecamatan Kelurahan</button>'.
            '<button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">'.
                '<span class="caret"></span>'.
                '<span class="sr-only">Toggle Dropdown</span>'.
            '</button>'.
            '<ul class="dropdown-menu" role="menu">';
        $tampil3='<li class="dropdown-submenu">';
        foreach ($kecamatan as $key => $value) {
             $tampil3.=     '<a class="test" href="'.$value['KodeKecamatan'].'">'.$value['Nama'].'<span class="caret"></span></a>';
             $tampil2='<ul class="dropdown-menu">';
            foreach ($value['kelurahan'] as $key2 => $value2) {
                $tampil2.=     '<li><a href="'.$value2['KodeKecamatan'].'">'.$value2['Nama'].'</a></li>';
                # code...
            }
            $tampil2.='</ul>';
            $tampil3.=$tampil2.'</li>';
            $tampil.=$tampil3;

        }
        $tampil.='</li></ul>';
        return $tampil;
        // return phpinfo();
        // return Actions::getAllKecamatan()['Nama'];
    }

    public function actionDownloadtemplateusulsanggah(){
        // $templateProcessor->saveAs(\Yii::$app->basePath . '/web/result/bansosusulsanggah'.$account->username.'.csv');
        Yii::$app->response->sendFile(\Yii::$app->basePath . '/web/resource/bansosusulsanggah.csv');
    }



    public function actionCheck(){
        $url=@Yii::$app->getRequest()->getQueryParam('url');
        $check_url_status = check_url($url);
        if ($check_url_status == '200')
           echo "Link Works";
        else
           echo "Broken Link ".$check_url_status;
    }
    public function actionOkelah(){
        $url="http://www.depkes.go.id/";
        $curl_handle=curl_init();
        curl_setopt($curl_handle, CURLOPT_URL,$url);
        curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl_handle, CURLOPT_USERAGENT, 'Your application name');
        $data = curl_exec($curl_handle);
        curl_close($curl_handle);
        // $data=file_get_contents($url);
        $data = strip_tags($data,"<a>");
        $d = preg_split("/<\/a>/",$data);

        foreach ( $d as $k=>$u ){
            if( strpos($u, "<a href=") !== FALSE ){
                $u = preg_replace("/.*<a\s+href=\"/sm","",$u);
                $u = preg_replace("/\".*/","",$u);
                print_r($u);
                echo '<br>';
                
            }
        }
    }
    public function actionPercobaan(){
        $hasil = Actions::getColumnTable('p3ke_keluarga_2023');
        echo '<pre>';
        echo print_r(array_values($hasil));
        echo '</pre>';
        // return '<pre>'.print_r($hasil).'</pre>';
    }

    public function actionTest()
    {
        $orgDate = "2022-08-17";  
        $date1 = date("y-m-d H:i:s", strtotime($orgDate)); 
        $date2 = date("y-m-d 23:59:59", strtotime($orgDate)); 
        return $date1.' '.$date2;
        // dd(Actions::TrackingNik3("3374062408920002"));
        // return 'tes';
    }

    public function actionHarga($eps,$bvps){
        return calculateGrahamNumber($eps, $bvps);
    }

    public function actionRegistrasiPsm(){
        $this->layout="main_frontend2";

        // RATE LIMITING: Check if IP has submitted recently
        $ip = Yii::$app->request->userIP;
        $cacheKey = 'registrasi_psm_limit_' . $ip;
        if (Yii::$app->cache->get($cacheKey)) {
             Yii::$app->session->setFlash('error', 'Terlalu banyak percobaan. Silakan tunggu 1 menit.');
             return $this->refresh();
        }

        $user= new Users();
        $model = new Psm();
        if (!empty($_POST)){
            // echo '<pre>';print_r($_POST);exit;
            if ($model->load(Yii::$app->request->post())) {

                 // SET RATE LIMIT (1 minute)
                 Yii::$app->cache->set($cacheKey, true, 60);
                
                // SANITIZATION (XSS Prevention) - Loop through all attributes
                foreach ($model->attributes as $attribute => $value) {
                    if (is_string($value)) {
                        $model->$attribute = strip_tags($value);
                    }
                }
                // Sanitize other string fields as necessary
                
                //BUAT USER TERLEBIH DAHULU
                $user->username=$model->email;
                $user->password=ActSecure::encryptPassword($model->password);
                $user->nama_lengkap=strip_tags($model->nama);
                $user->email=$model->email;
                $user->role_id=5;
                $user->role='psm';
                $user->kecamatan_id=$model->kecamatan_id;
                $user->kelurahan_id=$model->kelurahan_id;
                $user->password_hint=$model->password; // KEPT AS REQUESTED, BUT DANGEROUS
                $user->status="Belum Aktif";
                // echo '<pre>';
                // print_r($user);
                // echo '</pre>';
                // exit;
                
                $transaction = Yii::$app->db->beginTransaction();
                try {
                    if(!$user->save(false)){
                         throw new \Exception("Gagal menyimpan User.");
                    }
                    
                    // ISI USER ID KE TABEL PSM
                    $model->user_id=$user->id;
                    $model->provinsi_id='33';
                    $model->kota_id='3374';
                    $kecamatan=Kecamatan::find()->where(['id_lama'=>$model->kecamatan_id])->one();
                    $kelurahan=Kelurahan::find()->where(['kelurahan_id'=>$model->kelurahan_id])->one();
                    $model->kecamatan=strtoupper($kecamatan->nama);
                    $model->kelurahan=strtoupper($kelurahan->nama);
                    $model->keterangan="PSM ".$model->kelurahan;
                    
                    if ($model->validate()) {
                        if(!$model->save(false)) {
                            throw new \Exception("Gagal menyimpan Data PSM.");
                        }

                        // ISI PSM ID KE TABEL USER
                        $user2=Users::findOne($user->id);
                        $user2->psm_id=$model->id;
                        $user2->save(false);
                        
                        $transaction->commit();

                        // Kirim email ke pendaftar
                        try {
                            Yii::$app->mailer->compose('psm-registrasi', [
                                    'nama' => $model->nama,
                                ])
                                ->setFrom(['emailkamu@gmail.com' => 'Dinas Sosial Kota Semarang']) // ganti sesuai emailmu
                                ->setTo($model->email)
                                ->setSubject('Pendaftaran PSM Berhasil Diterima')
                                ->send();
                        } catch (\Exception $e) {
                            // Ignore email error, registration is successful
                        }

                        Yii::$app->session->setFlash('success', 'Registrasi berhasil.');
                        // Tampilkan halaman ucapan terima kasih
                        return $this->render('terima-kasih', ['model' => $model]);
                    } else {
                        // Ambil error validasi dalam bentuk array
                        $errors = $model->getErrors();
                        $errorMsg = '';
                        foreach($errors as $field => $messages) {
                            $errorMsg .= implode(', ', $messages) . '<br>';
                        }
                        Yii::$app->session->setFlash('error', $errorMsg);
                        $transaction->rollBack();
                    }
                } catch (\Exception $e) {
                    $transaction->rollBack();
                    Yii::$app->session->setFlash('error', $e->getMessage());
                }
            }
        }
        return $this->render('registrasi_psm', [
            'model' => $model,
            'user' => $user,
        ]);
    }

    public function actionGetKelurahan()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        
        $parents = Yii::$app->request->post('depdrop_parents');

        if ($parents === null) {
            return ['output' => '', 'selected' => '', 'error' => 'POST data kosong'];
        }

        if (!isset($parents[0])) {
            return ['output' => '', 'selected' => '', 'error' => 'ID Kecamatan kosong'];
        }

        $kecamatan_id = $parents[0];

        $kelurahan = Kelurahan2::find()->where(['kecamatan_id' => $kecamatan_id])->all();

        $out = [];
        foreach ($kelurahan as $kl) {
            $out[] = ['id' => $kl->id, 'name' => $kl->nama];
        }

        return ['output' => $out, 'selected' => ''];
    }

    public function actionKirimEmail()
    {
        Yii::$app->mailer->compose()
            ->setFrom('sosialmenyapa@gmail.com')
            ->setTo('erinurshofa@gmail.com')
            ->setSubject('Tes Kirim Email')
            ->setTextBody('Ini isi email biasa')
            ->setHtmlBody('<b>Ini email HTML dari Yii2 Symfony Mailer</b>')
            ->send();

        return "Email berhasil dikirim!";
    }

    
    
    
}

