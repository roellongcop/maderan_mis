<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PositionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'List of Positions';
$this->params['breadcrumbs'][] = $this->title;
$this->params['page'] = 'Settings';
?>
<div class="position-index">
    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?= Html::a('Create Position', ['create'], ['class' => 'btn btn-success']) ?>
    <br> <br>

    <table class="table table-bordered table-striped data">
        <thead>
            <tr>
                <th width="100">NAME</th>
                <th>DESCRIPTION</th>
                <th>TYPE</th>
                <th>STATUS</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
            <?= ListView::widget([
                'dataProvider' => $dataProvider,
                'itemView' => '_position'
            ]) ?>
        </tbody>
    </table>

</div>
