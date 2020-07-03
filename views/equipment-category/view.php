<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Category */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['page'] = 'Settings';
?>
<div class="category-view"> 
    <p>
        <?= Yii::$app->access->button(['update', 'delete'], ['model' => $model]) ?>
    </p>
    <br>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            'description:ntext',
            'type', 
            [
                'label' => 'Status', 
                'value' => Yii::$app->params['status'][$model->status],
                'format' => 'raw'
            ],
        ],
    ]) ?>

</div>
