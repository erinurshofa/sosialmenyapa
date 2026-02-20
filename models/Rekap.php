<?php

namespace app\models;

use Yii;
use yii\db\Query;
use yii\web\Session;
use app\models\Account;
use app\models\Actions;
use yii\helpers\Html;
use yii\helpers\Json;
use app\models\ActionLib;
use yii\helpers\Url;
use kartik\mpdf\Pdf;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;
use yii\db\ActiveQuery;
use app\models\Bansossembakotahap1;
use app\models\Bansossembakotahap2;
use app\models\Bansossembakotahap3;
use app\models\Jpsprovinsijateng;
use app\models\Jpsprovinsijateng2;
use app\models\Sembakobantuanpresiden;
use app\models\Bstnondtks;
use app\models\Bstdtks;
use app\models\Sembakoregulerkemensos;
use app\models\Sembakoperluasankemensos;
use app\models\Programpkhkemensos;
use app\models\Covid19;
use app\models\Bsttahap10;
use app\models\BstJanuari2021;
use app\models\BstMeiJuni2021;
use app\models\BspJanuari2021;
use app\models\BspSeptember2021;
use app\models\PkhJanuari2021;
use app\models\PkhAgustus2021;
use app\models\Kecamatan;
class Rekap extends \yii\db\ActiveRecord
{
  public static function getRekapPpksKecamatan2() {
    $data = [];
    
    // Ambil data kecamatan
    $kecamatan = Actions::getQuery('SELECT * FROM kecamatan');
    
    // Ambil data PPKS dalam satu query dengan GROUP BY
    $ppksData = Yii::$app->db->createCommand("
        SELECT kecamatan,
            COUNT(*) AS ppks,
            SUM(jenis_kelamin = 'LAKI-LAKI') AS pria,
            SUM(jenis_kelamin = 'PEREMPUAN') AS perempuan,
            SUM(anak_balita_terlantar = 1) AS anak_balita_terlantar,
            SUM(anak_terlantar = 1) AS anak_terlantar,
            SUM(anak_yang_berhadapan_dengan_hukum = 1) AS anak_yang_berhadapan_dengan_hukum,
            SUM(anak_jalanan = 1) AS anak_jalanan,
            SUM(anak_dengan_kedisabilitasan = 1) AS anak_dengan_kedisabilitasan,
            SUM(anak_korban_tindak_kekerasan = 1) AS anak_korban_tindak_kekerasan,
            SUM(anak_yang_memerlukan_perlindungan_khusus = 1) AS anak_yang_memerlukan_perlindungan_khusus,
            SUM(lanjut_usia_terlantar = 1) AS lanjut_usia_terlantar,
            SUM(penyandang_disabilitas = 1) AS penyandang_disabilitas,
            SUM(tuna_susila = 1) AS tuna_susila,
            SUM(gelandangan = 1) AS gelandangan,
            SUM(pengemis = 1) AS pengemis,
            SUM(pemulung = 1) AS pemulung,
            SUM(kelompok_minoritas = 1) AS kelompok_minoritas,
            SUM(bekas_warga_binaan_lembaga_pemasyarakatan = 1) AS bekas_warga_binaan_lembaga_pemasyarakatan,
            SUM(orang_dengan_hivaids = 1) AS orang_dengan_hivaids,
            SUM(korban_penyalahgunaan_napza = 1) AS korban_penyalahgunaan_napza,
            SUM(korban_trafficking = 1) AS korban_trafficking,
            SUM(korban_tindak_kekerasan = 1) AS korban_tindak_kekerasan,
            SUM(pekerja_migran_bermasalah_sosial = 1) AS pekerja_migran_bermasalah_sosial,
            SUM(korban_bencana_alam = 1) AS korban_bencana_alam,
            SUM(korban_bencana_sosial = 1) AS korban_bencana_sosial,
            SUM(perempuan_rawan_sosial_ekonomi = 1) AS perempuan_rawan_sosial_ekonomi,
            SUM(fakir_miskin = 1) AS fakir_miskin,
            SUM(keluarga_bermasalah_sosial_psikologis = 1) AS keluarga_bermasalah_sosial_psikologis,
            SUM(komunitas_adat_terpencil = 1) AS komunitas_adat_terpencil
        FROM ppks
        GROUP BY kecamatan
    ")->queryAll();

    // Ubah hasil query ke dalam bentuk array dengan kecamatan sebagai kunci
    $ppksMap = [];
    foreach ($ppksData as $row) {
        $ppksMap[$row['kecamatan']] = $row;
    }

    // Gabungkan data kecamatan dengan data PPKS
    foreach ($kecamatan as $key => $value) {
        $namaKecamatan = strtoupper($value['nama']);
        $data[$key] = array_merge($value, $ppksMap[$namaKecamatan] ?? [
            'ppks' => 0,
            'pria' => 0,
            'perempuan' => 0,
            'anak_balita_terlantar' => 0,
            'anak_terlantar' => 0,
            'anak_yang_berhadapan_dengan_hukum' => 0,
            'anak_jalanan' => 0,
            'anak_dengan_kedisabilitasan' => 0,
            'anak_korban_tindak_kekerasan' => 0,
            'anak_yang_memerlukan_perlindungan_khusus' => 0,
            'lanjut_usia_terlantar' => 0,
            'penyandang_disabilitas' => 0,
            'tuna_susila' => 0,
            'gelandangan' => 0,
            'pengemis' => 0,
            'pemulung' => 0,
            'kelompok_minoritas' => 0,
            'bekas_warga_binaan' => 0,
            'orang_dengan_hivaids' => 0,
            'korban_napza' => 0,
            'korban_trafficking' => 0,
            'korban_tindak_kekerasan' => 0,
            'pekerja_migran' => 0,
            'korban_bencana_alam' => 0,
            'korban_bencana_sosial' => 0,
            'perempuan_rawan' => 0,
            'fakir_miskin' => 0,
            'keluarga_bermasalah' => 0,
            'komunitas_adat' => 0,
        ]);
    }

    return $data;
}

public static function getRekapPpksKelurahan2() {
  $data = [];
  
  // Ambil data kelurahan
  $kelurahan = Actions::getQuery('SELECT * FROM kelurahan');
  
  // Ambil data PPKS dalam satu query dengan GROUP BY
  $ppksData = Yii::$app->db->createCommand("
      SELECT kecamatan, kelurahan,
          COUNT(*) AS ppks,
          SUM(jenis_kelamin = 'LAKI-LAKI') AS pria,
          SUM(jenis_kelamin = 'PEREMPUAN') AS perempuan,
          SUM(anak_balita_terlantar = 1) AS anak_balita_terlantar,
          SUM(anak_terlantar = 1) AS anak_terlantar,
          SUM(anak_yang_berhadapan_dengan_hukum = 1) AS anak_yang_berhadapan_dengan_hukum,
          SUM(anak_jalanan = 1) AS anak_jalanan,
          SUM(anak_dengan_kedisabilitasan = 1) AS anak_dengan_kedisabilitasan,
          SUM(anak_korban_tindak_kekerasan = 1) AS anak_korban_tindak_kekerasan,
          SUM(anak_yang_memerlukan_perlindungan_khusus = 1) AS anak_yang_memerlukan_perlindungan_khusus,
          SUM(lanjut_usia_terlantar = 1) AS lanjut_usia_terlantar,
          SUM(penyandang_disabilitas = 1) AS penyandang_disabilitas,
          SUM(tuna_susila = 1) AS tuna_susila,
          SUM(gelandangan = 1) AS gelandangan,
          SUM(pengemis = 1) AS pengemis,
          SUM(pemulung = 1) AS pemulung,
          SUM(kelompok_minoritas = 1) AS kelompok_minoritas,
          SUM(bekas_warga_binaan_lembaga_pemasyarakatan = 1) AS bekas_warga_binaan_lembaga_pemasyarakatan,
          SUM(orang_dengan_hivaids = 1) AS orang_dengan_hivaids,
          SUM(korban_penyalahgunaan_napza = 1) AS korban_penyalahgunaan_napza,
          SUM(korban_trafficking = 1) AS korban_trafficking,
          SUM(korban_tindak_kekerasan = 1) AS korban_tindak_kekerasan,
          SUM(pekerja_migran_bermasalah_sosial = 1) AS pekerja_migran_bermasalah_sosial,
          SUM(korban_bencana_alam = 1) AS korban_bencana_alam,
          SUM(korban_bencana_sosial = 1) AS korban_bencana_sosial,
          SUM(perempuan_rawan_sosial_ekonomi = 1) AS perempuan_rawan_sosial_ekonomi,
          SUM(fakir_miskin = 1) AS fakir_miskin,
          SUM(keluarga_bermasalah_sosial_psikologis = 1) AS keluarga_bermasalah_sosial_psikologis,
          SUM(komunitas_adat_terpencil = 1) AS komunitas_adat_terpencil
      FROM ppks
      GROUP BY kecamatan, kelurahan
  ")->queryAll();
  
  // Ubah hasil query ke dalam bentuk array dengan kelurahan sebagai kunci
  $ppksMap = [];
  foreach ($ppksData as $row) {
      $ppksMap[$row['kelurahan']] = $row;
  }
  
  // Gabungkan data kelurahan dengan data PPKS
  foreach ($kelurahan as $key => $value) {
      $namaKelurahan = strtoupper($value['nama']);
      $data[$key] = array_merge($value, $ppksMap[$namaKelurahan] ?? array_fill_keys([
          'ppks', 'pria', 'perempuan', 'anak_balita_terlantar', 'anak_terlantar', 'anak_yang_berhadapan_dengan_hukum',
          'anak_jalanan', 'anak_dengan_kedisabilitasan', 'anak_korban_tindak_kekerasan',
          'anak_yang_memerlukan_perlindungan_khusus', 'lanjut_usia_terlantar', 'penyandang_disabilitas',
          'tuna_susila', 'gelandangan', 'pengemis', 'pemulung', 'kelompok_minoritas',
          'bekas_warga_binaan', 'orang_dengan_hivaids', 'korban_napza', 'korban_trafficking',
          'korban_tindak_kekerasan', 'pekerja_migran', 'korban_bencana_alam', 'korban_bencana_sosial',
          'perempuan_rawan', 'fakir_miskin', 'keluarga_bermasalah', 'komunitas_adat'
      ], 0));
  }
  
  return $data;
}


  public static function getRekapPpksKecamatan(){
    // Variabel untuk menampung data hasil query
    $data = []; 
    // Mendapatkan data kecamatan
    $kecamatan = Actions::getQuery('SELECT * FROM kecamatan');
    // Melakukan perulangan untuk setiap kecamatan dan menghitung data PPKS
    foreach ($kecamatan as $key => $value) {
        // Menambahkan data kecamatan ke dalam array $data
        $data[$key] = $value;
        // Menghitung jumlah PPKS berdasarkan kecamatan
        $data[$key]['ppks'] = Ppks::find()->where(['kecamatan' => strtoupper($value['nama'])])->count();
        // Menghitung jumlah PPKS berdasarkan jenis kelamin pria
        $data[$key]['pria'] = Ppks::find()->where(['kecamatan' => strtoupper($value['nama']), 'jenis_kelamin' => 'LAKI-LAKI'])->count();
        // Menghitung jumlah PPKS berdasarkan jenis kelamin perempuan
        $data[$key]['perempuan'] = Ppks::find()->where(['kecamatan' => strtoupper($value['nama']), 'jenis_kelamin' => 'PEREMPUAN'])->count();
        // $data[$key]['anak_terlantar'] = Ppks::find()->where(['kecamatan' => strtoupper($value['nama']), 'anak_terlantar' => 1])->count();
        $data[$key]['anak_balita_terlantar'] = Ppks::find()->where(['kecamatan' => strtoupper($value['nama']), 'anak_balita_terlantar' => 1])->count();
        $data[$key]['anak_terlantar'] = Ppks::find()->where(['kecamatan' => strtoupper($value['nama']), 'anak_terlantar' => 1])->count();
        $data[$key]['anak_yang_berhadapan_dengan_hukum'] = Ppks::find()->where(['kecamatan' => strtoupper($value['nama']), 'anak_yang_berhadapan_dengan_hukum' => 1])->count();
        $data[$key]['anak_jalanan'] = Ppks::find()->where(['kecamatan' => strtoupper($value['nama']), 'anak_jalanan' => 1])->count();
        $data[$key]['anak_dengan_kedisabilitasan'] = Ppks::find()->where(['kecamatan' => strtoupper($value['nama']), 'anak_dengan_kedisabilitasan' => 1])->count();
        $data[$key]['anak_korban_tindak_kekerasan'] = Ppks::find()->where(['kecamatan' => strtoupper($value['nama']), 'anak_korban_tindak_kekerasan' => 1])->count();
        $data[$key]['anak_yang_memerlukan_perlindungan_khusus'] = Ppks::find()->where(['kecamatan' => strtoupper($value['nama']), 'anak_yang_memerlukan_perlindungan_khusus' => 1])->count();
        $data[$key]['lanjut_usia_terlantar'] = Ppks::find()->where(['kecamatan' => strtoupper($value['nama']), 'lanjut_usia_terlantar' => 1])->count();
        $data[$key]['penyandang_disabilitas'] = Ppks::find()->where(['kecamatan' => strtoupper($value['nama']), 'penyandang_disabilitas' => 1])->count();
        $data[$key]['tuna_susila'] = Ppks::find()->where(['kecamatan' => strtoupper($value['nama']), 'tuna_susila' => 1])->count();
        $data[$key]['gelandangan'] = Ppks::find()->where(['kecamatan' => strtoupper($value['nama']), 'gelandangan' => 1])->count();
        $data[$key]['pengemis'] = Ppks::find()->where(['kecamatan' => strtoupper($value['nama']), 'pengemis' => 1])->count();
        $data[$key]['pemulung'] = Ppks::find()->where(['kecamatan' => strtoupper($value['nama']), 'pemulung' => 1])->count();
        $data[$key]['kelompok_minoritas'] = Ppks::find()->where(['kecamatan' => strtoupper($value['nama']), 'kelompok_minoritas' => 1])->count();
        $data[$key]['bekas_warga_binaan_lembaga_pemasyarakatan'] = Ppks::find()->where(['kecamatan' => strtoupper($value['nama']), 'bekas_warga_binaan_lembaga_pemasyarakatan' => 1])->count();
        $data[$key]['orang_dengan_hivaids'] = Ppks::find()->where(['kecamatan' => strtoupper($value['nama']), 'orang_dengan_hivaids' => 1])->count();
        $data[$key]['korban_penyalahgunaan_napza'] = Ppks::find()->where(['kecamatan' => strtoupper($value['nama']), 'korban_penyalahgunaan_napza' => 1])->count();
        $data[$key]['korban_trafficking'] = Ppks::find()->where(['kecamatan' => strtoupper($value['nama']), 'korban_trafficking' => 1])->count();
        $data[$key]['korban_tindak_kekerasan'] = Ppks::find()->where(['kecamatan' => strtoupper($value['nama']), 'korban_tindak_kekerasan' => 1])->count();
        $data[$key]['pekerja_migran_bermasalah_sosial'] = Ppks::find()->where(['kecamatan' => strtoupper($value['nama']), 'pekerja_migran_bermasalah_sosial' => 1])->count();
        $data[$key]['korban_bencana_alam'] = Ppks::find()->where(['kecamatan' => strtoupper($value['nama']), 'korban_bencana_alam' => 1])->count();
        $data[$key]['korban_bencana_sosial'] = Ppks::find()->where(['kecamatan' => strtoupper($value['nama']), 'korban_bencana_sosial' => 1])->count();
        $data[$key]['perempuan_rawan_sosial_ekonomi'] = Ppks::find()->where(['kecamatan' => strtoupper($value['nama']), 'perempuan_rawan_sosial_ekonomi' => 1])->count();
        $data[$key]['fakir_miskin'] = Ppks::find()->where(['kecamatan' => strtoupper($value['nama']), 'fakir_miskin' => 1])->count();
        $data[$key]['keluarga_bermasalah_sosial_psikologis'] = Ppks::find()->where(['kecamatan' => strtoupper($value['nama']), 'keluarga_bermasalah_sosial_psikologis' => 1])->count();
        $data[$key]['komunitas_adat_terpencil'] = Ppks::find()->where(['kecamatan' => strtoupper($value['nama']), 'komunitas_adat_terpencil' => 1])->count();

    }
    return $data;
  }

  public static function getRekapPpksKelurahan(){
    // Variabel untuk menampung data hasil query
    $data = []; 
    // Mendapatkan data kecamatan
    $kelurahan = Actions::getQuery('SELECT a.nama AS kelurahan, b.nama AS kecamatan FROM kelurahan a INNER JOIN kecamatan b ON a.kecamatan_id=b.id');
    // Melakukan perulangan untuk setiap kecamatan dan menghitung data PPKS
    foreach ($kelurahan as $key => $value) {
      $namaKelurahan = strtoupper($value['kelurahan']);
      $namaKecamatan = strtoupper($value['kecamatan']);

      $ppks = @Ppks::find()->where(['kelurahan' => $namaKelurahan,'kecamatan'=>$namaKecamatan])->count();
      $pria = @Ppks::find()->where(['kelurahan' => $namaKelurahan,'kecamatan'=>$namaKecamatan, 'jenis_kelamin' => 'LAKI-LAKI'])->count();
      $perempuan = @Ppks::find()->where(['kelurahan' => $namaKelurahan,'kecamatan'=>$namaKecamatan, 'jenis_kelamin' => 'PEREMPUAN'])->count();
      $anak_balita_terlantar = @Ppks::find()->where(['kelurahan' => $namaKelurahan, 'kecamatan' => $namaKecamatan, 'anak_balita_terlantar' => 1])->count();
      $anak_terlantar = @Ppks::find()->where(['kelurahan' => $namaKelurahan, 'kecamatan' => $namaKecamatan, 'anak_terlantar' => 1])->count();
      $anak_yang_berhadapan_dengan_hukum = @Ppks::find()->where(['kelurahan' => $namaKelurahan, 'kecamatan' => $namaKecamatan, 'anak_yang_berhadapan_dengan_hukum' => 1])->count();
      $anak_jalanan = @Ppks::find()->where(['kelurahan' => $namaKelurahan, 'kecamatan' => $namaKecamatan, 'anak_jalanan' => 1])->count();
      $anak_dengan_kedisabilitasan = @Ppks::find()->where(['kelurahan' => $namaKelurahan, 'kecamatan' => $namaKecamatan, 'anak_dengan_kedisabilitasan' => 1])->count();
      $anak_korban_tindak_kekerasan = @Ppks::find()->where(['kelurahan' => $namaKelurahan, 'kecamatan' => $namaKecamatan, 'anak_korban_tindak_kekerasan' => 1])->count();
      $anak_yang_memerlukan_perlindungan_khusus = @Ppks::find()->where(['kelurahan' => $namaKelurahan, 'kecamatan' => $namaKecamatan, 'anak_yang_memerlukan_perlindungan_khusus' => 1])->count();
      $lanjut_usia_terlantar = @Ppks::find()->where(['kelurahan' => $namaKelurahan, 'kecamatan' => $namaKecamatan, 'lanjut_usia_terlantar' => 1])->count();
      $penyandang_disabilitas = @Ppks::find()->where(['kelurahan' => $namaKelurahan, 'kecamatan' => $namaKecamatan, 'penyandang_disabilitas' => 1])->count();
      $tuna_susila = @Ppks::find()->where(['kelurahan' => $namaKelurahan, 'kecamatan' => $namaKecamatan, 'tuna_susila' => 1])->count();
      $gelandangan = @Ppks::find()->where(['kelurahan' => $namaKelurahan, 'kecamatan' => $namaKecamatan, 'gelandangan' => 1])->count();
      $pengemis = @Ppks::find()->where(['kelurahan' => $namaKelurahan, 'kecamatan' => $namaKecamatan, 'pengemis' => 1])->count();
      $pemulung = @Ppks::find()->where(['kelurahan' => $namaKelurahan, 'kecamatan' => $namaKecamatan, 'pemulung' => 1])->count();
      $kelompok_minoritas = @Ppks::find()->where(['kelurahan' => $namaKelurahan, 'kecamatan' => $namaKecamatan, 'kelompok_minoritas' => 1])->count();
      $bekas_warga_binaan_lembaga_pemasyarakatan = @Ppks::find()->where(['kelurahan' => $namaKelurahan, 'kecamatan' => $namaKecamatan, 'bekas_warga_binaan_lembaga_pemasyarakatan' => 1])->count();
      $orang_dengan_hivaids = @Ppks::find()->where(['kelurahan' => $namaKelurahan, 'kecamatan' => $namaKecamatan, 'orang_dengan_hivaids' => 1])->count();
      $korban_penyalahgunaan_napza = @Ppks::find()->where(['kelurahan' => $namaKelurahan, 'kecamatan' => $namaKecamatan, 'korban_penyalahgunaan_napza' => 1])->count();
      $korban_trafficking = @Ppks::find()->where(['kelurahan' => $namaKelurahan, 'kecamatan' => $namaKecamatan, 'korban_trafficking' => 1])->count();
      $korban_tindak_kekerasan = @Ppks::find()->where(['kelurahan' => $namaKelurahan, 'kecamatan' => $namaKecamatan, 'korban_tindak_kekerasan' => 1])->count();
      $pekerja_migran_bermasalah_sosial = @Ppks::find()->where(['kelurahan' => $namaKelurahan, 'kecamatan' => $namaKecamatan, 'pekerja_migran_bermasalah_sosial' => 1])->count();
      $korban_bencana_alam = @Ppks::find()->where(['kelurahan' => $namaKelurahan, 'kecamatan' => $namaKecamatan, 'korban_bencana_alam' => 1])->count();
      $korban_bencana_sosial = @Ppks::find()->where(['kelurahan' => $namaKelurahan, 'kecamatan' => $namaKecamatan, 'korban_bencana_sosial' => 1])->count();
      $perempuan_rawan_sosial_ekonomi = @Ppks::find()->where(['kelurahan' => $namaKelurahan, 'kecamatan' => $namaKecamatan, 'perempuan_rawan_sosial_ekonomi' => 1])->count();
      $fakir_miskin = @Ppks::find()->where(['kelurahan' => $namaKelurahan, 'kecamatan' => $namaKecamatan, 'fakir_miskin' => 1])->count();
      $keluarga_bermasalah_sosial_psikologis = @Ppks::find()->where(['kelurahan' => $namaKelurahan, 'kecamatan' => $namaKecamatan, 'keluarga_bermasalah_sosial_psikologis' => 1])->count();
      $komunitas_adat_terpencil = @Ppks::find()->where(['kelurahan' => $namaKelurahan, 'kecamatan' => $namaKecamatan, 'komunitas_adat_terpencil' => 1])->count();


      $data[$key] = [
          'nama' => $value['kelurahan'],
          'kecamatan' => $value['kecamatan'],
          'ppks' => isset($ppks) ? $ppks : 0,
          'pria' => isset($pria) ? $pria : 0,
          'perempuan' => isset($perempuan) ? $perempuan : 0,
          'anak_balita_terlantar' => isset($anak_balita_terlantar) ? $anak_balita_terlantar : 0,
          'anak_terlantar' => isset($anak_terlantar) ? $anak_terlantar : 0,
          'anak_yang_berhadapan_dengan_hukum' => isset($anak_yang_berhadapan_dengan_hukum) ? $anak_yang_berhadapan_dengan_hukum : 0,
          'anak_jalanan' => isset($anak_jalanan) ? $anak_jalanan : 0,
          'anak_dengan_kedisabilitasan' => isset($anak_dengan_kedisabilitasan) ? $anak_dengan_kedisabilitasan : 0,
          'anak_korban_tindak_kekerasan' => isset($anak_korban_tindak_kekerasan) ? $anak_korban_tindak_kekerasan : 0,
          'anak_yang_memerlukan_perlindungan_khusus' => isset($anak_yang_memerlukan_perlindungan_khusus) ? $anak_yang_memerlukan_perlindungan_khusus : 0,
          'lanjut_usia_terlantar' => isset($lanjut_usia_terlantar) ? $lanjut_usia_terlantar : 0,
          'penyandang_disabilitas' => isset($penyandang_disabilitas) ? $penyandang_disabilitas : 0,
          'tuna_susila' => isset($tuna_susila) ? $tuna_susila : 0,
          'gelandangan' => isset($gelandangan) ? $gelandangan : 0,
          'pengemis' => isset($pengemis) ? $pengemis : 0,
          'pemulung' => isset($pemulung) ? $pemulung : 0,
          'kelompok_minoritas' => isset($kelompok_minoritas) ? $kelompok_minoritas : 0,
          'bekas_warga_binaan_lembaga_pemasyarakatan' => isset($bekas_warga_binaan_lembaga_pemasyarakatan) ? $bekas_warga_binaan_lembaga_pemasyarakatan : 0,
          'orang_dengan_hivaids' => isset($orang_dengan_hivaids) ? $orang_dengan_hivaids : 0,
          'korban_penyalahgunaan_napza' => isset($korban_penyalahgunaan_napza) ? $korban_penyalahgunaan_napza : 0,
          'korban_trafficking' => isset($korban_trafficking) ? $korban_trafficking : 0,
          'korban_tindak_kekerasan' => isset($korban_tindak_kekerasan) ? $korban_tindak_kekerasan : 0,
          'pekerja_migran_bermasalah_sosial' => isset($pekerja_migran_bermasalah_sosial) ? $pekerja_migran_bermasalah_sosial : 0,
          'korban_bencana_alam' => isset($korban_bencana_alam) ? $korban_bencana_alam : 0,
          'korban_bencana_sosial' => isset($korban_bencana_sosial) ? $korban_bencana_sosial : 0,
          'perempuan_rawan_sosial_ekonomi' => isset($perempuan_rawan_sosial_ekonomi) ? $perempuan_rawan_sosial_ekonomi : 0,
          'fakir_miskin' => isset($fakir_miskin) ? $fakir_miskin : 0,
          'keluarga_bermasalah_sosial_psikologis' => isset($keluarga_bermasalah_sosial_psikologis) ? $keluarga_bermasalah_sosial_psikologis : 0,
          'komunitas_adat_terpencil' => isset($komunitas_adat_terpencil) ? $komunitas_adat_terpencil : 0,
      ];
    }
    return $data;
  }

  public static function getListJenisPMKS(){
    $jenis = Actions::getQuery('SELECT * from jenis_pmks');
    $n=0;
    $data=array();
    foreach ($jenis as $value) {
      $data[$n]['kode']=$value['kode'];
      $data[$n]['jumlah']=Ppks::find()->where([$value['kode']=>1])->count();
      $n++;
    }
    return @$data;
  }

  public static function getRekapJenisPMKS(){
    $jenis = Actions::getQuery('SELECT * from jenis_pmks');
    $sql="select ";
    $n=0;
    $j=count($jenis);
    foreach ($jenis as $value) {
      $n++;
      $sql.="COUNT(IF(".$value['kode']." = 1, ".$value['kode'].", NULL)) as ".$value['kode']." ";
      if($n<$j){
        $sql.=", ";
      }
    }
    $sql.="FROM ppks";
    $result['ppks_jenis_pmks']=@Yii::$app->db->createCommand($sql)->queryAll();
    return @$result;
  }
  public static function getRekapJenisPMKSPerKecamatan(){
    $jenis = Actions::getQuery('SELECT * from jenis_pmks');
    $sql="select kecamatan";
    foreach ($jenis as $value) {
      $sql.=", COUNT(IF(".$value['kode']." = 1, ".$value['kode'].", NULL)) as ".$value['kode']." ";
    }
    $sql.="FROM ppks GROUP BY kecamatan";
    // echo '<pre>';print_r($sql);exit;
    $result['ppks_jenis_pmks_perkecamatan']=@Yii::$app->db->createCommand($sql)->queryAll();
    return @$result;
  }
  public static function getRekapJenisPMKSPerKelurahan($kecamatan){
    $jenis = Actions::getQuery('SELECT * from jenis_pmks');
    $kecamatan=strtoupper($kecamatan);
    $sql="select kecamatan,kelurahan";
    foreach ($jenis as $value) {
      $sql.=", COUNT(IF(".$value['kode']." = 1 and kecamatan='".$kecamatan."', ".$value['kode'].", NULL)) as ".$value['kode']." ";
    }
    $sql.="FROM ppks where kecamatan='".$kecamatan."' GROUP BY kelurahan";
    $result['ppks_jenis_pmks_perkelurahan']=@Yii::$app->db->createCommand($sql)->queryAll();
    return @$result;
    
  }
  public static function statistikProgramBantuan(){
    $jenis = Actions::getQuery('SELECT * from jenis_pmks');
    $sql="select kecamatan";
    foreach ($jenis as $value) {
      $sql.=", COUNT(IF(".$value['kode']." = 1, ".$value['kode'].", NULL)) as ".$value['kode']." ";
    }
    $sql.="FROM ppks GROUP BY kecamatan";
    $result['program_bantuan']=@Yii::$app->db->createCommand($sql)->queryAll();
    $result['title']='JUMLAH DTKS PROGRAM BANTUAN PER OKTOBER 2020 PERKECAMATAN SEKOTA SEMARANG';
    $result['title_statuskks']='<h1>JUMLAH DTKS STATUS KKS PER OKTOBER 2020 PERKECAMATAN SEKOTA SEMARANG</h1>';
    $result['title_pie']='Presentase Program Bantuan';
    $result['subtitle']='Sumber: Data Terpadu Kesejahteraan Sosial';
    $result['yaxis']='Jumlah Program Bantuan';
    return @$result;
  }
  public static function statistikJenisPpksFix($kecamatan=null,$kelurahan=null){
    $sql='SELECT jenis_ppks_fix, COUNT(*) as jumlah, ';
    if(!empty($kecamatan) && empty($kelurahan)){
      $sql.='ROUND((COUNT(*) * 100.0 / (SELECT COUNT(*) FROM ppks WHERE kecamatan="'.$kecamatan.'")), 2) AS persentase';
      $sql.=' FROM ppks WHERE kecamatan="'.$kecamatan.'"';
    }else if(!empty($kecamatan) && !empty($kelurahan)){
      $sql.='ROUND((COUNT(*) * 100.0 / (SELECT COUNT(*) FROM ppks WHERE kecamatan="'.$kecamatan.'" AND kelurahan="'.$kelurahan.'")), 2) AS persentase';
      $sql.=' FROM ppks WHERE kecamatan="'.$kecamatan.'" AND kelurahan="'.$kelurahan.'"';
    }else{
      $sql.='ROUND((COUNT(*) * 100.0 / (SELECT COUNT(*) FROM ppks)), 2) AS persentase';
      $sql.=' FROM ppks';
    }
    $sql.=' GROUP BY jenis_ppks_fix ORDER BY jumlah DESC';
    
    $result['jenis_ppks_fix']=@Yii::$app->db->createCommand($sql)->queryAll();
    $result['title']='JUMLAH JENIS PPKS SEKOTA SEMARANG';
    $result['title_statuskks']='<h1>JUMLAH JENIS PPKS SEKOTA SEMARANG</h1>';
    $result['title_pie']='PRESENTASE JENIS PPKS';
    $result['subtitle']='SUMBER: DATA TERPADU KESEJAHTERAAN SOSIAL';
    $result['yaxis']='JUMLAH JENIS PPKS';
    return @$result;
  }
  public static function statistikJenisPpks(){
    $sql='SELECT DISTINCT jenis_ppks_fix FROM ppks';
    $jenis = Actions::getQuery($sql);
    $sql2="select kecamatan";
    foreach ($jenis as $key => $value) {
      if(empty($value['jenis_ppks_fix'])) continue;
      $sql2.=", COUNT(IF(jenis_ppks_fix = '".$value['jenis_ppks_fix']."', jenis_ppks_fix, NULL)) as ".Rekap::formatString($value['jenis_ppks_fix'])." ";
    }
    $sql2.="FROM ppks GROUP BY kecamatan";
    $result['jenis_ppks_fix']=@Yii::$app->db->createCommand($sql2)->queryAll();
    return @$result;
  }

  public static function statistikJenisPpksKecamatan($kecamatan){
    $sql='SELECT DISTINCT jenis_ppks_fix FROM ppks';
    $jenis = Actions::getQuery($sql);
    $sql2="select kecamatan, kelurahan";
    foreach ($jenis as $key => $value) {
      if(empty($value['jenis_ppks_fix'])) continue;
      $sql2.=", COUNT(IF(jenis_ppks_fix = '".$value['jenis_ppks_fix']."' and kecamatan='".$kecamatan."', jenis_ppks_fix, NULL)) as ".Rekap::formatString($value['jenis_ppks_fix'])." ";
    }   
    $sql2.="FROM ppks where kecamatan='".$kecamatan."' GROUP BY kelurahan";
    $result['jenis_ppks_fix']=@Yii::$app->db->createCommand($sql2)->queryAll();
    return @$result;
    // echo '<pre>';print_r($sql2);exit;
  }
  public static function formatString($string) {
    // Ubah spasi menjadi underscore
    $string = str_replace(' ', '_', $string);
    // Hapus tanda kurung
    $string = str_replace(['(', ')'], '', $string);
    // Ubah menjadi lowercase
    return strtolower($string);
  }

  public static function fullPpks($kecamatan = null, $kelurahan = null) {
    $where = [];
    if ($kecamatan) {
      $where[] = "kecamatan = '" . strtoupper(addslashes($kecamatan)) . "'";
    }
    if ($kelurahan) {
      $where[] = "kelurahan = '" . strtoupper(addslashes($kelurahan)) . "'";
    }
    $whereSql = '';
    if (!empty($where)) {
      $whereSql = 'WHERE ' . implode(' AND ', $where);
    }

    $sql = "SELECT 
        CURDATE() AS periode, 
        COALESCE(kecamatan, 'TOTAL') AS kecamatan, 
        COALESCE(kelurahan, 'SUBTOTAL') AS kelurahan,
        COUNT(*) AS ppks,
        SUM(masuk_dtks = 1) AS dtks,
        SUM(CASE WHEN masuk_dtks = 0 OR masuk_dtks IS NULL THEN 1 ELSE 0 END) AS non_dtks,
        SUM(punya_ktp = 1) AS ktp,
        SUM(CASE WHEN punya_ktp = 0 OR punya_ktp IS NULL THEN 1 ELSE 0 END) AS non_ktp,
        SUM(jenis_kelamin = 'LAKI-LAKI') AS pria,
        SUM(jenis_kelamin = 'PEREMPUAN') AS perempuan,
        -- Kategori PPKS lainnya
        SUM(anak_balita_terlantar = 1) AS anak_balita_terlantar,
        SUM(anak_terlantar = 1) AS anak_terlantar,
        SUM(anak_yang_berhadapan_dengan_hukum = 1) AS anak_yang_berhadapan_dengan_hukum,
        SUM(anak_jalanan = 1) AS anak_jalanan,
        SUM(anak_dengan_kedisabilitasan = 1) AS anak_dengan_kedisabilitasan,
        SUM(anak_korban_tindak_kekerasan = 1) AS anak_korban_tindak_kekerasan,
        SUM(anak_yang_memerlukan_perlindungan_khusus = 1) AS anak_yang_memerlukan_perlindungan_khusus,
        SUM(lanjut_usia_terlantar = 1) AS lanjut_usia_terlantar,
        SUM(penyandang_disabilitas = 1) AS penyandang_disabilitas,
        SUM(tuna_susila = 1) AS tuna_susila,
        SUM(gelandangan = 1) AS gelandangan,
        SUM(pengemis = 1) AS pengemis,
        SUM(pemulung = 1) AS pemulung,
        SUM(kelompok_minoritas = 1) AS kelompok_minoritas,
        SUM(bekas_warga_binaan_lembaga_pemasyarakatan = 1) AS bekas_warga_binaan_lembaga_pemasyarakatan,
        SUM(orang_dengan_hivaids = 1) AS orang_dengan_hivaids,
        SUM(korban_penyalahgunaan_napza = 1) AS korban_penyalahgunaan_napza,
        SUM(korban_trafficking = 1) AS korban_trafficking,
        SUM(korban_tindak_kekerasan = 1) AS korban_tindak_kekerasan,
        SUM(pekerja_migran_bermasalah_sosial = 1) AS pekerja_migran_bermasalah_sosial,
        SUM(korban_bencana_alam = 1) AS korban_bencana_alam,
        SUM(korban_bencana_sosial = 1) AS korban_bencana_sosial,
        SUM(perempuan_rawan_sosial_ekonomi = 1) AS perempuan_rawan_sosial_ekonomi,
        SUM(fakir_miskin = 1) AS fakir_miskin,
        SUM(keluarga_bermasalah_sosial_psikologis = 1) AS keluarga_bermasalah_sosial_psikologis,
        SUM(komunitas_adat_terpencil = 1) AS komunitas_adat_terpencil,
        -- Kategori Baru
        SUM(stunting = 1) AS stunting,
        SUM(tbc = 1) AS tbc,
        SUM(p3ke = 1) AS p3ke,
        SUM(ibu_nifas = 1) AS ibu_nifas,
        SUM(ibu_hamil = 1) AS ibu_hamil,
        SUM(anak_yatim = 1) AS anak_yatim,
        SUM(calon_pengantin = 1) AS calon_pengantin
      FROM ppks
      $whereSql
      GROUP BY kecamatan, kelurahan WITH ROLLUP;";
    $result['full_ppks'] = @Yii::$app->db->createCommand($sql)->queryAll();
    return @$result;
  }
}