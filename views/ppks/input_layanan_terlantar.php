<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

$this->title = 'Input Layanan & Status: PPKS Terlantar';
$this->params['breadcrumbs'][] = ['label' => 'PPKS', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$urlSearch = Url::to(['cari-ppks-layanan-ajax']);
?>

<style>
.section-card {
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    margin-bottom: 25px;
    border: 1px solid #e3e6f0;
}
.section-header {
    background: #f8f9fc;
    padding: 15px 20px;
    border-bottom: 1px solid #e3e6f0;
    border-top-left-radius: 8px;
    border-top-right-radius: 8px;
    font-weight: bold;
    color: #4e73df;
    font-size: 16px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.section-body {
    padding: 20px;
}
.table-cart {
    width: 100%;
}
.table-cart th {
    background: #4e73df;
    color: white;
    padding: 10px;
    text-align: left;
}
.table-cart td {
    padding: 10px;
    vertical-align: middle;
    border-bottom: 1px solid #e3e6f0;
}
.select2-container .select2-selection--multiple {
    min-height: 38px;
}
</style>

<div class="row">
    <div class="col-md-12">
        <div class="section-card">
            <div class="section-header">
                <span><i class="fa fa-search"></i> Pemilihan Kalayan (PPKS Terlantar)</span>
            </div>
            <div class="section-body">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" style="text-align:right; margin-top:8px;">Cari PPKS</label>
                    <div class="col-sm-8">
                        <select class="form-control" id="searchPpksSelect"></select>
                    </div>
                </div>
            </div>
        </div>

        <form id="mutakhirForm" method="POST" action="">
            <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>" />

            <div class="section-card">
                <div class="section-header">
                    <span><i class="fa fa-list"></i> Daftar Kalayan Terpilih</span>
                    <span class="badge" style="background:var(--primary-blue);" id="cartCount">0</span>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-cart" id="kalayanTable">
                        <thead>
                            <tr>
                                <th width="20%">Nama</th>
                                <th width="15%">NIK</th>
                                <th width="25%">Alamat</th>
                                <th width="30%">Jenis Layanan (Multi Select) <span class="text-danger">*</span></th>
                                <th width="10%" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Data Row Akan di-Append via JS -->
                            <tr id="emptyRow">
                                <td colspan="5" class="text-center text-muted" style="padding:40px;">
                                    <i>Keranjang kosong. Silakan cari dan pilih PPKS di atas.</i>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="section-card">
                <div class="section-header">
                    <span><i class="fa fa-check-square-o"></i> Status Keluar & Layanan Kolektif</span>
                </div>
                <div class="section-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Status Kalayan <span class="text-danger">*</span></label>
                                <?= Html::dropDownList('status_id', null, $listStatus, ['class' => 'form-control', 'prompt' => '-- Pilih Status --', 'required' => true]) ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Tanggal Masuk</label>
                                <input type="date" name="tanggal_masuk" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Tanggal Keluar / Dilayani <span class="text-danger">*</span></label>
                                <input type="date" name="tanggal_keluar" class="form-control" required value="<?= date('Y-m-d') ?>">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Keterangan Tambahan</label>
                                <textarea name="keterangan" class="form-control" rows="3" placeholder="Sebutkan detail rujukan atau informasi lainnya..."></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-footer text-right" style="padding:15px 20px; background:#f8f9fc; border-bottom-left-radius:8px; border-bottom-right-radius:8px;">
                     <a href="<?= Url::to(['input-layanan-terlantar']) ?>" class="btn btn-default"><i class="fa fa-ban"></i> Batal</a>
                     <button type="button" class="btn btn-primary" id="btnSimpan"><i class="fa fa-save"></i> Simpan Record Layanan</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php
$listLayananJson = json_encode($listLayanan);
$script = <<< JS
var listLayananOptions = $listLayananJson;
var cartIndex = 0;

$('#searchPpksSelect').select2({
    placeholder: 'Ketik NIK atau Nama Lengkap...',
    ajax: {
        url: '$urlSearch',
        dataType: 'json',
        delay: 250,
        data: function(params) {
            return {
                q: params.term
            };
        },
        processResults: function(data) {
            return {
                results: data.results
            };
        },
        cache: true
    },
    minimumInputLength: 3
});

$('#searchPpksSelect').on('select2:select', function (e) {
    var data = e.params.data;
    addToCart(data.id, data.nama, data.nik, data.alamat);
    $(this).val(null).trigger('change');
});

function addToCart(id, nama, nik, alamat) {
    if ($('#row_' + id).length > 0) {
        alert('PPKS ini sudah ada di dalam keranjang!');
        return;
    }

    $('#emptyRow').hide();
    
    var selectHtml = '<select class="form-control select2-layanan" name="kalayan[' + cartIndex + '][layanan][]" multiple="multiple" required style="width:100%;">';
    $.each(listLayananOptions, function(key, val) {
        selectHtml += '<option value="' + key + '">' + val + '</option>';
    });
    selectHtml += '</select>';

    var rowHtml = '<tr id="row_' + id + '">' +
        '<td><input type="hidden" name="kalayan[' + cartIndex + '][ppks_id]" value="' + id + '">' + '<strong>' + nama + '</strong></td>' +
        '<td><code>' + nik + '</code></td>' +
        '<td><small>' + alamat + '</small></td>' +
        '<td>' + selectHtml + '</td>' +
        '<td class="text-center"><button type="button" class="btn btn-danger btn-sm btn-hapus" onclick="removeFromCart(' + id + ')"><i class="fa fa-trash"></i> Hapus</button></td>' +
    '</tr>';

    $('#kalayanTable tbody').append(rowHtml);
    $('.select2-layanan').select2({ placeholder: 'Pilih 1 atau lebih layanan...' });
    
    cartIndex++;
    updateCount();
}

window.removeFromCart = function(id) {
    $('#row_' + id).remove();
    updateCount();
    if ($('#kalayanTable tbody tr').length == 1) { // Only empty row left
        $('#emptyRow').show();
    }
}

function updateCount() {
    var count = $('#kalayanTable tbody tr[id^="row_"]').length;
    $('#cartCount').text(count);
}

$('#btnSimpan').on('click', function() {
    var count = $('#kalayanTable tbody tr[id^="row_"]').length;
    if (count === 0) {
        alert('Keranjang kalayan masih kosong! Silakan cari dan tambahkan PPKS.');
        return;
    }
    
    // Check if select2-layanan is required and filled
    var valid = true;
    $('.select2-layanan').each(function() {
        if (!$(this).val() || $(this).val().length === 0) {
            alert('Semua kalayan harus minimal diplih satu jenis layanan!');
            $(this).select2('open');
            valid = false;
            return false;
        }
    });

    if(!valid) return;

    if (!$('select[name="status_id"]').val()) {
        alert('Status Kalayan wajib dipilih!');
        $('select[name="status_id"]').focus();
        return;
    }
    
    if (confirm('Anda yakin ingin menyimpan data layanan masal ini?')) {
        $('#mutakhirForm').submit();
    }
});
JS;
$this->registerJs($script);
?>
