<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\History */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Histories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['page'] = 'About';
?>
<div class="history-view"> 

    <p>
        <?= Yii::$app->access->button(['update', 'delete'], ['model' => $model]) ?>
    </p>
    <br>

    <div class="row">
        <div class="col-md-7">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'name',
                    'description:ntext',
                    [
                        'label' => 'Status', 
                        'value' => Yii::$app->params['status'][$model->status],
                        'format' => 'raw'
                    ],
                ],
            ]) ?>
        </div>
        <div class="col-md-5">
            <img class="img-responsive" src="<?= Yii::$app->request->baseUrl . '/' . $model->photo ?>">
        </div>
    </div>
   

</div>
