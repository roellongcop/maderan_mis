<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Medicine */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Medicines', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['page'] = 'Medicines';
?>
<div class="medicine-view"> 
    <p>
        <?= Yii::$app->access->button(['update', 'delete'], ['model' => $model]) ?>
    </p>
    <br>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            'description:ntext',
            'category.name',
            'unit.name',
            'quantity', 
            [
                'label' => 'Price', 
                'value' => '₱ ' .number_format($model->price, 2),
            ],
            'expiration_date',
            [
                'label' => 'Status', 
                'value' => Yii::$app->params['status'][$model->status],
                'format' => 'raw'
            ],

            [
                'label' => 'Date Added', 
                'value' => date_format(date_create($model->date_added), 'Y-m-d h:i:s A'),
                'format' => 'raw'
            ],

            [
                'label' => 'Date Updated', 
                'value' => date_format(date_create($model->date_updated), 'Y-m-d h:i:s A'),
                'format' => 'raw'
            ],
        ],
    ]) ?>

</div>
