<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Official */

$this->title = Yii::$app->template->fullName($model->people);
$this->params['breadcrumbs'][] = ['label' => 'Officials', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['page'] = 'About';
?>
<div class="official-view"> 

    <p>
        <?= Yii::$app->access->button(['update', 'delete'], ['model' => $model]) ?>
    </p>
    <br>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'people.fname',
            'people.mname',
            'people.lname',
            'people.age',
            'people.sex',
            [
                'label' => 'Address', 
                'value' => Yii::$app->template->address($model->people)
            ],

            [
                'label' => 'Position', 
                'value' => Yii::$app->params['position']['official'][$model->position],
                'format' => 'raw'
            ],
            [
                'label' => 'Status', 
                'value' => Yii::$app->params['status'][$model->status],
                'format' => 'raw'
            ],
            [
                'label' => 'Photo',
                'value' => '<img width="200" id="image-preview" class="img-responsive" src="' . Yii::$app->request->baseUrl . '/' . $model->people->photo . '">',
                'format' => 'raw'
            ]
        ],
    ]) ?>

</div>
