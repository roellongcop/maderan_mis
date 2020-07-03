<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Blotter */

$this->title = 'Update Blotter';
$this->params['breadcrumbs'][] = ['label' => 'Blotters', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';



?>
<div class="blotter-update">


    <?= $this->render('_form', [
    	'blotter' => $blotter,
        'model' => $model,
        'complainant' => $complainant,
        'complainants' => $complainants, 
        'respondent' => $respondent,
        'respondents' => $respondents, 
    ]) ?>

</div>
