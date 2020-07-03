<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PeopleParent */

$this->title = 'Update People Parent: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'People Parents', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="people-parent-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
