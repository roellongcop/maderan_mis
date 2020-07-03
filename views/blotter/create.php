<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Blotter */

$this->title = 'Create Blotter';
$this->params['breadcrumbs'][] = ['label' => 'Blotters', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;


?>
<div class="blotter-create">


    <?= $this->render('_form', [
        'blotter' => $blotter,
        'model' => $model,
        'complainant' => $complainant,
        'complainants' => $complainants,
        'respondent' => $respondent,
        'respondents' => $respondents,
    ]) ?>

</div>
