<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\People */

$this->title = 'Create People';
$this->params['breadcrumbs'][] = ['label' => 'Peoples', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['page'] = 'Peoples';
?>
<div class="people-create">


    <?= $this->render('_form', [
        'peoples' => $peoples,
        'model' => $model,
        'employment' => $employment,
    ]) ?>

</div>
