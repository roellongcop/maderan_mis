<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EquipmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'List of Equipments';
$this->params['breadcrumbs'][] = $this->title;
$this->params['page'] = 'Equipments';
?>
<div class="equipment-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <?= Yii::$app->access->button('create') ?>
        <?= Yii::$app->access->anchor([
            'title' => 'Print',
            'url' => ['equipment/print'],
            'options' => [
                'class' => 'btn btn-primary', 
                'target' => '_blank'
            ]
        ]) ?>
    
    <br> <br>

    <table class="table table-bordered table-striped data">
        <thead>
            <tr>
                <th>NAME</th>
                <th>DESCRIPTION</th>
                <th>CATEGORY</th>
                <th>QUANTITY</th>
                <th>UNIT</th>
                <th>RENTABLE</th>
                <th>RENT FEE (₱)</th>
                <th>STATUS</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
            <?= ListView::widget([
                'dataProvider' => $dataProvider,
                'itemView' => '_equipment'
            ]) ?>
        </tbody>
    </table>
</div>
