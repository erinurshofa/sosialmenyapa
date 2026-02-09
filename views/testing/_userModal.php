<?php
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $userId int */
/* @var $username string */

Modal::begin([
    'title' => 'User Information',
    'id' => 'user-modal',
    'size' => Modal::SIZE_LARGE,
]);

echo "<p>User ID: $userId</p>";
echo "<p>Username: $username</p>";

Modal::end();
?>
<script>
   console.log("user!");
</script>