<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\NatureOfCases */

$this->title = 'Create Nature Of Cases';
$this->params['breadcrumbs'][] = ['label' => 'Nature Of Cases', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nature-of-cases-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
