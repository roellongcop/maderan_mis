<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\History */

$this->title = 'Update History: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Histories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
$this->params['page'] = 'About';
?>
<div class="history-update"> 

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
