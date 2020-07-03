<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Respondent */

$this->title = 'Create Respondent';
$this->params['breadcrumbs'][] = ['label' => 'Respondents', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="respondent-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
