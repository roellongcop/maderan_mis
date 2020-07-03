<?php

use yii\helpers\Html;
use yii\widgets\ListView;
/* @var $this yii\web\View */
/* @var $searchModel app\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'List of Medicine Categories';
$this->params['breadcrumbs'][] = $this->title;
$this->params['page'] = 'Settings';
?>
<div class="category-index"> 
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <?= Yii::$app->access->button('create') ?>
    <br> <br>

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
                'itemView' => '_category'
            ]) ?>
        </tbody>
    </table>

</div>
