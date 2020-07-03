<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\NatureOfCases */

$this->title = 'Update Nature Of Cases: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Nature Of Cases', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="nature-of-cases-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
