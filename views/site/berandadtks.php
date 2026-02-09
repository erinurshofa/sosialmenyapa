<?php
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use app\models\Actions;
use app\models\RekapDtksKecamatan;
use app\models\Dokumen;
use miloschuman\highcharts\Highcharts;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use kartik\export\ExportMenu;
$session=Yii::$app->session;
// $dashboard=Actions::listrekapdashboard();
$gridColumnsExportData = [
  [
      'label'=>'KECAMATAN',
      'attribute'=>'kecamatan',
       'value'=>function($model) { return $model->kecamatan; }
  ],
  'jumlah_individu',
  'jumlah_keluarga',
  'jumlah_perbaikan',
  [
      'label'=>'Periode',
      'attribute'=>'periode',
  ],
];
$gridColumns= [
  ['class' => 'kartik\grid\SerialColumn'],
  [
      'label'=>'KECAMATAN',
      'attribute'=>'kecamatan',
      'format' => 'html',
       'value'=>function($model) { return $model->kecamatan; }
  ],
  [
    'label'=>'Jumlah Individu',
    'attribute'=>'jumlah_individu',
    'format' => 'html',
     'value'=>function($model) { return number_format($model->jumlah_individu,0,",","."); }
],
[
    'label'=>'Jumlah Keluarga',
    'attribute'=>'jumlah_keluarga',
    'format' => 'html',
     'value'=>function($model) { return number_format($model->jumlah_keluarga,0,",","."); }
],
[
    'label'=>'Jumlah Perbaikan',
    'attribute'=>'jumlah_perbaikan',
    'format' => 'html',
     'value'=>function($model) { return number_format($model->jumlah_perbaikan,0,",","."); }
],
  // 'jumlah_individu',
  // 'jumlah_keluarga',
  // 'jumlah_perbaikan',
  [
      'label'=>'Periode',
      'attribute'=>'periode',
      'format'=>'html',
      'value'=>function($model){
        return Yii::$app->formatter->asDate($model->periode, 'php:d F Y');
      }
  ],
];
$this->title = 'BERANDA DTKS';
?>
<?php
$surat= Dokumen::find()->where(['username'=>@Yii::$app->user->identity->username])->andWhere(['status'=>'proses'])->andWhere(['kategori_dokumen'=>'Surat Permohonan Data'])->one();
$ba= Dokumen::find()->where(['username'=>@Yii::$app->user->identity->username])->andWhere(['status'=>'proses'])->andWhere(['kategori_dokumen'=>'Berita Acara Serah Terima'])->one();
if (null!==$ba) {
?>
<style type="text/css">
.box {
    border-radius: 2px;
    position: relative;
    display: block;
    margin-bottom: 20px;
    box-shadow: 0 1px 1px rgb(0 0 0 / 10%);
    background-color:#ff851b; 
}
</style>
<div class="alert alert-success alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  <h4><i class="icon fa fa-warning"></i> Info!</h4>
  Permohonan Bast sedang diperiksa. Mohon Tunggu!
</div>
<?php
}
?>
<?php if (null!==$surat): ?>
  <div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-warning"></i> Info!</h4>
    Permohonan Data sedang diperiksa. Mohon Tunggu!
  </div>
<?php endif ?>

<div class="box box-navy box-solid" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
  <div class="box-header bg-navy">
      <i class="fa fa-fw fa-book"></i>
      <strong>BERANDA DTKS</strong>
  </div>
  <div class="box-body">
  <?= $this->render('../rekap-dtks-kecamatan/_searchajax', ['model' => $searchModel]); ?>

<div class="row">
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box bg-aqua" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);cursor: pointer;border-radius: 25px;">
      <span class="info-box-icon" style="border-bottom-left-radius: 25px;border-top-left-radius: 25px;"><i class="fa fa-map-marker"></i></span>
      <div class="info-box-content">
        <span class="info-box-number">Kota Semarang</span>
        <span class="info-box-text">
          Wilayah
        </span>
      </div>
    </div>
  </div>
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box bg-green" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);cursor: pointer;border-radius: 25px;">
      <span class="info-box-icon" style="border-bottom-left-radius: 25px;border-top-left-radius: 25px;"><i class="fa fa-thumbs-o-up"></i></span>
      <div class="info-box-content">
        <span class="info-box-number">Jumlah Individu</span>
        <span id="jml_individu" class="info-box-text">
          -
        </span>
      </div>
    </div>
  </div>
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box bg-yellow" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);cursor: pointer;border-radius: 25px;">
      <span class="info-box-icon" style="border-bottom-left-radius: 25px;border-top-left-radius: 25px;"><i class="fa fa-calendar"></i></span>
      <div class="info-box-content">
        <span class="info-box-number">Jumlah Keluarga</span>
        <span id="jml_keluarga" class="info-box-text">
          -
        </span>
      </div>
    </div>
  </div>
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box bg-red" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);cursor: pointer;border-radius: 25px;">
      <span class="info-box-icon" style="border-bottom-left-radius: 25px;border-top-left-radius: 25px;"><i class="fa fa-check-square-o"></i></span>
      <div class="info-box-content">
        <span class="info-box-number">Jumlah Perbaikan</span>
        <span id="jml_perbaikan" class="info-box-text">
          -
        </span>
      </div>
    </div>
  </div>
</div>
<div id="search-results">
    <!-- Search results will be displayed here -->
</div>
      <?php
      // echo GridView::widget([
      //   'dataProvider'=> $dataProvider,
      //   // 'filterModel' => $searchModel,
      //   'columns' => $gridColumns,
      //   'responsive'=>true,
      //   'pjax' => true,
      //   'hover'=>true,
      //   'pager' => [
      //       'options'=>['class'=>'pagination'],   // set clas name used in ui list of pagination
      //       'prevPageLabel' => 'Previous',   // Set the label for the "previous" page button
      //       'nextPageLabel' => 'Next',   // Set the label for the "next" page button
      //       'firstPageLabel'=>'First',   // Set the label for the "first" page button
      //       'lastPageLabel'=>'Last',    // Set the label for the "last" page button
      //       'nextPageCssClass'=>'next',    // Set CSS class for the "next" page button
      //       'prevPageCssClass'=>'prev',    // Set CSS class for the "previous" page button
      //       'firstPageCssClass'=>'first',    // Set CSS class for the "first" page button
      //       'lastPageCssClass'=>'last',    // Set CSS class for the "last" page button
      //       'maxButtonCount'=>10,    // Set maximum number of page buttons that can be displayed
      //       ],
      // ]);
      ?>
  </div>
</div>

<?php
$script = <<< JS
$(document).ready(function () {
  function formatNumber(number) {
    return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}
    $('#rekapdtkskecamatansearch-kecamatan, #rekapdtkskecamatansearch-periode').on('change', function () {
        var kecamatan = $('#rekapdtkskecamatansearch-kecamatan').val();
        var periode = $('#rekapdtkskecamatansearch-periode').val();
        var url = 'index.php?r=rekap-dtks-kecamatan/search';// Replace with your actual controller/action URL
        var urlhitung = 'index.php?r=rekap-dtks-kecamatan/hitung';
        // if (periode === null || periode.length === 0) {
        //     // console.log('Select2 is empty');
        //     // Perform actions when Select2 is empty
        // } else {
            $.ajax({
              url: urlhitung,
              data: { kecamatan: kecamatan,periode: periode }, // Replace with your actual controller/action URL
              type: 'GET',
              dataType: 'json',
              success: function (data) {
                $('#jml_individu').text(formatNumber(data.jumlah_individu));
                $('#jml_keluarga').text(formatNumber(data.jumlah_keluarga));
                $('#jml_perbaikan').text(formatNumber(data.jumlah_perbaikan));
                  // var html = '';
                  // // Process the data and generate HTML content
                  // for (var key in data) {
                  //     if (data.hasOwnProperty(key)) {
                  //         html += '<p>' + key + ': ' + data[key] + '</p>';
                  //     }
                  // }
                  
                  // $('#data-container').html(html); // Update the data container with the generated HTML
              },
              error: function (xhr, status, error) {
                  console.error(error);
              }
          });

        $.ajax({
            type: 'GET',
            url: url,
            data: { kecamatan: kecamatan, periode: periode },
            success: function (data) {
                $('#search-results').html(data); // Update the results container with new data
            }
        });
    });
});

JS;
$this->registerJs($script);
?>