<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Distribution */

$this->title = 'Create Distribution';
$this->params['breadcrumbs'][] = ['label' => 'Distributions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="distribution-create">

    <?= $this->render('_form', [
        'peoples' => $peoples,
        'model' => $model,
    ]) ?>

</div>
