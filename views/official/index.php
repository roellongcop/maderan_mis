<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OfficialSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'List of Officials';
$this->params['breadcrumbs'][] = $this->title;
$this->params['page'] = 'About';
?>
<div class="official-index"> 
    <?= Yii::$app->access->button('create') ?>

    <br><br>
    
    <table class="table table-bordered table-striped data">
        <thead>
            <tr>
                <th>FULLNAME</th>
                <th>POSITION</th>
                <th>STATUS</th> 
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
            <?= ListView::widget([
                'dataProvider' => $dataProvider,
                'itemView' => '_official'
            ]) ?>
        </tbody>
    </table>
 
</div>
