<?php 

use yii\widgets\DetailView;

echo DetailView::widget([
    'model' => $model,
    'attributes' => [
        'name',
        'block.blk_no',
        'lot.lot_no',
        'street.name',
        [
            'label' => 'Rentable', 
            'value' => Yii::$app->params['rentable'][$model->is_rentable],
            'format' => 'raw'
        ],
        [
            'label' => 'Rent Price', 
            'value' => '₱ ' . number_format($model->rent_price, 2),
        ],
        [
            'label' => 'Status', 
            'value' => Yii::$app->params['status'][$model->status],
            'format' => 'raw'
        ],
        [
            'label' => 'Photo',
            'value' => '<img width="200" id="image-preview" class="img-responsive" src="' . Yii::$app->request->baseUrl . '/' . $model->photo . '">',
            'format' => 'raw'
        ]

    ],
]) ?>