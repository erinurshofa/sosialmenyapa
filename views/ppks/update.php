<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use app\models\JenisPmks;
use app\models\JenisPmksKriteria;
use app\models\Ppks;
use app\models\DataPpksForm;
use app\models\Provinsi;
use kartik\select2\Select2;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;
use yii\web\JsExpression;
$this->title = 'Edit Data PPKS';
$this->params['breadcrumbs'][] = ['label' => 'Data PPKS', 'url' => ['listdata']];
$this->params['breadcrumbs'][] = $this->title;
// $model=Ppks::findOne($id);
$model2=new DataPpksForm();
$model2->alamat_ktp=$model->alamat;
$model2->provinsi_ktp=$model->provinsi_id;
$model2->kota_ktp=$model->kota_id;
$model2->kecamatan_ktp=$model->kecamatan_id;
$model2->kelurahan_ktp=$model->kelurahan_id;
$model2->rt_ktp=$model->rt;
$model2->rw_ktp=$model->rw;
$model->provinsi_domisili=$model->provinsi_domisili_id;
$model->kota_domisili=$model->kota_domisili_id;
$model->kecamatan_domisili=$model->kecamatan_domisili_id;
$model->kelurahan_domisili=$model->kelurahan_domisili_id;
// echo '<pre>';
// print_r($model->provinsi_domisili_id);exit;
// echo '<pre>';
// print_r($model2);exit;
?>
<div class="box box-navy box-solid mt-2" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
    <div class="box-header bg-navy p-2">
        <i class="fa fa-fw fa-book"></i>
        <strong><?=$this->title?></strong>
    </div>
    <div class="box-body p-2">

<div class="mt-4">
    <div class="card shadow-lg rounded-3">
        <!-- <div class="card-header bg-primary text-white text-center">
            <h4>Form Data PPKS</h4>
        </div> -->
        <div class="card-body">
            <?php $form = ActiveForm::begin(['options' => ['class' => 'needs-validation', 'novalidate' => true]]); ?>
            <div class="box box-navy box-solid" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                <div class="box-header bg-white p-2">
                    <i class="fa fa-fw fa-book"></i>
                    <strong>IDENTITAS</strong>
                </div>
                <div class="box-body p-2">
                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($model, 'nama')->textInput(['placeholder' => 'Masukkan Nama Lengkap']) ?>
                        <?= $form->field($model, 'nik')->textInput(['maxlength' => 16, 'placeholder' => 'Masukkan NIK'])->label('NOMOR INDUK KEPENDUDUKAN (NIK)') ?>
                        <?= $form->field($model, 'no_kk')->textInput(['maxlength' => 16, 'placeholder' => 'Masukkan KK'])->label('NOMOR KARTU KELUARGA (KK)') ?>
                        
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'punya_ktp')->dropDownList($model2->punyaKtp(), ['prompt' => 'Pilih Kepemilikan KTP']) ?>
                        <?= $form->field($model, 'masuk_dtks')->dropDownList($model2->masukDTKS(), ['prompt' => 'Pilih Status DTKS']) ?>
                        <?= $form->field($model, 'jenis_kelamin')->dropDownList($model2->listJenisKelamin(), ['prompt' => 'Pilih Jenis Kelamin']) ?>
                        <?= $form->field($model, 'khusus_penyandang_disabilitas')->dropDownList($model2->khususPenyandangDisabilitas(), ['prompt' => 'Pilih Status Disabilitas']) ?>
                        
                    </div>
                </div>
                </div>
            </div>
            
            <div class="box box-navy box-solid" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                <div class="box-header bg-white p-2">
                    <i class="fa fa-fw fa-book"></i>
                    <strong>ISI SESUAI ALAMAT DAN DOMISILI</strong>
                </div>
                <div class="box-body p-2">
            <div class="row">
                <div class="col-md-6">
                <?= $form->field($model2, 'alamat_ktp')->textarea(['rows' => 2, 'placeholder' => 'Masukkan Alamat KTP']) ?>
                <?php
                //  $form->field($model, 'kecamatan_ktp')->widget(Select2::classname(), [
                //     'data' => \yii\helpers\ArrayHelper::map(Kecamatan::find()->all(), 'id', 'nama'),
                //     'options' => ['placeholder' => 'Pilih Kecamatan', 'id' => 'select-kecamatan-ktp'],
                //     'pluginOptions' => [
                //         'allowClear' => true
                //     ],
                // ]) 
                ?>
                <?php 
                    // Provinsi (Dropdown utama)
                    echo $form->field($model2, 'provinsi_ktp')->widget(Select2::classname(), [
                        'data' =>  \yii\helpers\ArrayHelper::map(Provinsi::find()->all(), 'id', 'nama'),
                        'options' => ['id' => 'provinsi-ktp'],
                        'pluginOptions' => ['allowClear' => true, 'placeholder' => 'Pilih Provinsi ...'],
                    ]);

                    // Kota (Dependent Dropdown)
                    echo $form->field($model2, 'kota_ktp')->widget(DepDrop::classname(), [
                        'options' => ['id' => 'kota-ktp'],
                        'type' => DepDrop::TYPE_SELECT2,
                        'pluginOptions' => [
                            'depends' => ['provinsi-ktp'],
                            'placeholder' => 'Pilih Kota ...',
                            'url' => Url::to(['ppks/get-kota']),
                            'initialize' => true, // 🔥 Pastikan data ter-load saat edit
                            'params' => ['provinsi-ktp'], // 🔥 Kirim parameter provinsi_id
                        ],
                    ]);

                    // Kecamatan (Dependent Dropdown)
                    echo $form->field($model2, 'kecamatan_ktp')->widget(DepDrop::classname(), [
                        'options' => ['id' => 'kecamatan-ktp'],
                        'type' => DepDrop::TYPE_SELECT2,
                        'pluginOptions' => [
                            'depends' => ['kota-ktp'],
                            'placeholder' => 'Pilih Kecamatan ...',
                            'url' => Url::to(['ppks/get-kecamatan']),
                            'initialize' => true, // 🔥 Pastikan data ter-load saat edit
                            'params' => ['kota-ktp'], // 🔥 Kirim parameter kota_id
                        ],
                    ]);

                    // Kelurahan (Dependent Dropdown)
                    echo $form->field($model2, 'kelurahan_ktp')->widget(DepDrop::classname(), [
                        'options' => ['id' => 'kelurahan-ktp'],
                        'type' => DepDrop::TYPE_SELECT2,
                        'pluginOptions' => [
                            'depends' => ['kecamatan-ktp'],
                            'placeholder' => 'Pilih Kelurahan ...',
                            'url' => Url::to(['ppks/get-kelurahan']),
                            'initialize' => true, // 🔥 Pastikan data ter-load saat edit
                            'params' => ['kecamatan-ktp'], // 🔥 Kirim parameter kecamatan_id
                        ],
                    ]);
                ?>
                    <?php //$form->field($model, 'kecamatan_ktp')->textInput(['placeholder' => 'Masukkan Kecamatan']) ?>
                    <?php //$form->field($model, 'kelurahan_ktp')->textInput(['placeholder' => 'Masukkan Kelurahan']) ?>
                    <?= $form->field($model2, 'rt_ktp')->textInput(['type' => 'number', 'placeholder' => 'Masukkan RT Sesuai KTP']) ?>
                    <?= $form->field($model2, 'rw_ktp')->textInput(['type' => 'number', 'placeholder' => 'Masukkan RW Sesuai KTP']) ?>
                </div>
                <div class="col-md-6">
                <?= $form->field($model, 'alamat_domisili')->textarea(['rows' => 2, 'placeholder' => 'Masukkan Alamat Domisili']) ?>
                <?php
                    // Provinsi (Dropdown utama)
                    echo $form->field($model, 'provinsi_domisili')->widget(Select2::classname(), [
                        'data' =>  \yii\helpers\ArrayHelper::map(Provinsi::find()->all(), 'id', 'nama'),
                        'options' => ['id' => 'provinsi-domisili'],
                        'pluginOptions' => ['allowClear' => true, 'placeholder' => 'Pilih Provinsi ...'],
                    ]);

                    // Kota (Dependent Dropdown)
                    echo $form->field($model, 'kota_domisili')->widget(DepDrop::classname(), [
                        'options' => ['id' => 'kota-domisili'],
                        'type' => DepDrop::TYPE_SELECT2,
                        'pluginOptions' => [
                            'depends' => ['provinsi-domisili'],
                            'placeholder' => 'Pilih Kota ...',
                            'url' => Url::to(['ppks/get-kota']),
                            'initialize' => true, // 🔥 Pastikan data ter-load saat edit
                            'params' => ['provinsi-domisili'], // 🔥 Kirim parameter provinsi_id
                        ],
                    ]);

                    // Kecamatan (Dependent Dropdown)
                    echo $form->field($model, 'kecamatan_domisili')->widget(DepDrop::classname(), [
                        'options' => ['id' => 'kecamatan-domisili'],
                        'type' => DepDrop::TYPE_SELECT2,
                        'pluginOptions' => [
                            'depends' => ['kota-domisili'],
                            'placeholder' => 'Pilih Kecamatan ...',
                            'url' => Url::to(['ppks/get-kecamatan']),
                            'initialize' => true, // 🔥 Pastikan data ter-load saat edit
                            'params' => ['kota-domisili'], // 🔥 Kirim parameter kota_id
                        ],
                    ]);

                    // Kelurahan (Dependent Dropdown)
                    echo $form->field($model, 'kelurahan_domisili')->widget(DepDrop::classname(), [
                        'options' => ['id' => 'kelurahan-domisili'],
                        'type' => DepDrop::TYPE_SELECT2,
                        'pluginOptions' => [
                            'depends' => ['kecamatan-domisili'],
                            'placeholder' => 'Pilih Kelurahan ...',
                            'url' => Url::to(['ppks/get-kelurahan']),
                            'initialize' => true, // 🔥 Pastikan data ter-load saat edit
                            'params' => ['kecamatan-domisili'], // 🔥 Kirim parameter kecamatan_id
                        ],
                    ]);
                ?>
                <?php
                //  $form->field($model, 'kecamatan_domisili')->widget(Select2::classname(), [
                //     'data' => \yii\helpers\ArrayHelper::map(Kecamatan::find()->all(), 'id', 'nama'),
                //     'options' => ['placeholder' => 'Pilih Kecamatan', 'id' => 'select-kecamatan-domisili'],
                //     'pluginOptions' => [
                //         'allowClear' => true
                //     ],
                // ]) ?>
                    <?php //$form->field($model, 'kecamatan_domisili')->textInput(['placeholder' => 'Masukkan Kecamatan']) ?>
                    <?php //$form->field($model, 'kelurahan_domisili')->textInput(['placeholder' => 'Masukkan Kelurahan']) ?>
                    <?= $form->field($model, 'rt_domisili')->textInput(['type' => 'number', 'placeholder' => 'Masukkan RT Sesuai Domisili']) ?>
                    <?= $form->field($model, 'rw_domisili')->textInput(['type' => 'number', 'placeholder' => 'Masukkan RW Sesuai Domisili']) ?>
                </div>
            </div>

</div>
</div>

<div class="box box-navy box-solid" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                <div class="box-header bg-white p-2">
                    <i class="fa fa-fw fa-book"></i>
                    <strong>CANTUMKAN NOMOR YANG MUDAH DIHUBUNGI</strong>
                </div>
                <div class="box-body p-2">
            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'nama_cp')->textInput(['placeholder' => 'Masukkan Nama Kontak Person']) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'nomor_hp_cp')->textInput(['placeholder' => 'Masukkan Nomor HP Kontak Person']) ?>
                </div>
            </div>
            </div>
            </div>

            <div class="box box-navy box-solid" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                <div class="box-header bg-white p-2">
                    <i class="fa fa-fw fa-book"></i>
                    <strong>PILIH JENIS PMKS</strong>
                </div>
                <div class="box-body p-2">
            <?php 
            $no=1;
            $jenis_pmks=JenisPmks::find()->all();
            ?>
            <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Kode</th>
                                    <th class="text-center">Kriteria</th>
                                    <!-- <th class="text-center" width="200px">Pilih</th> -->
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($jenis_pmks as $key => $value) {
                                echo "<tr>";
                                echo "<td class='text-center'>".$no++."</td>";
                            // echo '<pre>';
                            // print_r($model[$value->kode]);exit;
                            //     if($model[$value->kode]==1){

                            //     }
                                // echo "<td><input type='checkbox' name='pmks[".$value->kode."]' value='".$model[$value->kode]."'>".$value->nama."</td>";
                                echo "<td><input type='checkbox' name='pmks[" . $value->kode . "]' " . (!empty($model[$value->kode]) && $model[$value->kode] == 1 ? "checked" : "") . "> " . $value->nama . "</td>";
                                $kriterias=JenisPmksKriteria::find()->where(['kode' =>$value->kode])->all();
                                $template="Kriteria : </br> <ul style='list-style-type: lower-alpha;'>";
                                echo "<td>";
                                foreach ($kriterias as $key2 => $value2) {
                                    $template.="<li>".$value2->kriteria."</li>";
                                }
                                $template.= "</ul>";
                                echo $template;
                                if($value->kode=="anak_dengan_kedisabilitasan" ||$value->kode=="penyandang_disabilitas"){
                                    echo "PILIH JENIS KEDISABILITASAN (BOLEH LEBIH DARI SATU)</br>";
                                    echo "<label><input type='checkbox' name='disabilitas[".$value->kode."_fisik]' " . (!empty($model[$value->kode."_fisik"]) && $model[$value->kode."_fisik"] == 1 ? "checked" : "") . "> Fisik</label><br>";
                                    echo "<label><input type='checkbox' name='disabilitas[".$value->kode."_intelektual]' " . (!empty($model[$value->kode."_intelektual"]) && $model[$value->kode."_intelektual"] == 1 ? "checked" : "") . "> Intelektual</label><br>";
                                    echo "<label><input type='checkbox' name='disabilitas[".$value->kode."_mental]' " . (!empty($model[$value->kode."_mental"]) && $model[$value->kode."_mental"] == 1 ? "checked" : "") . "> Mental</label><br>";
                                    echo "<label><input type='checkbox' name='disabilitas[".$value->kode."_sensorik]' " . (!empty($model[$value->kode."_sensorik"]) && $model[$value->kode."_sensorik"] == 1 ? "checked" : "") . "> Sensorik</label><br>";
                                }
                                echo "</td>";
                                // echo "<td class='text-center'><input type='checkbox' name='pmks[".$value->kode."]'></td>";
                                echo "</tr>";
                            }
                            ?>
                                <!-- <tr class="kode-header">
                                    <td rowspan="7">Anak Balita Terlantar</td>
                                    <td>Anak berusia kurang dari 5 tahun</td>
                                    <td class="text-center" rowspan="7"><input type="checkbox" name="anak_balita_terlantar"></td>
                                </tr>
                                <tr><td>Terantar/tanpa asuhan yang layak</td></tr>
                                <tr><td>Berasal dari keluarga sangat miskin/miskin</td></tr>
                                <tr><td>Kehilangan hak asuh dari orangtua/keluarga</td></tr>
                                <tr><td>Anak balita yang mengalami perlakuan salah dan diterlantarkan oleh orangtua/keluarga</td></tr>
                                <tr><td>Anak balita yang dieksploitasi secara ekonomi</td></tr>
                                <tr><td>Anak balita yang menderita gizi buruk atau kurang</td></tr>

                                <tr class="kode-header">
                                    <td rowspan="4">Anak Terlantar</td>
                                    <td>Anak berusia 6 sd 18 tahun</td>
                                    <td class="text-center" rowspan="4"><input type="checkbox" name="anak_terlantar"></td>
                                </tr>
                                <tr><td>Berasal dari keluarga fakir miskin</td></tr>
                                <tr><td>Anak yang dilalaikan oleh orang tuanya</td></tr>
                                <tr><td>Anak yang tidak terpenuhi kebutuhan dasarnya</td></tr> -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <div class="text-center">
                <?= Html::submitButton('Simpan Data', ['class' => 'btn btn-success px-5 py-2']) ?>
            </div>
            
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

</div>
</div>
<style>
    .form-control {
        border-radius: 8px;
    }
    .btn-success {
        border-radius: 8px;
        font-weight: bold;
    }
    .card {
        border: none;
    }
</style>
