<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NatureOfCasesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'List of Nature Of Cases';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nature-of-cases-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Yii::$app->access->button('create') ?>
    </p> <br>

    <table class="table table-bordered table-striped data">
        <thead>
            <tr>
                <th>NAME</th>
                <th>DESCRIPTION</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
            <?= ListView::widget([
                'dataProvider' => $dataProvider,
                'itemView' => '_cases'
            ]) ?>
        </tbody>
    </table>
</div>
