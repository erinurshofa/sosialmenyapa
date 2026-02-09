<?php


namespace app\models;

use Yii;
use app\models\Kota;
use app\models\Psm;
use app\models\Psm2;
// use app\models\Kecamatankelurahan;
// use yii\db\Query;
// use yii\web\Session;
// use yii\helpers\Html;
// use yii\helpers\Json;

class ActionsHelper extends \yii\db\ActiveRecord
{

    public function updateIsoman($value){
      if ($value==="buka") {
        Yii::$app->db->createCommand()->update('helpers', ['buka_isoman' => 'buka'], 'id = 1')->execute();
      } else {
        Yii::$app->db->createCommand()->update('helpers', ['buka_isoman' => 'tutup'], 'id = 1')->execute();
      }
      
      
    }

    public function cekInputIsomanBukaatauTutup(){
      $sql="select * from helpers where id=1";

      $result=@Yii::$app->db->createCommand($sql)->queryAll();
      return @$result[0]['buka_isoman'];
    }

    public function updatePpkmPbl($value){
      if ($value==="buka") {
        Yii::$app->db->createCommand()->update('helpers', ['buka_ppkm_darurat' => 'buka'], 'id = 1')->execute();
      } else {
        Yii::$app->db->createCommand()->update('helpers', ['buka_ppkm_darurat' => 'tutup'], 'id = 1')->execute();
      }
    }

    public function cekInputPpkmPblBukaatauTutup(){
      $sql="select * from helpers where id=1";

      $result=@Yii::$app->db->createCommand($sql)->queryAll();
      return @$result[0]['buka_ppkm_darurat'];
    }

    public function updateBantuanBeras($value){
      if ($value==="buka") {
        Yii::$app->db->createCommand()->update('helpers', ['buka_bantuan_beras' => 'buka'], 'id = 1')->execute();
      } else {
        Yii::$app->db->createCommand()->update('helpers', ['buka_bantuan_beras' => 'tutup'], 'id = 1')->execute();
      }
    }




    public function cekInputUsulanBansosKemensosBukaatauTutup(){
      $sql="select * from helpers where id=1";

      $result=@Yii::$app->db->createCommand($sql)->queryAll();
      return @$result[0]['buka_usulan_bansos_kemensos'];
    }
    public function updateDataanakyatim($value){
      if ($value==="buka") {
        Yii::$app->db->createCommand()->update('helpers', ['buka_dataanakyatim' => 'buka'], 'id = 1')->execute();
      } else {
        Yii::$app->db->createCommand()->update('helpers', ['buka_dataanakyatim' => 'tutup'], 'id = 1')->execute();
      }
    }

    public function cekInputDataanakyatimBukaatauTutup(){
      $sql="select * from helpers where id=1";

      $result=@Yii::$app->db->createCommand($sql)->queryAll();
      return @$result[0]['buka_dataanakyatim'];
    }
    public static function loginLog(){
      $username=Yii::$app->user->identity->username;
      $login_time=date('Y-m-d H:i:s');
      $ip_address=Yii::$app->request->userIP;
      $created_at=date('Y-m-d H:i:s');
      $sql="
         insert into login_log (username,login_time,ip_address,created_at) values ('".$username.
          "','".$login_time.
          "','".$ip_address.
          "','".$created_at.
          "');";
    
      $result=@Yii::$app->db->createCommand($sql)->execute();
    }

    public static function activityLog($action='',$keterangan=''){
      $user_id=Yii::$app->user->identity->id_account;
      $username=Yii::$app->user->identity->username;
      $created_at=date('Y-m-d H:i:s');
      $sql="
         insert into activity_log (user_id,username,action,keterangan,created_at) values ('".$user_id.
         "','".$username.
         "','".$action.
        "','".$keterangan.
        "','".$created_at.
        "');";
      
      $result=@Yii::$app->db->createCommand($sql)->execute();
    }

    public function getVersion(){
      $sql="SELECT * FROM versioning order by id desc";
      $ver=@Actions::getQuery($sql);
      return $ver[0]['version'];
    }

    public function maskString($string, $start = 2, $end = -2, $maskChar = '*')
    {
        $length = strlen($string);
        if ($length <= $end) {
            return $string;
        }
        return substr($string, 0, $start) . str_repeat($maskChar, $length - $start - $end) . substr($string, $end);
    }

    public function unmaskString($maskedString, $originalString)
    {
        // Dalam kasus penggantian karakter sederhana, tidak ada logika unmasking yang kompleks
        return $originalString;
    }
    public function encryptPassword($var){
      $encrypted=base64_encode(base64_encode(base64_encode($var)));
      return $encrypted;
  }
  public function decryptPassword($encrypted){
      $decrypted=base64_decode(base64_decode(base64_decode($encrypted)));
      return $decrypted;
  }
  public function randomMask($string, $maskCount, $maskChar = '*') {
      $length = strlen($string);
      $maskPositions = array_rand(range(0, $length - 1), $maskCount);
  
      $masked = $string;
      foreach ($maskPositions as $position) {
          $masked = substr_replace($masked, $maskChar, $position, 1);
      }
  
      return $masked;
  }
  public function getActivityLog(){
    $sql="SELECT * FROM activity_log order by id desc";
    $ver=@ActionsHelper::getQuery($sql);
    return $ver;
  }
  public function getLoginLog(){
    $sql="SELECT * FROM login_log order by id desc";
    $ver=@ActionsHelper::getQuery($sql);
    return $ver;
  }
  public static function getQuery($querysql) {
    $connection = Yii::$app->getDB();
    $query = $connection->createCommand($querysql);
    return $query->queryAll();
  }

  public static function getBirthInfoFromNIK($nik) {
    // Pastikan panjang NIK valid
    if (strlen($nik) !== 16) {
        return "NIK tidak valid.";
    }

    // Ekstrak kode wilayah dan tanggal lahir
    $kodeKabKota = substr($nik, 0, 4); // Kode Provinsi + Kabupaten/Kota
    $kodeKec = substr($nik, 4, 2); // Kode Kecamatan
    $tgl = (int) substr($nik, 6, 2); // Tanggal lahir
    $bln = substr($nik, 8, 2); // Bulan lahir
    $thn = substr($nik, 10, 2); // Tahun lahir (dua digit)

    // Tentukan tahun lahir (asumsi tahun 1900-2099)
    $tahun = ($thn > date('y')) ? "19" . $thn : "20" . $thn;

    // Jika tanggal lahir lebih dari 31, berarti pemiliknya perempuan (dikurangi 40)
    $jenisKelamin = "Laki-laki";
    if ($tgl > 31) {
        $tgl -= 40;
        $jenisKelamin = "Perempuan";
    }

    // Gunakan daftar kode wilayah untuk menentukan tempat lahir
    $daftarWilayah = [
        "3322" => "Kabupaten Kudus, Jawa Tengah",
        "3374" => "Kota Semarang, Jawa Tengah",
        // Tambahkan kode wilayah lainnya sesuai kebutuhan
    ];
    $kota=@Kota::findOne($kodeKabKota);

    $tempatLahir = isset($kota->nama) ? $kota->nama : "Wilayah tidak diketahui";

    return [
        "tempat_lahir" => $tempatLahir,
        "tanggal_lahir" => "$tgl-$bln-$tahun",
        "jenis_kelamin" => $jenisKelamin
    ];
}

public static function generateSecurePassword($length = 12) {
  $db = Yii::$app->db;
  
  // Ambil 2 kata acak dari database
  $words = $db->createCommand('SELECT word FROM password_words ORDER BY RAND() LIMIT 2')
              ->queryColumn();

  if (count($words) < 2) {
      return "Error: Kata di database kurang!";
  }

  // Ambil angka & simbol acak
  $randomNumber = rand(10, 99);
  $symbols = "!@#$%^&*";
  $randomSymbol = $symbols[rand(0, strlen($symbols) - 1)];

  // Gabungkan password
  $password = $words[0] . $randomSymbol . $randomNumber . $words[1];

  return $password;
}
public static function generateUsername($length = 12) {
  $db = Yii::$app->db;

  do {
      // Ambil 2 kata acak dari database
      $words = $db->createCommand('SELECT word FROM password_words ORDER BY RAND() LIMIT 2')
                  ->queryColumn();

      if (count($words) < 2) {
          return "error_kata_kurang";
      }

      // Proses kata: ubah ke lowercase dan ganti spasi dengan underscore
      $word1 = strtolower(str_replace(' ', '_', trim($words[0])));
      $word2 = strtolower(str_replace(' ', '_', trim($words[1])));

      // Ambil angka acak
      $randomNumber = rand(10, 99);

      // Gabungkan menjadi username
      $username = "{$word1}_{$word2}{$randomNumber}";

      // Periksa apakah username sudah ada di tabel users
      $exists = $db->createCommand('SELECT COUNT(*) FROM users WHERE username=:username')
                   ->bindValue(':username', $username)
                   ->queryScalar();

  } while ($exists > 0); // Ulangi jika username sudah ada

  return $username;
}

public static function getPsm(){
  // $data = Psm::find()->where(['between', 'id', 21, 1000])->asArray()->all();
  $data=Psm::find()->asArray()->all();
  $result=array();
  foreach ($data as $key => $value) {
    $psm2=@Psm2::find()->where(['nama'=>$value['nama']])->one();
    if(!empty($psm2)){
      $model=Psm::findOne($value['id']);
      $model->nik=$psm2->nik;
      $model->tempat_lahir=$psm2->tempat_lahir;
      $model->tanggal_lahir=$psm2->tanggal_lahir;
      $model->jalan=$psm2->jalan;
      $model->rt=$psm2->rt;
      $model->rw=$psm2->rw;
      $model->jenis_kelamin=$psm2->jenis_kelamin;
      $model->login_terakhir=$psm2->login_terakhir;
      $model->no_rekening=$psm2->no_rekening;
      $model->nama_pemilik=$psm2->nama_pemilik;
      $model->nama_bank=$psm2->nama_bank;
      $model->hp=$psm2->no_hp;
      $model->provinsi_id=$psm2->provinsi_id;
      $model->kota_id=$psm2->kota_id;
      $model->kecamatan_id=$psm2->kecamatan_id;
      $model->kelurahan_id=$psm2->kelurahan_id;
      // echo '<pre>';print_r($model);exit;
      $model->save();
      $result['berhasil'][]=$model->nama;
    }else{
      $result['gagal'][]=$value['nama'];
    }
  }
  echo '<pre>';print_r($result);exit;
}



}

