<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Role */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Roles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="role-view">

    <p>
        <?= Yii::$app->access->button(['update', 'delete'], ['model' => $model]) ?>
    </p>
    <br>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            [
                'label' => 'access',
                'value' => json_encode($model->access)
            ],
            'status',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
