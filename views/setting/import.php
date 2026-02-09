<?php

use yii\helpers\Html;
use app\models\Actions;
use yii\widgets\LinkPager;
use app\models\Dokumen;
use app\models\ImportForm;
use app\models\Kecamatan;
use kartik\grid\GridView;
use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $model app\models\Dokumen */

$this->title = 'import';
// $this->params['breadcrumbs'][] = ['label' => 'Dokumens', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
?>
<?php 
ini_set('memory_limit',-1);
?>

<ul class="timeline">
            <li>
              <i class="fa fa-cloud-upload bg-aqua"></i>
              <div class="timeline-item">
                <!-- <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span> -->

                <h3 class="timeline-header no-border"><a href="#">Upload data</a></h3>
                <div class="timeline-body">
			           Silakan upload file Excel sesuai dengan format yang telah ditentukan
                   <?= 
                   $this->render('_formimport', [
                        'model' => new ImportForm(),
                    ]) 
                    ?>
                </div>
                <div class="timeline-footer">
                <?php //Html::a('Upload Data Permohonan', ['dokumen/uploadpermohonan'], ['class'=>'btn btn-warning btn-xs']);?>
                  <!-- <a href="javascript:void(0);" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#myModal"class="btn btn-warning btn-xs">Upload Data Proses</a> -->
                  <!-- <a class="btn btn-danger btn-xs">Download Berita Acara Serah Terima (BAST)</a> -->
                </div>
              </div>
            </li>
            <!-- END timeline item -->

            </li>
          </ul>


