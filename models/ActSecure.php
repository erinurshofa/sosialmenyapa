<?php

namespace app\models;
use app\models\Pendaftaran;
use app\models\Pemilik;
use app\models\Pemohon;
use app\models\Permohonan;
use app\models\Pembaharuan;
use app\models\Pembaharuan2;
use app\models\Modalsahamkoperasi;
use app\models\Modalsaham2;
use app\models\Dataumum;
use app\models\Datakoperasi;
use app\models\Legalitasperusahaan;    
use app\models\Pimpinanperusahaan; 
use app\models\Hubunganbank;
use app\models\Daftarsyarat;  
use app\models\Sk;
use app\models\Ijin;
use app\models\Izin;
use app\models\Actions;
use app\models\Jk;
use app\models\Kecamatan;
use app\models\Kelurahan;
use app\models\Administrasi;
use app\models\TemplateSurat;
use app\models\Tahapan;
use app\models\Liburan;
use yii\web\Session;
use app\models\Tabel;
use app\models\TabelSearch;
use app\models\UserSisdalap;
use app\models\Account;
use app\models\Nilai;
use app\models\Dokumen;
use app\models\Actionlib;
use app\models\Tdupbidang;
use app\models\Gudang;
use app\models\GudangSearch;
use app\models\Sektor;
use app\models\SektorSearch;
use app\models\Templateformpendaftaran;
use app\models\Digitalsignature;
use app\models\Digitalsignaturetrx;
use app\models\Log;
use dosamigos\qrcode\QrCode;
use kartik\mpdf\Pdf;
use \InvalidArgumentException;


use Yii;
// use DateTime;


/**
 * This is the model class for table "imb_pendaftaran".
 *
 * @property string $id
 * @property string $no_agenda
 * @property string $atas_nama
 * @property string $nama_usaha
 * @property string $lokasi
 * @property string $tgl_daftar
 * @property string $id_pem
 * @property string $id_milik
 * @property string $id_permohonan
 * @property string $status_pendaftaran
 * @property string $no_sk_lama
 * @property integer $status
 * @property string $lokasi_kecamatan
 * @property string $lokasi_kelurahan
 * @property string $username
 * @property string $timestamp
 * @property string $updater
 */
class ActSecure extends \yii\db\ActiveRecord
{
	//validasi dan sanitasi input untuk menghindari inputan pattern berbahaya seperti sql injection, sql, xss / php
	public static function validateInput($input) {
		$patterns = [
			// SQL Injection Patterns
			'/select\s/i',
			'/union\s/i',
			'/insert\s/i',
			'/update\s/i',
			'/delete\s/i',
			'/drop\s/i',
			'/truncate\s/i',
			'/create\s/i',
			'/alter\s/i',
			'/exec\s/i',
			'/execute\s/i',
			'/--/i',  // Single-line comment marker
			// '/#/',    // Hash comment marker (MySQL)
			// '/\*/',   // Multi-line comment marker (MySQL)
			'/;/',    // Semicolon statement terminator
	
			// Logical Operators (can be used for exploitation)
			'/\sor\s/i',
			'/\sand\s/i',
	
			// Tautologies (may indicate exploitation attempts)
			'/1\s*=\s*1/',
			'/0\s*=\s*0/',
	
			// Stored Procedure Calls (potential security risks)
			'/xp_cmdshell/i',
	
			// Performance-Impeding Techniques (can be used for denial-of-service attacks)
			'/benchmark/i',
			'/sleep/i',
	
			// Data Type Casting Functions (can be used for type juggling attacks)
			'/cast\s*\(/i',
			'/convert\s*\(/i',
	
			// Character Functions (can be used for encoding or code injection)
			'/char\s*\(/i',
			'/nchar\s*\(/i',
			'/varchar\s*\(/i',
			'/nvarchar\s*\(/i',
	
			// XSS Patterns
			'/<script\b[^>]>(.?)<\/script>/i',  // Script tags
			'/onerror\s*=\s*/i',                  // Error handler attribute
			'/onload\s*=\s*/i',                   // Onload event handler attribute
			'/<iframe\b[^>]>(.?)<\/iframe>/i',    // Iframe tags
			'/<img\b[^>]*src=["\']javascript:/i',  // Images with JavaScript source
			'/<a\b[^>]*href=["\']javascript:/i',  // Links with JavaScript href
			'/document\.cookie/i',                // Accessing document cookies
			'/document\.write/i',                 // Writing to the document
			'/window\.location/i',                // Modifying window location
			'/eval\s*\(/i',                        // Code evaluation function
			'/innerHTML/i',                       // Accessing or modifying inner HTML
			'/outerHTML/i',                       // Accessing or modifying outer HTML
	
			// PHP System Command Patterns (can be used for code execution)
			'/exec\s*\(/i',
			'/passthru\s*\(/i',
			'/shell_exec\s*\(/i',
			'/system\s*\(/i',
			'/popen\s*\(/i',
			'/proc_open\s*\(/i',
			'/pcntl_exec\s*\(/i',
	
			// Other PHP-related Exploit Patterns
			'/phpinfo\s*\(/i',        // Displaying PHP information (potential security leak)
			'/base64_decode\s*\(/i',  // Decoding base64-encoded data (can be used for code injection)
			'/base64_encode\s*\(/i',  // Encoding data in base64 (may be used for obfuscation)
			'/file_get_contents\s*\(/i', // Reading file contents (potential security risk)
			'/fopen\s*\(/i',           // Opening files (potential security risk)
			'/include\s*\(/i',         // Including PHP files (can be used for code injection)
			'/require\s*\(/i',         // Requiring PHP files (can be used for code injection)
			'/include_once\s*\(/i',    // Including a file once (can be used for code injection)
			'/require_once\s*\(/i'     // Requiring a file once (can be used for code injection)
		];
		// Check if input is a string
		if (is_string($input)) {
			foreach ($patterns as $pattern) {
				if (preg_match($pattern, $input)) {
					ActSecure::secureLog($pattern,$input);
					return false;  // Input contains a potential vulnerability
				}
			}
		}
	
		// Check if input is an array (e.g., $_POST, $_GET)
		if (is_array($input)) {
			foreach ($input as $value) {
				if (!ActSecure::validateInput($value)) {
					ActSecure::secureLog('',$input,$value);
					return false; // Recursive validation for nested arrays
				}
			}
			return true; // All elements in the array passed validation
		}
	
		// // Check if input is a $_FILES array
		// if (is_array($input) && isset($input['name'], $input['type'], $input['error'], $input['size'])) {
		// 	// Perform basic file validation here (optional)
		// 	// You can check for allowed file extensions, size limits, etc.
		// 	return true; // Assuming basic file validation is not required
		// }
	
		return true;  // Input
	}
	// untuk menyimpan inputan yang berbahaya untuk dipelajari lagi jika ternyata ada kemungkinan inputan tersebut tidak termasuk bahaya
	public static function secureLog($pattern='', $input='', $value=''){
		$created_at = date('Y-m-d H:i:s');
		print_r($input);exit;
		
		$command = Yii::$app->db->createCommand('
			INSERT INTO secure_log (pattern, input, value, created_at)
			VALUES (:pattern, :input, :value, :created_at)
		');
		
		$command->bindValue(':pattern', $pattern);
		$command->bindValue(':input', $input);
		$command->bindValue(':value', $value);
		$command->bindValue(':created_at', $created_at);
		
		$result = $command->execute();
	}
	// public function secureLog($pattern='',$input='',$value=''){
	// 	$created_at=date('Y-m-d H:i:s');
	// 	$sql="
	// 	   insert into secure_log (pattern,input,value,created_at) values ('".$pattern.
	// 		"','".$input.
	// 		"','".$value.
	// 		"','".$created_at.
	// 		"');";
	  
	// 	$result=@Yii::$app->db->createCommand($sql)->execute();
	// }
	//untuk masking data
	public static function maskString($string, $start = 2, $end = -2, $maskChar = '*')
    {
        $length = strlen($string);
        if ($length <= $end) {
            return $string;
        }
        return substr($string, 0, $start) . str_repeat($maskChar, $length - $start - $end) . substr($string, $end);
    }
	// untuk unmasking data
    public static function unmaskString($maskedString, $originalString)
    {
        return $originalString;
    }
	// enkripsi password
    public static function encryptPassword($var){
      $encrypted=base64_encode(base64_encode(base64_encode($var)));
      return $encrypted;
  	}
	//dekripsi password
  	public static function decryptPassword($encrypted){
      $decrypted=base64_decode(base64_decode(base64_decode($encrypted)));
      return $decrypted;
  	}
	// random masking
	public static function randomMask($string, $maskCount, $maskChar = '*') {
		$length = strlen($string);
		$maskPositions = array_rand(range(0, $length - 1), $maskCount);
		$masked = $string;
		foreach ($maskPositions as $position) {
			$masked = substr_replace($masked, $maskChar, $position, 1);
		}
		return $masked;
	}
	// simpan log activity
	public static function getActivityLog(){
		$sql="SELECT * FROM activity_log order by id desc";
		$params = []; // No parameters needed for this query
		$ver = @ActSecure::getQuery($sql, $params);
		return $ver;
	}
	// simpan log login
	public static function getLoginLog() {
		$sql = "SELECT * FROM login_log ORDER BY id DESC";
		$params = []; // No parameters needed for this query
		$ver = @ActSecure::getQuery($sql, $params);
		return $ver;
	}
	// query safe
	public static function getQuery($querysql, $params = []) {
		$connection = Yii::$app->getDB();
		$query = $connection->createCommand($querysql, $params);
		return $query->queryAll();
	}
	// cek password panjang 12 karakter mengandung huruf besar,kecil, angka dan karakter khusus - atau bisa diimplementasikan pada rules class form
	public static function cekPassword($password) {
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
	// extensi yang diperbolehkan upload
	public static function cekMIMEType($file) {
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

	public static function secureHeader($frame=true,$xss=true,$csp=false,$https=false,$ref=false,$mimesniff=false,$permission=false){
		if($frame)header('X-Frame-Options: DENY');// Prevents clickjacking attacks
		if($xss)header('X-XSS-Protection: 1; mode=block');// Enables XSS protection
		if($csp)header('Content-Security-Policy: default-src \'self\'; script-src \'self\' \'unsafe-inline\'');// Defines content security policy
		if($https)header('Strict-Transport-Security: max-age=31536000; includeSubDomains; preload'); // Enforces HTTPS
		if($ref)header('Referrer-Policy: strict-origin-when-cross-origin'); // Controls referrer information
		if($mimesniff)header('X-Content-Type-Options: nosniff'); // Prevents MIME sniffing
		if($permission)header('Permissions-Policy: accelerometer=(), camera=(), geolocation=(), microphone=(), gyroscope=(), magnetometer=(), clipboard-read=(), clipboard-write=(), gamepad=(), midi=(), payment=(), sync-storage=(), usb=(), vr=(), xr=()'); // Restricts permissions
		// Additional headers for specific security measures:
		// header('X-Powered-By:'); // Remove unnecessary information
		// header('Server:'); // Remove unnecessary information
	}
	

}

