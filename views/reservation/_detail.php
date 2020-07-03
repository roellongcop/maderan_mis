<?php

use yii\widgets\DetailView;

echo DetailView::widget([
    'model' => $model,
    'attributes' => [
        ['label' => 'Resident', 'value' => Yii::$app->template->fullname($model->resident)],

        'quantity',
        [
            'label' => 'Date From', 
            'value' => date_format(date_create($model->date_from), 'Y-m-d h:i:s A'),
            'format' => 'raw'
        ],

        [
            'label' => 'Date To', 
            'value' => date_format(date_create($model->date_to), 'Y-m-d h:i:s A'),
            'format' => 'raw'
        ],

        'type',

        [
            'label' => 'Entity', 
            'value' => Yii::$app->template->reservedEntity($model, 'name'),
            'format' => 'raw'
        ],

        [
            'label' => 'Status', 
            'value' => Yii::$app->params['status'][$model->status],
            'format' => 'raw'
        ],
        [
            'label' => 'Photo',
            'value' => ($model->type == 'place') ? 
                '<img width="200" id="image-preview" class="img-responsive" src="' . Yii::$app->request->baseUrl . '/' . Yii::$app->template->reservedEntity($model)->photo . '">' : 'N/A',
            'format' => 'raw'
        ],
      
    ],
]) ?>