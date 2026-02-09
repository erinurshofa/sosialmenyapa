<?php

namespace app\models;

use Yii;
use yii\db\Query;
use yii\web\Session;
use app\models\Account;
use yii\helpers\Html;
use yii\helpers\Json;
use app\models\ActionLib;
use yii\helpers\Url;
use kartik\mpdf\Pdf;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;
use yii\db\ActiveQuery;

use app\models\Kecamatan;
class Actions extends \yii\db\ActiveRecord
{
    public static function createsession($periode='',$menu=''){
      $session = Yii::$app->session;
      if (!$session->isActive) $session->open();
      $session->set('username', @Yii::$app->user->identity->username);
      $session->set('password', @Yii::$app->user->identity->username);
      $session->set('periode', $periode);
      $session->set('menu', $menu);
    }
    public static function closesession(){
      $session = Yii::$app->session;
      $session->close();
      $session->destroy();
    }


  public static function getColumnTable($table){
      $a= Actions::getQuery('SHOW COLUMNS FROM '.$table);
      $hasil=array();
      foreach ($a as $key => $value) {
        $hasil[]=array($value['Field']=>ucwords(str_replace("_", " ", $value['Field'])));
      }
      return $hasil;
  }

  public static function coba(){
  $sql_loc = "select nama_kecamatan from status_kesejahteraan";
  $raw_loc = $base = Yii::$app->db->createCommand($sql_loc)->queryAll();
    foreach ($raw_loc as $loc){
        $nombre_loc= $loc['nama_kecamatan'];
        $data_loc[] = $nombre_loc;
    }
    $data_loc = json_encode($data_loc);
    return $data_loc;
  }
  public function getPermohonanbyusername($username){
        $searchModel = new DokumenSearch();
        $dataProvider = $searchModel->search(['DokumenSearch'=>['username'=>$username]]);
        $dataProvider->setSort([
            'defaultOrder' => [
                'created' => SORT_DESC
            ]
        ]);
        $dataProvider->pagination->pageSize = 5;
        return $dataProvider->getModels();
  }

  public function tampilUploadpermohonanbyusername($username){
        $hasil = Actions::getPermohonanbyusername($username);

             $tampil=''; 
        if (!empty($hasil)) {
            $tampil='
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Status Permohonan</h3>
            </div>
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>No</th>
                  <th>Judul</th>
                  <th>Kategori</th>
                  <th>Deskrisi</th>
                  <th>Status</th>
                </tr>
              ';
              $number=1;
              foreach ($hasil as $key => $value) {
                    $tampil.='
                <tr>
                  <td>'.$number++.'</td>
                  <td>'.$value['judul'].'</td>
                  <td>'.$value['kategori_dokumen'].'</td>
                  <td>'.$value['deskripsi'].'</td>
                  <td>'.Actions::getStatus($value['status']).'</td>
                </tr>
                    ';
              }
              $tampil.='
                </table>
            </div>
          </div>
        </div>
      </div>
              ';

        }else{
            $tampil.='
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tidak ada Permohonan '.Actions::convDateTimeIndonesia(date('Y-m-d')).'</h3>
            </div>
          </div>
        </div>
      </div>
            ';
        }   
        return $tampil;
    }

    public function tampilUploadpermohonanbyusername2($username){
        $hasil = Actions::getPermohonanbyusername($username);
        $tampil=''; 
        if (!empty($hasil)) {
            $tampil='
      <div class="row">
        <div class="col-xs-12">
          <div>
            <div class="table-responsive">
              <table class="table table-hover">
                <thead class="bg-red">
                <tr>
                  <td>No</td>
                  <td>Judul</td>
                  <td>Kategori</td>
                  <td>Status</td>
                </tr>
                </thead>
              ';
              $number=1;
              foreach ($hasil as $key => $value) {
                    $tampil.='
                <tbody>
                <tr>
                  <td>'.$number++.'</td>
                  <td>'.$value['judul'].'</td>
                  <td>'.$value['kategori_dokumen'].'</td>
                  <td>'.Actions::getStatus($value['status']).'</td>
                </tr>
                </tbody>
                    ';
              }
              $tampil.='
                </table>
            </div>
          </div>
        </div>
      </div>
              ';

        }else{
            $tampil.='
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h4 class="box-title">Belum Upload Data Apapun</h4>
            </div>
          </div>
        </div>
      </div>
            ';
        }   
        return $tampil;
    }


 
  public static function tampilKesejahteraan() {
    $hasil=Actions::getQuery('select rtd1,rtd2,rtd3,rtd4 from status_kesejahteraan');
    $statistik = json_encode($hasil,true);
    $databar=[];
    return $keyArray;
  }

  
  public static function getQuery($querysql) {
    $connection = Yii::$app->getDB();
    $query = $connection->createCommand($querysql);
    return $query->queryAll();
  }


  public function getStatus($status){
        if ($status=='diterima') {
            return '<span class="label label-success">'.$status.'</span>';
        }                        
        if ($status=='ditolak') {
            return '<span class="label label-danger">'.$status.'</span>';
        }
        if ($status=='proses') {
            return '<span class="label label-primary">'.$status.'</span>';
        }
    }
   public static function generateNilai()
    {
        // pertama menentukan 10 digit prefix
        // lalu suffix = 10 digit pertama dikali tanggal, bulan, tahunn dan 3
        // lalu di lakukan base64_encode
        date_default_timezone_set('Asia/Jakarta');
        $time=time();
       // $prefix=$time;
        $prefix=rand(1000000000,PHP_INT_MAX);
        $tanggal=date("j");
        $bulan=date("n");
        $tahun=date("Y");
        $pengali=3;
        $suffix=$prefix*$tanggal*$bulan*$tahun*$pengali;

        return base64_encode($prefix.$suffix);
    }
    public static function GetHttpContent($url)
    {
      //$data = [ 'text'=>$text ];
      $options = [
            'http' => [
                        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                        'method'  => 'GET',
                        //'content' => http_build_query($data),
                        'timeout' => 200,
                       ],
            'ssl'=>[
                      'verify_peer'=>false,
                      'verify_peer_name'=>false,
                    ],
      ];
      $context  = stream_context_create($options);
      $result = @file_get_contents($url, false, $context);
      return $result;
    }


  public static function Format2digit($number=0)
  {
     if ($number<10) { return '0'.$number; }
     else {return $number;}
  }
  
  public static function getDataArray($arr=[])
  {
    if (is_array($arr))
        foreach (@$arr as $arr2) {
            $data[]=@$arr2->attributes;
        }

    return @$data;
  }

  
  public static function mailcontact($to,$from,$subject,$phone,$body){
    $headers = "From: ".$from."\r\n";
    $headers .= "CC: info@dptcsmg.com\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";;
    //mail('joss.aritonang@gmail.com',$subject,$body,$headers);
    mail($to,'DINSOS - '.$subject,$body,$headers);
  }

  public function service($url="", $input="",$method="")
  {
    $data_string = json_encode($input);
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'accept: application/json',
        'content-type: application/json',
        'body: ' . $data_string,
        'timeout: 200' )
    );
    $result = curl_exec($ch);
    // $result = json_encode($result);
    return $result;
  }

  // public static function TrackingNik($nik) {
  //   $hasil= '';
  //   $url="http://112.78.42.106:8000/dukcapil/get_json/I_DINSOS/GET_NIK";
  //   $method="POST";
  //   // AT/EWV
  //   $input=array("nik"=>$nik, "user_id"=>"udinsos01", "password"=>"AT/EWV");
  //   $input2=array("nik"=>$nik, "user_id"=>"udinsos02", "password"=>"NQJF9S");
  //   // $inputjson=json_encode($input);
  //   $result = @Actions::service($url,$input,$method);
    
  //   return $result;
  // }
  public static function TrackingNik2($nik) {
    $hasil= '';
    $url="http://103.101.52.190:56787/dukcapil/get_json/33-74I_DINSOS_3374/GET_NIK";
    $method="POST";
    // AT/EWV
    $input=array("nik"=>$nik, "user_id"=>"1247202002173drs.muthohar,", "password"=>"dinsos1234");
    // $input2=array("nik"=>$nik, "user_id"=>"udinsos02", "password"=>"NQJF9S");
    // $inputjson=json_encode($input);
    $result = @Actions::service($url,$input,$method);

    return $result;
  }
  public static function TrackingNik3($nik) {
    $hasil= '';
        // hilangkan spasinya
        $nik=strtr($nik,[' '=>'']);
    $url="http://172.16.160.43:8080/dukcapil/get_json/33-74/IDINSOS_3374/GET_NIK";
    $method="POST";
    // AT/EWV
    $input=array("nik"=>$nik, "user_id"=>"1247202002173drs.muthohar,", "password"=>"dinsos1234");
    // $input2=array("nik"=>$nik, "user_id"=>"udinsos02", "password"=>"NQJF9S");
    // $inputjson=json_encode($input);
    $result = @Actions::service($url,$input,$method);
    $result=json_decode($result);
    $result= @$result->content[0];
    return (array)@$result;
  }
  public static function TrackingNik($nik) {
    $hasil= '';
        // hilangkan spasinya
    $nik=strtr($nik,[' '=>'']);
    //dulu tnpa vpn
    //$url="http://103.101.52.190:56787/dukcapil/get_json/33-74/IDINSOS_3374/GET_NIK";
    //with vpn
    $url="http://172.16.160.43:8080/dukcapil/get_json/33-74/IDINSOS_3374/GET_NIK";
    $method="POST";
    // AT/EWV
    $input=array("nik"=>$nik, "user_id"=>"1247202002173drs.muthohar,", "password"=>"dinsos1234");
    // $input2=array("nik"=>$nik, "user_id"=>"udinsos02", "password"=>"NQJF9S");
    // $inputjson=json_encode($input);
    $result = @Actions::service($url,$input,$method);
    $result=json_decode($result);
    $result= @$result->content[0];
    return (array)@$result;
  }
  public static function TrackingNikTerbaru($data) {
    $hasil= '';
        // hilangkan spasinya
    $nik=strtr(@$data['nik'],[' '=>'']);
    $nokk=strtr(@$data['nokk'],[' '=>'']);
    // $nokk=strtr($nokk,[' '=>'']);
    //dulu tnpa vpn
    //$url="http://103.101.52.190:56787/dukcapil/get_json/33-74/IDINSOS_3374/GET_NIK";
    //with vpn
    // $url="http://172.16.160.43:8080/dukcapil/get_json/33-74/idinsos_3374/koneksitas_verifby_elemen";
    // $url="http://172.16.160.177:8080/dukcapil/get_json/33-74/idinsos_3374/koneksitas_verifby_elemen";
    $url="https://172.16.160.177:8000/dukcapil/get_json/IDINSOS_3374/CALL_VERIFY_BY_ELEMEN";
    
    $method="POST";
    // AT/EWV
    $input=array(
      "NIK"=>$nik,
      "NO_KK"=>@$nokk,
      "NAMA_LGKP"=>@$data['nama'],
      "KEC_NAME"=>@$data['kecamatan'],
      "KEL_NAME"=>@$data['kelurahan'], 
      "JENIS_KLMIN"=>@$data['jenis_kelamin'], 
      "TGL_LHR"=>@$data['tanggal_lahir'], 
      "NOMOR_PROP"=>@$data['no_prop'],
      "ALAMAT"=>@$data['alamat'],
      "TMPT_LHR"=>@$data['tempat_lahir'],
      "NO_RT"=>@$data['rt'],
      "NO_RW"=>@$data['rw'],
      "JENIS_PKRJN"=>@$data['pekerjaan'],    
      "USER_ID"=>"08112022134336IDINSOS_33749409",
      "PASSWORD"=>"3374dinsos",
      "TRESHOLD"=>95);
    // $input2=array("nik"=>$nik, "user_id"=>"udinsos02", "password"=>"NQJF9S");
    // $inputjson=json_encode($input);

    $result = @Actions::service($url,$input,$method);
    // dd($result);
    $result=json_decode($result);
    // dd($result);
    $result= @$result->content[0];
    return (array)@$result;
  }
  public static function TrackingNik2022($nik) {
    $hasil= '';
    $nik=strtr($nik,[' '=>'']);
    $result = @Actions::getNik($nik);
    $result=json_decode($result);
    $result= @$result->info_nik[0];
    return (array)@$result;
  }

  public static function TrackingNokk($no_kk) {
    $hasil= '';
        // hilangkan spasinya
    $no_kk=strtr($no_kk,[' '=>'']);
    $url="http://103.101.52.190:56788/ws/kk.php?KK=".$no_kk;
    // $method="GET";
    // AT/EWV
    // $input=array("no_kk"=>$no_kk, "user_id"=>"1247202002173drs.muthohar,", "password"=>"dinsos1234");
    // $input2=array("nik"=>$nik, "user_id"=>"udinsos02", "password"=>"NQJF9S");
    // $inputjson=json_encode($input);
    // $result = @Actions::service($url,$input,$method);
     $result = Actions::GetHttpContent($url);

    // $result=json_encode($result);

    // $result= @$result->content[0];
    return $result;
    // return (array)@$result;
  }

  public static function GetIdYoutube($url){
    // Here is a sample of the URLs this regex matches: (there can be more content after the given URL that will be ignored)
    // http://youtu.be/dQw4w9WgXcQ
    // http://www.youtube.com/embed/dQw4w9WgXcQ
    // http://www.youtube.com/watch?v=dQw4w9WgXcQ
    // http://www.youtube.com/?v=dQw4w9WgXcQ
    // http://www.youtube.com/v/dQw4w9WgXcQ
    // http://www.youtube.com/e/dQw4w9WgXcQ
    // http://www.youtube.com/user/username#p/u/11/dQw4w9WgXcQ
    // http://www.youtube.com/sandalsResorts#p/c/54B8C800269D7C1B/0/dQw4w9WgXcQ
    // http://www.youtube.com/watch?feature=player_embedded&v=dQw4w9WgXcQ
    // http://www.youtube.com/?feature=player_embedded&v=dQw4w9WgXcQ
    // It also works on the youtube-nocookie.com URL with the same above options.
    // It will also pull the ID from the URL in an embed code (both iframe and object tags)
    preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match);
    $youtube_id = $match[1];
    return $youtube_id;
  }

  public static function convDateTimeIndonesia($datetime) {
        $date = date('Y-m-d H:i:s',strtotime($datetime));
        if($date == '0000-00-00 00:00:00')
            return 'Tanggal dan Waktu Kosong';
        $tgl = substr($date, 8, 2);
        $bln = substr($date, 5, 2);
        $thn = substr($date, 0, 4);

     
        switch ($bln) {
            case 1 : {
                    $bln = 'Januari';
                }break;
            case 2 : {
                    $bln = 'Februari';
                }break;
            case 3 : {
                    $bln = 'Maret';
                }break;
            case 4 : {
                    $bln = 'April';
                }break;
            case 5 : {
                    $bln = 'Mei';
                }break;
            case 6 : {
                    $bln = "Juni";
                }break;
            case 7 : {
                    $bln = 'Juli';
                }break;
            case 8 : {
                    $bln = 'Agustus';
                }break;
            case 9 : {
                    $bln = 'September';
                }break;
            case 10 : {
                    $bln = 'Oktober';
                }break;
            case 11 : {
                    $bln = 'November';
                }break;
            case 12 : {
                    $bln = 'Desember';
                }break;
            default: {
                    $bln = 'UnKnown';
                }break;
        }
     
        $hari = date('N', strtotime($date));
        switch ($hari) {
            case 7 : {
                    $hari = 'Minggu';
                }break;
            case 1 : {
                    $hari = 'Senin';
                }break;
            case 2 : {
                    $hari = 'Selasa';
                }break;
            case 3 : {
                    $hari = 'Rabu';
                }break;
            case 4 : {
                    $hari = 'Kamis';
                }break;
            case 5 : {
                    $hari = "Jum'at";
                }break;
            case 6 : {
                    $hari = 'Sabtu';
                }break;
            default: {
                    $hari = 'UnKnown';
                }break;
        }
     
        // $tanggalIndonesia = "".$hari.", ".$tgl . " " . $bln . " " . $thn;
        $tanggalIndonesia = "".$tgl . " " . $bln . " " . $thn;
        return $tanggalIndonesia;
    }

      public static function convDateTanggal($datetime) {
        $date = date('Y-m-d H:i:s',strtotime($datetime));
        if($date == '0000-00-00 00:00:00')
            return 'Tanggal dan Waktu Kosong';
        $tgl = substr($date, 8, 2);
        $bln = substr($date, 5, 2);
        $thn = substr($date, 0, 4);

     
        switch ($bln) {
            case 1 : {
                    $bln = 'Januari';
                }break;
            case 2 : {
                    $bln = 'Februari';
                }break;
            case 3 : {
                    $bln = 'Maret';
                }break;
            case 4 : {
                    $bln = 'April';
                }break;
            case 5 : {
                    $bln = 'Mei';
                }break;
            case 6 : {
                    $bln = "Juni";
                }break;
            case 7 : {
                    $bln = 'Juli';
                }break;
            case 8 : {
                    $bln = 'Agustus';
                }break;
            case 9 : {
                    $bln = 'September';
                }break;
            case 10 : {
                    $bln = 'Oktober';
                }break;
            case 11 : {
                    $bln = 'November';
                }break;
            case 12 : {
                    $bln = 'Desember';
                }break;
            default: {
                    $bln = 'UnKnown';
                }break;
        }
     
        $hari = date('N', strtotime($date));
        switch ($hari) {
            case 7 : {
                    $hari = 'Minggu';
                }break;
            case 1 : {
                    $hari = 'Senin';
                }break;
            case 2 : {
                    $hari = 'Selasa';
                }break;
            case 3 : {
                    $hari = 'Rabu';
                }break;
            case 4 : {
                    $hari = 'Kamis';
                }break;
            case 5 : {
                    $hari = "Jum'at";
                }break;
            case 6 : {
                    $hari = 'Sabtu';
                }break;
            default: {
                    $hari = 'UnKnown';
                }break;
        }
     
        // $tanggalIndonesia = "".$hari.", ".$tgl . " " . $bln . " " . $thn;
        $tanggalIndonesia = "".$tgl . " " . $bln . " " . $thn;
        return $tanggalIndonesia;
    }


      public static function convDateHari($datetime) {
        $date = date('Y-m-d H:i:s',strtotime($datetime));
        if($date == '0000-00-00 00:00:00')
            return 'Tanggal dan Waktu Kosong';
        $tgl = substr($date, 8, 2);
        $bln = substr($date, 5, 2);
        $thn = substr($date, 0, 4);

     
        switch ($bln) {
            case 1 : {
                    $bln = 'Januari';
                }break;
            case 2 : {
                    $bln = 'Februari';
                }break;
            case 3 : {
                    $bln = 'Maret';
                }break;
            case 4 : {
                    $bln = 'April';
                }break;
            case 5 : {
                    $bln = 'Mei';
                }break;
            case 6 : {
                    $bln = "Juni";
                }break;
            case 7 : {
                    $bln = 'Juli';
                }break;
            case 8 : {
                    $bln = 'Agustus';
                }break;
            case 9 : {
                    $bln = 'September';
                }break;
            case 10 : {
                    $bln = 'Oktober';
                }break;
            case 11 : {
                    $bln = 'November';
                }break;
            case 12 : {
                    $bln = 'Desember';
                }break;
            default: {
                    $bln = 'UnKnown';
                }break;
        }
     
        $hari = date('N', strtotime($date));
        switch ($hari) {
            case 7 : {
                    $hari = 'Minggu';
                }break;
            case 1 : {
                    $hari = 'Senin';
                }break;
            case 2 : {
                    $hari = 'Selasa';
                }break;
            case 3 : {
                    $hari = 'Rabu';
                }break;
            case 4 : {
                    $hari = 'Kamis';
                }break;
            case 5 : {
                    $hari = "Jum'at";
                }break;
            case 6 : {
                    $hari = 'Sabtu';
                }break;
            default: {
                    $hari = 'UnKnown';
                }break;
        }
     
        // $tanggalIndonesia = "".$hari.", ".$tgl . " " . $bln . " " . $thn;
        $tanggalIndonesia = $hari;
        return $tanggalIndonesia;
    }

    public function getNik($nik){
        $hasil = Actions::getQuery('select * from nikkk where nik = "'.$nik.'"');
        return $hasil[0];
    }
    public function getKecamatan($kodekecamatan){
        $hasil = Actions::getQuery('select * from kecamatan where KodeKecamatan = "'.$kodekecamatan.'"');
        return $hasil[0];
    }
    public function getKelurahan($kodekecamatan,$kodekelurahan){
        $hasil = Actions::getQuery('select * from kelurahan where KodeKecamatan = "'.$kodekecamatan.'" and KodeKelurahan = "'.$kodekelurahan.'"');
        return $hasil[0];
    }
  
    public function tampilFilterKecamatan(){
      $kecamatan = Kecamatan::find()->joinWith(['kelurahan'])->all();
        $tampil='';
        $tampil2='';
        $tampil3='';
        // wrap pertama
        $tampil.='<div class="btn-group">'.
            '<button type="button" class="btn btn-danger">Filter Kecamatan dan Kelurahan</button>'.
            '<button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">'.
                '<span class="caret"></span>'.
                '<span class="sr-only">Toggle Dropdown</span>'.
            '</button>'.
            '<ul class="dropdown-menu" role="menu"><li><a href="'.Url::to(['bdtart/entribantuanbdtart']).'">Semua</a></li>';
        foreach ($kecamatan as $key => $value) {
          //wrap kedua
             $tampil2='<li class="dropdown-submenu">';
             $tampil2.= '<a class="test" href="'.$value['KodeKecamatan'].'">'.$value['Nama'].'<span class="caret"></span></a>';
             $tampil2.='<ul class="dropdown-menu"><li><a href="'.Url::to(['bdtart/entribantuanbdtart', 'kodekecamatan' => $value['KodeKecamatan']]).'">Semua</a></li>';
             $i=0;
             for ($i=0; $i < count($value['kelurahan']); $i++) { 
               //ketika mulai dari awal isi child yang pertama dikosongkan lagi
               if (isset($tampil3) && $i===0) {
                 $tampil3='';
               }
               $tampil3.='<li><a href="'.Url::to(['bdtart/entribantuanbdtart', 'kodekecamatan' => $value['kelurahan'][$i]['KodeKecamatan'], 'kodekelurahan' => $value['kelurahan'][$i]['KodeKelurahan']]).'">'.$value['kelurahan'][$i]['Nama'].'</a></li>';
             }
             //tutup wrap kedua
             $tampil2.=$tampil3;
             $tampil2.='</ul></li>';
             //gabungkan data wrap kedua ke wrap pertama
            $tampil.=$tampil2;
        }
        //tutup wrap pertama
        $tampil.='</ul></div>';
        return $tampil;
    }
//view listbdtart ketika role kecamatan atau kelurahan
  public function filterKecamatanKelurahan($identity){
    $kecamatan='';
    if ($identity->role=='kecamatan') {
      $kecamatan = Kecamatan::find()->where(['kecamatan.KodeKecamatan'=>$identity->kode_kecamatan])->joinWith(['kelurahan'])->all();
    }
    if ($identity->role=='kelurahan') {
      $kecamatan = Kecamatan::find()->joinWith(['kelurahan' => function (ActiveQuery $query) {
        return $query
            ->andWhere(['=', 'kelurahan.KodeKecamatan', Yii::$app->user->identity->kode_kecamatan])
            ->andWhere(['=','kelurahan.KodeKelurahan', Yii::$app->user->identity->kode_kelurahan]);
    }])->all();
    }
    if ($identity->role=='pfm') {
       $kecamatan = Kecamatan::find()->joinWith(['kelurahan'])->all();
    }
    if ($identity->role=='opd') {
       $kecamatan = Kecamatan::find()->joinWith(['kelurahan'])->all();
    }
      
        $tampil='';
        $tampil2='';
        $tampil3='';
        // wrap pertama
        $tampil.='<div class="btn-group">'.
            '<button type="button" class="btn btn-danger">Filter Kecamatan dan Kelurahan</button>'.
            '<button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">'.
                '<span class="caret"></span>'.
                '<span class="sr-only">Toggle Dropdown</span>'.
            '</button>'.
            '<ul class="dropdown-menu" role="menu"><!--<li><a href="'.Url::to(['bdtart/entribantuanbdtart']).'">Semua</a></li>-->';
        foreach ($kecamatan as $key => $value) {
          //wrap kedua
             $tampil2='<li class="dropdown-submenu">';
             $tampil2.= '<a class="test" href="'.$value['KodeKecamatan'].'">'.$value['Nama'].'<span class="caret"></span></a>';
             if ($identity->role=='kecamatan') {
                $tampil2.='<ul class="dropdown-menu"><li><a href="'.Url::to(['bdtart/entribantuanbdtart', 'kodekecamatan' => $value['KodeKecamatan']]).'">Semua</a></li>';
             }else{
              $tampil2.='<ul class="dropdown-menu"><!--<li><a href="'.Url::to(['bdtart/entribantuanbdtart', 'kodekecamatan' => $value['KodeKecamatan']]).'">Semua</a></li>-->';
             }
             
             $i=0;
             for ($i=0; $i < count($value['kelurahan']); $i++) { 
               //ketika mulai dari awal isi child yang pertama dikosongkan lagi
               if (isset($tampil3) && $i===0) {
                 $tampil3='';
               }
               $tampil3.='<li><a href="'.Url::to(['bdtart/entribantuanbdtart', 'kodekecamatan' => $value['kelurahan'][$i]['KodeKecamatan'], 'kodekelurahan' => $value['kelurahan'][$i]['KodeKelurahan']]).'">'.$value['kelurahan'][$i]['Nama'].'</a></li>';
             }
             //tutup wrap kedua
             $tampil2.=$tampil3;
             $tampil2.='</ul></li>';
             //gabungkan data wrap kedua ke wrap pertama
            $tampil.=$tampil2;
        }
        //tutup wrap pertama
        $tampil.='</ul></div>';
        return $tampil;
    }

  public function tampilFilterKecamatan3(){
      $kecamatan = Kecamatan::find()->joinWith(['kelurahan'])->all();
        $tampil='';
        $tampil2='';
        $tampil3='';
        // wrap pertama
        $tampil.='<div class="btn-group">'.
            '<button type="button" class="btn btn-danger">Filter Kelurahan</button>'.
            '<button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">'.
                '<span class="caret"></span>'.
                '<span class="sr-only">Toggle Dropdown</span>'.
            '</button>'.
            '<ul class="dropdown-menu" role="menu"><li><a href="'.Url::to(['laporan/index']).'">Semua</a></li>';
        foreach ($kecamatan as $key => $value) {
          //wrap kedua
             $tampil2='<li class="dropdown-submenu">';
             $tampil2.= '<a class="test" href="'.$value['KodeKecamatan'].'">'.$value['Nama'].'<span class="caret"></span></a>';
             $tampil2.='<ul class="dropdown-menu"><li><a href="'.Url::to(['laporan/index', 'kodekecamatan' => $value['KodeKecamatan']]).'">Semua</a></li>';
             $i=0;
             for ($i=0; $i < count($value['kelurahan']); $i++) { 
               //ketika mulai dari awal isi child yang pertama dikosongkan lagi
               if (isset($tampil3) && $i===0) {
                 $tampil3='';
               }
               $tampil3.='<li><a href="'.Url::to(['laporan/index', 'kodekecamatan' => $value['kelurahan'][$i]['KodeKecamatan'], 'kodekelurahan' => $value['kelurahan'][$i]['KodeKelurahan']]).'">'.$value['kelurahan'][$i]['Nama'].'</a></li>';
             }
             //tutup wrap kedua
             $tampil2.=$tampil3;
             $tampil2.='</ul></li>';
             //gabungkan data wrap kedua ke wrap pertama
            $tampil.=$tampil2;
        }
        //tutup wrap pertama
        $tampil.='</ul></div>';
        return $tampil;
    }

      public function tampilFilterKecamatan2(){
      $kecamatan = Kecamatan::find()->joinWith(['kelurahan'])->all();
        $tampil='';
        $tampil2='';
        $tampil3='';
        // wrap pertama
        $tampil.='<div class="btn-group">'.
            '<button type="button" class="btn btn-danger">Filter Kecamatan dan Kelurahan</button>'.
            '<button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">'.
                '<span class="caret"></span>'.
                '<span class="sr-only">Toggle Dropdown</span>'.
            '</button>'.
            '<ul class="dropdown-menu" role="menu"><li><a href="'.Url::to(['bdtart/index']).'">Semua</a></li>';
        foreach ($kecamatan as $key => $value) {
          //wrap kedua
             $tampil2='<li class="dropdown-submenu">';
             $tampil2.= '<a class="test" href="'.$value['KodeKecamatan'].'">'.$value['Nama'].'<span class="caret"></span></a>';
             $tampil2.='<ul class="dropdown-menu"><li><a href="'.Url::to(['bdtart/index', 'kodekecamatan' => $value['KodeKecamatan']]).'">Semua</a></li>';
             $i=0;
             for ($i=0; $i < count($value['kelurahan']); $i++) { 
               //ketika mulai dari awal isi child yang pertama dikosongkan lagi
               if (isset($tampil3) && $i===0) {
                 $tampil3='';
               }
               $tampil3.='<li><a href="'.Url::to(['bdtart/index', 'kodekecamatan' => $value['kelurahan'][$i]['KodeKecamatan'], 'kodekelurahan' => $value['kelurahan'][$i]['KodeKelurahan']]).'">'.$value['kelurahan'][$i]['Nama'].'</a></li>';
             }
             //tutup wrap kedua
             $tampil2.=$tampil3;
             $tampil2.='</ul></li>';
             //gabungkan data wrap kedua ke wrap pertama
            $tampil.=$tampil2;
        }
        //tutup wrap pertama
        $tampil.='</ul></div>';
        return $tampil;
    }


    public function tampilFilterKecamatanBdtrt(){
      $kecamatan = Kecamatan::find()->joinWith(['kelurahan'])->all();
        $tampil='';
        $tampil2='';
        $tampil3='';
        // wrap pertama
        $tampil.='<div class="btn-group">'.
            '<button type="button" class="btn btn-danger">Filter Kecamatan dan Kelurahan</button>'.
            '<button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">'.
                '<span class="caret"></span>'.
                '<span class="sr-only">Toggle Dropdown</span>'.
            '</button>'.
            '<ul class="dropdown-menu" role="menu"><li><a href="'.Url::to(['bdtrt/entribantuanbdtrt']).'">Semua</a></li>';
        foreach ($kecamatan as $key => $value) {
          //wrap kedua
             $tampil2='<li class="dropdown-submenu">';
             $tampil2.= '<a  class="test" href="'.Url::to(['bdtrt/entribantuanbdtrt', 'kodekecamatan' => $value['KodeKecamatan']]).'">'.$value['Nama'].'<span class="caret"></span></a>';
             $tampil2.='<ul class="dropdown-menu"><li><a href="'.Url::to(['bdtrt/entribantuanbdtrt', 'kodekecamatan' => $value['KodeKecamatan']]).'">Semua</a></li>';
             $i=0;
             for ($i=0; $i < count($value['kelurahan']); $i++) { 
               //ketika mulai dari awal isi child yang pertama dikosongkan lagi
               if (isset($tampil3) && $i===0) {
                 $tampil3='';
               }
               $tampil3.='<li><a href="'.Url::to(['bdtrt/entribantuanbdtrt', 'kodekecamatan' => $value['kelurahan'][$i]['KodeKecamatan'], 'kodekelurahan' => $value['kelurahan'][$i]['KodeKelurahan']]).'">'.$value['kelurahan'][$i]['Nama'].'</a></li>';
             }
             //tutup wrap kedua
             $tampil2.=$tampil3;
             $tampil2.='</ul></li>';
             //gabungkan data wrap kedua ke wrap pertama
            $tampil.=$tampil2;
        }
        //tutup wrap pertama
        $tampil.='</ul></div>';
        return $tampil;
    }
//pada view list bdtrt ketika role kecamatan atau kelurahan
  public function filterKecamatanKelurahanBdtrt($identity){
       $kecamatan='';
    if ($identity->role=='kecamatan') {
      $kecamatan = Kecamatan::find()->where(['kecamatan.KodeKecamatan'=>$identity->kode_kecamatan])->joinWith(['kelurahan'])->all();
    }
    if ($identity->role=='kelurahan') {
      $kecamatan = Kecamatan::find()->joinWith(['kelurahan' => function (ActiveQuery $query) {
        return $query
            ->andWhere(['=', 'kelurahan.KodeKecamatan', Yii::$app->user->identity->kode_kecamatan])
            ->andWhere(['=','kelurahan.KodeKelurahan', Yii::$app->user->identity->kode_kelurahan]);
    }])->all();
    }
    if ($identity->role=='pfm') {
       $kecamatan = Kecamatan::find()->joinWith(['kelurahan'])->all();
    }
    if ($identity->role=='opd') {
       $kecamatan = Kecamatan::find()->joinWith(['kelurahan'])->all();
    }
        $tampil='';
        $tampil2='';
        $tampil3='';
        // wrap pertama
        $tampil.='<div class="btn-group">'.
            '<button type="button" class="btn btn-danger">Filter Kecamatan dan Kelurahan</button>'.
            '<button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">'.
                '<span class="caret"></span>'.
                '<span class="sr-only">Toggle Dropdown</span>'.
            '</button>'.
            '<ul class="dropdown-menu" role="menu"><!--<li><a href="'.Url::to(['bdtrt/entribantuanbdtrt']).'">Semua</a></li>-->';
        foreach ($kecamatan as $key => $value) {
          //wrap kedua
             $tampil2='<li class="dropdown-submenu">';
             $tampil2.= '<a  class="test" href="'.Url::to(['bdtrt/entribantuanbdtrt', 'kodekecamatan' => $value['KodeKecamatan']]).'">'.$value['Nama'].'<span class="caret"></span></a>';
             if ($identity->role=='kecamatan') {
               $tampil2.='<ul class="dropdown-menu"><li><a href="'.Url::to(['bdtrt/entribantuanbdtrt', 'kodekecamatan' => $value['KodeKecamatan']]).'">Semua</a></li>';
             }else{
               $tampil2.='<ul class="dropdown-menu"><!--<li><a href="'.Url::to(['bdtrt/entribantuanbdtrt', 'kodekecamatan' => $value['KodeKecamatan']]).'">Semua</a></li>-->';
             }
             
             $i=0;
             for ($i=0; $i < count($value['kelurahan']); $i++) { 
               //ketika mulai dari awal isi child yang pertama dikosongkan lagi
               if (isset($tampil3) && $i===0) {
                 $tampil3='';
               }
               $tampil3.='<li><a href="'.Url::to(['bdtrt/entribantuanbdtrt', 'kodekecamatan' => $value['kelurahan'][$i]['KodeKecamatan'], 'kodekelurahan' => $value['kelurahan'][$i]['KodeKelurahan']]).'">'.$value['kelurahan'][$i]['Nama'].'</a></li>';
             }
             //tutup wrap kedua
             $tampil2.=$tampil3;
             $tampil2.='</ul></li>';
             //gabungkan data wrap kedua ke wrap pertama
            $tampil.=$tampil2;
        }
        //tutup wrap pertama
        $tampil.='</ul></div>';
        return $tampil;
    }

  public function tampilFilterKecamatanBdtrt2(){
      $kecamatan = Kecamatan::find()->joinWith(['kelurahan'])->all();
        $tampil='';
        $tampil2='';
        $tampil3='';
        // wrap pertama
        $tampil.='<div class="btn-group">'.
            '<button type="button" class="btn btn-danger">Filter Kecamatan dan Kelurahan</button>'.
            '<button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">'.
                '<span class="caret"></span>'.
                '<span class="sr-only">Toggle Dropdown</span>'.
            '</button>'.
            '<ul class="dropdown-menu" role="menu"><li><a href="'.Url::to(['bdtrt/index']).'">Semua</a></li>';
        foreach ($kecamatan as $key => $value) {
          //wrap kedua
             $tampil2='<li class="dropdown-submenu">';
             $tampil2.= '<a  class="test" href="'.Url::to(['bdtrt/entribantuanbdtrt', 'kodekecamatan' => $value['KodeKecamatan']]).'">'.$value['Nama'].'<span class="caret"></span></a>';
             $tampil2.='<ul class="dropdown-menu"><li><a href="'.Url::to(['bdtrt/index', 'kodekecamatan' => $value['KodeKecamatan']]).'">Semua</a></li>';
             $i=0;
             for ($i=0; $i < count($value['kelurahan']); $i++) { 
               //ketika mulai dari awal isi child yang pertama dikosongkan lagi
               if (isset($tampil3) && $i===0) {
                 $tampil3='';
               }
               $tampil3.='<li><a href="'.Url::to(['bdtrt/index', 'kodekecamatan' => $value['kelurahan'][$i]['KodeKecamatan'], 'kodekelurahan' => $value['kelurahan'][$i]['KodeKelurahan']]).'">'.$value['kelurahan'][$i]['Nama'].'</a></li>';
             }
             //tutup wrap kedua
             $tampil2.=$tampil3;
             $tampil2.='</ul></li>';
             //gabungkan data wrap kedua ke wrap pertama
            $tampil.=$tampil2;
        }
        //tutup wrap pertama
        $tampil.='</ul></div>';
        return $tampil;
}

public function getBdt($idbdt,$kodefasilitas){
    $result =2;
    if ($idbdt != null && $idbdt != '') {
       $hasil = Actions::getQuery('select * from bdtrt where IDBDT = "'.$idbdt.'"');
    
    // return var_dump($hasil[0]['sta_kis']);
    // $hasil = '';
    switch ($kodefasilitas) {
                case 1:
                    $result = $hasil[0]['sta_kis'];
                    // $query->orFilterWhere(['like', 'KDKEC', $this->filter]);
                    # code...
                    break;
                case 2:
                    $result = $hasil[0]['sta_pkh'];
                    # code...
                    break;
                case 3:
                    $result = $hasil[0]['sta_bpjs_mandiri'];
                    # code...
                    break;
                case 4:
                    $result = $hasil[0]['sta_kip'];
                    # code...
                    break;
                case 5:
                    $result = $hasil[0]['sta_kks'];
                    # code...
                    break;
                case 6:
                    $result = $hasil[0]['sta_rastra'];
                    # code...
                    break;
                case 7:
                    $result = $hasil[0]['sta_kur'];
                    # code...
                    break;
                default:
                    $result = 2;
                    # code...
                    break;
            }

            return $result;

    }
  }
    public function getAllKecamatan(){
      $hasil = Actions::getQuery('select * from kecamatan');
      return $hasil[0];
    }

    public function getlistkecamatan(){

      // $combined = []; // Make sure the $combined array exists.
      // $attributes = Kecamatan::find()->joinWith(['kelurahan'])->all();
      // foreach($attributes as $key => $attribute) {

      //     // First check if the array key exists and that the 'system_name' is the same
      //     if(array_key_exists($key, $values) && $attribute['KodeKecamatan'] == $values[$key]['system_name']) {

      //         $combined[$attribute['id']] = $values[$key]['value'];

      //     }

}
    //   $hasil = Actions::getQuery('
    //     SELECT kecamatan.Nama,GROUP_CONCAT(kelurahan.KodeKelurahan) AS kodekelurahan, GROUP_CONCAT(kelurahan.Nama) AS daftarkelurahan
    // FROM kelurahan INNER JOIN kecamatan ON kecamatan.KodeKecamatan = kelurahan.KodeKecamatan
    // WHERE kecamatan.KodeKecamatan = kelurahan.KodeKecamatan
    // GROUP BY kecamatan.KodeKecamatan order by kecamatan.Nama
    // ');
    //    return $hasil[0];

    // }

    public static function getNIKtoIDBDT($nik){

      if (isset($nik)) {
        $result = Actions::getQuery('select * from '.Actions::kebdtart().' where Nik = "'.$nik.'"');
        // $result2 = Actions::getQuery('select * from Bdt2018rt where IDBDT = "'.$result[0]['IDBDT'].'"');
        return print_r(@$result[0]);
      }else{
        return ''; 
      }  
    }
  
  public static function getDatabynik($nik){
      if (isset($nik)) {
        
      }else{
        return ''; 
      }  
  }
  public function hitungDataPerDaerah($tabel,$KDKEC,$KDDESA)
  {
    $tabel=strtolower($tabel);
    $sql="select count(*) from $tabel where KDKEC='".@$KDKEC."' AND KDDESA='".@$KDDESA."'";
    $result=@Yii::$app->db->createCommand($sql)->queryAll();
    return @$result[0]['count(*)'];
  }

  public function serviceBantuan($tabel,$nik)
  { 
    $tabel=strtolower($tabel);
    if ($tabel===Actions::kebdtart()) {
      $sql="select * from $tabel where NIK='".@$nik."'";
      $result=@Yii::$app->db->createCommand($sql)->queryAll();
      return @$result[0];
    }
    if ($tabel===Actions::kebdtrt()) {
      $a = Bdtart::find()->where(["NIK"=>$nik])->one();
      $sql="select * from $tabel where IDBDT='".$a->IDBDT."'";
      $result=@Yii::$app->db->createCommand($sql)->queryAll();
      return @$result[0];
    }
}

  public function servicebynik($tabel,$nik,$username,$password)
  { 
    //service dipakai oleh kominfo
    Actions::createsession('oktober2020');
    if (!Account::find()->where(["username"=>$username])->andWhere(["password"=>$password])->exists()) {
      return 'gagal';
    }
    $tabel=strtolower($tabel);
    if ($tabel===Actions::kebdtart()) {
      $sql="select * from $tabel where NIK='".@$nik."'";
      $result=@Yii::$app->db->createCommand($sql)->queryAll();
      return @$result[0];
    }
    if ($tabel===Actions::kebdtrt()) {
      $a = Bdtart::find()->where(["NIK"=>$nik])->one();
      $sql="select * from $tabel where IDBDT='".$a->IDBDT."'";
      $result=@Yii::$app->db->createCommand($sql)->queryAll();
      return @$result[0];
    }
}
public function servicebynik2($tabel,$nik,$token)
{ 
  //service dipakai oleh kominfo
  Actions::createsession('oktober2020');
  $bdtart=Actions::kebdtart();
  $bdtrt=Actions::kebdtrt();
  $unmask = Yii::$app->getSecurity()->unmaskToken($token);
    if (Token::find()->where(["token"=>$token])->andWhere(["flag"=>0])->andWhere(["created"=>$unmask])->exists()) {
      $tabel=strtolower($tabel);
      if ($tabel===$bdtart) {
        $sql="
                SELECT *
          FROM ".$bdtart."
          right outer JOIN ".$bdtrt."
          ON ".$bdtart.".IDBDT = bdtrt.IDBDT
          WHERE nik ='".@$nik."'";
        $result=@Yii::$app->db->createCommand($sql)->queryAll();
        Actions::updateflagtoken($token);
        return @$result[0];
        
      }
    }
    exit;
}

  public function servicenikwithtoken($tabel,$nik,$token)
  { 
    if (!Account::find()->where(["username"=>$username])->andWhere(["password"=>$password])->exists()) {
      return 'gagal';
    }
    $tabel=strtolower($tabel);
    if ($tabel===Actions::kebdtart()) {
      $sql="select * from $tabel where NIK='".@$nik."'";
      $result=@Yii::$app->db->createCommand($sql)->queryAll();
      return @$result[0];
    }
    if ($tabel===Actions::kebdtrt()) {
      $a = Bdtart::find()->where(["NIK"=>$nik])->one();
      $sql="select * from $tabel where IDBDT='".$a->IDBDT."'";
      $result=@Yii::$app->db->createCommand($sql)->queryAll();
      return @$result[0];
    }
}

  public function serviceBantuan3($tabel,$nik)
  { 
    $tabel=strtolower($tabel);
    $a = Bdtart::find()->where(["NIK"=>$nik])->join("bdtrt")->one();
    return $a;
}

public function serviceBantuanLengkap($nik){
  $bdtart=Actions::kebdtart();
  $bdtrt=Actions::kebdtrt();
  $sql ="
  SELECT ".$bdtart.".IDBDT as idbdt, ".$bdtart.".NIK as nik,".$bdtart.".Nama as nama,".$bdtrt.".Alamat as alamat,IF (".$bdtrt.".KDPROP=33,'Jawa Tengah','Provinsi Lainnya') as provinsi,IF (".$bdtrt.".KDKAB=74,'Kota Semarang','Kabupaten Lainnya') as kabupaten, kecamatan.Nama as kecamatan, kelurahan.Nama as kelurahan, IF (".$bdtrt.".sta_kks='Ya',1,0) as bpnt, IF (".$bdtrt.".sta_pkh='Ya',1,0) as pkh, IF (".$bdtrt.".sta_kis='Ya',1,0) as jknkis, 
      IF (".$bdtrt.".sta_kip='Ya',1,0) as kip,IF (".$bdtrt.".sta_bpjs_mandiri='Ya',1,0) as bpjs_mandiri, IF (".$bdtrt.".sta_jamsostek='Ya',1,0) as jamsostek,
      IF (".$bdtrt.".sta_asuransi='Ya',1,0) as asuransi,IF (".$bdtrt.".sta_rastra='Ya',1,0) as rastra, IF (".$bdtrt.".sta_kur='Ya',1,0) as kur, ".$bdtart.".Hubkel as hubkel
FROM ".$bdtrt.",".$bdtart.", kecamatan, kelurahan
WHERE ".$bdtrt.".IDBDT = ".$bdtart.".IDBDT and kecamatan.KodeKecamatan = ".$bdtart.".KDKEC 
and kelurahan.KodeKecamatan = ".$bdtart.".KDKEC and kelurahan.KodeKelurahan = ".$bdtart.".KDDESA and ".$bdtart.".NIK ='".$nik."'";
$result=@Yii::$app->db->createCommand($sql)->queryAll();
    return @$result[0];
}
public function serviceBantuanLengkap2($nik){
  $bdtart=Actions::kebdtart();
  $bdtrt=Actions::kebdtrt();
  $sql ="
  SELECT ".$bdtart.".IDBDT as idbdt, ".$bdtart.".NIK as nik,".$bdtart.".Nama as nama,".$bdtrt.".Alamat as alamat,IF (".$bdtrt.".KDPROP=33,'Jawa Tengah','Provinsi Lainnya') as provinsi,IF (".$bdtrt.".KDKAB=74,'Kota Semarang','Kabupaten Lainnya') as kabupaten, kecamatan.Nama as kecamatan, kelurahan.Nama as kelurahan, IF (".$bdtrt.".sta_kks='Ya',1,0) as bpnt, IF (".$bdtrt.".sta_pkh='Ya',1,0) as pkh, IF (".$bdtrt.".sta_kis='Ya',1,0) as jknkis, 
      IF (".$bdtrt.".sta_kip='Ya',1,0) as kip,IF (".$bdtrt.".sta_bpjs_mandiri='Ya',1,0) as bpjs_mandiri, IF (".$bdtrt.".sta_jamsostek='Ya',1,0) as jamsostek,
      IF (".$bdtrt.".sta_asuransi='Ya',1,0) as asuransi,IF (".$bdtrt.".sta_rastra='Ya',1,0) as rastra, IF (".$bdtrt.".sta_kur='Ya',1,0) as kur, ".$bdtart.".Hubkel as hubkel
FROM ".$bdtrt.",".$bdtart.", kecamatan, kelurahan
WHERE bdtrt.IDBDT = ".$bdtart.".IDBDT and kecamatan.KodeKecamatan = ".$bdtart.".KDKEC 
and kelurahan.KodeKecamatan = ".$bdtart.".KDKEC and kelurahan.KodeKelurahan = ".$bdtart.".KDDESA and ".$bdtart.".NIK ='".$nik."'";
$result=@Yii::$app->db->createCommand($sql)->queryAll();
    return @$result[0];
}

  public function serviceBantuan2($nik)
  { 
    $bdtart=Actions::kebdtart();
    $bdtrt=Actions::kebdtrt();
    // $tabel=strtolower($tabel);
      $a = Bdtart::find()->where(["NIK"=>$nik])->one();
      $sql="select IF (sta_kks='Ya',1,0) as bpnt, IF (sta_pkh='Ya',1,0) as pkh, IF (sta_kis='Ya',1,0) as jknkis, 
      IF (sta_kip='Ya',1,0) as kip,IF (sta_bpjs_mandiri='Ya',1,0) as bpjs_mandiri, IF (sta_jamsostek='Ya',1,0) as jamsostek,
      IF (sta_asuransi='Ya',1,0) as asuransi,IF (sta_rastra='Ya',1,0) as rastra, IF (sta_kur='Ya',1,0) as kur, IDBDT, Alamat, KDKAB as kodekabupaten, KDKEC as kodekecamatan,KDDESA as kodekelurahan from ".$bdtrt." where IDBDT='".$a->IDBDT."'";
      $result=@Yii::$app->db->createCommand($sql)->queryAll();
      return @$result[0];
    }

  public function listisomandoublekk(){
    $sql="";
    switch (Yii::$app->user->identity->role) {
      case 'admin':
        $sql="select 
              NO_KK as kk, 
              COUNT(NO_KK) as jumlah
          FROM
              isoman
          GROUP BY NO_KK
          HAVING COUNT(NO_KK) > 1";
        break;
      case 'pfm':
        $sql="select 
              NO_KK as kk, 
              COUNT(NO_KK) as jumlah
          FROM
              isoman
          GROUP BY NO_KK
          HAVING COUNT(NO_KK) > 1";
        break;
      case 'kecamatan':
        $akunkecamatan= Account::find()->where(['username'=>Yii::$app->user->identity->username])->one();
        $daftarakunkelurahan=Account::find()->where(['kode_kecamatan'=>$akunkecamatan->kode_kecamatan])->all();
        $result=array();
        foreach ($daftarakunkelurahan as $value) {
          $sql="select 
              NO_KK as kk, 
              COUNT(NO_KK) as jumlah
          FROM
              isoman  where KEC_NAME=".$value['username']."
          GROUP BY NO_KK
          HAVING COUNT(NO_KK) > 1";
          $result[]=@Yii::$app->db->createCommand($sql)->queryAll();
        }
        
        dd($result);
            $dataProvider = new ArrayDataProvider([
              'allModels' => @$result,
          ]);
            return $dataProvider;
        break;
      case 'kelurahan':
        $sql="select 
              NO_KK as kk, 
              COUNT(NO_KK) as jumlah
          FROM
              isoman  where username=".Yii::$app->user->identity->username."
          GROUP BY NO_KK
          HAVING COUNT(NO_KK) > 1";
        break;  
      default:
        $sql="select 
              NO_KK as kk, 
              COUNT(NO_KK) as jumlah
          FROM
              isoman  where username=".Yii::$app->user->identity->username."
          GROUP BY NO_KK
          HAVING COUNT(NO_KK) > 1";
        break;
    }

      $result=@Yii::$app->db->createCommand($sql)->queryAll();
      $dataProvider = new ArrayDataProvider([
        'allModels' => @$result,
    ]);
      return $dataProvider;
    }



    public function listrekapbygender(){
      // $tabel=strtolower($tabel);
      // $bdtart=Actions::kebdtart();
      $bdtart='bdtart';
      $sql="select  COALESCE (KDKEC,'TOTAL') as KDKEC,kecamatan.Nama,
    COUNT(IF(JnsKel = 'Perempuan', JnsKel, NULL)) as Perempuan,
    COUNT(IF(JnsKel != 'Perempuan', JnsKel, NULL)) as Pria,
    COUNT(JnsKel) as jmltotal
FROM ".$bdtart." join kecamatan where KDKEC = kecamatan.KodeKecamatan
GROUP BY KDKEC with rollup";

      $result=@Yii::$app->db->createCommand($sql)->queryAll();
      return @$result;
    }



    public function listrekapitulasi(){
      // $bdtart=Actions::kebdtart();
      // $bdtrt=Actions::kebdtrt();
      $bdtart='bdtart';
      $bdtrt='bdtrt';
      $sql="select KDKEC,kecamatan.Nama,
          COUNT(IF(JnsKel = 'Perempuan' && percentile >=1 && percentile <=40, JnsKel, NULL)) as Perempuan,
          COUNT(IF(JnsKel != 'Perempuan' && percentile >=1 && percentile <=40, JnsKel, NULL)) as Pria,
          COUNT(JnsKel) as jmltotal
      FROM ".$bdtrt." join kecamatan where KDKEC = kecamatan.KodeKecamatan
      GROUP BY KDKEC";
      $result=@Yii::$app->db->createCommand($sql)->queryAll();
      return @$result;

    }

    public function rekapbps(){
      $bdtart=Actions::kebdtart();
      $bdtrt=Actions::kebdtrt();
       $sql=" 
       SELECT 
COALESCE(A.KODEKECAMATAN,'TOTAL') as kodekecamatan,
A.Nama as kecamatan,
sum(A.satusampaitiga) as jumlahbdtart, 
sum(B.satusampaitiga) as jumlahbdtrt 
FROM (SELECT bdtrt.KDKEC as KODEKECAMATAN, kecamatan.Nama,
COUNT(IF(percentile BETWEEN 1 AND 10, percentile, NULL)) as satusampaitiga
FROM bdtrt
INNER JOIN ".$bdtart."
ON bdtrt.IDBDT = ".$bdtart.".IDBDT
inner join kecamatan on ".$bdtart.".KDKEC = kecamatan.KodeKecamatan
GROUP BY kecamatan.KodeKecamatan) AS A
INNER JOIN
(select ".$bdtrt.".KDKEC, kecamatan.Nama,
   COUNT(IF(percentile BETWEEN 1 AND 10, percentile, NULL)) as satusampaitiga
FROM ".$bdtrt." join kecamatan where KDKEC = kecamatan.KodeKecamatan
GROUP BY KDKEC) AS B ON A.KODEKECAMATAN=B.KDKEC GROUP BY A.KODEKECAMATAN with rollup";
      $result=@Yii::$app->db->createCommand($sql)->queryAll();
      return @$result;
    }

    public function listrekapitulasiprovider(){
      $sql = Bdtart::find()->select('KDKEC,kecamatan.Nama,NIK,COUNT(JnsKel) as jumlah')->joinWith("kecamatan")->groupBy('KDKEC');
       // echo '<pre>'.print_r($sql).'</pre>';exit;
       $provider = new ActiveDataProvider([
            'query' => $sql,
            // 'pagination' => [
            //     'pageSize' => 10,
            // ],
        ]);
        // return $provider;
       echo '<pre>'.print_r($provider->getModels()).'</pre>';exit;
      // $result=@Yii::$app->db->createCommand($sql)->queryAll();
      // return @$result;

    }

     public function listdatapenerimabantuan(){
      $bdtart=Actions::kebdtart();
      $bdtrt=Actions::kebdtrt();
      $sql="select COALESCE (KDKEC,'TOTAL') as KDKEC ,kecamatan.Nama,
          COUNT(IF(sta_kks = 'Ya', sta_kks, NULL)) as bpnt,
          COUNT(IF(NoPesertaPKH is not null and NoPesertaPKH != 'NULL' and  NoPesertaPKH !='' and percentile <=10, NoPesertaPKH, NULL)) as pkh,
          COUNT(IF(sta_kis = 'Ya', sta_kis, NULL)) as jknkis,
          COUNT(IF(sta_kip = 'Ya', sta_kip, NULL)) as kip
      FROM ".$bdtrt." join kecamatan where KDKEC = kecamatan.KodeKecamatan
      GROUP BY KDKEC with rollup";
      //COUNT(IF(sta_jamsostek = 'Ya', sta_jamsostek, NULL)) as kjs
      // $sql='select 
      // KDKEC,
      //  count(JnsKel) as jeniskelamin
      //  from '.$tabel.' where JnsKel = "'.@$gender.'"
      //  group by KDKEC';
      $result=@Yii::$app->db->createCommand($sql)->queryAll();
      return @$result;

    }

    public function listrekapsumberair(){
      // $bdtart=Actions::kebdtart();
      // $bdtrt=Actions::kebdtrt();
      $bdtart='bdtart';
      $bdtrt='bdtrt';
      $sql="select COALESCE (KDKEC,'TOTAL') as KDKEC ,kecamatan.Nama,
          COUNT(IF(sumber_airminum = 'Air kemasan bermerk', sumber_airminum, NULL)) as merk,
          COUNT(IF(sumber_airminum = 'Air isi ulang', sumber_airminum, NULL)) as isiulang,
          COUNT(IF(sumber_airminum = 'Leding meteran', sumber_airminum, NULL)) as meteran,
          COUNT(IF(sumber_airminum = 'Leding eceran', sumber_airminum, NULL)) as eceran,
          COUNT(IF(sumber_airminum = 'Sumur bor/pompa', sumber_airminum, NULL)) as pompa,
          COUNT(IF(sumber_airminum = 'Sumur terlindung', sumber_airminum, NULL)) as sterlindung,
          COUNT(IF(sumber_airminum = 'Sumur tak terlindung', sumber_airminum, NULL)) as stakterlindung,
          COUNT(IF(sumber_airminum = 'Mata air terlindung', sumber_airminum, NULL)) as mtterlindung,
          COUNT(IF(sumber_airminum = 'Mata air tak terlindung', sumber_airminum, NULL)) as mttakterlindung,
          COUNT(IF(sumber_airminum = 'Air sungai/danau/waduk', sumber_airminum, NULL)) as sungai,
          COUNT(IF(sumber_airminum = 'Air hujan', sumber_airminum, NULL)) as hujan,
          COUNT(IF(sumber_airminum = 'Lainnya', sumber_airminum, NULL)) as lainnya
      FROM ".$bdtrt." join kecamatan where KDKEC = kecamatan.KodeKecamatan
      GROUP BY KDKEC with rollup";
      $result=@Yii::$app->db->createCommand($sql)->queryAll();
      return @$result;
    }

    public function listrekapstatusbangunan(){
      // $bdtart=Actions::kebdtart();
      // $bdtrt=Actions::kebdtrt();
      $bdtrt='bdtrt';
      $sql="select COALESCE (KDKEC,'TOTAL') as KDKEC, kecamatan.Nama,
          COUNT(IF(sta_bangunan = 'Milik sendiri' && percentile >=1 && percentile <=40, sta_bangunan, NULL)) as miliksendiri,
          COUNT(IF(sta_bangunan = 'Kontrak/sewa' && percentile >=1 && percentile <=40, sta_bangunan, NULL)) as kontrak,
          COUNT(IF(sta_bangunan = 'Bebas sewa' && percentile >=1 && percentile <=40, sta_bangunan, NULL)) as bebas,
          COUNT(IF(sta_bangunan = 'Dinas' && percentile >=1 && percentile <=40, sta_bangunan, NULL)) as dinas,
          COUNT(IF(sta_bangunan = 'Lainnya' && percentile >=1 && percentile <=40, sta_bangunan, NULL)) as lainnya
      FROM ".$bdtrt." join kecamatan where KDKEC = kecamatan.KodeKecamatan
      GROUP BY KDKEC with rollup";
      $result=@Yii::$app->db->createCommand($sql)->queryAll();
      return @$result;
    }

    public function listrekapperdesil(){
      // $bdtart=Actions::kebdtart();
      // $bdtrt=Actions::kebdtrt();
      $bdtrt='bdtrt';
      $sql="select COALESCE (KDKEC,'TOTAL') as KDKEC, kecamatan.Nama,
          COUNT(IF(percentile >=1 && percentile <=10, percentile, NULL)) as desil1,
          COUNT(IF(percentile >10 && percentile <=20 , percentile, NULL)) as desil2,
          COUNT(IF(percentile >20 && percentile <=30 , percentile, NULL)) as desil3,
          COUNT(IF(percentile >30 && percentile <=40 , percentile, NULL)) as desil4,
          COUNT(IF(percentile >=1 && percentile <=40 , percentile, NULL)) as semua
      FROM ".$bdtrt." join kecamatan where KDKEC = kecamatan.KodeKecamatan
      GROUP BY KDKEC with rollup";
      $result=@Yii::$app->db->createCommand($sql)->queryAll();
      return @$result;
    }

    public function listrekapperstatuskesejahteraan(){
      // $bdtart=Actions::kebdtart();
      $bdtrt=Actions::kebdtrt();

      $sql="select COALESCE (KDKEC,'TOTAL') as KDKEC, kecamatan.Nama,
          COUNT(IF(status_kesejahteraan = '1', 1, NULL)) as sangatmiskin,
          COUNT(IF(status_kesejahteraan = '2', 1, NULL)) as miskin,
          COUNT(IF(status_kesejahteraan = '3', 1, NULL)) as hampirmiskin,
          COUNT(IF(status_kesejahteraan = '4', 1, NULL)) as rentanmiskin,
          COUNT(IF(status_kesejahteraan = '5', 1, NULL)) as menujumiddleclass,
          COUNT(status_kesejahteraan) as grandtotal
      FROM ".$bdtrt." join kecamatan where KDKEC = kecamatan.KodeKecamatan
      GROUP BY KDKEC with rollup";
      $result=@Yii::$app->db->createCommand($sql)->queryAll();
      return @$result;
    }

    public function listrekapperlantai(){
      // $bdtart=Actions::kebdtart();
      // $bdtrt=Actions::kebdtrt();
      $bdtrt='bdtrt';
      $sql="select COALESCE (KDKEC,'TOTAL') as KDKEC ,kecamatan.Nama,
          COUNT(IF(lantai = 'Marmer/granit', lantai, NULL)) as marmer,
          COUNT(IF(lantai = 'Keramik', lantai, NULL)) as keramik,
          COUNT(IF(lantai = 'Parket/vinil/permadani', lantai, NULL)) as parket,
          COUNT(IF(lantai = 'Ubin/tegel/teraso', lantai, NULL)) as ubin,
          COUNT(IF(lantai = 'Kayu/papan kualitas tinggi', lantai, NULL)) as kayutinggi,
          COUNT(IF(lantai = 'Sementara/bata merah', lantai, NULL)) as sementara,
          COUNT(IF(lantai = 'Bambu', lantai, NULL)) as bambu,
          COUNT(IF(lantai = 'Kayu/papan kualitas rendah', lantai, NULL)) as kayurendah,
          COUNT(IF(lantai = 'Tanah', lantai, NULL)) as lantai,
          COUNT(IF(lantai = 'Lainnya', lantai, NULL)) as lainnya
      FROM ".$bdtrt." join kecamatan where KDKEC = kecamatan.KodeKecamatan
      GROUP BY KDKEC with rollup";
      $result=@Yii::$app->db->createCommand($sql)->queryAll();
      return @$result;
    }

    public function listrekapperdinding(){
      // $bdtart=Actions::kebdtart();
      $bdtrt=Actions::kebdtrt();
      $sql="select COALESCE (KDKEC,'TOTAL') as KDKEC ,kecamatan.Nama,
          COUNT(IF(dinding = 'Tembok', dinding, NULL)) as tembok,
          COUNT(IF(dinding = 'Plesteran anyaman bambu/kawat', dinding, NULL)) as plesteran,
          COUNT(IF(dinding = 'Kayu', dinding, NULL)) as kayu,
          COUNT(IF(dinding = 'Anyaman Bambu', dinding, NULL)) as anyamanbambu,
          COUNT(IF(dinding = 'Batang Kayu', dinding, NULL)) as batangkayu,
          COUNT(IF(dinding = 'Bambu', dinding, NULL)) as bambu,
          COUNT(IF(dinding = 'Lainnya', dinding, NULL)) as lainnya
      FROM ".$bdtrt." join kecamatan where KDKEC = kecamatan.KodeKecamatan
      GROUP BY KDKEC with rollup";
      $result=@Yii::$app->db->createCommand($sql)->queryAll();
      return @$result;
    }

    public function listrekapperkondisidinding(){
      // $bdtart=Actions::kebdtart();
      // $bdtrt=Actions::kebdtrt();
      $bdtrt='bdtrt';
      $sql="select COALESCE (KDKEC,'TOTAL') as KDKEC ,kecamatan.Nama,
          COUNT(IF(kondisi_dinding = 'Bagus/kualitas tinggi', kondisi_dinding, NULL)) as bagus,
          COUNT(IF(kondisi_dinding = 'Jelek/kualitas rendah', kondisi_dinding, NULL)) as jelek
      FROM ".$bdtrt." join kecamatan where KDKEC = kecamatan.KodeKecamatan
      GROUP BY KDKEC with rollup";
      $result=@Yii::$app->db->createCommand($sql)->queryAll();
      return @$result;
    }

    public function listrekappendudukmiskin(){
      // $bdtart=Actions::kebdtart();
      // $bdtrt=Actions::kebdtrt();
      $bdtart='bdtart';
      $bdtrt='bdtrt';
      $sql="
      SELECT COALESCE (g.KDKEC,'TOTAL') as kode,c.Nama,
        count(if(f.percentile >=1 && f.percentile <=40 , f.percentile, NULL)) as pendudukmiskin,
        count(if(g.Hub_KRT = 'Kepala keluarga' && f.percentile >=1 && f.percentile <=40, g.Hub_KRT, NULL)) as kepalakeluargamiskin
        FROM ".$bdtart." g
        JOIN ".$bdtrt." f
        ON g.IDBDT = f.IDBDT
        JOIN kecamatan c
        ON g.KDKEC = c.KodeKecamatan
        GROUP BY g.KDKEC with rollup";
      $result=@Yii::$app->db->createCommand($sql)->queryAll();
      return @$result;
    }

    

    public function listrekapkeluargamiskin(){
      // $bdtart=Actions::kebdtart();
      // $bdtrt=Actions::kebdtrt();
      $bdtrt='bdtrt';
      $sql="select COALESCE (KDKEC,'TOTAL') as KDKEC, kecamatan.Nama,
          COUNT(IF(percentile <=10, percentile, NULL)) as desil1,
          COUNT(IF(percentile >10 && percentile <=20 , percentile, NULL)) as desil2,
          COUNT(IF(percentile >20 && percentile <=30 , percentile, NULL)) as desil3,
          COUNT(IF(percentile >30 && percentile <=40 , percentile, NULL)) as desil4
      FROM ".$bdtrt." join kecamatan where KDKEC = kecamatan.KodeKecamatan
      GROUP BY KDKEC with rollup";
      $result=@Yii::$app->db->createCommand($sql)->queryAll();
      return @$result;
    }

    public static function updatelastlogin($username){
      // $sql = "update account set lastlogin = ".date('Y-m-d H:i:s')." where username = '".$username."'";
      Yii::$app->db->createCommand()->update('users', ['lastlogin' => date('Y-m-d H:i:s')], 'username = "'.$username.'"')->execute();
    }

    public function updateflagtoken($token){
      Yii::$app->db->createCommand()->update('token', ['flag' => 1], 'token = "'.$token.'"')->execute();
    }

    public function listrekapstatuslahan(){
      // $bdtart=Actions::kebdtart();
      // $bdtrt=Actions::kebdtrt();
      $bdtrt='bdtrt';
      $sql="select COALESCE (KDKEC,'TOTAL') as KDKEC, kecamatan.Nama,
          COUNT(IF(sta_lahan = 'Milik sendiri' && percentile >=1 && percentile <=40, sta_lahan, NULL)) as miliksendiri,
          COUNT(IF(sta_lahan = 'Milik orang lain' && percentile >=1 && percentile <=40, sta_lahan, NULL)) as milikorang,
          COUNT(IF(sta_lahan = 'Tanah negara' && percentile >=1 && percentile <=40, sta_lahan, NULL)) as tanahnegara,
          COUNT(IF(sta_lahan = 'Lainnya' && percentile >=1 && percentile <=40, sta_lahan, NULL)) as lainnya
      FROM ".$bdtrt." join kecamatan where KDKEC = kecamatan.KodeKecamatan
      GROUP BY KDKEC with rollup";
      $result=@Yii::$app->db->createCommand($sql)->queryAll();
      return @$result;
    }

    public function listrekapruta(){
      // $bdtart=Actions::kebdtart();
      // $bdtrt=Actions::kebdtrt();
      $bdtrt='bdtrt';
      $sql="select COALESCE (KDKEC,'TOTAL') as KDKEC, kecamatan.Nama,
          COUNT(IF(sta_keberadaan_RT = 'Tinggal di Ruta' && percentile >=1 && percentile <=40, sta_keberadaan_RT, NULL)) as ruta
      FROM ".$bdtrt." join kecamatan where KDKEC = kecamatan.KodeKecamatan
      GROUP BY KDKEC with rollup";
      $result=@Yii::$app->db->createCommand($sql)->queryAll();
      return @$result;
    }

    
      
     public function listdatarekap(){
      // $tabel=strtolower($tabel);
      // $sql="select COALESCE(KDKEC, 'TOTAL') as KDKEC, count(bdtart.Nama) as Nama,COUNT(IF(bdtart.Hub_KRT = 'Kepala keluarga', bdtart.Hub_KRT, NULL)) as Hub_KRT
      // FROM bdtart join kecamatan where KDKEC = kecamatan.KodeKecamatan
      // GROUP BY bdtart.KDKEC with rollup";

//       $sql="
//       SELECT COALESCE (g.KDKEC,'TOTAL') as kode,c.Nama,
// COUNT(IF(g.Hub_KRT = 'Kepala keluarga', g.Hub_KRT, NULL)) as rt,
// count(g.IDBDT) as jiwa, 
// sum(IF(g.Hub_KRT = 'Kepala keluarga', Jumlah_Keluarga, NULL)) as keluarga
// FROM bdtart g
// JOIN bdtrt f
// ON g.IDBDT = f.IDBDT
// JOIN kecamatan c
// ON g.KDKEC = c.KodeKecamatan
// GROUP BY g.KDKEC with rollup";
// $bdtart=Actions::kebdtart();
// $bdtrt=Actions::kebdtrt();
$bdtart='bdtart';
$bdtrt='bdtrt';

$sql="
SELECT A.kode,A.Nama,B.rt,A.jiwa,A.keluarga  FROM (SELECT COALESCE (g.KDKEC,'TOTAL') as kode,min(c.Nama) as Nama,
count(g.IDBDT) as jiwa, 
sum(IF(g.Hub_KRT = 'Kepala keluarga', Jumlah_Keluarga, NULL)) as keluarga
FROM ".$bdtart." g
JOIN ".$bdtrt." f
ON g.IDBDT = f.IDBDT
JOIN kecamatan c
ON g.KDKEC = c.KodeKecamatan
GROUP BY g.KDKEC with rollup) AS A
INNER JOIN
(SELECT COALESCE (g.KDKEC,'TOTAL') as kode,min(c.Nama) as Nama,
count(g.IDBDT) as rt
FROM ".$bdtrt." g
JOIN kecamatan c
ON g.KDKEC = c.KodeKecamatan
GROUP BY g.KDKEC with rollup) AS B ON A.kode=B.kode
";
      //COUNT(IF(sta_jamsostek = 'Ya', sta_jamsostek, NULL)) as kjs
      // $sql='select 
      // KDKEC,
      //  count(JnsKel) as jeniskelamin
      //  from '.$tabel.' where JnsKel = "'.@$gender.'"
      //  group by KDKEC';
      $result=@Yii::$app->db->createCommand($sql)->queryAll();
      return @$result;

    }

   

    public function listrekapdisabilitas(){
      // $bdtart= Actions::kebdtart();
      $bdtart= 'bdtart';
      $sql="select COALESCE(KDKEC, 'TOTAL') as KDKEC,kecamatan.Nama,
          COUNT(IF(Jenis_cacat = 'Tidak cacat', Jenis_cacat, NULL)) as tidakcacat,
          COUNT(IF(Jenis_cacat = 'Tuna daksa/cacat tubuh', Jenis_cacat, NULL)) as tunadaksa,
          COUNT(IF(Jenis_cacat = 'Tuna netra/buta', Jenis_cacat, NULL)) as tunanetra,
          COUNT(IF(Jenis_cacat = 'Tuna rungu', Jenis_cacat, NULL)) as tunarungu,
          COUNT(IF(Jenis_cacat = 'Tuna wicara', Jenis_cacat, NULL)) as tunarunguwicara,
          COUNT(IF(Jenis_cacat = 'Tuna netra & cacat tubuh', Jenis_cacat, NULL)) as tunanetradancacat,
          COUNT(IF(Jenis_cacat = 'Tuna netra, rungu,& wicara', Jenis_cacat, NULL)) as tunanetradanrungu,
          COUNT(IF(Jenis_cacat = 'Tuna rungu, wicara,& cacat tubuh', Jenis_cacat, NULL)) as tunarunguwicaracacat,
          COUNT(IF(Jenis_cacat = 'Tuna rungu, wicara,netra, & cacat tubuh', Jenis_cacat, NULL)) as tunarunguwicaranetracacat,
          COUNT(IF(Jenis_cacat = 'Cacat mental retardasi', Jenis_cacat, NULL)) as cacatmental,
          COUNT(IF(Jenis_cacat = 'Mantan penderita gangguan jiwa', Jenis_cacat, NULL)) as mantangangguanjiwa,
          COUNT(IF(Jenis_cacat = 'Cacat fisik & mental', Jenis_cacat, NULL)) as cacatfisik,
          count(*) as jumlah
      FROM ".$bdtart." join kecamatan where KDKEC = kecamatan.KodeKecamatan
      GROUP BY KDKEC with rollup";
      // $sql='select 
      // KDKEC,
      //  count(JnsKel) as jeniskelamin
      //  from '.$tabel.' where JnsKel = "'.@$gender.'"
      //  group by KDKEC';
      $result=@Yii::$app->db->createCommand($sql)->queryAll();
      return @$result;

    }

    public function listrekapumur(){
      $bdtart = Actions::kebdtart();
      $sql="
      SELECT COALESCE(KDKEC, 'TOTAL') as KDKEC,kecamatan.Nama,
          COUNT(IF(Umur >= 60, Umur, NULL)) as keatas,
          COUNT(IF(Umur < 60, Umur, NULL)) as kebawah,
          COUNT(*) as jmltotal
      FROM ".$bdtart." join kecamatan where KDKEC = kecamatan.KodeKecamatan
      GROUP BY KDKEC with rollup";

      $result=@Yii::$app->db->createCommand($sql)->queryAll();
      return @$result;

    }

    public function listrekappendidikan(){
      $bdtart=Actions::kebdtart();
      $sql="
      SELECT COALESCE(KDKEC, 'TOTAL') as KDKEC,kecamatan.Nama,
          COUNT(IF(Umur BETWEEN 6 AND 12 AND Partisipasi_sekolah = 'Masih sekolah', Umur, NULL)) as sd,
          COUNT(IF(Umur BETWEEN 6 AND 12 AND Partisipasi_sekolah = 'Tidak bersekolah lagi', Umur, NULL)) as sdtidak,
          COUNT(IF(Umur BETWEEN 13 AND 15 AND Partisipasi_sekolah = 'Masih sekolah', Umur, NULL)) as smp,
          COUNT(IF(Umur BETWEEN 13 AND 15 AND Partisipasi_sekolah = 'Tidak bersekolah lagi', Umur, NULL)) as smptidak,
          COUNT(IF(Umur BETWEEN 16 AND 18 AND Partisipasi_sekolah = 'Masih sekolah', Umur, NULL)) as sma,
          COUNT(IF(Umur BETWEEN 16 AND 18 AND Partisipasi_sekolah = 'Tidak bersekolah lagi', Umur, NULL)) as smatidak
      FROM ".$bdtart." join kecamatan where KDKEC = kecamatan.KodeKecamatan
      GROUP BY KDKEC with rollup";

      $result=@Yii::$app->db->createCommand($sql)->queryAll();
      return @$result;

    }

    


    public function listrekapdashboard(){
      // $tabel=strtolower($tabel);
// $session = Yii::$app->session;
      $session['periode'] = 'oktober2020';
      $sql="
      select * from dashboard where periode='".$session['periode']."'";

      $result=@Yii::$app->db->createCommand($sql)->queryAll();
      return @$result;

    }

    public function cobadulu(){
    $dataProvider = new ArrayDataProvider([
        'allModels' => Actions::listdatarekap(),
    ]);

      return $dataProvider;
    }
    
  public function service4($url="", $input="",$method="")
  {
    $data_string = json_encode($input);
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Accept: application/json',
        'Content-Type: application/json',
        'body: ' . $data_string,
        'timeout: 9000' )
    );

    $result = curl_exec($ch);
    // $result = json_encode($result);
    return $result;
  }
  
  public function getDataBdtProvinsi($nomor,$nik_idbdt="nik") // get data bdt provinsi using service
  {// $url="https://caribdt.dinsos.jatengprov.go.id/api/get_details_nik";
    if($nik_idbdt=="nik") {
      $url="https://caribdt.dinsos.jatengprov.go.id/api/get_details_nik?user=kota_smg&token=mL0l3VSaLFYfep4sVkUSyoCI6hc837GM&nik=$nomor";
      $input=['user'=>'kota_smg','token'=>'mL0l3VSaLFYfep4sVkUSyoCI6hc837GM','nik'=>$nomor];
    }

    if($nik_idbdt=="idbdt") {
      $url="https://caribdt.dinsos.jatengprov.go.id/api/get_details_idbdt?user=kota_smg&token=mL0l3VSaLFYfep4sVkUSyoCI6hc837GM&idbdt=$nomor";
      $input=['user'=>'kota_smg','token'=>'mL0l3VSaLFYfep4sVkUSyoCI6hc837GM','idbdt'=>$nomor];
    }
    $hasil=Actions::serviceProvinsi($url,$input);
    // return json_decode($hasil);
    return $hasil;
  }

  public function serviceToken($username,$password){
    if (!Account::find()->where(["username"=>$username])->andWhere(["password"=>$password])->exists()) {
        exit;
        // return 'gagal';
     }
    $getdate =date('Y-m-d H:i:s');
    $mask = Yii::$app->getSecurity()->maskToken($getdate, 'erinursofa');
     $sql="
     insert into token (token,created,updated,flag) values ('".$mask.
      "','".$getdate.
      "','".$getdate.
      "',0
      );";

      $result=@Yii::$app->db->createCommand($sql)->execute();
    // echo $getdate;
    return $mask;
  }


  public static function serviceProvinsi($url="", $input="")
  {
      $data = ['input' => $input,];
      $options = [
              'http' => [
                          'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                          'method'  => 'POST',
                          'content' => http_build_query($data),
                         ],
      ];
      $context  = stream_context_create($options);
      $result = file_get_contents($url, false, $context);
      return $result;
  }

public function getbdtrt($kodekecamatan){
        $query = Bdtrt::find()->where(['KDKEC'=>$kodekecamatan])->orderBy([
          'KDKEC' => SORT_ASC //specify sort order ASC for ascending DESC for descending      
    ]);

        $provider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);
        return $provider;
}

public function getbdtart($kodekecamatan){
  $query = Bdtart::find()->where(['KDKEC'=>$kodekecamatan])->orderBy([
        'KDKEC' => SORT_ASC //specify sort order ASC for ascending DESC for descending      
  ]);
  $provider = new ActiveDataProvider([
      'query' => $query,
      'pagination' => [
      'pageSize' => 20,
      ],
  ]);
  return $provider;
}

public function getdokumen(){
        $query = Dokumen::find()->where(['status'=>'proses'])->all();

        $provider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);
        return $provider;
}
   
public function updatedashboard(){
     //delete from dashboard;
     $sql="

     insert into dashboard (kip,jiwa,ruta,keluarga,pkh,pbi,pbp,periode) values (".Actions::listdatapenerimabantuan()[16]['kip'].
      ",".Actions::listdatarekap()[16]['jiwa'].
      ",".Bdtrt::find()->count().
      ",".Actions::listdatarekap()[16]['keluarga'].
      ",".Actions::listdatapenerimabantuan()[16]['pkh'].
      ",".Actions::listdatapenerimabantuan()[16]['jknkis'].
      ",".Actions::listdatapenerimabantuan()[16]['bpnt'].
      //",".Yii::$app->session["periode"].
      ",\"".Yii::$app->session["periode"].
      "\");";
      // return $sql;
      $result=@Yii::$app->db->createCommand($sql)->execute();

      return @$result;

} 

 public function setglobal(){
     $sql="
    SET GLOBAL sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''))";
      $result=@Yii::$app->db->createCommand($sql)->execute();
      return @$result;
} 

public function getapi(){
    $url = 'http://103.101.52.69:5001/api/tablereport/1/2015/2019';
    // $url = 'http://103.101.52.69:5001/api/elemendata';    
    // Collection object
    $result = Actions::GetHttpContent($url);
    $result = json_decode($result,true);
    // $data = [
    //   'collection' => 'RapidAPI'
    // ];
    // // Initializes a new cURL session
    // $curl = curl_init($url);
    // // 1. Set the CURLOPT_RETURNTRANSFER option to true
    // curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    // // 2. Set the CURLOPT_POST option to true for POST request
    // curl_setopt($curl, CURLOPT_POST, true);
    // // 3. Set the request data as JSON using json_encode function
    // curl_setopt($curl, CURLOPT_POSTFIELDS,  json_encode($data));
    // // 4. Set custom headers for RapidAPI Auth and Content-Type header
    // curl_setopt($curl, CURLOPT_HTTPHEADER, [
    //   'X-RapidAPI-Host: 103.101.52.69:5001',
    //   'X-RapidAPI-Key: [cb0441af19a563b891ccc9e9396a1ca1432a112368f3c598e7cc6353c6785c1d]',
    //   'Content-Type: application/json'
    // ]);
    // // Execute cURL request with all previous settings
    // $response = curl_exec($curl);
    // // Close cURL session
    // curl_close($curl);
    // echo $response . PHP_EOL;
    // Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    return $result;
}


    public function listkecamatan(){
      $sql = Kecamatan::find();
       $provider = new ActiveDataProvider([
            'query' => $sql,
            // 'pagination' => [
            //     'pageSize' => 10,
            // ],
        ]);
        return $provider;
    }

    public function filterbantuan($filter){
      // $a=array(
      //    '0000'=>'tidak memiliki bantuan',
      //    '0001'=>'kip',
      //    '0010'=>'jkn/kis',
      //    '0011'=>'jkn/kis dan kip',
      //     '0100'=>'bpnt',
      //     '0101'=>'bpnt dan kip',
      //     '0110'=>'bpnt dan jkn/kis',
      //     '0111'=>'bpnt, jkn/kis dan kip',
      //     '1000'=>'pkh',
      //     '1001'=>'pkh dan kip',
      //     '1010'=>'pkh dan jkn/kis',
      //     '1011'=>'pkh, jkn/kis dan kip',
      //     '1100'=>'pkh dan bpnt',
      //     '1101'=>'pkh, bpnt & kip',
      //     '1110'=>'pkh, bpnt dan jkn/kis',
      //     '1111'=>'semua bantuan',
      // );
      // echo array_search("red",$a);
      switch ($filter) {
        case '0000':
          return $filter;
        break;
          case '0001':
        return $filter;
          break;
          case '0010':
          return $filter;
          break;
          case '0011':
          return $filter;
          break;
          case '0100':
          return $filter;
          break;
          case '0101':
          return $filter;
          break;
          case '0110':
          return $filter;
          break;
          case '0111':
          return $filter;
          break;
          case '1000':
          return $filter;
          break;
          case '1001':
          return $filter;
          break;
          case '1010':
          return $filter;
          break;
          case '1011':
          return $filter;
          break;
          case '1100':
          return $filter;
          break;
          case '1101':
          return $filter;
          break;
          case '1110':
          return $filter;
          break;
          case '1111':
          return $filter;
          break;
        // default:
        //   # code...
        //   break;
      }
    }
    public function statuskematian($nik){
      $result = StatusKematian::find()->where(['nik'=>$nik])->orderBy(['created'=>SORT_DESC])->one();
      if (!empty($result)) {
        return $result['status'];
      }else{
        return 'Hidup';
      }
      
    }

    public function statusdtks($nik){
      $result=array();
      // $result['statusdtks']=Bdtart::find()->where(['nik' => $nik])->exists();
      // echo '<pre>'.print_r($result['statusdtks']).'</pre>';exit;
      // $result = Bdtart::find()->where(['nik'=>$nik])->orderBy(['created'=>SORT_DESC])->one();
      if (Bdtart::find()->where(['nik' => $nik])->exists()) {
        $bdtart = Bdtart::find()->where(['nik'=>$nik])->orderBy(['created'=>SORT_DESC])->one();
        $result['statusdtks']=$bdtart->IDBDT;
        // $oke=$result['statusdtks']->one();
        return $result['statusdtks'];
      }else{
        $result['statusdtks']="Non DTKS";
        return $result['statusdtks'];
      }
      
    }

    // public function dokumenbantuan($kategori){
    //   $model->username=@Yii::$app->user->identity->username;
    // }
    public function getkecamatanfromsyantik(){
      $get = @Services::getJSON();
      // $arraykec = '';
      // foreach($get as $key => $val['detail']) { 
      //   $val2 = $get[$key];
      //   $arraykec = $val2['detail'];
      // }
      $kecamatans = array_column($get, 'detail');
      $datakecamatan = $kecamatans[0];
      return $datakecamatan;
    }

    public function kebdtart(){
      $session = Yii::$app->session;
      switch ($session['periode']) {
	      case 'oktober2020':
          return 'bdtart';
          break;
        case 'januari2020':
          return 'bdtart_jan20';
          break;         
	      case 'juli2019':
          return 'bdtart_jul19';
          break;
        case 'oktober2019':
          return 'bdtart_okt19';
          break;
      }
    }
    public function kebdtrt(){
      $session = Yii::$app->session;
      switch ($session['periode']) {
	     case 'oktober2020':
          return 'bdtrt';
          break;
      case 'januari2020':
          return 'bdtrt_jan20';
          break; 
        case 'juli2019':
          return 'bdtrt_jul19';
          break;
        case 'oktober2019':
          return 'bdtrt_okt19';
          break;
      }
    }
    public function labelPeriode(){
      $session = Yii::$app->session;
      switch ($session['periode']) {
	      case 'oktober2020':
          return 'OKTOBER 2020';
          break;
        case 'januari2020':
          return 'JANUARI 2020';
          break;
        case 'juli2019':
          return 'JULI 2019';
          break;
        // case 'november2019':
        //   return 'NOVEMBER 2019';
        //   break;
        case 'oktober2019':
          return 'OKTOBER 2019';
          break;
      }
    }


    public function deletebantuantahap2dokumen($id){
      Yii::$app->db->createCommand()->delete('bantuan_tahap2_dokumen', [
        'id' => $id
        ])->execute();
      return 'true';
    }
    public function updatestatusbantuantahap2dokumen($id,$status){
      Yii::$app->db->createCommand()->update('bantuan_tahap2_dokumen', ['status' => $status], 'id = "'.$id.'"')->execute();
    }

    public function persetujuanIsoman($role,$persetujuan,$id){
      if ($role==="puskesmas") {
        Yii::$app->db->createCommand()->update('isoman', ['puskesmas_yg_menyetujui' => $persetujuan], 'id = "'.$id.'"')->execute();
      }
      if ($role==="kecamatan") {
        Yii::$app->db->createCommand()->update('isoman', ['kecamatan_yg_menyetujui' => $persetujuan], 'id = "'.$id.'"')->execute();
      }
    }
    public function persetujuanPpkmpbl($role,$persetujuan,$id){
      // if ($role==="puskesmas") {
      //   Yii::$app->db->createCommand()->update('ppkm_pbl', ['puskesmas_yg_menyetujui' => $persetujuan], 'id = "'.$id.'"')->execute();
      // }
      if ($role==="kecamatan") {
        Yii::$app->db->createCommand()->update('ppkm_pbl', ['kecamatan_yg_menyetujui' => $persetujuan], 'id = "'.$id.'"')->execute();
      }
    }
    public function persetujuanBansosLansia2021($role,$persetujuan,$id){
      if ($role==="kecamatan") {
        Yii::$app->db->createCommand()->update('bansos_lansia_2021', ['kecamatan_yg_menyetujui' => $persetujuan], 'id = "'.$id.'"')->execute();
      }
    }
    public function persetujuanBansosCukaiRokok($role,$persetujuan,$id){
      if ($role==="kecamatan") {
        Yii::$app->db->createCommand()->update('bansos_cukai_rokok', ['kecamatan_yg_menyetujui' => $persetujuan], 'id = "'.$id.'"')->execute();
      }
    }
    public function persetujuanUsulanBansosKemensos($role,$persetujuan,$id){
      if ($role==="kecamatan") {
        Yii::$app->db->createCommand()->update('usulan_bansos_kemensos', ['kecamatan_yg_menyetujui' => $persetujuan], 'id = "'.$id.'"')->execute();
      }
    }
    public function persetujuanBantuanBeras($role,$persetujuan,$id){
      if ($role==="kecamatan") {
        Yii::$app->db->createCommand()->update('bantuan_beras', ['kecamatan_yg_menyetujui' => $persetujuan], 'id = "'.$id.'"')->execute();
      }
    }
    public function persetujuanBantuanRelawan($role,$persetujuan,$id){
      if ($role==="kecamatan") {
        Yii::$app->db->createCommand()->update('bantuan_relawan', ['kecamatan_yg_menyetujui' => $persetujuan], 'id = "'.$id.'"')->execute();
      }
    }
    public function persetujuanPemenuhanKuotaBeras($role,$persetujuan,$id){
      if ($role==="kecamatan") {
        Yii::$app->db->createCommand()->update('pemenuhan_kuota_beras', ['kecamatan_yg_menyetujui' => $persetujuan], 'id = "'.$id.'"')->execute();
      }
    }
    public function persetujuanDataanakyatim($role,$persetujuan,$id){
      if ($role==="kecamatan") {
        Yii::$app->db->createCommand()->update('dataanakyatim', ['kecamatan_yg_menyetujui' => $persetujuan], 'id = "'.$id.'"')->execute();
      }
    }

    public function ceknik($nik){
        $result=array();
        $result['Bansossembakotahap1']=Bansossembakotahap1::find()->where(['nik' => $nik])->exists();
        $result['Bansossembakotahap2']=Bansossembakotahap2::find()->where(['nik' => $nik])->exists();
        $result['Bansossembakotahap3']=Bansossembakotahap3::find()->where(['nik' => $nik])->exists();
        $result['Jpsprovinsijateng']=Jpsprovinsijateng::find()->where(['nik' => $nik])->exists();
        $result['Jpsprovinsijateng2']=Jpsprovinsijateng2::find()->where(['nik' => $nik])->exists();
        $result['Sembakobantuanpresiden']=Sembakobantuanpresiden::find()->where(['nik' => $nik])->exists();
        $result['Bstnondtks']=Bstnondtks::find()->where(['nik' => $nik])->exists();
        $result['Bstdtks']=Bstdtks::find()->where(['nik' => $nik])->exists();
        $result['Sembakoregulerkemensos']=Sembakoregulerkemensos::find()->where(['nik_ktp' => $nik])->exists();
        $result['Sembakoperluasankemensos']=Sembakoperluasankemensos::find()->where(['nik' => $nik])->exists();
        $result['Programpkhkemensos']=Programpkhkemensos::find()->where(['nik' => $nik])->exists();
        $result['Covid19']=Covid19::find()->where(['nik' => $nik])->exists();
        return $result;
    }
    //cek nik bantuan 2021
    public function ceknik2021($nik){
        $result=array();
        $result['bst']=BstMeiJuni2021::find()->where(['no_identitas' => $nik])->exists();
        $result['bsp']=BspSeptember2021::find()->where(['nik_ktp' => $nik])->exists();
        $result['pkh']=PkhAgustus2021::find()->where(['nik' => $nik])->exists();
        return $result;
    }

    public function ceknokk($nokk,$nik="",$idbdt=""){
        $result=array();
        $result['Bansossembakotahap1']=Bansossembakotahap1::find()->where(['idbdt' => $idbdt])->exists();
        $result['Bansossembakotahap2']=Bansossembakotahap2::find()->where(['kk' => $nokk])->exists();
        $result['Bansossembakotahap3']=Bansossembakotahap3::find()->where(['kk' => $nokk])->exists();
        // $result['Bansossembakotahap1']['title']='Bansos Sembako APBD Kota Semarang';
        $result['Jpsprovinsijateng']=Jpsprovinsijateng::find()->where(['no_kk' => $nokk])->exists();
        // $result['Jpsprovinsijateng']['title']='Jps Provinsi Jateng';
        $result['Sembakobantuanpresiden']=Sembakobantuanpresiden::find()->where(['kk' => $nokk])->exists();
        // $result['Sembakobantuanpresiden']['title']='Program Sembako Presiden';
        $result['Bstnondtks']=Bstnondtks::find()->where(['nik' => $nik])->exists();
        // $result['Bstnondtks']['title']='BST NON DTKS';
        $result['Bstdtks']=Bstdtks::find()->where(['nik' => $nik])->exists();
        // $result['Bstdtks']['title']='BST DTKS';
        $result['Sembakoregulerkemensos']=Sembakoregulerkemensos::find()->where(['nik_ktp' => $nik])->exists();
        // $result['Sembakoregulerkemensos']['title']='Program Sembako Reguler Kemensos';
        $result['Sembakoperluasankemensos']=Sembakoperluasankemensos::find()->where(['nik' => $nik])->exists();
        // $result['Sembakoperluasankemensos']['title']='Program Sembako Perluasan Kemensos';
        $result['Programpkhkemensos']=Programpkhkemensos::find()->where(['nik' => $nik])->exists();
        // $result['Programpkhkemensos']['title']='Program PKH Kemensos'; 
        $result['Covid19']=Covid19::find()->where(['nik' => $nik])->exists();

        return $result;
    }
    public function ceknokk2021($nokk,$nik="",$idbdt=""){
        $result=array();
        $result['bst']=BstMeiJuni2021::find()->where(['no_identitas' => $nik])->exists();
        $result['bsp']=BspSeptember2021::find()->where(['nokk_dtks' => $nokk])->exists();
        $result['pkh']=PkhAgustus2021::find()->where(['nik' => $nik])->exists();
        return $result;
    }
    public function cekidbdt($idbdt,$nik="",$nokk=""){
        $result=array();
        $result['Bansossembakotahap1']=Bansossembakotahap1::find()->where(['idbdt' => $idbdt])->exists();
        // $result['Bansossembakotahap1']['title']='Bansos Sembako APBD Kota Semarang';
        $result['Jpsprovinsijateng']=Jpsprovinsijateng::find()->where(['nik' => $nik])->exists();
        // $result['Jpsprovinsijateng']['title']='Jps Provinsi Jateng';
        if (!empty($nik)) {
        $result['Sembakobantuanpresiden']=Sembakobantuanpresiden::find()->where(['nik' => $nik])->exists();
        // $result['Sembakobantuanpresiden']['title']='Program Sembako Presiden';
        $result['Bstnondtks']=Bstnondtks::find()->where(['nik' => $nik])->exists();
        // $result['Bstnondtks']['title']='BST NON DTKS';
        // $result['Bstdtks']['title']='BST DTKS';
        $result['Sembakoregulerkemensos']=Sembakoregulerkemensos::find()->where(['nik_ktp' => $nik])->exists();
        // $result['Sembakoregulerkemensos']['title']='Program Sembako Reguler Kemensos';
        $result['Sembakoperluasankemensos']=Sembakoperluasankemensos::find()->where(['nik' => $nik])->exists();
        // $result['Sembakoperluasankemensos']['title']='Program Sembako Perluasan Kemensos';
        $result['Programpkhkemensos']=Programpkhkemensos::find()->where(['nik' => $nik])->exists();
        // $result['Programpkhkemensos']['title']='Program PKH Kemensos'; 
        }else{
          $result['Sembakobantuanpresiden']=false;
        // $result['Sembakobantuanpresiden']['title']='Program Sembako Presiden';
        $result['Bstnondtks']=false;
        // $result['Bstnondtks']['title']='BST NON DTKS';
        $result['Bstdtks']=false;
        // $result['Bstdtks']['title']='BST DTKS';
        $result['Sembakoregulerkemensos']=false;
        // $result['Sembakoregulerkemensos']['title']='Program Sembako Reguler Kemensos';
        $result['Sembakoperluasankemensos']=false;
        // $result['Sembakoperluasankemensos']['title']='Program Sembako Perluasan Kemensos';
        $result['Programpkhkemensos']=false;
        // $result['Programpkhkemensos']['title']='Program PKH Kemensos';
        }
       $result['Bstdtks']=Bstdtks::find()->where(['idbdt' => $idbdt])->exists();
        $result['Covid19']=Covid19::find()->where(['nik' => $nik])->exists();
        return $result;
    }

    public function updateIsoman(){
      ini_set('precision', '16');
      $hasil = Actions::getQuery('select * from isoman  where id between 1368 AND 2194');

      foreach ($hasil as $key => $value) {
        $kodekecamatan=@Account::find()->where(["username"=>$value['username']])->one()->kode_kecamatan;
        $namakecamatan=@Kecamatan::find()->where(["KodeKecamatan"=>@$kodekecamatan])->one()->Nama;
        Yii::$app->db->createCommand()->update('isoman', ['kode_kecamatan' => @$kodekecamatan,'nama_kecamatan'=>@$namakecamatan], 'username = "'.$value['username'].'"')->execute();
      }
      return 'berhasil diupdate';
  }
    public function updateusulanmijen(){
      ini_set('precision', '16');
      $hasil = Actions::getQuery('select * from mijenusulan where id between 4771 AND 6904');
      // return print_r($hasil);
      

      foreach ($hasil as $key => $value) {
      //   return print_r($value['nik_art']);
      // exit();
        $ok=@Actions::TrackingNik($value['nik']);
        if (!empty($ok)) {
          $keys = array_keys($ok);
          $desired_keys = array('NAMA_LGKP', 'RESPONSE_DESC');

      foreach($desired_keys as $desired_key){
         if(in_array($desired_key, $keys)) continue;  // already set
         $ok[$desired_key] = '';
      }

          if (trim($ok['NAMA_LGKP'])==trim(strtoupper($value['nama']))) {
            Yii::$app->db->createCommand()->update('mijenusulan', ['keterangan' => 'valid','tgl_lahir'=>$ok['TGL_LHR'],'tempat_lahir'=>$ok['TMPT_LHR'],'jenis_kelamin'=>$ok['JENIS_KLMIN']], 'nik = "'.$value['nik'].'"')->execute();
          }else{
            if (!empty($ok['RESPONSE_DESC'])) {
              Yii::$app->db->createCommand()->update('mijenusulan', ['keterangan' => $ok['RESPONSE_DESC']], 'nik = "'.$value['nik'].'"')->execute();  
            }if (!empty($ok['NAMA_LGKP'])) {
              Yii::$app->db->createCommand()->update('mijenusulan', ['keterangan' => 'nama tidak sesuai','tgl_lahir'=>$ok['TGL_LHR'],'tempat_lahir'=>$ok['TMPT_LHR'],'jenis_kelamin'=>$ok['JENIS_KLMIN'],'nama_ktp'=>$ok['NAMA_LGKP']], 'nik = "'.$value['nik'].'"')->execute();  
            }
          }
          
          // print_r($ok['NAMA_LGKP']);exit;  
        }else{
          Yii::$app->db->createCommand()->update('mijenusulan', ['keterangan' => 'tidak valid','tgl_lahir'=>$ok['TGL_LHR'],'tempat_lahir'=>$ok['TMPT_LHR'],'jenis_kelamin'=>$ok['JENIS_KLMIN']], 'nik = "'.$value['nik'].'"')->execute();
        }
        
        // Yii::$app->db->createCommand()->update('tidakpadan', ['status' => 'valid'], 'nik = "'.$username.'"')->execute();
    }
    return 'berhasil diupdate';
          // return $hasil[0];
    // $sql = "update account set lastlogin = ".date('Y-m-d H:i:s')." where username = '".$username."'";
    // Yii::$app->db->createCommand()->update('tidakpadan', ['status' => 'valid'], 'nik = "'.$username.'"')->execute();
  }
public function updatebansosberasalamat(){
      ini_set('precision', '16');
      $hasil = Actions::getQuery('select * from bansosberasalamat where status = "Data Tidak Ditemukan"');
      // return print_r($hasil);
      

      foreach ($hasil as $key => $value) {
      //   return print_r($value['nik_art']);
      // exit();
        $ok=@Actions::TrackingNik($value['nik']);
        if (!empty($ok)) {
          $keys = array_keys($ok);
      $desired_keys = array('NAMA_LGKP', 'RESPONSE_DESC');

      foreach($desired_keys as $desired_key){
         if(in_array($desired_key, $keys)) continue;  // already set
         $ok[$desired_key] = '';
      }

          if (trim($ok['NAMA_LGKP'])==trim(strtoupper($value['nama']))) {
            Yii::$app->db->createCommand()->update('bansosberasalamat', ['status' => 'valid','nama_ktp'=>$ok['NAMA_LGKP'],'alamat_ktp'=>$ok['ALAMAT'],'no_rt_ktp'=>$ok['NO_RT'],'no_rw_ktp'=>$ok['NO_RW'],'provinsi_ktp'=>$ok['PROP_NAME'],'kab_ktp'=>$ok['KAB_NAME'],'kec_ktp'=>$ok['KEC_NAME'],'kel_ktp'=>$ok['KEL_NAME']], 'nik = "'.$value['nik'].'"')->execute();
          }else{
            if (!empty($ok['RESPONSE_DESC'])) {
              Yii::$app->db->createCommand()->update('bansosberasalamat', ['status' => $ok['RESPONSE_DESC'],'nama_ktp'=>@$ok['NAMA_LGKP'],'alamat_ktp'=>@$ok['ALAMAT'],'no_rt_ktp'=>@$ok['NO_RT'],'no_rw_ktp'=>@$ok['NO_RW'],'provinsi_ktp'=>@$ok['PROP_NAME'],'kab_ktp'=>@$ok['KAB_NAME'],'kec_ktp'=>@$ok['KEC_NAME'],'kel_ktp'=>@$ok['KEL_NAME']], 'nik = "'.$value['nik'].'"')->execute();  
            }if (!empty($ok['NAMA_LGKP'])) {
              Yii::$app->db->createCommand()->update('bansosberasalamat', ['status' => 'nama tidak sesuai','nama_ktp'=>$ok['NAMA_LGKP'],'alamat_ktp'=>$ok['ALAMAT'],'no_rt_ktp'=>$ok['NO_RT'],'no_rw_ktp'=>$ok['NO_RW'],'nama_ktp'=>$ok['NAMA_LGKP'],'provinsi_ktp'=>$ok['PROP_NAME'],'kab_ktp'=>$ok['KAB_NAME'],'kec_ktp'=>$ok['KEC_NAME'],'kel_ktp'=>$ok['KEL_NAME']], 'nik = "'.$value['nik'].'"')->execute();  
            }
          }

        }else{
          Yii::$app->db->createCommand()->update('bansosberasalamat', ['status' => 'tidak valid','nama_ktp'=>$ok['NAMA_LGKP'],'alamat_ktp'=>$ok['ALAMAT'],'no_rt_ktp'=>$ok['NO_RT'],'no_rw_ktp'=>$ok['NO_RW'],'provinsi_ktp'=>$ok['PROP_NAME'],'kab_ktp'=>$ok['KAB_NAME'],'kec_ktp'=>$ok['KEC_NAME'],'kel_ktp'=>$ok['KEL_NAME']], 'nik = "'.$value['nik'].'"')->execute();
        }   
    }
    return 'berhasil diupdate';

  }
    public function updatetidakpadan(){
      ini_set('precision', '16');
      $hasil = Actions::getQuery('select * from tidakpadan_2021');
      // return print_r($hasil);
      

      foreach ($hasil as $key => $value) {
      //   return print_r($value['nik_art']);
      // exit();
        $ok=@Actions::TrackingNik($value['nik_art']);
        if (!empty($ok)) {
          $keys = array_keys($ok);
      $desired_keys = array('NAMA_LGKP', 'RESPONSE_DESC');

      foreach($desired_keys as $desired_key){
         if(in_array($desired_key, $keys)) continue;  // already set
         $ok[$desired_key] = '';
      }

          if (trim($ok['NAMA_LGKP'])==trim($value['nama_art'])) {
            Yii::$app->db->createCommand()->update('tidakpadan_2021', ['status' => 'valid'], 'nik_art = "'.$value['nik_art'].'"')->execute();
          }else{
            if (!empty($ok['RESPONSE_DESC'])) {
              Yii::$app->db->createCommand()->update('tidakpadan_2021', ['status' => $ok['RESPONSE_DESC']], 'nik_art = "'.$value['nik_art'].'"')->execute();  
            }if (!empty($ok['NAMA_LGKP'])) {
              Yii::$app->db->createCommand()->update('tidakpadan_2021', ['status' => 'nama tidak sesuai','nama_ktp'=>$ok['NAMA_LGKP']], 'nik_art = "'.$value['nik_art'].'"')->execute();  
            }

          }
          
          // print_r($ok['NAMA_LGKP']);exit;  
        }else{
          Yii::$app->db->createCommand()->update('tidakpadan_2021', ['status' => 'tidak valid'], 'nik_art = "'.$value['nik_art'].'"')->execute();
        }
        
        // Yii::$app->db->createCommand()->update('tidakpadan', ['status' => 'valid'], 'nik = "'.$username.'"')->execute();
    }
    return 'berhasil diupdate';
          // return $hasil[0];
    // $sql = "update account set lastlogin = ".date('Y-m-d H:i:s')." where username = '".$username."'";
    // Yii::$app->db->createCommand()->update('tidakpadan', ['status' => 'valid'], 'nik = "'.$username.'"')->execute();
  }
      public function updatedatanik(){
      ini_set('precision', '16');
      $hasil = Actions::getQuery('select * from datanik where id between 19564 AND 19744');
      // print_r($hasil);
      // echo '<pre>';
      //   print_r($hasil);
      //   exit;
      foreach ($hasil as $key => $value) {
        // print_r($value[$key]);
        $ok=@Actions::TrackingNik($value['nik']);
       
        if (!empty($ok)) {
          $keys = array_keys($ok);
      $desired_keys = array('NAMA_LGKP', 'RESPONSE_DESC');

      foreach($desired_keys as $desired_key){
         if(in_array($desired_key, $keys)) continue;  // already set
         $ok[$desired_key] = '';
      }
       // echo '<pre>';
       //  print_r($ok);
       //  exit;

          if (trim($ok['NAMA_LGKP'])==trim($value['nama'])) {
            Yii::$app->db->createCommand()->update('datanik', ['status' => 'valid','nama_ktp'=>$ok['NAMA_LGKP'],'tanggal_lahir'=>$ok['TGL_LHR'],'tempat_lahir'=>$ok['TMPT_LHR'],'jenis_kelamin'=>$ok['JENIS_KLMIN']], 'nik = "'.$value['nik'].'"')->execute();
          }else{
            if (!empty($ok['RESPONSE_DESC'])) {
              Yii::$app->db->createCommand()->update('datanik', ['status' => $ok['RESPONSE_DESC']], 'nik = "'.$value['nik'].'"')->execute();  
            }if (!empty($ok['NAMA_LGKP'])) {
              Yii::$app->db->createCommand()->update('datanik', ['status' => 'nama tidak sesuai','nama_ktp'=>$ok['NAMA_LGKP'],'tanggal_lahir'=>$ok['TGL_LHR'],'tempat_lahir'=>$ok['TMPT_LHR'],'jenis_kelamin'=>$ok['JENIS_KLMIN']], 'nik = "'.$value['nik'].'"')->execute();  
            }

          }
          
          // print_r($ok['NAMA_LGKP']);exit;  
        }else{
          Yii::$app->db->createCommand()->update('datanik', ['status' => 'tidak valid'], 'nik = "'.$value['nik'].'"')->execute();
        }
        
        // Yii::$app->db->createCommand()->update('tidakpadan', ['status' => 'valid'], 'nik = "'.$username.'"')->execute();
    }
    return 'berhasil diupdate';
    // return $hasil[0];
    // $sql = "update account set lastlogin = ".date('Y-m-d H:i:s')." where username = '".$username."'";
    // Yii::$app->db->createCommand()->update('tidakpadan', ['status' => 'valid'], 'nik = "'.$username.'"')->execute();
  }

  public function updatesinkrondata(){
      ini_set('precision', '16');
      $hasil = Actions::getQuery('select * from sinkrondata');
      foreach ($hasil as $key => $value) {
        $ok=@Actions::TrackingNik($value['nik_krt']);
       
        if (!empty($ok)) {
          $keys = array_keys($ok);
      $desired_keys = array('NAMA_LGKP', 'RESPONSE_DESC');

      foreach($desired_keys as $desired_key){
         if(in_array($desired_key, $keys)) continue;  // already set
         $ok[$desired_key] = '';
      }
          if (trim($ok['NAMA_LGKP'])==trim(strtoupper($value['nama_krt']))) {
            Yii::$app->db->createCommand()->update('sinkrondata', ['status_nik' => 'valid'], 'nik_krt = "'.$value['nik_krt'].'"')->execute();
          }else{
            if (!empty($ok['RESPONSE_DESC'])) {
              Yii::$app->db->createCommand()->update('sinkrondata', ['status_nik' => $ok['RESPONSE_DESC']], 'status_kependudukan = "'.$value['nik_krt'].'"')->execute();  
            }if (!empty($ok['NAMA_LGKP'])) {
              Yii::$app->db->createCommand()->update('sinkrondata', ['status_nik' => 'nama tidak sesuai','status_kependudukan'=>$ok['NAMA_LGKP']], 'nik_krt = "'.$value['nik_krt'].'"')->execute();  
            }

          } 
        }else{
          Yii::$app->db->createCommand()->update('sinkrondata', ['status_nik' => 'tidak valid'], 'nik_krt = "'.$value['nik_krt'].'"')->execute();
        }

    }
    return 'berhasil diupdate';
  }
  public function updatetable($table){
      ini_set('precision', '16');
      $hasil = Actions::getQuery('select * from '.$table.' where id between 70984 AND 82893');
      foreach ($hasil as $key => $value) {
        $ok=@Actions::TrackingNik($value['nik']);
       
        if (!empty($ok)) {
          $keys = array_keys($ok);  
      $desired_keys = array('NAMA_LGKP', 'RESPONSE_DESC');

      foreach($desired_keys as $desired_key){
         if(in_array($desired_key, $keys)) continue;  // already set
         $ok[$desired_key] = '';
      }
          if (trim($ok['NAMA_LGKP'])==trim(strtoupper($value['nama_penerima']))) {
            Yii::$app->db->createCommand()->update($table, ['status' => 'valid','nama_ktp'=> $ok['NAMA_LGKP'],'alamat'=> $ok['ALAMAT'],'tanggal_lahir'=> $ok['TGL_LHR'],'jenis_kelamin'=> $ok['JENIS_KLMIN']], 'nik = "'.$value['nik'].'"')->execute();
          }else{
            if (!empty($ok['RESPONSE_DESC'])) {
              Yii::$app->db->createCommand()->update($table, ['status' => $ok['RESPONSE_DESC']], 'nik = "'.$value['nik'].'"')->execute();  
            }if (!empty($ok['NAMA_LGKP'])) {
              Yii::$app->db->createCommand()->update($table, ['status' => 'nama tidak sesuai','nama_ktp'=> $ok['NAMA_LGKP'],'alamat'=> $ok['ALAMAT'],'tanggal_lahir'=> $ok['TGL_LHR'],'jenis_kelamin'=> $ok['JENIS_KLMIN']], 'nik = "'.$value['nik'].'"')->execute();  
            }
          } 
        }else{
          Yii::$app->db->createCommand()->update($table, ['status' => 'tidak valid'], 'nik= "'.$value['nik'].'"')->execute();
        }
    }
    return 'berhasil diupdate';
  }
 public function updatekarangtaruna(){
      ini_set('precision', '16');
      $hasil = Actions::getQuery('select * from karangtaruna');
      foreach ($hasil as $key => $value) {
        $ok=@Actions::TrackingNik($value['nik']);
       
        if (!empty($ok)) {
          $keys = array_keys($ok);
      $desired_keys = array('NAMA_LGKP', 'RESPONSE_DESC');

      foreach($desired_keys as $desired_key){
         if(in_array($desired_key, $keys)) continue;  // already set
         $ok[$desired_key] = '';
      }

          if (trim($ok['NAMA_LGKP'])==trim(strtoupper($value['nama']))) {
            Yii::$app->db->createCommand()->update('karangtaruna', ['status' => 'valid','nama_ktp'=>$ok['NAMA_LGKP'],'kecamatan_ktp'=>$ok['KEC_NAME'],'kelurahan_ktp'=>$ok['KEL_NAME']], 'nik = "'.$value['nik'].'"')->execute();
          }else{
            if (!empty($ok['RESPONSE_DESC'])) {
              Yii::$app->db->createCommand()->update('karangtaruna', ['status' => $ok['RESPONSE_DESC']], 'nik = "'.$value['nik'].'"')->execute();  
            }if (!empty($ok['NAMA_LGKP'])) {
              Yii::$app->db->createCommand()->update('karangtaruna', ['status' => 'nama tidak sesuai','nama_ktp'=>$ok['NAMA_LGKP'],'kecamatan_ktp'=>$ok['KEC_NAME'],'kelurahan_ktp'=>$ok['KEL_NAME']], 'nik = "'.$value['nik'].'"')->execute();  
            }
          }
        }else{
          Yii::$app->db->createCommand()->update('karangtaruna', ['status' => 'tidak valid'], 'nik = "'.$value['nik'].'"')->execute();
        }
    }
    return 'berhasil diupdate';
  }


    public function updatesemutcovid19(){
      ini_set('precision', '16');
      $hasil = Actions::getQuery('select * from semutcovid19 where id between 9494 AND 9916');
      // print_r($hasil);

      foreach ($hasil as $key => $value) {
        $ok=@Actions::TrackingNik($value['nik']);
        if (!empty($ok)) {
          $keys = array_keys($ok);
          $desired_keys = array('NAMA_LGKP_IBU', 'RESPONSE_DESC');

      foreach($desired_keys as $desired_key){
         if(in_array($desired_key, $keys)) continue;  // already set
         $ok[$desired_key] = '';
      }

          // if (trim($ok['NAMA_LGKP'])==trim($value['nama'])) {
          //   Yii::$app->db->createCommand()->update('semut_covid19', ['status' => 'valid'], 'nik = "'.$value['nik'].'"')->execute();
          // }else{
            if (!empty($ok['RESPONSE_DESC'])) {
              Yii::$app->db->createCommand()->update('semutcovid19', ['nama_ibu' => $ok['RESPONSE_DESC']], 'nik = "'.$value['nik'].'"')->execute();  
            }if (!empty($ok['NAMA_LGKP_IBU'])) {
              Yii::$app->db->createCommand()->update('semutcovid19', ['nama_ibu' => $ok['NAMA_LGKP_IBU']], 'nik = "'.$value['nik'].'"')->execute();  
            }

          // }
          
          // print_r($ok['NAMA_LGKP']);exit;  
        }else{
          Yii::$app->db->createCommand()->update('semutcovid19', ['nama_ibu' => 'nik tidak valid'], 'nik = "'.$value['nik'].'"')->execute();
        }
        
        // Yii::$app->db->createCommand()->update('tidakpadan', ['status' => 'valid'], 'nik = "'.$username.'"')->execute();
    }
    return 'berhasil diupdate';
  }

  public function updateusulanbansosapril2021(){
      ini_set('precision', '16');
      $hasil = Actions::getQuery('select * from usulan_bansos_april_2021 where id between 291 AND 651');
      // print_r($hasil);

      foreach ($hasil as $key => $value) {
        $ok=@Actions::TrackingNik($value['nik']);
        if (!empty($ok)) {
          $keys = array_keys($ok);
          $desired_keys = array('NAMA_LGKP_IBU', 'RESPONSE_DESC');

      foreach($desired_keys as $desired_key){
         if(in_array($desired_key, $keys)) continue;  // already set
         $ok[$desired_key] = '';
      }

          // if (trim($ok['NAMA_LGKP'])==trim($value['nama'])) {
          //   Yii::$app->db->createCommand()->update('semut_covid19', ['status' => 'valid'], 'nik = "'.$value['nik'].'"')->execute();
          // }else{
            if (!empty($ok['RESPONSE_DESC'])) {
              Yii::$app->db->createCommand()->update('usulan_bansos_april_2021', ['status' => $ok['RESPONSE_DESC']], 'nik = "'.$value['nik'].'"')->execute();  
            }if (!empty($ok['NAMA_LGKP_IBU'])) {
              Yii::$app->db->createCommand()->update('usulan_bansos_april_2021', ['kk' => $ok['NO_KK'],'nama_nik'=> $ok['NAMA_LGKP'],'nama_ibu'=> $ok['NAMA_LGKP_IBU'],'kecamatan_nik'=> $ok['KEC_NAME'],'kelurahan_nik'=> $ok['KEL_NAME'],'rt'=> $ok['NO_RT'],'rw'=> $ok['NO_RW'],'alamat'=> $ok['ALAMAT'],'tl'=> $ok['TMPT_LHR'],'tgl_lahir'=> $ok['TGL_LHR']], 'nik = "'.$value['nik'].'"')->execute();  
            }

          // }
          
          // print_r($ok['NAMA_LGKP']);exit;  
        }else{
          Yii::$app->db->createCommand()->update('usulan_bansos_april_2021', ['status' => 'nik tidak valid'], 'nik = "'.$value['nik'].'"')->execute();
        }
        
        // Yii::$app->db->createCommand()->update('tidakpadan', ['status' => 'valid'], 'nik = "'.$username.'"')->execute();
    }
    return 'berhasil diupdate';
  }
  public function updatebsttahap10(){
    ini_set('precision', '16');
    $hasil = Actions::getQuery('select * from bsttahap10 where id between 85115 AND 104037');
    foreach ($hasil as $key => $value) {
      $noidentitas = str_replace("'"," ",$value['no_identitas']);
      Yii::$app->db->createCommand()->update('bsttahap10', ['no_identitas2' => $noidentitas], 'id = "'.$value['id'].'"')->execute();
    }
    return 'berhasil diupdate';
  }

  public function updatesembarcovid19(){
      ini_set('precision', '16');
      $hasil = Actions::getQuery('select * from sembarcovid19 where id between 10257 AND 11498');
      // print_r($hasil);

      foreach ($hasil as $key => $value) {
        $ok=@Actions::TrackingNik($value['nik']);
        if (!empty($ok)) {
          $keys = array_keys($ok);
          $desired_keys = array('NAMA_LGKP_IBU', 'RESPONSE_DESC');

      foreach($desired_keys as $desired_key){
         if(in_array($desired_key, $keys)) continue;  // already set
         $ok[$desired_key] = '';
      }

            if (!empty($ok['RESPONSE_DESC'])) {
              Yii::$app->db->createCommand()->update('sembarcovid19', ['nama_ibu' => $ok['RESPONSE_DESC']], 'nik = "'.$value['nik'].'"')->execute();  
            }if (!empty($ok['NAMA_LGKP_IBU'])) {
              Yii::$app->db->createCommand()->update('sembarcovid19', ['nama_ibu' => $ok['NAMA_LGKP_IBU']], 'nik = "'.$value['nik'].'"')->execute();  
            }
        }else{
          Yii::$app->db->createCommand()->update('sembarcovid19', ['nama_ibu' => 'nik tidak valid'], 'nik = "'.$value['nik'].'"')->execute();
        }
    }
    return 'berhasil diupdate';
  }

  public function updatetambahandesember(){
      ini_set('precision', '16');
      $hasil = Actions::getQuery('select * from tambahandesember where id between 1 AND 31');
      // print_r($hasil);
      $no_kk=@Yii::$app->getRequest()->getQueryParam('nokk');

      foreach ($hasil as $key => $value) {
        $ok=@Actions::TrackingNokk($no_kk);
        $ok = json_decode($ok,true);
      $ok = json_encode($ok, JSON_PRETTY_PRINT);
        echo "<pre>";
      print_r($ok);
      echo "</pre>";
      exit;
        // return $ok;exit;
        if (!empty($ok)) {
          $keys = array_keys($ok);
          $desired_keys = array('NIK','JENIS_KLMIN', 'RESPONSE_DESC');
          
      foreach($desired_keys as $desired_key){
         if(in_array($desired_key, $keys)) continue;  // already set
         $ok[$desired_key] = '';
      }

            if (!empty($ok['RESPONSE_DESC'])) {
              Yii::$app->db->createCommand()->update('sembarcovid19', ['nama_ibu' => $ok['RESPONSE_DESC']], 'nik = "'.$value['nik'].'"')->execute();  
            }if (!empty($ok['NAMA_LGKP_IBU'])) {
              Yii::$app->db->createCommand()->update('sembarcovid19', ['nama_ibu' => $ok['NAMA_LGKP_IBU']], 'nik = "'.$value['nik'].'"')->execute();  
            }
        }else{
          Yii::$app->db->createCommand()->update('sembarcovid19', ['nama_ibu' => 'nik tidak valid'], 'nik = "'.$value['nik'].'"')->execute();
        }
    }
    return 'berhasil diupdate';
  }

  function hitung_umur($tanggal_lahir){
  $birthDate = new \DateTime($tanggal_lahir);
  $today = new \DateTime("today");
  // if ($birthDate > $today) { 
  //     exit("0 tahun 0 bulan 0 hari");
  // }
  $y = $today->diff($birthDate)->y;
  // $m = $today->diff($birthDate)->m;
  // $d = $today->diff($birthDate)->d;
  return $y;
}

  public function updatewarong(){
      ini_set('precision', '16');
      $hasil = Actions::getQuery('select * from warong');
      // print_r($hasil);

      foreach ($hasil as $key => $value) {
        $ok=@Actions::TrackingNik($value['nik']);
        if (!empty($ok)) {
          $keys = array_keys($ok);
          $desired_keys = array('TGL_LHR', 'RESPONSE_DESC');

      foreach($desired_keys as $desired_key){
         if(in_array($desired_key, $keys)) continue;  // already set
         $ok[$desired_key] = '';
      }

            if (!empty($ok['RESPONSE_DESC'])) {
              Yii::$app->db->createCommand()->update('warong', ['umur' => $ok['RESPONSE_DESC']], 'nik = "'.$value['nik'].'"')->execute();  
            }if (!empty($ok['TGL_LHR'])) {
              Yii::$app->db->createCommand()->update('warong', ['umur' => Actions::hitung_umur($ok['TGL_LHR'])], 'nik = "'.$value['nik'].'"')->execute();  
            }
        }else{
          Yii::$app->db->createCommand()->update('warong', ['umur' => 'nik tidak valid'], 'nik = "'.$value['nik'].'"')->execute();
        }
    }
    return 'berhasil diupdate';
  }
  public function dataniksuratketerangan($nik){
        $result=array();
        $result['Nik']=$nik;
        $result['Bansossembakotahap1']=Bansossembakotahap1::find()->where(['nik' => $nik])->exists();
        $result['Bansossembakotahap2']=Bansossembakotahap2::find()->where(['nik' => $nik])->exists();
        $result['Bansossembakotahap3']=Bansossembakotahap3::find()->where(['nik' => $nik])->exists();
        $result['Jpsprovinsijateng']=Jpsprovinsijateng::find()->where(['nik' => $nik])->exists();
        $result['Jpsprovinsijateng2']=Jpsprovinsijateng2::find()->where(['nik' => $nik])->exists();
        $result['Sembakobantuanpresiden']=Sembakobantuanpresiden::find()->where(['nik' => $nik])->exists();
        $result['Bstnondtks']=Bstnondtks::find()->where(['nik' => $nik])->exists();
        $result['Bstdtks']=Bstdtks::find()->where(['nik' => $nik])->exists();
        $result['Sembakoregulerkemensos']=Sembakoregulerkemensos::find()->where(['nik_ktp' => $nik])->exists();
        $result['Sembakoperluasankemensos']=Sembakoperluasankemensos::find()->where(['nik' => $nik])->exists();
        $result['Programpkhkemensos']=Programpkhkemensos::find()->where(['nik' => $nik])->exists();
        $result['BstJanuari2021']=BstJanuari2021::find()->where(['no_identitas' => $nik])->one();
        $result['Covid19']=Covid19::find()->where(['nik' => $nik]);
        $bdtart=Bdtart::find()->where(['NIK'=>$nik])->one();
        if (!empty($bdtart)) {
                  $bdtrt=Bdtrt::find()->where(['IDBDT'=>$bdtart->IDBDT])->one();
                  $result['bdtrt']=$bdtrt;
                  $result['kecamatan']=Kecamatan::find()->where(['KodeKecamatan'=>$bdtart->KDKEC])->one()->Nama;
                  $result['kelurahan']=Kelurahan::find()->where(['KodeKecamatan'=>$bdtart->KDKEC,'KodeKelurahan'=>$bdtart->KDDESA])->one()->Nama;
                }
        $result['bdtart']=$bdtart;
        $result['datadukcapil']=Actions::TrackingNik($nik);
        ini_set('precision', '16');
         // echo '<pre>';
         //        print_r($result['Bsttahap10']);
         //        exit;
        return $result;
    }

    public function surat($namasurat,$param=null){
        switch ($namasurat) {
            case 'viewsuratketerangan':
                $nik=@Yii::$app->getRequest()->getQueryParam('nik');
                $model=Actions::dataniksuratketerangan($nik);
                // $bdtart=Bdtart::find()->where(['NIK'=>$nik])->one();
                // if (!empty($bdtart)) {
                //   $bdtrt=Bdtrt::find()->where(['IDBDT'=>$bdtart->IDBDT])->one();
                // }
                // $datadukcapil=Actions::TrackingNik($nik);
                  return Actions::createreport($model,'Surat Keterangan-'.Yii::$app->getRequest()->getQueryParam('nik'),'_suratketerangan');
                break;

        }
    }
    

       public function createreport($model,$namefile,$nameview){
        // $model = Msupplier::find()->all();
        $pdf = new Pdf([
            'filename' => $namefile.'.pdf',
            'mode' => Pdf::MODE_CORE, // leaner size using standard fonts
            // 'mode' => Pdf::MODE_UTF8, // leaner size using standard fonts
            'destination' => Pdf::DEST_BROWSER,
            // 'destination'=>Pdf::DEST_DOWNLOAD,
            'format'=>Pdf::FORMAT_FOLIO,
            // A4 paper format
            // 'format' => Pdf::FORMAT_A4,
            'content' => Yii::$app->controller->renderPartial('@app/views/cetak-surat/'.$nameview,[
              'model' => $model,
          ]),
            // 'options' => [
            // // 'filename' => $data->kegiatan,
            //     // any mpdf options you wish to set
            // ],
            'methods' => [
                // 'SetTitle' => 'Privacy Policy - Krajee.com',
                // 'SetSubject' => 'Generating PDF files via yii2-mpdf extension has never been easy',
                // 'SetHeader' => ['Krajee Privacy Policy||Generated On: ' . date("r")],
                // 'SetFooter' => ['|Page {PAGENO}|'],
                // 'SetHeader' => $this->renderPartial('_header'),
                // 'SetAuthor' => 'Auliajati',
                // 'SetCreator' => 'Auliajati',
                // 'SetKeywords' => 'Krajee, Yii2, Export, PDF, MPDF, Output, Privacy, Policy, yii2-mpdf',
            ]
        ]);
        return $pdf->render();
    }


public function injectionProtect($input="")
{
        $input=htmlspecialchars(@$input); // bereskan special char nya
        $input=str_ireplace(['script'  ,'insert',  'update',  'delete',  'union',  'alter'   ],
                            ['[*script*]','[*insert*]','[*update*]','[*delete*]','[*union*]','[*alter*]' ],@$input);
        return @$input;
}

public function cekPassword($password) {
    // Cek panjang password
    if (strlen($password) < 12) {
        return false;
    }

    // Cek huruf besar, huruf kecil, angka, dan karakter khusus
    if (!preg_match('/[A-Z]/', $password) ||
        !preg_match('/[a-z]/', $password) ||
        !preg_match('/[0-9]/', $password) ||
        !preg_match('/[!@#$%^&*()-_+=~`{}|[\]:;"\'<>,.?\/]/', $password)) {
        return false;
    }

    // Jika semua syarat terpenuhi, kembalikan true
    return true;
}

public function cekMIMEType($file) {
    // Daftar ekstensi file yang diperbolehkan beserta MIME type-nya
    $allowedExtensions = array(
        'jpg' => 'image/jpeg',
        'jpeg' => 'image/jpeg',
        'png' => 'image/png',
        'gif' => 'image/gif',
        'pdf' => 'application/pdf',
        'xls' => 'application/vnd.ms-excel',
        'xlsx' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        'csv' => 'text/csv'
    );

    // Dapatkan ekstensi file
    $fileExtension = pathinfo($file['name'], PATHINFO_EXTENSION);

    // Periksa apakah ekstensi file diperbolehkan
    if (!array_key_exists(strtolower($fileExtension), $allowedExtensions)) {
        return false;
    }

    // Periksa MIME type menggunakan fungsi finfo_file()
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mimeType = finfo_file($finfo, $file['tmp_name']);
    finfo_close($finfo);

    // Periksa apakah MIME type sesuai dengan jenis file yang diperbolehkan
    if (strtolower($mimeType) === $allowedExtensions[strtolower($fileExtension)]) {
        return true;
    }

    return false;
}




}

// }
// public function updatenik($username,$id){
//       // $sql = "update account set lastlogin = ".date('Y-m-d H:i:s')." where username = '".$username."'";
//       Yii::$app->db->createCommand()->update('bstdtks', ['nik2' =>mysql_escape_string($nik), 'id = "'.$id.'"')->execute();
// }

// SELECT *
// FROM bdtart
// right outer JOIN bdtrt
// ON bdtart.IDBDT = bdtrt.IDBDT
// WHERE nik = '3302030511590001';

// http://localhost/gakin/web/index.php?r=site%2Fservicebynik2&nik=3302030511590001&token=2mdtjC2QPv_ard_UiiqQqMLyh-hXXLUAoQ7S65j_5boQo5r4wLM=

//http://localhost/gakin/web/index.php?r=site%2Fgeneratetoken&username=kominfo&password=kominfojos19
//http://sidaksos.semarangkota.go.id/index.php?r=site%2Fgeneratetoken&username=kominfo&password=kominfojos19
//http://sidaksos.semarangkota.go.id/index.php?r=site%2Fservicebynik2&nik=3302030511590001&token=2mdtjC2QPv_ard_UiiqQqMLyh-hXXLUAoQ7S65j_5boQo5r4wLM=
