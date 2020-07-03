<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LotSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'List of Lots';
$this->params['breadcrumbs'][] = $this->title;
$this->params['page'] = 'Places';
?>

<div class="lot-index"> 
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <?= Yii::$app->access->button('create') ?>

    
    <br> <br>
    <table class="table table-bordered table-striped data">
        <thead>
            <tr>
                <th>LOT #</th>
                <th>BLK #</th>
                <th>DESCRIPTION</th> 
                <th>STATUS</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
            <?= ListView::widget([
                'dataProvider' => $dataProvider,
                'itemView' => '_lot'
            ]) ?>
        </tbody>
    </table>
</div>
