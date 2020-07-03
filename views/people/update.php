<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\People */

$this->title = 'Update: ' . Yii::$app->template->fullName($model);
$this->params['breadcrumbs'][] = ['label' => 'Peoples', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => Yii::$app->template->fullName($model), 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
$this->params['page'] = 'Peoples';
$src = <<< JS
    $('.resident-list').show();
JS;
$this->registerJs($src);
?>
<div class="people-update">


    <?= $this->render('_form', [
        'peoples' => $peoples,
        'model' => $model,
    ]) ?>

</div>
