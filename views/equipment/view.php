<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Equipment */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Equipments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['page'] = 'Equipments';
?>
<div class="equipment-view">


    <p>
        <?= Yii::$app->access->button(['update', 'delete'], ['model' => $model]) ?>
    </p>
    <br>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            'quantity',
            'description:ntext',
            'category.name',
            'unit.name',
            [
                'label' => 'Rentable', 
                'value' => Yii::$app->params['rentable'][$model->is_rentable],
                'format' => 'raw'
            ],
            [
                'label' => 'Status', 
                'value' => Yii::$app->params['status'][$model->status],
                'format' => 'raw'
            ],
            [
                'label' => 'Rent Price', 
                'value' => '₱ ' . number_format($model->rent_price, 2),
            ],

            // 'image:ntext',
            'date_added',
            'date_updated',
        ],
    ]) ?>

</div>
