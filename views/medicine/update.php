<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Medicine */

$this->title = 'Update Medicine: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Medicines', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
$this->params['page'] = 'Medicines';
?>
<div class="medicine-update"> 

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
