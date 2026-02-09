<?php 

function human_filesize($bytes, $decimals = 2)
{
  $size = ['B', 'kB', 'MB', 'GB', 'TB', 'PB'];
  $factor = floor((strlen($bytes) - 1) / 3);

  return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) .
      @$size[$factor];
}

function indonesian_date ($timestamp = '', $date_format = 'j F Y') {
        if (trim ($timestamp) == '')
        {
                $timestamp = time ();
        }
        elseif (!ctype_digit ($timestamp))
        {
            $timestamp = strtotime ($timestamp);
        }
        # remove S (st,nd,rd,th) there are no such things in indonesia :p
        $date_format = preg_replace ("/S/", "", $date_format);
        $pattern = array (
            '/Mon[^day]/','/Tue[^sday]/','/Wed[^nesday]/','/Thu[^rsday]/',
            '/Fri[^day]/','/Sat[^urday]/','/Sun[^day]/','/Monday/','/Tuesday/',
            '/Wednesday/','/Thursday/','/Friday/','/Saturday/','/Sunday/',
            '/Jan[^uary]/','/Feb[^ruary]/','/Mar[^ch]/','/Apr[^il]/','/May/',
            '/Jun[^e]/','/Jul[^y]/','/Aug[^ust]/','/Sep[^tember]/','/Oct[^ober]/',
            '/Nov[^ember]/','/Dec[^ember]/','/January/','/February/','/March/',
            '/April/','/June/','/July/','/August/','/September/','/October/',
            '/November/','/December/',
        );
        $replace = array ( 'Sen','Sel','Rab','Kam','Jum','Sab','Min',
            'Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu',
            'Jan','Feb','Mar','Apr','Mei','Jun','Jul','Ags','Sep','Okt','Nov','Des',
            'Januari','Februari','Maret','April','Juni','Juli','Agustus','Sepember',
            'Oktober','November','Desember',
        );
        $date = date ($date_format, $timestamp);
        $date = preg_replace ($pattern, $replace, $date);
        $date = "{$date}";
        return $date;
}
function hitung_umur($tanggal_lahir){
    $birthDate = new DateTime($tanggal_lahir);
    $today = new DateTime("today");
    if ($birthDate > $today) { 
        exit("0");
    }
    $y = $today->diff($birthDate)->y;
    $m = $today->diff($birthDate)->m;
    $d = $today->diff($birthDate)->d;
    return $y;
}
function get_domain()
{
  //the variable $domain can be set to the domain your application is running from. 
    $domain = "http://sidaksos.semarangkota.go.id/";
    return $domain;
}
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
function check_url($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, 1);
    curl_setopt($ch , CURLOPT_RETURNTRANSFER, 1);
    $data = curl_exec($ch);
    $headers = curl_getinfo($ch);
    curl_close($ch);
    return $headers['http_code'];
}
function check_url2($url) {
   $headers = @get_headers( $url);
   $headers = (is_array($headers)) ? implode( "\n ", $headers) : $headers;
   return (bool)preg_match('#^HTTP/.*\s+[(200|301|302)]+\s#i', $headers);
}
function getAge($date)
{
    $dob = new \DateTime($date);   
    $now = new \DateTime();
    $difference = $now->diff($dob);
    $age = $difference->y;
    return  $age;
}
function getCsvDelimeter($file)
{
    if (($handle = fopen($file, "r")) !== FALSE) {
        $delimiters = array(',', ';', '|', ':'); //Put all that need check
        foreach ($delimiters AS $item) {
            //fgetcsv() return array with unique index if not found the delimiter
            if (count(fgetcsv($handle, 0, $item, '"')) > 1) {
                $delimiter = $item;
                break;
            }
        }
    }
    return (isset($delimiter) ? $delimiter : null);
}
function formatRupiah($angka)
{
    $formattedValue = number_format($angka, 0, ',', '.');
    $formattedValue = 'Rp. ' . $formattedValue.',00';
    return $formattedValue;
}
function totalPerHari($pendapatanperbulan,$jumlahanggota){
    if($jumlahanggota===0 || empty($jumlahanggota)){return $pendapatanperbulan/30/1;}else{return $pendapatanperbulan/30/$jumlahanggota;}
}
function statusMiskin($totalperhari){
    // if(empty($totalperhari)){
    //     $status_kemiskinan="Tidak Terdefinisi";
    // }
    if($totalperhari <= 10739){
        $status_kemiskinan="Kemiskinan Ekstrem";
      }
      if($totalperhari > 10739 && $totalperhari <= 15750){
        $status_kemiskinan="Kemiskinan Nasional";
      }
      if($totalperhari > 15750){
        $status_kemiskinan="Diatas Kemiskinan";
      }
      return $status_kemiskinan;
}
function calculateGrahamNumber($earningsPerShare, $bookValuePerShare) {
    $multiplier = 15; // Sesuaikan dengan preferensi Anda
    return sqrt(22.5 * $earningsPerShare * $bookValuePerShare);
}
function encryptPassword($var){
    $encrypted=base64_encode(base64_encode(base64_encode($var)));
    return $encrypted;
  }
  function decryptPassword($encrypted){
    $decrypted=base64_decode(base64_decode(base64_decode($encrypted)));
    return $decrypted;
  }
?>