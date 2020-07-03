<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PeopleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Identification Cards';
$this->params['page'] = 'ID';
$this->params['breadcrumbs'][] = $this->title;

$this->registerJs('window.print()')
?>
<style type="text/css">
    .people-index {
        font-size: 12px
    }
</style>
<div class="people-index">

    
    <div class="row">
        <div class="col-md-12">
            <div id="id-cards">
                <?= ListView::widget([
                    'layout' => '{items}',
                    'dataProvider' => $dataProvider,
                    'itemView' => '_id'
                ]) ?>
            </div>
        </div>
    </div>

</div>

