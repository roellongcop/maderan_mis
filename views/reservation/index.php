<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ReservationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'List of Reservations';
$this->params['breadcrumbs'][] = $this->title;
$this->params['page'] = 'Reservations';
?>
<div class="reservation-index">

    <?= Yii::$app->access->button('create') ?>
    <br> <br>


    <table class="table table-bordered table-striped data">
        <thead>
            <tr>
                <th>RESIDENT</th>
                <th>DATE </th>
                <th>ENTITY</th>
                <th>QUANTITY</th>
                <th>STATUS</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
            <?= ListView::widget([
                'dataProvider' => $dataProvider,
                'itemView' => '_reservation'
            ]) ?>
        </tbody>
    </table>
</div>
