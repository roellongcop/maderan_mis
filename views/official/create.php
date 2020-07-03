<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Official */

$this->title = 'Create Official';
$this->params['breadcrumbs'][] = ['label' => 'Officials', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['page'] = 'About';
?>
<div class="official-create"> 

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
