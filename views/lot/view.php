<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Lot */

$this->title = $model->lot_no;
$this->params['breadcrumbs'][] = ['label' => 'Lots', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['page'] = 'Places';
?>
<div class="lot-view"> 

    <p>
        <?= Yii::$app->access->button(['update', 'delete'], ['model' => $model]) ?>
    </p>
    <br>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'block.blk_no',
            'lot_no',
            'description:ntext',
            [
                'label' => 'Status', 
                'value' => Yii::$app->params['status'][$model->status],
                'format' => 'raw'
            ],
        ],
    ]) ?>

</div>
