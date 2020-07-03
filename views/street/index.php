<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\StreetSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'List of Streets';
$this->params['breadcrumbs'][] = $this->title;
$this->params['page'] = 'Places';
?>
<div class="street-index"> 
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
                'itemView' => '_street'
            ]) ?>
        </tbody>
    </table>
</div>
