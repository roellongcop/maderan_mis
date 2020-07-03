<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Place */

$this->title = 'Create Place';
$this->params['breadcrumbs'][] = ['label' => 'Places', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['page'] = 'Places';
?>
<div class="place-create"> 

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
