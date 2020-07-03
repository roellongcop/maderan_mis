<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Image */

$this->title = 'Create Image';
$this->params['breadcrumbs'][] = ['label' => 'Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['page'] = 'About';
?>
<div class="image-create"> 

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
