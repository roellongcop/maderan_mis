<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Equipment */

$this->title = 'Create Equipment';
$this->params['breadcrumbs'][] = ['label' => 'Equipments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['page'] = 'Equipments';
?>
<div class="equipment-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
