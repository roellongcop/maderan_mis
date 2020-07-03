<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BlotterSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'List of Blotters';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blotter-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Yii::$app->access->button('create') ?>
        <?= Yii::$app->access->anchor([
            'title' => 'Summary Report',
            'url' => ['blotter/summary'],
            'options' => ['class' => 'btn btn-info']
        ]) ?>

    </p><br>

    <table class="table table-bordered table-striped data">
        <thead>
            <tr>
                <th>CASE #</th>
                <th>COMPLAINANTS</th> 
                <th>RESPONDENTS</th>
                <th>NATURE OF CASE</th>
                <th>ACTION TAKEN</th>
                <th>REMARKS</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
            <?= ListView::widget([
                'dataProvider' => $dataProvider,
                'itemView' => '_blotter'
            ]) ?>
        </tbody>
    </table>

    
</div>
