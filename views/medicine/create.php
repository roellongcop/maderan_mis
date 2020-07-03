<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Medicine */

$this->title = 'Create Medicine';
$this->params['breadcrumbs'][] = ['label' => 'Medicines', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['page'] = 'Medicines';
?>
<div class="medicine-create"> 

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
