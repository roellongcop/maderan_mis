<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Distribution */

$this->title = ($model->medicine)? $model->medicine->name: '';
$this->params['breadcrumbs'][] = ['label' => 'Distributions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="distribution-view">

    <p>
        <!-- <?= Yii::$app->access->button(['update', 'delete'], ['model' => $model]) ?> -->
    </p>
    <br>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'label' => 'People | Distribute to',
                'value' => (($model->people)? $model->people->fullname : '')
            ],
            [
                'label' => 'Medicine',
                'value' => (($model->medicine)? $model->medicine->name : '')
            ],
            [
                'label' => 'Category',
                'value' => (($model->medicine && $model->medicine->category)? $model->medicine->category->name: '')
            ],
            [
                'label' => 'Quantity',
                'value' => $model->quantity . ' ' . (($model->medicine && $model->medicine->category)? $model->medicine->category->name : '')
            ],
            'date',
        ],
    ]) ?>

</div>
