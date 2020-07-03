<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PlaceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'List of Places';
$this->params['breadcrumbs'][] = $this->title;
$this->params['page'] = 'Places';
?>
<div class="place-index"> 
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <?= Yii::$app->access->button('create') ?>

    <br> <br>
    <table class="table table-bordered table-striped data">
        <thead>
            <tr>
                <th>NAME</th> 
                <th>ADDRESS</th>
                <th>DESCRIPTION</th> 
                <th>RENTABLE</th>
                <th>STATUS</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
            <?= ListView::widget([
                'dataProvider' => $dataProvider,
                'itemView' => '_place'
            ]) ?>
        </tbody>
    </table>
</div>
