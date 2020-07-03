<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Certificate */

$this->title =  $model->_name;
$this->params['breadcrumbs'][] = ['label' => 'Certificates', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="certificate-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
