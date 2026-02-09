<?php

namespace app\controllers;

use Yii;
use app\models\Actions;
use app\models\Account;
use app\models\Districts;
use app\models\ImportForm;
use app\models\ActionsHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\filters\AccessControl;
use app\components\AccessRule;
/**
 * SettingController implements the CRUD actions for Setting model.
 */
class SettingController extends Controller
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
                    return $this->redirect(['site/login']);
                }
              ],
        ];
    }

    /**
     * Lists all Setting models.
     * @return mixed
     */
    public function actionMenu()
    {
      $menu=@Yii::$app->getRequest()->getQueryParam('menu');
      $session=@Yii::$app->session;
      Actions::createsession(@$session['periode'],@$menu);
      ActionsHelper::activityLog($session['menu'],'Melihat Menu Data '.$session['menu']);
      // print_r($menu);exit;
      if($session['menu']=="p3ke_2025"){
        return $this->redirect(['site/berandap3ke2025']);
      }else{
        return $this->redirect(['site/beranda'.$session['menu']]);
      }
      // return $this->redirect(['site/beranda'.$session['menu']]);
      // echo "<script>window.location=history.go(-1);</script>";
    }
    public function actionPeriode()
    {
      $periode=@Yii::$app->getRequest()->getQueryParam('periode');
      $session=@Yii::$app->session;
      Actions::createsession(@$periode,@$session['menu']);
      // print_r($periode);exit;
      return $this->redirect(['site/dashboard']);
      // echo "<script>window.location=history.go(-1);</script>";
    }
    public function actionSession()
    {
      $periode=@Yii::$app->getRequest()->getQueryParam('periode');
      $menu=@Yii::$app->getRequest()->getQueryParam('menu');
      // $session=@Yii::$app->session;
      Actions::createsession(@$periode,@$menu);
      // print_r($periode);exit;
      return $this->redirect(['site/dashboard']);
      // echo "<script>window.location=history.go(-1);</script>";
    }
    public function actionTest()
    {
      $role=ArrayHelper::map(Account::find()->select('role')->distinct()->asArray()->all(), 'role', 'role');
      unset($role['admin']);
      unset($role['webservice']);
      unset($role['user']);
      dd($role);
    }
    public function actionImport()
    {
        $model = new ImportForm();

        if ($model->load(Yii::$app->request->post()) ) {
        //   echo '<pre>';
        // print_r($_POST);
        // print_r($_FILES);
        // echo '</pre>';
        // exit;
            $model->file = UploadedFile::getInstance($model, 'file');
            if ( $model->file )
                {
                    $time = time();
                    $model->file->saveAs('csv/' .$time. '.' . $model->file->extension);
                    $model->file = 'csv/' .$time. '.' . $model->file->extension;
                    
                    $handle = fopen($model->file, "r");
                    $flag = true;

                     while (($fileop = fgetcsv($handle, 1000, ";")) !== false) 
                     {
                        //ignore first row
                        if($flag) { $flag = false; continue; }
                        $id = $fileop[0];
                        $iddtks = $fileop[1];
                        $provinsi = $fileop[2];
                        $kota = $fileop[3];
                        $kecamatan=$fileop[4]; 
                        $kelurahan=$fileop[5]; 
                        $rt=$fileop[6]; 
                        $rw=$fileop[7]; 
                        $dusun=$fileop[8]; 
                        $alamat=$fileop[9]; 
                        $noka_bpjs=$fileop[10]; 
                        $psnoka_bpjs=$fileop[11]; 
                        $nama=addslashes($fileop[12]); 
                        $tanggal_lahir=$fileop[13]; 
                        $tempat_lahir=$fileop[14]; 
                        $jenis_kelamin=$fileop[15]; 
                        $nik=$fileop[16]; 
                        $nokk=$fileop[17]; 
                        $hub_keluarga=$fileop[18]; 
                        $nama_ibu_kandung=addslashes($fileop[19]); 
                        $keterangan=$fileop[20];
                        $sql = "INSERT INTO pbi_februari_2022_pbi(id,iddtks,provinsi,kota,kecamatan,kelurahan,rt,rw,dusun,alamat,noka_bpjs,psnoka_bpjs,nama,tanggal_lahir,tempat_lahir,jenis_kelamin,nik,nokk,hub_keluarga,nama_ibu_kandung,keterangan) 
                        VALUES ('$id', '$iddtks', '$provinsi', '$kota', '$kecamatan', '$kelurahan', '$rt', '$rw', '$dusun', '$alamat', '$noka_bpjs', '$psnoka_bpjs', '$nama', '$tanggal_lahir', '$tempat_lahir', '$jenis_kelamin', '$nik', '$nokk', '$hub_keluarga', '$nama_ibu_kandung', '$keterangan')";
                        $query = Yii::$app->db->createCommand($sql)->execute();
                     }
                     if ($query) 
                     {
                        echo "data upload successfully";
                     }
                }
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('import', [
                'model' => $model,
            ]);
        }
  }
  public function beforeAction($action) 
  { 
      $this->enableCsrfValidation = false; 
      return parent::beforeAction($action); 
  }
  public function actionList() 
  { 
    $kabupaten="select * from regencies where name = 'KABUPATEN KENDAL'";
    $kecamatankabupatenkendal="select * from districts where regency_id = '3324'";
    $semuakelurahan="select * from villages where district_id like '3324%'";
    $listkelurahankecamatan="select * from villages where district_id like '3324010%'";
    $listkelurahankecamatanygdipilih="select * from villages where district_id = '3324010001'";
    $sql="SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES 
          WHERE TABLE_NAME LIKE 'dtks_%%_2021%' order by CREATE_TIME";
    $a= Actions::getQuery($sql);
    $menu=substr($a[0]['TABLE_NAME'], 0, strpos($a[0]['TABLE_NAME'], "_"));
    $d= explode('_', $a[0]['TABLE_NAME']);
    $periode=$d[1].'_'.$d[2];
    $tahun=$d[2];
    $district=Districts::find()->where(['regency_id'=>'3324'])->all()['attributes'];
    // $class = end(explode("\\", get_class($a)));
    dd($district);
  }

}
