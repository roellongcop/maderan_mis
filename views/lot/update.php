<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Lot */

$this->title = 'Update Lot: ' . $model->lot_no;
$this->params['breadcrumbs'][] = ['label' => 'Lots', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
$this->params['page'] = 'Places';
?>
<div class="lot-update"> 

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
