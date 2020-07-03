<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\PeopleSearch;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CertificateSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'List of Certificates';
$this->params['page'] = 'Certificates';
$this->params['breadcrumbs'][] = $this->title;

$access = Yii::$app->access;

?>
<div class="certificate-index">

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>
    <br>
    <p>
        <?= $access->button('create') ?>
    </p> <br>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'name',
                'value' => function($model) {
                    return str_replace("_", " ", $model->name);
                }
            ],
            [
                'attribute' => 'user_id',
                'value' => 'people.fullname'
            ],
            'created_at',
            //'updated_at',

            Yii::$app->access->gridColumns(),
        ],
    ]); ?>
</div>
