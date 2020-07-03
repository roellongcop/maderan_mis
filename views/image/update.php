<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Image */

$this->title = 'Update Image: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
$this->params['page'] = 'About';
?>
<div class="image-update"> 

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
