<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Street */

$this->title = 'Update Street: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Streets', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
$this->params['page'] = 'Places';
?>
<div class="street-update"> 

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
