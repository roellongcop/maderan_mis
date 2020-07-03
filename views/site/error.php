<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;
$this->title = $name;
?>
 <div class="error-404">    
    <div class="error-page-left">
        <img src="<?= Yii::$app->urlManager->baseUrl ?>/resources/src/images/404.png" alt="">
    </div>
    <div class="error-right">
        <h2><?= $name ?></h2>
        <h4 style="color: #333"><?= $message ?></h4>
        <?php # echo Html::a('Dashboard', ['/dashboard']) ?>
    </div>
</div>

