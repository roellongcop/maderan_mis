<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Place */

$this->title = 'Update Place: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Places', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
$this->params['page'] = 'Places';
?>
<div class="place-update"> 

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
