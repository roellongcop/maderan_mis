<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['page'] = 'User';
?>
<div class="user-view"> 

    <p>
        <?= Yii::$app->access->button(['update', 'delete'], ['model' => $model]) ?>
        <?= Yii::$app->access->anchor([
            'title' => 'User dashboard',
            'url' => ['user/dashboard', 'id' => $model->id],
            'options' => [
                'title' => 'User dashboard',
                'class' => 'btn btn-warning btn-sm',
                'data-confirm' => [
                    'Your account will be logout'
                ]
            ]
        ]) ?>
    </p>
    <br>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'username',
            'password',
            'roleName',
            'accessToken',
            'authKey', 
            [
                'label' => 'Status', 
                'value' => Yii::$app->params['status'][$model->status],
                'format' => 'raw'
            ],
        ],
    ]) ?>

</div>
