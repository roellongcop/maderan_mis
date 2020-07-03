<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Occupant */

$this->title = 'Create Occupant';
$this->params['breadcrumbs'][] = ['label' => 'Occupants', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="occupant-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
