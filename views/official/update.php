<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Official */

$this->title = 'Update Official: ' . Yii::$app->template->fullName($model->people);
$this->params['breadcrumbs'][] = ['label' => 'Officials', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
$this->params['page'] = 'About';
?>
<div class="official-update"> 

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
