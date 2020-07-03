<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Occupant */

$this->title = 'Update Occupant';
$this->params['breadcrumbs'][] = ['label' => $model->userPeople->fullname, 'url' => ['people/update', 'id' => $model->user_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="occupant-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
