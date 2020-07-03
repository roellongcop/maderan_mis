<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Category */

$this->title = 'Create Medicine Category';
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['page'] = 'Settings';
?>
<div class="category-create"> 

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
