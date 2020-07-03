<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PeopleParent */

$this->title = 'Create People Parent';
$this->params['breadcrumbs'][] = ['label' => 'People Parents', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="people-parent-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
