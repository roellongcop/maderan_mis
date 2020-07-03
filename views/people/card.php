<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PeopleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Identification Cards';
$this->params['page'] = 'ID';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="people-index">

    <?php echo $this->render('_search', [
        'model' => $searchModel,
        'action' => 'card'
    ]); ?>


    <div class="row">
        <div class="col-md-12">
            <?= Yii::$app->access->anchor([
                'title' => '<i class="fa fa-print"></i> Print',
                'url' => ['people/print-id', 'query' => json_encode(Yii::$app->request->get())],
                'options' => ['class' => 'btn btn-success btn-lg', 'target' => '_blank']
            ]) ?>

            <hr>
        </div> 
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div id="id-cards">


                <ul class="nav nav-tabs">
                    <li class="active">
                        <a data-toggle="tab" href="#active-medicine">Issued ID</a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#expired-medicine">Not-Issued ID</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="active-medicine" class="tab-pane fade in active">

                        <?= Yii::$app->access->anchor([
                            'title' => 'Summary',
                            'url' =>['people/id-summary'],
                            'options' => ['class' => 'btn btn-success', 'target' => '_blank']
                        ]) ?>

                        <br><br>
                        <table class="table table-bordered table-striped data">
                            <thead>
                                <tr>
                                    <th>FULLNAME</th>
                                    <th>DATE ISSUED</th>
                                    <th>AGE</th>
                                    <th>SEX</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?= ListView::widget([
                                    'dataProvider' => $dataProvider,
                                    'itemView' => '_id_list',
                                    'viewParams' => ['issued' => true]
                                ]) ?>
                            </tbody>
                        </table>
                    </div>
                    <div id="expired-medicine" class="tab-pane fade">
                        <table class="table table-bordered table-striped data">
                            <thead>
                                <tr>
                                    <th>FULLNAME</th>
                                    <th>DATE ISSUED</th>
                                    <th>AGE</th>
                                    <th>SEX</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?= ListView::widget([
                                    'dataProvider' => $dataProvider,
                                    'itemView' => '_id_list',
                                    // 'itemView' => '_id'
                                ]) ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                


            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12"> <hr>
            <?= Yii::$app->access->anchor([
                'title' => '<i class="fa fa-print"></i> Print',
                'url' => ['people/print-id', 'query' => json_encode(Yii::$app->request->get())],
                'options' => ['class' => 'btn btn-success btn-lg', 'target' => '_blank']
            ]) ?>
        </div>
    </div>
</div>

