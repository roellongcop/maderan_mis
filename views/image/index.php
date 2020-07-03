<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ImageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Images';
$this->params['breadcrumbs'][] = $this->title;
$this->params['page'] = 'About';
?>
<div class="image-index"> 
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
    <?= Html::a('Create Image', ['create'], ['class' => 'btn btn-success']) ?>
    <br> <br>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_image'
    ]) ?>

</div>
