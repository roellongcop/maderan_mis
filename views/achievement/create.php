<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Achievement */

$this->title = 'Create Achievement';
$this->params['breadcrumbs'][] = ['label' => 'Achievements', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['page'] = 'About';
?>
<div class="achievement-create"> 

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
