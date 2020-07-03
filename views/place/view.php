<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Place */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Places', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['page'] = 'Places';
?>
<div class="place-view"> 

    <p>
        <?= Yii::$app->access->button(['update', 'delete'], ['model' => $model]) ?>
    </p>
    <br>

    <?= $this->render('_detail', ['model' => $model]) ?>

</div>
