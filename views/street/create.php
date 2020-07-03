<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Street */

$this->title = 'Create Street';
$this->params['breadcrumbs'][] = ['label' => 'Streets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['page'] = 'Places';
?>
<div class="street-create"> 

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
