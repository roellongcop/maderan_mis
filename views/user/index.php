<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'List of Users';
$this->params['breadcrumbs'][] = $this->title;
$this->params['page'] = 'User';
?>
<div class="user-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <?= Yii::$app->access->button('create') ?>
    <br> <br>

    <table class="table table-bordered table-striped data">
        <thead>
            <tr>
                <th>USERNAME</th>
                <th>USER TYPE</th>
                <th>STATUS</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
            <?= ListView::widget([
                'dataProvider' => $dataProvider,
                'itemView' => '_user'
            ]) ?>
        </tbody>
    </table>
</div>
