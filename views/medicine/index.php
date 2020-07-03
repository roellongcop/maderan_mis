<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MedicineSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'List of Medicines';
$this->params['breadcrumbs'][] = $this->title;
$this->params['page'] = 'Medicines';
?>
<div class="medicine-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <?= Yii::$app->access->button('create') ?>
            <br><br>
    

    <ul class="nav nav-tabs">
        <li class="active">
            <a data-toggle="tab" href="#active-medicine"> Medicine</a>
        </li>
        <li><a data-toggle="tab" href="#expired-medicine">Expired Medicine</a></li>
        <li><a data-toggle="tab" href="#archived-medicine">Archived Medicine</a></li>
    </ul>
    <div class="tab-content">
        <div id="active-medicine" class="tab-pane fade in active">
            <?= Html::a('Print ', ['print'], ['class' => 'btn btn-primary', 'target' => '_blank']) ?>
            <br><br>

            <table class="table table-bordered table-striped data">
                <thead>
                    <tr>
                        <th>NAME</th>
                        <th>CATEGORY</th>
                        <th>QUANTITY</th>
                        <th>UNIT</th>
                        <th>EXPIRATION DATE</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?= ListView::widget([
                        'dataProvider' => $dataProvider,
                        'itemView' => '_medicine'
                    ]) ?>
                </tbody>
            </table>
        </div>
        <div id="expired-medicine" class="tab-pane fade">
            <?= Html::a('Print ', ['print', 'expired' => true], ['class' => 'btn btn-primary', 'target' => '_blank']) ?>
            <br><br>
            <table class="table table-bordered table-striped data">
                <thead>
                    <tr>
                        <th>NAME</th>
                        <th>CATEGORY</th>
                        <th>QUANTITY</th>
                        <th>EXPIRATION DATE</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?= ListView::widget([
                        'dataProvider' => $dataProvider,
                        'itemView' => '_expired'
                    ]) ?>
                </tbody>
            </table>
        </div>

        <div id="archived-medicine" class="tab-pane fade">
            <table class="table table-bordered table-striped data">
                <thead>
                    <tr>
                        <th>NAME</th>
                        <th>CATEGORY</th>
                        <th>QUANTITY</th>
                        <th>UNIT</th>
                        <th>EXPIRATION DATE</th>
                        <th>REASON</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?= ListView::widget([
                        'dataProvider' => $archive_dataProvider,
                        'itemView' => '_archived'
                    ]) ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
