<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PeopleParentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'List of People Parents';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="people-parent-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create People Parent', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'child_id',
            'parent_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
