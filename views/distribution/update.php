<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Distribution */

$this->title = 'Update Distribution: ' . $model->medicine->name;
$this->params['breadcrumbs'][] = ['label' => 'Distributions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->medicine->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="distribution-update">

    <?= $this->render('_update-form', [
            'medicine' => $medicine,
        'model' => $model,
    ]) ?>

</div>
