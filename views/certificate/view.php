<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Certificate */

$this->title = $model->_name;
$this->params['breadcrumbs'][] = ['label' => 'Certificates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="certificate-view">

    <p>
        <?= Yii::$app->access->button(['update', 'delete'], ['model' => $model]) ?>
        
        <?= Html::a('Print', '#', ['class' => 'btn btn-success btn-print']) ?>
    </p> <br>


    <div class="print">
        <?= isset($certificate) ? $certificate: '' ?>
    </div>
        

</div>
