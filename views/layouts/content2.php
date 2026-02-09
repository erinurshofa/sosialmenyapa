<?php
/* @var $content string */
use yii\helpers\Url;
use yii\bootstrap4\Breadcrumbs;
?>
<div class="content" style="margin-top:56px;background: linear-gradient(to right, #01579B, rgba(0, 0, 0, 0.3)) , url('<?=Url::to('@web/images/background-image.jpg') ?>');background-size:cover;">
<!-- <div class="content" style="margin-top:56px;"> -->
        <?= $content ?>
        <footer class="footer"  style="background:#01579B;padding:40px;">
            <div class="container text-center text-white">
                <p>Copyright © Dinas Sosial Kota Semarang. All Rights Reserved.</p>
            </div>
        </footer>
    </div>
</div>