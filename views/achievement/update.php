<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Achievement */

$this->title = 'Update Achievement: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Achievements', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
$this->params['page'] = 'About';
?>
<div class="achievement-update"> 

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
