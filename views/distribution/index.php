<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DistributionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'List of Distributions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="distribution-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Yii::$app->access->button('create') ?>
    </p> 
    <br> <br>
    <table class="table table-bordered table-striped data">
        <thead>
            <tr>
                <th>FULLNAME</th>
                <th>MEDICINE</th>
                <th>CATEGORY</th>
                <th>QUANTITY</th>
                <th>UNIT</th>
                <th>DATE</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
            <?= ListView::widget([
                'dataProvider' => $dataProvider,
                'itemView' => '_distribution'
            ]) ?>
        </tbody>
    </table>

</div>
