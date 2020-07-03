<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Reservation */

$this->title = 'Update Reservation: ' . Yii::$app->template->fullName($model->resident);
$this->params['breadcrumbs'][] = ['label' => 'Reservations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
$this->params['page'] = 'Reservations';
?>
<div class="reservation-update"> 

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
