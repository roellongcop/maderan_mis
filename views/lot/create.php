<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Lot */

$this->title = 'Create Lot';
$this->params['breadcrumbs'][] = ['label' => 'Lots', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['page'] = 'Places';
?>
<div class="lot-create"> 

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
