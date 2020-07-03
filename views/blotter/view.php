<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Blotter */

$this->title = 'Case No: ' . $model->case_no;
$this->params['breadcrumbs'][] = ['label' => 'Blotters', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blotter-view">


    <p>
        <?= Yii::$app->access->button(['update', 'delete'], ['model' => $model]) ?>
    </p> <br>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'case_no',
            'complainantList:raw',
            'respondentList:raw',
            'description:ntext',
            '_nature_of_case',
            '_action_taken',
            '_remarks',
            [
                'label' => 'In-charge',
                'value' => $model->inCharge->username
            ],
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
